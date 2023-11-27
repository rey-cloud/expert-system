<?php
session_start();

// Check if an admin is logged in
if (!isset($_SESSION['admin-id'])) {
    // Redirect to the login page if no admin is logged in
    header("Location: .adminLogin.php");
    exit;
}

// Fetch the logged-in admin's details from the database
require $_SERVER["DOCUMENT_ROOT"] . '/expert_system/config/database.php';

$admin_id = $_SESSION['admin-id'];
$stmt = $conn->prepare("SELECT first_name FROM users WHERE user_id = ?");
$stmt->bind_param("i", $admin_id);
$stmt->execute();
$stmt->bind_result($admin_first_name);
$stmt->fetch();
$stmt->close();
?>