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

// Get order ID from URL or show recent orders
$order_id = isset($_GET['order_id']) ? (int)$_GET['order_id'] : null;
$orders = [];
$current_order = null;

if ($user_id) {
    try {
        if ($order_id) {
            // Get specific order
            $stmt = $pdo->prepare("SELECT * FROM orders WHERE id = ? AND user_id = ?");
            $stmt->execute([$order_id, $user_id]);
            $current_order = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            // Get recent orders
            $stmt = $pdo->prepare("SELECT * FROM orders WHERE user_id = ? ORDER BY id DESC LIMIT 10");
            $stmt->execute([$user_id]);
            $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        $error = "Unable to load orders";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Track Order - Foodogram</title>
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

    .tracking-container {
      max-width: 800px;
      margin: 2rem auto;
      padding: 2rem;
    }

    .order-card {
      background: white;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      margin-bottom: 2rem;
      overflow: hidden;
    }

    .order-header {
      background: linear-gradient(135deg, #ff6b6b, #ffa726);
      color: white;
      padding: 1.5rem;
    }

    .status-timeline {
      padding: 2rem;
    }

    .status-step {
      display: flex;
      align-items: center;
      margin-bottom: 2rem;
      position: relative;
    }

    .status-step:not(:last-child)::after {
      content: '';
      position: absolute;
      left: 20px;
      top: 40px;
      width: 2px;
      height: calc(100% - 40px);
      background: #e9ecef;
    }

    .status-icon {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 1rem;
      font-size: 1.2rem;
      transition: all 0.3s ease;
    }

    .status-icon.completed {
      background: #28a745;
      color: white;
    }

    .status-icon.current {
      background: #ffc107;
      color: white;
      animation: pulse 2s infinite;
    }

    .status-icon.pending {
      background: #e9ecef;
      color: #6c757d;
    }

    .status-content h5 {
      margin: 0;
      font-weight: bold;
    }

    .status-content p {
      margin: 0.25rem 0 0 0;
      color: #6c757d;
    }

    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.1); }
      100% { transform: scale(1); }
    }

    .order-details {
      background: #f8f9fa;
      padding: 1.5rem;
      border-top: 1px solid #e9ecef;
    }

    .order-details h6 {
      color: var(--dark);
      margin-bottom: 1rem;
    }

    .btn-refresh {
      background: var(--accent);
      border: none;
      color: white;
      padding: 0.5rem 1rem;
      border-radius: 25px;
      transition: all 0.3s ease;
    }

    .btn-refresh:hover {
      background: #e55a5a;
      transform: translateY(-2px);
    }

    .no-orders {
      text-align: center;
      padding: 3rem;
      color: #6c757d;
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
    <img id="logo" src="../assets/images/logo.jpg" alt="Logo" class="me-2" style="height: 50px; width: 50px;" />

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
    <a href="../menu.php" class="btn btn-danger px-3 py-1">🍔 Menu</a>
    <a href="../cart.php" class="btn btn-danger px-3 py-1">🛒 Cart</a>

    <?php if (isset($_SESSION['logged_in'])): ?>
      <a href="../logout.php" class="btn btn-danger px-3 py-1">👤 Logout</a>
    <?php else: ?>
      <a href="../login.php" class="btn btn-danger px-3 py-1">Login</a>
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
      <li class="nav-item"><a class="nav-link text-white" href="../index.php">Home</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="../about.php">About Us</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="../profile.php">Profile</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="../favorites.php">Saved Items</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="../rating.php">Rate Us</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="../settings.php">Settings</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="../help.php">Help/Contact</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="../terms.php">Terms & Conditions</a></li>
    </ul>
  </div>
</div>

<!-- Main Content -->
<div class="container tracking-container">
  <div class="row">
    <div class="col-12">
      <h1 class="text-center mb-4">
        <i class="fas fa-truck text-primary me-2"></i>
        Track Your Order
      </h1>

      <?php if (!$user_id): ?>
        <div class="alert alert-warning text-center">
          <i class="fas fa-exclamation-triangle me-2"></i>
          Please <a href="../login.php">login</a> to track your orders.
        </div>
      <?php elseif ($current_order): ?>
        <!-- Single Order Tracking -->
        <div class="order-card">
          <div class="order-header">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <h4 class="mb-1">Order #<?php echo $current_order['id']; ?></h4>
                <p class="mb-0">Total: ₹<?php echo number_format($current_order['total_amount'], 2); ?></p>
              </div>
              <button class="btn-refresh" onclick="refreshStatus()">
                <i class="fas fa-sync-alt me-2"></i>Refresh
              </button>
            </div>
          </div>

          <div class="status-timeline">
            <?php
            $statuses = [
                'Placed' => ['icon' => 'fas fa-shopping-cart', 'desc' => 'Your order has been placed successfully'],
                'Preparing' => ['icon' => 'fas fa-utensils', 'desc' => 'Our chefs are preparing your delicious meal'],
                'Ready for Delivery' => ['icon' => 'fas fa-box', 'desc' => 'Your order is ready and waiting for pickup'],
                'Out for Delivery' => ['icon' => 'fas fa-truck', 'desc' => 'Your order is on the way to you'],
                'Delivered' => ['icon' => 'fas fa-check-circle', 'desc' => 'Order delivered successfully. Enjoy your meal!']
            ];

            $current_status = $current_order['status'];
            $status_keys = array_keys($statuses);
            $current_index = array_search($current_status, $status_keys);

            foreach ($statuses as $status => $info):
                $is_completed = array_search($status, $status_keys) < $current_index;
                $is_current = $status === $current_status;
                $is_pending = array_search($status, $status_keys) > $current_index;
            ?>
              <div class="status-step">
                <div class="status-icon <?php echo $is_completed ? 'completed' : ($is_current ? 'current' : 'pending'); ?>">
                  <i class="<?php echo $info['icon']; ?>"></i>
                </div>
                <div class="status-content">
                  <h5><?php echo $status; ?></h5>
                  <p><?php echo $info['desc']; ?></p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

          <div class="order-details">
            <h6><i class="fas fa-list me-2"></i>Order Details</h6>
            <p><strong>Items:</strong> <?php echo htmlspecialchars($current_order['items']); ?></p>
            <p><strong>Delivery Address:</strong> <?php echo htmlspecialchars($current_order['delivery_address']); ?></p>
            <p><strong>Payment Method:</strong> <?php echo htmlspecialchars($current_order['payment_method']); ?></p>
          </div>
        </div>

      <?php elseif (count($orders) > 0): ?>
        <!-- Order List -->
        <div class="row">
          <?php foreach ($orders as $order): ?>
            <div class="col-md-6 mb-4">
              <div class="order-card">
                <div class="order-header">
                  <h5>Order #<?php echo $order['id']; ?></h5>
                  <span class="badge bg-<?php echo $order['status'] === 'Delivered' ? 'success' : 'warning'; ?>">
                    <?php echo $order['status']; ?>
                  </span>
                </div>
                <div class="card-body">
                  <p class="mb-1"><strong>Total:</strong> ₹<?php echo number_format($order['total_amount'], 2); ?></p>
                  <p class="mb-3"><strong>Items:</strong> <?php echo htmlspecialchars(substr($order['items'], 0, 50)) . '...'; ?></p>
                  <a href="?order_id=<?php echo $order['id']; ?>" class="btn btn-primary">
                    <i class="fas fa-eye me-2"></i>Track This Order
                  </a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

      <?php else: ?>
        <div class="no-orders">
          <i class="fas fa-shopping-cart fa-3x mb-3 text-muted"></i>
          <h3>No Orders Found</h3>
          <p>You haven't placed any orders yet.</p>
          <a href="../menu.php" class="btn btn-primary">Start Ordering</a>
        </div>
      <?php endif; ?>
    </div>
  </div>
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Real-time status updates
  let refreshInterval;

  function refreshStatus() {
    if (<?php echo $current_order ? 'true' : 'false'; ?>) {
      location.reload();
    }
  }

  // Auto-refresh every 30 seconds if tracking a specific order
  <?php if ($current_order): ?>
    refreshInterval = setInterval(refreshStatus, 30000);
  <?php endif; ?>

  // Dark mode toggle
  document.getElementById('darkModeToggle').addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
    this.innerHTML = document.body.classList.contains('dark-mode')
      ? '☀️ Light Mode'
      : '🌙 Dark Mode';
  });
</script>
</body>
</html>
