<?php
session_start();
header('Content-Type: application/json');

require_once 'email_utils.php';

// DB connection
$host = "sql100.infinityfree.com";
$dbname = "if0_39795005_foodogram";
$username = "if0_39795005";
$password = "foodogram";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit;
}

// Check if admin/restaurant is logged in (you might want to add proper authentication)
$admin_logged_in = isset($_SESSION['admin_logged_in']) || isset($_SESSION['restaurant_logged_in']);
if (!$admin_logged_in) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized access']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

// Get POST data
$order_id = isset($_POST['order_id']) ? (int)$_POST['order_id'] : null;
$new_status = isset($_POST['status']) ? trim($_POST['status']) : null;

if (!$order_id || !$new_status) {
    echo json_encode(['success' => false, 'message' => 'Order ID and status are required']);
    exit;
}

// Validate status
$valid_statuses = ['Placed', 'Preparing', 'Ready for Delivery', 'Out for Delivery', 'Delivered'];
if (!in_array($new_status, $valid_statuses)) {
    echo json_encode(['success' => false, 'message' => 'Invalid status']);
    exit;
}

try {
    // Update order status
    $stmt = $pdo->prepare("UPDATE orders SET status = ? WHERE id = ?");
    $stmt->execute([$new_status, $order_id]);

    if ($stmt->rowCount() > 0) {
        // Get user email for notification (assuming users table exists)
        $stmt = $pdo->prepare("SELECT u.email, o.user_id FROM orders o JOIN users u ON o.user_id = u.id WHERE o.id = ?");
        $stmt->execute([$order_id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Send email notification
        if ($user) {
            sendStatusUpdateEmail($user['email'], $order_id, $new_status);
        }

        echo json_encode([
            'success' => true,
            'message' => 'Order status updated successfully',
            'order_id' => $order_id,
            'new_status' => $new_status
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Order not found or no changes made']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
?>
