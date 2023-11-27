<?php 

session_start();

if (isset($_POST['Yes'])) {
    unset($_SESSION['admin-id']);
    header("Location: ../../index.php");
} else {
    header("Location: ../viewAdmin/adminDashboard.php");
}

?>