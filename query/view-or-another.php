<?php 
if (isset($_POST['close-exist'])) {
    header("Location: ../index.php?close-exist=true");
}
if (isset($_POST['view-result'])) {
    header("Location: ../index.php?view-result=true");
}
if (isset($_POST['another-resp'])) {
    header("Location: ../index.php?quest=true");
}
?>