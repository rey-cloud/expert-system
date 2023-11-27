<?php
include("../php_tabs/list-of-diagnosis.php"); 

$diagnose = "";
$reco = "";

$diagnosisRanges = array(10, 16, 20, 30, 40, 63);

foreach ($diagnosisRanges as $index => $range) {
    if ($result1 <= $range) {
        $diagnose = $diagnosis[$index][0];
        $reco = $diagnosis[$index][1];
        break;
    }
}

?>