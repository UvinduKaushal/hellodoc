<?php

require_once '../config.php';

define('CART_FILE', __DIR__ . '/cart.json');
define('APPOINTMENTS_FILE', __DIR__ . '/appointments.json');
define('ORDERS_FILE', __DIR__ . '/orders.json');

// Helper function to read JSON files
function readJsonFile($filePath) {
    if (!file_exists($filePath)) {
        return [];
    }
    $json = file_get_contents($filePath);
    return json_decode($json, true) ?: [];
}

// Helper function to write to JSON files
function writeJsonFile($filePath, $data) {
    file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));
}

// --- Cart Functions ---

function getCart($userId) {
    $carts = readJsonFile(CART_FILE);
    return $carts[$userId] ?? [];
}

function saveCart($userId, $cartData) {
    $carts = readJsonFile(CART_FILE);
    $carts[$userId] = $cartData;
    writeJsonFile(CART_FILE, $carts);
    return ['success' => true, 'message' => 'Cart saved successfully.'];
}

// --- Appointment Functions ---

function getAppointments($userId) {
    $appointments = readJsonFile(APPOINTMENTS_FILE);
    return array_filter($appointments, function($app) use ($userId) {
        return $app['userId'] === $userId;
    });
}

function addAppointment($appointmentData) {
    $appointments = readJsonFile(APPOINTMENTS_FILE);
    $appointmentData['id'] = uniqid(); // Generate a unique ID for the appointment
    $appointments[] = $appointmentData;
    writeJsonFile(APPOINTMENTS_FILE, $appointments);
    return ['success' => true, 'message' => 'Appointment booked successfully.', 'appointment' => $appointmentData];
}

// --- Order Functions ---

function getOrders($userId) {
    $orders = readJsonFile(ORDERS_FILE);
    return array_filter($orders, function($order) use ($userId) {
        return $order['userId'] === $userId;
    });
}

function addOrder($orderData) {
    $orders = readJsonFile(ORDERS_FILE);
    $orderData['id'] = uniqid(); // Generate a unique ID for the order
    $orders[] = $orderData;
    writeJsonFile(ORDERS_FILE, $orders);
    return ['success' => true, 'message' => 'Order placed successfully.', 'order' => $orderData];
}

// Handle AJAX requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    $input = json_decode(file_get_contents('php://input'), true);

    $action = $input['action'] ?? '';
    $userId = $input['userId'] ?? null; // Assuming userId is passed for user-specific data

    $response = ['success' => false, 'message' => 'Invalid action or missing user ID.'];

    switch ($action) {
        case 'getCart':
            if ($userId) {
                $response = ['success' => true, 'cart' => getCart($userId)];
            } else {
                $response['message'] = 'User ID is required to get cart.';
            }
            break;
        case 'saveCart':
            $cartData = $input['cartData'] ?? [];
            if ($userId) {
                $response = saveCart($userId, $cartData);
            } else {
                $response['message'] = 'User ID is required to save cart.';
            }
            break;
        case 'getAppointments':
            if ($userId) {
                $response = ['success' => true, 'appointments' => getAppointments($userId)];
            } else {
                $response['message'] = 'User ID is required to get appointments.';
            }
            break;
        case 'addAppointment':
            $appointmentData = $input['appointmentData'] ?? [];
            if ($userId && !empty($appointmentData)) {
                $appointmentData['userId'] = $userId; // Ensure appointment is linked to user
                $response = addAppointment($appointmentData);
            } else {
                $response['message'] = 'User ID and appointment data are required to add appointment.';
            }
            break;
        case 'getOrders':
            if ($userId) {
                $response = ['success' => true, 'orders' => getOrders($userId)];
            } else {
                $response['message'] = 'User ID is required to get orders.';
            }
            break;
        case 'addOrder':
            $orderData = $input['orderData'] ?? [];
            if ($userId && !empty($orderData)) {
                $orderData['userId'] = $userId; // Ensure order is linked to user
                $response = addOrder($orderData);
            } else {
                $response['message'] = 'User ID and order data are required to add order.';
            }
            break;
    }

    echo json_encode($response);
}

?>
