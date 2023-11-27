<div class="fixed top-0 left-0 w-full h-full bg-black opacity-75 z-10" style="display: block;">
</div>
<div
  class="modal fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-[#d0d9e7] p-6 shadow-lg rounded-lg z-20"
  style="display: block; max-height: 80%; overflow-y: scroll;">
  <div class="flex justify-between">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">
      <?php echo isset($_SESSION['admin']) ? "New admin" : "New User"; ?></h2>
    <form action="<?php echo isset($_SESSION['admin']) ? "adminDashboard.php" : "index.php"; ?>" method="post">
      <button type="submit" name="cancel-new-user"
        class="cursor-pointer absolute top-5 right-5 text-md text-gray-500 p-2 rounded-lg hover:bg-gray-100 hover:">Cancel</button>
    </form>
  </div>
  <hr class="w-full m-auto border mb-3">
  <form action="<?php echo isset($_SESSION['admin']) ? "../../query/check-info.php" : "query/check-info.php"; ?>"
    method="POST" class="sm:w-[200px] md:w-[300px] lg:w-[500px] mx-auto duration-300">
    <div class="lg:flex block duration-300">
      <label class="mr-2">First Name:</label><br>
      <?php if (isset($_GET['error-first'])) { ?>
      <p class="text-red-500"><?php echo "(" . $_GET['error-first'] . ")"?></p>
      <?php } ?>
    </div>
    <input class=" w-full bg-white focus:bg-white py-2 px-3 rounded-md border-2 border-gray-300 transition-all duration-500
      outline-none focus:border-[#003568] focus:text-[#004e94] mb-5 mt-3" type="text" name="f_name" placeholder="Rey"
      value="<?php if(isset($_SESSION['first'])) { echo $_SESSION['first']; } ?>">
    <div class="lg:flex block duration-300">
      <label class="mr-2">Last Name:</label><br>
      <?php if (isset($_GET['error-last'])) { ?>
      <p class="text-red-500"><?php echo "(" . $_GET['error-last'] . ")"?></p>
      <?php } ?>
    </div>
    <input class=" w-full bg-white focus:bg-white py-2 px-3 rounded-md border-2 border-gray-300 transition-all duration-500
      outline-none focus:border-[#003568] focus:text-[#004e94] mb-5 mt-3" type="text" name="l_name" placeholder="Baja"
      value="<?php if(isset($_SESSION['last'])) { echo $_SESSION['last']; } ?>">
    <div class="lg:flex block duration-300">
      <label class="mr-2">Age:</label><br>
      <?php if (isset($_GET['error-age'])) { ?>
      <p class="text-red-500"><?php echo "(" . $_GET['error-age'] . ")"?></p>
      <?php } ?>
    </div>
    <input
      class="w-full bg-white focus:bg-white py-2 px-3 rounded-md border-2 border-gray-300 transition-all duration-500 outline-none focus:border-[#003568] focus:text-[#004e94] mb-5 mt-3"
      name="age" placeholder="1-120" value="<?php if(isset($_SESSION['age'])) { echo $_SESSION['age']; } ?>">
    <div class="lg:flex block duration-300">
      <label class="mr-2">PIN:</label><br>
      <?php if (isset($_GET['error-pin'])) { ?>
      <p class="text-red-500"><?php echo "(" . $_GET['error-pin'] . ")"?></p>
      <?php } ?>
    </div>
    <input
      class="w-full bg-white focus:bg-white py-2 px-3 rounded-md border-2 border-gray-300 transition-all duration-500 outline-none focus:border-[#003568] focus:text-[#004e94] mb-5 mt-3"
      type="password" name="pass" placeholder="4-digit number"
      value="<?php if(isset($_SESSION['pass-pin'])) { echo $_SESSION['pass-pin']; } ?>">
    <br>

    <div class="lg:flex block duration-300">
      <label for="questions" class="mr-2">Security Question:</label><br>
      <?php if (isset($_GET['error-security'])) { ?>
      <p class="text-red-500"><?php echo "(" . $_GET['error-security'] . ")"?></p>
      <?php } ?>
    </div>

    <select
      class="w-full bg-white focus:bg-white py-2 px-3 rounded-md border-2 border-gray-300 transition-all duration-500 outline-none focus:border-[#003568] focus:text-[#004e94] mb-5 mt-3"
      id="cars" name="security">
      <option>---</option>
      <?php 
      isset($_SESSION['admin-id']) ? include('../../php_tabs/security-questions.php') : include('php_tabs/security-questions.php');
            foreach ($securityQuestions as $key => $question) {
                $selected = isset($_SESSION['security']) && $_SESSION['security'] == $key ? 'selected' : '';
                echo "<option value='$key' $selected>$question</option>";
            }
        ?>
    </select>
    <br>

    <div class="lg:flex block duration-300">
      <label class="mr-2">Secret Answer:</label><br>
      <?php if (isset($_GET['error-secret'])) { ?>
      <p class="text-red-500"><?php echo "(" . $_GET['error-secret'] . ")"?></p>
      <?php } ?>
    </div>
    <input
      class="w-full bg-white focus:bg-white py-2 px-3 rounded-md border-2 border-gray-300 transition-all duration-500 outline-none focus:border-[#003568] focus:text-[#004e94] mb-5 mt-3"
      name="secret" placeholder="Ex. Zigaloo"
      value="<?php if(isset($_SESSION['secret'])) { echo $_SESSION['secret']; } ?>">
    <br>

    <div class="flex justify-center items-center">
      <button type="submit"
        class="hover:border-[#876128] border-2 py-2 px-10 shadow-md tracking-wider rounded-2xl hover:bg-[#febd5b] bg-[#5495C9] font-semibold text-white border-[#2e5679] hover:text-[#002951] transition duration-300 ease-in-out block dark:hidden">Submit
      </button>
      <button type="submit"
        class="border-[#876128] border-2 py-2 px-10 shadow-md tracking-wider rounded-2xl bg-[#febd5b] hover:bg-[#5495C9] font-semibold hover:text-white hover:border-[#2e5679] text-[#002951] transition duration-300 ease-in-out hidden dark:block">Submit
      </button>
    </div>
  </form>
</div>