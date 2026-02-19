=<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start Session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Live URL (Render)
define('SITEURL', 'https://food-ordering-deploy.onrender.com/');

// Database Credentials from Render Environment
$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$db   = getenv('DB_NAME');
$port = getenv('DB_PORT');

// Initialize MySQLi
$conn = mysqli_init();

// Enable SSL (Required for TiDB Cloud)
mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);

// Connect
mysqli_real_connect(
    $conn,
    $host,
    $user,
    $pass,
    $db,
    (int)$port,
    NULL,
    MYSQLI_CLIENT_SSL
);

// Check Connection
if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
