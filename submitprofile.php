<?php
/* Connect to Database */
if($_SESSION['captchaprofile'] ==1)
{
	$profile = 1;
}
else 
{
	$profile = 0;
} 

$host = '127.0.0.1';
$user = 'websecurity';
$pass = 'websecurity';
$db = 'accounts';
$mysqli = new mysqli($host, $user, $pass, $db) or die($mysqli->error);

$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$email = $_POST['email'];

$old_email = $_SESSION['email'];

$first_name = trim($first_name);
$last_name = trim($last_name);
$email = trim($email);
$old_email = trim($old_email);


$first_name = $mysqli->real_escape_string($first_name);
$first_name = addslashes($first_name);
$first_name = htmlspecialchars($first_name);

$last_name = $mysqli->real_escape_string($last_name);
$last_name = addslashes($last_name);
$last_name = htmlspecialchars($last_name);

$email = $mysqli->real_escape_string($email);
$email = addslashes($email);
$email = htmlspecialchars($email);

$old_email = $mysqli->real_escape_string($old_email);
$old_email = addslashes($old_email);
$old_email = htmlspecialchars($old_email);

$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
if ( $result->num_rows != 0 &&  $old_email != $email)
{ // User already exist
    $_SESSION["message"] = "Failed to updated, please try again!";
    header("location: profile.php");
}
else
{
	if($profile == 1)
	{
    	$sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email' WHERE email='$old_email'";

		// Add user to the database
		if ( $mysqli->query($sql) == TRUE ){
			$_SESSION['first_name'] = $first_name;
			$_SESSION['last_name'] = $lastname;
			$_SESSION['email'] = $email;
			echo "Suceessful entry";
			header("location: profile.php");
		}
		else 
		{
			echo "Error" . $sql . "<br>". $conn->error;
		}
	} 
	else
	{
		$_SESSION["message"] = "Failed to update, please try again.";
		header("location: profile.php");
	}
}
$conn->close();
?>