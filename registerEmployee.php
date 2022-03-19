<?php

session_start();

include('config.php');

$stmt = $con->prepare("INSERT INTO `employeeregister`(`admin_Id`, `title`, `firstname`, `lastname`, `mobilenumber`, `address`, `state`, `zip`, `image1`, `image2`, `email`, `password`, `boat`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssssss", $adminId, $title, $fname, $lname, $mnumber, $add, $state, $zip, $destinationfile, $destinationfile2, $email, $pass, $cbox);

$adminId = $_GET['id'];
$title = $_POST['title'];
$fname = $_POST['firstName'];
$lname = $_POST['lastName'];
$mnumber = $_POST['mobileNumber'];
$add = $_POST['address'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$img1 = $_FILES['image1'];
$img2 = $_FILES['image2'];
$email = $_POST['email'];
$pass = $_POST['password'];
$cbox = $_POST['checkbox'];

$filename = $img1['name'];
$fileerror = $img1['error'];
$filetmp = $img1['tmp_name'];

$fileext = explode('.', $filename);
$filecheck = strtolower(end($fileext));

$fileextstored = array('pdf');

if (in_array($filecheck, $fileextstored)) {
    $destinationfile = 'employeeDataFiles/' . $filename;
    move_uploaded_file($filetmp, $destinationfile);
}

$filename2 = $img2['name'];
$fileerror2 = $img2['error'];
$filetmp2 = $img2['tmp_name'];

$fileext2 = explode('.', $filename2);
$filecheck2 = strtolower(end($fileext2));

$fileextstored2 = array('png', 'jpg', 'jpeg');

if (in_array($filecheck2, $fileextstored2)) {
    $destinationfile2 = 'employeeDataFiles/' . $filename2;
    move_uploaded_file($filetmp2, $destinationfile2);

    $q = " select * from 'employeeregister' where email = '$email' && password = '$pass' ";

    $result = mysqli_query($con, $q);

    $num = mysqli_num_rows($result);

    if ($num == 1) {
        echo "duplicate value";
    } else {
        $stmt->execute();
        $stmt->close();
        // $qy = " INSERT INTO `employeeregister`(`admin_Id`, `title`, `firstname`, `lastname`, `mobilenumber`, `address`, `state`, `zip`, `image1`, `image2`, `email`, `password`, `boat`) VALUES ('$adminId','$title','$fname','$lname','$mnumber','$add','$state','$zip','$destinationfile','$destinationfile2','$email','$pass','$cbox') ";

        //mysqli_query($con, $qy);

        //header('location:admin-panel.php');
    }
}
