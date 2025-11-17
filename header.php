<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo isset($page_title) ? $page_title : 'Foodogram'; ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    
    <style>
        /* Your CSS styles here (keep all the styles from your original file) */
        /* ... */

header {
            height: auto;
            min-height: 70px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 10px 15px !important;
        }

      .image,
      .image2 {
        height: 200px;
        width: 200px;
        margin: 20px 10px; /* add some horizontal gap */
        border-radius: 10px;
        border: 3px solid white;
        box-shadow: 0 4px 8px rgba(255, 255, 255, 0.2);
      }
      body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.4); /* Dark overlay */
        backdrop-filter: blur(2px); /* Slight blur */
        z-index: -1; /* Behind everything */
      }
      marquee img {
        margin-top: 20px !important;
        padding-top: 0 !important;
        display: inline-block;
        vertical-align: top; /* aligns with top edge */
      }
      #tab {
        margin-left: 800px;
      }
      #logo {
        height: 60px;
        width: 60px;
        margin-top: 0;
        margin-left: 0;
        border-radius: 50%;
        object-fit: cover;
      }
      .btn {
        margin-top: 0px;
        padding: 8px 12px !important;
        font-size: 0.95rem;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .image {
        height: 200px;
        width: 200px;
        margin-top: 50px;
        display: inline-block;
      }
      .image2 {
        height: 200px;
        width: 200px;
        margin-top: 100px;
      }
      h1 {
        font-style: italic;
        text-align: center;
        margin-top: 90px;
        color: #ffffff;
        text-shadow: 1px 1px 1px;
      }
      body {
        background-image: url("bgimg.jpeg"); /* Replace with your image path */
        background-size: cover; /* Makes the image cover the full body */
        background-repeat: no-repeat; /* Prevents the image from repeating */
        background-position: center;
        background-attachment: fixed; /* keeps it fixed when scrolling (optional) */
      } /* Centers the image */
      #options {
        margin-left: 600px;
      }
      button i {
        font-size: 3rem;
        padding: 4px;
        color: white;
        border: none;
        outline: none;
        box-shadow: none;
      }
      .tagline {
        
        color: white;
        margin-left: 290px;
        width: 60%;
        text-align: center;
        margin-bottom: 75px;
        justify-content: center;
        
      }
      .btn-danger {
        margin-right: 15px; /* Adjust the spacing between buttons */
      }

      .main-content {
        position: relative;
        z-index: 1;
        overflow: hidden;
      }

      
      .animate-text span {
  display: inline-block;
  opacity: 0;
  transform: translateY(10px);
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
        height: 300px;
        background: linear-gradient(
          to right,
          #000000,
          #0d0d0d,
          #1a1a1a,
          #0d0d0d,
          #000000
        );
        color: white;
        padding-top: 2rem;
        padding-bottom: 1rem;
        font-size: 18px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.05);
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
  .header-search-form {
    max-width: 1000px !important; /* Adjust this value */
    width: 100%;
}

/* Make the input field expand */
.header-search-form .form-control {
    flex-grow: 1;
    min-width: 320px; /* Minimum width */
}
        /* Make the hamburger menu icon smaller */
.btn-white i.fas.fa-bars {
    font-size: 1.5rem !important; /* Adjust size as needed */
}

/* Navbar container improvements */
#header {
    gap: 15px;
}

#header > div {
    gap: 12px;
    align-items: center;
}

/* Search form improvements */
#header form {
    gap: 8px;
    height: 40px;
}

#header .form-control {
    height: 40px;
    padding: 8px 15px;
    font-size: 0.9rem;
}

#header .form-select {
    height: 40px;
    padding: 8px 12px;
    font-size: 0.9rem;
}

#header .input-group {
    height: 40px;
}

#header .input-group-text {
    padding: 0 10px;
    font-size: 1rem;
}

/* Button consistency */
#header .btn {
    font-size: 0.9rem;
    padding: 8px 15px;
    height: 40px;
    border-radius: 20px;
    white-space: nowrap;
}

/* Hamburger button specific */
.btn-white {
    padding: 6px 10px !important;
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.btn-white:hover {
    background-color: rgba(255, 255, 255, 0.1);
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
                    <a class="nav-link text-white" href="help.php">Help/contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="terms.php">Terms and Conditions</a>
                </li>
            </ul>
        </div>
    </div>

    <header id="header" class="d-flex align-items-center justify-content-between bg-black">
        <!-- Left: Hamburger + Logo -->
        <div class="d-flex align-items-center">
            <button class="btn btn-sm btn-white p-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#darkMenu">
                <i class="fas fa-bars" style="font-size: 1.5rem;"></i>
            </button>
            <img id="logo" src="logo.jpeg" alt="Logo" class="ms-2" />
            
            <!-- Search Bar -->
            <div class="ms-3">
                <form class="d-flex align-items-center" style="gap: 8px;">
                    <input class="form-control rounded-pill" 
                           type="search" 
                           placeholder="🔍 Search for food or cuisines..." 
                           aria-label="Search"
                           style="height: 40px; width: 400px; padding: 8px 15px;">
                    <button class="btn btn-danger rounded-pill px-4" 
                            type="submit"
                            style="height: 40px; padding: 8px 20px !important;">
                        Search
                    </button>
                </form>
            </div>
            
            <!-- Location Selector -->
            <div class="input-group ms-3" style="width: 180px; height: 40px;">
                <span class="input-group-text bg-danger text-white px-2" style="border: none;">
                    <i class="fas fa-map-marker-alt"></i>
                </span>
                <select class="form-select" style="border: 1px solid #dc3545; padding: 8px 10px;">
                    <option selected disabled>Location</option>
                    <option>Jaipur</option>
                    <option>Delhi</option>
                    <option>Mumbai</option>
                    <option>Bangalore</option>
                </select>
            </div>
        </div>

        <!-- Right: Buttons -->
        <div class="d-flex align-items-center" style="gap: 10px;">
            <a href="menu.php" class="btn btn-danger px-4 py-0">🍔 Menu</a>
            <a href="cart.php" class="btn btn-danger px-4 py-0">🛒 Cart</a>
            <?php if (isset($_SESSION['logged_in'])): ?>
                <a href="logout.php" class="btn btn-danger px-4 py-0">👤 Logout</a>
            <?php else: ?>
                <a href="login.php" class="btn btn-danger px-4 py-0">Login</a>
            <?php endif; ?>
            <button id="darkModeToggle" class="btn btn-outline-light ms-1 px-3 py-0">🌙 Dark</button>
        </div>
    </header>

    <?php if (isset($_SESSION['welcome_message'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['welcome_message'] ?>
            <?php unset($_SESSION['welcome_message']); ?>
        </div>
    <?php endif; ?>