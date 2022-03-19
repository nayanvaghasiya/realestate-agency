<?php

session_start();
include('config.php');

$id = $_GET['id'];

$q = "DELETE FROM `employeeregister` WHERE employee_Id = $id";

mysqli_query($con,$q);

header('location:admin-panel.php');
