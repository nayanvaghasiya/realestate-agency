<?php

// on login screen, redirect to dashboard if already logged in
if (isset($_SESSION['username'])) {
  header('location:admin-panel.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Real estate - admin panel</title>
</head>

<body>

  <form action="validation.php" method="POST" class="px-xl-5 py-5">
    <div class="mb-3 col-sm-6">
      <label for="exampleDropdownFormEmail1" class="form-label">Email address</label>
      <input type="email" name="user" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
    </div>
    <div class="mb-3 col-sm-6">
      <label for="exampleDropdownFormPassword1" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
    </div>
    <div class="mb-3">
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="dropdownCheck">
        <label class="form-check-label" for="dropdownCheck">
          Remember me
        </label>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">LOGIN</button>
  </form>
  <div class="dropdown-divider col-sm-6"></div>
  <a class="dropdown-item px-xl-5 py-3" href="RequestResetAdmin.php">Forgot password?</a>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>