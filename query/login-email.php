<?php
session_start();
require $_SERVER["DOCUMENT_ROOT"] . '/expert_system/config/database.php';

// Unset session variables if set
$unsetSessionVariables = ['first', 'last', 'age', 'pass-pin', 'security', 'secret'];
foreach ($unsetSessionVariables as $variable) {
    unset($_SESSION[$variable]);
}

if (isset($_POST['email'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    unset($_SESSION['admin']);
    $email = validate($_POST['email']);

    if (empty($email)) {
        $error_message = "Email is required";
        header("Location: ../index.php?error=" . urlencode($error_message));
    } else {
        $_SESSION['email'] = $email;
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['type'] === 'admin') {
                $_SESSION['admin-id'] = $row['user_id'];
                $_SESSION['admin'] = true;
                header("Location: ../index.php?admin-page=true");
            } else {
                unset($_SESSION['admin-id']);
                header("Location: ../index.php?existing-user=true");
            }
        } else {
            unset($_SESSION['admin-id']);
            header("Location: ../index.php?new-user=true");
        }
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>