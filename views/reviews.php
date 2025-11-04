<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Reviews - Foodogram</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Add Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      background-color: #f8f9fa;
      transition: background-color 0.3s, color 0.3s;
    }
    body.dark-mode {
      background-color: #121212;
      color: #f8f9fa;
    }
    .dark-mode .card {
      background-color: #1e1e1e;
      color: #f8f9fa;
      border-color: #444;
    }
    .dark-mode .card-subtitle {
      color: #aaa !important;
    }
    .review-header {
      background: linear-gradient(to right, #052549, #49b7e6);
      color: white;
      padding: 2rem;
      text-align: center;
    }
    .card {
      margin-bottom: 1.5rem; 
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      transition: transform 0.2s;
      height: 100%;
    }
    .card:hover {
      transform: translateY(-5px);
    }
    .return-btn-container {
      text-align: center;
      margin: 2rem 0;
    }
    .rating-stars {
      color: #ffc107;
      font-size: 1.1rem;
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
}

.btn-white i.fas.fa-bars {
  font-size: 2.2rem !important;
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
</head>
<body>
<!-- Header -->
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
           name="q"  <!-- Added name attribute -->
           placeholder="🔍 Search for food or cuisines..." 
           aria-label="Search"
           required>
    <button class="btn btn-danger rounded-pill px-3" type="submit">
        Search
    </button>
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
  <!-- Header -->
  <div class="review-header">
    <h1>Reviews by @xyz</h1>
    <p> mouthwatering moments on Foodogram 🍕🌮🍜</p>
  </div>

  <!-- Reviews Section -->
  <div class="container mt-4">
    <div class="row">
      <?php
      // Array of reviews
      $reviews = [
        ["title" => "Butter Paneer Delight", "rating" => "★★★★☆", "stars" => 4, "date" => "March 2025", "text" => "Creamy, rich, and perfectly spiced! This dish made my taste buds dance."],
        ["title" => "Spicy Thai Noodles", "rating" => "★★★★★", "stars" => 5, "date" => "April 2025", "text" => "Bold flavors and a serious kick! Loved every slurp."],
        ["title" => "Classic Margherita Pizza", "rating" => "★★★☆☆", "stars" => 3, "date" => "April 2025", "text" => "Nice crust, decent flavor, but could use more basil."],
        ["title" => "Masala Dosa Crunch", "rating" => "★★★★★", "stars" => 5, "date" => "Jan 2025", "text" => "Crispy edges, spicy filling, served piping hot. A South Indian gem!"],
        ["title" => "Zesty Lemon Tart", "rating" => "★★★★☆", "stars" => 4, "date" => "Feb 2025", "text" => "Tangy and refreshing—dessert done right!"],
        ["title" => "Punjabi Tandoori Platter", "rating" => "★★★★★", "stars" => 5, "date" => "March 2025", "text" => "Smoky flavors, tender meat, and heavenly chutneys. Perfection!"],
        ["title" => "Tandoori Chicken Wrap", "rating" => "★★★★☆", "stars" => 4, "date" => "April 2025", "text" => "Juicy, smoky, and wrapped tight—great on-the-go flavor!"],
        ["title" => "Chole Bhature Madness", "rating" => "★★★★★", "stars" => 5, "date" => "April 2025", "text" => "Fluffy bhature and spicy chole—comfort food at its best."],
        ["title" => "Mango Cheesecake", "rating" => "★★★★☆", "stars" => 4, "date" => "May 2025", "text" => "Velvety texture and ripe mango punch—dessert magic!"],
        ["title" => "Biryani Royale", "rating" => "★★★★★", "stars" => 5, "date" => "May 2025", "text" => "Fragrant rice and succulent meat in every bite—regal stuff!"],
        ["title" => "Garlic Naan Supreme", "rating" => "★★★★☆", "stars" => 4, "date" => "June 2025", "text" => "Warm, buttery, garlicky perfection—pairs beautifully with curry."],
        ["title" => "Stuffed Kulcha Feast", "rating" => "★★★★★", "stars" => 5, "date" => "June 2025", "text" => "Perfectly baked with spicy paneer stuffing—every bite felt like home."],
        ["title" => "Sizzling Schezwan Fried Rice", "rating" => "★★★★☆", "stars" => 4, "date" => "July 2025", "text" => "Tantalizing spice levels and loaded with crunch—definitely ordering again!"],
        ["title" => "Chocolate Lava Burst", "rating" => "★★★★★", "stars" => 5, "date" => "July 2025", "text" => "Warm, gooey, and decadently rich—chocoholics rejoice!"],
        ["title" => "Rajma Rice Comfort Bowl", "rating" => "★★★★☆", "stars" => 4, "date" => "July 2025", "text" => "Soothing flavors and nostalgic aroma—simple yet satisfying."],
        ["title" => "Mexican Quesadilla Stack", "rating" => "★★★★☆", "stars" => 4, "date" => "August 2025", "text" => "Cheesy, crunchy, and bursting with flavor—global meets local!"],
        ["title" => "Dahi Puri Explosion", "rating" => "★★★★★", "stars" => 5, "date" => "August 2025", "text" => "Sweet, tangy, crispy—mini bites of joy!"],
        ["title" => "Sambar Idli Bowl", "rating" => "★★★★☆", "stars" => 4, "date" => "August 2025", "text" => "Wholesome, hearty, and served with love—perfect start to the day."],
        ["title" => "Peri Peri French Fries", "rating" => "★★★★☆", "stars" => 4, "date" => "Sept 2025", "text" => "Bold spice with crunchy texture—fries with flair!"],
        ["title" => "Mint Mojito Cooler", "rating" => "★★★★★", "stars" => 5, "date" => "Sept 2025", "text" => "Refreshing zest and icy chill—perfect companion for spicy bites."],
        ["title" => "Veg Hakka Noodles", "rating" => "★★★★☆", "stars" => 4, "date" => "Sept 2025", "text" => "Tossed to perfection with just the right crunch and kick."],
        ["title" => "Falafel Wrap Surprise", "rating" => "★★★★☆", "stars" => 4, "date" => "Sept 2025", "text" => "Crispy falafel, creamy tahini, and a soft wrap—Middle Eastern delight!"],
        ["title" => "Grilled Veggie Panini", "rating" => "★★★★☆", "stars" => 4, "date" => "Sept 2025", "text" => "Smoky zucchini and bell peppers with oozy cheese—grilled to perfection."],
        ["title" => "Shahi Tukda Bliss", "rating" => "★★★★★", "stars" => 5, "date" => "Oct 2025", "text" => "Decadent fried bread soaked in syrup and saffron—royal indulgence!"],
        ["title" => "Chicken Shawarma Bowl", "rating" => "★★★★☆", "stars" => 4, "date" => "Oct 2025", "text" => "Juicy slices with garlic sauce and pickles—full-on flavor explosion."],
        ["title" => "Hyderabadi Haleem", "rating" => "★★★★★", "stars" => 5, "date" => "Oct 2025", "text" => "Rich, wholesome, and deeply spiced—a Ramadan classic worth celebrating."],
        ["title" => "Crispy Corn Delight", "rating" => "★★★★☆", "stars" => 4, "date" => "Oct 2025", "text" => "Golden nuggets with a burst of spice—perfect appetizer material!"],
        ["title" => "Mediterranean Hummus Platter", "rating" => "★★★★★", "stars" => 5, "date" => "Oct 2025", "text" => "Creamy hummus, olives, and pita bread—simple and sensational."],
        ["title" => "Tawa Paneer Tikka", "rating" => "★★★★☆", "stars" => 4, "date" => "Oct 2025", "text" => "Marinated to perfection with smokey char—ideal for spice lovers!"],
        ["title" => "Miso Ramen Bowl", "rating" => "★★★★☆", "stars" => 4, "date" => "Oct 2025", "text" => "Savory broth, silky noodles, and umami-packed miso heaven."],
        ["title" => "Kesar Pista Kulfi", "rating" => "★★★★★", "stars" => 5, "date" => "Oct 2025", "text" => "Creamy, nutty, saffron-rich delight—classic Indian frozen treat!"]
      ];

      // Loop through reviews and display them
      foreach ($reviews as $review) {
        echo '
        <div class="col-md-6 col-lg-4 review-card mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title">' . htmlspecialchars($review['title']) . '</h5>
              <div class="d-flex justify-content-between align-items-center mb-2">
                <div class="rating-stars">' . str_repeat('★', $review['stars']) . str_repeat('☆', 5 - $review['stars']) . '</div>
                <small class="text-muted">' . htmlspecialchars($review['date']) . '</small>
              </div>
              <p class="card-text">' . htmlspecialchars($review['text']) . '</p>
            </div>
          </div>
        </div>';
      }
      ?>
    </div>
  </div>
  
  <!-- Return button with proper styling -->
  <div class="return-btn-container">
    <a href="index.php" class="btn btn-dark btn-lg px-4">Return To Home</a>
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

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- Dark Mode Script -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const darkModeToggle = document.getElementById('darkModeToggle');
      const body = document.body;
      
      // Check for saved dark mode preference
      const isDarkMode = localStorage.getItem('darkMode') === 'true';
      
      // Apply dark mode if previously enabled
      if (isDarkMode) {
        body.classList.add('dark-mode');
        darkModeToggle.textContent = '☀️ Light Mode';
      }
      
      // Toggle dark mode
      darkModeToggle.addEventListener('click', function() {
        body.classList.toggle('dark-mode');
        
        // Save preference
        const darkModeEnabled = body.classList.contains('dark-mode');
        localStorage.setItem('darkMode', darkModeEnabled);
        
        // Update button text
        darkModeToggle.textContent = darkModeEnabled ? '☀️ Light Mode' : '🌙 Dark Mode';
      });
    });
  </script>
</body>
</html>