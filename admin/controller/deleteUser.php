<?php
require $_SERVER["DOCUMENT_ROOT"] . '/expert_system/config/database.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Update the user's deleted_at time to the current time
    $deleteUserSQL = "DELETE FROM users WHERE user_id = $user_id";
    if ($conn->query($deleteUserSQL) === true) { // Use $deleteUserSQL instead of $updateUserSQL
        // Success: User deleted
        header("Location: ../viewAdmin/viewUsers.php?save-success=true"); // Redirect back to the main page
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}

$conn->close();
?>