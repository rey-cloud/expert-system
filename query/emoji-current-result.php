<?php
require $_SERVER["DOCUMENT_ROOT"] . '/expert_system/config/database.php';

if (isset($_SESSION['fk-user-id'])) {
    $fk = $_SESSION['fk-user-id'];

    // Initialize the count variables
    $zerocount = $onecount = $twocount = $threecount = 0;

    $sql_result_id = "SELECT * FROM result WHERE user_id = '$fk' ORDER BY result_id DESC LIMIT 1";
    $result_result_id = $conn->query($sql_result_id);

    // Check if the query execution was successful
    if (!$result_result_id) {
        die("Query failed: " . $conn->error);
    }

    // Check if there are rows in the result set
    if ($result_result_id->num_rows > 0) {
        $row = $result_result_id->fetch_assoc();

        // Set the number of iterations for the loop
        $numIterations = 21;
        for ($i = 1; $i <= $numIterations; $i++) {
            $q = "q" . $i; // Build the q variable name
            
            // Check conditions for q
            switch ($row[$q]) {
                case 0:
                    $zerocount++;
                    break;
                case 1:
                    $onecount++;
                    break;
                case 2:
                    $twocount++;
                    break;
                case 3:
                    $threecount++;
                    break;
            }
        }
    } else {
        // Handle the case when no rows are returned
        echo "No rows found in the result set.";
    }

    $conn->close();
}
?>

<table class="mx-auto max-w-screen-md table-auto border border-collapse border-gray-300">
  <thead class=" bg-gray-400">
    <tr>
      <?php foreach (["😕", "🙁", "😞", "😭"] as $emoji) : ?>
      <th class='px-4 py-2 border'><?= $emoji ?></th>
      <?php endforeach; ?>
    </tr>
  </thead>
  <tr class="text-center">
    <td class="border"><?= $zerocount ?></td>
    <td class="border"><?= $onecount ?></td>
    <td class="border"><?= $twocount ?></td>
    <td class="border"><?= $threecount ?></td>
  </tr>
</table>