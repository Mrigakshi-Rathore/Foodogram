<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$host     = "localhost";      // Local MySQL server
$port     = 3306;              // Default MySQL port
$username = "root";           // Default XAMPP MySQL username
$password = "";               // Default password is empty for XAMPP
$dbname   = "foodogram";      // The DB name you created locally
$charset  = 'utf8mb4';

$dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $conn = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    http_response_code(500);
    die("Database connection failed: " . $e->getMessage());
}
?>
