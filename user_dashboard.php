<?php $pageTitle = "User Dashboard"; include 'header.php'; ?>
    <style>
        /* User Dashboard Page Specific Styles */
        .dashboard-hero {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--bg-medium) 100%);
            padding: 80px 0;
            color: var(--text-white);
            text-align: center;
        }

        .dashboard-hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .dashboard-hero p {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .dashboard-content {
            background: var(--bg-light);
            padding: 80px 0;
            color: var(--text-dark);
            min-height: 60vh;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 2rem;
            align-items: start;
        }

        .sidebar {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 2rem;
        }

        .sidebar h2 {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 1.5rem;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 1rem;
        }

        .sidebar ul li a {
            display: block;
            padding: 10px 15px;
            background: var(--bg-light);
            border-radius: 10px;
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .sidebar ul li a:hover,
        .sidebar ul li a.active {
            background: var(--btn-primary);
            color: white;
        }

        .main-content {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 2rem;
        }

        .main-content h2 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 1.5rem;
        }

        .dashboard-card {
            background: var(--bg-light);
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .dashboard-card h3 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 1rem;
        }

        .dashboard-card p {
            color: var(--text-dark);
            line-height: 1.6;
            font-size: 1.1rem;
        }

        .user-profile-summary {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: var(--bg-light);
            border-radius: 15px;
        }

        .profile-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: var(--accent-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
            flex-shrink: 0;
            overflow: hidden;
        }

        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-info h3 {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
        }

        .profile-info p {
            color: var(--text-dark);
            font-size: 1.1rem;
        }

        .dashboard-logout-btn {
            background: var(--status-error);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 2rem;
            display: inline-block;
        }

        .dashboard-logout-btn:hover {
            background: #cc0000;
        }

        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
            .sidebar {
                padding: 1.5rem;
            }
            .main-content {
                padding: 1.5rem;
            }
            .user-profile-summary {
                flex-direction: column;
                text-align: center;
            }
            .profile-avatar {
                margin-bottom: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="dashboard-hero">
        <div class="container">
            <h1>User Dashboard</h1>
            <p>Welcome to your personalized HelloDoc dashboard. Manage your appointments, orders, and profile.</p>
        </div>
    </section>

    <!-- Dashboard Content -->
    <section class="dashboard-content">
        <div class="container">
            <div class="dashboard-grid">
                <div class="sidebar">
                    <h2>Navigation</h2>
                    <ul>
                        <li><a href="#profile" class="active">My Profile</a></li>
                        <li><a href="#appointments">My Appointments</a></li>
                        <li><a href="#orders">My Orders</a></li>
                        <li><a href="#settings">Settings</a></li>
                    </ul>
                    <button class="dashboard-logout-btn" id="logoutBtn">Logout</button>
                </div>

                <div class="main-content">
                    <div id="profile">
                        <h2>My Profile</h2>
                        <div class="user-profile-summary">
                            <div class="profile-avatar"><img src="images/members/pfp.jpg" alt="User Avatar"></div>
                            <div class="profile-info">
                                <h3 id="userName">Guest User</h3>
                                <p id="userEmail">guest@example.com</p>
                                <p id="userRole">Role: User</p>
                            </div>
                        </div>
                        <div class="dashboard-card">
                            <h3>Personal Information</h3>
                            <p><strong>Full Name:</strong> <span id="profileFullName"></span></p>
                            <p><strong>Email:</strong> <span id="profileEmail"></span></p>
                            <p><strong>Phone:</strong> <span id="profilePhone"></span></p>
                            <p><strong>Date of Birth:</strong> <span id="profileBirthdate"></span></p>
                            <p><strong>Gender:</strong> <span id="profileGender"></span></p>
                        </div>
                    </div>

                    <div id="appointments" style="display: none;">
                        <h2>My Appointments</h2>
                        <p>You have no upcoming appointments.</p>
                        <!-- Dynamic appointments will be loaded here -->
                    </div>

                    <div id="orders" style="display: none;">
                        <h2>My Orders</h2>
                        <p>You have no past orders.</p>
                        <!-- Dynamic orders will be loaded here -->
                    </div>

                    <div id="settings" style="display: none;">
                        <h2>Settings</h2>
                        <div class="dashboard-card">
                            <h3>Change Password</h3>
                            <form id="changePasswordForm">
                                <div class="form-group">
                                    <label for="currentPassword">Current Password</label>
                                    <input type="password" id="currentPassword" required>
                                </div>
                                <div class="form-group">
                                    <label for="newPassword">New Password</label>
                                    <input type="password" id="newPassword" required>
                                </div>
                                <div class="form-group">
                                    <label for="confirmNewPassword">Confirm New Password</label>
                                    <input type="password" id="confirmNewPassword" required>
                                </div>
                                <button type="submit" class="cta-btn">Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
            // Dynamic navigation logic
            const accountBtn = document.querySelector('.account-btn');
            const loggedInUser = JSON.parse(sessionStorage.getItem('loggedInUser'));
            
            if (loggedInUser) {
                if (loggedInUser.role === 'admin') {
                    accountBtn.textContent = 'ADMIN DASHBOARD';
                    accountBtn.href = 'admin.php';
                } else {
                    accountBtn.textContent = `Hi, ${loggedInUser.firstName.toUpperCase()}`;
                    accountBtn.href = 'user_dashboard.php';
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

                // Populate user dashboard with logged-in user data
                document.getElementById('userName').textContent = `${loggedInUser.firstName} ${loggedInUser.lastName}`;
                document.getElementById('userEmail').textContent = loggedInUser.email;
                document.getElementById('userRole').textContent = `Role: ${loggedInUser.role}`;
                document.getElementById('profileFullName').textContent = `${loggedInUser.firstName} ${loggedInUser.lastName}`;
                document.getElementById('profileEmail').textContent = loggedInUser.email;
                document.getElementById('profilePhone').textContent = loggedInUser.phone;
                document.getElementById('profileBirthdate').textContent = loggedInUser.birthdate;
                document.getElementById('profileGender').textContent = loggedInUser.gender;

                // Handle logout button on dashboard
                document.getElementById('logoutBtn').addEventListener('click', function(e) {
                    e.preventDefault();
                    sessionStorage.removeItem('loggedInUser');
                    alert('Logged out successfully.');
                    window.location.href = 'index.php';
                });

                // Section navigation
                document.querySelectorAll('.sidebar ul li a').forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        document.querySelectorAll('.sidebar ul li a').forEach(navLink => navLink.classList.remove('active'));
                        this.classList.add('active');
                        const targetId = this.getAttribute('href').substring(1);
                        document.querySelectorAll('.main-content > div').forEach(section => {
                            section.style.display = 'none';
                        });
                        document.getElementById(targetId).style.display = 'block';

                        // Load dynamic content based on section
                        if (targetId === 'appointments') {
                            loadAppointments();
                        } else if (targetId === 'orders') {
                            loadOrders();
                        }
                    });
                });

                // Initial load of profile section
                document.getElementById('profile').style.display = 'block';

                // Function to load appointments
                async function loadAppointments() {
                    const appointmentsContainer = document.getElementById('appointments');
                    appointmentsContainer.innerHTML = '<h2>My Appointments</h2><p>Loading appointments...</p>';
                    
                    try {
                        const response = await fetch('backend/data.php', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({
                                action: 'getAppointments',
                                userId: loggedInUser.email
                            })
                        });
                        const data = await response.json();

                        appointmentsContainer.innerHTML = '<h2>My Appointments</h2>';
                        if (data.success && data.appointments.length > 0) {
                            data.appointments.forEach(app => {
                                const appointmentCard = document.createElement('div');
                                appointmentCard.className = 'dashboard-card';
                                appointmentCard.innerHTML = `
                                    <h3>${app.doctor}</h3>
                                    <p><strong>Date:</strong> ${app.date}</p>
                                    <p><strong>Time:</strong> ${app.time}</p>
                                    <p><strong>Reason:</strong> ${app.reason}</p>
                                    <a href="video_call.php" class="cta-btn join-call-btn">Join Call</a>
                                `;
                                appointmentsContainer.appendChild(appointmentCard);
                            });
                        } else {
                            appointmentsContainer.innerHTML += '<p>You have no upcoming appointments.</p>';
                        }
                    } catch (error) {
                        console.error('Error loading appointments:', error);
                        appointmentsContainer.innerHTML += '<p>Error loading appointments. Please try again.</p>';
                    }
                }

                // Function to load orders
                async function loadOrders() {
                    const ordersContainer = document.getElementById('orders');
                    ordersContainer.innerHTML = '<h2>My Orders</h2><p>Loading orders...</p>';

                    try {
                        const response = await fetch('backend/data.php', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({
                                action: 'getOrders',
                                userId: loggedInUser.email
                            })
                        });
                        const data = await response.json();

                        ordersContainer.innerHTML = '<h2>My Orders</h2>';
                        if (data.success && data.orders.length > 0) {
                            data.orders.forEach(order => {
                                const orderCard = document.createElement('div');
                                orderCard.className = 'dashboard-card';
                                const itemsHtml = order.items.map(item => `<li>${item.name} (x${item.quantity}) - ${item.price.toFixed(2)} Rs</li>`).join('');
                                orderCard.innerHTML = `
                                    <h3>Order ID: ${order.id}</h3>
                                    <p><strong>Date:</strong> ${new Date(order.timestamp).toLocaleDateString()}</p>
                                    <p><strong>Total:</strong> ${order.total.toFixed(2)} Rs</p>
                                    <p><strong>Items:</strong></p>
                                    <ul>${itemsHtml}</ul>
                                `;
                                ordersContainer.appendChild(orderCard);
                            });
                        } else {
                            ordersContainer.innerHTML += '<p>You have no past orders.</p>';
                        }
                    } catch (error) {
                        console.error('Error loading orders:', error);
                        ordersContainer.innerHTML += '<p>Error loading orders. Please try again.</p>';
                    }
                }

            } else {
                // Redirect to login if not logged in
                alert('You need to be logged in to access the dashboard.');
                window.location.href = 'login.php';
            }

            // Handle Change Password Form Submission
            const changePasswordForm = document.getElementById('changePasswordForm');
            if (changePasswordForm) {
                changePasswordForm.addEventListener('submit', async function(e) {
                    e.preventDefault();

                    const currentPassword = document.getElementById('currentPassword').value;
                    const newPassword = document.getElementById('newPassword').value;
                    const confirmNewPassword = document.getElementById('confirmNewPassword').value;

                    if (newPassword !== confirmNewPassword) {
                        alert('New password and confirm new password do not match.');
                        return;
                    }

                    try {
                        const response = await fetch('backend/auth.php', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({
                                action: 'changePassword',
                                email: loggedInUser.email,
                                currentPassword: currentPassword,
                                newPassword: newPassword
                            })
                        });
                        const data = await response.json();

                        if (data.success) {
                            alert(data.message);
                            loggedInUser.password = newPassword; // Update in session for immediate use (though not secure practice)
                            sessionStorage.setItem('loggedInUser', JSON.stringify(loggedInUser));
                            changePasswordForm.reset();
                        } else {
                            alert('Password change failed: ' + data.message);
                        }
                    } catch (error) {
                        console.error('Error changing password:', error);
                        alert('An error occurred during password change. Please try again.');
                    }
                });
            }
        });
    </script>
<?php include 'footer.php'; ?>
