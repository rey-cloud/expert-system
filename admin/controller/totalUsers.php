<?php
require $_SERVER["DOCUMENT_ROOT"] . '/expert_system/config/database.php';

$sql = "SELECT COUNT(*) as user_count from users where type='guest' and deleted_at is null";
$result = $conn->query($sql);
$count = 0;

if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
$count = $row['user_count'];
}

echo $count;