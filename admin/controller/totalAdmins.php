<?php
require $_SERVER["DOCUMENT_ROOT"] . '/expert_system/config/database.php';

$sql="SELECT * from users where type='admin'";
$result=$conn-> query($sql);
$count=0;
if ($result-> num_rows > 0){
    while ($row=$result-> fetch_assoc()) {

        $count=$count+1;
    }
}
echo $count;