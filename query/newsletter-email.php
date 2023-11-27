<?php

session_start();

require $_SERVER["DOCUMENT_ROOT"] . '/expert_system/config/database.php';

$stmt = $conn->prepare("INSERT INTO for_newsletter(newsletter_email) VALUES (?)");
$stmt->bind_param("s", $newsletterEmail);

$newsletterEmail = $_POST["newsletter_email"];
$stmt->execute();

$stmt->close();
$conn->close();

$_SESSION["send-success"] = true;

header("location: ../index.php#email-sent");
?>