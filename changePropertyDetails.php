<?php
session_start();

if (!isset($_SESSION['usernameemployee'])) {
    include_once "login-employee.php";
    exit;
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

        <?php
        $q2 = "SELECT * FROM `property` ORDER BY property_Id DESC";

        $data2 = mysqli_query($con, $q2);
        /*
        if (!$data) {
          printf("Error: %s\n", mysqli_error($con));
          exit();
        }
        */
        while ($result2 = mysqli_fetch_array($data2)) {

            $filename = $result2['photos'];

            $parts = explode(',', $filename);

            $noofparts = count($parts);

            if (isset($_POST['delete'])) {

                $qy = " DELETE FROM property WHERE property_Id=$id ";

                mysqli_query($con, $qy);
            }
        ?>
            <div class="px-3 py-1">
                <div class="card border-secondary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-1">
                                <h4 class="card-title"><?php echo $result2['forRentOrSell']; ?></h4>
                            </div>
                            <div class="col-md-2">
                                <p class="card-text"><?php echo $result2['propertyType']; ?> : <?php echo $result2['propertySubType']; ?></p>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $result2['address']; ?></p>
                                <div class="row">
                                    <div class="col">
                                        <h5>Owner : <?php echo $result2['owner']; ?></h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <?php if ($filename == '') { ?>
                                    <div class="col">
                                        <b>No Any Photos Available</b>
                                    </div>
                                    <div class="col">

                                    </div>
                                <?php } else { ?>
                                    <div class="col">
                                        <b>View Photos</b>
                                    </div>
                                    <div class="col">
                                        <?php $i = 1;
                                        foreach ($parts as $image) { ?>
                                            <a class="btn btn-dark" href="propertyDataFiles/<?php echo $image ?>"> <?php echo $i;
                                                                                                                    $i++; ?></a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="card-text">Furnished : <?php echo $result2['furnishedOrNot']; ?></p>
                                <p class="card-text">Street Parking : <?php echo $result2['streetParking']; ?></p>
                                <p class="card-text">Swimming Pool : <?php echo $result2['swimmingPool']; ?></p>
                                <p class="card-text">Garden : <?php echo $result2['garden']; ?></p>
                            </div>
                            <div class="col">
                                <p class="card-text">Price : $<?php echo $result2['price']; ?></p>
                                <p class="card-text">Size : <?php echo $result2['size']; ?>ft<sup>2</sup></p>
                            </div>
                            <div class="col">
                                <p class="card-text">Bedroom : <?php echo $result2['bedroomNo']; ?></p>
                                <p class="card-text">Bathroom : <?php echo $result2['bathroomNo']; ?></p>
                                <p class="card-text">Toilet : <?php echo $result2['toiletNo']; ?></p>
                                <p class="card-text">Parking : <?php echo $result2['parkingNo']; ?></p>
                            </div>
                            <div class="col text-center d-grid gap-2">
                                <?php if ($result2['inspectionavailability'] == '0') { ?>
                                    <a id="demo" href="inspectionAvailability.php?id=<?php echo $result2['property_Id']; ?>" class="btn btn-dark btn-sm" onclick="return confirm('Are you sure you want to make this property Available for customers to inspect?')">Make Available For Inspection</a>
                                <?php } else { ?>
                                    <a id="demo" href="inspectionUnavailability.php?id=<?php echo $result2['property_Id']; ?>" class="btn btn-dark btn-sm" onclick="return confirm('Are you sure you want to make this property Unavailable for customers to inspect?')">Make Unavailable For Inspection</a>
                                <?php } ?>
                                <a href="updatePropertyDetailsForm.php?id=<?php echo $result2['property_Id']; ?>" class="btn btn-dark btn-sm">Update Property Details</a>
                                <a href="deletePropertyDetails.php?id=<?php echo $result2['property_Id']; ?>" class="btn btn-dark btn-sm" onclick="return confirm('Are you sure you want to DELETE this property PERMANENTLY from the database?')">Delete Property Permanently</a>
                            </div>
                        </div>
                        <div class="row">
                            <p class="card-text">Special things : <?php echo $result2['other']; ?></p>
                        </div>
                    </div>
                </div>
            </div>


        <?php
        }
        ?>
    <?php
    }
    ?>

</body>

</html>