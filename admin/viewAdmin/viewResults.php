<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List of Results | Admin</title>
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="../../dist/output.css">
  <link rel="shortcut icon" type="x-icon" href="../../img/sti-logo.png">
</head>

<body class="font-sans bg-[#eeeded] md:px-20 px-5 pb-10 mt-10 tracking-wide">
  <div class="button-container">
    <a class="inline-block bg-[#9b9595] hover:bg-[#7c7474] text-white py-1 px-3 rounded mt-4 mb-4"
      href="../viewAdmin/adminDashboard.php"><button>
        < Back</button></a>
  </div>
  <?php 
  if (isset($_GET['save-success'])) {
    echo "<div class='notification success'>Deleted Successfully!</div>";
  }
  ?>
  <script src="../../js/notify-script.js"></script>
  <h3 class="text-2xl font-bold mt-2 text-center bg-[#3B3131] text-white rounded-lg p-3 mb-5">Diagnosis Count</h3>
  <?php 
        include "../controller/diagnosed-count.php"; 
  ?>

  <h3 class="text-2xl font-bold mt-20 text-center bg-[#3B3131] text-white rounded-lg p-3 mb-5">List of Results:
    <?php require "../controller/totalResults.php"; ?>
  </h3>

  <?php
      include "../controller/chart.php";
    ?>
</body>

</html>