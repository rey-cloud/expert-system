<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    handlePostRequest();
}

if (!isset($_GET['question']) && !isset($_GET['detail'])) {
    header("Location: question-loop.php?question=1");
    exit();
}

if (!isset($_SESSION['answers'])) {
    $_SESSION['answers'] = array();
}

include('../php_tabs/questions.php');

function handlePostRequest() {
    $question_number = $_POST['question_number'] - 1;

    if (!isset($_POST['details']) && !isset($_POST['okay'])) {
        handleAnswerSubmission($question_number);
    }

    if (isset($_POST['next'])) {
        redirectToQuestion($question_number + 2);
    } elseif (isset($_POST['previous'])) {
        redirectToQuestion($question_number);
    }

    if (isset($_POST['submit'])) {
        validateAndRedirect();
    }

    if (isset($_POST['details'])) {
        redirectToDetails($question_number + 1);
    }

    if (isset($_POST['okay'])) {
        redirectToQuestion($_POST['okay']);
    }
}

function handleAnswerSubmission($question_number) {
    if (isset($_POST['answer'])) {
        $_SESSION['answers'][$question_number] = $_POST['answer'];
    } else {
        $_SESSION['answers'][$question_number] = 4;
    }
}

function redirectToQuestion($question_number) {
    header("Location: question-loop.php?question=" . $question_number);
    exit();
}

function validateAndRedirect() {
    include("../php_tabs/question-list.php");

    $answers = $_SESSION['answers'];
    $answersCount = count($questions);

    for ($i = 0; $i < $answersCount; $i++) {
        if (!isset($_SESSION['answers'][$i]) || $_SESSION['answers'][$i] < 0 || $_SESSION['answers'][$i] > 3) {
            $_SESSION['error'] = "Check carefully, all questions must be answered!";
            redirectToQuestion($answersCount);
        }
    }

    header("Location: ../php_tabs/questions.php?submit=" . $answersCount);
    exit();
}

function redirectToDetails($question_number) {
    header("Location: ../php_tabs/questions.php?detail=" . $question_number);
    exit();
}
?>