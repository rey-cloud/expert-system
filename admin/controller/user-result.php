<?php

require $_SERVER["DOCUMENT_ROOT"] . '/expert_system/config/database.php';

$sql = "SELECT * FROM users WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['result-user-id']);
$stmt->execute();

$resultUser = $stmt->get_result();

$stmt->close();
$conn->close();
?>
