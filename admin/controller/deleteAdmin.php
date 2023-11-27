<?php

require $_SERVER["DOCUMENT_ROOT"] . '/expert_system/config/database.php';

// Check if admin_id is set in the URL
if (isset($_GET["user_id"]) || isset($_POST["Yes"])) {
    if (isset($_GET["user_id"]) ) {
        $admin_id = $_GET["user_id"]; 
    } else {
        $admin_id = $_POST["Yes"];
    }


    // Prepare and bind a DELETE statement
    $stmt = $conn->prepare("DELETE FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $admin_id); // Assuming admin_id is an integer

    // Execute the DELETE query
    if ($stmt->execute()) {
        // Record deleted successfully
        $stmt->close();
        $conn->close();
        header("location: ../viewAdmin/viewAdmin.php?save-success=true");
    } else {
        // Handle the case where the deletion failed
        echo "Error: " . $stmt->error;
    }
} else {
    // Handle the case where admin_id is not set in the URL
    header("Location: ../viewAdmin/viewAdmin.php");
    echo "Invalid admin_id parameter";
}