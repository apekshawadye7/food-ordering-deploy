<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start Session
session_start();

// 🔹 Live Render URL
define('SITEURL', 'https://food-ordering-deploy.onrender.com/');

// 🔹 Database Connection using TiDB + SSL

$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$db   = getenv('DB_NAME');
$port = getenv('DB_PORT');

// Initialize connection
$conn = mysqli_init();

// Enable SSL (Required for TiDB Cloud)
mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);

// Connect to database
mysqli_real_connect(
    $conn,
    $host,
    $user,
    $pass,
    $db,
    $port,
    NULL,
    MYSQLI_CLIENT_SSL
);

// Check connection
if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>
