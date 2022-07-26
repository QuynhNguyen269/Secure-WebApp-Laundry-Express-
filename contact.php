<?php
//session_start();
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] == 1) {   
	session_start();
}

else {
	$_SESSION['logged_in'] == 0;
	session_start();
}
		
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Store - Brand</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $g_resp = $_POST['g-recaptcha-response'];

        $secret = "6LclYeMfAAAAAOMzViliB9ydm2noeoeb-n-oXZi8";

        $url = 'https://www.google.com/recaptcha/api/siteverify?secret='
            . $secret . '&response=' . $g_resp;

        // Making request to verify captcha
        $response = file_get_contents($url);

        // Response return by google is in
        // JSON format, so we have to parse
        // that json
        $response = json_decode($response);

        if ($response->success == 1) {
            $_SESSION['captchacontact'] = 1;
        } else {
            $_SESSION['captchacontact'] = 0;
        }
        if (isset($_POST['contacts'])) {

            require 'submitcontact.php';
        }
    }
?>
<body id="body">
    <h1 class="text-center text-white d-none d-lg-block site-heading"><span class="site-heading-upper mb-3">bees</span><span class="site-heading-lower">laundry services</span></h1>
    <nav class="navbar navbar-dark navbar-expand-lg py-lg-4" id="mainNav">
        <div class="container"><a class="navbar-brand text-uppercase d-lg-none text-expanded" href="#">Express laundry</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navbarResponsive"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="service.php">SERVICE</a></li>
                    <li class="nav-item"><a class="nav-link" href="events.php">event</a></li>
                    <li class="nav-item"><a class="nav-link" href="reviews.php">REVIEW</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="search.php"><i class="fas fa-search"></i></a></li>
                </ul>
                <ul class="navbar-nav">
                <?php

                if($_SESSION['logged_in'] == 1 )
                {
                    echo'<li class="nav-item"><a class="nav-link" href="profile.php"><i class="fa fa-fw fa-user"></i>&nbsp; '.$_SESSION['first_name'].'</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">LOGOUT</a></li>';
                }
                else
                {
                    echo'
                    <li class="nav-item"><a class="nav-link" href="login.php">LOGIN</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">REGISTER</a></li>
                    ';
                }
                ?>
                </ul>
            </div>
        </div>
    </nav> 
    <section class="page-section cta">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="text-center cta-inner rounded">
                        <h2 class="section-heading mb-5"><span class="section-heading-lower">We're Open</span></h2>
                        <ul class="list-unstyled text-start mx-auto list-hours mb-5">
                            <li class="d-flex list-unstyled-item list-hours-item"><strong>Customer Care Hours</strong><br><span class="ms-auto"><br></span></li>
                            <li class="d-flex list-unstyled-item list-hours-item">Phone<br><span class="ms-auto">020 4538 8548<br></span></li>
                            <li class="d-flex list-unstyled-item list-hours-item">Sunday – Friday<br><span class="ms-auto">7:00 to 20:00</span></li>
                            <li class="d-flex list-unstyled-item list-hours-item">Saturday<br><span class="ms-auto">Closed<br></span></li>
                            <li class="d-flex list-unstyled-item list-hours-item">Email<span class="ms-auto">customercare@exprlaundry.com</span></li>
                            <li class="d-flex list-unstyled-item list-hours-item">Live Chat<span class="ms-auto">08:00 – 22:00 Monday-Friday<br></span></li>
                        </ul>
                        <p class="address mb-5"><em><strong>Ký túc xá khu B - ĐHQG TP.HCM</strong><span><br>Đông Hòa, Dĩ An, Bình Dương<br></span></em></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <section id="contact" class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center" style="color: #ffffff;">
                    <h2 class="section-heading mb-5"><span class="section-heading-lower">contact</span><span class="section-heading-upper">Question about your order? We’re here to help<br></span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="contact.php" method="post" id="contactForm" name="contactForm" novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3"><input class="form-control" type="text" id="first_name" name="firstname" placeholder="Your First Name *" required autocomplete="off"><small class="form-text text-danger flex-grow-1 help-block lead"></small></div>
                                <div class="form-group mb-3"><input class="form-control" type="text" id="last_name" name="lastname" placeholder="Your Last Name *" required autocomplete="off"><small class="form-text text-danger help-block lead"></small></div>
                                <div class="form-group mb-3"><input class="form-control" type="email" placeholder="Your Email *" required autocomplete="off" name="email"><small class="form-text text-danger help-block lead"></small></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3"><textarea class="form-control" required name="comment" id="message" placeholder="Your Message *" required=""></textarea><small class="form-text text-danger help-block lead"></small></div>
                            </div>
                            <div class="w-100"></div><div> <br> </div>
                            <div class="g-recaptcha" data-sitekey="6LclYeMfAAAAALg0u25Q3MOxCPEj89fzkkjTvWaE"></div>
                            <div> <br><br> </div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div><button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit" name="contacts">Send Message</button>
                            </div>
                        </div>
                    </form>
                    <?php			 
				        echo '<h5> '.$_SESSION["message"].' </h5>';
			 		      $_SESSION["message"] =" ";
		            ?> 
                    <br> <br>
                </div>
            </div>
        </div>
    </section>
    <footer class="text-center footer text-faded py-5">
        <div class="container">
            <p class="m-0 small">Copyright&nbsp;©&nbsp;Brand 2022</p>
        </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/current-day.js"></script>
</body> 

</html>