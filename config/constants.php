<?php
// Start output buffering FIRST
ob_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start Session safely
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Live URL
define('SITEURL', 'https://food-ordering-deploy.onrender.com/');

// Database
$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$db   = getenv('DB_NAME');
$port = getenv('DB_PORT');

$conn = mysqli_init();

mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);

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

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
