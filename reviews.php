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
            $_SESSION['captchareview'] = 1;
        } else {
            $_SESSION['captchareview'] = 0;
        }
        if (isset($_POST['review'])) {
            require 'submitreview.php';
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
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold about-mem"><strong>What People Say About Us</strong></h2>
                    <p class="w-lg-50">No matter the project, our team can handle it.<br></p>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 d-sm-flex justify-content-sm-center">
                <div class="col mb-4">
                    <div class="d-flex flex-column align-items-center align-items-sm-start">
                    <script src="https://www.google.com/recaptcha/api.js"></script>
                    <?php
                        if($_SESSION['logged_in'] == 1 )
                        {
                            echo'
                            <br> <br>
                            <center>
                            
                            <form action="reviews.php" method="post" autocomplete="off" style="background-color: white; border-style: solid; border-color: #52bad5; border-width: 8px; max-width: 350px; max-height: inherit; border-radius: 25px">
                            <div class="field-wrap">
                                <label>
                                Comment:*
                                </label><br><div style="padding-left: 15px">
                                <textarea required name="comment" style="max-width: 200px; min-height: 15px;" placeholder="Your review here." rows="2" cols="30" maxlength="950" wrap="hard"></textarea></div>
                            </div>
                            <div class="top-row">
                                <div class="field-wrap">
                                <label>
                                    ', $_SESSION['first_name'],'
                                </label>
                                <label> 
                                ', $_SESSION['last_name'],'
                                </label>
                                </div>
                            </div>

                            <div class="g-recaptcha" data-sitekey="6LclYeMfAAAAALg0u25Q3MOxCPEj89fzkkjTvWaE"></div>
                            <button type="submit" class="button button-block" name="review" />Submit</button>
                            
                            </form>';
                        }
                            
                            else
                            {
                                    echo ' <h5>In order to leave a review you must Sign-In or Create an Account.</h5>  ';  
                            }
                    ?>
                        </center>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 d-sm-flex justify-content-sm-center">
            <article class="center_article" style="width: 45%">
     <div>
       <br> <br> <br>
     <center>
      <?php 
	  	$sql = "SELECT first_name, last_name, message, date FROM reviews";
		$result = $mysqli->query($sql);

while ($row = $result->fetch_assoc()) {
	
	
	echo'<div style="background-color: white; border-style: solid; border-color: #52bad5; max-width: none ; border-radius: 25px">
		<h5> '.$row['message'].' </h5> </div>
		<div style="background-color: #52bad5; border-style: solid; border-color: #52bad5; max-width: none ; border-radius: 25px">
		<h5> By: '.$row['first_name'].' '.$row['last_name'].' on '.$row['date'].'  </h5>	</div> <br>';
	
	/*echo "<br>", $row["message"];
	echo "<br>",$row["first_name"];
    echo " ",$row["last_name"];
	echo "<br>",$row["date"];
    echo "<br>";*/
}
	  ?>
	
	</center>
</div>
	<br>
	</article>
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