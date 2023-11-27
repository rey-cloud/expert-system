<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Result Page | PsycheAssist</title>
  <link rel="stylesheet" href="../dist/output.css">
  <link rel="shortcut icon" type="x-icon" href="../img/sti-logo.png">
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

  body {
    font-size: 17px;
    /* Fixed font size */
  }

  /* To prevent text zoom on double-tap for mobile devices */
  body,
  p {
    text-size-adjust: none;
  }

  span {
    font-weight: bold;
  }
  </style>
  <link rel="stylesheet" href="../dist/print.css" media="print">
  <script src="../js/pdf.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
</head>

<body class="bg-[#bebebe] text-[#00002e] tracking-wide text-justify">
  <div>
    <section class="mb-20">
      <nav>
        <?php
          include("includes/navbar-result.php");
        ?>
      </nav>
    </section>

    <?php
      require ('../query/fetch-user.php');
    ?>

    <section class="print-page md:text-base text-xs flex items-center justify-center" id="invoice">

      <div class="max-w-6xl h-auto bg-gray-100 m-10 p-20 overflow-y-auto shadow-lg">

        <section class="flex justify-between mb-20 items-center">
          <div class="flex items-start">
            <img class="w-auto h-14 mr-2" src="../img/sti.png" alt="">
            <h1 class="text-2xl font-bold text-[#005BAB] cursor-default tracking-wide m-auto">
              <?php echo "College - Davao"; ?>
            </h1>
          </div>
          <h1 class="text-[#005BAB] font-medium text-2xl">PsycheAssist | BSCS</h1>
        </section>

        <section class="text-center mb-20">
          <h1 class="font-bold text-3xl text-[#005BAB]">Self-report Questionnaire Result</h1>
          <h4 class="font-medium text-[#F4A414]">Beck Depression Inventory (BDI)</h4>
        </section>

        <div class="w-full bg-[#005BAB] text-white px-2 mb-3 font-bold">
          User Information
        </div>

        <section class="px-2">
          <p><span>Name:</span>
            <span
              class="w-full bg-gray-200 font-normal px-2 rounded-sm"><?php echo ucfirst($row['first_name']) . " " . ucfirst($row['last_name']);?></span>
          </p>
          <p><span>Age:</span> <span
              class="w-full bg-gray-200 font-normal px-2 rounded-sm"><?php echo $row['age'];?></span></p>
          <p><span>E-mail:</span> <span
              class="w-full bg-gray-200 font-normal px-2 rounded-sm"><?php echo $row['email'];?></span></p>
        </section>

        <div class="w-full bg-[#005BAB] text-white px-2 mb-3 mt-10 font-bold">
          Assessment Summary
        </div>

        <?php 
          require('../query/user-results.php');

          // Check if the result_id is set in the URL
          if (isset($_GET['result_id'])) {
              $result_id = $_GET['result_id'];

              echo "<h3 class='md:text-2xl text-lg font-bold mb-3 cursor-default text-[#005BAB] text-center'>Total of Selected Emojis</h3>";
              // Display the result based on the result_id
              if (array_key_exists($result_id - 1, $resultsArray)) {
                  $result = $resultsArray[$result_id - 1];
                  echo "<section class='mt-5 mb-5 px-2'>";
                    include('../query/emoji-view-results.php');
                  echo"</section>";
                  echo "<div class='px-2'>";
                  echo "<div class='flex justify-between flex-col-reverse md:flex-row'>";
                  echo "<p><span>Result ID:</span> <span class='w-full bg-gray-200 font-normal px-2 rounded-sm'>" . $result['result_id'] . "</span></p>";
                  echo "<h4 class='text-start'><span>Date Taken:</span> <span class='w-full bg-gray-200 font-normal px-2 rounded-sm'>" . $result['created_at'] . "</span></h4>";
                  echo "</div>";
                  echo "<p><span>Overall Score:</span> <span class='w-full bg-gray-200 font-normal px-2 rounded-sm'>" . $result['result'] . "</span></p>";
                  $result1 = $result['result'];
                  include("../query/diagnose.php"); 
                  echo "<p><span>Diagnosis:</span> <span class='w-full bg-gray-200 font-normal px-2 rounded-sm'>" . $diagnose . "</span></p>" ;
                  echo "<p><span>Recommendation:</span> " . $reco . "</p>" ;
                  echo "</div>";
              } else {
                echo "<p class='text-red-500 px-2'>Invalid result_id. Please provide a valid result_id.</p>";
              }
          } else {
              // Redirect the user to the first result if no result_id is provided in the URL
              if (!empty($resultsArray)) {
                  $firstResultId = 1;
                  header("Location: view-results.php?result_id=$firstResultId");
                  exit;
              } else {
                  echo "<p class='text-red-500 px-2'><span class='mr-1'>No result were found!</span>It appears that all of your results have been deleted by the Admin. Please return Home and Take Another Response.</p>";
              }
          }
        ?>

        <section class="px-2 mt-7">
          <h3 class="text-2xl font-bold mb-3 cursor-default text-[#005BAB] text-center">STI 😎 With Healthy
            Lifestyle
          </h3>
          <p>
            A healthy and meaningful life requires an emotional state of well-being. It includes the capacity to
            comprehend,
            control, and express emotions in a way that has a positive influence on your general quality of life. This
            manual will examine the numerous facets of emotional health and will arm you with knowledge, techniques, and
            tools to support and improve your emotional health.
          </p>
        </section>

        <div class="w-full bg-[#005BAB] text-white px-2 mb-3 font-bold mt-10">
          Contact Information
        </div>

        <section class="px-2 mt-3">
          <p>
            <span>Address:</span> 506 J.P. Laurel Ave, Poblacion District, Davao City, 8000 Davao
            del
            Sur
          </p>
          <p>
            <span>Email:</span> BSCS@gmail.com
          </p>
          <p>
            <span>Phone:</span> +63 9023234
          </p>
        </section>

        <div class="text-center p-2 mt-20 text-[#005BAB]">
          <hr class="mb-3 border">
          <?php
            echo "Copyright &copy; " . date("Y") . " | All rights reserved by BSCS501.";
          ?>
        </div>

      </div>
    </section>

  </div>

</body>

</html>