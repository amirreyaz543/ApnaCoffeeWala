config.php


<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'apna_chai_wala');

// Site configuration
define('SITE_NAME', 'Apna Chai Wala');
define('SITE_URL', 'http://localhost/apna-chai-wala');
define('ADMIN_EMAIL', 'admin@apnachaiwala.com');

// Create database connection
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
