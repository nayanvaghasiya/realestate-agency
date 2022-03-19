<?php

session_start();

include('config.php');

$id = $_GET['id'];

$q = " select * from employeeregister where employee_Id = '$id' ";

$result = mysqli_query($con, $q);

while ($res = mysqli_fetch_array($result)) {

    $title = $res['title'];
    $fname = $res['firstname'];
    $lname = $res['lastname'];
    $mnumber = $res['mobilenumber'];
    $add = $res['address'];
    $state = $res['state'];
    $zip = $res['zip'];
    $img1 = $res['image1'];
    $img2 = $res['image2'];
    $email = $res['email'];
}

if (isset($_POST['update'])) {

    $title = $_POST['title'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $mnumber = $_POST['mobilenumber'];
    $add = $_POST['address'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $img1 = $_FILES['image1'];
    $img2 = $_FILES['image2'];
    $email = $_POST['email'];

    $filename = $img1['name'];
    $fileerror = $img1['error'];
    $filetmp = $img1['tmp_name'];

    $fileext = explode('.', $filename);
    $filecheck = strtolower(end($fileext));

    $fileextstored = array('pdf');

    if (in_array($filecheck, $fileextstored)) {
        $destinationfile = 'employeeDataFiles/' . $filename;
        move_uploaded_file($filetmp, $destinationfile);
        $result = mysqli_query($con, $q);

        if ($destinationfile == "" && $destinationfile2 == "") {
            $q = " UPDATE employeeregister SET title='$title',firstname='$fname',lastname='$lname',mobilenumber='$mnumber',address='$add',state='$state',zip='$zip',email='$email' WHERE employee_Id=$id ";
        } elseif ($destinationfile == "") {
            $q = " UPDATE employeeregister SET title='$title',firstname='$fname',lastname='$lname',mobilenumber='$mnumber',address='$add',state='$state',zip='$zip',image2='$destinationfile2',email='$email' WHERE employee_Id=$id ";
        } elseif ($destinationfile2 == "") {
            $q = " UPDATE employeeregister SET title='$title',firstname='$fname',lastname='$lname',mobilenumber='$mnumber',address='$add',state='$state',zip='$zip',image1='$destinationfile',email='$email' WHERE employee_Id=$id ";
        } else {
            $q = " UPDATE employeeregister SET title='$title',firstname='$fname',lastname='$lname',mobilenumber='$mnumber',address='$add',state='$state',zip='$zip',image1='$destinationfile',image2='$destinationfile2',email='$email' WHERE employee_Id=$id ";
        }

        mysqli_query($con, $q);
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

        $result = mysqli_query($con, $q);

        if ($destinationfile == "" && $destinationfile2 == "") {
            $q = " UPDATE employeeregister SET title='$title',firstname='$fname',lastname='$lname',mobilenumber='$mnumber',address='$add',state='$state',zip='$zip',email='$email' WHERE employee_Id=$id ";
        } elseif ($destinationfile == "") {
            $q = " UPDATE employeeregister SET title='$title',firstname='$fname',lastname='$lname',mobilenumber='$mnumber',address='$add',state='$state',zip='$zip',image2='$destinationfile2',email='$email' WHERE employee_Id=$id ";
        } elseif ($destinationfile2 == "") {
            $q = " UPDATE employeeregister SET title='$title',firstname='$fname',lastname='$lname',mobilenumber='$mnumber',address='$add',state='$state',zip='$zip',image1='$destinationfile',email='$email' WHERE employee_Id=$id ";
        } else {
            $q = " UPDATE employeeregister SET title='$title',firstname='$fname',lastname='$lname',mobilenumber='$mnumber',address='$add',state='$state',zip='$zip',image1='$destinationfile',image2='$destinationfile2',email='$email' WHERE employee_Id=$id ";
        }

        mysqli_query($con, $q);
    }

    $result = mysqli_query($con, $q);

    if ($destinationfile == "" && $destinationfile2 == "") {
        $q = " UPDATE employeeregister SET title='$title',firstname='$fname',lastname='$lname',mobilenumber='$mnumber',address='$add',state='$state',zip='$zip',email='$email' WHERE employee_Id=$id ";
    } elseif ($destinationfile == "") {
        $q = " UPDATE employeeregister SET title='$title',firstname='$fname',lastname='$lname',mobilenumber='$mnumber',address='$add',state='$state',zip='$zip',image2='$destinationfile2',email='$email' WHERE employee_Id=$id ";
    } elseif ($destinationfile2 == "") {
        $q = " UPDATE employeeregister SET title='$title',firstname='$fname',lastname='$lname',mobilenumber='$mnumber',address='$add',state='$state',zip='$zip',image1='$destinationfile',email='$email' WHERE employee_Id=$id ";
    } else {
        $q = " UPDATE employeeregister SET title='$title',firstname='$fname',lastname='$lname',mobilenumber='$mnumber',address='$add',state='$state',zip='$zip',image1='$destinationfile',image2='$destinationfile2',email='$email' WHERE employee_Id=$id ";
    }

    mysqli_query($con, $q);

    if ($result) {
        $message = "SUCCESSFULLY UPDATED!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('location:employee-panel.php');
    } else {
        echo ("Something went wrong. <a href='employee-panel.php'> Try Again</a>");
    }
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

    <title>Real estate - Update Profile</title>
</head>

<body>
<!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand"> Welcome <?php echo $title; ?> <?php echo $fname; ?> <?php echo $lname; ?> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="employee-panel.php">Back To Home</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <a class="nav-link" href="logout.php"> LOGOUT </a>
                </span>
                <span class="navbar-text">
                    <img src="<?php echo $img2; ?>" class="rounded float-end" alt="..." style="width: 50px; height: 50px; object-fit: cover;">
                </span>
            </div>
        </div>
    </nav>
<!-- Details update form -->
    <div class="card card-body">
        <div class="px-3">
            <form action="" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
                <div class="col-md-2">
                    <label class="py-1" for="validationCustom01">Title</label>
                    <select class="form-select" name="title" id="title" required>
                        <option selected disabled value="">select</option>
                        <option value="Mr." <?php if ($title == "Mr.") echo 'selected="selected"'; ?>>Mr.</option>
                        <option value="Miss." <?php if ($title == "Miss.") echo 'selected="selected"'; ?>>Miss.</option>
                        <option value="Mrs." <?php if ($title == "Mrs.") echo 'selected="selected"'; ?>>Mrs.</option>
                        <option value="Ms." <?php if ($title == "Ms.") echo 'selected="selected"'; ?>>Ms.</option>
                        <option value="Mx." <?php if ($title == "Mx.") echo 'selected="selected"'; ?>>Mx.</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid title.
                    </div>
                </div>
                <div class="col-md-5">
                    <label class="py-1" for="validationCustom01">First name</label>
                    <input type="text" name="firstname" class="form-control" id="validationCustom01" value="<?php echo $fname ?>" required>
                    <div class="invalid-feedback">
                        Please enter first name.
                    </div>
                </div>
                <div class="col-md-5">
                    <label class="py-1" for="validationCustom02">Last name</label>
                    <input type="text" name="lastname" class="form-control" id="validationCustom02" value="<?php echo $lname ?>" required>
                    <div class="invalid-feedback">
                        Please enter last name.
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="py-1" for="validationCustom03">Address</label>
                    <input type="text" name="address" class="form-control" id="validationCustom03" value="<?php echo $add ?>" required>
                    <div class="invalid-feedback">
                        Please provide a valid address.
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="py-1" for="validationCustom04">State</label>
                    <select class="form-select" name="state" id="validationCustom04" required>
                        <option selected disabled value="">Choose...</option>
                        <option value="Australian Capital Territory" <?php if ($title == "Australian Capital Territory") echo 'selected="selected"'; ?>>Australian Capital Territory</option>
                        <option value="New South Wales" <?php if ($state == "New South Wales") echo 'selected="selected"'; ?>>New South Wales</option>
                        <option value="Northern Territory" <?php if ($state == "Northern Territory") echo 'selected="selected"'; ?>>Northern Territory</option>
                        <option value="Queensland" <?php if ($state == "Queensland") echo 'selected="selected"'; ?>>Queensland</option>
                        <option value="South Australia" <?php if ($state == "South Australia") echo 'selected="selected"'; ?>>South Australia</option>
                        <option value="Tasmania" <?php if ($state == "Tasmania") echo 'selected="selected"'; ?>>Tasmania</option>
                        <option value="Victoria" <?php if ($state == "Victoria") echo 'selected="selected"'; ?>>Victoria</option>
                        <option value="Western Australia" <?php if ($state == "Western Australia") echo 'selected="selected"'; ?>>Western Australia</option>
                        <option value="External Territories" <?php if ($state == "External Territories") echo 'selected="selected"'; ?>>External Territories</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid state.
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="py-1" for="validationCustom05">Zip</label>
                    <input type="text" name="zip" class="form-control" id="validationCustom05" value="<?php echo $zip ?>" required>
                    <div class="invalid-feedback">
                        Please provide a valid zip.
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="text-left">
                        <label class="py-1" for="formFile">Proof of identity</label>
                    </div>
                    <div class="text-left">
                        <iframe src="<?php echo $img1 ?>" width="195px" height="250px"></iframe>
                    </div>
                    <input class="form-control" type="file" name="image1" id="formFile1" required>
                    <div class="invalid-feedback">
                        Please provide a valid proof of identity.
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="text-left">
                        <label class="py-1" for="formFile">Profile picture</label>
                    </div>
                    <div class="text-left">
                        <img src="<?php echo $img2 ?>" class="rounded" alt="..." style="width: 210px; height: 250px; object-fit: cover;">
                    </div>
                    <input class="form-control" type="file" name="image2" id="formFile2" required>
                    <div class="invalid-feedback">
                        Please provide a your 'head and shoulders' portrait.
                    </div>
                </div>

                <input name="id" value="<?php echo $_GET['id']; ?>" hidden>
                <div class="col-md-6">
                    <div class="col-12">
                        <label class="py-1" for="validationCustomUsername">Mobile Number</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">+61</span>
                            <input type="text" name="mobilenumber" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" value="<?php echo $mnumber ?>" required>
                            <div class="invalid-feedback">
                                Please enter valid mobile number.
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="py-1" for="validationCustom03">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="<?php echo $email ?>" required>
                        <div class="invalid-feedback">
                            Please provide a valid email address.
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="col-12">
                        <input class="btn btn-primary" name="update" type="submit" value="Update">
                        <a class="btn btn-primary" href="employee-panel.php">Close</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>