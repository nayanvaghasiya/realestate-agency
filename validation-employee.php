<?php

session_start();

include('config.php');

if ($con) {
    echo "connection successful";
} else {
    echo "not connected";
}

$name = $_POST['user'];
$pass = $_POST['password'];

$q = " select * from employeeregister where email = '$name' && password = '$pass' ";

$result = mysqli_query($con, $q);

$num = mysqli_num_rows($result);

if ($num == 1) {

    $_SESSION['usernameemployee'] = $name;
    header('location:employee-panel.php');

} else {
    
    header('location:login-employee.php');
}
