<?php
session_start();

// DB connection (InfinityFree)
$host = "sql100.infinityfree.com";       // MySQL Hostname from cPanel
$dbname = "if0_39795005_foodogram";      // Your database name
$username = "if0_39795005";              // MySQL Username
$password = "foodogram";                 // The password

$message = ""; // Initialize message variable

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data - FIXED: using correct field names
    $username = $_POST['username'];
    $dish = $_POST['restaurant']; // This matches the form field name "restaurant"
    $rating = $_POST['rating'];
    $comment = $_POST['comments']; // This matches the form field name "comments"
    
    // Validate that dish is not empty
    if (empty(trim($dish))) {
        $message = "Error: Dish name cannot be empty!";
    } else {
        try {
            // Prepare SQL statement
            $sql = "INSERT INTO ratings (username, dish, rating, comment)
                    VALUES (?, ?, ?, ?)";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$username, $dish, $rating, $comment]);
            
            $message = "Rating submitted successfully!";
        } catch (PDOException $e) {
            $message = "Error: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ratings - Foodogram</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    /* Your original header styles */
    .floating-icons {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none; /* icons won't block clicks */
        z-index: 9999;
      }
@keyframes floatIcon {
  0% { transform: translateY(0); opacity: 1; }
  100% { transform: translateY(-120vh); opacity: 0; }
}
      .floating-icons span {
        position: absolute;
        font-size: 40px;
        animation: floatIcon 8s linear infinite;
        opacity: 0.8;
        animation-delay: calc(var(--i) * 1s);
        top: 100%;
      }
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
    }
    .btn-white i.fas.fa-bars {
      font-size: 2.2rem !important;
    }

    /* Rest of your styles */
    html, body { height: 100%; }
    body {
      font-family: 'Segoe UI', sans-serif;
      background-image: linear-gradient(-225deg, #6654F1 0%, #EACCF8 48%, #6654F1 100%);
      margin: 0;
      
    }
    .rating-form {
      max-width: 600px;
      margin: 30px auto;
      background-color: rgba(255, 255, 255, 0.9);
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
    }
    .star-rating {
      display: flex;
      flex-direction: row-reverse;
      justify-content: start;
      margin-bottom: 15px;
    }
    .star-rating input[type="radio"] { display: none; }
    .star-rating label {
      font-size: 2rem;
      color: #ccc;
      cursor: pointer;
      transition: color 0.3s;
    }
    .star-rating input[type="radio"]:checked ~ label,
    .star-rating label:hover,
    .star-rating label:hover ~ label {
      color: #ffc107;
    }
    h2 { color: #333; }
    h4 { text-align: center; font-size: 20px; color: #284369; }
    .btn i { pointer-events: none; }
    textarea { resize: none; }
    .footer {
      background: linear-gradient(to right, #000000, #0d0d0d, #1a1a1a, #0d0d0d, #000000);
      color: white;
      padding-top: 2rem;
      padding-bottom: 1rem;
      font-size: 18px;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.05);
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
                    <a class="nav-link text-white" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../about.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../rating.php">Rate Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../settings.php">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../help.php">Help/Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../terms.php">Terms and Conditions</a>
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


<!-- Main Rating Section -->
<section id="rating" class="container my-5">
  <h2 class="text-center mb-3">Rate Your Foodogram Experience</h2>
  <h4 style="font-size:20px; color:purple;">Melt our hearts with a 5-star rating 💛—just like gooey grilled cheese.</h4>

  <?php if (!empty($message)): ?>
    <div class="alert alert-success mt-3"><?php echo $message; ?></div>
  <?php endif; ?>

  <form class="rating-form mt-4" method="POST" action="">
    <div class="mb-3">
      <label for="username" class="form-label">Your Name:</label>
      <input type="text" name="username" id="username" class="form-control" placeholder="Enter your name" required>
    </div>
    
    <div class="mb-3">
      <label for="restaurant" class="form-label">Dish:</label>
      <input type="text" name="restaurant" id="restaurant" class="form-control" placeholder="What did you try?" required>
    </div>
    
    <div class="mb-3">
      <label class="form-label">Rating:</label>
      <div class="star-rating">
        <input type="radio" name="rating" id="star5" value="5" required><label for="star5">★</label>
        <input type="radio" name="rating" id="star4" value="4"><label for="star4">★</label>
        <input type="radio" name="rating" id="star3" value="3"><label for="star3">★</label>
        <input type="radio" name="rating" id="star2" value="2"><label for="star2">★</label>
        <input type="radio" name="rating" id="star1" value="1"><label for="star1">★</label>
      </div>
    </div>
    
    <div class="mb-4">
      <label for="comments" class="form-label">Comments:</label>
      <textarea name="comments" id="comments" class="form-control" rows="4" placeholder="Share your thoughts"></textarea>
    </div>

    <button type="submit" class="btn btn-primary w-100 py-2">Submit Rating</button>
  </form>
  <div class="d-flex align-items-center gap-3">
        <div class="floating-icons">
          <div class="floating-icons">
            <span style="left: 3%; --i: 0">✨</span>
            <span style="left: 10%; --i: 1">🌟</span>
            <span style="left: 17%; --i: 3">⭐️</span>
            <span style="right: 3%; --i: 0">✨</span>
            <span style="right: 10%; --i: 1">🌟</span>
            <span style="right: 17%; --i: 3">⭐️</span>
           
          </div>
        </div>
</section>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Dark mode toggle functionality
  document.getElementById('darkModeToggle').addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
    this.innerHTML = document.body.classList.contains('dark-mode') 
      ? '☀️ Light Mode' 
      : '🌙 Dark Mode';
  });
</script>
</body>
</html>