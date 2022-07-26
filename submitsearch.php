<?php 
$host = '127.0.0.1';
$user = 'websecurity';
$pass = 'websecurity';
$db = 'accounts';
$mysqli = new mysqli($host, $user, $pass, $db) or die($mysqli->error);

if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT * FROM accounts.service WHERE name LIKE ?";
     
    if($stmt = mysqli_prepare($mysqli, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Set parameters
        $param_term = '%' . $_REQUEST["term"] . '%';
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<br><h4>" . $row["name"] . " : ".$row["price"] ."$</h4>";
                }
            } else{
                echo "<br><h5>No services found</h5>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
        }
    
    }
        // Close statement
        mysqli_stmt_close($stmt);
}
    // close connection
mysqli_close($mysqli);
?> 