<?php
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
    <title>Products - Brand</title>
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
    <section class="page-section">
        <div class="container">
            <div class="product-item">
                <div class="d-flex product-item-title">
                    <div class="d-flex me-auto bg-faded p-5 rounded">
                        <h2 class="section-heading mb-0"><span class="section-heading-upper">COMBO 1</span><span class="section-heading-lower">Wash, Tumble Dry &amp; Fold<br></span></h2>
                    </div>
                </div><img class="img-fluid d-flex mx-auto product-item-img mb-3 mb-lg-0 rounded" src="assets/img/wash-tumbledry-fold.jpg">
                <div class="bg-faded p-5 rounded">
                    <p class="text-uppercase fw-bold mb-0"><strong>What’s it for?</strong><br></p>
                    <p class="mb-0">- Clothes (those suitable for a cool wash)<br></p>
                    <p class="mb-0">- Towels, bedding and kitchen linen not included<br></p>
                    <p class="mb-0">- Charged by the bag<br></p>
                    <p class="text-uppercase fw-bold mb-0" style="padding-top: 20px;">What’s included in the service?<br></p>
                    <p class="mb-0">- Lights and darks separated</p>
                    <p class="mb-0">- Washed at 30C</p>
                    <p class="mb-0">- Tumble dried on medium heat</p>
                    <p class="mb-0">- Folded (not ironed)<br></p>
                    <button class="btn btn-primary" type="button" style="margin-top:20px">3$/1kg</button>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section">
        <section class="page-section">
            <div class="container">
                <div class="product-item">
                    <div class="d-flex product-item-title">
                        <div class="d-flex ms-auto bg-faded p-5 rounded">
                            <h2 class="section-heading mb-0"><span class="section-heading-upper">combo 2</span><span class="section-heading-lower">Dry cleaning<br></span></h2>
                        </div>
                    </div><img class="img-fluid d-flex mx-auto product-item-img mb-3 mb-lg-0 rounded" src="assets/img/drycleaning.jpg">
                    <div class="bg-faded p-5 rounded">
                        <p class="text-uppercase fw-bold mb-0"><strong>What’s it for?</strong><br></p>
                        <p class="mb-0">-&nbsp;Clothes (dry clean only items or anything washed above 30C<br></p>
                        <p class="mb-0">-&nbsp;Towels, bedding and kitchen linen<br></p>
                        <p class="mb-0">- Charged per item<br></p>
                        <p class="text-uppercase fw-bold mb-0" style="padding-top: 20px;">What’s included in the service?<br></p>
                        <p class="mb-0">-&nbsp;Cleaned according to the care label<br></p>
                        <p class="mb-0">-&nbsp;Ironed or pressed<br></p>
                        <p class="mb-0">-&nbsp;Hung (if clothing)<br></p>
                        <p class="mb-0">-&nbsp;Folded (if towels, bedding and kitchen linen)<br></p>
                        <button class="btn btn-primary" type="button" style="margin-top:20px">2$/1kg</button>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="product-item">
                <div class="d-flex product-item-title">
                    <div class="d-flex me-auto bg-faded p-5 rounded">
                        <h2 class="section-heading mb-0"><span class="section-heading-upper">ONLY</span><span class="section-heading-lower">IRON</span></h2>
                    </div>
                </div><img class="img-fluid d-flex mx-auto product-item-img mb-3 mb-lg-0 rounded" src="assets/img/irononly.jpg">
                <div class="bg-faded p-5 rounded">
                    <p class="text-uppercase fw-bold mb-0"><strong>What’s it for?</strong><br></p>
                    <p class="mb-0">-&nbsp;Shirts and blouses<br></p>
                    <p class="mb-0">-&nbsp;Charged per item<br></p>
                    <p class="text-uppercase fw-bold mb-0" style="padding-top: 20px;">What’s included in the service?<br></p>
                    <p class="mb-0">-&nbsp;You clean<br></p>
                    <p class="mb-0">-&nbsp;We iron or press<br></p>
                    <p class="mb-0">-&nbsp;Items are hung<br></p>
                    <button class="btn btn-primary" type="button" style="margin-top:20px">1$/1kg</button>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section">
        <div class="container">
            <div class="product-item">
                <div class="d-flex product-item-title">
                    <div class="d-flex ms-auto bg-faded p-5 rounded">
                        <h2 class="section-heading mb-0"><span class="section-heading-upper">PREMIUM</span><span class="section-heading-lower">Everything included in the standard service<br></span></h2>
                    </div>
                </div><img class="img-fluid d-flex mx-auto product-item-img mb-3 mb-lg-0 rounded" src="assets/img/premium.jpg">
                <div class="bg-faded p-5 rounded">
                    <p class="text-uppercase fw-bold mb-0"><strong>What’s it for?</strong><br></p>
                    <p class="mb-0">-&nbsp;Shirts, blouses, shirts, dresses, and coats<br></p>
                    <p class="mb-0">-&nbsp;Recommended for higher value items<br></p>
                    <p class="mb-0">- Charged per item<br></p>
                    <p class="text-uppercase fw-bold mb-0" style="padding-top: 20px;">What’s included in the service?<br></p>
                    <p class="mb-0">-&nbsp;Everything included in the standard service (garment inspection to identify stains for pre-treatment, quality guarantee) plus:<br></p>
                    <p class="mb-0">-&nbsp;A senior spotter to personally handle the item for you<br></p>
                    <p class="mb-0">-&nbsp;Delicate buttons individually covered or removed</p>
                    <p class="mb-0">- Recleaning of stubborn stains</p>
                    <p class="mb-0">- All items individually wrapped in premium packagingItems hung or folded and reinforced to maintain shape and structure<br></p>
                    <button class="btn btn-primary" type="button" style="margin-top:20px">5$/1kg</button>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section cta" style="background: #b1d0e0;">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="text-center cta-inner rounded">
                        <h2 class="section-heading mb-4"><span class="section-heading-upper">Our Promise</span><span class="section-heading-lower">To You</span></h2>
                        <p class="text-start mb-0">• Well-trained staff and laundry attendants, just like family — we handle and treat your clothes, delicates, and precious better than the rest.<br>• Safe and environment friendly detergents and dry-cleaning products are used.<br>• Fast, complete and quality service. Pick-up and delivery services for free!</p>
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