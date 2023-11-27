<!-- update-10 -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PsycheAssist</title>
  <link rel="stylesheet" href="dist/output.css">
  <link rel="shortcut icon" type="x-icon" href="img/sti-logo.png">
  <style>
  ::-webkit-scrollbar {
    width: 8px;
  }

  ::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 4px;
  }

  ::-webkit-scrollbar-track {
    background: #f0f0f0;
    border-radius: 4px;
  }

  ::-webkit-scrollbar-thumb:hover {
    background: #000080;
  }
  </style>
</head>

<body class="bg-[#e4e4e4] dark:bg-[#414455]">

  <!-- <div class="bg-[#6e8ac4] h-screen w-full fixed z-50 -mt-52 bg-no-repeat bg-center items-center" id="loader"
    style="background-image: url(img/loader.gif); background-size: 15%;">
  </div> -->

  <?php
    session_start();

    if (isset($_SESSION["submit-success"]) && $_SESSION["submit-success"]) {
        echo '<div class="notification success">Feedback Sent!</div>';
        unset($_SESSION["submit-success"]);
    } else if (isset($_SESSION["send-success"]) && $_SESSION["send-success"]) {
      echo '<div class="notification success">Email Sent!</div>';
      unset($_SESSION["send-success"]);
  }
  ?>


  <nav>
    <?php include("php_tabs/includes/navbar.php"); ?>
  </nav>

  <section id="home" class="mt-52 duration-300 z-0 grid lg:grid-cols-2 grid-cols-1 gap-9 lg:px-36 md:px-28 px-10"
    data-title="Home">
    <?php include("php_tabs/includes/home.php"); ?>
  </section>

  <hr class="border border-slate-400 dark:border-[#dba047] mb-32 mt-32" id="about">

  <section class="mt-32 tracking-wide lg:px-36 md:px-28 px-10" data-title="About">
    <?php include("php_tabs/includes/about.php"); ?>
  </section>

  <hr class="border border-slate-400 dark:border-[#dba047] mb-32 mt-32" id="contact">

  <section class="mt-32 lg:px-36 md:px-28 px-10" data-title="Contact">
    <?php include("php_tabs/includes/contact.php"); ?>
  </section>

  <footer>
    <?php include("php_tabs/includes/footer.php"); ?>
  </footer>

  <script src="js/home-script.js"></script>
  <script src="js/notify-script.js"></script>
  <script src="js/dark-mode.js"></script>

  <?php 

  if(isset($_POST['take-test']) || isset($_GET['error']) || isset($_GET['close-exist']) || isset($_POST['cancel-new-user']) || isset($_POST['close-admin'])) {
    if(isset($_POST['close-admin'])) {
      unset($_SESSION['admin']);
    }
    include("php_tabs/includes/login.php");
  }
  if (isset($_GET['new-user']) || isset($_GET['error-pin']) || isset($_GET['error-first']) || isset($_GET['error-last']) || isset($_GET['error-age']) || isset($_GET['error-security']) || isset($_GET['error-secret'])) {
    include("php_tabs/includes/new-email.php");
  }
  if (isset($_GET['instruction'])) {
    include("php_tabs/includes/instruction.php");
  }

  if (isset($_GET['existing-user']) || isset($_POST['close-pin']) || isset($_POST['close-pin'])) {
    include('php_tabs/includes/existing-user.php');
  }

  if (isset($_GET['view-result']) || isset($_GET['quest']) || isset($_GET['pin-error']) || isset($_POST['close-forgot']) || isset($_GET['admin-page']) || isset($_GET['close-admin-forg'])) {
    if (isset($_GET['quest'])){
      $_SESSION['another-question'] = $_GET['quest'];
    }
    include('php_tabs/includes/pin.php');
  }

  if (isset($_GET['forgot-pass']) || isset($_GET['forgot-error'])) {
    include('php_tabs/includes/forgot-pass-modal.php');
  }

  ?>

</body>

</html>