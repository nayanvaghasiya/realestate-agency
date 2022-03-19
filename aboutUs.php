<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="testimonials.css">
    <link rel="stylesheet" type="text/css" href="aboutUsStyle.css">
    <link rel="stylesheet" type="text/css" href="footer.css">


    <title>Real estate - About Us</title>
</head>

<body>
    <div class="top-about-section">
        <div class="link">
            <a href="customer-panel.php">Home</a>
            <a href="contactUs.php">Contact Us</a>
        </div>
        <div class="about-section">
            <h1>About Us</h1>
            <h4>We are leading Real estate agency in the Australia.</h4>
            <h4>Looking for property to buy/sell of rent? You have come to the right place, We have plenty of options to choose from with the reasonable price.</h4>
        </div>
    </div>

    <h2 class="py-3" style="text-align:center">Our Team</h2>
    <div class="row px-5">
        <div class="column">
            <div class="card">
                <img src="res/ceo.jpg" alt="Jane" style="width: 100%; height: 500px; object-fit: cover;">
                <div class="container">
                    <h2>Jane Doe</h2>
                    <p class="title">CEO & Founder</p>
                    <p>The team at agency are proactive, experienced and professional in all aspect of real estate.</p>
                    <p>jane@realestateagency.com</p>
                    <p class="d-grid gap-2"><a class="btn btn-primary" href="mailto:jane@realestateagency.com">Contact</a></p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="res/director.jpg" alt="Mike" style="width: 100%; height: 500px; object-fit: cover;">
                <div class="container">
                    <h2>Mike Ross</h2>
                    <p class="title">Director/Licensed Estate Agent</p>
                    <p>I pride myself on creating great working relationships with people.</p>
                    <p>mike@realestateagency.com</p>
                    <p class="d-grid gap-2"><a class="btn btn-primary" href="mailto:mike@realestateagency.com">Contact</a></p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="res/officemanager.jpg" alt="John" style="width: 100%; height: 500px; object-fit: cover;">
                <div class="container">
                    <h2>Mia Khalifa</h2>
                    <p class="title">Office manager</p>
                    <p>Our quality customer relationships have been earned not won.</p>
                    <p>mia@realestateagency.com</p>
                    <p class="d-grid gap-2"><a class="btn btn-primary" href="mailto:mia@realestateagency.com">Contact</a></p>
                </div>
            </div>
        </div>
    </div>


    <h2 class="py-3" style="text-align:center">Testimonials</h2>
    <div>
        <div class="container">
            <img src="res/t1.jpg" alt="Avatar" style="width: 90px; height: 90px; object-fit: cover;">
            <p><span>Chrisy Fox.</span> CEO at Mighty Schools.</p>
            <p>Found the best place for my company's office at reasonable rate. I really recommend for buying or renting commercial properties for your any kind of business.</p>
        </div>
        <p></p>
        <div class="container">
            <img src="res/t2.jpg" alt="Avatar" style="width: 90px; height: 90px; object-fit: cover;">
            <p><span>Rebecca Flex.</span> owner of wine shope.</p>
            <p>I cannot thank enough to Mia or Real estate agency for making house buying so easy for me. They are supportive and surly the do have knowledge of their field.</p>
        </div>
        <p></p>
        <div class="container">
            <img src="res/t3.jpg" alt="Avatar" style="width: 90px; height: 90px; object-fit: cover;">
            <p><span>Rachel Green.</span> Founder of Grout community.</p>
            <p>Best price in and service in the entire Victoria.</p>
        </div>
    </div>
    <p></p>

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
</body>

</html>