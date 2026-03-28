<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

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
    echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $e->getMessage()]);
    exit;
}

// Get user ID from session
$user_id = $_SESSION['user_id'] ?? null;
if (!$user_id) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}

// Get cart data from request
$cart = json_decode(file_get_contents('php://input'), true);

if (!$cart || count($cart) === 0) {
    echo json_encode(['success' => false, 'message' => 'Empty cart data']);
    exit;
}

// Calculate total and format items
$total = 0;
$items = [];
foreach ($cart as $item) {
    $qty = $item['quantity'] ?? $item['qty'] ?? 1;
    $itemTotal = $item['price'] * $qty;
    $total += $itemTotal;
    
    $items[] = $qty . 'x ' . $item['name'] . ' (₹' . number_format($itemTotal, 2) . ')';
}

$itemsText = implode(', ', $items);

// For demo purposes - in a real application, you'd get these from a form
$delivery_address = "123 User Address, City"; // Should come from user profile or form
$payment_method = "Cash on Delivery"; // Should come from form

try {
    // Insert order into database
    $stmt = $pdo->prepare("INSERT INTO orders (user_id, items, total_amount, delivery_address, payment_method, status)
                          VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$user_id, $itemsText, $total, $delivery_address, $payment_method, 'Placed']);

    $order_id = $pdo->lastInsertId();

    // Send order confirmation email
    $stmt = $pdo->prepare("SELECT email FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $order_details = "<p><strong>Items:</strong> $itemsText</p>
                         <p><strong>Total Amount:</strong> ₹" . number_format($total, 2) . "</p>
                         <p><strong>Delivery Address:</strong> $delivery_address</p>
                         <p><strong>Payment Method:</strong> $payment_method</p>";
        sendOrderConfirmationEmail($user['email'], $order_id, $order_details);
    }

    echo json_encode(['success' => true, 'message' => 'Order saved successfully', 'order_id' => $order_id]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
?>