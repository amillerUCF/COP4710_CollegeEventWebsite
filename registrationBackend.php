<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
.space{
	height: 50px;
	}
body {
 padding-top: 0px;
 padding-bottom: 40px;
 background-color: #ffc904;
    }
</style>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">&#9776;</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
            </ul>
        </div>
    </nav>

<?php

//variables from the page being grabbed and various other variables that will be used to temporarily store data
$name = $_POST['name'];
$university = $_POST['university'];
$rsos = $_POST['rsos'];
$email = $_POST['email'];
$password = $_POST['password'];
$nid = $_POST['nid'];

/* begin session */
session_start();

$location = "UCF";

	
	/*** connect to database ***/
    /*** mysql hostname ***/
    $mysql_hostname = 'localhost';
    /*** mysql username ***/
    $mysql_username = 'root';
    /*** mysql password ***/
    $mysql_password = 'okay';
    /*** database name ***/
    $mysql_dbname = 'cop4710';
	
       // Create connection
$conn = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password, $mysql_dbname);

// Check connection
if (!$conn) 
	{
		die("Connection failed: " . mysqli_connect_error());
	}
echo "Connected successfully";

/*
echo($name);
echo($university);
echo($rsos);
echo($email);
echo($password);
echo($nid);
*/

//variable to determine whether the registration was successful
$regSuccess = true;

$result = $conn->query("INSERT INTO users (username, password, priv, firstname, lastname, email, reg_date, univ_id, rso) VALUES ('$name', '$password', 3, '$name', '$name', '$email', NOW(), 1, 1)");
   if ($result) 
   {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
	//echo "Success!";
    unset($name);
    unset($email);
    unset($password);
   } 
   else 
   {
	$regSuccess = false;
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
   }
//if the registration was not successful, make sure the user knows   
if($regSuccess==false)
{
	echo "<p><strong>Error Type:</strong> " . $errTyp . "</p>";
	echo "<p><strong>Error Message:</strong> " . $errMSG . "</p>";
}
else
{
		echo"<h1 align='center'>Registration Successful</h1>";
		
		echo"<p align='center'>Click <a href='loginPage.php'>Here</a> to Return to the login page</p>";
}

?>

</body>
