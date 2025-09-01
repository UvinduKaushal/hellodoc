<?php $pageTitle = "Customer Login Center"; include 'header.php'; ?>
    <style>
        /* Modern Login Page Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #667eea 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
        }

        /* Animated Background */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(120, 219, 255, 0.3) 0%, transparent 50%);
            animation: backgroundShift 15s ease-in-out infinite;
        }

        @keyframes backgroundShift {
            0%, 100% { transform: translateX(0) translateY(0); }
            25% { transform: translateX(-10px) translateY(-10px); }
            50% { transform: translateX(10px) translateY(-5px); }
            75% { transform: translateX(-5px) translateY(10px); }
        }

        /* Floating Particles */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .particle:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .particle:nth-child(2) {
            width: 60px;
            height: 60px;
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }

        .particle:nth-child(3) {
            width: 40px;
            height: 40px;
            top: 40%;
            left: 80%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        /* Header */
        header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            z-index: 10;
        }

        .logo {
            color: white;
            font-weight: 700;
            font-size: 1.5rem;
        }

        .logo-icon {
            filter: brightness(0) invert(1);
        }

        nav ul li a {
            color: white !important;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        nav ul li a:hover {
            color: #a8d0ff !important;
            transform: translateY(-2px);
        }

        .account-btn {
            background: rgba(255, 255, 255, 0.2) !important;
            border: 1px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .account-btn:hover {
            background: rgba(255, 255, 255, 0.3) !important;
            transform: translateY(-2px);
        }

        /* Login Container */
        .login-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            z-index: 2;
        }

        .login-form {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            padding: 3.5rem;
            border-radius: 30px;
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.25),
                0 0 0 1px rgba(255, 255, 255, 0.3);
            max-width: 480px;
            width: 100%;
            color: var(--text-dark);
            position: relative;
            overflow: hidden;
            animation: slideInUp 0.8s ease-out;
        }

        .login-form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2, #667eea);
            background-size: 200% 100%;
            animation: gradientShift 3s ease-in-out infinite;
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-form h2 {
            text-align: center;
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .login-form p {
            text-align: center;
            color: #666;
            margin-bottom: 2.5rem;
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 1.8rem;
            position: relative;
        }

        .form-group input {
            width: 100%;
            padding: 18px 20px 18px 60px;
            border: 2px solid #e8e8e8;
            border-radius: 15px;
            font-size: 1rem;
            background: rgba(255, 255, 255, 0.9);
            color: var(--text-dark);
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .form-group input::placeholder {
            color: #999;
            font-weight: 400;
        }

        .form-group::before {
            content: '';
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            width: 24px;
            height: 24px;
            background-size: contain;
            background-repeat: no-repeat;
            opacity: 0.6;
            transition: opacity 0.3s ease;
        }

        .form-group:focus-within::before {
            opacity: 1;
        }

        .form-group.username::before {
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23667eea"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>');
        }

        .form-group.password::before {
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23667eea"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg>');
        }

        .forgot-password {
            text-align: right;
            margin-bottom: 2rem;
        }

        .forgot-password a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .forgot-password a:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        .login-btn {
            width: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 18px;
            border: none;
            border-radius: 15px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }

        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .login-btn:hover::before {
            left: 100%;
        }

        .login-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .login-btn:active {
            transform: translateY(-1px);
        }

        .login-links {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1.5rem;
            border-top: 1px solid #e8e8e8;
        }

        .login-links a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            padding: 8px 12px;
            border-radius: 8px;
        }

        .login-links a:hover {
            color: #764ba2;
            background: rgba(102, 126, 234, 0.1);
            transform: translateY(-1px);
        }

        /* Social Login */
        .social-login {
            margin-top: 2rem;
            text-align: center;
        }

        .social-login p {
            color: #666;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        .social-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }

        .social-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 2px solid #e8e8e8;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1.2rem;
        }

        .social-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-color: #667eea;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .login-container {
                padding: 1rem;
            }
            
            .login-form {
                padding: 2.5rem 2rem;
                margin: 1rem;
            }
            
            .login-form h2 {
                font-size: 1.8rem;
            }

            .particle {
                display: none;
            }
        }
        
        @media (max-width: 480px) {
            .login-form {
                padding: 2rem 1.5rem;
            }
            
            .login-form h2 {
                font-size: 1.6rem;
            }
            
            .form-group input {
                padding: 15px 15px 15px 50px;
            }
            
            .login-links {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .social-buttons {
                flex-wrap: wrap;
            }
        }

        /* Loading Animation */
        .loading {
            display: none;
            width: 20px;
            height: 20px;
            border: 2px solid #ffffff;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
    <!-- Animated Background Particles -->
    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="logo">
                <img src="images/main/1.svg" alt="HelloDoc Logo" class="logo-icon">
                HelloDoc
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="services.php">SERVICES</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="donations.php">DONATIONS</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                </ul>
            </nav>
            <a href="login.php" class="account-btn">MY ACCOUNT</a>
        </div>
    </header>

    <!-- Login Form -->
    <div class="login-container">
        <div class="login-form">
            <h2>Welcome Back</h2>
            <p>Sign in to access your HelloDoc account</p>
            <form id="loginForm" action="#" method="POST">
                <div class="form-group username">
                    <input type="text" id="loginEmail" placeholder="Username or Email" required>
                </div>
                <div class="form-group password">
                    <input type="password" id="loginPassword" placeholder="Password" required>
                </div>
                <div class="forgot-password">
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="login-btn">
                    <span class="btn-text">Sign In</span>
                    <div class="loading"></div>
                </button>
                <div class="login-links">
                    <a href="register.php">Create Account</a>
                    <a href="help_centre.php">Need Help?</a>
                </div>
            </form>
            
            <div class="social-login">
                <p>Or continue with</p>
                <div class="social-buttons">
                    <div class="social-btn">📧</div>
                    <div class="social-btn">📱</div>
                    <div class="social-btn">🔐</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Fixed Chatbot -->
    <div class="fixed-chatbot">
        <div class="chatbot-bubble">Hi! Need help logging in?</div>
        <a href="ai_assistant.php" class="chatbot-icon">
            <img src="images/main/7.png" alt="AI Assistant">
        </a>
    </div>

    <script>
        // Form submission with loading animation
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const btn = this.querySelector('.login-btn');
            const btnText = btn.querySelector('.btn-text');
            const loading = btn.querySelector('.loading');

            const emailInput = document.getElementById('loginEmail').value.trim();
            const passwordInput = document.getElementById('loginPassword').value.trim();

            // Show loading state
            btnText.style.display = 'none';
            loading.style.display = 'block';
            btn.disabled = true;
            
            fetch('backend/auth.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    action: 'login',
                    email: emailInput,
                    password: passwordInput
                })
            })
            .then(response => response.json())
            .then(data => {
                // Reset button state
                btnText.style.display = 'block';
                loading.style.display = 'none';
                btn.disabled = false;
                
                if (data.success) {
                    sessionStorage.setItem('loggedInUser', JSON.stringify(data.user));
                    alert(data.message + ' Welcome to HelloDoc!');
                    if (data.user.role === 'admin') {
                        window.location.href = 'admin.php'; // Redirect to admin dashboard
                    } else {
                        window.location.href = 'index.php'; // Redirect to home page
                    }
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred during login. Please try again.');
                // Reset button state on error
                btnText.style.display = 'block';
                loading.style.display = 'none';
                btn.disabled = false;
            });
        });

        // Add floating animation to form on load
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('.login-form');
            form.style.opacity = '0';
            form.style.transform = 'translateY(30px)';
            
            setTimeout(() => {
                form.style.transition = 'all 0.8s ease-out';
                form.style.opacity = '1';
                form.style.transform = 'translateY(0)';
            }, 100);
        });

        // Social button interactions
        document.querySelectorAll('.social-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = 'translateY(-3px)';
                }, 150);
            });
        });
    </script>
<?php include 'footer.php'; ?>
