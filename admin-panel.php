<?php
session_start();

if (!isset($_SESSION['username'])) {
    include_once "login.php";
    exit;
}

include('config.php');

$username = $_SESSION['username'];

$q2 = "SELECT * FROM `admin` WHERE email='$username'";

$data2 = mysqli_query($con, $q2);

while ($result2 = mysqli_fetch_array($data2)) {
    $fname = $result2['fname'];
    $lname = $result2['lname'];
    $id = $result2['admin_Id'];
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
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand"> Welcome <?php echo $fname ?> <?php echo $lname ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <button class="btn btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            ADD NEW EMPLOYEE
                        </button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customer-panel.php"> HOME </a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <a class="nav-link" href="logout.php"> LOGOUT </a>
                </span>
            </div>
        </div>
    </nav>
    <!-- Add New Employee Form -->
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <div class="px-xl-5 py-5">
                <form action="registerEmployee.php?id=<?php echo $id ?>" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
                    <div class="col-md-12 text-right">
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" class="btn-close" style="float:right" aria-label="Close"></button>
                    </div>
                    <div class="col-md-1">
                        <label for="validationCustom01">Title</label>
                        <select class="form-select" name="title" id="title" required>
                            <option selected disabled value="">select</option>
                            <option>Mr.</option>
                            <option>Miss.</option>
                            <option>Mrs.</option>
                            <option>Ms.</option>
                            <option>Mx.</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid title.
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom01">First name</label>
                        <input type="text" name="firstName" class="form-control" id="validationCustom01" required>
                        <div class="invalid-feedback">
                            Please enter first name.
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom02">Last name</label>
                        <input type="text" name="lastName" class="form-control" id="validationCustom02" required>
                        <div class="invalid-feedback">
                            Please enter last name.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustomUsername">Mobile Number</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">+61</span>
                            <input type="text" name="mobileNumber" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Please enter valid mobile number.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03">Address</label>
                        <input type="text" name="address" class="form-control" id="validationCustom03" required>
                        <div class="invalid-feedback">
                            Please provide a valid address.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom04">State</label>
                        <select class="form-select" name="state" id="validationCustom04" required>
                            <option selected disabled value="">Choose...</option>
                            <option>Australian Capital Territory</option>
                            <option>New South Wales</option>
                            <option>Northern Territory</option>
                            <option>Queensland</option>
                            <option>South Australia</option>
                            <option>Tasmania</option>
                            <option>Victoria</option>
                            <option>Western Australia</option>
                            <option>External Territories</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid state.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom05">Zip</label>
                        <input type="text" name="zip" class="form-control" id="validationCustom05" required>
                        <div class="invalid-feedback">
                            Please provide a valid zip.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="formFile">Proof of identity</label>
                        <input class="form-control" type="file" name="image1" id="formFile1" required>
                        <div class="invalid-feedback">
                            Please provide a valid proof of identity.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="formFile">Profile picture</label>
                        <input class="form-control" type="file" name="image2" id="formFile2" required>
                        <div class="invalid-feedback">
                            Please provide a your 'head and shoulders' portrait.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                        <div class="invalid-feedback">
                            Please provide a valid email address.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                        <div class="invalid-feedback">
                            Please provide a valid password.
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="checkbox" value="Agreed to terms" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Agree to terms and conditions
                            </label>
                            <div class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Submit Details</button>
                        <input class="btn btn-primary" type="reset">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Employee sorting form -->
    <div class="px-xl-5 py-5">
        <form class="row g-2" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="searchEmployee">
            <div class="col-auto">
                <select class="form-select" name="employeeType">
                    <option value="1">Current working employees</option>
                    <option value="2">Old employees</option>
                    <option value="3">New potential candidates</option>
                </select>
            </div>
            <div class="col-auto">
                <button class="btn btn-primary" type="submit">Find</button>
            </div>
        </form>
    </div>

    <?php
    error_reporting(0);

    if (isset($_POST['employeeType'])) {
        $employeeType = $_POST['employeeType'];
    }

    switch ($employeeType) {
        case 1:
            $q = "SELECT * FROM `employeeregister`WHERE status='2' ORDER BY employee_Id DESC";
            break;
        case 2:
            $q = "SELECT * FROM `employeeregister`WHERE status='1' ORDER BY employee_Id DESC";
            break;
        case 3:
            $q = "SELECT * FROM `employeeregister`WHERE status='0' ORDER BY employee_Id DESC";
            break;
        default:
            $q = "SELECT * FROM `employeeregister`WHERE status='2' ORDER BY employee_Id DESC";
    }

    $data = mysqli_query($con, $q);

    while ($result = mysqli_fetch_array($data)) {
        $current_Id = $result['admin_Id'];
        $q3 = "SELECT * FROM `admin`WHERE admin_Id='$current_Id'";
        $data3 = mysqli_query($con, $q3);
        while ($result3 = mysqli_fetch_array($data3)) {
            $firstname = $result3['fname'];
            $lastname = $result3['lname'];
        }
    ?>
        <!-- Employee Details card -->
        <div class="card text-center px-xl-10 py-10 ">
            <div class="border border-5 border-secondary">
                <div class="card-header">
                    <h1><?php echo $result['title']; ?> <?php echo $result['firstname']; ?> <?php echo $result['lastname']; ?></h1>
                    <p>Added by <?php echo $firstname; ?> <?php echo $lastname; ?></p>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row align-items-start">
                            <div class="col">
                                <a href="<?php echo $result['image2']; ?>" target="_blank">
                                    <img src="<?php echo $result['image2']; ?>" class="rounded-pill mx-auto d-block" alt="<?php echo $result['title']; ?> <?php echo $result['firstname']; ?> <?php echo $result['lastname']; ?>" height="300px" width="300px">
                                </a>
                            </div>
                            <div class="col">
                                <div class="row align-items-start">
                                    <h4 class="text-muted"><?php echo $result['email']; ?></h4>
                                    <h4><?php echo $result['mobilenumber']; ?></h4>
                                    <h4><?php echo $result['address']; ?>, <?php echo $result['zip']; ?>, <?php echo $result['state']; ?></h4>
                                    <div class="col px-xl-1 py-1">
                                        <a href="updateEmployeeDetails.php?id=<?php echo $result['employee_Id']; ?>" class="btn btn-primary">Update current Details</a>
                                    </div>
                                    <div class="col px-xl-1 py-1">

                                        <?php
                                        if ($result['status'] == 2) {
                                        ?>
                                            <form action="fireEmployee.php" method="POST">
                                                <input type="email" id="fname" name="currentEmail" value="<?php echo $result['email']; ?>" hidden>
                                                <button class="btn btn-warning" type="submit">Fire This Employee</button>
                                            </form>
                                        <?php
                                        } elseif ($result['status'] == 1 || $result['status'] == 0) {
                                        ?>
                                            <form action="hireEmployee.php" method="POST">
                                                <input type="email" id="fname" name="currentEmail" value="<?php echo $result['email']; ?>" hidden>
                                                <button class="btn btn-success" type="submit">Hire This Employee</button>
                                            </form>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                    <div class="col px-xl-1 py-1">
                                        <a href="deleteEmployeeDetails.php?id=<?php echo $result['employee_Id']; ?>" class="btn btn-danger">Delete Permanently</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <iframe src="<?php echo $result['image1']; ?>" width="195px" height="250px"></iframe>
                                <div class="row">
                                    <a href="<?php echo $result['image1']; ?>" target="_blank">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>

    <?php
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="formValidation.js"></script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>