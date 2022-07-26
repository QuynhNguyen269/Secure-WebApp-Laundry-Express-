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
    <title>Laundry</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

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
                        <h2 class="section-heading mb-5"><span class="section-heading-upper">Come On In</span><span class="section-heading-lower">We're Discount</span></h2>
                        <ul class="list-unstyled text-start mx-auto list-hours mb-5">
                            <li class="d-flex list-unstyled-item list-hours-item">Sunday<span class="ms-auto">No</span></li>
                            <li class="d-flex list-unstyled-item list-hours-item">Monday&nbsp;<br><em>7:00 to 11:00</em><span class="ms-auto">Discount 30%</span></li>
                            <li class="d-flex list-unstyled-item list-hours-item">Tuesday&nbsp;<br><em>7:00 to 8:00</em><span class="ms-auto">Discount 30%</span></li>
                            <li class="d-flex list-unstyled-item list-hours-item">Wednesday<br><span class="ms-auto">Discount 05%</span></li>
                            <li class="d-flex list-unstyled-item list-hours-item">Thursday&nbsp;<br><em>7:00 to 8:00</em><br><span class="ms-auto">Discount 10%</span></li>
                            <li class="d-flex list-unstyled-item list-hours-item">Friday&nbsp;<br><em>7:00 to 8:00</em><br><span class="ms-auto">Discount 20%</span></li>
                            <li class="d-flex list-unstyled-item list-hours-item">Saturday&nbsp;<br><em>7:00 to 8:00</em><br><span class="ms-auto">Discount 05%</span></li>
                        </ul>
                        <p class="address mb-5"><em><strong>Ký túc xá khu B - ĐHQG TP.HCM</strong><span><br>Đông Hòa, Dĩ An, Bình Dương<br></span></em></p>
                        <p class="address mb-0"><small><em>Call Anytime</em></small><span><br><em>020 4538 8548</em><br><br></span></p>
                    </div>
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