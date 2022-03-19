<?php

session_start();
include('config.php');

$employee_Id = $_GET['id'];
$property_Id = $_POST['property_Id'];
$title = $_POST['title'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$mobilenumber = $_POST['mobilenumber'];
$sellagreement = $_FILES['sellagreement'];
$photoid = $_FILES['photoid'];

$filename = $sellagreement['name'];
$fileerror = $sellagreement['error'];
$filetmp = $sellagreement['tmp_name'];

$fileext = explode('.', $filename);
$filecheck = strtolower(end($fileext));

$fileextstored = array('pdf');

if (in_array($filecheck, $fileextstored)) {
    $destinationfile = 'tenantDataFiles/' . $filename;
    move_uploaded_file($filetmp, $destinationfile);
}

$filename2 = $photoid['name'];
$fileerror2 = $photoid['error'];
$filetmp2 = $photoid['tmp_name'];

$fileext2 = explode('.', $filename2);
$filecheck2 = strtolower(end($fileext2));

$fileextstored2 = array('png', 'jpg', 'jpeg', 'pdf');

if (in_array($filecheck2, $fileextstored2)) {
    $destinationfile2 = 'tenantDataFiles/' . $filename2;
    move_uploaded_file($filetmp2, $destinationfile2);

    $q = " SELECT * FROM 'buyerlist' WHERE property_Id = '$property_Id' ";

    $result = mysqli_query($con, $q);

    $num = mysqli_num_rows($result);

    if ($num == 1) {

        echo ('duplicate value');
    } else {
        $qy = " INSERT INTO `buyerlist`(`employee_Id`, `property_Id`, `title`, `firstname`, `lastname`, `email`, `mobilenumber`, `sellagreement`, `photoid`) VALUES ('$employee_Id','$property_Id','$title','$firstname','$lastname','$email','$mobilenumber','$destinationfile','$destinationfile2') ";

        mysqli_query($con, $qy);

        header('location:employee-panel.php');
    }
}
