<!DOCTYPE html>
<html>

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Dashboard | Admin</title>
  <link rel="stylesheet" href="../../dist/output.css">
  <link rel="shortcut icon" type="x-icon" href="../../img/sti-logo.png">
</head>

<body class="overflow-x-hidden bg-[#eeeded]">
  <?php
    include "../controller/adminIncharge.php";
    include "../adminHeader.php";
    include "../sidebar.php";
   
    include_once "../../config/database.php";
    if (isset($_POST['cancel-new-user'])) {
      unset($_SESSION['first']);
      unset($_SESSION['last']);
      unset($_SESSION['age']);
      unset($_SESSION['pass-pin']);
      unset($_SESSION['security']);
      unset($_SESSION['secret']);
    }
    if (isset($_POST['logout'])) {
      include("../confirm-modal.php");
    }
    if (isset($_GET['acc-created'])) {
        include("../admin-email-modal.php");
    }
    ?>

  <div class="container allContent-section py-4">
    <div class="row justify-content-center">
      <div class="col-sm-3 mx-auto">
        <div class="card">
          <i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
          <h4 class="text-[#e7e7e7] mb-2">Total Users</h4>
          <h5 class="font-bold text-[#e7e7e7]">
            <?php
                require "../controller/totalUsers.php";
            ?>
          </h5>
        </div>
      </div>
      <div class="col-sm-3 mx-auto">
        <div class="card">
          <i class="fa fa-list mb-2" style="font-size: 70px;"></i>
          <h4 class="text-[#e7e7e7] mb-2">Total Admins</h4>
          <h5 class="font-bold text-[#e7e7e7]">
            <?php
              require "../controller/totalAdmins.php";
            ?>
          </h5>
        </div>
        </h5>
      </div>
      <div class="col-sm-3 mx-auto">
        <div class="card">
          <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
          <h4 class="text-[#e7e7e7] mb-2">Total Results</h4>
          <h5 class="font-bold text-[#e7e7e7]">
            <?php
              require "../controller/totalResults.php";
            ?>
          </h5>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script src="../assets/js/script.js"></script>
</body>

</html>