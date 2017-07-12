<!DOCTYPE html>
<html lang="en">
<head>
  <title>RSO Joined!</title>
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
                <li class="active"><a href="menuPage.php">Home</a></li>
            </ul>
        </div>
    </nav>
<?php

$email = $_POST['email'];
$rsos = $_POST['rsos'];
$user_id = 0;

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

//echo($name);
//echo($rsos);
/*
		$result0 = $conn->query("SELECT username, user_id FROM users WHERE username = '$name'");
		while($row0 = mysqli_fetch_array($result0))
		{
				$user_id = $row0['user_id'];
		}
//echo "About to search by " . $user_id . ".";

		$result0 = $conn->query("SELECT name, rso_id FROM rso WHERE name = '$rsos'");
		while($row0 = mysqli_fetch_array($result0))
		{
				$rso_id = $row0['rso_id'];
		}
//echo "The rso id is: " . $rso_id . ".";

*/


//variable to determine whether the registration was successful
$eventCreated = true;

$result = $conn->query("INSERT INTO rso (name, email, admin) VALUES ('$rsos', '$email', 1)");
   if ($result) 
   {
    $errTyp = "success";
    $errMSG = "Successfully joined RSO event";
	//echo "Success!";
   } 
   else 
   {
	$eventCreated = false;
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
   }
//if the registration was not successful, make sure the user knows   
if($eventCreated==false)
{
	echo "<p><strong>Error Type:</strong> " . $errTyp . "</p>";
	echo "<p><strong>Error Message:</strong> " . $errMSG . "</p>";
}
else
{
		echo"<h1 align='center'>RSO Created Successfully</h1>";
		
		echo"<p align='center'>Click <a href='menuPage.php'>Here</a> to Return to the menu page</p>";
}


?>

</body>
</html>
