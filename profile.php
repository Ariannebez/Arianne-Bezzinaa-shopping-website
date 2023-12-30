<?php
        include 'includes/header.php';
        require_once "includes/functions.php";
        require_once "includes/dbh.php";
        require_once "includes/db-functions.php";

session_start();

if (!isset($_SESSION['username'])) {
    // Redirect to login page
    header("Location: login.php");
    exit;
}

// Database connection
$conn = new mysqli("hostname", "username", "password", "database");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$username = $_SESSION['username'];
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();


if ($user) {
    echo "Welcome " . htmlspecialchars($user['name']) . "<br>";
    echo "Email: " . htmlspecialchars($user['email']) . "<br>";
    // other details
} else {
    echo "User not found";
}

$conn->close();




        include 'includes/footer.php'?>