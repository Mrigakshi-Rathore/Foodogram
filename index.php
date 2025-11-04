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
        /* Your existing CSS styles here */
        header {
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            position: sticky;
            top: 0;
            z-index: 1000;
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
        height: 135px;
        width: 135px;
        margin-top: 0;
        margin-left: 15px;
        border-radius: 50%;
      }
      .btn {
        margin-top: 0px;
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
        background-image: url("images/bgImg.jpeg"); /* Replace with your image path */
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
    font-size: 2.2rem !important; /* Adjust size as needed (default is 1rem) */

}

@keyframes slideDown {
    0% { transform: translateY(-100%); opacity: 0; }
    100% { transform: translateY(0); opacity: 1; }
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
/* Remove fixed margin-left */
#options, #tab {
  margin-left: 0 !important;
}

/* Make logo responsive */
#logo {
  height: 90px;
  width: 90px;
  margin-left: 10px;
}
@media (min-width: 768px) {
  #logo {
    height: 120px;
    width: 120px;
  }
}

/* Search bar responsive */
.header-search-form {
  width: 100%;
  max-width: 100%;
}
.header-search-form .form-control {
  flex: 1 1 auto;
  min-width: 0; /* allow shrinking */
}

/* Search & location adjust */
@media (max-width: 768px) {
  .header-search-form {
    min-width: 100% !important;
    margin-top: 10px;
  }
  .input-group {
    width: 100% !important;
    margin-top: 10px;
  }
}

/* Buttons stack on small screens */
@media (max-width: 576px) {
  .d-flex.align-items-center.gap-2 {
    flex-wrap: wrap;
    justify-content: center;
    gap: 5px;
  }
}

/* Make marquee images responsive */
.image, .image2 {
  height: auto;
  width: 150px;
  max-width: 40vw;  /* Shrinks on small screens */
}
@media (max-width: 576px) {
  .image, .image2 {
    width: 100px;
  }
}

/* Tagline responsive */
.tagline {
  width: 90%;
  margin: 20px auto;
  font-size: 1.3rem;
}
@media (min-width: 768px) {
  .tagline {
    font-size: 1.8rem;
  }
}
/* Marquee images same size */
.image, .image2 {
  width: 180px;   /* equal width */
  height: 180px;  /* equal height */
  object-fit: cover;   /* crop without distortion */
  border-radius: 10px;
  margin: 10px;
  border: 3px solid white;
  box-shadow: 0 4px 8px rgba(255, 255, 255, 0.2);
}

/* Smaller size on mobile */
@media (max-width: 576px) {
  .image, .image2 {
    width: 120px;
    height: 120px;
  }
}
/* Search bar wider */
.header-search-form {
  flex-grow: 1; 
  max-width: 600px;   /* pehle 400px tha, 
  width: 100%;
}

.header-search-form .form-control {
  flex-grow: 1;
  min-width: 0;
}
.main-content {
  min-height: 80vh;  /* screen ke 80% height tak body stretch hogi */
  padding: 40px 20px;
}
/* Mobile pe thoda bada */
#logo {
  height: 110px;
  width: 110px;
  margin-left: 10px;
}

/* Tablet & desktop pe aur bada */
@media (min-width: 768px) {
  #logo {
    height: 140px;
    width: 140px;
  }
}
body.light-mode {
  background-color: #f8f9fa;  /* light background */
  color: #212529;             /* dark text */
}

body.light-mode .card {
  background-color: #ffffff;
  color: #000;
}

body.light-mode .navbar,
body.light-mode footer {
  background-color: #e9ecef;
}
/* Header Logo */
#logo { height: 90px; width: 90px; margin-left:10px; }
@media(min-width:768px){ #logo{ height:140px; width:140px; } }

/* Search Bar */
.header-search-form { flex-grow:1; max-width:600px; width:100%; margin-top:5px; }
.header-search-form .form-control { flex-grow:1; min-width:0; }

/* Marquee images */
.image, .image2 { width:180px; height:180px; object-fit:cover; border-radius:10px; margin:10px; }
@media(max-width:576px){ .image, .image2 { width:120px; height:120px; } }

/* Buttons container responsiveness */
.d-flex.align-items-center.gap-2 { flex-wrap:wrap; justify-content:center; }

/* Main content height */
.main-content { min-height:80vh; padding:20px; }

/* Tagline responsive */
.tagline { width:90%; margin:20px auto; font-size:1.2rem; }
@media(min-width:768px){ .tagline{ font-size:1.8rem; } }
/* Slightly smaller tagline */
.tagline {
    width: 90%;
    margin: 30px auto;
    font-size: 2.3rem;      /* slightly smaller */
    font-weight: 700;
    text-align: center;
    color: white;
    text-shadow: 1px 1px 5px rgba(0,0,0,0.4);
}

/* Medium screens */
@media (min-width: 768px) {
    .tagline {
        font-size: 2.7rem;   /* adjusts for larger screens */
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
            <a href="#" class="text-white me-3"
              ><i class="fab fa-twitter fa-lg"></i
            ></a>
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