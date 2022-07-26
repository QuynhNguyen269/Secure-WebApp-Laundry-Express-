<?php

$host = '127.0.0.1';
$user = 'websecurity';
$pass = 'websecurity';
$db = 'accounts';
$mysqli = new mysqli($host, $user, $pass, $db) or die($mysqli->error);
session_start();


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Laundry</title>
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
        $_SESSION['captcharegister'] = 1;
    } else {
        $_SESSION['captcharegister'] = 0;
    }
    if (isset($_POST['register'])) {
    
        require 'submitregister.php';
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
                </ul>
                <ul class="navbar-nav">
                <?php
                if($_SESSION['logged_in'] == 1 )
                {
                    echo'<li class="nav-item"><a class="nav-link" href="profile.php"><i class="fa fa-fw fa-user"></i>&nbsp; '.$_SESSION['first_name'].'</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">LOGOUT</a></li>';
                }
                ?>
                </ul>
            </div>
        </div> 
    </nav>
    <section class="py-5 mt-5" style="background: #b1d0e0;">
        <div class="container">
        <center>
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <div class="form">         
        <?php

        if ($_SESSION['logged_in'] == 0) {
        echo '
            <div id="signup">   
            <h1>Sign Up for Free</h1>


            <form action="register.php" method="post" autocomplete="off" style="background-color: white; border-style: solid; border-color: #52bad5; border-width: 10px; max-width: 340px; max-height: inherit; border-radius: 25px">
            <center>
            <div class="top-row">
            <div class="field-wrap">
            <br>
            <label>
                First Name<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" name="firstname" />
            </div>

            <div class="field-wrap">
            <label>
                Last Name<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off" name="lastname" />
            </div>
            </div>

            <div class="field-wrap">
            <label>
            Email <span class="req">* &nbsp;&nbsp; &nbsp;</span>
            </label>
            <input type="email"required autocomplete="off" name="email" />
            </div>

            <div class="field-wrap">
            <label>
            Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="password"/>
            </div>
            <div> <br> </div>
            <div class="g-recaptcha" data-sitekey="6LclYeMfAAAAALg0u25Q3MOxCPEj89fzkkjTvWaE"></div>
            <div> <br> </div>
            <button type="submit" class="button button-block" name="register" />Register</button> <br>
            <div> <br> </div>';
        
            echo '<h5>'. $_SESSION["message"].'</h5>';
            $_SESSION["message"] = " ";
         
            echo '
            </center>
            </form>

            </div>';
        } 
        ?>
		</div>
	    </center>
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