<?php 
if (isset($_SESSION['admin']) == true) {
    $permission = $_SESSION['admin'];
    if ($permission == 0) {     // Not admin
        //echo $permission;
        echo "<br><br><h3>Permission denied!!!</h3><br>";
        echo "<a href='index.php'> Click here to return home page!!!</a>";
        exit();
    }
}
else
{
    echo "<br><br><h3>Permission denied!!!</h3><br>";
    echo "<a href='index.php'> Click here to return home page!!!</a>";
    exit();
}
?>