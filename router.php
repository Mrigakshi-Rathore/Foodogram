<?php
// router.php

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$file = __DIR__ . $path;

// 1. If the file actually exists, serve it normally.
if (file_exists($file) && !is_dir($file)) {
    return false; // Let PHP serve the file as usual
}

// 2. If the file is a directory but has an index.php, serve that.
if (is_dir($file) && file_exists($file . '/index.php')) {
    include $file . '/index.php';
    exit;
}

// 3. If the file DOES NOT exist, show the Coming Soon page!
// You can even set a custom title based on the filename they tried to access.
$page_name = basename($path, ".php"); 
$page_title = ucfirst($page_name) . " is Coming Soon! 🍳";

include 'coming_soon.php';
?>