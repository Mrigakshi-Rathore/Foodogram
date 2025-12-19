<?php
session_start();
$current_page = 'terms';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Terms & Conditions - Foodogram</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  
  <!-- Custom CSS -->
  <style>
    .heading{
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100px;
      color: white;
      background-color: rgb(8, 34, 95);
    }
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      position: relative;
      min-height: 100vh;
      padding-bottom: 100px;
    }

    .card {
      margin: 20px auto;
      width: 90%;
      max-width: 900px;
      border: none;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      border-radius: 16px;
      background-color: #ffffff;
      padding: 30px;
    }

    .main-heading {
      font-size: 2.6rem;
      font-weight: 700;
      text-align: center;
      text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.15);
    }

    h2 {
      font-size: 1.5rem;
      color: #343a40;
      margin-top: 25px;
      text-shadow: 0.5px 0.5px 2px rgba(0, 0, 0, 0.1);
    }

    p {
      color: #555;
      font-size: 1.05rem;
      line-height: 1.7;
    }

    ul {
      padding-left: 1.2rem;
    }

    ul li {
      margin-bottom: 10px;
    }

    .footer {
      background-color: #052549;
      color: white;
      position: absolute;
      bottom: 0;
      width: 100%;
    }

    .footer a {
      color: white;
      text-decoration: none;
    }

    .footer a:hover {
      color: #ffd36a;
      text-decoration: underline;
    }

    .footer h5 {
      letter-spacing: 1px;
    }

    .btn-warning:hover {
      background-color: #ffa500;
      color: black;
    }

    .floating-icons {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: 9999;
      overflow: hidden;
    }

    .floating-icons span {
      position: absolute;
      font-size: 24px;
      animation: floatIcon 8s linear infinite;
      opacity: 0.8;
      animation-delay: calc(var(--i) * 1s);
      top: 100%;
    }

    @keyframes floatIcon {
      0% {
        transform: translateY(0) scale(1);
        opacity: 0;
      }
      10% {
        opacity: 1;
      }
      50% {
        transform: translateY(-50vh) scale(1.2);
      }
      100% {
        transform: translateY(-120vh) scale(0.8);
        opacity: 0;
      }
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .main-heading {
        font-size: 2rem;
      }
      .card {
        padding: 20px;
        margin: 15px auto;
        width: 95%;
      }
      .floating-icons span {
        font-size: 18px;
      }
      h2 {
        font-size: 1.3rem;
      }
      p {
        font-size: 1rem;
        line-height: 1.6;
      }
      ul {
        padding-left: 1rem;
      }
      ul li {
        margin-bottom: 8px;
      }
    }

    @media (max-width: 576px) {
      .heading {
        height: 80px;
        padding: 10px 0;
      }
      .main-heading {
        font-size: 1.8rem;
      }
      .card {
        padding: 15px;
        margin: 10px auto;
        width: 98%;
        border-radius: 12px;
      }
      h2 {
        font-size: 1.2rem;
        margin-top: 20px;
      }
      p {
        font-size: 0.95rem;
        line-height: 1.5;
      }
      ul {
        padding-left: 0.8rem;
      }
      ul li {
        margin-bottom: 6px;
        font-size: 0.9rem;
      }
      body {
        padding-bottom: 80px;
      }
      .footer {
        font-size: 14px;
      }
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
}

button i {
  font-size: 3rem;
  padding: 4px;
  color: white;
  border: none;
  outline: none;
  box-shadow: none;
}

.header-search-form {
  max-width: 1000px !important;
}

.header-search-form .form-control {
  flex-grow: 1;
  min-width: 320px;
  margin-top: 5px;
}

.btn-white i.fas.fa-bars {
  font-size: 2.2rem !important;
}

/* Responsive header adjustments */
@media (max-width: 768px) {
  header {
    height: auto;
    padding: 10px 15px;
  }
  #logo {
    height: 50px;
    width: 50px;
    margin-left: 10px;
  }
  .header-search-form {
    max-width: 300px !important;
  }
  .header-search-form .form-control {
    min-width: 150px;
    font-size: 0.9rem;
  }
  .input-group {
    width: 120px !important;
    height: 35px !important;
  }
  .btn {
    padding: 0.25rem 0.5rem;
    font-size: 0.8rem;
  }
}

@media (max-width: 576px) {
  header {
    flex-direction: column;
    align-items: stretch;
    gap: 10px;
    height: auto;
    padding: 10px;
  }
  #logo {
    height: 40px;
    width: 40px;
    margin-left: 5px;
  }
  .header-search-form {
    max-width: 100% !important;
    margin: 5px 0;
  }
  .header-search-form .form-control {
    width: 20rem;
    font-size: 0.8rem;
  }
  .input-group {
    width: 100px !important;
    height: 30px !important;
  }
  .btn {
    padding: 0.15rem 0.3rem;
    font-size: 0.7rem;
  }
  .d-flex.align-items-center.gap-3 {
    flex-wrap: wrap;
    gap: 5px !important;
    justify-content: center;
  }
  .d-flex.align-items-center.gap-2 {
    flex-wrap: wrap;
    gap: 5px !important;
    justify-content: center;
  }
  /* Mobile: Stack all sections vertically */
  header > div {
    width: 100%;
    text-align: center;
  }
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
  </style>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <header id="header" class="d-flex align-items-center justify-content-between px-3 py-2 bg-black">
    <!-- Left: Hamburger + Logo -->
    <div class="d-flex align-items-center gap-3">
        <button class="btn btn-sm btn-white p-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#darkMenu">
            <i class="fas fa-bars" style="font-size: 1.5rem;"></i>
        </button>
        <img id="logo" src="../assets/images/logo.jpg" alt="Logo" class="me-2" />

     <!-- Fixed Search Bar -->
<form class="d-flex align-items-center header-search-form" action="../search.php" method="GET">
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

    <!-- Right: Buttons -->

    <div class="d-flex align-items-center gap-2">
        <a href="../menu.php" class="btn btn-danger px-3 py-1">🍔 Menu</a>
        <a href="../cart.php" class="btn btn-danger px-3 py-1">🛒 Cart</a>

    <?php if (isset($_SESSION['logged_in'])): ?>
        <a href="../logout.php" class="btn btn-danger px-3 py-1">👤 Logout</a>
    <?php else: ?>
        <a href="../login.php" class="btn btn-danger px-3 py-1">Login</a>
       <a href="../signup.php" class="btn btn-danger px-3 py-1">Sign Up</a>
    <?php endif; ?>

</header>

<!-- Offcanvas Menu -->
<div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="darkMenu">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Explore</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="nav flex-column">
      <li class="nav-item"><a class="nav-link text-white" href="../index.php">Home</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="../about.php">About Us</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="../profile.php">Profile</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="../rating.php">Rate Us</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="../settings.php">Settings</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="../help.php">Help/Contact</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="../terms.php">Terms & Conditions</a></li>
    </ul>
  </div>
</div>

  <div class="heading">
    <h1 class="main-heading">Terms & Conditions</h1>
  </div>

  <div class="container my-5">
    <div class="card">
      <p>Welcome to <strong>Foodogram</strong>, your trusted partner in online food ordering. By using our website, you agree to the following terms and conditions:</p>

      <h2>1. Acceptance of Terms</h2>
      <p>By accessing and using Foodogram, you accept and agree to be bound by these Terms & Conditions. If you do not agree, please refrain from using our services.</p>

      <h2>2. Ordering</h2>
      <ul>
        <li>Orders placed through Foodogram are subject to restaurant availability and confirmation.</li>
        <li>Ensure your contact and delivery details are accurate. We are not responsible for failed deliveries due to incorrect information.</li>
        <li>Once an order is placed, it cannot be modified or canceled after restaurant confirmation.</li>
      </ul>

      <h2>3. Payments</h2>
      <ul>
        <li>We support secure online payments through trusted gateways.</li>
        <li>Prices displayed include applicable taxes unless stated otherwise.</li>
      </ul>

      <h2>4. Delivery</h2>
      <ul>
        <li>Delivery time estimates are approximate and may vary due to weather, traffic, or restaurant load.</li>
        <li>We strive to ensure timely delivery but are not liable for delays beyond our control.</li>
      </ul>

      <h2>5. User Responsibilities</h2>
      <ul>
        <li>Users must not misuse our platform or engage in fraudulent activities.</li>
        <li>Accounts can be suspended in case of misuse or violation of terms.</li>
      </ul>

      <h2>6. Modifications</h2>
      <p>Foodogram reserves the right to update or change these terms at any time. Changes will be posted on this page with a revised date.</p>

      <h2>7. Contact Us</h2>
      <p>If you have any questions or concerns about these Terms & Conditions, feel free to contact us at <a href="mailto:support@foodogram.com">support@foodogram.com</a>.</p>

    
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
          <li><a href="../about.php" class="text-white text-decoration-none">About Us</a></li>
          <li><a href="../menu.php" class="text-white text-decoration-none">Menu</a></li>
          <li><a href="../profile.php" class="text-white text-decoration-none">Profile</a></li>
          <li><a href="../contact.php" class="text-white text-decoration-none">Contact</a></li>
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
        </a>
        <a href="#" class="text-white"><i class="fab fa-youtube fa-lg"></i></a>
      </div>
    </div>
    <hr class="border-secondary" />
    <div style="color: yellow;" class="text-center small">
      &copy; <?php echo date('Y'); ?> Foodogram. All rights reserved.
    </div>
  </div>
</footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    function scrollToTop() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
    
    // Track page view for analytics
    document.addEventListener('DOMContentLoaded', function() {
      if(typeof localStorage !== 'undefined') {
        let termsViews = localStorage.getItem('termsViews') || 0;
        localStorage.setItem('termsViews', ++termsViews);
      }
    });
  </script>
</body>
</html>