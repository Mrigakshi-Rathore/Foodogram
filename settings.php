<?php
// You can declare PHP variables or logic at the top
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Settings - Foodogram</title>
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
      background-image: linear-gradient(to top, #dbdcd7 0%, #dddcd7 24%, #e2c9cc 30%, #e7627d 46%, #b8235a 59%, #951865ff 71%, #833570ff 84%, #2a273aff 100%);
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

    /* Settings Page */
    .settings-container {
      background: rgba(255, 255, 255, 0.9);
      border-radius: 20px;
      padding: 40px;
      margin: 50px auto;
      max-width: 900px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .settings-container h2 {
      margin-bottom: 30px;
      font-weight: bold;
    }

    .form-switch .form-check-input {
      cursor: pointer;
    }

    /* -------- FOOTER -------- */
    .footer {
      background: linear-gradient(to right, #000000, #0d0d0d, #1a1a1a, #0d0d0d, #000000);
      color: white;
      padding-top: 2rem;
      padding-bottom: 1rem;
      font-size: 18px;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 30px 30px 0 0;
      margin-top: 50px;
    }

    .footer h5, .footer h6 {
      color: var(--accent);
    }

    .footer a { color: white; transition: color 0.3s ease; }
    .footer a:hover { color: var(--accent); text-decoration: none; }

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
    .back-to-top.show { opacity: 1; visibility: visible; }
    .back-to-top:hover { background: var(--accent); transform: translateY(-3px); }
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

  

  <!-- Settings Content -->
  <div class="container">
    <div class="settings-container">
      <h2><i class="fas fa-cog me-2"></i> Account Settings</h2>
      
      <!-- Profile Info -->
      <form>
        <div class="mb-3">
          <label class="form-label">Full Name</label>
          <input type="text" class="form-control" placeholder="Your Name" value="XYZ ">
        </div>
        <div class="mb-3">
          <label class="form-label">Email Address</label>
          <input type="email" class="form-control" placeholder="you@example.com" value="xyz@example.com">
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" placeholder="********">
        </div>

        <!-- Notifications -->
        <h5 class="mt-4 mb-3">Notifications</h5>
        <div class="form-check form-switch mb-2">
          <input class="form-check-input" type="checkbox" id="emailNotif" checked>
          <label class="form-check-label" for="emailNotif">Email Notifications</label>
        </div>
        <div class="form-check form-switch mb-2">
          <input class="form-check-input" type="checkbox" id="smsNotif">
          <label class="form-check-label" for="smsNotif">SMS Notifications</label>
        </div>
        <div class="form-check form-switch mb-4">
          <input class="form-check-input" type="checkbox" id="promoNotif" checked>
          <label class="form-check-label" for="promoNotif">Promotional Offers</label>
        </div>

        <button type="submit" class="btn btn-primary px-4">Save Changes</button>
      </form>
    </div>
  </div>

  <!-- Back to Top -->
  <a href="#" class="back-to-top"><i class="fas fa-arrow-up"></i></a>

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
    // Back to top
    const backToTopButton = document.querySelector('.back-to-top');
    window.addEventListener('scroll', () => {
      if (window.pageYOffset > 300) backToTopButton.classList.add('show');
      else backToTopButton.classList.remove('show');
    });
    backToTopButton.addEventListener('click', e => {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Dark Mode Toggle
    document.getElementById('darkModeToggle').addEventListener('click', function() {
      document.body.classList.toggle('dark-mode');
      this.innerHTML = document.body.classList.contains('dark-mode') 
        ? '☀️ Light Mode' 
        : '🌙 Dark Mode';
    });
  </script>
</body>
</html>