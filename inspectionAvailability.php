<?php

include('config.php');

if ($con) {
    header('location:changePropertyDetails.php');
} else {
    echo "not connected";
}

$id = $_GET['id'];

$qy = " UPDATE property SET inspectionavailability = '1' WHERE property_Id = '$id' ";

mysqli_query($con, $qy);

