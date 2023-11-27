<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require $_SERVER["DOCUMENT_ROOT"] . '/expert_system/config/database.php';

$sql = "SELECT * FROM users where type='guest' AND deleted_at is null";
$result = $conn->query($sql);

$conn->close();
?>