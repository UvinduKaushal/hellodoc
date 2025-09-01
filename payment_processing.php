<?php $pageTitle = "Secure Payment"; include 'header.php'; ?>
    <style>
        body {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--bg-medium) 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: var(--text-white);
            font-family: 'Montserrat', sans-serif;
            flex-direction: column;
            text-align: center;
        }
        .payment-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            max-width: 500px;
            width: 100%;
            color: var(--text-dark);
            animation: fadeIn 0.5s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        h1 {
            font-size: 2.2rem;
            margin-bottom: 1.5rem;
            color: var(--primary-dark);
        }
        .form-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }
        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }
        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            background: white;
            color: var(--text-dark);
            transition: border-color 0.3s ease;
        }
        .form-group input:focus {
            outline: none;
            border-color: var(--btn-primary);
        }
        .card-details-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1rem;
        }
        .pay-btn {
            background: var(--btn-primary);
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            margin-top: 1rem;
        }
        .pay-btn:hover {
            background: var(--primary-medium);
        }
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            flex-direction: column;
            color: white;
            display: none; /* Hidden by default */
        }
        .loading-spinner {
            border: 8px solid rgba(255, 255, 255, 0.3);
            border-top: 8px solid var(--accent-blue);
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 1.5s linear infinite;
            margin-bottom: 2rem;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .loading-overlay h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        .loading-overlay p {
            font-size: 1.1rem;
            opacity: 0.8;
        }

        @media (max-width: 600px) {
            .payment-container {
                padding: 2rem;
                margin: 0 15px;
            }
            h1 {
                font-size: 1.8rem;
            }
            .card-details-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <div class="payment-container">
        <h1>Enter Payment Details</h1>
        <form id="paymentForm">
            <div class="form-group">
                <label for="cardNumber">Card Number</label>
                <input type="text" id="cardNumber" placeholder="•••• •••• •••• ••••" required pattern="[0-9]{16}" maxlength="16">
            </div>
            <div class="card-details-grid">
                <div class="form-group">
                    <label for="expiryDate">Expiry Date</label>
                    <input type="text" id="expiryDate" placeholder="MM/YY" required pattern="(0[1-9]|1[0-2])\/[0-9]{2}" maxlength="5">
                </div>
                <div class="form-group">
                    <label for="cvc">CVC</label>
                    <input type="text" id="cvc" placeholder="•••" required pattern="[0-9]{3,4}" maxlength="4">
                </div>
            </div>
            <div class="form-group">
                <label for="cardholderName">Cardholder Name</label>
                <input type="text" id="cardholderName" placeholder="Full Name" required>
            </div>
            <button type="submit" class="pay-btn">Pay Now</button>
        </form>
    </div>

    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-spinner"></div>
        <h2>Processing Your Payment</h2>
        <p>Please do not close this window. You will be redirected shortly.</p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const paymentForm = document.getElementById('paymentForm');
            const loadingOverlay = document.getElementById('loadingOverlay');

            paymentForm.addEventListener('submit', async function(e) {
                e.preventDefault();

                // Show loading overlay
                loadingOverlay.style.display = 'flex';

                const isDonation = sessionStorage.getItem('isDonationPayment') === 'true';
                const lastOrder = JSON.parse(sessionStorage.getItem('helldocLastOrder'));
                const loggedInUser = JSON.parse(sessionStorage.getItem('loggedInUser'));

                if (!loggedInUser) {
                    alert('You must be logged in to complete this action.');
                    loadingOverlay.style.display = 'none';
                    window.location.href = 'login.php';
                    return;
                }

                // Simulate payment processing time
                await new Promise(resolve => setTimeout(resolve, 3000));

                const isSuccess = true; // Always true as per previous instruction

                if (isDonation) {
                    // For donations, simply redirect to success
                    sessionStorage.removeItem('isDonationPayment');
                    window.location.href = 'payment_success.php';
                } else if (lastOrder) {
                    try {
                        // Submit order to backend
                        const response = await fetch('backend/data.php', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({
                                action: 'addOrder',
                                userId: loggedInUser.email,
                                orderData: lastOrder
                            })
                        });
                        const data = await response.json();

                        if (data.success) {
                            window.location.href = 'payment_success.php';
                        } else {
                            console.error('Failed to save order to backend:', data.message);
                            window.location.href = 'payment_failure.php';
                        }
                    } catch (error) {
                        console.error('Error during order submission:', error);
                        window.location.href = 'payment_failure.php';
                    }
                } else {
                    // Fallback if no order data or donation flag
                    window.location.href = isSuccess ? 'payment_success.php' : 'payment_failure.php';
                }

                // Clean up session storage regardless of outcome
                sessionStorage.removeItem('isDonationPayment');
                sessionStorage.removeItem('helldocLastOrder');

            });
        });
    </script>
<?php include 'footer.php'; ?>
