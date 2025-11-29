<?php
session_start(); // Keep this to maintain session functionality
?>
<!DOCTYPE html>
<!-- Rest of your home page HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home - Foodogram</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-image: url("images/bgImg.jpeg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(2px);
            z-index: -1;
        }

        header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        #logo {
            height: 80px;
            width: 80px;
            margin-left: 10px;
            border-radius: 50%;
        }

        @media (min-width: 576px) {
            #logo {
                height: 100px;
                width: 100px;
            }
        }

        @media (min-width: 768px) {
            #logo {
                height: 120px;
                width: 120px;
            }
        }

        @media (min-width: 992px) {
            #logo {
                height: 140px;
                width: 140px;
            }
        }

        .header-search-form {
            flex-grow: 1;
            max-width: 500px;
            width: 100%;
        }

        .header-search-form .form-control {
            flex-grow: 1;
            min-width: 0;
        }

        .input-group {
            width: 100%;
            max-width: 200px;
        }

        .btn-white i.fas.fa-bars {
            font-size: 1.5rem;
        }

        .main-content {
            min-height: 80vh;
            padding: 20px;
        }

        marquee img {
            margin-top: 20px;
            display: inline-block;
            vertical-align: top;
        }

        .image, .image2 {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            margin: 10px;
            border: 3px solid white;
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.2);
        }

        @media (min-width: 576px) {
            .image, .image2 {
                width: 180px;
                height: 180px;
            }
        }

        @media (min-width: 768px) {
            .image, .image2 {
                width: 200px;
                height: 200px;
            }
        }

        .tagline {
            color: white;
            width: 90%;
            margin: 30px auto;
            text-align: center;
            font-size: 1.5rem;
            font-weight: 700;
            text-shadow: 1px 1px 5px rgba(0,0,0,0.4);
        }

        @media (min-width: 576px) {
            .tagline {
                font-size: 2rem;
            }
        }

        @media (min-width: 768px) {
            .tagline {
                font-size: 2.5rem;
            }
        }

        @media (min-width: 992px) {
            .tagline {
                font-size: 3rem;
            }
        }

        .animate-text span {
            display: inline-block;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.6s forwards;
        }

        .animate-text span:nth-child(1) { animation-delay: 0s; }
        .animate-text span:nth-child(2) { animation-delay: 0.1s; }
        .animate-text span:nth-child(3) { animation-delay: 0.2s; }
        .animate-text span:nth-child(4) { animation-delay: 0.3s; }
        .animate-text span:nth-child(5) { animation-delay: 0.4s; }
        .animate-text span:nth-child(6) { animation-delay: 0.5s; }
        .animate-text span:nth-child(7) { animation-delay: 0.6s; }
        .animate-text span:nth-child(8) { animation-delay: 0.7s; }
        .animate-text span:nth-child(9) { animation-delay: 0.8s; }
        .animate-text span:nth-child(10) { animation-delay: 0.9s; }
        .animate-text span:nth-child(11) { animation-delay: 1s; }
        .animate-text span:nth-child(12) { animation-delay: 1.1s; }
        .animate-text span:nth-child(13) { animation-delay: 1.2s; }
        .animate-text span:nth-child(14) { animation-delay: 1.3s; }
        .animate-text span:nth-child(15) { animation-delay: 1.4s; }
        .animate-text span:nth-child(16) { animation-delay: 1.5s; }
        .animate-text span:nth-child(17) { animation-delay: 1.6s; }
        .animate-text span:nth-child(18) { animation-delay: 1.7s; }
        .animate-text span:nth-child(19) { animation-delay: 1.8s; }
        .animate-text span:nth-child(20) { animation-delay: 1.9s; }
        .animate-text span:nth-child(21) { animation-delay: 2s; }
        .animate-text span:nth-child(22) { animation-delay: 2.1s; }
        .animate-text span:nth-child(23) { animation-delay: 2.2s; }
        .animate-text span:nth-child(24) { animation-delay: 2.3s; }
        .animate-text span:nth-child(25) { animation-delay: 2.4s; }
        .animate-text span:nth-child(26) { animation-delay: 2.5s; }
        .animate-text span:nth-child(27) { animation-delay: 2.6s; }
        .animate-text span:nth-child(28) { animation-delay: 2.7s; }
        .animate-text span:nth-child(29) { animation-delay: 2.8s; }
        .animate-text span:nth-child(30) { animation-delay: 2.9s; }
        .animate-text span:nth-child(31) { animation-delay: 3s; }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .footer {
            background: linear-gradient(to right, #000000, #0d0d0d, #1a1a1a, #0d0d0d, #000000);
            color: white;
            padding-top: 2rem;
            padding-bottom: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.05);
        }

        .welcome-alert {
            animation: slideDown 0.8s ease forwards;
            font-size: 1.1rem;
            font-weight: 500;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .fade-out {
            transition: opacity 0.5s ease;
            opacity: 0;
        }

        @keyframes slideDown {
            0% { transform: translateY(-100%); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }

        body.dark-mode {
            background-color: #121212;
            color: #f1f1f1;
        }

        .dark-mode .card {
            background-color: #1e1e1e;
            color: #f1f1f1;
            border: 1px solid #444;
        }

        .dark-mode .navbar, .dark-mode .footer {
            background-color: #1f1f1f;
        }

        .dark-mode .btn-outline-light {
            border-color: #f1f1f1;
            color: #f1f1f1;
        }

        .dark-mode .btn-outline-light:hover {
            background-color: #f1f1f1;
            color: #000;
        }

        body.light-mode {
            background-color: #f8f9fa;
            color: #212529;
        }

        body.light-mode .card {
            background-color: #ffffff;
            color: #000;
        }

        body.light-mode .navbar, body.light-mode footer {
            background-color: #e9ecef;
        }

        /* Mobile responsiveness for header */
        @media (max-width: 768px) {
            header .row {
                flex-direction: column;
                align-items: center;
                gap: 1rem;
            }
            header .col-12 {
                text-align: center;
            }
            header .d-flex.align-items-center {
                flex-direction: column;
                gap: 1rem;
            }
            #logo {
                order: -1;
                margin: 0 auto;
            }
            .header-search-form {
                flex-direction: column;
                align-items: stretch;
                width: 100%;
            }
            .header-search-form .btn {
                margin-top: 0.5rem;
            }
            .input-group {
                width: 100%;
                max-width: 300px;
            }
            header .col-12.col-md-4 {
                justify-content: center !important;
            }
        }

        /* Additional mobile responsiveness for other elements */
        @media (max-width: 576px) {
            .main-content {
                padding: 10px;
            }
            .tagline {
                font-size: 1.2rem;
                margin: 20px auto;
            }
            .image, .image2 {
                width: 120px;
                height: 120px;
                margin: 5px;
            }
            marquee {
                height: auto;
            }
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

    <header class="container-fluid bg-black py-2">
        <div class="row align-items-center">
            <!-- Left: Hamburger, Logo, Search, Location -->
            <div class="col-12 col-md-8 d-flex align-items-center flex-wrap gap-2 px-3">
                <div class="d-flex align-items-center gap-2">
                    <button class="btn btn-sm btn-white p-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#darkMenu">
                        <i class="fas fa-bars" style="font-size: 1.5rem;"></i>
                    </button>
                    <img id="logo" src="images/logo.jpg" alt="Logo" />
                </div>
                <form class="d-flex align-items-center header-search-form flex-grow-1" action="search.php" method="GET">
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
                <div class="input-group">
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
            <div class="col-12 col-md-4 d-flex justify-content-center justify-content-md-end gap-2 flex-wrap px-3 mt-2 mt-md-0">
                <a href="menu.php" class="btn btn-danger px-3 py-1">🍔 Menu</a>
                <a href="cart.php" class="btn btn-danger px-3 py-1">🛒 Cart</a>
                <?php if (isset($_SESSION['logged_in'])): ?>
                    <a href="logout.php" class="btn btn-danger px-3 py-1">👤 Logout</a>
                <?php else: ?>
                    <a href="login.php" class="btn btn-danger px-3 py-1">Login</a>
                    <a href="signup.php" class="btn btn-danger px-3 py-1">Sign Up</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

<div class="main-content">
    <!-- Aapka existing content (marquee, tagline, etc.) -->

<?php if (!empty($_SESSION['welcome_message'])): ?>
    <div class="alert alert-success alert-dismissible fade show text-center mb-0 welcome-alert" role="alert">
        <strong>✅ <?php echo $_SESSION['welcome_message']; ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['welcome_message']); ?>
<?php endif; ?>

    <!-- Rest of your HTML content -->

    <marquee behavior="scroll" direction="right">
 <img
          class="image"
          src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?q=80&w=781&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
          alt="not found"
        />
        <img
          class="image"
          src="https://images.unsplash.com/photo-1473093295043-cdd812d0e601?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
          alt="not found"
        />
        <img
          class="image"
          src="https://plus.unsplash.com/premium_photo-1675252369719-dd52bc69c3df?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
          alt="not found"
        />
        <img
          class="image"
          src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
          alt=""
        />
        <img
          class="image"
          src="https://images.unsplash.com/photo-1484723091739-30a097e8f929?q=80&w=749&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
          alt=""
        />
        <img
          class="image"
          src="https://images.unsplash.com/photo-1485962398705-ef6a13c41e8f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
          alt=""
        />
        <img
          class="image"
          src="https://images.unsplash.com/photo-1550547660-d9450f859349?q=80&w=765&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
          alt=""
        />
        <img
          class="image"
          src="https://plus.unsplash.com/premium_photo-1694141252026-3df1de888a21?q=80&w=1169&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
          alt=""
        />
        <img
          class="image"
          src="https://images.unsplash.com/photo-1727404679933-99daa2a7573a?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
          alt=""
        />
        <img
          class="image"
          src="https://images.unsplash.com/photo-1621996346565-e3dbc646d9a9?q=80&w=880&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
          alt=""
        />
        <img
          class="image"
          src="https://images.unsplash.com/photo-1611270629569-8b357cb88da9?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
          alt=""
        />
    </marquee>

    <h1 class="tagline animate-text">
        <!-- Your animated text -->
         <span>W</span><span>h</span><span>y</span>
  <span>W</span><span>a</span><span>i</span><span>t</span><span>?</span>
  <span>J</span><span>u</span><span>s</span><span>t</span>
  <span>P</span><span>l</span><span>a</span><span>t</span><span>e</span>
  <span>—</span> <span>w</span><span>i</span><span>t</span><span>h</span>
  <span style="color: rgb(255, 34, 34);">F</span><span style="color: rgb(255, 34, 34);">o</span><span style="color: rgb(255, 34, 34);">o</span><span style="color: rgb(255, 34, 34);">d</span><span style="color: rgb(255, 34, 34);">o</span><span style="color: rgb(255, 34, 34);">g</span><span style="color: rgb(255, 34, 34);">r</span><span style="color: rgb(255, 34, 34);">a</span><span style="color: rgb(255, 34, 34);">m!</span>
    </h1>

    <!-- Second marquee -->
    <div>
        <marquee behavior="hide" direction="left">
            <!-- Your images -->
             <img
            class="image2"
            src="https://images.unsplash.com/photo-1473093226795-af9932fe5856?q=80&w=1094&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt=""
          />
          <img
            class="image2"
            src="https://images.unsplash.com/photo-1574484284002-952d92456975?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt=""
          />
          <img
            class="image2"
            src="https://images.unsplash.com/photo-1529042410759-befb1204b468?q=80&w=686&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt=""
          />
          <img
            class="image2"
            src="https://images.unsplash.com/photo-1563379926898-05f4575a45d8?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt=""
          />
          <img
            class="image2"
            src="https://plus.unsplash.com/premium_photo-1678897742200-85f052d33a71?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt=""
          />
          <img
            class="image2"
            src="https://plus.unsplash.com/premium_photo-1672242676660-923c3bd446d7?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt=""
          /><img
            class="image2"
            src="https://images.unsplash.com/photo-1515516969-d4008cc6241a?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt=""
          /><img
            class="image2"
            src="https://plus.unsplash.com/premium_photo-1661432769134-758550b8fedb?q=80&w=1332&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt=""
          /><img
            class="image2"
            src="https://images.unsplash.com/photo-1624353365286-3f8d62daad51?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt=""
          /><img
            class="image2"
            src="https://images.unsplash.com/photo-1547414368-ac947d00b91d?q=80&w=735&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt=""
          /><img
            class="image2"
            src="https://images.unsplash.com/photo-1551024506-0bccd828d307?q=80&w=764&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt=""
          />
        </marquee>
    </div>
</div>
    <footer class="footer text-white bg-black pt-4 pb-2 mt-5">
        <!-- Your footer content -->
         <div class="container text-center text-md-start">
        <div class="row">
          <!-- Logo and Description -->
          <div class="col-md-4 mb-3">
            <h5 class="glowbox" class="fw-bold" style="color: rgb(255, 200, 0); font-size: 30px;">🍽️ Foodogram</h5>
            <p>
              Your go-to destination for fresh, fast & delicious food delivered
              at your door.
            </p>
          </div>

          <!-- Quick Links -->
          <div class="col-md-4 mb-3">
            <h6 class="fw-bold"  style="color: yellow;">Quick Links</h6>
            <ul class="list-unstyled">
              <li>
                <a href="about.php" class="text-white text-decoration-none"
                  >About Us</a
                >
              </li>
              <li>
                <a href="menu.php" class="text-white text-decoration-none"
                  >Menu</a
                >
              </li>
              <li>
                <a href="profile.php" class="text-white text-decoration-none"
                  >Profile</a
                >
              </li>
              <li>
                <a href="contact.php" class="text-white text-decoration-none"
                  >Contact</a
                >
              </li>
            </ul>
          </div>

          <!-- Social Media -->
          <div class="col-md-4 mb-3">
            <h6  style="color: yellow;"class="fw-bold">Follow Us</h6>
            <a href="#" class="text-white me-3"
              ><i class="fab fa-facebook fa-lg"></i
            ></a>
            <a href="#" class="text-white me-3"
              ><i class="fab fa-instagram fa-lg"></i
            ></a>
            <a href="#" class="text-white me-3">
                <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 512 512" fill="currentColor" style="vertical-align: middle;">
                    <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/>
                </svg>
            </a>
            <a href="#" class="text-white"
              ><i class="fab fa-youtube fa-lg"></i
            ></a>
          </div>
        </div>
        <hr class="border-secondary" />
        <div  style="color: yellow;"class="text-center small">
          &copy; 2025 Foodogram. All rights reserved.
        </div>
      </div>
    </footer>

    <script>

  const toggleBtn = document.getElementById('modeToggle');
  toggleBtn.addEventListener('click', () => {
    document.body.classList.toggle('light-mode');
    if (document.body.classList.contains('light-mode')) {
      toggleBtn.textContent = "🌞 Light Mode";
    } else {
      toggleBtn.textContent = "🌙 Dark Mode";
    }
  });

setTimeout(function() {
    let alert = document.querySelector('.welcome-alert');
    if (alert) {
        alert.classList.add('fade-out');
        setTimeout(() => alert.remove(), 1000);
    }
}, 3000);



        const toggle = document.getElementById('darkModeToggle');
        toggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            toggle.textContent =
                document.body.classList.contains('dark-mode') ? '☀️ Light Mode' : 'Dark Mode';
        });
    </script>
</body>
</html>  