js.main


// Main JavaScript File
class ApnaChaiWala {
    constructor() {
        this.cart = [];
        this.products = [];
        this.currentSlide = 0;
        this.init();
    }

    init() {
        this.bindEvents();
        this.loadProducts();
        this.updateCartCount();
        this.initTestimonialSlider();
    }

    bindEvents() {
        // Mobile menu toggle
        document.querySelector('.menu-toggle')?.addEventListener('click', () => {
            document.querySelector('.nav-links').classList.toggle('active');
        });

        // Close mobile menu when clicking on links
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                document.querySelector('.nav-links').classList.remove('active');
            });
        });

        // Header scroll effect
        window.addEventListener('scroll', () => {
            const header = document.querySelector('.header');
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Search functionality
        document.getElementById('searchInput')?.addEventListener('input', (e) => {
            this.searchProducts(e.target.value);
        });

        // Contact form submission
        document.getElementById('contactForm')?.addEventListener('submit', (e) => {
            this.submitContactForm(e);
        });
    }

    async loadProducts() {
        try {
            // In a real application, this would be an API call
            const response = await fetch('includes/api.php?action=get_products');
            const data = await response.json();
            
            if (data.success) {
                this.products = data.products;
                this.displayProducts(this.products);
            } else {
                console.error('Failed to load products');
            }
        } catch (error) {
            console.error('Error loading products:', error);
            // Fallback to static products
            this.loadStaticProducts();
        }
    }

    loadStaticProducts() {
        // Static product data as fallback
        this.products = [
            {
                id: 1,
                name: "Masala Chai",
                description: "Traditional Indian tea with aromatic spices and milk.",
                price: 25,
                image: "https://images.unsplash.com/photo-1565299624946-b28f40a0ca4b?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
                category: "Hot Beverages",
                is_featured: true
            },
            {
                id: 2,
                name: "Cold Coffee",
                description: "Chilled coffee with ice cream and chocolate topping.",
                price: 80,
                image: "https://images.unsplash.com/photo-1551024506-0bccd828d307?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
                category: "Cold Beverages",
                is_featured: true
            },
            {
                id: 3,
                name: "Veg Burger",
                description: "Delicious veg patty with fresh vegetables and sauces.",
                price: 60,
                image: "https://images.unsplash.com/photo-1551782450-17144efb9c50?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
                category: "Fast Food",
                is_featured: true
            },
            {
                id: 4,
                name: "Cheese Sandwich",
                description: "Grilled sandwich with melted cheese and vegetables.",
                price: 50,
                image: "https://images.unsplash.com/photo-1568901346375-23c9450c58cd?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
                category: "Fast Food",
                is_featured: false
            },
            {
                id: 5,
                name: "Oreo Shake",
                description: "Creamy milkshake with crushed Oreo cookies.",
                price: 120,
                image: "https://images.unsplash.com/photo-1572802419224-296b0aeee0d9?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
                category: "Cold Beverages",
                is_featured: true
            },
            {
                id: 6,
                name: "Samosa",
                description: "Crispy pastry filled with spiced potatoes and peas.",
                price: 20,
                image: "https://images.unsplash.com/photo-1601050690597-df0568f70950?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80",
                category: "Snacks",
                is_featured: false
            }
        ];
        this.displayProducts(this.products);
    }

    displayProducts(products) {
        const foodGrid = document.getElementById('foodGrid');
        if (!foodGrid) return;

        foodGrid.innerHTML = products.map(product => `
            <div class="food-card" data-category="${product.category}">
                <div class="card-image">
                    <img src="${product.image}" alt="${product.name}" loading="lazy">
                    <div class="card-overlay">
                        <button class="btn-quick-view" onclick="app.quickView(${product.id})">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    ${product.is_featured ? `
                        <div class="featured-badge">
                            <i class="fas fa-star"></i>
                            Featured
                        </div>
                    ` : ''}
                </div>
                <div class="card-content">
                    <h3 class="card-title">${product.name}</h3>
                    <p class="card-description">${product.description}</p>
                    <div class="card-footer">
                        <div class="price">₹${product.price}</div>
                        <button class="btn-add-cart" onclick="app.addToCart(${product.id})">
                            <i class="fas fa-plus"></i>
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        `).join('');
    }

    searchProducts(query) {
        if (!query.trim()) {
            this.displayProducts(this.products);
            return;
        }

        const filteredProducts = this.products.filter(product =>
            product.name.toLowerCase().includes(query.toLowerCase()) ||
            product.description.toLowerCase().includes(query.toLowerCase()) ||
            product.category.toLowerCase().includes(query.toLowerCase())
        );

        this.displayProducts(filteredProducts);
    }

    addToCart(productId) {
        const product = this.products.find(p => p.id === productId);
        if (!product) return;

        // Get current cart from session storage or initialize
        let cart = JSON.parse(sessionStorage.getItem('cart')) || [];
        
        // Check if product already in cart
        const existingItem = cart.find(item => item.id === productId);
        
        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cart.push({
                ...product,
                quantity: 1
            });
        }

        // Save to session storage
        sessionStorage.setItem('cart', JSON.stringify(cart));
        
        // Update UI
        this.updateCartCount();
        this.showNotification(`${product.name} added to cart!`, 'success');
        
        // If cart sidebar is open, update it
        if (document.getElementById('cartSidebar').classList.contains('open')) {
            this.loadCart();
        }
    }

    removeFromCart(productId) {
        let cart = JSON.parse(sessionStorage.getItem('cart')) || [];
        cart = cart.filter(item => item.id !== productId);
        sessionStorage.setItem('cart', JSON.stringify(cart));
        
        this.updateCartCount();
        this.loadCart();
        this.showNotification('Item removed from cart', 'warning');
    }

    updateCartQuantity(productId, change) {
        let cart = JSON.parse(sessionStorage.getItem('cart')) || [];
        const item = cart.find(item => item.id === productId);
        
        if (item) {
            item.quantity += change;
            
            if (item.quantity <= 0) {
                this.removeFromCart(productId);
                return;
            }
            
            sessionStorage.setItem('cart', JSON.stringify(cart));
            this.loadCart();
        }
    }

    loadCart() {
        const cart = JSON.parse(sessionStorage.getItem('cart')) || [];
        const cartItems = document.getElementById('cartItems');
        const cartTotal = document.getElementById('cartTotal');
        
        if (!cartItems) return;

        if (cart.length === 0) {
            cartItems.innerHTML = `
                <div class="cart-empty">
                    <i class="fas fa-shopping-cart"></i>
                    <p>Your cart is empty</p>
                    <button class="btn btn-primary" onclick="app.scrollToMenu()">Browse Menu</button>
                </div>
            `;
            cartTotal.textContent = '0';
            return;
        }

        let total = 0;
        cartItems.innerHTML = cart.map(item => {
            const itemTotal = item.price * item.quantity;
            total += itemTotal;
            
            return `
                <div class="cart-item">
                    <div class="cart-item-image">
                        <img src="${item.image}" alt="${item.name}">
                    </div>
                    <div class="cart-item-details">
                        <div class="cart-item-name">${item.name}</div>
                        <div class="cart-item-price">₹${item.price}</div>
                    </div>
                    <div class="cart-item-actions">
                        <button class="quantity-btn" onclick="app.updateCartQuantity(${item.id}, -1)">-</button>
                        <span class="cart-item-quantity">${item.quantity}</span>
                        <button class="quantity-btn" onclick="app.updateCartQuantity(${item.id}, 1)">+</button>
                        <button class="remove-item" onclick="app.removeFromCart(${item.id})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            `;
        }).join('');

        cartTotal.textContent = total.toFixed(2);
    }

    updateCartCount() {
        const cart = JSON.parse(sessionStorage.getItem('cart')) || [];
        const cartCount = document.querySelector('.cart-count');
        if (cartCount) {
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            cartCount.textContent = totalItems;
            cartCount.style.display = totalItems > 0 ? 'block' : 'none';
        }
    }

    toggleCart() {
        const cartSidebar = document.getElementById('cartSidebar');
        cartSidebar.classList.toggle('open');
        
        if (cartSidebar.classList.contains('open')) {
            this.loadCart();
        }
    }

    async quickView(productId) {
        const product = this.products.find(p => p.id === productId);
        if (!product) return;

        const modalContent = document.getElementById('quickViewContent');
        modalContent.innerHTML = `
            <div class="quick-view-content">
                <div class="quick-view-image">
                    <img src="${product.image}" alt="${product.name}">
                </div>
                <div class="quick-view-details">
                    <h2>${product.name}</h2>
                    <p class="product-category">${product.category}</p>
                    <p class="product-description">${product.description}</p>
                    <div class="product-price">₹${product.price}</div>
                    <div class="quick-view-actions">
                        <button class="btn btn-primary" onclick="app.addToCart(${product.id}); app.closeModal('quickViewModal')">
                            <i class="fas fa-plus"></i>
                            Add to Cart
                        </button>
                        <button class="btn btn-secondary" onclick="app.closeModal('quickViewModal')">
                            Continue Shopping
                        </button>
                    </div>
                </div>
            </div>
        `;

        this.openModal('quickViewModal');
    }

    openModal(modalId) {
        document.getElementById(modalId).style.display = 'block';
        document.body.style.overflow = 'hidden';
    }

    closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    async submitContactForm(e) {
        e.preventDefault();
        const form = e.target;
        const formData = new FormData(form);
        
        try {
            const response = await fetch('includes/api.php?action=contact', {
                method: 'POST',
                body: formData
            });
            
            const data = await response.json();
            
            if (data.success) {
                this.showNotification('Message sent successfully! We will get back to you soon.', 'success');
                form.reset();
            } else {
                this.showNotification('Failed to send message. Please try again.', 'error');
            }
        } catch (error) {
            console.error('Error sending message:', error);
            this.showNotification('Network error. Please try again.', 'error');
        }
    }

    async subscribeNewsletter(e) {
        e.preventDefault();
        const form = e.target;
        const email = form.querySelector('input[type="email"]').value;
        
        // Simulate API call
        setTimeout(() => {
            this.showNotification('Thank you for subscribing to our newsletter!', 'success');
            form.reset();
        }, 1000);
    }

    checkout() {
        const cart = JSON.parse(sessionStorage.getItem('cart')) || [];
        
        if (cart.length === 0) {
            this.showNotification('Your cart is empty!', 'warning');
            return;
        }

        const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        
        // Simulate checkout process
        this.showNotification(`Order placed successfully! Total: ₹${total.toFixed(2)}`, 'success');
        
        // Clear cart
        sessionStorage.removeItem('cart');
        this.updateCartCount();
        this.loadCart();
        this.toggleCart();
    }

    filterCategory(category) {
        const filteredProducts = category === 'all' 
            ? this.products 
            : this.products.filter(product => product.category === category);
        
        this.displayProducts(filteredProducts);
        
        // Update active category button
        document.querySelectorAll('.category-card').forEach(card => {
            card.classList.remove('active');
        });
        event.currentTarget.classList.add('active');
    }

    initTestimonialSlider() {
        this.testimonialTrack = document.getElementById('testimonialTrack');
        this.testimonialSlides = document.querySelectorAll('.testimonial-slide');
        this.slideCount = this.testimonialSlides.length;
        this.currentSlide = 0;
        
        // Auto slide every 5 seconds
        setInterval(() => {
            this.moveTestimonial(1);
        }, 5000);
    }

    moveTestimonial(direction) {
        this.currentSlide = (this.currentSlide + direction + this.slideCount) % this.slideCount;
        const translateX = -this.currentSlide * 100;
        this.testimonialTrack.style.transform = `translateX(${translateX}%)`;
    }

    scrollToMenu() {
        document.getElementById('menu').scrollIntoView({ 
            behavior: 'smooth' 
        });
    }

    showNotification(message, type = 'success') {
        const notification = document.getElementById('notification');
        notification.textContent = message;
        notification.className = `notification ${type} show`;
        
        setTimeout(() => {
            notification.classList.remove('show');
        }, 3000);
    }

    // Utility function to format currency
    formatCurrency(amount) {
        return new Intl.NumberFormat('en-IN', {
            style: 'currency',
            currency: 'INR'
        }).format(amount);
    }
}

// Initialize the application
const app = new ApnaChaiWala();

// Global functions for HTML onclick attributes
function addToCart(productId) {
    app.addToCart(productId);
}

function removeFromCart(productId) {
    app.removeFromCart(productId);
}

function updateCartQuantity(productId, change) {
    app.updateCartQuantity(productId, change);
}

function toggleCart() {
    app.toggleCart();
}

function quickView(productId) {
    app.quickView(productId);
}

function closeModal(modalId) {
    app.closeModal(modalId);
}

function filterCategory(category) {
    app.filterCategory(category);
}

function searchProducts() {
    const searchInput = document.getElementById('searchInput');
    app.searchProducts(searchInput.value);
}

function moveTestimonial(direction) {
    app.moveTestimonial(direction);
}

function scrollToMenu() {
    app.scrollToMenu();
}

function submitContactForm(e) {
    app.submitContactForm(e);
}

function subscribeNewsletter(e) {
    app.subscribeNewsletter(e);
}

function checkout() {
    app.checkout();
}

// Hide loading spinner when page is loaded
window.addEventListener('load', () => {
    const loadingSpinner = document.getElementById('loading');
    if (loadingSpinner) {
        loadingSpinner.classList.add('hidden');
        setTimeout(() => {
            loadingSpinner.style.display = 'none';
        }, 500);
    }
});

// Handle page visibility change
document.addEventListener('visibilitychange', () => {
    if (!document.hidden) {
        app.updateCartCount();
    }
});
