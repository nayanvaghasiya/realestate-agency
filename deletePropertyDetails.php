<?php

session_start();

$con = mysqli_connect('localhost', 'root');

mysqli_select_db($con, 'Real_Estate_Agency');

$id = $_GET['id'];

$q = "DELETE FROM `property` WHERE property_Id = $id";

mysqli_query($con,$q);

header('location:changePropertyDetails.php');
?>