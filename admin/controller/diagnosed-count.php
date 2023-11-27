<?php
require $_SERVER["DOCUMENT_ROOT"] . '/expert_system/config/database.php';

$sql = "SELECT 
            SUM(CASE WHEN r.result >= -1 AND r.result <= 10 THEN 1 ELSE 0 END) AS Normal,
            SUM(CASE WHEN r.result >= 11 AND r.result <= 16 THEN 1 ELSE 0 END) AS 'Mild Mood Disturbance',
            SUM(CASE WHEN r.result >= 17 AND r.result <= 20 THEN 1 ELSE 0 END) AS 'Borderline Clinical Depression',
            SUM(CASE WHEN r.result >= 21 AND r.result <= 30 THEN 1 ELSE 0 END) AS 'Moderate Depression',
            SUM(CASE WHEN r.result >= 31 AND r.result <= 40 THEN 1 ELSE 0 END) AS 'Severe Depression',
            SUM(CASE WHEN r.result > 40 THEN 1 ELSE 0 END) AS 'Extreme Depression'
        FROM result r 
        INNER JOIN users u ON r.user_id = u.user_id";
$result = $conn->query($sql);
$diagnosisCount = $result->fetch_assoc();

// Calculate the total count
$totalDiagnosisCount = array_sum($diagnosisCount);
?>

<div class="bg-gray-100 p-4 rounded-md shadow-md mb-4">
    <h6 class="text-lg font-bold text-gray-800">Total Diagnosis Count: <?php echo $totalDiagnosisCount; ?></h6>
</div>

<?php
echo "<table class='w-full bg-white border border-gray-300 rounded-md overflow-hidden shadow-md'>";
echo "<tr class='bg-gray-200 border-b-2'>";
foreach ($diagnosisCount as $diagnosis => $count) {
    echo "<th class='py-2 px-4 border-r-2 text-center'>$diagnosis</th>";
}
echo "</tr>";
echo "<tr>";
foreach ($diagnosisCount as $count) {
    echo "<td class='py-2 px-4 border-r-2 text-center border-b'>$count</td>";
}
echo "</tr>";
echo "</table>";
?>
