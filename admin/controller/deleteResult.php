<?php
session_start();
require $_SERVER["DOCUMENT_ROOT"] . '/expert_system/config/database.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['Yes'])) {
    $result_id = $_SESSION['result_id'];

    // Delete the user from the users table
    $deleteUserSQL = "DELETE FROM result WHERE result_id = $result_id";
    if ($conn->query($deleteUserSQL) === true) {
        // Delete related results from the results table
        $deleteResultsSQL = "DELETE FROM result WHERE result_id = $result_id";
        if ($conn->query($deleteResultsSQL) === true) {
            // Success: User and related results deleted
            header("Location: ../viewAdmin/viewUsers.php?result-delete=true"); // Redirect back to the main page
        } else {
            echo "Error deleting related results: " . $conn->error;
        }
    } else {
        echo "Error deleting user: " . $conn->error;
    }
} else {
    header("Location: ../viewAdmin/viewUsers.php?result");
}

$conn->close();
?>