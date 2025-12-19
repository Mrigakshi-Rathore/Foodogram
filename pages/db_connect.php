<?php
$host     = "sql100.infinityfree.com";      // paste MySQL Hostname here
$username = "if0_39795005";          // paste MySQL Username here
$password = "foodogram";          // the password you set when creating DB
$dbname   = "if0_39795005_foodogram"; // paste Database Name here

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Database connected successfully!";
} catch(PDOException $e) {
    die("❌ Database connection failed: " . $e->getMessage());
}
?>