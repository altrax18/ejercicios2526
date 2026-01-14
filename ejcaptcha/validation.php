<?php
if (isset($_POST['submit'])) {
    $input = $_POST['input'];
    $auth = $_POST['auth'];

    if ($input === $auth) {
        header("Location: noerror.php");
        
    } else {
        header("Location: error.php");
        
    }
}
?>
