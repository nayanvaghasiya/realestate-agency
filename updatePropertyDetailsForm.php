<?php

session_start();
if (!isset($_SESSION['usernameemployee'])) {
    include_once "login-employee.php";
    exit;
}

include('config.php');

$username = $_SESSION['usernameemployee'];

$q = "SELECT * FROM `employeeregister` WHERE email='$username'";

$data = mysqli_query($con, $q);

while ($result = mysqli_fetch_array($data)) { ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="customerStyle.css">
        <style>
            .container {
                position: relative;
                text-align: center;
                color: white;
            }

            .centered {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
        </style>
    </head>

    <body>
        <?php
        $id = $_GET['id'];

        $q2 = " SELECT * FROM property WHERE property_Id = '$id' ";

        $data2 = mysqli_query($con, $q2);
        /*
        if (!$data2) {
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
        */
        while ($result2 = mysqli_fetch_array($data2)) {
            $property_Id = $result2['property_Id'];
            $employee_Id = $result2['employee_Id'];
            $forRentOrSell = $result2['forRentOrSell'];
            $propertyType = $result2['propertyType'];
            $propertySubType = $result2['propertySubType'];
            $address = $result2['address'];
            $price = $result2['price'];
            $size = $result2['size'];
            $bedroomNo = $result2['bedroomNo'];
            $bathroomNo = $result2['bathroomNo'];
            $toiletNo = $result2['toiletNo'];
            $parkingNo = $result2['parkingNo'];
            $furnished = $result2['furnishedOrNot'];
            $streetParking = $result2['streetParking'];
            $swimmingPool = $result2['swimmingPool'];
            $garden = $result2['garden'];
            $other = $result2['other'];
            $owner = $result2['owner'];

            $filename = $result2['photos'];

            $parts = explode(',', $filename);

            $noofparts = count($parts);
        }

        if (isset($_POST['update'])) {

            $employee_Id = $_POST['employee_Id'];
            $forRentOrSell = $_POST['forRentOrSell'];
            $propertyType = $_POST['propertyType'];
            $ResidentialPropertyType = $_POST['ResidentialPropertyType'];
            $commercialPropertyType = $_POST['commercialPropertyType'];
            $rawLandPropertyType = $_POST['rawLandPropertyType'];
            $specialUsePropertyType = $_POST['specialUsePropertyType'];
            $address = $_POST['address'];
            $price = $_POST['price'];
            $propertySize = $_POST['propertySize'];
            $bedroomNo = $_POST['bedroomNo'];
            $bathroomNo = $_POST['bathroomNo'];
            $toiletNo = $_POST['toiletNo'];
            $parkingNo = $_POST['parkingNo'];
            $furnished = $_POST['furnished'];
            $streetParking = $_POST['streetParking'];
            $swimmingPool = $_POST['swimmingPool'];
            $garden = $_POST['garden'];
            $other = $_POST['other'];
            $owner = $_POST['owner'];
            //$photos = $_FILES['pictures'];

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
            if ($filename == '') {
                if (!empty($image)) {
                    foreach ($image as $key => $val) {
                        $targetFilePath = $targetDir . $val;
                        move_uploaded_file($_FILES['pictures']['tmp_name'][$key], $targetFilePath);
                    }
                    $qy = " UPDATE `property` SET `employee_Id`='$employee_Id',`forRentOrSell`='$forRentOrSell',`propertyType`='$propertyType',`propertySubType`='$propertySubType',`furnishedOrNot`='$furnished',`address`='$address',`price`='$price',`size`='$propertySize',`bedroomNo`='$bedroomNo',`bathroomNo`='$bathroomNo',`toiletNo`='$toiletNo',`parkingNo`='$parkingNo',`streetParking`='$streetParking',`swimmingPool`='$swimmingPool',`garden`='$garden',`other`='$other',`owner`='$owner' WHERE property_Id=$id ";

                    $statement = $con->prepare($qy);
                    $statement->execute();
                }
            } else {
                
                $qy = " UPDATE `property` SET `employee_Id`='$employee_Id',`forRentOrSell`='$forRentOrSell',`propertyType`='$propertyType',`propertySubType`='$propertySubType',`furnishedOrNot`='$furnished',`address`='$address',`photos`='$filename',`price`='$price',`size`='$propertySize',`bedroomNo`='$bedroomNo',`bathroomNo`='$bathroomNo',`toiletNo`='$toiletNo',`parkingNo`='$parkingNo',`streetParking`='$streetParking',`swimmingPool`='$swimmingPool',`garden`='$garden',`other`='$other',`owner`='$owner' WHERE property_Id=$id ";

                $statement = $con->prepare($qy);
                $statement->execute();
            }
            header('location:changePropertyDetails.php');
        }
        ?>
        <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand"> Welcome <?php echo $result['title'] ?> <?php echo $result['firstname'] ?> <?php echo $result['lastname'] ?> </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        </li>
                    </ul>
                    <span class="navbar-text">
                        <a class="nav-link" href="logout.php"> LOGOUT </a>
                    </span>
                    <span class="navbar-text">
                        <img src="<?php echo $result['image2']; ?>" class="rounded float-end" alt="..." style="width: 50px; height: 50px; object-fit: cover;">
                    </span>
                </div>
            </div>
        </nav>
        <!-- Details Update Form -->
        <div class="search">
            <div class="px-xl-4 py-2">
                <form action="" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
                    <input class="form-input" type="text" name="employee_Id" value="<?php echo $employee_Id ?>" id="employee_Id" hidden>
                    <div class="row py-3">
                        <div class="col-md-2">
                            <label for="validationCustom01" class="form-label">Purpose</label>
                            <select class="form-select" name="forRentOrSell" id="forRentOrSell">
                                <option selected disabled value="">select</option>
                                <option value="Rent" <?php if ($forRentOrSell == "Rent") echo 'selected="selected"'; ?>>Rent</option>
                                <option value="Sell" <?php if ($forRentOrSell == "Sell") echo 'selected="selected"'; ?>>Sell</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid purpose.
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="validationCustom01" class="form-label">Property type</label>
                            <select class="form-select" name="propertyType" id="propertyType">
                                <option selected disabled value="">select</option>
                                <option Value="Residential" <?php if ($propertyType == "Residential") echo 'selected="selected"'; ?>>Residential</option>
                                <option Value="Commercial" <?php if ($propertyType == "Commercial") echo 'selected="selected"'; ?>>Commercial</option>
                                <option Value="Raw-land" <?php if ($propertyType == "Raw-land") echo 'selected="selected"'; ?>>Raw-land</option>
                                <option Value="Special-use" <?php if ($propertyType == "Special-use") echo 'selected="selected"'; ?>>Special use</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid Property type.
                            </div>
                        </div>
                        <div class="Residential box col-md-3">
                            <label for="validationCustom01" class="form-label">Sub-type</label>
                            <select class="form-select" name="ResidentialPropertyType" id="ResidentialPropertyType">
                                <option selected disabled value="">select</option>
                                <option <?php if ($propertySubType == "Single-family homes") echo 'selected="selected"'; ?>>Single-family homes</option>
                                <option <?php if ($propertySubType == "Townhome") echo 'selected="selected"'; ?>>Townhome</option>
                                <option <?php if ($propertySubType == "Apartment") echo 'selected="selected"'; ?>>Apartment</option>
                                <option <?php if ($propertySubType == "Bungalow") echo 'selected="selected"'; ?>>Bungalow</option>
                                <option <?php if ($propertySubType == "Mansion") echo 'selected="selected"'; ?>>Mansion</option>
                                <option <?php if ($propertySubType == "Condos/Coops") echo 'selected="selected"'; ?>>Condos/Coops</option>
                                <option <?php if ($propertySubType == "Multifamily homes") echo 'selected="selected"'; ?>>Multifamily homes</option>
                                <option <?php if ($propertySubType == "Luxury homes") echo 'selected="selected"'; ?>>Luxury homes</option>
                                <option <?php if ($propertySubType == "Vacation homes") echo 'selected="selected"'; ?>>Vacation homes</option>
                                <option <?php if ($propertySubType == "Getaway homes") echo 'selected="selected"'; ?>>Getaway homes</option>
                                <option <?php if ($propertySubType == "Co-op") echo 'selected="selected"'; ?>>Co-op</option>
                                <option <?php if ($propertySubType == "Tree house") echo 'selected="selected"'; ?>>Tree house</option>
                                <option <?php if ($propertySubType == "Villa") echo 'selected="selected"'; ?>>Villa</option>
                                <option <?php if ($propertySubType == "Dome/Round Houses") echo 'selected="selected"'; ?>>Dome/Round Houses</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid Property type.
                            </div>
                        </div>
                        <div class="Commercial box col-md-3">
                            <label for="validationCustom01" class="form-label">Sub-type</label>
                            <select class="form-select" name="commercialPropertyType" id="commercialPropertyType">
                                <option selected disabled value="">select</option>
                                <option <?php if ($propertySubType == "Office") echo 'selected="selected"'; ?>>Office</option>
                                <option <?php if ($propertySubType == "Heavy Manufacturing") echo 'selected="selected"'; ?>>Heavy Manufacturing</option>
                                <option <?php if ($propertySubType == "Light Assembly") echo 'selected="selected"'; ?>>Light Assembly</option>
                                <option <?php if ($propertySubType == "Flex Warehouse") echo 'selected="selected"'; ?>>Flex Warehouse</option>
                                <option <?php if ($propertySubType == "Bulk Warehouse") echo 'selected="selected"'; ?>>Bulk Warehouse</option>
                                <option <?php if ($propertySubType == "Strip/Shopping Center") echo 'selected="selected"'; ?>>Strip/Shopping Center</option>
                                <option <?php if ($propertySubType == "Community Retail Center") echo 'selected="selected"'; ?>>Community Retail Center</option>
                                <option <?php if ($propertySubType == "Hotels") echo 'selected="selected"'; ?>>Hotels</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid Property type.
                            </div>
                        </div>
                        <div class="Raw-land box col-md-3">
                            <label for="validationCustom01" class="form-label">Sub-type</label>
                            <select class="form-select" name="rawLandPropertyType" id="RawLandPropertyType">
                                <option selected disabled value="">select</option>
                                <option <?php if ($propertySubType == "Greenfield/Agricultural Land") echo 'selected="selected"'; ?>>Greenfield/Agricultural Land</option>
                                <option <?php if ($propertySubType == "Infill Land") echo 'selected="selected"'; ?>>Infill Land</option>
                                <option <?php if ($propertySubType == "Brownfield Land") echo 'selected="selected"'; ?>>Brownfield Land</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid Property type.
                            </div>
                        </div>
                        <div class="Special-use box col-md-3">
                            <label for="validationCustom01" class="form-label">Sub-type</label>
                            <select class="form-select" name="specialUsePropertyType" id="specialUsePropertyType">
                                <option selected disabled value="">select</option>
                                <option <?php if ($propertySubType == "Bowling alleys") echo 'selected="selected"'; ?>>Bowling alleys</option>
                                <option <?php if ($propertySubType == "Parking lots") echo 'selected="selected"'; ?>>Parking lots</option>
                                <option <?php if ($propertySubType == "Stadiums") echo 'selected="selected"'; ?>>Stadiums</option>
                                <option <?php if ($propertySubType == "Theaters") echo 'selected="selected"'; ?>>Theaters</option>
                                <option <?php if ($propertySubType == "zoos") echo 'selected="selected"'; ?>>zoos</option>
                                <option <?php if ($propertySubType == "amusement parks") echo 'selected="selected"'; ?>>amusement parks</option>
                                <option <?php if ($propertySubType == "Fort") echo 'selected="selected"'; ?>>Fort</option>
                                <option <?php if ($propertySubType == "Underground House") echo 'selected="selected"'; ?>>Underground House</option>
                                <option <?php if ($propertySubType == "Other") echo 'selected="selected"'; ?>>Other</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid Property type.
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="validationCustom03" class="form-label">Address</label>
                            <input class="form-control" type="text" name="address" id="address" value="<?php echo $address ?>">
                            <div class="invalid-feedback">
                                Please provide a valid address.
                            </div>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-2">
                            <label for="validationCustom02" class="form-label">Property price</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">$</span>
                                <input class="form-control" type="text" name="price" id="price" value="<?php echo $price ?>">
                                <div class="invalid-feedback">
                                    Please enter price of property.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="validationCustomUsername" class="form-label">Property size</label>
                            <div class="input-group has-validation">
                                <input class="form-control" type="text" name="propertySize" id="propertySize" aria-describedby="inputGroupPrepend" value="<?php echo $size ?>">
                                <span class="input-group-text" id="inputGroupPrepend">ft<sup>2</sup></span>
                                <div class="invalid-feedback">
                                    Please enter property size in square feet.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom02" class="form-label">Owner</label>
                            <input class="form-control" type="text" name="owner" id="owner" value="<?php echo $owner ?>">
                        </div>
                        <div class="Residential box col-md-2">
                            <label for="validationCustom04" class="form-label">Bedroom number</label>
                            <select class="form-select" name="bedroomNo" id="bedroomNo">
                                <option value="0" <?php if ($bedroomNo == "0") echo 'selected="selected"'; ?>>select</option>
                                <option value="1" <?php if ($bedroomNo == "1") echo 'selected="selected"'; ?>>1</option>
                                <option value="2" <?php if ($bedroomNo == "2") echo 'selected="selected"'; ?>>2</option>
                                <option value="3" <?php if ($bedroomNo == "3") echo 'selected="selected"'; ?>>3</option>
                                <option value="4" <?php if ($bedroomNo == "4") echo 'selected="selected"'; ?>>4</option>
                                <option value="5" <?php if ($bedroomNo == "5") echo 'selected="selected"'; ?>>5</option>
                                <option value="6" <?php if ($bedroomNo == "6") echo 'selected="selected"'; ?>>6</option>
                                <option value="7" <?php if ($bedroomNo == "7") echo 'selected="selected"'; ?>>7</option>
                                <option value="8" <?php if ($bedroomNo == "8") echo 'selected="selected"'; ?>>8</option>
                                <option value="9" <?php if ($bedroomNo == "9") echo 'selected="selected"'; ?>>9</option>
                                <option value="10" <?php if ($bedroomNo == "10") echo 'selected="selected"'; ?>>10 or more</option>
                            </select>
                        </div>
                        <div class="Residential box Commercial box col-md-2">
                            <label for="validationCustom04" class="form-label">Bathroom number</label>
                            <select class="form-select" name="bathroomNo" id="bathroomNo">
                                <option value="0" <?php if ($bathroomNo == "0") echo 'selected="selected"'; ?>>select</option>
                                <option value="1" <?php if ($bathroomNo == "1") echo 'selected="selected"'; ?>>1</option>
                                <option value="2" <?php if ($bathroomNo == "2") echo 'selected="selected"'; ?>>2</option>
                                <option value="3" <?php if ($bathroomNo == "3") echo 'selected="selected"'; ?>>3</option>
                                <option value="4" <?php if ($bathroomNo == "4") echo 'selected="selected"'; ?>>4</option>
                                <option value="5" <?php if ($bathroomNo == "5") echo 'selected="selected"'; ?>>5 or more</option>
                            </select>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="Residential box Commercial box col-md-2">
                            <label for="validationCustom04" class="form-label">Toilet number</label>
                            <select class="form-select" name="toiletNo" id="toiletNo">
                                <option value="0" <?php if ($toiletNo == "0") echo 'selected="selected"'; ?>>select</option>
                                <option value="1" <?php if ($toiletNo == "1") echo 'selected="selected"'; ?>>1</option>
                                <option value="2" <?php if ($toiletNo == "2") echo 'selected="selected"'; ?>>2</option>
                                <option value="3" <?php if ($toiletNo == "3") echo 'selected="selected"'; ?>>3</option>
                                <option value="4" <?php if ($toiletNo == "4") echo 'selected="selected"'; ?>>4</option>
                                <option value="5" <?php if ($toiletNo == "5") echo 'selected="selected"'; ?>>5 or more</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select toilet numbers of property.
                            </div>
                        </div>
                        <div class="Residential box Commercial box Special-use box col-md-2">
                            <label for="validationCustom02" class="form-label">Parking number</label>
                            <input class="form-control" type="text" name="parkingNo" id="parkingNo" value="<?php echo $parkingNo ?>">
                            <div class="invalid-feedback">
                                Please provide parking detail.
                            </div>
                        </div>
                        <div class="Residential box col-md-2">
                            <div class="form-check">
                                <?php if ($furnished == 'Yes') { ?>
                                    <input class="form-check-input" type="checkbox" name="furnished" value="Yes" id="furnished" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="checkbox" name="furnished" value="Yes" id="furnished">
                                <?php } ?>
                                <label class="form-label" for="invalidCheck">
                                    Furnished
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-check">
                                <?php if ($streetParking == 'Yes') { ?>
                                    <input class="form-check-input" type="checkbox" name="streetParking" id="streetParking" value="Yes" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="checkbox" name="streetParking" id="streetParking" value="Yes">
                                <?php } ?>
                                <label class="form-label" for="invalidCheck">
                                    Free street parking
                                </label>
                            </div>
                        </div>
                        <div class="Residential box Commercial box Special-use box col-md-2">
                            <div class="form-check">
                                <?php if ($swimmingPool == 'Yes') { ?>
                                    <input class="form-check-input" type="checkbox" name="swimmingPool" id="swimmingPool" value="Yes" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="checkbox" name="swimmingPool" id="swimmingPool" value="Yes">
                                <?php } ?>
                                <label class="form-label" for="invalidCheck">
                                    Swimming Pool
                                </label>
                            </div>
                        </div>
                        <div class="Residential box Commercial box Special-use box col-md-2">
                            <div class="form-check">
                                <?php if ($swimmingPool == 'Yes') { ?>
                                    <input class="form-check-input" type="checkbox" name="garden" id="garden" value="Yes" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="checkbox" name="garden" id="garden" value="Yes">
                                <?php } ?>
                                <label class="form-label" for="invalidCheck">
                                    Garden
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-md-4">
                            <label for="formFile" class="form-label">Upload pictures of property</label>
                            <input class="form-control" type="file" name="pictures[]" id="pictures" multiple>
                        </div>
                        <div class="align-items-center col-md-8 container">
                            <?php if ($filename == '') { ?>
                                <b>No Any Photos Available</b>
                            <?php } else { ?>
                                <?php foreach ($parts as $image) { ?>
                                    <img src="propertyDataFiles/<?php echo $image; ?>" alt="Property image" height="100px" width="100px">
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="validationCustom02" class="form-label">Mention any special circumstances</label>
                        <input class="form-control" type="text" name="other" id="other" value="<?php echo $other ?>">
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit" name="update">Submit Details</button>
                        <a class="btn btn-primary" href="changePropertyDetails.php" onclick="return confirm('Are you sure you want to leave page? Data will might not be updated.')">Close</a>
                    </div>
                </form>
            </div>
        </div>

    <?php
}
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
    <script type="text/javascript" src="showSelected.js"></script>
    <script>
        /*
        window.onbeforeunload = function() {
            return "Your work will be lost.";
        };
        */
    </script>
    </body>

    </html>