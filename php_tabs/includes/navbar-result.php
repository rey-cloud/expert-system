<nav
  class="py-5 lg:px-36 md:px-28 px-3 duration-300 fixed top-0 left-0 w-full z-10 mb-20 bg-[#002954] h-auto shadow-lg">

  <header class="mx-auto flex items-center justify-between duration-300 text-white">
    <section class="flex">
      <a href="../index.php"
        class="flex items-center hover:opacity-80 hover:bg-[#00417e] p-2 rounded-md md:scale-100 scale-75">
        <img class="w-auto h-4 mr-1" src="../img/home.png" alt="home">
        <h1 class="pr-1">Home</h1>
      </a>
    </section>


    <section class="flex md:gap-3 gap-0">
      <div class="flex">
        <?php
  require('../query/user-results.php');
  
  if(isset($_GET['result_id'])){
      $currentResultId = $_GET['result_id'];

      if ($currentResultId > 1) {
          $previousResultId = $currentResultId - 1;
          echo "<a href='view-results.php?result_id=$previousResultId'>";
          ?>

        <div class="flex items-center hover:opacity-80 hover:bg-[#00417e] p-2 rounded-md md:scale-100 scale-75">
          <img class="w-auto h-4 mr-1" src="../img/l-arrow.png" alt="previous">
          <h1>Prev</h1>
        </div>

        <?php
          echo "</a>";
      } else {
        ?>

        <div class="flex items-center opacity-30 p-2 rounded-md cursor-default md:scale-100 scale-75">
          <img class="w-auto h-4 mr-1" src="../img/l-arrow.png" alt="previous">
          <h1>Prev</h1>

        </div>
        <?php
      }

      if ($currentResultId < count($resultsArray)) {
          $nextResultId = $currentResultId + 1;
          echo "<a href='view-results.php?result_id=$nextResultId'>";
          ?>

        <div class="flex items-center hover:opacity-80 hover:bg-[#00417e] p-2 rounded-md md:scale-100 scale-75">
          <h1>Next</h1>
          <img class="w-auto h-4 ml-1" src="../img/r-arrow.png" alt="previous">
        </div>

        <?php
          echo "</a>";
      } else {
        ?>
        <div class="flex items-center opacity-30 p-2 rounded-md cursor-default md:scale-100 scale-75">
          <h1>Next</h1>
          <img class="w-auto h-4 ml-1" src="../img/r-arrow.png" alt="next">
        </div>
        <?php } 
      }?>
      </div>

      <span class=" border-r"></span>

      <button id="download"
        class="flex items-center hover:opacity-80 hover:bg-[#00417e] p-2 rounded-md md:scale-100 scale-75">
        <img class="w-auto h-4 -mr-1" src="../img/download.png" alt="download-img">
        <h1 class="pr-1">Download as PDF</h1>
      </button>

      <span class=" border-r"></span>

      <button onclick="window.print()"
        class="flex items-center hover:opacity-80 hover:bg-[#00417e] p-2 rounded-md md:scale-100 scale-75">
        <img class="w-auto h-4 mr-1 pl-1" src="../img/print.png" alt="print-img">
        <h1 class="pr-1">Print</h1>
      </button>
    </section>

  </header>

</nav>