<footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-newsletter">
                    <div class="logo">
                        <img src="images/main/1.svg" alt="HelloDoc Logo" class="logo-icon">
                        HelloDoc
                    </div>
                    <p>Stay in the loop and sign up for the HelloDoc Newsletter</p>
                    <div class="newsletter-form">
                        <input type="email" placeholder="Enter your email">
                        <button type="submit">→</button>
                    </div>
                </div>
                
                <div class="footer-links">
                    <div class="link-column">
                        <h4>Company</h4>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="services.php">Our HelpMe Services</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                    <div class="link-column">
                        <h4>Documentation</h4>
                        <ul>
                            <li><a href="help_centre.php">Help Centre</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="faq.php">FAQ</a></li>
                            <li><a href="privacy_policy.php">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="link-column">
                        <h4>Social</h4>
                        <ul>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Instagram</a></li>
                            <li><a href="#">Youtube</a></li>
                            <li><a href="#">Twitter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>© HelloDoc All Rights Reserved 2025</p>
                <a href="#">Terms & Conditions</a>
            </div>
        </div>
    </footer>

    <!-- Fixed Chatbot -->
    <div class="fixed-chatbot">
        <div class="chatbot-bubble">Hi! Want some assistance?</div>
        <a href="ai_assistant.php" class="chatbot-icon">
            <img src="images/main/7.png" alt="AI Assistant">
        </a>
    </div>

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
                    accountBtn.href = 'user_dashboard.php'; // Link to user dashboard
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
    <!-- Judge's Panel -->
    <div class="judge-panel">
        <h3>Judge's Test Panel</h3>
        <button id="loginTestUserBtn">Login as Test User</button>
        <button id="loginTestAdminBtn">Login as Test Admin</button>
        <button id="logoutBtn">Logout</button>
        <button id="goToUserDashboardBtn">Go to User Dashboard</button>
        <button id="goToAdminDashboardBtn">Go to Admin Dashboard</button>
    </div>
</body>
</html>
