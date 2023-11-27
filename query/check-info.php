<?php
session_start();

if (isset($_POST['pass'])) {
    // Assign POST data to session variables
    $pin = $_POST['pass'];
    $_SESSION['first'] = $_POST['f_name'];
    $_SESSION['last'] = $_POST['l_name'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['pass-pin'] = $pin;
    $_SESSION['security'] = $_POST['security'];
    $_SESSION['secret'] = $_POST['secret'];

    $error_pin = array("PIN is required", "PIN should be a 4-digit number");

    // Set direction index based on admin session
    $direction_index = isset($_SESSION['admin']) ? "../admin/viewAdmin/createAdmin.php?error-" : "../index.php?error-";

    if (empty($pin)) {
        redirectToError("pin", $error_pin[0]);
    } elseif (!preg_match('/^[0-9]{4}$/', $pin)) {
        unset($_SESSION['pass-pin']);
        redirectToError("pin", $error_pin[1]);
    } else {
        // Validate and clean user input
        validateAndCleanInput($_SESSION['first'], "first", array("First Name is required", "First Name should only contain letters and spaces"));
        validateAndCleanInput($_SESSION['last'], "last", array("Last Name is required", "Last Name should only contain letters and spaces"));
        validateAge($_SESSION['age'], array("Age is required", "Age should be a whole number", "Age cannot be below 0", "Age cannot exceed more than 120"));
        validateSecurity($_SESSION['security'], "---", array("Security Question is required"));
        validateSecurityAnswer($_SESSION['secret'], "secret", array("Secret answer is required"));

        // If all validations pass, store data in session and proceed
        $_SESSION['new-acc'] = true; // Storing the pin in session

        if (isset($_SESSION['admin'])) {
            include("add-user.php");
            unset($_SESSION['first']);
            unset($_SESSION['last']);
            unset($_SESSION['age']);
            unset($_SESSION['pass-pin']);
            unset($_SESSION['security']);
            unset($_SESSION['secret']);
            header("Location: ../admin/viewAdmin/adminDashboard.php?acc-created=true");
        } else {
            header("Location: ../index.php?instruction=true");
        }
    }
}

// Function to redirect to an error page
function redirectToError($param, $errorMsg)
{
    unset($_SESSION[$param]);
    global $direction_index;
    header("Location: " . $direction_index . "$param=" . urlencode($errorMsg));
    exit;
}

// Function to validate and clean input
function validateAndCleanInput(&$input, $param, $errorMessages)
{
    if (empty($input)) {
        redirectToError($param, $errorMessages[0]);
    } elseif (!preg_match('/^[A-Za-z\s.]+$/', $input)) {
        unset($_SESSION[$param]);
        redirectToError($param, $errorMessages[1]);
    }
}

function validateSecurityAnswer(&$input, $param, $errorMessages) {
    if (empty($input)) {
        redirectToError($param, $errorMessages[0]);
    } elseif (!preg_match('/^[A-Za-z0-9\s.]+$/', $input)) {
        unset($_SESSION[$param]);
    }
}

// Function to validate age
function validateAge($age, $errorMessages)
{
    if (empty($age)) {
        unset($_SESSION['age']);
        redirectToError("age", $errorMessages[0]);
    }

    if (!ctype_digit($age)) {
        unset($_SESSION['age']);
        redirectToError("age", $errorMessages[1]);
    } elseif ($age < 0) {
        unset($_SESSION['age']);
        redirectToError("age", $errorMessages[2]);
    } elseif ($age > 120) {
        unset($_SESSION['age']);
        redirectToError("age", $errorMessages[3]);
    }
}

// Function to validate security question
function validateSecurity($security, $defaultValue, $errorMessages)
{
    global $direction_index;
    if ($security == $defaultValue) {
        header("Location: " . $direction_index . "security=" . urlencode($errorMessages[0]));
        exit;
    }
}
?>