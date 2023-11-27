<div class="fixed top-0 left-0 w-full h-full bg-black opacity-75 z-10" style="display: block;">
</div>
<div
  class="modal fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-[#d0d9e7] p-6 shadow-lg rounded-lg z-20"
  style="display: block;">
  <h2 class="text-2xl font-semibold text-gray-800 mb-4">Details</h2>
  <hr class="w-full m-auto border">

  <?php
    echo "<p class='mb-2 text-sm md:text-base font-medium mt-2'>Answering all questions is required before exiting this page. <br> Leaving without completing the questions will result in non-submission.</p>";
    echo "<hr class='w-full m-auto border'>";
    echo "<p class='mb-2 text-sm md:text-base mt-2'>Emojis Equivalent to Points:</p>";
    $emojis = ["😕", "🙁", "😞", "😭"];
    $count = 0;
    while($count <= count($emojis)-1) {
      echo "<p class='text-base text-center'>" . $emojis[$count] . ' - ' . $count;
      $count++;
    }
    ?>
  <hr class="w-full m-auto border mt-5">
  <div class="flex justify-center items-center">
    <form action="../query/question-loop.php" method="POST">
      <div class="flex mt-5 gap-10">
        <button type="submit" name="okay" value="<?php echo ($question_number + 1) ?>"
          class="border-[#00994D] border-2 py-2 px-10 shadow-md tracking-wider rounded-2xl bg-[#B9E0A5] hover:bg-[#D5E8D4] font-semibold hover:border-[#82B366] text-[#002951] transition duration-300 ease-in-out">Okay
        </button>
      </div>
    </form>
  </div>
</div>