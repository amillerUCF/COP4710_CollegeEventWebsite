<!DOCTYPE html>
<html lang="en">
<head>
  <title>University Added</title>
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
$name = $_POST['name'];
$num_students = $_POST['num_students'];
$location = $_POST['location'];
$description = $_POST['description'];


/* begin session */
session_start();

	
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
echo"The number of students is " .$num_students . ".";
echo"The name is : " .$name . ".";
echo"The description is " . $description . ".";
echo"The location is : " . $location . ".";
*/


//variable to determine whether the registration was successful
$schoolCreated = true;

$result = $conn->query("INSERT INTO universities (name, location, description, num_students, pictures) VALUES('$name', '$location', '$description', '$num_students', null)");
   if ($result) 
   {
    $errTyp = "success";
    $errMSG = "Successfully created event";
	//echo "Success!";
   } 
   else 
   {
	$schoolCreated = false;
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
   }
//if the registration was not successful, make sure the user knows   
if($schoolCreated==false)
{
	echo "<p><strong>Error Type:</strong> " . $errTyp . "</p>";
	echo "<p><strong>Error Message:</strong> " . $errMSG . "</p>";
}
else
{
		echo"<h1 align='center'>School Added Successfully</h1>";
		
		echo"<p align='center'>Click <a href='menuPage.php'>Here</a> to Return to the menu page</p>";
}



?>

</body>
</html>
