<link rel="stylesheet" href="../dist/output.css">
<?php
function generateConfirmationModal($post) {
    $confirmationMessage = "";
    $action = "";

    if(isset($post['result_id'])) {
        $confirmationMessage = "Are you sure you want to delete this result?";
        $action = "../controller/deleteResult.php";
    } else if(isset($post['deleteAdmin'])) {
        $confirmationMessage = "Are you sure you want to delete this admin?";
        $action = "../controller/deleteAdmin.php";
    } else if (isset($_POST['logout'])) {
        $confirmationMessage = "Are you sure you want to logout?";
        $action = "../controller/confirm-logout.php";
    } else {
        $confirmationMessage = "Are you sure you want to delete this user?";
        $action = "../controller/deleteUserResult.php";
    }

    $buttonValue = isset($post['deleteAdmin']) ? htmlspecialchars($post['deleteAdmin']) : '';

    $html = <<<HTML
        <div class="fixed top-0 left-0 w-full h-full bg-black opacity-75 z-10" style="display: block;"></div>
        <div class="modal fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-[#d0d9e7] p-6 shadow-lg rounded-lg z-20" style="display: block;">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Confirmation</h2>
            <hr class="w-full border mb-3">
            <label class="text-base font-medium tracking-wide">$confirmationMessage</label>
            <hr class="w-full border mb-3 mt-3">
            <div class="flex justify-center items-center">
                <form action="$action" method="POST">
                    <div class="flex mt-2 gap-10">
                        <button type="submit" name="Yes" value="$buttonValue"
                            class="border-[#00994D] border-2 py-2 px-10 shadow-md tracking-wider rounded-2xl bg-[#B9E0A5] hover:bg-[#D5E8D4] font-semibold hover:border-[#82B366] text-[#002951] transition duration-300 ease-in-out">Yes
                        </button>
                        <button type="submit" name="No"
                            class="border-[#B85450] border-2 py-2 px-10 shadow-md tracking-wider rounded-2xl bg-[#FF9999] hover:bg-[#F8CECC] font-semibold hover:border-[#C27474] text-[#002951] transition duration-300 ease-in-out">No
                        </button>
                    </div>
                </form>
            </div>
        </div>
HTML;

    return $html;
}

// Example usage:
echo generateConfirmationModal($_POST);
?>