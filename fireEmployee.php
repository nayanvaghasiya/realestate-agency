<?php

session_start();

include('config.php');

if ($con) {
    header('location:admin-panel.php');
} else {
    echo "not connected";
}

$currentEmail = $_POST['currentEmail'];

$q = " UPDATE employeeregister SET status = '1' WHERE email = '$currentEmail' ";

mysqli_query($con, $q);
