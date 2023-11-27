<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
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

<body class="bg-[#bebebe] text-[#00002e] text-justify tracking-wide">

  <section class="mb-20">
    <nav>
      <?php
        include("includes/navbar-result.php");
      ?>
    </nav>
  </section>

  <section class="print-page md:text-base text-xs flex items-center justify-center" id="invoice">

    <div class="max-w-6xl h-auto bg-gray-100 m-10 p-20 overflow-y-auto shadow-lg">

      <section class="md:flex block justify-between mb-20 items-center">
        <div class="flex items-center justify-center">
          <img class="w-auto md:h-14 h-8 mr-2" src="../img/sti.png" alt="">
          <h1 class="md:text-2xl text-center text-lg font-bold text-[#005BAB] cursor-default">College - Davao
          </h1>
        </div>
        <hr class="border mb-2 mt-2 md:hidden block">
        <h1 class="text-[#005BAB] font-medium md:text-2xl text-base md:text-end text-center">PsycheAssist | BSCS</h1>
      </section>

      <section class="text-center mb-20">
        <h1 class="font-bold md:text-3xl text-lg text-[#005BAB]">Self-report Questionnaire Result</h1>
        <h4 class="font-medium text-[#F4A414] md:text-lg text-sm">Beck Depression Inventory (BDI)</h4>
      </section>

      <div class="w-full bg-[#005BAB] text-white px-2 mb-3 font-bold">
        User Information
      </div>

      <div class="px-2">
        <?php
          require('../query/fetch-user.php');
        ?>
        <p><span>Name:</span> <span
            class="w-full bg-gray-200 font-normal px-2 rounded-sm"><?php echo ucfirst($row['first_name']) . " " . ucfirst($row['last_name']);?></span>
        </p>
        <p><span>Age:</span> <span
            class="w-full bg-gray-200 font-normal px-2 rounded-sm"><?php echo $row['age'];?></span></p>
        <p><span>E-mail:</span> <span
            class="w-full bg-gray-200 font-normal px-2 rounded-sm"><?php echo $row['email'];?></span></p>

        <?php 
      $_SESSION['fk-user-id'] = $user_id; // Use the $user_id variable retrieved from fetch-user.php

      require('../query/fetch-result.php');

      while ($row = $result->fetch_assoc()) {
      ?>
      </div>

      <div class="w-full bg-[#005BAB] text-white px-2 mb-3 mt-10 font-bold">
        Assessment Summary
      </div>


      <h3 class="md:text-2xl text-lg font-bold mb-3 cursor-default text-[#005BAB] text-center">Total of Selected Emojis
      </h3>
      <section class="mb-5 px-2">
        <?php
          require('../query/emoji-current-result.php');
        ?>
      </section>

      <div class="px-2">
        <div class="flex justify-between flex-col-reverse md:flex-row">
          <p><span>Overall Score:</span> <span
              class="w-full bg-gray-200 font-normal px-2 rounded-sm"><?php echo $row['result'];?></span></p>
          <p><span>Date Taken:</span> <span
              class="w-full bg-gray-200 font-normal px-2 rounded-sm"><?php echo $row['created_at'];?></span></p>
        </div>

        <?php $result1 = $row['result']; } 
          include("../query/diagnose.php"); 
        ?>

        <p><span>Diagnosis:</span> <span
            class="w-full bg-gray-200 font-normal px-2 rounded-sm"><?php echo $diagnose;?></span></p>
        <p><span>Recommendation:</span> <?php echo $reco;?></p>
      </div>

      <section class="px-2 mt-7">
        <h3 class="md:text-2xl text-lg font-bold mb-3 cursor-default text-[#005BAB] text-center">STI 😎 With Healthy
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

      <section class="px-2 mt-7">
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

  </section>
</body>

</html>