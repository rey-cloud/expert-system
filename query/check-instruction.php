<?php
session_start();

if (isset($_POST['Yes'])) {
    unset($_SESSION['answers']);
    header("Location: question-loop.php");
  } else if (isset($_POST['No'])) {
    if(isset($_SESSION['existing-email'])) {
      unset($_SESSION['existing-email']);
      header("Location: ../index.php?existing-user=true");
    } else {
      if(isset($_SESSION['pass-pin'])){
        unset($_SESSION['pass-pin']);
      }
      header("Location: ../index.php?new-user=true");
    }
  }
?>