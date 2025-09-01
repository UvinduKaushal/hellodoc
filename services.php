<?php $pageTitle = "Our Services"; include 'header.php'; ?>
    <style>
        /* Services Page Specific Styles */
        .services-hero {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--bg-medium) 100%);
            padding: 80px 0;
            color: var(--text-white);
            text-align: center;
        }
        
        .services-hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .services-hero p {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }
        
        .services-content {
            background: var(--bg-light);
            padding: 80px 0;
            color: var(--text-dark);
        }
        
        .service-detail {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            margin-bottom: 3rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }
        
        .service-detail:nth-child(even) {
            direction: rtl;
        }
        
        .service-detail:nth-child(even) .service-text {
            direction: ltr;
        }
        
        .service-text h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 1.5rem;
        }
        
        .service-text p {
            font-size: 1.1rem;
            line-height: 1.7;
            color: var(--text-dark);
            margin-bottom: 2rem;
        }
        
        .service-features {
            list-style: none;
            padding: 0;
        }
        
        .service-features li {
            padding: 0.5rem 0;
            color: var(--text-dark);
            position: relative;
            padding-left: 2rem;
        }
        
        .service-features li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--status-success);
            font-weight: bold;
            font-size: 1.2rem;
        }
        
        .service-image {
            text-align: center;
        }
        
        .service-icon {
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, var(--accent-blue) 0%, var(--primary-light) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            margin: 0 auto;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }
        
        .cta-section {
            background: var(--primary-dark);
            padding: 80px 0;
            color: var(--text-white);
            text-align: center;
        }
        
        .cta-section h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }
        
        .cta-section p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .cta-buttons {
            display: flex;
            gap: 2rem;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .cta-btn {
            padding: 15px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .cta-btn.primary {
            background: var(--text-white);
            color: var(--primary-dark);
        }
        
        .cta-btn.primary:hover {
            background: var(--accent-blue);
            color: var(--text-white);
            transform: translateY(-2px);
        }
        
        .cta-btn.secondary {
            background: transparent;
            color: var(--text-white);
            border: 2px solid var(--text-white);
        }
        
        .cta-btn.secondary:hover {
            background: var(--text-white);
            color: var(--primary-dark);
            transform: translateY(-2px);
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .services-hero h1 {
                font-size: 2.5rem;
            }
            
            .service-detail {
                grid-template-columns: 1fr;
                gap: 2rem;
                padding: 2rem;
            }
            
            .service-detail:nth-child(even) {
                direction: ltr;
            }
            
            .service-text h2 {
                font-size: 2rem;
            }
            
            .service-icon {
                width: 150px;
                height: 150px;
                font-size: 3rem;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .cta-btn {
                width: 100%;
                max-width: 300px;
                text-align: center;
            }
        }
        
        @media (max-width: 480px) {
            .services-hero h1 {
                font-size: 2rem;
            }
            
            .services-hero p {
                font-size: 1rem;
            }
            
            .service-detail {
                padding: 1.5rem;
            }
            
            .service-text h2 {
                font-size: 1.8rem;
            }
            
            .cta-section h2 {
                font-size: 2rem;
            }
        }
    </style>
    <!-- Hero Section -->
    <section class="services-hero">
        <div class="container">
            <h1>Our HelloDoc Services</h1>
            <p>Comprehensive healthcare solutions designed to make medical support accessible, convenient, and reliable for everyone.</p>
        </div>
    </section>

    <!-- Services Content -->
    <section class="services-content">
        <div class="container">
            <!-- AI Medical Chatbot -->
            <div class="service-detail">
                <div class="service-text">
                    <h2>AI Medical Chatbot</h2>
                    <p>Get instant answers to your health questions with our intelligent AI assistant. Available 24/7, our chatbot provides quick, accurate, and easy-to-understand medical information.</p>
                    <ul class="service-features">
                        <li>24/7 availability</li>
                        <li>Instant responses</li>
                        <li>Medical information database</li>
                        <li>Easy-to-understand explanations</li>
                        <li>Privacy and security</li>
                    </ul>
                </div>
                <div class="service-image">
                    <img src="images/services/aibot.webp" alt="AI Medical Chatbot" class="service-image-actual">
                </div>
            </div>

            <!-- Call a Doctor Now -->
            <div class="service-detail">
                <div class="service-text">
                    <h2>Call a Doctor Now</h2>
                    <p>Connect with licensed doctors through secure video consultations from the comfort of your home. Get professional medical advice without leaving your house.</p>
                    <ul class="service-features">
                        <li>Licensed medical professionals</li>
                        <li>Secure video consultations</li>
                        <li>Emergency support</li>
                        <li>Prescription services</li>
                        <li>Follow-up care</li>
                    </ul>
                </div>
                <div class="service-image">
                    <img src="images/services/doctor.jpg" alt="Call a Doctor Now" class="service-image-actual">
                </div>
            </div>

            <!-- Order Medicine -->
            <div class="service-detail">
                <div class="service-text">
                    <h2>Order Medicine</h2>
                    <p>Browse and order your prescriptions with home delivery options for convenience and safety. Our verified sellers ensure quality and authenticity.</p>
                    <ul class="service-features">
                        <li>Verified sellers</li>
                        <li>Home delivery</li>
                        <li>Prescription management</li>
                        <li>Quality assurance</li>
                        <li>Secure payments</li>
                    </ul>
                </div>
                <div class="service-image">
                    <img src="images/services/medicine.jpg" alt="Order Medicine" class="service-image-actual">
                </div>
            </div>

            <!-- Donate to Help Others -->
            <div class="service-detail">
                <div class="service-text">
                    <h2>Donate to Help Others</h2>
                    <p>Support patients who can't afford treatment through our secure donation portal. Every contribution makes a difference in someone's healthcare journey.</p>
                    <ul class="service-features">
                        <li>Secure donations</li>
                        <li>Transparent tracking</li>
                        <li>Direct impact</li>
                        <li>Tax benefits</li>
                        <li>Regular updates</li>
                    </ul>
                </div>
                <div class="service-image">
                    <img src="images/services/pfp.jpg" alt="Donate to Help Others" class="service-image-actual">
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Ready to Get Started?</h2>
            <p>Join thousands of users who trust HelloDoc for their healthcare needs. Start your journey towards better health today.</p>
            <div class="cta-buttons">
                <a href="medicine_ordering.php" class="cta-btn primary">Order Medicine</a>
                <a href="ai_assistant.php" class="cta-btn secondary">Chat with AI</a>
                <a href="donations.php" class="cta-btn secondary">Make a Donation</a>
            </div>
        </div>
    </section>

    <script src="js/script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const accountBtn = document.querySelector('.account-btn');
            const loggedInUser = JSON.parse(sessionStorage.getItem('loggedInUser'));
            
            if (loggedInUser) {
                if (loggedInUser.role === 'admin') {
                    accountBtn.textContent = 'ADMIN DASHBOARD';
                    accountBtn.href = 'admin.php';
                } else {
                    accountBtn.textContent = `Hi, ${loggedInUser.firstName.toUpperCase()}`;
                    accountBtn.href = 'user_dashboard.php'; // Placeholder for user profile page
                }

                // Add logout option
                const nav = document.querySelector('header nav ul');
                const logoutLi = document.createElement('li');
                const logoutLink = document.createElement('a');
                logoutLink.href = '#';
                logoutLink.textContent = 'LOGOUT';
                logoutLink.addEventListener('click', function(e) {
                    e.preventDefault();
                    sessionStorage.removeItem('loggedInUser');
                    alert('Logged out successfully.');
                    window.location.href = 'index.php';
                });
                logoutLi.appendChild(logoutLink);
                nav.appendChild(logoutLi);
            } else {
                accountBtn.textContent = 'MY ACCOUNT';
                accountBtn.href = 'login.php';
            }
        });
    </script>
<?php include 'footer.php'; ?>
