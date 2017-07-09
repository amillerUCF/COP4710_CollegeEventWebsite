<?php 

$username = $_POST['username'];
$password = $_POST['password'];
$username2 = "Dan";
$password2 = "password1";
//a defualt user_id so we know when it fails
$user_id = "Default";
//error message variable
$message = "no message";

echo($username2);
echo($password2);

/*** begin our session ***/
session_start();


/*** check if the users is already logged in ***/
if(isset( $_SESSION['user_id'] ))
{
    $message = 'User is already logged in';
}
/*** check that both the username, password have been submitted ***/
if(!isset( $_POST['username'], $_POST['password']))
{
    $message = 'Please enter a valid username and password';
}

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

 /*prepare the select statement*/
$result = $conn->query("SELECT user_id, username, password, priv FROM users WHERE username = '$username' AND password = '$password'");

while($row = mysqli_fetch_array($result))
{
	$user_id = $row['user_id'];
	$privilege = $row["priv"];
	echo "'$user_id'";
	echo "'$privilege'";
	
}

//if they failed to login
if($user_id == "Default")
        {
                $message = 'Failure';
        }
if($user_id == false)
        {
                $message = 'Failure';
        }
 /*We got the data that we need. now we will use it*/
        else
        {
                /*set session user_id and privilege number vars*/
                $_SESSION["user_id"] = $user_id;
				$_SESSION["user_priv"] = $privilege;
				
				
                /* log in was successfull.go to home page */                
				header('Location: events.php');
				
        }




  

?>


