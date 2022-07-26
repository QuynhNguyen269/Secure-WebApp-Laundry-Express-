<?php

$host = '127.0.0.1';
$user = 'websecurity';
$pass = 'websecurity';
$db = 'accounts';
$mysqli = new mysqli($host, $user, $pass, $db) or die($mysqli->error);
session_start();


?>
<?php
    require_once "get_dashboard.php";
    connect();

    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;   // Default value is 1
    $userTotal = count_records();
    $userOnePage = 3;
    $pageTotal = ceil($userTotal / $userOnePage);
    $limit = ($current_page - 1) * $userOnePage;
    $data = get_all_record($limit, $userOnePage);
    disconnect();
?>
<!DOCTYPE html>
<html>
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Laundry</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>
<?php
    require 'permission.php';
?>
<body id="body">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Brand</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar-1">
                    <li class="nav-item"><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>&nbsp;Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="dashboard.php"><i class="fas fa-table"></i>&nbsp;Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php"><i class="far fa-user-circle"></i><span>&nbsp;Login</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php"><i class="fas fa-user-circle"></i><span>&nbsp;Register</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle-1" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-dark navbar-expand-lg py-lg-4" id="mainNav">
                    <div class="container"><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navbarResponsive"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="service.php">SERVICE</a></li>
                                <li class="nav-item"><a class="nav-link" href="events.php">event</a></li>
                                <li class="nav-item"><a class="nav-link" href="reviews.php">REVIEW</a></li>
                                <li class="nav-item"><a class="nav-link" href="contact.php">contact</a></li>
                                <li class="nav-item"><a class="nav-link" href="search.php"><i class="fas fa-search"></i></a></li>
                            </ul>
                        </div>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">Valerie Luna</span></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="profile.php"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div> 
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Customer Info</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Points</th>
                                        </tr>
                                    </thead>
                                    <tbody>  
                                    <?php foreach ($data as $user): ?>
                                        <tr>
                                        <td><?= $user['first_name']; ?></td>
                                        <td><?= $user['last_name']; ?></td>
                                        <td><?= $user['email']; ?></td>
                                        <td><?= $user['points']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>                                  
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <?php if ($current_page > 1): ?>
                                                <li class="page-item"><a aria-label="Previous" class="page-link" href="dashboard.php?page=<?= $current_page - 1; ?>"><span aria-hidden="true"><</span></a></li>
                                            <?php endif; ?>
                                            <?php for ($i = 1; $i <= $pageTotal; $i++): ?>
                                                <li class="page-item<?= ($current_page == $i) ? 'disabled' : ''; ?>">
                                                <a class="page-link" href="dashboard.php?page=<?= $i; ?>"><?= $i; ?></a>
                                                </li>
                                            <?php endfor; ?>
                                            <?php if ($current_page < $pageTotal): ?>
                                                <li class="page-item"><a aria-label="Next" class="page-link" href="dashboard.php?page=<?= $current_page + 1; ?>"><span aria-hidden="true">></span></a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Brand 2022</span></div>
                </div>
            </footer>
        </div>
        <footer class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop-1" type="button"><i class="fas fa-bars"></i></button></footer>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/current-day.js"></script>
</body>
<script language="JavaScript">
    /*
    $(<strong><em>document</em></strong>).ready(function () {
        $('body').on('click', '.pagination li a', function (e) {
            e.preventDefault();
            let url = $(this).attr('href');
            $.ajax({
                url: url,
                method: 'GET',
                dataType: 'text',
                success: function (response) {
                    $('.table').html(response);
                    
                    <strong><em>window</em></strong>.history.pushState({path:url},'',url);
                }
            });
        });
    });
    */
</script>
</html>