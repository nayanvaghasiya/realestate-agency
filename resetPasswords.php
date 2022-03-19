<?php

include('config.php');

if (!isset($_GET["code"])) {
    exit("Can't find page");
}

$code = $_GET["code"];

$getEmailQuery = mysqli_query($con, " SELECT email FROM resetPasswords WHERE code = '$code' ");

if (mysqli_num_rows($getEmailQuery) == 0) {
    exit('Session expires. Go to Login Page and <a href="login-employee.php">Login</a> from here.');
}
$check = 1;

if (isset($_POST["password"])) {
    $pass = $_POST["password"];
    //$pass = md5($pass);

    $row = mysqli_fetch_array($getEmailQuery);
    $email = $row["email"];

    $q = mysqli_query($con, " UPDATE employeeregister SET password = '$pass' WHERE email = '$email' ");

    if ($q) {
        $q = $q = mysqli_query($con, " DELETE FROM resetPasswords WHERE code='$code' ");
        $check = 0;
    } else {
        exit("Something went wrong.");
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

    <title>Real estate - Password reset</title>
</head>

<body>
    <div class="container px-5 py-5">
        <form method="POST">
            <div class="card border-secondary py-5">
                <?php if ($check == 1) { ?>
                    <div class="row">
                        <div class="col px-5">
                            <label class="form-label">Choose New Password</label>
                            <input class="form-control" type="password" name="password" placeholder="New Password"><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col px-5">
                            <input class="btn btn-primary" type="submit" name="submit" value="Update Password">
                        </div>
                    </div>
                <?php }
                if ($check == 0) { ?>
                    <div class="row">
                        <div class="col px-5">
                            <h2>Password Updated Successfully. <a href="login-employee.php">Login Now!</a></h2>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </form>
    </div>
</body>

</html>