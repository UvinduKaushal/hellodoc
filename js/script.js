// HelloDoc - Main JavaScript File

document.addEventListener('DOMContentLoaded', function() {
    // Initialize all components
    initTestimonialSlider();
    initCategoryFilters();
    initNewsletterForm();
    initSmoothScrolling();
    initMobileMenu();
    createTestAdminAccount(); // Initialize test admin account
    createTestUserAccount(); // Initialize test user account

    // Judge Panel Functionality
    const loginTestUserBtn = document.getElementById('loginTestUserBtn');
    const loginTestAdminBtn = document.getElementById('loginTestAdminBtn');
    const logoutBtn = document.getElementById('logoutBtn');
    const goToUserDashboardBtn = document.getElementById('goToUserDashboardBtn');
    const goToAdminDashboardBtn = document.getElementById('goToAdminDashboardBtn');

    if (loginTestUserBtn) {
        loginTestUserBtn.addEventListener('click', function() {
            const users = JSON.parse(localStorage.getItem('helldocUsers')) || [];
            const testUser = users.find(u => u.email === 'user@test.com');
            if (testUser) {
                sessionStorage.setItem('loggedInUser', JSON.stringify(testUser));
                alert('Logged in as Test User!');
                window.location.href = 'index.html';
            }
        });
    }

    if (loginTestAdminBtn) {
        loginTestAdminBtn.addEventListener('click', function() {
            const users = JSON.parse(localStorage.getItem('helldocUsers')) || [];
            const testAdmin = users.find(u => u.email === 'admin@test.com');
            if (testAdmin) {
                sessionStorage.setItem('loggedInUser', JSON.stringify(testAdmin));
                alert('Logged in as Test Admin!');
                window.location.href = 'admin.html';
            }
        });
    }

    if (logoutBtn) {
        logoutBtn.addEventListener('click', function() {
            sessionStorage.removeItem('loggedInUser');
            alert('Logged out!');
            window.location.href = 'index.html';
        });
    }

    if (goToUserDashboardBtn) {
        goToUserDashboardBtn.addEventListener('click', function() {
            window.location.href = 'user_dashboard.html';
        });
    }

    if (goToAdminDashboardBtn) {
        goToAdminDashboardBtn.addEventListener('click', function() {
            window.location.href = 'admin.html';
        });
    }
});

// Testimonial Slider Functionality
function initTestimonialSlider() {
    const testimonialSlider = document.querySelector('.testimonial-slider');
    const testimonialCards = document.querySelectorAll('.testimonial-card');
    const prevBtn = document.querySelector('.slider-arrow.prev');
    const nextBtn = document.querySelector('.slider-arrow.next');
    
    if (!testimonialSlider || !testimonialCards.length) return;
    
    let currentIndex = 0;
    const cardWidth = testimonialCards[0].offsetWidth + 32; // Card width + gap (2rem = 32px)
    
    function updateSlider() {
        testimonialSlider.style.transform = `translateX(${-currentIndex * cardWidth}px)`;
    }
    
    function nextTestimonial() {
        currentIndex = (currentIndex + 1) % testimonialCards.length;
        updateSlider();
    }
    
    function prevTestimonial() {
        currentIndex = (currentIndex - 1 + testimonialCards.length) % testimonialCards.length;
        updateSlider();
    }
    
    // Auto-advance testimonials
    setInterval(nextTestimonial, 5000);
    
    // Button controls
    if (prevBtn) prevBtn.addEventListener('click', prevTestimonial);
    if (nextBtn) nextBtn.addEventListener('click', nextTestimonial);
    
    // Initial slider position
    updateSlider();
}

// Category Filter Functionality
function initCategoryFilters() {
    const categoryButtons = document.querySelectorAll('.category-btn');
    
    categoryButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            categoryButtons.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            // Here you would typically filter the medicine items
            // For now, we'll just show a message
            const category = this.textContent;
            console.log(`Filtering by category: ${category}`);
        });
    });
}

// Newsletter Form Functionality
function initNewsletterForm() {
    const newsletterForm = document.querySelector('.newsletter-form');
    
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const emailInput = this.querySelector('input[type="email"]');
            const email = emailInput.value.trim();
            
            if (email && isValidEmail(email)) {
                // Simulate newsletter subscription
                alert('Thank you for subscribing to the HelloDoc newsletter!');
                emailInput.value = '';
            } else {
                alert('Please enter a valid email address.');
            }
        });
    }
}

// Email validation helper
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Smooth Scrolling for Navigation Links
function initSmoothScrolling() {
    const navLinks = document.querySelectorAll('nav a[href^="#"]');
    
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

// Mobile Menu Toggle
function initMobileMenu() {
    const header = document.querySelector('header');
    const nav = document.querySelector('nav');
    
    // Create mobile menu button
    const mobileMenuBtn = document.createElement('button');
    mobileMenuBtn.className = 'mobile-menu-btn';
    mobileMenuBtn.innerHTML = '☰';
    mobileMenuBtn.style.display = 'none';
    
    // Add mobile menu styles
    const mobileStyles = `
        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: block !important;
                background: none;
                border: none;
                font-size: 1.5rem;
                color: var(--text-white);
                cursor: pointer;
                padding: 0.5rem;
            }
            
            nav {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: var(--primary-dark);
                padding: 1rem;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            }
            
            nav.active {
                display: block;
            }
            
            nav ul {
                flex-direction: column;
                gap: 1rem;
            }
            
            nav ul li {
                text-align: center;
            }
        }
    `;
    
    // Add styles to document
    const styleSheet = document.createElement('style');
    styleSheet.textContent = mobileStyles;
    document.head.appendChild(styleSheet);
    
    // Insert mobile menu button
    header.querySelector('.container').appendChild(mobileMenuBtn);
    
    // Toggle mobile menu
    mobileMenuBtn.addEventListener('click', function() {
        nav.classList.toggle('active');
    });
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', function(e) {
        if (!header.contains(e.target)) {
            nav.classList.remove('active');
        }
    });
}

// Cart Functionality (for medicine ordering page)
function initCart() {
    let cart = JSON.parse(localStorage.getItem('helldocCart')) || [];
    let cartTotal = 0;
    let cartItemCount = 0;

    function saveCart() {
        localStorage.setItem('helldocCart', JSON.stringify(cart));
        updateCartDisplay();
    }

    function updateCartTotalAndCount() {
        cartTotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        cartItemCount = cart.reduce((count, item) => count + item.quantity, 0);
        document.getElementById('cartTotal').textContent = cartTotal.toFixed(2) + ' Rs';
        document.getElementById('cartItemCount').textContent = cartItemCount;
    }
    
    function addToCart(name, price, imageSrc) {
        const existingItemIndex = cart.findIndex(item => item.name === name);
        
        if (existingItemIndex > -1) {
            cart[existingItemIndex].quantity++;
        } else {
            cart.push({ id: Date.now(), name, price, imageSrc, quantity: 1 });
        }
        saveCart();
        showCartNotification(name);
    }
    
    function removeFromCart(id) {
        cart = cart.filter(item => item.id !== id);
        saveCart();
    }
    
    function changeQuantity(id, change) {
        const itemIndex = cart.findIndex(item => item.id === id);
        if (itemIndex > -1) {
            cart[itemIndex].quantity += change;
            if (cart[itemIndex].quantity <= 0) {
                removeFromCart(id);
            } else {
                saveCart();
            }
        }
    }

    function updateCartDisplay() {
        const cartItemsContainer = document.getElementById('cartItems');
        if (!cartItemsContainer) return;
        
        cartItemsContainer.innerHTML = '';
        if (cart.length === 0) {
            cartItemsContainer.innerHTML = '<p style="text-align: center; color: var(--text-grey);">Your cart is empty.</p>';
        } else {
            cart.forEach(item => {
                const itemElement = document.createElement('div');
                itemElement.className = 'cart-item';
                itemElement.innerHTML = `
                    <img src="${item.imageSrc}" alt="${item.name}" class="cart-item-img">
                    <div class="cart-item-info">
                        <span>${item.name}</span>
                        <span class="cart-item-price">${(item.price * item.quantity).toFixed(2)} Rs</span>
                    </div>
                    <div class="cart-item-controls">
                        <button class="quantity-btn minus-btn" data-id="${item.id}">-</button>
                        <span class="item-quantity">${item.quantity}</span>
                        <button class="quantity-btn plus-btn" data-id="${item.id}">+</button>
                        <button class="remove-item-btn" data-id="${item.id}">Remove</button>
                    </div>
                `;
                cartItemsContainer.appendChild(itemElement);
            });
        }
        updateCartTotalAndCount();
    }
    
    function showCartNotification(productName) {
        const notification = document.createElement('div');
        notification.className = 'cart-notification';
        notification.textContent = `${productName} added to cart!`;
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: var(--status-success);
            color: white;
            padding: 1rem 2rem;
            border-radius: 10px;
            z-index: 10000;
            animation: slideIn 0.3s ease;
        `;
        document.body.appendChild(notification);
        setTimeout(() => { notification.remove(); }, 3000);
    }

    // Event listeners for Add to Cart buttons on product cards
    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
        button.addEventListener('click', function() {
            const card = this.closest('.medicine-card');
            const name = card.querySelector('.medicine-name').textContent;
            const price = parseFloat(card.querySelector('.medicine-price').textContent.replace('Rs', '').replace(',', ''));
            const imageSrc = card.querySelector('.medicine-img').src;
            addToCart(name, price, imageSrc);
        });
    });

    // Event listeners for cart controls (inside cart-items container)
    document.getElementById('cartItems').addEventListener('click', function(event) {
        const target = event.target;
        if (target.classList.contains('plus-btn')) {
            const id = parseInt(target.dataset.id);
            changeQuantity(id, 1);
        } else if (target.classList.contains('minus-btn')) {
            const id = parseInt(target.dataset.id);
            changeQuantity(id, -1);
        } else if (target.classList.contains('remove-item-btn')) {
            const id = parseInt(target.dataset.id);
            removeFromCart(id);
        }
    });

    // Checkout button functionality
    document.querySelector('.checkout-btn').addEventListener('click', function() {
        if (cart.length > 0) {
            // Store cart data in session storage before redirecting
            sessionStorage.setItem('helldocLastOrder', JSON.stringify({ items: cart, total: cartTotal, timestamp: new Date().toISOString() }));
            
            cart = []; // Clear cart immediately
            saveCart(); // Save empty cart
            toggleCart(); // Close cart after checkout

            window.location.href = 'payment_processing.html'; // Redirect to payment processing page
        } else {
            alert('Your cart is empty. Please add items before checking out.');
        }
    });
    
    // Initialize cart display on page load
    updateCartTotalAndCount();
    updateCartDisplay();

    window.toggleCart = function() {
        const cartSection = document.getElementById('cartSection');
        if (cartSection) {
            cartSection.classList.toggle('active');
        }
    }
}

// Toggle Cart Function
function toggleCart() {
    const cartSection = document.getElementById('cartSection');
    if (cartSection) {
        cartSection.classList.toggle('active');
    }
}

// Donation Functionality
function donate() {
    // Simulate donation process
    const progressFill = document.querySelector('.progress-fill');
    if (progressFill) {
        const currentWidth = parseInt(progressFill.style.width) || 75;
        const newWidth = Math.min(currentWidth + 5, 100);
        progressFill.style.width = newWidth + '%';
    }
    
    // Store a flag for donation payment simulation
    sessionStorage.setItem('isDonationPayment', 'true');
    
    window.location.href = 'payment_processing.html'; // Redirect to payment processing page
}

// Search Functionality
function initSearch() {
    const searchInput = document.querySelector('.search-input');
    const searchBtn = document.querySelector('.search-btn');
    
    if (searchInput && searchBtn) {
        function performSearch() {
            const query = searchInput.value.trim();
            if (query) {
                // Simulate search functionality
                console.log(`Searching for: ${query}`);
                alert(`Searching for: ${query}`);
            }
        }
        
        searchBtn.addEventListener('click', performSearch);
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performSearch();
            }
        });
    }
}

// Initialize page-specific functionality
document.addEventListener('DOMContentLoaded', function() {
    // Initialize cart if on medicine ordering page
    if (document.querySelector('.medicine-grid') || document.querySelector('.product-cards')) {
        initCart();
    }
    
    // Initialize search if search input exists
    if (document.querySelector('.search-input')) {
        initSearch();
    }
    
    // Add CSS animations
    const animations = `
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in {
            animation: fadeIn 0.6s ease;
        }
    `;
    
    const styleSheet = document.createElement('style');
    styleSheet.textContent = animations;
    document.head.appendChild(styleSheet);
    
    // Add fade-in animation to cards
    const cards = document.querySelectorAll('.service-card, .testimonial-card, .medicine-card, .product-card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
        card.classList.add('fade-in');
    });
});

// Function to create a test admin account if it doesn't exist
function createTestAdminAccount() {
    let users = JSON.parse(localStorage.getItem('helldocUsers')) || [];
    const testAdminEmail = 'admin@test.com';

    if (!users.some(user => user.email === testAdminEmail)) {
        const testAdminUser = {
            firstName: 'Test',
            lastName: 'Admin',
            email: testAdminEmail,
            phone: '0712345678',
            birthdate: '1990-01-01',
            gender: 'male',
            role: 'admin',
            password: 'admin123'
        };
        users.push(testAdminUser);
        localStorage.setItem('helldocUsers', JSON.stringify(users));
        console.log('Test admin account created: admin@test.com / admin123');
    }
}

// Function to create a test regular user account if it doesn't exist
function createTestUserAccount() {
    let users = JSON.parse(localStorage.getItem('helldocUsers')) || [];
    const testUserEmail = 'user@test.com';

    if (!users.some(user => user.email === testUserEmail)) {
        const testUser = {
            firstName: 'Test',
            lastName: 'User',
            email: testUserEmail,
            phone: '0778765432',
            birthdate: '1995-05-05',
            gender: 'female',
            role: 'user',
            password: 'user123'
        };
        users.push(testUser);
        localStorage.setItem('helldocUsers', JSON.stringify(users));
        console.log('Test user account created: user@test.com / user123');
    }
}

// Chatbot functionality (if exists)
function initChatbot() {
    const chatbotBubble = document.querySelector('.chatbot-bubble');
    const chatbotIcon = document.querySelector('.chatbot-icon');
    
    if (chatbotBubble && chatbotIcon) {
        // Hide bubble on mobile
        if (window.innerWidth <= 768) {
            chatbotBubble.style.display = 'none';
        }
        
        // Show bubble on hover for desktop
        chatbotIcon.addEventListener('mouseenter', function() {
            if (window.innerWidth > 768) {
                chatbotBubble.style.opacity = '1';
            }
        });
        
        chatbotIcon.addEventListener('mouseleave', function() {
            if (window.innerWidth > 768) {
                chatbotBubble.style.opacity = '0';
            }
        });
    }
}

// Initialize chatbot
document.addEventListener('DOMContentLoaded', initChatbot);

// Window resize handler
window.addEventListener('resize', function() {
    const chatbotBubble = document.querySelector('.chatbot-bubble');
    if (chatbotBubble) {
        if (window.innerWidth <= 768) {
            chatbotBubble.style.display = 'none';
        } else {
            chatbotBubble.style.display = 'block';
        }
    }
});

// Prevent arrow key scrolling on the page globally
window.addEventListener('keydown', function(e) {
    if (['ArrowLeft', 'ArrowRight'].includes(e.key)) {
        e.preventDefault();
    }
}); 