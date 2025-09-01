<?php $pageTitle = "Find Your Medicine Right Here!"; include 'header.php'; ?>
    <style>
        /* Medicine Ordering Page Specific Styles */
        .medicine-hero {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--bg-medium) 100%);
            padding: 80px 0;
            color: var(--text-white);
            text-align: center;
        }
        
        .medicine-hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .medicine-hero h1 span {
            color: var(--accent-blue);
        }
        
        .medicine-hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
        }
        
        .search-section {
            background: var(--bg-light);
            padding: 60px 0;
            color: var(--text-dark);
        }
        
        .search-container {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }
        
        .search-bar {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            align-items: center;
        }
        
        .search-input {
            flex: 1;
            padding: 15px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 25px;
            font-size: 1rem;
            background: white;
            color: var(--text-dark);
        }
        
        .search-input:focus {
            outline: none;
            border-color: var(--btn-primary);
        }
        
        .search-btn {
            background: var(--btn-accent);
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .search-btn:hover {
            background: var(--btn-secondary);
        }
        
        .category-filters {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
            margin-bottom: 3rem;
        }
        
        .category-btn {
            background: white;
            color: var(--text-dark);
            padding: 10px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }
        
        .category-btn.active,
        .category-btn:hover {
            background: var(--btn-primary);
            color: white;
            border-color: var(--btn-primary);
        }
        
        .medicine-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
            padding: 0 2rem;
        }
        
        .medicine-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        }
        
        .medicine-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        
        .medicine-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, var(--accent-light) 0%, var(--bg-light) 100%);
            border-radius: 10px;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
        }
        
        .medicine-info {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }
        
        .medicine-name {
            font-weight: 600;
            color: var(--text-dark);
            font-size: 1.1rem;
        }
        
        .add-to-cart-btn {
            background: var(--btn-light);
            color: var(--text-dark);
            border: none;
            padding: 8px 16px;
            border-radius: 15px;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .add-to-cart-btn:hover {
            background: var(--btn-accent);
            color: white;
        }
        
        .medicine-price {
            font-weight: 700;
            color: var(--text-dark);
            font-size: 1.2rem;
        }
        
        .medicine-status {
            font-size: 1rem;
            color: var(--text-dark);
            font-weight: 500;
        }
        
        .status-sold-out {
            color: var(--status-error);
        }
        
        .status-quick-seller {
            color: var(--status-success);
        }
        
        .status-discount {
            color: var(--status-warning);
        }
        
        /* Cart Section */
        .cart-section {
            position: fixed;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            max-width: 300px;
            z-index: 1000;
            display: none;
        }
        
        .cart-section.active {
            display: block;
        }
        
        .cart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .cart-title {
            font-weight: 700;
            color: var(--text-dark);
        }
        
        .cart-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-dark);
        }
        
        .cart-items {
            max-height: 300px;
            overflow-y: auto;
        }
        
        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .cart-total {
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 2px solid #e0e0e0;
            font-weight: 700;
            color: var(--text-dark);
        }
        
        .checkout-btn {
            width: 100%;
            background: var(--btn-primary);
            color: white;
            padding: 12px;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            margin-top: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .checkout-btn:hover {
            background: var(--primary-medium);
        }
        
        .cart-toggle {
            position: fixed;
            top: 100px;
            right: 20px;
            background: var(--btn-primary);
            color: white;
            border: none;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            font-size: 1.5rem;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            z-index: 999;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .medicine-hero h1 {
                font-size: 2.5rem;
            }
            
            .search-bar {
                flex-direction: column;
                gap: 1rem;
            }
            
            .search-input {
                width: 100%;
            }
            
            .medicine-grid {
                grid-template-columns: 1fr;
                padding: 0 1rem;
            }
            
            .cart-section {
                position: fixed;
                top: 50%;
                left: 50%;
                right: auto;
                transform: translate(-50%, -50%);
                width: 90%;
                max-width: 350px;
            }
            
            .cart-toggle {
                top: 80px;
                right: 15px;
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
            }
        }
        
        @media (max-width: 480px) {
            .medicine-hero h1 {
                font-size: 2rem;
            }
            
            .medicine-hero p {
                font-size: 1rem;
            }
            
            .category-filters {
                gap: 0.5rem;
            }
            
            .category-btn {
                padding: 8px 16px;
                font-size: 0.9rem;
            }
            
            .medicine-card {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="medicine-hero">
        <div class="container">
            <h1>Find your <span>Medicine</span> Right here!</h1>
            <p>Our platform lets verified sellers list essential medical products, from prescriptions to wellness items. Seniors can easily browse, compare, and order—all in one safe and accessible place.</p>
        </div>
    </section>

    <!-- Search Section -->
    <section class="search-section">
        <div class="container">
            <div class="search-container">
                <div class="search-bar">
                    <input type="text" class="search-input" placeholder="Type any of your required order here">
                    <button class="search-btn">Search</button>
                </div>
                
                <div class="category-filters">
                    <button class="category-btn active">All</button>
                    <button class="category-btn">Prescriptions</button>
                    <button class="category-btn">Over-the-Counter</button>
                    <button class="category-btn">Vitamins</button>
                    <button class="category-btn">Medical Supplies</button>
                </div>
                
                <h2>Popular Items</h2>
                
                <div class="medicine-grid">
                    <div class="medicine-card">
                        <img src="images/services/medicine.jpg" alt="Panadol" class="medicine-img">
                        <h3 class="medicine-name">Panadol</h3>
                        <p class="medicine-description">Relieves pain and reduces fever. A household essential.</p>
                        <div class="medicine-price">500.00 Rs</div>
                        <div class="medicine-status status-quick-seller">Quick seller</div>
                        <button class="add-to-cart-btn">Add to cart</button>
                    </div>
                    
                    <div class="medicine-card">
                        <img src="images/services/medicine.jpg" alt="Amoxicillin" class="medicine-img">
                        <h3 class="medicine-name">Amoxicillin</h3>
                        <p class="medicine-description">Antibiotic used to treat a wide range of bacterial infections.</p>
                        <div class="medicine-price">1250.00 Rs</div>
                        <div class="medicine-status status-discount">20% off</div>
                        <button class="add-to-cart-btn">Add to cart</button>
                    </div>
                    
                    <div class="medicine-card">
                        <img src="images/services/medicine.jpg" alt="Ventolin Inhaler" class="medicine-img">
                        <h3 class="medicine-name">Ventolin Inhaler</h3>
                        <p class="medicine-description">Used for the relief of asthma symptoms and other respiratory issues.</p>
                        <div class="medicine-price">5300.00 Rs</div>
                        <div class="medicine-status status-sold-out">Sold out</div>
                        <button class="add-to-cart-btn" disabled>Sold out</button>
                    </div>
                    
                    <div class="medicine-card">
                        <img src="images/services/medicine.jpg" alt="Cetirizine" class="medicine-img">
                        <h3 class="medicine-name">Cetirizine</h3>
                        <p class="medicine-description">An antihistamine used to relieve allergy symptoms like sneezing and runny nose.</p>
                        <div class="medicine-price">250.00 Rs</div>
                        <button class="add-to-cart-btn">Add to cart</button>
                    </div>
                    
                    <div class="medicine-card">
                        <img src="images/services/medicine.jpg" alt="Loratadine" class="medicine-img">
                        <h3 class="medicine-name">Loratadine</h3>
                        <p class="medicine-description">Provides non-drowsy relief from symptoms of seasonal allergies.</p>
                        <div class="medicine-price">450.00 Rs</div>
                        <button class="add-to-cart-btn">Add to cart</button>
                    </div>
                    
                    <div class="medicine-card">
                        <img src="images/services/medicine.jpg" alt="Ibuprofen" class="medicine-img">
                        <h3 class="medicine-name">Ibuprofen</h3>
                        <p class="medicine-description">Reduces pain, fever, and inflammation. Common pain reliever.</p>
                        <div class="medicine-price">800.00 Rs</div>
                        <button class="add-to-cart-btn">Add to cart</button>
                    </div>
                    
                    <div class="medicine-card">
                        <img src="images/services/medicine.jpg" alt="Omeprazole" class="medicine-img">
                        <h3 class="medicine-name">Omeprazole</h3>
                        <p class="medicine-description">Treats heartburn and other symptoms of acid reflux disease.</p>
                        <div class="medicine-price">1200.00 Rs</div>
                        <button class="add-to-cart-btn">Add to cart</button>
                    </div>
                    
                    <div class="medicine-card">
                        <img src="images/services/medicine.jpg" alt="Paracetamol" class="medicine-img">
                        <h3 class="medicine-name">Paracetamol</h3>
                        <p class="medicine-description">Effective for pain relief and reducing fever, similar to Panadol.</p>
                        <div class="medicine-price">350.00 Rs</div>
                        <button class="add-to-cart-btn">Add to cart</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cart Toggle Button -->
    <button class="cart-toggle" onclick="toggleCart()">🛒 <span id="cartItemCount">0</span></button>

    <!-- Cart Section -->
    <div class="cart-section" id="cartSection">
        <div class="cart-header">
            <div class="cart-title">Shopping Cart</div>
            <button class="cart-close" onclick="toggleCart()">×</button>
        </div>
        <div class="cart-items" id="cartItems">
            <!-- Cart items will be dynamically added here -->
            <div class="cart-item">
                <span>Medicine Name</span>
                <div class="cart-item-controls">
                    <button>-</button>
                    <span>1</span>
                    <button>+</button>
                    <button class="remove-item">X</button>
                </div>
                <span>100.00 Rs</span>
            </div>
        </div>
        <div class="cart-summary">
            <div class="cart-total">
                Total: <span id="cartTotal">0.00 Rs</span>
            </div>
            <button class="checkout-btn">Proceed to Checkout</button>
        </div>
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

            // Cart functionality
            let cart = [];
            let cartTotal = 0;

            function toggleCart() {
                const cartSection = document.getElementById('cartSection');
                cartSection.classList.toggle('active');
            }

            function addToCart(name, price) {
                cart.push({ name, price });
                cartTotal += price;
                updateCartDisplay();
            }

            function updateCartDisplay() {
                const cartItems = document.getElementById('cartItems');
                const cartTotalElement = document.getElementById('cartTotal');
                
                cartItems.innerHTML = '';
                cart.forEach((item, index) => {
                    const itemElement = document.createElement('div');
                    itemElement.className = 'cart-item';
                    itemElement.innerHTML = `
                        <span>${item.name}</span>
                        <span>${item.price.toFixed(2)} Rs</span>
                    `;
                    cartItems.appendChild(itemElement);
                });
                
                cartTotalElement.textContent = cartTotal.toFixed(2) + ' Rs';
            }

            // Add event listeners to all "Add to cart" buttons
            const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const card = this.closest('.medicine-card');
                    const name = card.querySelector('.medicine-name').textContent;
                    const priceText = card.querySelector('.medicine-price').textContent;
                    const price = parseFloat(priceText.replace('Rs', '').replace(',', ''));
                    
                    addToCart(name, price);
                    this.textContent = 'Added!';
                    this.style.background = 'var(--status-success)';
                    this.style.color = 'white';
                    
                    setTimeout(() => {
                        this.textContent = 'Add to cart';
                        this.style.background = 'var(--btn-light)';
                        this.style.color = 'var(--text-dark)';
                    }, 1000);
                });
            });
        });
    </script>
<?php include 'footer.php'; ?>
