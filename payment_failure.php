<?php $pageTitle = "Payment Failed"; include 'header.php'; ?>
    <style>
        body {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--status-error) 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: var(--text-white);
            font-family: 'Montserrat', sans-serif;
            flex-direction: column;
            text-align: center;
        }
        .message-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }
        h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--text-white);
        }
        p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        .home-btn {
            background: var(--text-white);
            color: var(--primary-dark);
            padding: 12px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .home-btn:hover {
            background: var(--accent-light);
        }
    </style>
    <div class="message-container">
        <h1>Payment Failed</h1>
        <p>Unfortunately, your payment could not be processed. Please try again or contact support.</p>
        <a href="index.php" class="home-btn">Return to Home</a>
    </div>
<?php include 'footer.php'; ?>
