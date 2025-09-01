<?php

require_once '../config.php'; // Include general configuration

define('USERS_FILE', __DIR__ . '/users.json');

// Function to read users from the JSON file
function getUsers() {
    if (!file_exists(USERS_FILE)) {
        return [];
    }
    $json = file_get_contents(USERS_FILE);
    return json_decode($json, true) ?: [];
}

// Function to save users to the JSON file
function saveUsers($users) {
    file_put_contents(USERS_FILE, json_encode($users, JSON_PRETTY_PRINT));
}

// Function to register a new user
function registerUser($userData) {
    $users = getUsers();
    
    // Check if email already exists
    foreach ($users as $user) {
        if ($user['email'] === $userData['email']) {
            return ['success' => false, 'message' => 'Account with this email already exists.'];
        }
    }

    // Hash password before saving (basic simulation, for production use password_hash)
    $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);

    $users[] = $userData;
    saveUsers($users);
    return ['success' => true, 'message' => 'Registration successful!'];
}

// Function to log in a user
function loginUser($email, $password) {
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['email'] === $email && password_verify($password, $user['password'])) { 
            // For simplicity, return basic user data. In production, avoid sending password.
            return ['success' => true, 'message' => 'Login successful!', 'user' => $user];
        }
    }
    return ['success' => false, 'message' => 'Invalid email or password.'];
}

// Function to change user password
function changePassword($email, $currentPassword, $newPassword) {
    $users = getUsers();
    $userFound = false;
    foreach ($users as &$user) { // Use & to modify the array by reference
        if ($user['email'] === $email) {
            $userFound = true;
            if (password_verify($currentPassword, $user['password'])) {
                $user['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
                saveUsers($users);
                return ['success' => true, 'message' => 'Password changed successfully.'];
            } else {
                return ['success' => false, 'message' => 'Current password is incorrect.'];
            }
        }
    }
    if (!$userFound) {
        return ['success' => false, 'message' => 'User not found.'];
    }
}

// Handle AJAX requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    $input = json_decode(file_get_contents('php://input'), true);

    $action = $input['action'] ?? '';

    switch ($action) {
        case 'register':
            $response = registerUser($input['userData']);
            echo json_encode($response);
            break;
        case 'login':
            $response = loginUser($input['email'], $input['password']);
            echo json_encode($response);
            break;
        case 'changePassword':
            $response = changePassword($input['email'], $input['currentPassword'], $input['newPassword']);
            echo json_encode($response);
            break;
        default:
            echo json_encode(['success' => false, 'message' => 'Invalid action.']);
            break;
    }
}

?>
