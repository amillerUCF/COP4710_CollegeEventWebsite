<!DOCTYPE html>
<html lang="en">
<head>
  <title>Event Created</title>
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

/* begin session */
session_start();

$category = $_SESSION['category'];
$title = $_SESSION['title'];
$description = $_SESSION['description'];
$date = $_SESSION['date'];
$phone = $_SESSION['phone'];
$email = $_SESSION['email'];
$rsos = $_SESSION['rsos'];
$execution = true;

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

$result0 = $conn->query("SELECT name, rso_id FROM rso WHERE name = '$rsos'");
while($row0 = mysqli_fetch_array($result0))
	{
				$rso_id = $row0['rso_id'];
	}
//echo "The rso id is: " . $rso_id . ".";
$sql="SELECT * FROM In_RSO WHERE rso_id = '$rso_id'";

if ($result=mysqli_query($conn,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  //echo"Result set has : " . $rowcount . " members.";
  // Free result set
  mysqli_free_result($result);
  
	if($rowcount<6)
	{
		$execution = false;
		echo"<h3 align='center'>Your club is currently inactive. Once 6 members are attained you may begin creating events. You currently have " .($rowcount) . " members.</h3>";
		
	}
	
  }


//echo "winning";
//echo($description);
//echo($title);
//echo($email);
//echo($phone);

//variable to determine whether the registration was successful
if($execution==true)
{
	
$eventCreated = true;

$result = $conn->query("INSERT INTO events (name, category, description, event_time, event_date, location, univ_id, priv, rso, contact_phone, contact_email) VALUES ('$title', '$category', '$description', '17:30:00', '2015-04-17', 'University of Central Florida', 1, 2, 1, '$phone', '$email')");
   if ($result) 
   {
    $errTyp = "success";
    $errMSG = "Successfully created event";
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
		echo"<h1 align='center'>Event Created Successfully</h1>";
		
		echo"<p align='center'>Click <a href='menuPage.php'>Here</a> to Return to the menu page</p>";
	}


}

?>

</body>
</html>
