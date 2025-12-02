<?php
session_start();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $subject = htmlspecialchars($_POST['subject'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');
    
    // Simple validation
    $errors = [];
    if (empty($name)) $errors[] = "Name is required";
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required";
    if (empty($subject)) $errors[] = "Subject is required";
    if (empty($message)) $errors[] = "Message is required";
    
    if (empty($errors)) {
        $success = "Thank you for your message! We'll get back to you soon.";
        // Here you would typically send an email or save to database
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us | Foodogram</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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

        /* Contact Section Styles */
        .contact-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .contact-hero {
            text-align: center;
            margin-bottom: 3rem;
        }

        .contact-hero h1 {
            font-size: 3.5rem;
            background: linear-gradient(45deg, #ff6b6b, #ffa726);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .contact-hero p {
            font-size: 1.2rem;
            color: #e0e0e0;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            margin-bottom: 4rem;
        }

        @media (max-width: 768px) {
            .contact-grid {
                grid-template-columns: 1fr;
            }
        }

        .contact-form-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .contact-info {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            border-radius: 10px;
            padding: 12px 15px;
            margin-bottom: 1.5rem;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: #ff6b6b;
            color: white;
            box-shadow: 0 0 0 0.2rem rgba(255, 107, 107, 0.25);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .btn-contact {
            background: linear-gradient(45deg, #ff6b6b, #ffa726);
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: bold;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-contact:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .contact-item:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
        }

        .contact-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #ff6b6b, #ffa726);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1.5rem;
            font-size: 1.5rem;
        }

        .contact-details h4 {
            color: #ff6b6b;
            margin-bottom: 0.5rem;
        }

        .contact-details p {
            color: #e0e0e0;
            margin: 0;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 2rem;
        }

        .social-link {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1.2rem;
        }

        .social-link:hover {
            background: #ff6b6b;
            transform: translateY(-3px);
        }

        .map-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 2rem;
            margin-top: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .alert {
            border-radius: 15px;
            border: none;
            backdrop-filter: blur(10px);
        }

        .alert-success {
            background: rgba(76, 175, 80, 0.2);
            color: #4CAF50;
        }

        .alert-danger {
            background: rgba(244, 67, 54, 0.2);
            color: #f44336;
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
        <div class="container contact-container">
            <!-- Hero Section -->
            <div class="contact-hero">
                <h1>Get In Touch</h1>
                <p>Have questions, feedback, or special requests? We'd love to hear from you! 🌟</p>
            </div>

            <!-- Success/Error Messages -->
            <?php if (isset($success)): ?>
                <div class="alert alert-success text-center">
                    <i class="fas fa-check-circle me-2"></i><?php echo $success; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach ($errors as $error): ?>
                            <li><i class="fas fa-exclamation-circle me-2"></i><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Contact Grid -->
            <div class="contact-grid">
                <!-- Contact Form -->
                <div class="contact-form-container">
                    <h3 class="mb-4" style="color: #ff6b6b;">Send us a Message</h3>
                    <form method="POST" action="">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" placeholder="Your Name" value="<?php echo $name ?? ''; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" value="<?php echo $email ?? ''; ?>" required>
                            </div>
                        </div>
                        <input type="text" class="form-control" name="subject" placeholder="Subject" value="<?php echo $subject ?? ''; ?>" required>
                        <textarea class="form-control" name="message" rows="6" placeholder="Your Message..." required><?php echo $message ?? ''; ?></textarea>
                        <button type="submit" class="btn btn-contact">
                            <i class="fas fa-paper-plane me-2"></i>Send Message
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="contact-info">
                    <h3 class="mb-4" style="color: #ff6b6b;">Contact Information</h3>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Our Location</h4>
                            <p>123 Food Street, Restaurant District<br>Jaipur, Rajasthan 302001</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Phone Number</h4>
                            <p>+91 98765 43210<br>+91 98765 43211</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Email Address</h4>
                            <p>hello@foodogram.com<br>support@foodogram.com</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Opening Hours</h4>
                            <p>Monday - Sunday: 8:00 AM - 11:00 PM<br>24/7 Online Orders</p>
                        </div>
                    </div>

                    <!-- Social Links -->
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <!-- Map Section -->
            <div class="map-container">
                <h3 class="mb-4" style="color: #ff6b6b;">Find Us Here</h3>
                <div style="border-radius: 15px; overflow: hidden;">
                    <!-- Placeholder for Google Maps -->
                    <div style="background: rgba(255,255,255,0.1); height: 300px; display: flex; align-items: center; justify-content: center; border-radius: 15px;">
                        <div class="text-center">
                            <i class="fas fa-map-marked-alt" style="font-size: 4rem; color: #ff6b6b; margin-bottom: 1rem;"></i>
                            <h4 style="color: #ff6b6b;">Interactive Map</h4>
                            <p class="text-muted">Google Maps integration would go here</p>
                        </div>
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
                    <a href="#" class="text-white me-3"><i class="fab fa-twitter fa-lg"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-youtube fa-lg"></i></a>
                </div>
            </div>
            <hr class="border-secondary" />
            <div style="color: yellow;" class="text-center small">
                &copy; <?php echo date('Y'); ?> Foodogram. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Add some interactive animations
        document.addEventListener('DOMContentLoaded', function() {
            // Animate form elements on focus
            const formInputs = document.querySelectorAll('.form-control');
            formInputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-2px)';
                });
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                });
            });

            // Add loading animation to submit button
            const submitBtn = document.querySelector('.btn-contact');
            if (submitBtn) {
                submitBtn.addEventListener('click', function() {
                    this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Sending...';
                    setTimeout(() => {
                        this.innerHTML = '<i class="fas fa-paper-plane me-2"></i>Send Message';
                    }, 2000);
                });
            }
        });
    </script>
</body>
</html>