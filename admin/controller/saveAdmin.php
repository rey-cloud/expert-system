<?php

require $_SERVER["DOCUMENT_ROOT"] . '/expert_system/config/database.php';

// Get the submitted admin credentials
$firstname = $_POST["admin_first_name"]; 
$lastname = $_POST["admin_last_name"];
$email = $_POST["admin_email"];
$raw_password = $_POST["admin_pass"];

// Hash the password
$hashed_password = password_hash($raw_password, PASSWORD_DEFAULT);

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO admins (admin_first_name, admin_last_name, admin_email, admin_pass) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $firstname, $lastname, $email, $hashed_password);

// Execute the query
$stmt->execute();

$stmt->close();
$conn->close();

header("location: ../viewAdmin/adminDashboard.php?save-success=true");
?>