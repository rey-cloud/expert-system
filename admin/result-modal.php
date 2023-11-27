<?php
require("../controller/result-conn.php");
require("../controller/user-result.php");

$count = 0;
$rows = $result->fetch_all(MYSQLI_ASSOC);
$rowsUsers = $resultUser->fetch_all(MYSQLI_ASSOC);

?>
    <div class="modal-container" style="display: block;">
        <div class="overlay fixed top-0 left-0 w-full h-full bg-black opacity-75 z-10"></div>
        <div class="modal fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-[#d0d9e7] p-6 shadow-lg rounded-lg z-20">

        <?php
    if (isset($_GET['result-delete'])) {
        echo "<div class='notification success'>Deleted Successfully!</div>";
    }
    ?>
            
            <?php 
            foreach ($rowsUsers as $rowsUser) {
                echo $rowsUser['user_id'] . " - " . $rowsUser['first_name'] . " " . $rowsUser['last_name'] ;
            }
        if (empty($rows)) {
            echo "<a class='block' href='viewUsers.php?unset=true'><button> x </button</a>";
            echo "User has no result";
        } else {
        
        ?>

            <?php if (!empty($rows)) { ?>
                <table class='w-full bg-white border border-gray-300 rounded-md overflow-hidden shadow-md'>
                    <thead class='bg-gray-200 border-b-2'>
                        <th class='py-2 px-4 border-r-2'>Result ID</th>
                        <th class='py-2 px-4 border-r-2'>Result</th>
                        <th class='py-2 px-4 border-r-2'>Diagnosis</th>
                        <th class='py-2 px-4 border-r-2'>Created at</th>
                        <th class='py-2 px-4 border-r-2'>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($rows as $row) {
                            $count++;
                        ?>
                            <tr>
                                <td class='py-2 px-4 border-r-2'><?php echo $row['result_id']; ?></td>
                                <td class='py-2 px-4 border-r-2'><?php echo $row['result']; ?></td>
                                <td class='py-2 px-4 border-r-2'><?php echo getDiagnosis($row['result']); ?></td>
                                <td class='py-2 px-4 border-r-2'><?php echo $row['created_at']; ?></td>
                                <td class='py-2 px-4 border-r-2'>
                                    <form action="viewUsers.php?result" method="post">
                                        <button type="submit" name="result_id" value="<?php echo $row['result_id']; ?>" class="border-[#00994D] border-2 py-2 px-10 shadow-md tracking-wider rounded-2xl bg-[#B9E0A5] hover:bg-[#D5E8D4] font-semibold hover:border-[#82B366] text-[#002951] transition duration-300 ease-in-out">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <?php echo "Number of Result:" . $count; ?>

            <?php } ?>

            <hr class="w-full m-auto border mt-5">
            <div class="flex justify-center items-center">
                <div class="flex mt-5 gap-10">
                    <a href="viewUsers.php?unset">
                        <button type="submit" name="okay" value="<?php echo $row['result_id']; ?>" class="border-[#00994D] border-2 py-2 px-10 shadow-md tracking-wider rounded-2xl bg-[#B9E0A5] hover:bg-[#D5E8D4] font-semibold hover:border-[#82B366] text-[#002951] transition duration-300 ease-in-out">
                            Okay
                        </button>
                    </a>
                </div>
            </div>
            <?php } ?>
            </div>
    </div>


    <?php function getDiagnosis($result) {
    if($result >= -1 AND $result <= 10) {
        return 'Normal';
    }
    else if($result >= 11 AND $result <= 16) {
        return 'Mild Mood Disturbance';
    }
    else if($result >= 17 AND $result <= 20) {
        return 'Borderline Clinical Depression';
    }
    else if($result >= 21 AND $result <= 30) {
        return 'Moderate Depression';
    }
    else if($result >= 31 AND $result <= 40) {
        return 'Severe Depression';
    }
    else if($result > 40) {
        return 'Extreme Depression';
    }
} ?>