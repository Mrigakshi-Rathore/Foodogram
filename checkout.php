<?php
session_start();

// Database connection
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
$user_id = $_SESSION['user_id'] ?? null;
$username = $_SESSION['username'] ?? 'Guest';

// Initialize variables
$order_success = false;
$error_message = '';

// Process order when form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_order'])) {
    // Get cart data from localStorage (passed via hidden field or AJAX)
    $cart_json = $_POST['cart_data'] ?? '[]';
    $cart_items = json_decode($cart_json, true);
    
    if (!empty($cart_items) && $user_id) {
        try {
            $pdo->beginTransaction();
            
            // Calculate total amount
            $total_amount = 0;
            foreach ($cart_items as $item) {
                $total_amount += $item['price'] * $item['qty'];
            }
            
            // Generate unique order number
            $order_number = 'ORD' . date('YmdHis') . rand(100, 999);
            
            // Insert into orders table
            $order_stmt = $pdo->prepare("
                INSERT INTO orders (user_id, order_number, total_amount, customer_name, customer_email, customer_phone, delivery_address, special_instructions) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)
            ");
            
            $order_stmt->execute([
                $user_id,
                $order_number,
                $total_amount,
                $_POST['customer_name'] ?? $username,
                $_POST['customer_email'] ?? '',
                $_POST['customer_phone'] ?? '',
                $_POST['delivery_address'] ?? '',
                $_POST['special_instructions'] ?? ''
            ]);
            
            $order_id = $pdo->lastInsertId();
            
            // Insert order items
            $item_stmt = $pdo->prepare("
                INSERT INTO order_items (order_id, product_id, product_name, product_price, quantity, item_total) 
                VALUES (?, ?, ?, ?, ?, ?)
            ");
            
            foreach ($cart_items as $item) {
                $item_total = $item['price'] * $item['qty'];
                $item_stmt->execute([
                    $order_id,
                    $item['id'],
                    $item['name'],
                    $item['price'],
                    $item['qty'],
                    $item_total
                ]);
            }
            
            $pdo->commit();
            $order_success = true;
            
            // Clear cart after successful order
            echo "<script>localStorage.removeItem('cart');</script>";
            
        } catch (Exception $e) {
            $pdo->rollBack();
            $error_message = "Order failed: " . $e->getMessage();
        }
    } else {
        $error_message = "Cart is empty or user not logged in";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Checkout - Foodogram</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        body {
            background-color: #121212;
            color: white;
            min-height: 100vh;
            padding: 2rem 0;
        }
        .checkout-container {
            max-width: 1000px;
            margin: auto;
        }
        .order-summary, .customer-info {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        .order-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            padding-bottom: 0.5rem;
        }
        .order-total {
            font-weight: bold;
            font-size: 1.25rem;
            margin-top: 1rem;
            text-align: right;
            color: #ff6b6b;
        }
        .checkout-btn {
            display: block;
            width: 100%;
            padding: 0.75rem;
            font-size: 1.2rem;
            border-radius: 50px;
        }
        h2 {
            margin-bottom: 1.5rem;
            color: #ff6b6b;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.7);
        }
        .form-control {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.3);
            color: white;
        }
        .form-control:focus {
            background: rgba(255,255,255,0.2);
            border-color: #ff6b6b;
            color: white;
        }
        .success-message {
            background: rgba(40, 167, 69, 0.2);
            border: 1px solid #28a745;
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="checkout-container">
        <?php if ($order_success): ?>
            <div class="success-message">
                <h2><i class="fas fa-check-circle"></i> Order Confirmed!</h2>
                <p>Thank you for your order! Your food is being prepared.</p>
                <p>Order Number: <strong><?php echo $order_number; ?></strong></p>
                <a href="menu.php" class="btn btn-primary mt-3">Continue Shopping</a>
            </div>
        <?php else: ?>
            <h2>Checkout</h2>
            
            <?php if ($error_message): ?>
                <div class="alert alert-danger"><?php echo $error_message; ?></div>
            <?php endif; ?>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="customer-info">
                        <h4>Customer Information</h4>
                        <form id="checkoutForm" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="customer_name" 
                                       value="<?php echo htmlspecialchars($username); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="customer_email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" name="customer_phone" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Delivery Address</label>
                                <textarea class="form-control" name="delivery_address" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Special Instructions</label>
                                <textarea class="form-control" name="special_instructions" rows="2"></textarea>
                            </div>
                            <input type="hidden" name="cart_data" id="cartData">
                            <input type="hidden" name="confirm_order" value="1">
                        </form>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="order-summary">
                        <h4>Order Summary</h4>
                        <div id="order-summary">
                            <!-- Items will be dynamically inserted here -->
                        </div>
                    </div>
                    
                    <button class="btn btn-danger checkout-btn" id="confirmOrderBtn" 
                            <?php echo !$user_id ? 'disabled' : ''; ?>>
                        <?php echo $user_id ? 'Confirm Order' : 'Please Login to Order'; ?>
                    </button>
                    
                    <?php if (!$user_id): ?>
                        <div class="alert alert-warning mt-3">
                            <a href="login.php" class="alert-link">Login</a> to place your order.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <script>
        const orderSummary = document.getElementById('order-summary');
        const confirmOrderBtn = document.getElementById('confirmOrderBtn');
        const cartDataField = document.getElementById('cartData');
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        function renderOrder() {
            orderSummary.innerHTML = '';
            if (cart.length === 0) {
                orderSummary.innerHTML = '<p>Your cart is empty.</p>';
                confirmOrderBtn.disabled = true;
                return;
            }
            
            confirmOrderBtn.disabled = false;
            let total = 0;
            
            cart.forEach(item => {
                const itemTotal = item.price * item.qty;
                total += itemTotal;

                const div = document.createElement('div');
                div.className = 'order-item';
                div.innerHTML = `
                    <div>
                        <strong>${item.name}</strong> x ${item.qty}
                    </div>
                    <div>
                        ₹${itemTotal.toFixed(2)}
                    </div>
                `;
                orderSummary.appendChild(div);
            });
            
            const totalDiv = document.createElement('div');
            totalDiv.className = 'order-total';
            totalDiv.textContent = `Total: ₹${total.toFixed(2)}`;
            orderSummary.appendChild(totalDiv);
            
            // Update hidden field with cart data
            cartDataField.value = JSON.stringify(cart);
        }
        
        confirmOrderBtn.addEventListener('click', () => {
            if (cart.length === 0) return;
            
            // Validate form
            const form = document.getElementById('checkoutForm');
            if (form.checkValidity()) {
                form.submit();
            } else {
                form.reportValidity();
            }
        });

        // Initial render
        renderOrder();
    </script>
    <form method="POST" onsubmit="showLoader()">

</body>
</html>