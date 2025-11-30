<?php
session_start();

// DB connection
$host = "sql100.infinityfree.com";
$dbname = "if0_39795005_foodogram";
$username = "if0_39795005";
$password = "foodogram";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Check if user is logged in
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "Guest";

// Handle save/unsave actions
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $user_id) {
    if (isset($_POST['item_id']) && isset($_POST['action'])) {
        $item_id = $_POST['item_id'];
        $action = $_POST['action'];
        
        if ($action == 'save') {
            // Check if already saved
            $check = $pdo->prepare("SELECT * FROM saved_items WHERE user_id = ? AND item_id = ?");
            $check->execute([$user_id, $item_id]);
            
            if ($check->rowCount() == 0) {
                $stmt = $pdo->prepare("INSERT INTO saved_items (user_id, item_id) VALUES (?, ?)");
                $stmt->execute([$user_id, $item_id]);
            }
        } elseif ($action == 'unsave') {
            $stmt = $pdo->prepare("DELETE FROM saved_items WHERE user_id = ? AND item_id = ?");
            $stmt->execute([$user_id, $item_id]);
        }
        
        // Return JSON response for AJAX requests
        if (isset($_POST['ajax'])) {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'success']);
            exit();
        }
        
        // Redirect to avoid form resubmission
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
}

// Fetch menu categories
$categories = [];
try {
    $stmt = $pdo->query("SELECT * FROM categories ORDER BY name");
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $categories_error = "Unable to load categories";
}

// Fetch menu items
$items = [];
try {
    $query = "SELECT mi.*, c.name as category_name 
              FROM menu_items mi 
              LEFT JOIN categories c ON mi.category_id = c.id 
              ORDER BY c.name, mi.name";
    $stmt = $pdo->query($query);
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $items_error = "Unable to load menu items";
}

// Fetch user's saved items if logged in
$saved_items = [];
if ($user_id) {
    try {
        $stmt = $pdo->prepare("SELECT item_id FROM saved_items WHERE user_id = ?");
        $stmt->execute([$user_id]);
        $saved_items = $stmt->fetchAll(PDO::FETCH_COLUMN);
    } catch (PDOException $e) {
        // Silent error for saved items
    }
}

// Group items by category
$items_by_category = [];
foreach ($items as $item) {
    $category_id = $item['category_id'];
    if (!isset($items_by_category[$category_id])) {
        $items_by_category[$category_id] = [
            'category_name' => $item['category_name'],
            'items' => []
        ];
    }
    $items_by_category[$category_id]['items'][] = $item;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Menu - Foodogram</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary: #6654F1;
      --secondary: #EACCF8;
      --accent: #ff6b6b;
      --dark: #284369;
      --light: #f8f9fa;
    }
    
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
      color: #333;
    }
    
    .floating-icons {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
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
    
    .menu-category {
      margin-bottom: 3rem;
    }
    
    .category-title {
      color: var(--dark);
      border-bottom: 3px solid var(--primary);
      padding-bottom: 0.5rem;
      margin-bottom: 1.5rem;
      display: inline-block;
    }
    
    .menu-item-card {
      border: none;
      border-radius: 12px;
      overflow: hidden;
      transition: transform 0.3s, box-shadow 0.3s;
      height: 100%;
    }
    
    .menu-item-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    .menu-item-img {
      height: 200px;
      object-fit: cover;
    }
    
    .item-price {
      color: var(--primary);
      font-weight: bold;
      font-size: 1.2rem;
    }
    
    .save-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      background: rgba(255, 255, 255, 0.9);
      border: none;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s;
    }
    
    .save-btn:hover {
      background: var(--accent);
      color: white;
    }
    
    .saved {
      color: var(--accent);
    }
    
    .badge-veg {
      background-color: #28a745;
      color: white;
    }
    
    .badge-nonveg {
      background-color: #dc3545;
      color: white;
    }
    
    .footer {
      background: linear-gradient(to right, #000000, #0d0d0d, #1a1a1a, #0d0d0d, #000000);
      color: white;
      padding-top: 2rem;
      padding-bottom: 1rem;
      font-size: 18px;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.05);
    }
    
    .filter-buttons {
      margin-bottom: 2rem;
    }
    
    .filter-btn {
      margin: 0 5px 10px;
      border-radius: 20px;
    }
    
    .cart-notification {
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 1050;
      display: none;
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
    <button class="btn btn-sm btn-white p-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#darkMenu">
      <i class="fas fa-bars" style="font-size: 1.5rem;"></i>
    </button>
    <img id="logo" src="images/logo.jpg" alt="Logo" class="me-2" />
    
    <!-- Search Bar -->
    <div class="px-3">
      <form class="d-flex align-items-center" style="min-width: 400px;">
        <input class="form-control form-control-lg rounded-pill me-2" 
              type="search" 
              placeholder="🔍 Search for food or cuisines..." 
              aria-label="Search"
              style="height: 40px;">
        <button class="btn btn-danger rounded-pill px-3" type="submit" style="height: 40px;">
          Search
        </button>
      </form>
    </div>
    
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
    
    <button id="darkModeToggle" class="btn btn-outline-light ms-1 px-3 py-1">🌙 Dark Mode</button>
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
      <li class="nav-item"><a class="nav-link text-white" href="home.php">Home</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="about.php">About Us</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="profile.php">Profile</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="saved.php">Saved Items</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="rating.php">Rate Us</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="settings.php">Settings</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="help.php">Help/Contact</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="terms.php">Terms & Conditions</a></li>
    </ul>
  </div>
</div>

<!-- Main Content -->
<div class="container my-5">
  <div class="row">
    <div class="col-12 text-center mb-4">
      <h1>Our Delicious Menu</h1>
      <p class="lead">Explore our wide variety of dishes and save your favorites!</p>
    </div>
  </div>

  <!-- Category Filter Buttons -->
  <div class="row filter-buttons justify-content-center">
    <div class="col-12 text-center">
      <button class="btn btn-outline-primary filter-btn active" data-filter="all">All Items</button>
      <?php foreach ($categories as $category): ?>
        <button class="btn btn-outline-primary filter-btn" data-filter="category-<?php echo $category['id']; ?>">
          <?php echo htmlspecialchars($category['name']); ?>
        </button>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Menu Items -->
  <?php foreach ($items_by_category as $category_id => $category_data): ?>
    <div class="menu-category" id="category-<?php echo $category_id; ?>">
      <h2 class="category-title"><?php echo htmlspecialchars($category_data['category_name']); ?></h2>
      <div class="row">
        <?php foreach ($category_data['items'] as $item): ?>
          <div class="col-md-4 mb-4">
            <div class="card menu-item-card">
              <div class="position-relative">
                <img src="<?php echo !empty($item['image_url']) ? $item['image_url'] : 'https://via.placeholder.com/300x200/6654F1/FFFFFF?text=' . urlencode($item['name']); ?>" 
                     class="card-img-top menu-item-img" alt="<?php echo htmlspecialchars($item['name']); ?>">
                <button class="save-btn <?php echo in_array($item['id'], $saved_items) ? 'saved' : ''; ?>" 
                        data-item-id="<?php echo $item['id']; ?>"
                        <?php echo !$user_id ? 'disabled title="Login to save items"' : ''; ?>>
                  <i class="<?php echo in_array($item['id'], $saved_items) ? 'fas' : 'far'; ?> fa-heart"></i>
                </button>
                <span class="position-absolute top-0 start-0 m-2 badge <?php echo $item['is_veg'] ? 'badge-veg' : 'badge-nonveg'; ?>">
                  <?php echo $item['is_veg'] ? 'VEG' : 'NON-VEG'; ?>
                </span>
              </div>
              <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($item['name']); ?></h5>
                <p class="card-text"><?php echo htmlspecialchars($item['description']); ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="item-price">₹<?php echo number_format($item['price'], 2); ?></span>
                  <button class="btn btn-primary add-to-cart" data-item-id="<?php echo $item['id']; ?>">
                    <i class="fas fa-cart-plus"></i> Add to Cart
                  </button>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<!-- Cart Notification -->
<div class="alert alert-success cart-notification" role="alert">
  <i class="fas fa-check-circle"></i> Item added to cart successfully!
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
<script>
  // Save item functionality
  document.querySelectorAll('.save-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      const itemId = this.getAttribute('data-item-id');
      const isSaved = this.classList.contains('saved');
      const action = isSaved ? 'unsave' : 'save';
      
      // Send AJAX request
      const formData = new FormData();
      formData.append('item_id', itemId);
      formData.append('action', action);
      formData.append('ajax', 'true');
      
      fetch('<?php echo $_SERVER['PHP_SELF']; ?>', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.status === 'success') {
          // Update UI
          const icon = this.querySelector('i');
          if (isSaved) {
            this.classList.remove('saved');
            icon.classList.remove('fas');
            icon.classList.add('far');
          } else {
            this.classList.add('saved');
            icon.classList.remove('far');
            icon.classList.add('fas');
          }
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
      });
    });
  });
  
  // Add to cart functionality
  document.querySelectorAll('.add-to-cart').forEach(btn => {
    btn.addEventListener('click', function() {
      const itemId = this.getAttribute('data-item-id');
      
      // Show notification
      const notification = document.querySelector('.cart-notification');
      notification.style.display = 'block';
      
      // Hide after 3 seconds
      setTimeout(() => {
        notification.style.display = 'none';
      }, 3000);
      
      // In a real app, you would add the item to the cart here
      console.log('Added item to cart:', itemId);
    });
  });
  
  // Filter functionality
  document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      // Remove active class from all buttons
      document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
      
      // Add active class to clicked button
      this.classList.add('active');
      
      const filter = this.getAttribute('data-filter');
      
      if (filter === 'all') {
        // Show all categories
        document.querySelectorAll('.menu-category').forEach(category => {
          category.style.display = 'block';
        });
      } else {
        // Hide all categories
        document.querySelectorAll('.menu-category').forEach(category => {
          category.style.display = 'none';
        });
        
        // Show selected category
        document.getElementById(filter).style.display = 'block';
      }
    });
  });
  
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