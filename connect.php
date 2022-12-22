<?php
    $con = mysqli_connect('localhost', 'root', '', 'confess');
    if (!$con) {
        die(mysqli_error("Error"+$con));
    }
?>