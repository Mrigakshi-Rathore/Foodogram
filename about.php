<?php
// You can declare PHP variables or logic at the top
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Foodogram</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #6654F1;
            --secondary: #EACCF8;
            --accent: #ffc107;
            --dark: #04171f;
        }
        
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(-225deg, #f1e954ff 0%, #EACCF8 48%, #ee770fff 100%);
            color: #333;
            overflow-x: hidden;
        }
        
        /* -------- HEADER -------- */
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
            border: 2px solid white;
        }

        .btn-white i.fas.fa-bars {
            font-size: 2.2rem !important;
            color: white !important;
        }

        .header-search-form {
            max-width: 1000px !important;
        }

        .header-search-form .form-control {
            flex-grow: 1;
            min-width: 320px;
        }
        
        /* Hero Section */
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            padding: 100px 0;
            color: white;
            text-align: center;
            border-radius: 0 0 30px 30px;
            margin-bottom: 50px;
        }
        
        /* Content Styling */
        .content-section {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 24px;
            padding: 50px;
            margin-bottom: 50px;
            
            /* Initial State */
            transform: perspective(1000px) rotateX(0deg) translateY(0) scale(1);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.801);
            border: 2px solid transparent; 
            
            transition: all 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
            position: relative;
            z-index: 1;
        }


        .content-section:hover {
            transform: perspective(1000px) rotateX(2deg) translateY(-15px) scale(1.03);
            
            box-shadow: 0 55px 50px rgba(255, 115, 0, 0.36);
            
            /* 3. Highlight Border */
            border-color: var(--primary); /* Turns Purple */
            z-index: 10;
        }
        
                .content-section h2 {
            font-family:'Times New Roman', Times, serif;
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            
            /* Gradient Text Magic */
            background: linear-gradient(var(--primary), #ff0000);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .content-section p.lead {
            font-size: 1.25rem;
            font-family:serif;
            color: #444;
            font-weight: 500;
            line-height: 1.6;
        }

        .content-section p {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            color: #000000;
            line-height: 1.8;
        }
        
        .card-feature {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
            background: linear-gradient(145deg, #ffffff, #f0f0f0);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .card-feature:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }
        
        .card-icon {
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 20px;
        }
        
        /* Stats Counter */
        .stats-section {
            background: linear-gradient(to right, #052549, #49b7e6);
            color: white;
            padding: 60px 0;
            border-radius: 20px;
            margin: 50px 0;
        }
        
        .stat-item {
            text-align: center;
            padding: 20px;
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 0;
        }
        
        /* Team Section */
        .team-member {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .team-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            margin-bottom: 15px;
        }
        
        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fadeIn {
            animation: fadeIn 1s ease forwards;
        }
        
        /* Floating Icons */
        .floating-icons {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 9999;
        }

        .floating-icons span {
            position: absolute;
            font-size: 40px;
            animation: floatIcon 8s linear infinite;
            opacity: 0.8;
            animation-delay: calc(var(--i) * 1s);
            top: 100%;
        }

        @keyframes floatIcon {
            0% { transform: translateY(0) scale(1); opacity: 0; }
            10% { opacity: 1; }
            50% { transform: translateY(-50vh) scale(1.2); }
            100% { transform: translateY(-120vh) scale(0.8); opacity: 0; }
        }
        
        /* -------- FOOTER -------- */
        .footer {
            background: linear-gradient(to right, #000000, #0d0d0d, #1a1a1a, #0d0d0d, #000000);
            color: white;
            padding-top: 2rem;
            padding-bottom: 1rem;
            font-size: 18px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.05);
            border-radius: 30px 30px 0 0;
            margin-top: 50px;
        }

        .footer h5, .footer h6 {
            color: var(--accent);
        }

        .footer a {
            color: white;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: var(--accent);
            text-decoration: none;
        }
        
        /* Back to top button */
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            opacity: 0;
            visibility: hidden;
        }
        
        .back-to-top.show {
            opacity: 1;
            visibility: visible;
        }
        
        .back-to-top:hover {
            background: var(--accent);
            transform: translateY(-3px);
        }
        #food{
          height:600px;
          width: 550px;
        }

        /* 1. Global Scrollbar */
    ::-webkit-scrollbar {
        width: 10px;
    }
    ::-webkit-scrollbar-track {
        background: #f1f1f1; 
    }
    ::-webkit-scrollbar-thumb {
        background: #888; 
        border-radius: 5px;
        border: 2px solid #f1f1f1;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: #555; 
    }

    /* 2. Side Menu (Offcanvas) Scrollbar */
    .offcanvas-body {
        overflow-y: auto !important;
        max-height: 100vh;
    }
    .offcanvas-body::-webkit-scrollbar {
        width: 6px;
    }
    .offcanvas-body::-webkit-scrollbar-track {
        background: #212529; /* Dark background */
    }
    .offcanvas-body::-webkit-scrollbar-thumb {
        background: #666; 
        border-radius: 4px;
    }
    .offcanvas-body::-webkit-scrollbar-thumb:hover {
        background: #999; 
    }
    </style>
</head>
<body>
     <!-- Offcanvas Menu -->
    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="darkMenu">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Explore</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="about.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="rating.php">Rate Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="settings.php">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="help.php">Help/Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="terms.php">Terms and Conditions</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <header id="header" class="d-flex align-items-center justify-content-between px-3 py-2 bg-black">
    <!-- Left: Hamburger + Logo -->
    <div class="d-flex align-items-center gap-3">
        <button class="btn btn-sm btn-white p-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#darkMenu">
            <i class="fas fa-bars" style="font-size: 1.5rem;"></i>
        </button>
        <img id="logo" src="images/logo.jpg" alt="Logo" class="me-2" />
        
     <!-- Fixed Search Bar -->
<form class="d-flex align-items-center header-search-form" action="search.php" method="GET">
    <input class="form-control form-control-lg rounded-pill me-2" 
           type="search" 
           name="q"  
           placeholder="🔍 Search for food or cuisines..." 
           aria-label="Search"
           required>
    <button class="btn btn-danger rounded-pill px-3" type="submit">
        Search
    </button>
</form>

    <div class="input-group ms-2">
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
    </div>

    <!-- Right: Buttons -->
     
    <div class="d-flex align-items-center gap-2">
        <a href="menu.php" class="btn btn-danger px-3 py-1">🍔 Menu</a>
        <a href="cart.php" class="btn btn-danger px-3 py-1">🛒 Cart</a>
    
    <?php if (isset($_SESSION['logged_in'])): ?>
        <a href="logout.php" class="btn btn-danger px-3 py-1">👤 Logout</a>
    <?php else: ?>
        <a href="login.php" class="btn btn-danger px-3 py-1">Login</a>
       <a href="signup.php" class="btn btn-danger px-3 py-1">Sign Up</a>
    <?php endif; ?>
        
</header>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="display-3 fw-bold mb-4">About Foodogram</h1>
            <p class="lead">We're reshaping how you think about food—one vegan bite at a time</p>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container">
        <!-- Mission Section -->
        <section class="content-section animate-fadeIn">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="mb-4">Our Mission</h2>
                    <p class="lead">At Foodogram, we started with a simple goal: to make delicious, nutritious, and sustainable plant-based meals accessible to everyone.</p>
                    <p>Whether you're a lifelong vegan or just exploring the lifestyle, we deliver bold flavors, wholesome ingredients, and zero compromises straight to your doorstep.</p>
                    <p>Because eating well should feel good—for your body, your conscience, and the planet.</p>
                </div>
                <div  class="col-lg-6">
                    <img id="food" src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Healthy Food" class="img-fluid rounded shadow"  >
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="stats-section text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 stat-item">
                        <p class="stat-number" id="meals-delivered">0</p>
                        <p>Meals Delivered</p>
                    </div>
                    <div class="col-md-3 stat-item">
                        <p class="stat-number" id="happy-customers">0</p>
                        <p>Happy Customers</p>
                    </div>
                    <div class="col-md-3 stat-item">
                        <p class="stat-number" id="cities">0</p>
                        <p>Cities</p>
                    </div>
                    <div class="col-md-3 stat-item">
                        <p class="stat-number" id="rating">0</p>
                        <p>Star Rating</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="mb-5">
            <h2 class="text-center mb-5">Why Choose Foodogram</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card card-feature text-center p-4">
                        <div class="card-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3>24/7 Support</h3>
                        <p>Because hunger doesn't have a schedule. Our team is always ready to assist you.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-feature text-center p-4">
                        <div class="card-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h3>Real-time Tracking</h3>
                        <p>Know exactly where your order is with our live tracking system.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-feature text-center p-4">
                        <div class="card-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <h3>Lightning Fast Delivery</h3>
                        <p>Get your food hot and fresh with our optimized delivery routes.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Promise Section -->
        <section class="content-section">
            <h2 class="text-center mb-4">Our Promise</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex mb-4">
                        <div class="me-4">
                            <i class="fas fa-check-circle text-success" style="font-size: 2rem;"></i>
                        </div>
                        <div>
                            <h4>Hygienic & Safe</h4>
                            <p>We maintain the highest standards of food safety and hygiene in all our preparations.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="me-4">
                            <i class="fas fa-seedling text-success" style="font-size: 2rem;"></i>
                        </div>
                        <div>
                            <h4>100% Plant-Based</h4>
                            <p>No animal products, no compromises. Just delicious plant-powered meals.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex mb-4">
                        <div class="me-4">
                            <i class="fas fa-leaf text-success" style="font-size: 2rem;"></i>
                        </div>
                        <div>
                            <h4>Sustainable Packaging</h4>
                            <p>We use eco-friendly packaging to minimize our environmental impact.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="me-4">
                            <i class="fas fa-heart text-danger" style="font-size: 2rem;"></i>
                        </div>
                        <div>
                            <h4>Community Support</h4>
                            <p>We reinvest in nutrition education and food security initiatives.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Floating Icons -->
    <div class="floating-icons">
        <span style="left: 3%; --i: 0">✨</span>
        <span style="left: 10%; --i: 1">🌟</span>
        <span style="left: 17%; --i: 3">⭐️</span>
        <span style="right: 3%; --i: 0">✨</span>
        <span style="right: 10%; --i: 1">🌟</span>
        <span style="right: 17%; --i: 3">⭐️</span>
    </div>

    <!-- Back to Top Button -->
    <a href="#" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- Footer -->
    <footer class="footer text-white">
        <div class="container text-center text-md-start">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5 class="fw-bold">🍽️ Foodogram</h5>
                    <p>Your go-to destination for fresh, fast & delicious food delivered at your door.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h6 class="fw-bold">Quick Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="about.php" class="text-white text-decoration-none">About Us</a></li>
                        <li><a href="menu.php" class="text-white text-decoration-none">Menu</a></li>
                        <li><a href="profile.php" class="text-white text-decoration-none">Profile</a></li>
                        <li><a href="contact.php" class="text-white text-decoration-none">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h6 class="fw-bold">Follow Us</h6>
                    <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="#" class="text-white me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 512 512" fill="currentColor" style="vertical-align: middle;">
                            <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-white"><i class="fab fa-youtube fa-lg"></i></a>
                </div>
            </div>
            <hr class="border-secondary" />
            <div class="text-center small">
                &copy; <?php echo date('Y'); ?> Foodogram. All rights reserved.
            </div>
        </div>
    </footer>

    <script>
        // Back to top button
        const backToTopButton = document.querySelector('.back-to-top');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.add('show');
            } else {
                backToTopButton.classList.remove('show');
            }
        });
        
        backToTopButton.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
        
        // Animated counter for stats
        function animateValue(id, start, end, duration) {
            const obj = document.getElementById(id);
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                obj.innerHTML = Math.floor(progress * (end - start) + start);
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }
        
        // Start counters when stats section is in view
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateValue('meals-delivered', 0, 50000, 2000);
                    animateValue('happy-customers', 0, 10000, 2000);
                    animateValue('cities', 0, 15, 2000);
                    animateValue('rating', 0, 4.9, 2000);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.8 });
        
        observer.observe(document.querySelector('.stats-section'));
        
        // Dark mode toggle
        document.getElementById('darkModeToggle').addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
            this.innerHTML = document.body.classList.contains('dark-mode') 
                ? '☀️ Light Mode' 
                : '🌙 Dark Mode';
        });
    </script>
</body>
</html>