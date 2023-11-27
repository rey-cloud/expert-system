<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List of Admins | Admin</title>
  <link rel="stylesheet" href="../../dist/output.css">
  <link rel="shortcut icon" type="x-icon" href="../../img/sti-logo.png">
</head>

<body class="font-sans bg-[#eeeded] md:px-20 px-5 pb-10 mt-10 tracking-wide">
  <?php
include "../controller/adminIncharge.php";
?>
  <a class="inline-block bg-[#9b9595] hover:bg-[#7c7474] text-white py-1 px-3 rounded mt-4 mb-2"
    href="../viewAdmin/adminDashboard.php"><button>
      < Back</button></a>

  <h3 class="text-2xl font-bold mt-2 text-center bg-[#3B3131] text-white rounded-lg p-3 mb-5">List of Admins:
    <?php require "../controller/totalAdmins.php"; ?>
  </h3>

  <p>
    <?php
    if (isset($_GET['save-success'])) {
        echo "<div class='notification success'>Deleted Successfully!</div>";
    }
    ?>
    <script src="../../js/notify-script.js"></script>
  <div class="mb-5">
    <label for="search">Search: </label>
    <input type="text" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500"
      id="search" name="user_id" placeholder="ID or Name">
    <input type="button" class="bg-[#9b9595] hover:bg-[#7c7474] text-white py-2 px-4 rounded-md ml-2" value="Search"
      onclick="searchFunction()">
    <input type="button" class="bg-[#9b9595] hover:bg-[#7c7474] text-white py-2 px-4 rounded-md ml-2" value="Clear"
      onclick="clearSearch()">
  </div>
  </p>
  </div>
  <table class="w-full bg-white border border-gray-300 rounded-md overflow-hidden shadow-md">
    <thead class="bg-gray-200 border-b-2">
      <th class="py-2 px-4 border-r-2">ID</th>
      <th class="py-2 px-4 border-r-2">Name</th>
      <th class="py-2 px-4 border-r-2">Email</th>
      <th class="py-2 px-4 border-r-2">Password</th>
      <th class="py-2 px-4">Action</th>

    </thead>
    <tbody id="adminTableBody">
      <form action="viewAdmin.php?confirm" method="POST">
        <?php
        include "../controller/admins.php";
        ?>
      </form>

    </tbody>
  </table>

  <?php if(isset($_POST['deleteAdmin'])) {
    include("../confirm-modal.php");
  } ?>



  <script>
  function clearSearch() {
    var input, table, tr, i;

    // Clear the search input
    input = document.getElementById("search");
    input.value = "";

    // Display the entire table
    table = document.getElementById("adminTableBody");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      tr[i].style.display = "";
    }
  }

  function searchFunction() {
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
    table = document.getElementById("adminTableBody");
    tr = table.getElementsByTagName("tr");

    if (filter.trim() === "") {
      // If the search box is empty, display the entire table
      for (i = 0; i < tr.length; i++) {
        tr[i].style.display = "";
      }
      return;
    }

    for (i = 0; i < tr.length; i++) {
      var found = false;
      for (j = 0; j < tr[i].cells.length; j++) {
        td = tr[i].getElementsByTagName("td")[j];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            found = true;
            break;
          }
        }
      }
      if (found || tr[i].getElementsByTagName("th").length > 0) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
  </script>

</body>

</html>