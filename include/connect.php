<?php
$con = mysqli_connect('localhost', 'root', 'root', 'project');
if (!$con) {
    echo "fail";
    die(mysqli_error($con));
}
?>