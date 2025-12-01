<?php
session_start();
// Sample user data
$user_data = [
    'name' => $_SESSION['username'] ?? 'Food Explorer',
    'username' => $_SESSION['username'] ?? '@foodlover',
    'join_date' => '2022',
    'orders_count' => 47,
    'reviews_count' => 23,
    'favorites_count' => 15,
    'member_level' => 'Gold Member',
    'avatar' => 'https://static.vecteezy.com/system/resources/previews/032/176/191/non_2x/business-avatar-profile-black-icon-man-of-user-symbol-in-trendy-flat-style-isolated-on-male-profile-people-diverse-face-for-social-network-or-web-vector.jpg'
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>User Profile - Foodogram</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
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

    /* Header Styles - Same as before */
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

    /* Enhanced Profile Styles */
    .profile-hero {
      background: linear-gradient(135deg, rgba(255, 107, 107, 0.9), rgba(255, 167, 38, 0.9));
      color: white;
      padding: 4rem 2rem;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .profile-hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="%23ffffff" opacity="0.1"><polygon points="1000,100 1000,0 0,100"/></svg>');
      background-size: cover;
    }

    .profile-avatar {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      border: 4px solid white;
      margin: -75px auto 20px;
      background: white;
      position: relative;
      z-index: 3;
      box-shadow: 0 10px 30px rgba(0,0,0,0.3);
      transition: all 0.3s ease;
    }

    .profile-avatar:hover {
      transform: scale(1.05);
      box-shadow: 0 15px 40px rgba(0,0,0,0.4);
    }

    /* Enhanced Cards */
    .profile-card {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 20px;
      padding: 2rem;
      transition: all 0.3s ease;
      height: 100%;
      color: white;
    }

    .profile-card:hover {
      transform: translateY(-10px);
      background: rgba(255, 255, 255, 0.15);
      box-shadow: 0 15px 30px rgba(0,0,0,0.3);
    }

    .stat-card {
      text-align: center;
      padding: 2.5rem 1.5rem;
    }

    .stat-icon {
      width: 80px;
      height: 80px;
      background: linear-gradient(45deg, #ff6b6b, #ffa726);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1.5rem;
      font-size: 2rem;
      transition: all 0.3s ease;
    }

    .stat-card:hover .stat-icon {
      transform: scale(1.1);
    }

    .stat-number {
      font-size: 3rem;
      font-weight: bold;
      color: #ff6b6b;
      margin-bottom: 0.5rem;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }

    .btn-profile {
      background: linear-gradient(45deg, #ff6b6b, #ffa726);
      border: none;
      padding: 12px 30px;
      border-radius: 50px;
      font-weight: bold;
      color: white;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-block;
      box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
    }

    .btn-profile:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(255, 107, 107, 0.4);
      color: white;
    }

    /* Activity Timeline */
    .activity-timeline {
      position: relative;
      padding-left: 2rem;
    }

    .activity-timeline::before {
      content: '';
      position: absolute;
      left: 15px;
      top: 0;
      bottom: 0;
      width: 2px;
      background: linear-gradient(to bottom, #ff6b6b, #ffa726);
    }

    .timeline-item {
      position: relative;
      margin-bottom: 2rem;
      padding: 1.5rem;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 15px;
      border-left: 4px solid #ff6b6b;
      transition: all 0.3s ease;
    }

    .timeline-item:hover {
      background: rgba(255, 255, 255, 0.15);
      transform: translateX(5px);
    }

    .timeline-item::before {
      content: '';
      position: absolute;
      left: -2.3rem;
      top: 2rem;
      width: 12px;
      height: 12px;
      border-radius: 50%;
      background: #ff6b6b;
      border: 3px solid #1a1a1a;
    }

    /* Badges */
    .badge-premium {
      background: linear-gradient(45deg, #FFD700, #FFA500);
      color: black;
      font-weight: bold;
      padding: 0.5rem 1.5rem;
      border-radius: 50px;
      font-size: 0.9rem;
      box-shadow: 0 3px 10px rgba(255, 215, 0, 0.3);
    }

    /* Quick Actions */
    .quick-actions {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 20px;
      padding: 2rem;
    }

    .action-btn {
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.3);
      color: white;
      padding: 1rem;
      border-radius: 15px;
      transition: all 0.3s ease;
      text-align: center;
      text-decoration: none;
      display: block;
      margin-bottom: 1rem;
    }

    .action-btn:hover {
      background: rgba(255, 107, 107, 0.2);
      transform: translateY(-3px);
      color: white;
      border-color: #ff6b6b;
    }

    /* Footer Styles - Same as before */
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

    /* Mobile Responsive Styles */
    @media (max-width: 767px) {
      /* Header Adjustments */
      header {
        height: auto;
        padding: 0.5rem 0.25rem;
        flex-direction: column;
        align-items: stretch;
      }

      header .d-flex.align-items-center {
        flex-direction: column;
        gap: 0.5rem;
        align-items: center;
      }

      #logo {
        height: 50px;
        width: 50px;
        margin: 0;
      }

      .header-search-form {
        max-width: 100% !important;
        width: 100%;
      }

      .header-search-form .form-control {
        min-width: auto;
        flex-grow: 1;
        font-size: 0.8rem;
        padding: 0.375rem 0.75rem;
      }

      .header-search-form .btn {
        padding: 0.375rem 0.75rem;
        font-size: 0.8rem;
      }

      .input-group {
        width: 100% !important;
        margin: 0.25rem 0;
        height: 32px;
      }

      .input-group .form-select {
        font-size: 0.8rem;
        padding: 0.375rem 0.75rem;
      }

      .input-group-text {
        padding: 0.375rem 0.5rem;
        font-size: 0.8rem;
      }

      header .d-flex.align-items-center.gap-2 {
        flex-direction: row;
        justify-content: center;
        flex-wrap: wrap;
        gap: 0.25rem;
      }

      header .btn {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
      }

      /* Main Content */
      .main-content {
        padding: 1rem 0;
      }

      /* Profile Hero */
      .profile-hero {
        padding: 2rem 1rem;
      }

      .profile-hero h1 {
        font-size: 2rem;
      }

      .profile-hero .lead {
        font-size: 1rem;
      }

      /* Profile Avatar */
      .profile-avatar {
        width: 100px;
        height: 100px;
        margin: -50px auto 1rem;
      }

      /* Profile Card */
      .profile-card {
        padding: 1.5rem;
        margin: 1rem 0;
      }

      .profile-card h2 {
        font-size: 1.5rem;
      }

      .profile-card p.lead {
        font-size: 1rem;
      }

      /* Stats Section */
      .stat-card {
        padding: 1.5rem 1rem;
        margin-bottom: 1rem;
      }

      .stat-icon {
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
        margin-bottom: 1rem;
      }

      .stat-number {
        font-size: 2rem;
      }

      .stat-card h4 {
        font-size: 1.2rem;
      }

      .btn-profile {
        padding: 10px 20px;
        font-size: 0.9rem;
        width: 100%;
        margin-top: 1rem;
      }

      /* Activity Timeline */
      .activity-timeline {
        padding-left: 1rem;
      }

      .timeline-item {
        padding: 1rem;
        margin-bottom: 1rem;
      }

      .timeline-item h5 {
        font-size: 1rem;
      }

      .timeline-item p {
        font-size: 0.9rem;
      }

      /* Quick Actions */
      .quick-actions {
        padding: 1.5rem;
        margin-top: 1rem;
      }

      .action-btn {
        padding: 1rem;
        font-size: 1rem;
        margin-bottom: 0.5rem;
      }

      /* Footer */
      .footer {
        padding-top: 1.5rem;
        padding-bottom: 1rem;
        font-size: 16px;
      }

      .footer h5 {
        font-size: 24px;
      }

      .footer .row > div {
        margin-bottom: 1.5rem;
      }

      .btn-top {
        width: 100%;
        margin-top: 1rem;
      }
    }
  </style>
</head>
<body>
  <!-- Header - Same as before -->
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
        <a href="signup.php" class="btn btn-danger px-3 py-1">Sign Up</a>
      <?php endif; ?>
    </div>
  </header>

  <!-- Offcanvas Menu - Same as before -->
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
    <!-- Profile Hero Section -->
    <div class="profile-hero">
      <div class="container">
        <h1 class="display-4 fw-bold mb-3">Welcome Back, <?php echo $user_data['name']; ?>! 👋</h1>
        <p class="lead mb-4">Your delicious food journey continues...</p>
        <span class="badge-premium"><?php echo $user_data['member_level']; ?></span>
      </div>
    </div>

    <!-- Profile Content -->
    <div class="container">
      <!-- Profile Info -->
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="profile-card text-center mt-4">
            <img src="<?php echo $user_data['avatar']; ?>" alt="Profile Avatar" class="profile-avatar" />
            <h2 class="mt-3 fw-bold"><?php echo $user_data['name']; ?></h2>
            <p class="text-muted mb-4">
              <i class="fas fa-user-circle me-2"></i><?php echo $user_data['username']; ?> 
              • <i class="fas fa-calendar-alt me-2"></i>Member since <?php echo $user_data['join_date']; ?>
            </p>
            <p class="lead">🍔 Food Explorer | 📝 Recipe Reviewer | 🌟 Restaurant Critic</p>
          </div>
        </div>
      </div>

      <!-- Stats Section -->
      <div class="row g-4 mt-4">
        <div class="col-md-4">
          <div class="profile-card stat-card">
            <div class="stat-icon">
              <i class="fas fa-shopping-bag"></i>
            </div>
            <div class="stat-number"><?php echo $user_data['orders_count']; ?></div>
            <h4 class="fw-bold">Total Orders</h4>
            <p class="text-muted mb-3">Delicious meals enjoyed</p>
            <a href="orders.php" class="btn-profile">View Orders</a>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="profile-card stat-card">
            <div class="stat-icon">
              <i class="fas fa-star"></i>
            </div>
            <div class="stat-number"><?php echo $user_data['reviews_count']; ?></div>
            <h4 class="fw-bold">Reviews</h4>
            <p class="text-muted mb-3">Restaurants rated</p>
            <a href="reviews.php" class="btn-profile">View Reviews</a>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="profile-card stat-card">
            <div class="stat-icon">
              <i class="fas fa-heart"></i>
            </div>
            <div class="stat-number"><?php echo $user_data['favorites_count']; ?></div>
            <h4 class="fw-bold">Favorites</h4>
            <p class="text-muted mb-3">Loved dishes saved</p>
            <a href="favorites.php" class="btn-profile">View Favorites</a>
          </div>
        </div>
      </div>

      <!-- Activity & Actions -->
      <div class="row g-4 mt-4">
        <!-- Recent Activity -->
        <div class="col-lg-8">
          <div class="profile-card">
            <h3 class="fw-bold mb-4">📈 Recent Activity</h3>
            <div class="activity-timeline">
              <div class="timeline-item">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <h5 class="fw-bold mb-1">Order Completed</h5>
                    <p class="text-muted mb-1">Butter Chicken & Garlic Naan • Spice Garden</p>
                    <small class="text-muted">2 hours ago</small>
                  </div>
                  <span class="badge bg-success">Delivered</span>
                </div>
              </div>
              
              <div class="timeline-item">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <h5 class="fw-bold mb-1">Review Added</h5>
                    <p class="text-muted mb-1">Rated "Italian Corner" ★★★★☆</p>
                    <small class="text-muted">1 day ago</small>
                  </div>
                  <span class="badge bg-info">Rated</span>
                </div>
              </div>
              
              <div class="timeline-item">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <h5 class="fw-bold mb-1">Added to Favorites</h5>
                    <p class="text-muted mb-1">Paneer Tikka Masala • Curry House</p>
                    <small class="text-muted">2 days ago</small>
                  </div>
                  <span class="badge bg-danger">Favorite</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-lg-4">
          <div class="quick-actions">
            <h4 class="fw-bold mb-4">⚡ Quick Actions</h4>
            <a href="menu.php" class="action-btn">
              <i class="fas fa-utensils me-2"></i>Order Food
            </a>
            <a href="track_order.php" class="action-btn">
              <i class="fas fa-truck me-2"></i>Track Order
            </a>
            <a href="edit_profile.php" class="action-btn">
              <i class="fas fa-edit me-2"></i>Edit Profile
            </a>
            <a href="settings.php" class="action-btn">
              <i class="fas fa-cog me-2"></i>Settings
            </a>
            <a href="index.php" class="action-btn">
              <i class="fas fa-home me-2"></i>Back to Home
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer - Same as before -->
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

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    function scrollToTop() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // Counter animation
    document.addEventListener('DOMContentLoaded', function() {
      const counters = document.querySelectorAll('.stat-number');
      
      counters.forEach(counter => {
        const target = +counter.innerText;
        let count = 0;
        const duration = 2000;
        const increment = target / (duration / 16);
        
        const updateCount = () => {
          if (count < target) {
            count += increment;
            counter.innerText = Math.ceil(count);
            setTimeout(updateCount, 16);
          } else {
            counter.innerText = target;
          }
        };
        
        // Start counter when element is in viewport
        const observer = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              updateCount();
              observer.unobserve(entry.target);
            }
          });
        });
        
        observer.observe(counter);
      });
    });
  </script>
</body>
</html>