<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Questionnaire | PsycheAssist</title>
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
  </style>
</head>

<body class="bg-[#3d3d3d] w-full h-auto">
  <?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['answers'])) {
    $_SESSION['answers'] = array(); // Initialize the answers as an empty array
}

include("question-list.php");

$question_number = isset($question_number) ? $question_number : 0;

$answeredQuestions = isset($_SESSION['answers']) ? count($_SESSION['answers']) : 0;
$totalQuestions = count($questions);

if (isset($_SESSION['error'])) {
    echo "<p class='notification error'>".$_SESSION['error']."</p>"; // Display the error message
    unset($_SESSION['error']);
}
?>
  <script src="../js/notify-script.js"></script>

  <!-- HTML Form -->
  <div class="pt-20 mb-10 text-center ">
    <h3 class="text-4xl font-bold text-[#dda44e] tracking-wide">Self-report Questionnaire
    </h3>
    <p class="mt-3 tracking-wider text-base text-gray-400">Beck Depression Inventory (BDI)</p>
  </div>

  <?php
  // PHP code for handling the query parameter to determine the selected question
  if (isset($_GET['question']) || isset($_GET['submit'])) {
    if (isset($_GET['submit'])) {
      $question_number = (int)$_GET['submit'] - 1;
      include("includes/confirm-submit.php");
    } else {
      $question_number = (int)$_GET['question'] - 1;
    }
  } else if (isset($_GET['detail'])) {
    $question_number = (int)$_GET['detail'] - 1;
    include("includes/details-modal.php");
  }

  // Assuming $questions is an array containing all your questions
  $selectedQuestion = array_keys($questions)[$question_number];
  $options = $questions[$selectedQuestion];
  ?>

  <div class="xl:px-72 md:px-40 px-10 duration-300">

    <form action="../query/question-loop.php" method="post">

      <!--details-->
      <div class="mb-10">
        <button type="submit" name="details"><img class="w-5 h-auto hover:opacity-70" src="../img/details.png"
            alt="details-img"></button>
      </div>

      <div class="justify-between flex-col-reverse flex lg:flex-row duration-300">
        <h4 class="text-2xl font-bold text-[#dda44e] tracking-wide">
          <?php echo $selectedQuestion; ?>
        </h4>

        <!--circles-->
        <div class="text-center lg:text-end mb-5 lg:mb-0">
          <div class="circle-indicators">
            <?php
  for ($i = 0; $i < $totalQuestions; $i++) {
    $answered = isset($_SESSION['answers'][$i]) && $_SESSION['answers'][$i] != 4;
    $indicatorClass = $answered ? 'circle-indicator answered' : 'circle-indicator';

    if ($i == $question_number) {
      $indicatorClass .= ' current'; // Add 'current' class for the current question
    }

    // Create anchor elements for each circle with a hyperlink to the current page and a query parameter to specify the question number
    echo "<a class='$indicatorClass' href='?question=" . ($i + 1) . "'></a>";
  }
  ?>
          </div>
        </div>
      </div>


      <hr class="mt-5 mb-5">

      <input type="hidden" name="question_number" value="<?php echo ($question_number + 1); ?>">
      <?php
  // Define an array of emoji symbols to represent each option
  $emojis = ["😕", "🙁", "😞", "😭"];

  foreach ($questions[array_keys($questions)[$question_number]] as $index => $option) {
      $checked = (isset($_SESSION['answers'][$question_number]) && $index == $_SESSION['answers'][$question_number]) ? "checked" : "";

      // Output a custom radio-like element with emoji and label
      echo "<label class='emoji-option flex mt-2 items-center cursor-pointer hover:bg-[#636363] rounded-full ease-in-out duration-300 p-2";
      echo $question_number >= 3 ? " sm:block " : "";
      echo "'>";          
      echo "<div class='flex items-center'>";
      echo "<input type='radio' name='answer' value='$index' $checked>";
        echo "<span class='emoji'>$emojis[$index]</span>";
        echo "<span class='text-md text-gray-300 tracking-wide'>$option</span>";
      echo "</div>";
      echo "</label>";
  }
?>
      <hr class="mt-5 mb-5">
      <div class="items-end text-end mt-5 mb-32">
        <?php if ($question_number > 0) { ?>
        <button
          class="hover:border-[#876128] border-2 py-2 px-10 shadow-md tracking-wider rounded-2xl hover:bg-[#febd5b] bg-[#5495C9] font-semibold text-white border-[#2e5679] hover:text-[#002951] transition duration-300 ease-in-out"
          type="submit" name="previous">
          < Previous</button>
            <?php } ?>
            <?php if ($question_number < count($questions) - 1) { ?>
            <button
              class="hover:border-[#876128] border-2 py-2 px-10 shadow-md tracking-wider rounded-2xl hover:bg-[#febd5b] bg-[#5495C9] font-semibold text-white border-[#2e5679] hover:text-[#002951] transition duration-300 ease-in-out"
              type="submit" name="next">Next ></button>
            <?php } else { ?>
            <button
              class="hover:border-[#876128] border-2 py-2 px-10 shadow-md tracking-wider rounded-2xl hover:bg-[#febd5b] bg-[#5495C9] font-semibold text-white border-[#2e5679] hover:text-[#002951] transition duration-300 ease-in-out"
              type="submit" name="submit">Submit</button>
            <?php } ?>
      </div>
    </form>
  </div>



</body>

</html>