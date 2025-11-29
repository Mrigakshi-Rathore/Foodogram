<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help & Support - Foodogram</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('images/bgImg.jpeg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex: 1;
            padding: 2rem 0;
        }

        /* Header Styles */
        header {
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        #logo {
            height: 135px;
            width: 135px;
            margin-top: 0;
            margin-left: 15px;
            border-radius: 50%;
        }

        .header-search-form {
            max-width: 1000px !important;
        }

        .header-search-form .form-control {
            flex-grow: 1;
            min-width: 320px;
        }

        /* Help Section Styles */
        .help-hero {
            text-align: center;
            margin-bottom: 4rem;
            padding: 3rem 0;
        }

        .help-hero h1 {
            font-size: 3.5rem;
            background: linear-gradient(45deg, #ff6b6b, #ffa726);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .help-hero p {
            font-size: 1.3rem;
            color: #e0e0e0;
            max-width: 600px;
            margin: 0 auto;
        }

        .help-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 2.5rem;
            height: 100%;
            transition: all 0.3s ease;
            text-align: center;
            color: white;
        }

        .help-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 15px 30px rgba(0,0,0,0.3);
        }

        .help-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, #ff6b6b, #ffa726);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
        }

        .help-card h3 {
            color: #ff6b6b;
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        .help-card p {
            color: #e0e0e0;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .btn-help {
            background: linear-gradient(45deg, #ff6b6b, #ffa726);
            border: none;
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn-help:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
        }

        /* FAQ Section */
        .faq-section {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 3rem;
            margin: 4rem 0;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .faq-section h2 {
            text-align: center;
            color: #ff6b6b;
            margin-bottom: 2.5rem;
            font-size: 2.5rem;
        }

        .accordion-item {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            margin-bottom: 1rem;
            backdrop-filter: blur(10px);
        }

        .accordion-button {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-weight: bold;
            border: none;
        }

        .accordion-button:not(.collapsed) {
            background: rgba(255, 107, 107, 0.2);
            color: #ff6b6b;
        }

        .accordion-body {
            background: rgba(255, 255, 255, 0.05);
            color: #e0e0e0;
            border-radius: 0 0 10px 10px;
        }

        /* Quick Support */
        .quick-support {
            text-align: center;
            padding: 3rem 0;
        }

        .quick-support h2 {
            color: #ff6b6b;
            margin-bottom: 2rem;
        }

        .support-methods {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .support-method {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
        }

        .support-method:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.15);
        }

        .support-method i {
            font-size: 2.5rem;
            color: #ff6b6b;
            margin-bottom: 1rem;
        }

        .support-method h4 {
            color: #ffa726;
            margin-bottom: 1rem;
        }

        /* Footer Styles */
        .footer {
            background: linear-gradient(to right, #000000, #0d0d0d, #1a1a1a, #0d0d0d, #000000);
            color: white;
            padding-top: 2rem;
            padding-bottom: 1rem;
            font-size: 18px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.05);
        }

        .footer h5,
        .footer h6 {
            color: yellow;
        }

        .footer a {
            color: white;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: rgb(255, 200, 0);
        }

        .btn-top {
            background: linear-gradient(45deg, #ff6b6b, #ffa726);
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-top:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header id="header" class="d-flex align-items-center justify-content-between px-3 py-2 bg-black">
        <!-- Left: Hamburger + Logo -->
        <div class="d-flex align-items-center gap-3">
            <button class="btn bg-transparent border-0 p-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#darkMenu">
                <i class="fas fa-bars text-white" style="font-size: 1.8rem;"></i>
            </button>
            <img id="logo" src="images/logo.jpg" alt="Logo" class="me-2" />
            
            <!-- Search Bar -->
            <form class="d-flex align-items-center header-search-form" action="search.php" method="GET">
                <input class="form-control form-control-lg rounded-pill me-2" 
                       type="search" 
                       name="q"  
                       placeholder="🔍 Search for food or cuisines..." 
                       aria-label="Search"
                       required>
                <button class="btn btn-danger rounded-pill px-3" type="submit">Search</button>
            </form>
            
            <!-- Location Selector -->
            <div class="input-group ms-2" style="width: 200px; height: 40px;">
                <span class="input-group-text bg-danger text-white px-2">
                    <i class="fas fa-map-marker-alt"></i>
                </span>
                <select class="form-select">
                    <option selected disabled>Location</option>
                    <option>Jaipur</option>
                    <option>Delhi</option>
                    <option>Mumbai</option>
                    <option>Bangalore</option>
                </select>
            </div>
        </div>

        <!-- Right: Buttons -->
        <div class="d-flex align-items-center gap-2">
            <a href="menu.php" class="btn btn-danger px-3 py-1">🍔 Menu</a>
            <a href="cart.php" class="btn btn-danger px-3 py-1">🛒 Cart</a>
            
            <?php if (isset($_SESSION['logged_in'])): ?>
                <a href="logout.php" class="btn btn-danger px-3 py-1">👤 Logout</a>
            <?php else: ?>
                <a href="login.php" class="btn btn-danger px-3 py-1">Login</a>
            <?php endif; ?>
        </div>
    </header>

    <!-- Offcanvas Menu -->
    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="darkMenu">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Explore</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link text-white" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="about.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="profile.php">Profile</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="rating.php">Rate Us</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="settings.php">Settings</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="help.php">Help/Contact</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="terms.php">Terms & Conditions</a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <!-- Hero Section -->
            <div class="help-hero">
                <h1>Need Help? We're Here For You! 🤝</h1>
                <p>Find answers to common questions or get in touch with our support team. We're always happy to help!</p>
            </div>

            <!-- Help Cards Section -->
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="help-card">
                        <div class="help-icon">
                            <i class="fas fa-question-circle"></i>
                        </div>
                        <h3>FAQs</h3>
                        <p>Browse through our frequently asked questions about orders, payments, delivery, and more. Quick answers at your fingertips.</p>
                        <a href="faq.php" class="btn btn-help">View FAQs</a>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="help-card">
                        <div class="help-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h3>Contact Support</h3>
                        <p>Can't find what you're looking for? Reach out to our support team via email or phone for personalized assistance.</p>
                        <a href="contact.php" class="btn btn-help">Contact Now</a>
                    </div>
                </div>
                
                

            

            <!-- Quick Support Section -->
            <div class="quick-support">
                <h2>Quick Support Channels</h2>
                <div class="support-methods">
                    <div class="support-method">
                        <i class="fas fa-phone-alt"></i>
                        <h4>Phone Support</h4>
                        <p>+91 98765 43210</p>
                        <small>Available 24/7</small>
                    </div>
                    
                    <div class="support-method">
                        <i class="fas fa-envelope"></i>
                        <h4>Email Support</h4>
                        <p>support@foodogram.com</p>
                        <small>Response within 2 hours</small>
                    </div>
                    
                    <div class="support-method">
                        <i class="fab fa-whatsapp"></i>
                        <h4>WhatsApp</h4>
                        <p>+91 98765 43211</p>
                        <small>Instant messaging</small>
                    </div>
                    
                    <div class="support-method">
                        <i class="fas fa-comments"></i>
                        <h4>Live Chat</h4>
                        <p>Available on website</p>
                        <small>9 AM - 11 PM</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer text-white">
        <div class="container text-center text-md-start">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5 class="fw-bold" style="color: rgb(255, 200, 0); font-size: 30px;">🍽️ Foodogram</h5>
                    <p>Your go-to destination for fresh, fast & delicious food delivered at your door.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h6 class="fw-bold" style="color: yellow;">Quick Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="about.php" class="text-white text-decoration-none">About Us</a></li>
                        <li><a href="menu.php" class="text-white text-decoration-none">Menu</a></li>
                        <li><a href="profile.php" class="text-white text-decoration-none">Profile</a></li>
                        <li><a href="contact.php" class="text-white text-decoration-none">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h6 style="color: yellow;" class="fw-bold">Follow Us</h6>
                    <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="#" class="text-white me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 512 512" fill="currentColor" style="vertical-align: middle;">
                            <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/>
                        </svg>
                    </a>                    <a href="#" class="text-white"><i class="fab fa-youtube fa-lg"></i></a>
                </div>
            </div>
            <hr class="border-secondary" />
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div style="color: yellow;" class="text-center text-md-start">
                        &copy; <?php echo date('Y'); ?> Foodogram. All rights reserved.
                    </div>
                </div>
                <div class="col-md-4">
                    <button onclick="scrollToTop()" class="btn btn-top float-md-right">
                        <i class="fas fa-arrow-up me-2"></i>Back to Top
                    </button>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Add some interactive animations
        document.addEventListener('DOMContentLoaded', function() {
            // Animate help cards on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observe help cards
            const helpCards = document.querySelectorAll('.help-card');
            helpCards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'all 0.6s ease';
                observer.observe(card);
            });

            // Observe support methods
            const supportMethods = document.querySelectorAll('.support-method');
            supportMethods.forEach(method => {
                method.style.opacity = '0';
                method.style.transform = 'translateY(20px)';
                method.style.transition = 'all 0.6s ease 0.2s';
                observer.observe(method);
            });
        });
    </script>
</body>
</html>