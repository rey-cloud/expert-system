<div class="fixed top-0 left-0 w-full h-full bg-black opacity-75 z-10" style="display: block;">
</div>
<div
  class="modal fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-[#d0d9e7] p-6 shadow-lg rounded-lg z-20"
  style="display: block;">
  <h2 class="text-2xl font-semibold text-gray-800 mb-4">Instruction</h2>
  <hr class="w-full m-auto border mb-3">
  <p class="lg:text-base text-sm m-auto text-justify mb-2 font-medium tracking-wider">Within this test, you will
    encounter a set of
    options or
    choices. Your
    task
    is
    to carefully
    evaluate each option
    and select the one that best aligns with your current mental state. Choose the option that feels most
    suitable to you at the moment. Good luck!</p>
  <hr class="w-full m-auto border mb-3 mt-3">
  <label class="text-lg font-medium tracking-wide">Proceed to Questions?</label>
  <br>
  <div class="flex justify-center items-center">
    <form action="query/check-instruction.php" method="POST">
      <div class="flex mt-5 gap-10">
        <button type="submit" name="Yes"
          class="border-[#00994D] border-2 py-2 px-10 shadow-md tracking-wider rounded-2xl bg-[#B9E0A5] hover:bg-[#D5E8D4] font-semibold hover:border-[#82B366] text-[#002951] transition duration-300 ease-in-out">Yes
        </button>
        <button type="submit" name="No"
          class="border-[#B85450] border-2 py-2 px-10 shadow-md tracking-wider rounded-2xl bg-[#FF9999] hover:bg-[#F8CECC] font-semibold hover:border-[#C27474] text-[#002951] transition duration-300 ease-in-out">No
        </button>
      </div>
    </form>
  </div>
</div>