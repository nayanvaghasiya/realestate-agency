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
    <style>
        /* to fix the position of the buttons on top while scrolling*/
        div.fix {
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            background-color: white;
        }
    </style>

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

        $currentEmployeeId = $result['employee_Id'];

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
                            <a class="nav-link" href="customer-panel.php"> HOME </a>
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

        <div class="fix px-xl-2 py-2" id="nav">
            <a class="btn btn-dark" data-bs-toggle="collapse" href="#inspectionRequest" aria-controls="inspectionRequest">INSPECTION REQUESTS </a>
            <a class="btn btn-dark" data-bs-toggle="collapse" href="#tenantlist" aria-controls="tenantlist">TENANT LIST </a>
            <a class="btn btn-dark" data-bs-toggle="collapse" href="#buyerlist" aria-controls="buyerlist">BUYER LIST </a>
            <a class="btn btn-dark" href="addNewPropertyForm.php">ADD NEW PROPERTY </a>
            <a class="btn btn-dark" href="changePropertyDetails.php">CHANGE PROPERTY DETAILS </a>
        </div>

        <?php
        /* INSPECTION REQUEST ACCESS */
        $q2 = "SELECT * FROM `inspectionrequest` ORDER BY property_Id DESC";
        $data2 = mysqli_query($con, $q2);
        ?>

        <div class="collapse" id="inspectionRequest" aria-expanded="false">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">Property Number</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Mobile Number</th>
                    </tr>
                </thead>
                <?php
                while ($result2 = mysqli_fetch_array($data2)) {
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $result2['property_Id']; ?></td>
                            <td><?php echo $result2['title']; ?> <?php echo $result2['firstname']; ?> <?php echo $result2['lastname']; ?></td>
                            <td><?php echo $result2['email']; ?></td>
                            <td><?php echo $result2['mobilenumber']; ?></td>
                        </tr>
                    </tbody>
                <?php
                }
                ?>
            </table>
        </div>

        <?php
        /* TENANT LIST ACCESS */
        $q3 = "SELECT * FROM `tenantlist` ORDER BY tenant_Id DESC";
        $data3 = mysqli_query($con, $q3);
        ?>

        <div class="collapse" id="tenantlist" aria-expanded="false">
            <table class="table table-dark table-striped">
                <a class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addNewTenantModel">ADD NEW TENANT </a>
                <thead>
                    <tr>
                        <th scope="col">Seller Agent</th>
                        <th scope="col">Property Number</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Mobile Number</th>
                        <th scope="col">Rent Agreement</th>
                        <th scope="col">Photo ID</th>
                    </tr>
                </thead>
                <?php
                while ($result3 = mysqli_fetch_array($data3)) {
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $result3['employee_Id']; ?></td>
                            <td><?php echo $result3['property_Id']; ?></td>
                            <td><?php echo $result3['title']; ?> <?php echo $result3['firstname']; ?> <?php echo $result3['lastname']; ?></td>
                            <td><?php echo $result3['email']; ?></td>
                            <td><?php echo $result3['mobilenumber']; ?></td>
                            <td><a href="<?php echo $result3['rentagreement']; ?>" target="_blank">View</a></td>
                            <td><a href="<?php echo $result3['photoid']; ?>" target="_blank">View</a></td>
                        </tr>
                    </tbody>
                <?php
                }
                ?>
            </table>
        </div>

        <div class="modal fade" id="addNewTenantModel" tabindex="-1" aria-labelledby="addNewTenantModelLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewTenantModelLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="addNewTenant.php?id=<?php echo $result['employee_Id']; ?>" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>

                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="title">Title</label>
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
                                    <div class="col-md-5">
                                        <label for="firstname">First name</label>
                                        <input type="text" name="firstname" class="form-control" id="firstname" placeholder="example. Don" required>
                                        <div class="invalid-feedback">
                                            Please enter first name.
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="lastname">Last name</label>
                                        <input type="text" name="lastname" class="form-control" id="lastname" placeholder="example. Omar" required>
                                        <div class="invalid-feedback">
                                            Please enter last name.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="mobilenumber">Mobile Number</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">+61</span>
                                            <input type="text" name="mobilenumber" class="form-control" id="mobilenumber" aria-describedby="inputGroupPrepend" placeholder="example. 0987654321" required>
                                            <div class="invalid-feedback">
                                                Please enter valid mobile number.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="example. donomar@underworld.com" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid email address.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="formFile">Proof of identity</label>
                                        <input class="form-control" type="file" name="photoid" id="photoid" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid proof of identity.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="formFile">Rent agreement</label>
                                        <input class="form-control" type="file" name="rentagreement" id="rentagreement" required>
                                        <div class="invalid-feedback">
                                            Please provide a your 'head and shoulders' portrait.
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="property_Id">Property Number</label>
                                        <input type="text" name="property_Id" class="form-control" id="property_Id" placeholder="Enter unique identification number of property" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid email address.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn  btn-dark" type="reset">
                            <input type="submit" name="submit" class="btn btn-dark">
                        </div>
                    </form>

                </div>
            </div>
        </div>


        <?php
        /* BUYER LIST ACCESS */
        $q4 = "SELECT * FROM `buyerlist` ORDER BY buyer_Id DESC";
        $data4 = mysqli_query($con, $q4);
        ?>

        <div class="collapse" id="buyerlist" aria-expanded="false">
            <table class="table table-dark table-striped">
                <a class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addNewBuyerModel">ADD NEW BUYER </a>
                <thead>
                    <tr>
                        <th scope="col">Seller Agent</th>
                        <th scope="col">Property Number</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Mobile Number</th>
                        <th scope="col">Sell Agreement</th>
                        <th scope="col">Photo ID</th>
                    </tr>
                </thead>
                <?php
                while ($result4 = mysqli_fetch_array($data4)) {
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $result4['employee_Id']; ?></td>
                            <td><?php echo $result4['property_Id']; ?></td>
                            <td><?php echo $result4['title']; ?> <?php echo $result4['firstname']; ?> <?php echo $result4['lastname']; ?></td>
                            <td><?php echo $result4['email']; ?></td>
                            <td><?php echo $result4['mobilenumber']; ?></td>
                            <td><a href="<?php echo $result4['sellagreement']; ?>" target="_blank">View</a></td>
                            <td><a href="<?php echo $result4['photoid']; ?>" target="_blank">View</a></td>
                        </tr>
                    </tbody>
                <?php
                }
                ?>
            </table>
        </div>

        <div class="modal fade" id="addNewBuyerModel" tabindex="-1" aria-labelledby="addNewBuyerModelLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewBuyerModelLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="addNewBuyer.php?id=<?php echo $result['employee_Id']; ?>" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>

                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="title">Title</label>
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
                                    <div class="col-md-5">
                                        <label for="firstname">First name</label>
                                        <input type="text" name="firstname" class="form-control" id="firstname" placeholder="example. Don" required>
                                        <div class="invalid-feedback">
                                            Please enter first name.
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="lastname">Last name</label>
                                        <input type="text" name="lastname" class="form-control" id="lastname" placeholder="example. Omar" required>
                                        <div class="invalid-feedback">
                                            Please enter last name.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="mobilenumber">Mobile Number</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">+61</span>
                                            <input type="text" name="mobilenumber" class="form-control" id="mobilenumber" aria-describedby="inputGroupPrepend" placeholder="example. 0987654321" required>
                                            <div class="invalid-feedback">
                                                Please enter valid mobile number.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="example. donomar@underworld.com" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid email address.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="formFile">Proof of identity</label>
                                        <input class="form-control" type="file" name="photoid" id="photoid" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid proof of identity.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="formFile">Sell Agreement</label>
                                        <input class="form-control" type="file" name="sellagreement" id="sellagreement" required>
                                        <div class="invalid-feedback">
                                            Please provide a your 'head and shoulders' portrait.
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="property_Id">Property Number</label>
                                        <input type="text" name="property_Id" class="form-control" id="property_Id" placeholder="Enter unique identification number of property" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid email address.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn  btn-dark" type="reset">
                            <input type="submit" name="submit" class="btn btn-dark">
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <?php
        $q5 = " SELECT * FROM buyerlist WHERE  employee_Id = '$currentEmployeeId' ";
        if ($data5 = mysqli_query($con, $q5)) {
            $buyerlistresult = mysqli_num_rows($data5);
        }

        $q6 = " SELECT * FROM tenantlist WHERE  employee_Id = '$currentEmployeeId' ";
        if ($data6 = mysqli_query($con, $q6)) {
            $rentoutlistresult = mysqli_num_rows($data6);
        }

        $q7 = " SELECT * FROM buyerlist ";
        if ($data7 = mysqli_query($con, $q7)) {
            $allbuyerlist = mysqli_num_rows($data7);
        }

        $q8 = " SELECT * FROM tenantlist ";
        if ($data8 = mysqli_query($con, $q8)) {
            $alltenantlist = mysqli_num_rows($data8);
        }

        $portfolio = $buyerlistresult + $rentoutlistresult;

        $totaldeals = $allbuyerlist + $alltenantlist;

        $successratio = $portfolio * 100 / $totaldeals;
        ?>

        <div class="px-2">
            <div class="card border-secondary">
                <div class="row align-items-center ">
                    <div class="col text-center">
                        <p><b>Total Successful Deals : </b><?php echo $portfolio ?> </p>
                        <p><b>Success Ratio : </b><?php echo number_format($successratio, 2, '.', '') ?> %</p>
                    </div>
                    <div class="col text-center">
                        <a class="btn btn-dark" href="updateProfile.php?id=<?php echo $currentEmployeeId; ?>">Update Profile</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-2 py-1">
            <div class="card border-secondary">
                <div class="row align-items-center ">
                    <div class="col-md-5 px-4 py-3">
                        <p><b>Full Name : </b><?php echo $result['title']; ?> <?php echo $result['firstname']; ?> <?php echo $result['lastname']; ?></p>
                        <p><b>Address : </b><?php echo $result['address']; ?> <?php echo $result['state']; ?> <?php echo $result['zip']; ?></p>
                        <p><b>Mobile Number : </b><?php echo $result['mobilenumber']; ?></p>
                        <p></p>
                        <p><b>Username/Email : </b><?php echo $result['email']; ?></p>
                        <p><b>Proof of identity : </b><a href="<?php echo $result['image1']; ?>" target="_blank">View</a></p>
                    </div>
                    <div class="col text-center">
                        <img src="<?php echo $result['image2']; ?>" class="rounded" alt="<?php echo $result['title']; ?> <?php echo $result['firstname']; ?> <?php echo $result['lastname']; ?>" style="width: 300px; height: 300px; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
    ?>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>