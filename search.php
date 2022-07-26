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
    <title>Home - Brand</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

       
$(document).ready(function(){
    $('.search-box input[type="search"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        //alert(inputVal);
        var resultDropdown = $(this).siblings(".result");
        //alert(resultDropdown);
        //alert(inputVal.length)
        if(inputVal.length){
            $.get("submitsearch.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="search"]').val($(this).text());
        $(this).parent(".result").empty();
    });
    
});

</script>
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
    echo'<li class="nav-item"><a class="nav-link"><i class="fa fa-fw fa-user"></i>&nbsp; '.$_SESSION['first_name'].'</a></li>
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
                    <h2 class="fw-bold about-mem"><strong>Search</strong></h2>
                    <p class="w-lg-50">No matter the project, our team can handle it<br></p>
                    <div class="search-box">
                        <input type="search">
                        <div class="result"></div>
                    </div>
                </div>
            </div>            
        </div> 
    </section>
    <footer class="text-center footer text-faded py-5">
        <div class="container">
            <p class="m-0 small">Copyright&nbsp;©&nbsp;Brand 2022</p>
        </div>
    </footer><a class="navbar-brand text-uppercase d-lg-none text-expanded" href="#">Express laundry</a>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/current-day.js"></script>
</body>

</html>

