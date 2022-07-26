<?php 
if (isset($_SESSION['admin']) == true) {
    $admin_sess = $_SESSION['admin'];
    if ($admin_sess == 1)
    {
        header("location: dashboard.php");
        exit();   
    }
}
?>