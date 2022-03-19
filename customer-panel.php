<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="customerStyle.css">
  <link rel="stylesheet" type="text/css" href="homeStyle.css">
  <link rel="stylesheet" type="text/css" href="card.css">
  <link rel="stylesheet" type="text/css" href="footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>Real estate - customers panel</title>
</head>

<body>
  <!-- Link to go to the Top -->
  <a id="top"></a>
  <!-- Main Container of the header part including Navigation bar and search area -->
  <div class="top-about-section">
    <!-- Navigation Bar -->
    <div class="link dropend">
      <a href="customer-panel.php">Real Estate Agency</a>
      <a href="aboutUs.php">About Us</a>
      <a href="contactUs.php">Contact Us</a>
      <a class="dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        EMP Portal
      </a>
      <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="employee-panel.php">Employee Panel</a></li>
        <li><a class="dropdown-item" href="admin-panel.php">Admin Panel</a></li>
      </ul>
    </div>
    <!-- Property Search Form -->
    <div class="about-section">
      <div class="px-xl-5 py-5">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
          <div class="col-md-2">
            <label for="validationCustom01" class="form-label">Purpose</label>
            <select class="form-select" name="forRentOrSell" id="forRentOrSell">
              <option value="">select</option>
              <option value="Rent">Rent</option>
              <option value="Sell">Buy</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="validationCustom01" class="form-label">Property type</label>
            <select class="form-select" name="propertyType" id="propertyType" required>
              <option selected value="">select</option>
              <option Value="Residential">Residential</option>
              <option Value="Commercial">Commercial</option>
              <option Value="Raw-land">Raw-land</option>
              <option Value="Special-use">Special use</option>
            </select>
          </div>
          <div class="Residential box col-md-3">
            <label for="validationCustom01" class="form-label">Residential property sub-type</label>
            <select class="form-select" name="ResidentialPropertyType" id="ResidentialPropertyType" required>
              <option value="">select</option>
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
          </div>
          <div class="Commercial box col-md-3">
            <label for="validationCustom01" class="form-label">Commercial property sub-type</label>
            <select class="form-select" name="commercialPropertyType" id="commercialPropertyType" required>
              <option value="">select</option>
              <option>Office</option>
              <option>Heavy Manufacturing</option>
              <option>Light Assembly</option>
              <option>Flex Warehouse</option>
              <option>Bulk Warehouse</option>
              <option>Strip/Shopping Center</option>
              <option>Community Retail Center</option>
              <option>Hotels</option>
            </select>
          </div>
          <div class="Raw-land box col-md-3">
            <label for="validationCustom01" class="form-label">Raw land sub-type</label>
            <select class="form-select" name="rawLandPropertyType" id="RawLandPropertyType" required>
              <option value="">select</option>
              <option>Greenfield/Agricultural Land</option>
              <option>Infill Land</option>
              <option>Brownfield Land</option>
            </select>
          </div>
          <div class="Special-use box col-md-3">
            <label for="validationCustom01" class="form-label">Special use sub-type</label>
            <select class="form-select" name="specialUsePropertyType" id="specialUsePropertyType" required>
              <option value="">select</option>
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
          </div>
          <div class="col-md-4">
            <label for="validationCustom03" class="form-label">Area</label>
            <input class="form-control" type="text" name="address" id="address" placeholder="Enter Area code, Area name, Suburb, city..">
          </div>
          <div class="col-6">
            <label for="validationCustom02" class="form-label">Price Range</label>
            <div class="input-group has-validation">
              <span class="input-group-text" id="inputGroupPrepend">From</span>
              <span class="input-group-text" id="inputGroupPrepend">$</span>
              <input class="form-control" type="text" name="minPrice" id="minPrice" value="0">
              <span class="input-group-text" id="inputGroupPrepend">To</span>
              <span class="input-group-text" id="inputGroupPrepend">$</span>
              <input class="form-control" type="text" name="maxPrice" id="maxPrice" value="10000000000000000000">
            </div>
          </div>
          <div class="col-md-6">
            <label for="validationCustomUsername" class="form-label">Property size Range</label>
            <div class="input-group has-validation">
              <span class="input-group-text" id="inputGroupPrepend">From</span>
              <input class="form-control" type="text" name="minPropertySize" id="minPropertySize" aria-describedby="inputGroupPrepend" value="0">
              <span class="input-group-text" id="inputGroupPrepend">ft<sup>2</sup></span>
              <span class="input-group-text" id="inputGroupPrepend">To</span>
              <input class="form-control" type="text" name="maxPropertySize" id="maxPropertySize" aria-describedby="inputGroupPrepend" value="100000000000000000">
              <span class="input-group-text" id="inputGroupPrepend">ft<sup>2</sup></span>
            </div>
          </div>

          <div class="Residential box Commercial box Special-use box col-md-3">
            <label for="validationCustom02" class="form-label">Personal Parking</label>
            <input class="form-control" type="text" name="parkingNo" id="parkingNo" placeholder="Minimum parkings">
          </div>
          <div class="Residential box col-md-3">
            <label for="validationCustom04" class="form-label">Minimum Bedroom number</label>
            <select class="form-select" name="bedroomNo" id="bedroomNo">
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
          </div>
          <div class="Residential box Commercial box col-md-3">
            <label for="validationCustom04" class="form-label">Minimum Bathroom number</label>
            <select class="form-select" name="bathroomNo" id="bathroomNo">
              <option value="0">select</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5 or more</option>
            </select>
          </div>
          <div class="Residential box Commercial box col-md-3">
            <label for="validationCustom04" class="form-label">Minimum Toilet number</label>
            <select class="form-select" name="toiletNo" id="toiletNo" required>
              <option value="0">select</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5 or more</option>
            </select>
          </div>

          <div class="Residential box col-md-3">
            <label for="validationCustom01" class="form-label">Furnished</label>
            <select class="form-select" name="furnished" id="furnished">
              <option value="">select</option>
              <option value="Yes">Yes</option>
              <option value="No">No</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="validationCustom01" class="form-label">Free street parking</label>
            <select class="form-select" name="streetParking" id="streetParking">
              <option value="">select</option>
              <option value="Yes">Yes</option>
              <option value="No">No</option>
            </select>
          </div>
          <div class="Residential box Commercial box Special-use box col-md-3">
            <label for="validationCustom01" class="form-label">Swimming Pool</label>
            <select class="form-select" name="swimmingPool" id="swimmingPool">
              <option value="">select</option>
              <option value="Yes">Yes</option>
              <option value="No">No</option>
            </select>
          </div>
          <div class="Residential box Commercial box Special-use box col-md-3">
            <label for="validationCustom01" class="form-label">Garden</label>
            <select class="form-select" name="garden" id="garden">
              <option value="">select</option>
              <option value="Yes">Yes</option>
              <option value="No">No</option>
            </select>
          </div>
          <div class="col-12">
            <button class="btn btn-primary" type="submit">Search Property</button>
            <input class="btn btn-primary" type="reset">
          </div>
        </form>
      </div>
    </div>
  </div>

  <!--
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="customer-panel.php">Real Estate agency</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="aboutUs.php">ABOUT US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">CONTACT US</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              EMP Portal
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="employee-panel.php">Employee Panel</a></li>
              <li><a class="dropdown-item" href="admin-panel.php">Admin Panel</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Terms and Condition</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="search">
    <div class="px-xl-5 py-5">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
        <div class="col-md-2">
          <label for="validationCustom01" class="form-label">Purpose</label>
          <select class="form-select" name="forRentOrSell" id="forRentOrSell">
            <option value="">select</option>
            <option value="Rent">Rent</option>
            <option value="Sell">Buy</option>
          </select>
        </div>
        <div class="col-md-3">
          <label for="validationCustom01" class="form-label">Property type</label>
          <select class="form-select" name="propertyType" id="propertyType" required>
            <option selected value="">select</option>
            <option Value="Residential">Residential</option>
            <option Value="Commercial">Commercial</option>
            <option Value="Raw-land">Raw-land</option>
            <option Value="Special-use">Special use</option>
          </select>
        </div>
        <div class="Residential box col-md-3">
          <label for="validationCustom01" class="form-label">Residential property sub-type</label>
          <select class="form-select" name="ResidentialPropertyType" id="ResidentialPropertyType" required>
            <option value="">select</option>
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
        </div>
        <div class="Commercial box col-md-3">
          <label for="validationCustom01" class="form-label">Commercial property sub-type</label>
          <select class="form-select" name="commercialPropertyType" id="commercialPropertyType" required>
            <option value="">select</option>
            <option>Office</option>
            <option>Heavy Manufacturing</option>
            <option>Light Assembly</option>
            <option>Flex Warehouse</option>
            <option>Bulk Warehouse</option>
            <option>Strip/Shopping Center</option>
            <option>Community Retail Center</option>
            <option>Hotels</option>
          </select>
        </div>
        <div class="Raw-land box col-md-3">
          <label for="validationCustom01" class="form-label">Raw land sub-type</label>
          <select class="form-select" name="rawLandPropertyType" id="RawLandPropertyType" required>
            <option value="">select</option>
            <option>Greenfield/Agricultural Land</option>
            <option>Infill Land</option>
            <option>Brownfield Land</option>
          </select>
        </div>
        <div class="Special-use box col-md-3">
          <label for="validationCustom01" class="form-label">Special use sub-type</label>
          <select class="form-select" name="specialUsePropertyType" id="specialUsePropertyType" required>
            <option value="">select</option>
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
        </div>
        <div class="col-md-4">
          <label for="validationCustom03" class="form-label">Area</label>
          <input class="form-control" type="text" name="address" id="address" placeholder="Enter Area code, Area name, Suburb, city..">
        </div>
        <div class="col-6">
          <label for="validationCustom02" class="form-label">Price Range</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">From</span>
            <span class="input-group-text" id="inputGroupPrepend">$</span>
            <input class="form-control" type="text" name="minPrice" id="minPrice" value="0">
            <span class="input-group-text" id="inputGroupPrepend">To</span>
            <span class="input-group-text" id="inputGroupPrepend">$</span>
            <input class="form-control" type="text" name="maxPrice" id="maxPrice" value="10000000000000000000">
          </div>
        </div>
        <div class="col-md-6">
          <label for="validationCustomUsername" class="form-label">Property size Range</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">From</span>
            <input class="form-control" type="text" name="minPropertySize" id="minPropertySize" aria-describedby="inputGroupPrepend" value="0">
            <span class="input-group-text" id="inputGroupPrepend">ft<sup>2</sup></span>
            <span class="input-group-text" id="inputGroupPrepend">To</span>
            <input class="form-control" type="text" name="maxPropertySize" id="maxPropertySize" aria-describedby="inputGroupPrepend" value="100000000000000000">
            <span class="input-group-text" id="inputGroupPrepend">ft<sup>2</sup></span>
          </div>
        </div>

        <div class="Residential box Commercial box Special-use box col-md-3">
          <label for="validationCustom02" class="form-label">Personal Parking</label>
          <input class="form-control" type="text" name="parkingNo" id="parkingNo" placeholder="Minimum parkings">
        </div>
        <div class="Residential box col-md-3">
          <label for="validationCustom04" class="form-label">Minimum Bedroom number</label>
          <select class="form-select" name="bedroomNo" id="bedroomNo">
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
        </div>
        <div class="Residential box Commercial box col-md-3">
          <label for="validationCustom04" class="form-label">Minimum Bathroom number</label>
          <select class="form-select" name="bathroomNo" id="bathroomNo">
            <option value="0">select</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5 or more</option>
          </select>
        </div>
        <div class="Residential box Commercial box col-md-3">
          <label for="validationCustom04" class="form-label">Minimum Toilet number</label>
          <select class="form-select" name="toiletNo" id="toiletNo" required>
            <option value="0">select</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5 or more</option>
          </select>
        </div>

        <div class="Residential box col-md-3">
          <label for="validationCustom01" class="form-label">Furnished</label>
          <select class="form-select" name="furnished" id="furnished">
            <option value="">select</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
        </div>
        <div class="col-md-3">
          <label for="validationCustom01" class="form-label">Free street parking</label>
          <select class="form-select" name="streetParking" id="streetParking">
            <option value="">select</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
        </div>
        <div class="Residential box Commercial box Special-use box col-md-3">
          <label for="validationCustom01" class="form-label">Swimming Pool</label>
          <select class="form-select" name="swimmingPool" id="swimmingPool">
            <option value="">select</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
        </div>
        <div class="Residential box Commercial box Special-use box col-md-3">
          <label for="validationCustom01" class="form-label">Garden</label>
          <select class="form-select" name="garden" id="garden">
            <option value="">select</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
        </div>
        <div class="col-12">
          <button class="btn btn-primary" type="submit">Search Property</button>
          <input class="btn btn-primary" type="reset">
        </div>
      </form>
    </div>
  </div>
-->

  <?php
  error_reporting(0);

  include('config.php');

  $forRentOrSell = $_POST['forRentOrSell'];
  $propertyType = $_POST['propertyType'];
  $ResidentialPropertyType = $_POST['ResidentialPropertyType'];
  $commercialPropertyType = $_POST['commercialPropertyType'];
  $rawLandPropertyType = $_POST['rawLandPropertyType'];
  $specialUsePropertyType = $_POST['specialUsePropertyType'];
  $address = $_POST['address'];
  $minPrice = $_POST['minPrice'];
  $maxPrice = $_POST['maxPrice'];
  $minPropertySize = $_POST['minPropertySize'];
  $maxPropertySize = $_POST['maxPropertySize'];
  $bedroomNo = $_POST['bedroomNo'];
  $bathroomNo = $_POST['bathroomNo'];
  $toiletNo = $_POST['toiletNo'];
  $parkingNo = $_POST['parkingNo'];
  $furnished = $_POST['furnished'];
  $streetParking = $_POST['streetParking'];
  $swimmingPool = $_POST['swimmingPool'];
  $garden = $_POST['garden'];


  if ($propertyType == "Residential") {
    $propertySubType = $ResidentialPropertyType;
  } elseif ($propertyType == "Commercial") {
    $propertySubType = $commercialPropertyType;
  } elseif ($propertyType == "Raw-land") {
    $propertySubType = $rawLandPropertyType;
  } else {
    $propertySubType = $specialUsePropertyType;
  }

  // $q = "SELECT * FROM `property` WHERE forRentOrSell = '$forRentOrSell' AND propertyType = '$propertyType' AND propertySubType = '$propertySubType' AND address LIKE '%$address%' AND price >= $minPrice AND price <= $maxPrice AND size >= $minPropertySize AND size <= $maxPropertySize AND bedroomNo = '$bedroomNo' AND bathroomNo = '$bathroomNo' AND toiletNo = '$toiletNo' AND parkingNo = '$parkingNo' AND streetParking = '$streetParking' AND swimmingPool = '$swimmingPool' AND garden = '$garden' ORDER BY property_Id DESC";

  if (empty($_POST['forRentOrSell']) && empty($_POST['propertyType']) && empty($_POST['ResidentialPropertyType']) && empty($_POST['commercialPropertyType']) && empty($_POST['rawLandPropertyType']) && empty($_POST['specialUsePropertyType']) && empty($_POST['address']) && empty($_POST['minPrice']) && empty($_POST['maxPrice']) && empty($_POST['minPropertySize']) && empty($_POST['maxPropertySize']) && empty($_POST['bedroomNo']) && empty($_POST['bathroomNo']) && empty($_POST['toiletNo']) && empty($_POST['parkingNo']) && empty($_POST['furnished']) && empty($_POST['streetParking']) && empty($_POST['swimmingPool']) && empty($_POST['garden'])) {
  ?>
    <p></p><br>
    <h1 class="text-center">
      <?php echo ('New Properties. &#x29EC;'); ?>
    </h1>
  <?php
    $q = "SELECT * FROM `property` WHERE inspectionavailability = '1' ORDER BY property_Id DESC LIMIT 3";
  } else {
    $q = "SELECT * FROM `property` WHERE if(address = null,address LIKE '%a%',address LIKE '%$address%') AND if(forRentOrSell = null,forRentOrSell LIKE '%e%',forRentOrSell LIKE '%$forRentOrSell%') AND if(propertyType = null,propertyType LIKE '%a%',propertyType LIKE '%$propertyType%') AND if(propertySubType = null,propertySubType LIKE '%%',propertySubType LIKE '%$propertySubType%') AND price >= $minPrice AND price <= $maxPrice AND size >= $minPropertySize AND size <= $maxPropertySize AND bedroomNo >= '$bedroomNo' AND bathroomNo >= '$bathroomNo' AND toiletNo >= '$toiletNo' AND parkingNo >= '$parkingNo' AND if(streetParking = null,streetParking LIKE '%%',streetParking LIKE '%$streetParking%') AND if(swimmingPool = null,swimmingPool LIKE '%%',swimmingPool LIKE '%$swimmingPool%') AND if(garden = null,garden LIKE '%%',garden LIKE '%$garden%') AND if(furnishedOrNot = null,furnishedOrNot LIKE '%%',furnishedOrNot LIKE '%$furnished%') AND inspectionavailability = '1' ORDER BY property_Id DESC ";
  }
  /*
  if (isset($_POST['forRentOrSell'])) {
    $forRentOrSell = $_POST['forRentOrSell'];
    if ($forRentOrSell == 'All') {
      $q = "SELECT * FROM `property` ORDER BY property_Id DESC";
    } else {
      $q = "SELECT * FROM `property` WHERE forRentOrSell='$forRentOrSell' ORDER BY property_Id DESC";
    }

    if (isset($_POST['propertyType'])) {
      $propertyType = $_POST['propertyType'];
      $q = "SELECT * FROM `property` WHERE forRentOrSell='$forRentOrSell' AND propertyType='$propertyType' ORDER BY property_Id DESC";
    }

    if (isset($_POST['ResidentialPropertyType'])) {
      $ResidentialPropertyType = $_POST['ResidentialPropertyType'];
      $q = "SELECT * FROM `property` WHERE forRentOrSell='$forRentOrSell' AND propertyType='$propertyType' AND propertySubType='$ResidentialPropertyType' ORDER BY property_Id DESC";
    }

    if (isset($_POST['commercialPropertyType'])) {
      $commercialPropertyType = $_POST['commercialPropertyType'];
      $q = "SELECT * FROM `property` WHERE forRentOrSell='$forRentOrSell' AND propertyType='$propertyType' AND propertySubType='$commercialPropertyType' ORDER BY property_Id DESC";
    }
  } else {
    $q = "SELECT * FROM `property` ORDER BY property_Id DESC";
  }
*/
  /*
  if (isset($_POST['forRentOrSell']) != '') {

    if (isset($_POST['propertyType']) != '') {

      if (isset($_POST['ResidentialPropertyType']) != '') {
      } else {
        $forRentOrSell = $_POST['forRentOrSell'];
        $propertyType = $_POST['propertyType'];
        $ResidentialPropertyType = $_POST['ResidentialPropertyType'];
        $q = "SELECT * FROM `property` WHERE forRentOrSell='$forRentOrSell' OR propertyType='$propertyType' OR propertySubType='$ResidentialPropertyType' ORDER BY property_Id DESC";
      }
    }
  }
*/
  /*
  if (isset($_POST['submit'])) {

    $forRentOrSell = $_POST['forRentOrSell'];
    $propertyType = $_POST['propertyType'];
    $ResidentialPropertyType = $_POST['ResidentialPropertyType'];
    $commercialPropertyType = $_POST['commercialPropertyType'];
    $rawLandPropertyType = $_POST['rawLandPropertyType'];
    $specialUsePropertyType = $_POST['specialUsePropertyType'];
    $furnished = $_POST['furnished'];
    $address = $_POST['address'];
    $price = $_POST['price'];
    $propertySize = $_POST['propertySize'];
    $bedroomNo = $_POST['bedroomNo'];
    $bathroomNo = $_POST['bathroomNo'];
    $toiletNo = $_POST['toiletNo'];
    $parkingNo = $_POST['parkingNo'];
    $streetParking = $_POST['streetParking'];
    $swimmingPool = $_POST['swimmingPool'];
    $garden = $_POST['garden'];
  }

  $q = "SELECT * FROM `property` WHERE forRentOrSell='$forRentOrSell' OR propertyType='$propertyType' OR propertySubType='$ResidentialPropertyType' ORDER BY property_Id DESC";
  $data = mysqli_query($con, $q);


*/


  /*
  if (isset($_POST['submit'])) {
    // define the list of fields
    $fields = array('forRentOrSell', 'propertyType', 'ResidentialPropertyType', 'commercialPropertyType', 'RawLandPropertyType', 'specialUsePropertyType', 'address');
    $conditions = array();

    // loop through the defined fields
    foreach ($fields as $field) {
      // if the field is set and not empty
      if (isset($_POST[$field]) && $_POST[$field] != '') {
        // create a new condition while escaping the value inputed by the user (SQL Injection)
        $conditions[] = "`$field` LIKE '%" . mysqli::real_escape_string($_POST[$field]) . "%'";
      }
    }

    // builds the query
    $query = "SELECT * FROM TABLE ";
    // if there are conditions defined
    if (count($conditions) > 0) {
      // append the conditions
      $query .= "WHERE " . implode(' AND ', $conditions); // you can change to 'OR', but I suggest to apply the filters cumulative
    }

    $result = mysqli_query($con, $query);
  }


*/
  /*
  while ($row = mysqli_fetch_assoc($data)) {

    $temp = array();
    $row['photos'] = trim($row['photos'], '/,');
    $temp   = explode(',', $row['photos']);
    $temp   = array_filter($temp);
    $images = array();
    foreach ($temp as $image) {
      $images[] = "propertyDataFiles/" . $row['photos'] . "/" . trim(str_replace(array('[', ']'), "", $image));
    }
  */

  $data = mysqli_query($con, $q);

  /*
  if (!$data) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
  }
  */
  while ($result = mysqli_fetch_array($data)) {

    $filename = $result['photos'];

    $parts = explode(',', $filename);

    $noofparts = count($parts);

  ?>
    <div class="card__collection text-center clear-fix px-xl-5 py-5">
      <div class="cards cards--two">
        <?php foreach ($parts as $image) { ?>
          <img src="propertyDataFiles/<?php echo $image; ?>" class=" img-fluid mx-auto" alt="Property image" style="object-fit: cover;">
        <?php } ?>
        <span class="cards--two__rect"></span>
        <span class="cards--two__tri"></span>
        <div class="size"><?php echo $result['size']; ?> ft<sup>2</sup></div>
        <div class="price">$ <?php echo $result['price']; ?></div>
        <a class="knowMore btn btn-primary" href="knowMore.php?id=<?php echo $result['property_Id']; ?>">KNOW MORE</a>

        <h1><?php echo $result['forRentOrSell']; ?></h1>
        <h2><?php echo $result['propertyType']; ?></h2>
        <p>
          <?php echo $result['propertySubType']; ?><br>
          <?php if ($result['propertyType'] == "Commercial" || $result['propertyType'] == "Special-use" || $result['propertyType'] == "Residential") { ?>
            Personal Parking : <?php echo $result['parkingNo']; ?><br>
          <?php } ?>
          <?php if ($result['propertyType'] == "Residential") { ?>
            Bedroom : <?php echo $result['bedroomNo']; ?><br>
          <?php } ?>
          <?php if ($result['propertyType'] == "Commercial" || $result['propertyType'] == "Special-use" || $result['propertyType'] == "Residential") { ?>
            Bathroom : <?php echo $result['bathroomNo']; ?><br>
            Toilet : <?php echo $result['toiletNo']; ?><br>
          <?php } ?>
        </p>
        <div class="info">
          Address : <?php echo $result['address']; ?><br>

        </div>

        <ul class="cards__list">
          <?php if ($result['propertyType'] == "Residential") { ?>
            <li>Furnished
              <?php if ($result['furnishedOrNot'] == "Yes") { ?>
                <img src="res/yes.png">
              <?php } else { ?>
                <img src="res/no.png">
            <?php }
            } ?>
            </li>
            <li>Street Parking
              <?php if ($result['streetParking'] == "Yes") { ?>
                <img src="res/yes.png">
              <?php } else { ?>
                <img src="res/no.png">
              <?php } ?>
            </li>
            <?php if ($result['propertyType'] == "Commercial" || $result['propertyType'] == "Special-use" || $result['propertyType'] == "Residential") { ?>
              <li>Swimming Pool
                <?php if ($result['swimmingPool'] == "Yes") { ?>
                  <img src="res/yes.png">
                <?php } else { ?>
                  <img src="res/no.png">
              <?php }
              } ?>
              </li>
              <?php if ($result['propertyType'] == "Commercial" || $result['propertyType'] == "Special-use" || $result['propertyType'] == "Residential") { ?>
                <li>Garden
                  <?php if ($result['garden'] == "Yes") { ?>
                    <img src="res/yes.png">
                  <?php } else { ?>
                    <img src="res/no.png">
                <?php }
                } ?>
                </li>
        </ul>
      </div>
    </div>
  <?php
  }
  ?>

  <div class="text-center"><a href="#top"><button class="btn btn-dark">Back to top &#8607;</button></a></div>

  <!-- Inquiry message will be sended through email from footer form -->
  <?php
  //Import PHPMailer classes into the global namespace
  //These must be at the top of your script, not inside a function
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';
  $check = 1;
  if (isset($_POST["email"])) {

    $message = $_POST['message'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobilenumber = $_POST['mobilenumber'];

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
      //Server settings
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'contect2nayan@gmail.com';                     //SMTP username
      $mail->Password   = 'Nayan424452081.';                               //SMTP password
      $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('contect2nayan@gmail.com', 'Real estate agency');
      $mail->addAddress('contect2nayan@gmail.com');     //Add a recipient
      $mail->addReplyTo($email, $name);
      $mail->addCC($email);

      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Customer Inquiry.';
      $mail->Body    = "<h3>$name have some inquiry.</h3>
                            <p>Email : $email</p> 
                            <p>Mobile Number : $mobilenumber</p>
                            <p>Query Message : $message</p>";
      $mail->AltBody = 'This is default message but there was some inquiry message';

      $mail->send();
      $check = 0;
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }
  ?>

  <!-- Site footer -->
  <footer class="site-footer px-5">
    <div>
      <div class="row">
        <div class="col-sm-12 col-md-9">
          <?php if ($check == 1) { ?>
            <h6>Send us general inquiry message.</h6>
            <form method="POST">
              <div class="row">
                <div class="col-md-6">
                  <textarea class="form-control" name="message" rows="3" cols="50" placeholder="Write An Inquiry Message here.." required></textarea><br>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-12">
                      <input class="form-control" type="text" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="col-12 py-2">
                      <div class="row">
                        <div class="col-md-6">
                          <input class="form-control" type="text" name="name" placeholder="Full Name" required>
                        </div>
                        <div class="col-md-6">
                          <input class="form-control" type="text" name="mobilenumber" placeholder="Mobile Number">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <input class="btn btn-secondary btn-sm" type="submit" name="send" value="Send Message">
            </form>
          <?php } else { ?>
            <h1> Message has been sent !</h1>
            <h2><a href="customer-panel.php">Want to browse some new properties?</a></h2>
            <p>Refresh the page to send new message. Thanks!</p>
          <?php } ?>
        </div>
        <div class="col-xs-6 col-md-3">
          <h6>Quick Links</h6>
          <ul class="footer-links">
            <li><a href="customer-panel.php">Property Search</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
            <li><a href="contactUs.php">Contact Us</a></li>
        </div>
      </div>
      <hr>
    </div>
    <div>
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by
            <a href="customer-panel.php">Real Estate Agency</a>.
          </p>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li><a class="facebook" href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
            <li><a class="twitter" href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
            <li><a class="instagram" href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a></li>
            <li><a class="linkedin" href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- 
  <div class="card__collection clear-fix">
    <div class="cards cards--one">
      <img src="https://images.unsplash.com/photo-1504703395950-b89145a5425b?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=d702cb99ca804bffcfa8820c46483264&auto=format&fit=crop&w=651&q=80" class="img-responsive" alt="Cards Image">
      <span class="cards--one__rect"></span>
      <span class="cards--one__tri"></span>
      <p>Lucy Grace</p>
      <ul class="cards__list">
        <li><i class="fab fa-facebook-f"></i></li>
        <li><i class="fab fa-twitter"></i></li>
        <li><i class="fab fa-instagram"></i></li>
        <li><i class="fab fa-linkedin-in"></i></li>
      </ul>
    </div>

    <div class="cards cards--three">
      <img src="https://images.unsplash.com/photo-1480408144303-d874c5e12201?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=575213599ae24b3dbdfd84be79425c50&auto=format&fit=crop&w=634&q=80" class="img-responsive" alt="">
      <span class="cards--three__rect-1">
        <span class="shadow-1"></span>
        <p>Chris Levnon</p>
      </span>
      <span class="cards--three__rect-2">
        <span class="shadow-2"></span>
      </span>
      <span class="cards--three__circle"></span>
      <ul class="cards--three__list">
        <li><i class="fab fa-facebook-f"></i></li>
        <li><i class="fab fa-twitter"></i></li>
        <li><i class="fab fa-linkedin-in"></i></li>
      </ul>
    </div>
  </div>
-->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
  <script type="text/javascript" src="showSelected.js"></script>
</body>

</html>