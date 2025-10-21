<?php
session_start();

$mysqli = new mysqli("sql100.infinityfree.com", "if0_39795005_foodogram", "your_db_pass", "your_db_name");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Assuming user_id is stored in session after login
$user_id = $_SESSION['user_id'] ?? 1;

// Receive cart items JSON via POST
$cart_items = json_decode(file_get_contents('php://input'), true);
if (!$cart_items) {
    echo json_encode(['success' => false, 'message' => 'No cart data received']);
    exit;
}

// Clear existing cart items for this user before saving new
$mysqli->query("DELETE FROM cart_items WHERE user_id = $user_id");

// Insert cart items one by one
$stmt = $mysqli->prepare("INSERT INTO cart_items (user_id, product_id, product_name, product_image, price, quantity) VALUES (?, ?, ?, ?, ?, ?)");
foreach ($cart_items as $item) {
    $stmt->bind_param(
        "iissdi",
        $user_id,
        $item['id'],
        $item['name'],
        $item['image'],
        $item['price'],
        $item['quantity']
    );
    $stmt->execute();
}

$stmt->close();
$mysqli->close();

echo json_encode(['success' => true, 'message' => 'Cart saved successfully']);
?>
<?php
session_start();

$mysqli = new mysqli("localhost", "your_db_user", "your_db_pass", "your_db_name");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$user_id = $_SESSION['user_id'] ?? 1;

$result = $mysqli->query("SELECT * FROM cart_items WHERE user_id = $user_id");

$cart = [];
while ($row = $result->fetch_assoc()) {
    $cart[] = $row;
}

$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Cart</title>
</head>
<body>
    <h1>Your Cart</h1>
    <?php if(count($cart) > 0): ?>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Image</th><th>Name</th><th>Price</th><th>Quantity</th><th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $total = 0;
            foreach($cart as $item): 
                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
            ?>
            <tr>
                <td><img src="<?php echo htmlspecialchars($item['product_image']); ?>" width="60" /></td>
                <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                <td>$<?php echo number_format($item['price'], 2); ?></td>
                <td><?php echo $item['quantity']; ?></td>
                <td>$<?php echo number_format($subtotal, 2); ?></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="4" align="right"><strong>Total</strong></td>
                <td><strong>$<?php echo number_format($total, 2); ?></strong></td>
            </tr>
        </tbody>
    </table>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
    <script>
    fetch('save_cart.php', {
   method: 'POST',
   headers: {'Content-Type': 'application/json'},
   body: JSON.stringify(cart) // your JS cart array
})
.then(res => res.json())
.then(data => {
   if(data.success){
       alert('Cart saved!');
   } else {
       alert('Error saving cart: ' + data.message);
   }
});
 </script>
</body>
</html>
