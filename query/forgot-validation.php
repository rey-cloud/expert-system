<?php
session_start();
require $_SERVER["DOCUMENT_ROOT"] . '/expert_system/config/database.php';

if (isset($_POST['submit-forgot'])) {
    $fAnswer = $_POST['submit-forgot'];
    $email = $_SESSION['email'];

    $errorMessages = ["Secret answer is required", "Incorrect Answer"];

    if (empty($fAnswer)) {
        redirectToError($errorMessages[0]);
    } else {
        $sql = "SELECT * FROM users WHERE email='$email' AND s_answer='$fAnswer'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            handleSuccessfulLogin($result);
        } else {
            redirectToError($errorMessages[1]);
        }
    }
}

function redirectToError($errorMessage) {
    $redirectLocation = "../index.php?forgot-error=" . urlencode($errorMessage);
    header("Location: $redirectLocation");
    exit();
}

function handleSuccessfulLogin($result) {
    global $conn;

    $row = mysqli_fetch_assoc($result);

    if ($_SESSION['admin']) {
        $redirectLocation = "../admin/viewAdmin/adminDashboard.php";
    } elseif ($_SESSION['another-question']) {
        unset($_SESSION['another-question']);
        $_SESSION['new-acc'] = false;
        $_SESSION['existing-email'] = true;
        $redirectLocation = "../index.php?instruction=true";
    } else {
        $redirectLocation = "../php_tabs/view-results.php";
    }

    header("Location: $redirectLocation");
    exit();
}
?>