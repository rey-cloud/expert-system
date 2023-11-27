<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['email'])) {
    require $_SERVER["DOCUMENT_ROOT"] . '/expert_system/config/database.php';

    // Get the user data based on the email stored in the session
    $email = $_SESSION['email'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    $resultsArray = []; // Initialize an array to store the results

    // Check if user data was fetched successfully
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['fk-user-id'] = $row['user_id'];
        }

        $user_id = $_SESSION['fk-user-id'];

        // Get all results for the user
        $stmt = $conn->prepare("SELECT * FROM result WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Store the results in an array
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $resultsArray[] = $row;
            }
        }
    } else {
        echo "User not found in the database.";
    }
} else {
    echo "Email not found in the session.";
}
?>