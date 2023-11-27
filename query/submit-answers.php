<?php
session_start();

if (isset($_POST['Yes'])) {
    require $_SERVER["DOCUMENT_ROOT"] . '/expert_system/config/database.php';

    if ($_SESSION['new-acc']) {
        include('add-user.php');
    }

    include('fetch-user.php');
    $user_id = $row['user_id'];

    $answers = array_map('intval', $_SESSION['answers']);
    $result = array_sum($answers);

    $values = array_merge([$user_id], $answers, [$result]);
    $placeholders = array_merge(["user_id"], array_map(function ($index) {
        return "q" . ($index + 1);
    }, array_keys($_SESSION['answers'])), ["result"]);

    $valuesString = implode(", ", $values);
    $placeholdersString = implode(", ", $placeholders);

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO result ($placeholdersString) VALUES ($valuesString)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    unset($_SESSION['new-acc'], $_SESSION['answers'], $_SESSION['first'], $_SESSION['last'], $_SESSION['age'], $_SESSION['pass-pin'], $_SESSION['security'], $_SESSION['secret'], $_SESSION['displayed_questions']);
    header("Location: ../php_tabs/current-result.php");
    exit();
} elseif (isset($_POST['No'])) {
    include("../php_tabs/question-list.php");
    header("Location: question-loop.php?question=" . count($questions));
    exit();
}
?>