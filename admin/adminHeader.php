<?php
   include_once "../../config/database.php";
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="../dist/output.css">
</head>

<body>
  <nav class="flex justify-between bg-[#3B3131] w-full h-auto md:text-base text-sm shadow-lg">
    <div class="flex p-5 items-center">
      <a href="adminDashboard.php"><img class="w-16 h-auto hover:scale-105" src="../assets/images/logo.png"
          alt="Admin"></a>
      <p class="font-semibold text-[#e7e7e7] ml-3 cursor-default">Welcome, <?php echo ucfirst($admin_first_name); ?>!
      </p>
    </div>
    <div class="flex-col md:flex-row-reverse items-center flex md:px-20 px-5 md:gap-3 gap-0">
      <form action="" method="post" class="m-auto">
        <button
          class="nav-link text-[#e7e7e7] items-center m-auto flex border bg-[#847d7c] hover:bg-[#d4d2d2] hover:text-[#5e5555] rounded-lg"
          name="logout">
          <i class="fas fa-sign-out-alt mr-2"></i>
          <p>Logout</p>
        </button>
      </form>
      <h4 class="text-center items-center m-auto"><a href="../viewAdmin/createAdmin.php"
          class="hover:no-underline text-[#e7e7e7] hover:text-[#aba6a6]">&plus; New Admin</a>
      </h4>
    </div>
  </nav>
</body>

</html>