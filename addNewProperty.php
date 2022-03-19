<?php

session_start();

include('config.php');

$stmt = $con->prepare("INSERT INTO `property`(`employee_Id`, `forRentOrSell`, `propertyType`, `propertySubType`, `furnishedOrNot`, `address`, `photos`, `price`, `size`, `bedroomNo`, `bathroomNo`, `toiletNo`, `parkingNo`, `streetParking`, `swimmingPool`, `garden`, `other`, `owner`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssssssssssssssssss", $employee_Id, $forRentOrSell, $propertyType, $propertySubType, $furnished, $address, $filename, $price, $propertySize, $bedroomNo, $bathroomNo, $toiletNo, $parkingNo, $streetParking, $swimmingPool, $garden, $other, $owner);

$employee_Id = $_POST['employee_Id'];
$forRentOrSell = $_POST['forRentOrSell'];
$propertyType = $_POST['propertyType'];
$ResidentialPropertyType = $_POST['ResidentialPropertyType'];
$commercialPropertyType = $_POST['commercialPropertyType'];
$rawLandPropertyType = $_POST['rawLandPropertyType'];
$specialUsePropertyType = $_POST['specialUsePropertyType'];
$furnished = $_POST['furnished'];
$address = $_POST['address'];
//$pictures = $_FILES['pictures'];
$price = $_POST['price'];
$propertySize = $_POST['propertySize'];
$bedroomNo = $_POST['bedroomNo'];
$bathroomNo = $_POST['bathroomNo'];
$toiletNo = $_POST['toiletNo'];
$parkingNo = $_POST['parkingNo'];
$streetParking = $_POST['streetParking'];
$swimmingPool = $_POST['swimmingPool'];
$garden = $_POST['garden'];
$other = $_POST['other'];
$owner = $_POST['owner'];


if ($propertyType == "Residential") {
    $propertySubType = $ResidentialPropertyType;
} elseif ($propertyType == "Commercial") {
    $propertySubType = $commercialPropertyType;
} elseif ($propertyType == "Raw-land") {
    $propertySubType = $rawLandPropertyType;
} else {
    $propertySubType = $specialUsePropertyType;
}

if ($furnished == "") {
    $furnished = "No";
}

if ($streetParking == "") {
    $streetParking = "No";
}

if ($swimmingPool == "") {
    $swimmingPool = "No";
}

if ($garden == "") {
    $garden = "No";
}

$targetDir = "propertyDataFiles/";
$image = $_FILES['pictures']['name'];
$filename = implode(",", $image);

if (!empty($image)) {
    foreach ($image as $key => $val) {
        $targetFilePath = $targetDir . $val;
        move_uploaded_file($_FILES['pictures']['tmp_name'][$key], $targetFilePath);
    }

    //$qy = "INSERT INTO `property`(`employee_Id`, `forRentOrSell`, `propertyType`, `propertySubType`, `furnishedOrNot`, `address`, `photos`, `price`, `size`, `bedroomNo`, `bathroomNo`, `toiletNo`, `parkingNo`, `streetParking`, `swimmingPool`, `garden`, `other`) VALUES ('$employee_Id','$forRentOrSell','$propertyType','$propertySubType','$furnished','$address','$filename','$price','$propertySize','$bedroomNo','$bathroomNo','$toiletNo','$parkingNo','$streetParking','$swimmingPool','$garden','$other')";


    $stmt->execute();
    $stmt->close();
    header('location:addNewPropertyForm.php');
}

/*
    if(isset($_POST['submit'])){
        $imageCount = count($_FILES['image']['name']);
        for($i=0;$i<$imageCount;$i++){
            $imageName = $_FILES['image']['name'][$i];
            $imageTempName = $_FILES['image']['tmp_name'][$i];
            $targetPath = "./propertyDataFiles/".$imageName;
            if(move_uploaded_file($imageTempName,$targetPath)){
                $qy = "INSERT INTO `property`(`employee_Id`, `forRentOrSell`, `propertyType`, `propertySubType`, `furnishedOrNot`, `address`, `photos`, `price`, `size`, `bedroomNo`, `bathroomNo`, `toiletNo`, `parkingNo`, `streetParking`, `swimmingPool`, `garden`, `other`) VALUES ('---','$forRentOrSell','$propertyType','$propertySubType','$furnished','$address','$destinationfile2','$price','$propertySize','$bedroomNo','$bathroomNo','$toiletNo','$parkingNo','$streetParking','$swimmingPool','$garden','$other')";

                mysqli_query($con, $qy);
            }
        }
    }
*/
/*
if(isset($_POST['submit'])){

    $extention = array('png', 'jpg', 'jpeg');
    foreach($_FILES['pictures']['tmp_name'] as $key => $value){
        $filename = $_FILES['pictures']['name'][$key];
        $filename_tmp = $_FILES['pictures']['tmp_name'][$key];

        $ext=pathinfo($filename,PATHINFO_EXTENSION);

        if(in_array($ext,$extention)){

            if(!file_exists('propertyDataFiles/'.$filename)){
                move_uploaded_file($filename_tmp,'propertyDataFiles/'.$filename);
                $finalfilename=$filename;
            }else{
                $filename=str_replace('.','-', basename($filename,$ext));
                $newfilename=$filename.time().".".$ext;
                move_uploaded_file($filename_tmp,'propertyDataFiles/'.$newfilename);
                $finalfilename=$newfilename;
            }
            //$createtime=date('y-m-d h:i:s');

            $qy = "INSERT INTO `property`(`employee_Id`, `forRentOrSell`, `propertyType`, `propertySubType`, `furnishedOrNot`, `address`, `photos`, `price`, `size`, `bedroomNo`, `bathroomNo`, `toiletNo`, `parkingNo`, `streetParking`, `swimmingPool`, `garden`, `other`) VALUES ('---','$forRentOrSell','$propertyType','$propertySubType','$furnished','$address','$finalfilename','$price','$propertySize','$bedroomNo','$bathroomNo','$toiletNo','$parkingNo','$streetParking','$swimmingPool','$garden','$other')";

        mysqli_query($con, $qy);

       }else{
           echo"Error";
       }
    }
}
*/


/*
    $filename2 = $pictures['name'];
    $fileerror2 = $pictures['error'];
    $filetmp2 = $pictures['tmp_name'];

    $fileext2 = explode('.',$filename2);
    $filecheck2 = strtolower(end($fileext2));

    $fileextstored2 = array('png', 'jpg', 'jpeg');

    if(in_array($filecheck2,$fileextstored2)){
        $destinationfile2 = 'propertyDataFiles/'.$filename2;
        move_uploaded_file($filetmp2,$destinationfile2);
  
        $qy = "INSERT INTO `property`(`employee_Id`, `forRentOrSell`, `propertyType`, `propertySubType`, `furnishedOrNot`, `address`, `photos`, `price`, `size`, `bedroomNo`, `bathroomNo`, `toiletNo`, `parkingNo`, `streetParking`, `swimmingPool`, `garden`, `other`) VALUES ('---','$forRentOrSell','$propertyType','$propertySubType','$furnished','$address','$destinationfile2','$price','$propertySize','$bedroomNo','$bathroomNo','$toiletNo','$parkingNo','$streetParking','$swimmingPool','$garden','$other')";

        mysqli_query($con, $qy);
    
    } else{
        echo"insert not successful";
    }
*/