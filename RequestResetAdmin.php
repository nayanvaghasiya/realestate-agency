<?php

include('config.php');

if (mysqli_connect_errno()) {
    echo "Failed to connect:" . mysqli_connect_errno();
}
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST["email"])) {

    $emailTo = $_POST["email"];

    $code = uniqid(true);

    $q = mysqli_query($con, " INSERT INTO resetPasswords(code, email) VALUES('$code', '$emailTo') ");

    if (!$q) {
        exit('Error');
    }

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
        $mail->addAddress($emailTo);     //Add a recipient
        $mail->addReplyTo('no-reply@realestateagency.com.au', 'No-reply');

        //Content
        $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetPasswordsAdmin.php?code=$code";
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Password reset link from Real estate agency.';
        $mail->Body    = "<h3>You have requested the password reset link for the Real Estate Agency.</h3>\n
                            Click this<a href='$url'> verify email link</a> to reset your password.";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Reset password link has been sent to your email. open your email account and click on verify email link.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    exit();
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
                <div class="row">
                    <div class="col px-5">
                        <label class="form-label">Enter your registered email</label>
                        <input class="form-control" type="text" name="email" placeholder="Enter email address"><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col px-5">
                        <input class="btn btn-primary" type="submit" name="submit" value="Send Email">
                    </div>
                </div>
            </div>
    </form>
    </div>
</body>

</html>