<?php

require $_SERVER["DOCUMENT_ROOT"] . '/expert_system/config/database.php';

$firstname = $_SESSION['first'];
$lastname = $_SESSION['last'];
$age = $_SESSION['age'];
$pass = $_SESSION['pass-pin'];
$security = $_SESSION['security'];
$secret = isset($_SESSION['secret']) ? $_SESSION['secret'] : '';

// Initialize email without a number
$email = strtok(lcfirst($firstname), " ") . strtok(lcfirst($lastname), " ") . ".admin@gmail.com";

if (isset($_SESSION['admin'])) {
    $type = "admin";
    $_SESSION['new-admin'] = $email;
} else {
    $type = "guest";
    $email = $_SESSION['email'];
}

// Check if the email already exists in the database
$checkStmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
$checkStmt->bind_param("s", $email);

$checkStmt->execute();
$checkStmt->bind_result($emailCount);
$checkStmt->fetch();
$checkStmt->close(); // Close the statement after fetching the result

// If the email already exists, modify it
if ($emailCount > 0) {
    $counter = 1;
    do {
        $modifiedEmail = strtok(lcfirst($firstname), " ") . strtok(lcfirst($lastname), " ") . $counter . ".admin@gmail.com";
        $_SESSION['new-admin'] = $modifiedEmail;
        // Check the modified email again
        $checkStmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $checkStmt->bind_param("s", $modifiedEmail);
        $checkStmt->execute();
        $checkStmt->bind_result($emailCount);
        $checkStmt->fetch();
        $checkStmt->close(); // Close the statement after fetching the result
        $counter++;
    } while ($emailCount > 0);

    $email = $modifiedEmail;
}

// Insert the record into the database
$stmt = $conn->prepare("INSERT INTO users (first_name, last_name, age, email, pass, s_question, s_answer, type) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssississ", $firstname, $lastname, $age, $email, $pass, $security, $secret, $type);

$stmt->execute();

$stmt->close();
$conn->close();

?>