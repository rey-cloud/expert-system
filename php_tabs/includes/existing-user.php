<div class="fixed top-0 left-0 w-full h-full bg-black opacity-75 z-10" style="display: block;">
</div>
<div
  class="modal fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-[#d0d9e7] p-6 shadow-lg rounded-lg z-20"
  style="display: block;">
  <div class="flex justify-between">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Existing User</h2>
    <form action="query/view-or-another.php" method="post">
      <button type="submit" name="close-exist"
        class="cursor-pointer absolute top-5 right-5 text-md text-gray-500 p-2 rounded-lg hover:bg-gray-100 hover:">Cancel</button>
    </form>
  </div>
  <hr class="w-full m-auto border mb-3">
  <label class="font-medium">It looks like this account has already taken the test!</label>
  <br>
  <div class="flex justify-center items-center">
    <form action="query/view-or-another.php" method="POST">
      <div class="flex mt-5 gap-10">
        <button type="submit" name="view-result"
          class="border-[#00994D] border-2 py-2 px-10 shadow-md tracking-wider rounded-2xl bg-[#B9E0A5] hover:bg-[#D5E8D4] font-semibold hover:border-[#82B366] text-[#002951] transition duration-300 ease-in-out">View
          Result
        </button>
        <button type="submit" name="another-resp"
          class="border-[#B85450] border-2 py-2 px-10 shadow-md tracking-wider rounded-2xl bg-[#FF9999] hover:bg-[#F8CECC] font-semibold hover:border-[#C27474] text-[#002951] transition duration-300 ease-in-out">Another
          Response
        </button>
      </div>
    </form>
  </div>
</div>