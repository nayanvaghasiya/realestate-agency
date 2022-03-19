<?php
session_start();

if (!isset($_SESSION['usernameemployee'])) {

    include('config.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="customerStyle.css">

    <title>Real estate - admin panel</title>
</head>

<body>

    <?php
    include('config.php');
    $username = $_SESSION['usernameemployee'];

    $q = "SELECT * FROM `employeeregister` WHERE email='$username'";

    $data = mysqli_query($con, $q);

    /*
    //to check whats going on 
    //basically it checks what is error
    if (!$data) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }
    */

    while ($result = mysqli_fetch_array($data)) {

    ?>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand"> Welcome <?php echo $result['title']; ?> <?php echo $result['firstname']; ?> <?php echo $result['lastname']; ?> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="employee-panel.php">Back to Home Page</a>
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


        <div class="search">
            <div class="px-xl-5 py-1">
                <form action="addNewProperty.php" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
                    <input class="form-input" type="text" name="employee_Id" value="<?php echo $result['employee_Id']; ?>" id="employee_Id" hidden>
                    <div class="col-md-2">
                        <label for="validationCustom01" class="form-label">Purpose</label>
                        <select class="form-select" name="forRentOrSell" id="forRentOrSell" required>
                            <option selected disabled value="">select</option>
                            <option value="Rent">Rent</option>
                            <option value="Sell">Sell</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid purpose.
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="validationCustom01" class="form-label">Property type</label>
                        <select class="form-select" name="propertyType" id="propertyType" required>
                            <option selected disabled value="">select</option>
                            <option Value="Residential">Residential</option>
                            <option Value="Commercial">Commercial</option>
                            <option Value="Raw-land">Raw-land</option>
                            <option Value="Special-use">Special use</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid Property type.
                        </div>
                    </div>
                    <div class="Residential box col-md-3">
                        <label for="validationCustom01" class="form-label">Residential property sub-type</label>
                        <select class="form-select" name="ResidentialPropertyType" id="ResidentialPropertyType" required>
                            <option selected disabled value="">select</option>
                            <option>Single-family homes</option>
                            <option>Townhome</option>
                            <option>Apartment</option>
                            <option>Bungalow</option>
                            <option>Mansion</option>
                            <option>Condos/Coops</option>
                            <option>Multifamily homes</option>
                            <option>Luxury homes</option>
                            <option>Vacation homes</option>
                            <option>Getaway homes</option>
                            <option>Co-op</option>
                            <option>Tree house</option>
                            <option>Villa</option>
                            <option>Dome/Round Houses</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid Property type.
                        </div>
                    </div>
                    <div class="Commercial box col-md-3">
                        <label for="validationCustom01" class="form-label">Commercial property sub-type</label>
                        <select class="form-select" name="commercialPropertyType" id="commercialPropertyType" required>
                            <option selected disabled value="">select</option>
                            <option>Office</option>
                            <option>Heavy Manufacturing</option>
                            <option>Light Assembly</option>
                            <option>Flex Warehouse</option>
                            <option>Bulk Warehouse</option>
                            <option>Strip/Shopping Center</option>
                            <option>Community Retail Center</option>
                            <option>Hotels</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid Property type.
                        </div>
                    </div>
                    <div class="Raw-land box col-md-3">
                        <label for="validationCustom01" class="form-label">Raw land sub-type</label>
                        <select class="form-select" name="rawLandPropertyType" id="RawLandPropertyType" required>
                            <option selected disabled value="">select</option>
                            <option>Greenfield/Agricultural Land</option>
                            <option>Infill Land</option>
                            <option>Brownfield Land</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid Property type.
                        </div>
                    </div>
                    <div class="Special-use box col-md-3">
                        <label for="validationCustom01" class="form-label">Special use sub-type</label>
                        <select class="form-select" name="specialUsePropertyType" id="specialUsePropertyType" required>
                            <option selected disabled value="">select</option>
                            <option>Bowling alleys</option>
                            <option>Parking lots</option>
                            <option>Stadiums</option>
                            <option>Theaters</option>
                            <option>zoos</option>
                            <option>amusement parks</option>
                            <option>Fort</option>
                            <option>Underground House</option>
                            <option>Other</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid Property type.
                        </div>
                    </div>
                    <p></p>
                    <div class="Residential box col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="furnished" value="Yes" id="furnished" required>
                            <label class="form-label" for="invalidCheck">
                                Furnished
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                            <label for="validationCustom02" class="form-label">Owner</label>
                            <input class="form-control" type="text" name="owner" id="owner" required>
                        </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Address</label>
                        <input class="form-control" type="text" name="address" id="address" required>
                        <div class="invalid-feedback">
                            Please provide a valid address.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="formFile" class="form-label">Upload pictures of property</label>
                        <input class="form-control" type="file" name="pictures[]" id="pictures" required multiple>
                        <div class="invalid-feedback">
                            Please provide clear pictures of the property.
                        </div>
                    </div>
                    <div class="col-3">
                        <label for="validationCustom02" class="form-label">Property price</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">$</span>
                            <input class="form-control" type="text" name="price" id="price" required>
                            <div class="invalid-feedback">
                                Please enter price of property.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustomUsername" class="form-label">Property size</label>
                        <div class="input-group has-validation">
                            <input class="form-control" type="text" name="propertySize" id="propertySize" aria-describedby="inputGroupPrepend" required>
                            <span class="input-group-text" id="inputGroupPrepend">ft<sup>2</sup></span>
                            <div class="invalid-feedback">
                                Please enter property size in square feet.
                            </div>
                        </div>
                    </div>
                    <p></p>
                    <div class="Residential box col-md-2">
                        <label for="validationCustom04" class="form-label">Bedroom number</label>
                        <select class="form-select" name="bedroomNo" id="bedroomNo" required>
                            <option value="0">select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10 or more</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select bedroom numbers of property.
                        </div>
                    </div>
                    <div class="Residential box Commercial box col-md-2">
                        <label for="validationCustom04" class="form-label">Bathroom number</label>
                        <select class="form-select" name="bathroomNo" id="bathroomNo" required>
                            <option value="0">select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5 or more</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select bathroom numbers of property.
                        </div>
                    </div>
                    <div class="Residential box Commercial box col-md-2">
                        <label for="validationCustom04" class="form-label">Toilet number</label>
                        <select class="form-select" name="toiletNo" id="toiletNo" required>
                            <option value="0">select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5 or more</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select toilet numbers of property.
                        </div>
                    </div>

                    <div class="Residential box Commercial box Special-use box col-md-2">
                        <label for="validationCustom02" class="form-label">Parking number</label>
                        <input class="form-control" type="text" name="parkingNo" id="parkingNo" required>
                        <div class="invalid-feedback">
                            Please provide parking detail.
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="streetParking" id="streetParking" value="Yes" required>
                            <label class="form-label" for="invalidCheck">
                                Free street parking
                            </label>
                        </div>
                    </div>
                    <div class="Residential box Commercial box Special-use box col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="swimmingPool" id="swimmingPool" value="Yes" required>
                            <label class="form-label" for="invalidCheck">
                                Swimming Pool
                            </label>
                        </div>
                    </div>
                    <div class="Residential box Commercial box Special-use box col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="garden" id="garden" value="Yes" required>
                            <label class="form-label" for="invalidCheck">
                                Garden
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="validationCustom02" class="form-label">Mention any special circumstances</label>
                        <input class="form-control" type="text" name="other" id="other" required>
                        <div class="invalid-feedback">
                            Please provide parking detail.
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Submit Details</button>
                        <input class="btn btn-primary" type="reset">
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
</body>

</html>