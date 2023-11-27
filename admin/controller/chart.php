<?php

require $_SERVER["DOCUMENT_ROOT"] . '/expert_system/config/database.php';

$sql = "SELECT r.result_id, r.user_id, u.first_name, u.last_name, r.result, r.created_at 
        FROM result r 
        INNER JOIN users u ON r.user_id = u.user_id
        ORDER BY r.user_id";
$result = $conn->query($sql);

$previousUserId = null;
$countResults = 0;

if (isset($_POST['result_id'])) {
    $_SESSION['result_id'] = $_POST['result_id']; 
    include("../confirm-modal.php");
}

echo "<table class='w-full bg-white border border-gray-300 rounded-md overflow-hidden shadow-md'>";
echo "<tr class='bg-gray-200 border-b-2'>";
echo "<th class='py-2 px-4 border-r-2'>User ID - Name</th>";
echo "<th class='py-2 px-4 border-r-2'>Result</th>";
echo "<th class='py-2 px-4 border-r-2'>Diagnosis</th>";
echo "<th class='py-2 px-4 border-r-2'>Date and Time Taken</th>";
echo "<th class='py-2 px-4'>Action</th>";
echo "</tr>";

while ($row = $result->fetch_assoc()) {

    // Check if the current user is the same as the previous one
    if ($previousUserId !== $row['user_id']) {
        if ($countResults > 0) {
            echo "</tr>";
        }
        $countResults = 0;
        $previousUserId = $row['user_id'];
        echo "<tr>";
        $numRows = getNumRows($row['user_id'], $conn);
        echo "<td rowspan='$numRows' class='py-2 px-4 border-r-2 border-b'>" . $row['user_id'] . " - " . ucfirst($row['first_name']) . " " . ucfirst($row['last_name'])  . "</td>";
    }

    if ($countResults > 0) {
        echo "</tr>";
        echo "<tr>";
    }

    echo "<td class='py-2 px-4 border-r-2 text-center border-b'>" . $row['result'] . "</td>";
    echo "<td class='py-2 px-4 border-r-2 border-b'>" . getDiagnosis($row['result']) . "</td>";
    echo "<td class='py-2 px-4 border-r-2 text-center border-b'>" . $row['created_at'] . "</td>";
    echo '<td class="py-2 px-4 border-r-2 text-center border-b"><form method="post" action="viewResults.php?confirm">
    <input type="hidden" name="result_id" value="' . $row['result_id'] . '">
    <input type="submit" class="bg-[#a07f7e] hover:bg-[#864543] text-white py-1 px-2 rounded" value="Delete">
    </form></td>';
    $countResults++;
}
if ($countResults > 0) {
    echo "</tr>";
}
echo "</table>";

$conn->close();

function getNumRows($user_id, $connection) {
    $query = "SELECT COUNT(*) as num_rows FROM result WHERE user_id = $user_id";
    $result = $connection->query($query);
    $row = $result->fetch_assoc();
    return $row['num_rows'];
}


function getDiagnosis($result) {
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
}

?>