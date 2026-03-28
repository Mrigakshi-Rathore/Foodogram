<?php
// Migration script to add status column to orders table
$host = "sql100.infinityfree.com";
$dbname = "if0_39795005_foodogram";
$username = "if0_39795005";
$password = "foodogram";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if status column already exists
    $stmt = $pdo->query("SHOW COLUMNS FROM orders LIKE 'status'");
    $exists = $stmt->rowCount() > 0;

    if (!$exists) {
        // Add status column
        $pdo->exec("ALTER TABLE orders ADD COLUMN status VARCHAR(50) DEFAULT 'Placed'");

        echo "✅ Status column added to orders table successfully!";
    } else {
        echo "ℹ️ Status column already exists in orders table.";
    }

} catch (PDOException $e) {
    echo "❌ Migration failed: " . $e->getMessage();
}
?>
