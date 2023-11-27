<div class="fixed top-0 left-0 w-full h-full bg-black opacity-75 z-10" style="display: block;">
</div>
<div
  class="modal w-auto h-auto fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-[#d0d9e7] p-6 shadow-lg rounded-lg z-20"
  style="display: block;">
  <h2 class="text-2xl font-semibold text-gray-800 mb-4">Admin Email Created</h2>
  <hr class="w-full mb-3 border">
  <p class='mb-2 text-sm md:text-base font-medium'>This is your New Email Created! <i class=' font-normal'>(Use this to
      Access Admin
      Dashboard.)</i></p>
  <p class="text-xs md:text-base"><span class="font-bold mr-2">Email:</span><?php echo $_SESSION['new-admin'] ?>
  </p>
  <hr class="w-full border mt-3">
  <div class="flex justify-center items-center">
    <form action="../../admin/viewAdmin/adminDashboard.php" method="POST">
      <div class="mt-5">
        <button type="submit" name="okay" value="<?php echo ($question_number + 1) ?>"
          class="border-[#00994D] border-2 py-2 px-10 shadow-md tracking-wider rounded-2xl bg-[#B9E0A5] hover:bg-[#D5E8D4] font-semibold hover:border-[#82B366] text-[#002951] transition duration-300 ease-in-out m-auto">Okay
        </button>
      </div>
    </form>
  </div>
</div>