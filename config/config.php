<?php
/**
 * Configuration file for Foodogram application
 * Contains database credentials and other application constants
 */

// Database Configuration
define('DB_HOST', 'sql100.infinityfree.com');
define('DB_NAME', 'if0_39795005_foodogram');
define('DB_USER', 'if0_39795005');
define('DB_PASS', 'foodogram');
define('DB_CHARSET', 'utf8mb4');

// Application Constants
define('APP_NAME', 'Foodogram');
define('APP_VERSION', '1.0.0');
define('SESSION_TIMEOUT', 3600); // 1 hour in seconds

// Security Constants
define('CSRF_TOKEN_LENGTH', 32);
define('PASSWORD_MIN_LENGTH', 8);

// File Paths
define('ROOT_PATH', __DIR__);

// Error Reporting (set to false in production)
define('DEBUG_MODE', true);

if (DEBUG_MODE) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}
?>
