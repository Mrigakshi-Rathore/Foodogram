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

// Check if admin is logged in (for demo purposes, we'll allow access)
$admin_logged_in = true; // In production, check proper authentication

if (!$admin_logged_in) {
    die("Unauthorized access");
}

// Handle status update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $order_id = (int)$_POST['order_id'];
    $new_status = trim($_POST['status']);

    $valid_statuses = ['Placed', 'Preparing', 'Ready for Delivery', 'Out for Delivery', 'Delivered'];
    if (in_array($new_status, $valid_statuses)) {
        try {
            $stmt = $pdo->prepare("UPDATE orders SET status = ? WHERE id = ?");
            $stmt->execute([$new_status, $order_id]);

            if ($stmt->rowCount() > 0) {
                $success_message = "Order status updated successfully!";
            } else {
                $error_message = "Order not found or no changes made.";
            }
        } catch (PDOException $e) {
            $error_message = "Database error: " . $e->getMessage();
        }
    } else {
        $error_message = "Invalid status selected.";
    }
}

// Fetch all orders
try {
    $stmt = $pdo->query("SELECT o.*, u.name as user_name, u.email FROM orders o LEFT JOIN users u ON o.user_id = u.id ORDER BY o.id DESC");
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $orders = [];
    $error_message = "Unable to load orders";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin - Order Management - Foodogram</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
      color: #333;
    }

    .admin-header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      padding: 2rem 0;
      margin-bottom: 2rem;
    }

    .order-card {
      background: white;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      margin-bottom: 1rem;
      overflow: hidden;
    }

    .order-header {
      background: #f8f9fa;
      padding: 1rem;
      border-bottom: 1px solid #e9ecef;
    }

    .status-badge {
      padding: 0.25rem 0.75rem;
      border-radius: 20px;
      font-size: 0.875rem;
      font-weight: bold;
    }

    .status-placed { background: #ffc107; color: #212529; }
    .status-preparing { background: #17a2b8; color: white; }
    .status-ready { background: #28a745; color: white; }
    .status-out { background: #fd7e14; color: white; }
    .status-delivered { background: #6f42c1; color: white; }

    .btn-update {
      background: #28a745;
      border: none;
      color: white;
      padding: 0.375rem 0.75rem;
      border-radius: 0.25rem;
      font-size: 0.875rem;
    }

    .btn-update:hover {
      background: #218838;
    }
  </style>
</head>
<body>

<div class="admin-header">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1><i class="fas fa-cog me-2"></i>Order Management Dashboard</h1>
        <p class="mb-0">Manage and update order statuses</p>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <?php if (isset($success_message)): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="fas fa-check-circle me-2"></i><?php echo $success_message; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <?php if (isset($error_message)): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="fas fa-exclamation-triangle me-2"></i><?php echo $error_message; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <div class="row">
    <div class="col-12">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Orders (<?php echo count($orders); ?>)</h2>
        <a href="../index.php" class="btn btn-secondary">
          <i class="fas fa-home me-2"></i>Back to Home
        </a>
      </div>

      <?php if (count($orders) > 0): ?>
        <?php foreach ($orders as $order): ?>
          <div class="order-card">
            <div class="order-header">
              <div class="row align-items-center">
                <div class="col-md-3">
                  <strong>Order #<?php echo $order['id']; ?></strong>
                </div>
                <div class="col-md-3">
                  <i class="fas fa-user me-1"></i><?php echo htmlspecialchars($order['user_name'] ?? 'Unknown'); ?>
                </div>
                <div class="col-md-2">
                  <i class="fas fa-rupee-sign me-1"></i><?php echo number_format($order['total_amount'], 2); ?>
                </div>
                <div class="col-md-2">
                  <span class="status-badge status-<?php echo strtolower(str_replace(' ', '', $order['status'])); ?>">
                    <?php echo $order['status']; ?>
                  </span>
                </div>
                <div class="col-md-2 text-end">
                  <button class="btn btn-update btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $order['id']; ?>">
                    <i class="fas fa-edit me-1"></i>Update
                  </button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <h6><i class="fas fa-list me-2"></i>Items</h6>
                  <p class="mb-1"><?php echo htmlspecialchars($order['items']); ?></p>
                </div>
                <div class="col-md-6">
                  <h6><i class="fas fa-map-marker-alt me-2"></i>Delivery Address</h6>
                  <p class="mb-1"><?php echo htmlspecialchars($order['delivery_address']); ?></p>
                  <h6><i class="fas fa-credit-card me-2"></i>Payment Method</h6>
                  <p class="mb-0"><?php echo htmlspecialchars($order['payment_method']); ?></p>
                </div>
              </div>
            </div>
          </div>

          <!-- Update Status Modal -->
          <div class="modal fade" id="updateModal<?php echo $order['id']; ?>" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Update Order #<?php echo $order['id']; ?> Status</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST">
                  <div class="modal-body">
                    <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                    <div class="mb-3">
                      <label for="status<?php echo $order['id']; ?>" class="form-label">New Status</label>
                      <select class="form-select" id="status<?php echo $order['id']; ?>" name="status" required>
                        <option value="Placed" <?php echo $order['status'] === 'Placed' ? 'selected' : ''; ?>>Placed</option>
                        <option value="Preparing" <?php echo $order['status'] === 'Preparing' ? 'selected' : ''; ?>>Preparing</option>
                        <option value="Ready for Delivery" <?php echo $order['status'] === 'Ready for Delivery' ? 'selected' : ''; ?>>Ready for Delivery</option>
                        <option value="Out for Delivery" <?php echo $order['status'] === 'Out for Delivery' ? 'selected' : ''; ?>>Out for Delivery</option>
                        <option value="Delivered" <?php echo $order['status'] === 'Delivered' ? 'selected' : ''; ?>>Delivered</option>
                      </select>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="update_status" class="btn btn-primary">Update Status</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="text-center py-5">
          <i class="fas fa-shopping-cart fa-3x mb-3 text-muted"></i>
          <h3>No Orders Found</h3>
          <p class="text-muted">There are no orders in the system yet.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
