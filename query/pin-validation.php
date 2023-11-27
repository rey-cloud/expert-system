<?php
session_start();
require $_SERVER["DOCUMENT_ROOT"] . '/expert_system/config/database.php';

if (isset($_POST['forgot-pass'])) {
    header("Location: ../index.php?forgot-pass=true");
    exit();
}

if (isset($_GET['quest'])) {
    $_SESSION['another-question'] = $_GET['quest'];
}

if (isset($_POST['submit-pin'])) {
    validateAndProcessPin($_POST['submit-pin']);
} else {
    header("Location: enter-pin.php");
    exit();
}

function validateAndProcessPin($pin) {
    global $conn;

    $pin = validate($pin);
    $email = $_SESSION['email']; // Retrieving the email from the session
    $errorMessages = [
        "PIN is required",
        "PIN should contain numbers only",
        "PIN should be a 4-digit number",
        "Incorrect PIN"
    ];

    if (empty($pin)) {
        redirectToPinError($errorMessages[0]);
    } elseif (!ctype_digit($pin)) {
        redirectToPinError($errorMessages[1]);
    } elseif (strlen($pin) !== 4) {
        redirectToPinError($errorMessages[2]);
    } else {
        $sql = "SELECT * FROM users WHERE email='$email' AND pass='$pin'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            handleSuccessfulLogin($result);
        } else {
            redirectToPinError($errorMessages[3]);
        }
    }
}

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function redirectToPinError($errorMessage) {
    header("Location: ../index.php?pin-error=" . urlencode($errorMessage));
    exit();
}

function handleSuccessfulLogin($result) {
    global $conn;

    $row = mysqli_fetch_assoc($result);

    if (isset($_SESSION['admin'])) {
        header("Location: ../admin/viewAdmin/adminDashboard.php");
    } elseif ($_SESSION['another-question']) {
        unset($_SESSION['another-question']);
        $_SESSION['new-acc'] = false;
        $_SESSION['existing-email'] = true;
        header("Location: ../index.php?instruction=true");
    } else {
        header("Location: ../php_tabs/view-results.php");
    }

    exit();
}
?>