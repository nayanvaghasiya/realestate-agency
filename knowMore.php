<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="customerStyle.css">

    <title>Real estate - customers panel</title>
</head>

<body>

    <?php
    error_reporting(0);
    session_start();

    include('config.php');

    $id = $_GET['id'];

    $q = " select * from property where property_Id = '$id' ";

    $query = mysqli_query($con, $q);

    while ($result = mysqli_fetch_array($query)) {

        $propertyaddress = $result['address'];
        $propertytype = $result['propertyType'];
        $propertysubtype = $result['propertySubType'];
        $filename = $result['photos'];

        $parts = explode(',', $filename);

        $noofparts = count($parts);
    ?>
        <div id="container">
            <div id="navi">
                <div class="btngroup">
                    <div class="row align-items-center">
                        <div class="col"> </div>
                        <div class="col"> </div>
                        <div class="col">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Make an inspection request
                            </button>
                        </div>
                        <div class="col">
                            <a class="btn btn-primary" href="customer-panel.php">
                                Back to property search
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="infoi">
                <?php if ($result['forRentOrSell'] == "Sell") { ?>
                    <img src="res/sell.png" width="300px" height="300px">
                <?php } else { ?>
                    <img src="res/rent.png" width="300px" height="300px">
                <?php } ?>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apply here for an inspection.</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-12">
                                <select class="form-select" name="title" id="title" required>
                                    <option selected disabled value="">Title</option>
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
                            <p></p>
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="First name" name="firstname" aria-label="First name">
                                <div class="invalid-feedback">
                                    Please enter first name.
                                </div>
                            </div>
                            <p></p>
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="Last name" name="lastname" aria-label="Last name" required>
                                <div class="invalid-feedback">
                                    Please enter last name.
                                </div>
                            </div>
                            <p></p>
                            <div class="col-12">
                                <input type="email" class="form-control" placeholder="Email Address" name="email" aria-label="Email Address" required>
                                <div class="invalid-feedback">
                                    Please enter valid email address.
                                </div>
                            </div>
                            <p></p>
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="Mobile Number" name="mobilenumber" aria-label="Mobile Number" required>
                                <div class="invalid-feedback">
                                    Please enter valid mobile number.
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btn-primary" type="reset">
                            <input class="btn btn-primary" type="submit" value="Apply" name="submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="px-xl-5 py-5">
            <div class="container">
                <div class="row align-items-start">
                    <div class="col">
                        <br><br><br><br><br><br>
                        <div class="row align-items-center">
                            <h2><img src="res/size.png" width="60px" height="60px"> <?php echo $result['size']; ?> ft<sup>2</sup></h2>
                        </div>
                        <br>
                        <div class="row align-items-center">
                            <h2><img src="res/price.png" width="60px" height="60px"> <?php echo $result['price']; ?> AUS</h2>
                        </div>
                        <br>
                        <div class="row align-items-center">
                            <?php if ($result['propertyType'] == "Commercial" || $result['propertyType'] == "Special-use" || $result['propertyType'] == "Residential") { ?>
                                <h2><img src="res/parkingno.png" width="60px" height="60px"> Personal Parking : <?php echo $result['parkingNo']; ?></h2>
                            <?php } ?>
                        </div>
                        <br>
                        <div class="row align-items-center">
                            <?php if ($result['propertyType'] == "Residential") { ?>
                                <h2><img src="res/bedroom.png" width="60px" height="60px"> Bedroom : <?php echo $result['bedroomNo']; ?></h2>
                            <?php } ?>
                        </div>
                        <br>
                        <div class="row align-items-center">
                            <?php if ($result['propertyType'] == "Commercial" || $result['propertyType'] == "Special-use" || $result['propertyType'] == "Residential") { ?>
                                <h2><img src="res/bathroom.png" width="60px" height="60px"> Bathroom : <?php echo $result['bathroomNo']; ?></h2>
                            <?php } ?>
                        </div>
                        <br>
                        <div class="row align-items-center">
                            <?php if ($result['propertyType'] == "Commercial" || $result['propertyType'] == "Special-use" || $result['propertyType'] == "Residential") { ?>
                                <h2><img src="res/toilet.png" width="60px" height="60px"> Toilet : <?php echo $result['toiletNo']; ?></h2>
                            <?php } ?>
                        </div>
                        <br>
                        <div class="row align-items-center">
                            <?php if ($result['propertyType'] == "Residential") { ?>
                                <h2><img src="res/furnished.png" width="60px" height="60px"> Furnished :
                                    <?php if ($result['furnishedOrNot'] == "Yes") { ?>
                                        <img src="res/yes.png" width="35px" height="35px">
                                    <?php } else { ?>
                                        <img src="res/no.png" width="35px" height="35px">
                                    <?php } ?>
                                </h2>
                            <?php } ?>
                        </div>
                        <br>
                        <div class="row align-items-center">
                            <h2><img src="res/streetparking.png" width="60px" height="60px"> Street Parking :
                                <?php if ($result['streetParking'] == "Yes") { ?>
                                    <img src="res/yes.png" width="35px" height="35px">
                                <?php } else { ?>
                                    <img src="res/no.png" width="35px" height="35px">
                                <?php } ?>
                            </h2>
                        </div>
                        <br>
                        <div class="row align-items-center">
                            <?php if ($result['propertyType'] == "Commercial" || $result['propertyType'] == "Special-use" || $result['propertyType'] == "Residential") { ?>
                                <h2><img src="res/swimming-pool.png" width="60px" height="60px"> Swimming Pool :
                                    <?php if ($result['swimmingPool'] == "Yes") { ?>
                                        <img src="res/yes.png" width="35px" height="35px">
                                    <?php } else { ?>
                                        <img src="res/no.png" width="35px" height="35px">
                                    <?php } ?>
                                </h2>
                            <?php } ?>
                        </div>
                        <br>
                        <div class="row align-items-center">
                            <?php if ($result['propertyType'] == "Commercial" || $result['propertyType'] == "Special-use" || $result['propertyType'] == "Residential") { ?>
                                <h2><img src="res/garden.png" width="60px" height="60px"> Garden :
                                    <?php if ($result['garden'] == "Yes") { ?>
                                        <img src="res/yes.png" width="35px" height="35px">
                                    <?php } else { ?>
                                        <img src="res/no.png" width="35px" height="35px">
                                    <?php } ?>
                                </h2>
                            <?php } ?>
                        </div>
                        <br>
                        <div class="row align-items-center">
                            <h2><img src="res/address.png" width="60px" height="60px"> <?php echo $result['address']; ?></h2>
                        </div>
                        <br>
                        <div class="row align-items-center">
                            <h2><img src="res/other.png" width="60px" height="60px"> <?php echo $result['other']; ?></h2>
                        </div>
                    </div>

                    <div class="col">
                        <div class="row align-items-center">
                            <h2><?php if ($result['propertyType'] == "Residential") { ?>
                                    <img src="res/residencial.png" width="60px" height="60px">
                                <?php } elseif ($result['propertyType'] == "Commercial") { ?>
                                    <img src="res/commercial.png" width="60px" height="60px">
                                <?php } elseif ($result['propertyType'] == "Raw-land") { ?>
                                    <img src="res/raw-land.png" width="60px" height="60px">
                                <?php } else { ?>
                                    <img src="res/special-use.png" width="60px" height="60px">
                                <?php }
                                echo $result['propertyType']; ?>
                            </h2>
                        </div>
                        <br>
                        <div class="row align-items-center">
                            <h2><img src="res/propertysubtype.png" width="60px" height="60px"> <?php echo $result['propertySubType']; ?></h2>
                        </div>
                        <br>
                        <div class="row align-items-center">
                            <?php foreach ($parts as $image) { ?>
                                <img src="propertyDataFiles/<?php echo $image; ?>" alt="Property image">
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>

    <?php

    $title = $_POST['title'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $mobilenumber = $_POST['mobilenumber'];

    $q = " SELECT * FROM 'inspectionrequest' WHERE email = '$email' && mobilenumber = '$mobilenumber' && property_Id = '$id' ";

    $result = mysqli_query($con, $q);

    $num = mysqli_num_rows($result);

    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    if ($num == 1) {
        echo "duplicate value";
    } else {

        if (isset($_POST['submit'])) {
            $qy = " INSERT INTO `inspectionrequest`(`property_Id`, `title`, `firstname`, `lastname`, `email`, `mobilenumber`) VALUES ('$id','$title','$firstname','$lastname','$email','$mobilenumber') ";

            mysqli_query($con, $qy);

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
                $mail->addReplyTo($email, $firstname);
                $mail->addCC('nayanv5637@gmail.com');

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Inspection Request Conformation';
                $mail->Body    = "<h3>$title $firstname $lastname your appointment has been CONFIRMED.</h3>
                            
                            <p>Our best executive will be on property to assist you.</p>
                            <p>You have applied for $propertytype - $propertysubtype</p>
                            <p>Property address : $propertyaddress</p>
                            <p>Regards, Real Estate Agency</p>";
                $mail->AltBody = 'This is default message but there was some inquiry message';

                $mail->send();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>