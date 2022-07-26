<?php

$host = '127.0.0.1';
$user = 'websecurity';
$pass = 'websecurity';
$db = 'accounts';
$mysqli = new mysqli($host, $user, $pass, $db) or die($mysqli->error);
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
    <title>Home - Brand</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>
<?php
    require 'redirect_profile.php';
?>
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
            $_SESSION['captchaprofile'] = 1;
        } else {
            $_SESSION['captchaprofile'] = 0;
        }
        if (isset($_POST['profile'])) {
            require 'submitprofile.php';
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
    <section class="py-5 mt-5" style="background: #b1d0e0;">
        <div class="container">
        <center>
        <script src="https://www.google.com/recaptcha/api.js"></script>
               
        <?php

        if ($_SESSION['logged_in'] == 1) {
            
            $cur_email = $_SESSION['email'];

            $cur_email = trim($cur_email);

            $cur_email = $mysqli->real_escape_string($cur_email);
            $cur_email = addslashes($cur_email);
            $cur_email = htmlspecialchars($cur_email);

            $cur_first_name = "a";
            $cur_last_name = "a";
            $cur_point = 0;

            $sql = "SELECT first_name, last_name, email FROM users WHERE email='$cur_email'";
            $result = $mysqli->query($sql);
            while($row = $result->fetch_assoc())
            {
                $cur_first_name=$row['first_name']; 
                $cur_last_name=$row['last_name'];  
                $cur_point=$row['point'];  
                #echo $cur_first_name. ' ' . $cur_last_name;  
            }
            if ($cur_point == NULL)
            {
                $cur_point = 0;
            }
            echo '
            <form action="profile.php" method="post" id="contactForm" name="contactForm" novalidate="novalidate">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3"><input class="form-control" type="text" id="first_name" name="firstname" value="'.$cur_first_name.'" required autocomplete="off"><small class="form-text text-danger flex-grow-1 help-block lead"></small></div>
                    <div class="form-group mb-3"><input class="form-control" type="text" id="last_name" name="lastname" value="'.$cur_last_name.'" required autocomplete="off"><small class="form-text text-danger help-block lead"></small></div>
                    <div class="form-group mb-3"><input class="form-control" type="email" value="'.$cur_email.'" required autocomplete="off" name="email"><small class="form-text text-danger help-block lead"></small></div>
                    <div class="form-group mb-3"><input class="form-control" type="text" id="last_name" name="point" value="'.$cur_point.'" required autocomplete="off"><small class="form-text text-danger help-block lead"></small></div>
                </div>
                <div class="w-100"></div>
                <div class="g-recaptcha" data-sitekey="6LclYeMfAAAAALg0u25Q3MOxCPEj89fzkkjTvWaE"></div>
                <div> <br></div>
                <div class="col-lg-12 text-center">
                    <div id="success"></div><button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit" name="profile">Update profile</button>
                </div>
            </div>
            </form>';
            echo '<br>';
            echo '<h5>'.$_SESSION["message"].'</h5>';
            $_SESSION["message"] = " ";
        }
        else
        {
            echo ' <h5>Flag{_H3ll0_w0rld_}</h5>  ';
        } 
        ?>
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