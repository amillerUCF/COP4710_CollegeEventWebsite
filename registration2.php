<?php
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
  
   // Form variables set to empty values.
    $name = $email = $password = $nid = $rsos = $university_id ="";
    
    // Error variables set to empty values.
    //$nameErr = $descriptionErr = $dateErr = $timeErr = $emailErr = $phoneErr = "";
    
	// Error variables set to empty values.
    $nameErr = $emailErr = $passwordErr = $nidErr = $rsosErr  = $university_idErr = "";
	
    /*** Verification ***/
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        /** Verify input of "name" in form. */
        if (empty($_POST["name"])) // Line is executed when "name" form is empty.
        {
            $nameErr = "Name is required";
        }
        else // Line executes when "name" form is not empty.
        {
            $name = test_input($_POST["name"]);
        }

        /** Verify "email". */
        if (empty($_POST["email"]))
        {
            $emailErr = "Email is required";
        }
        else
        {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $emailErr = "Invalid email format";
                $email = "";
            }
        }
        /** Verify "password". */
        if (empty($_POST["password"]))
        {
            $phoneErr = "Password is required";
        } 
        else
        {
            $password = test_input($_POST["password"]);
			//Check if the password contains six characters, one uppercase letter, one lowercase letter, and one digit
           if (!preg_match('/^(?=.{6})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[\W_])/', $password))
	
            {
                $passwordErr = "Password must contain six characters, one uppercase letter, one lowercase letter, and one digit";
                $password = "";
            }
        }
		/** Verify "nid". */
        if (empty($_POST["nid"]))
        {
            $nidErr = "nid is required";
        } 
        else
        {
            $nid = test_input($_POST["nid"]);
            // check if nid # is only digits.
            if (!preg_match("/^[0-9 ]*$/",$nid))
            {
                $nidErr = "Only digits allowed";
                $nid = "";
            }
        }
		/** Verify "university_id". */
        if (empty($_POST["university_id"]))
        {
            $university_idErr = "university_id is required";
        } 
        else
        {
            $university_id = test_input($_POST["university_id"]);
            // check if university_id # is only digits.
            if (!preg_match("/^[0-9 ]*$/",$university_id))
            {
                $university_idErr = "Only digits allowed";
                $university_id = "";
            }
        }
        
        
       
    }

    /** Gathers all data from forms. */
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="http://getbootstrap.com/docs-assets/ico/favicon.png">
    
    <title>Your Events</title>
  
    <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <style>
        .error {
            color: #FF0000;
        }
    
        html, body {
            max-width: 100%;
            overflow-x: hidden;
        }
    
        .navbar-inverse {
            border-radius: 0px;
        }
        
        .event-info-list {
            padding-left: 10%;
            padding-right: 10%;
            padding-bottom: 10%;
        }
        
        category-picker {
            background-color: grey;
        }
        
        select#soflow {
           border: 2px solid #454747
           background-color: #dee9fc;
           border-radius: 5px;
           outline-width: 0; <!-- Gets rid of outline when
                                  pressing html elements. -->
           font-size: inherit;
           overflow: hidden;
           padding: 5px 1px;
           text-overflow: ellipsis;
           white-space: nowrap;
        }
        
        input {
            border: 2px solid #454747
            background-color: #dee9fc;
            border-radius: 5px;
            padding: 5px 5px;
            outline-width: 0;
        }
        
        textarea {
            border: 2px solid #454747
            background-color: #dee9fc;
            border-radius: 5px;
            padding: 5px 5px;
            outline-width: 0;
            width: 400px;
            height: 100px;
            resize: none;
        }
        
        button {
            background-color: #73a4f4;
        }
    </style>
</head>
<body>
    <!-- Header Navbar -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">&larr;</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
            </ul>
        </div>
    </nav>

    <div class="content">
        <!-- Page Header -->
        <div class="col-xs-0">
            <h1 align="center">Registration</h1>
        </div>
        
        <hr>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        
            <div class="row">
                <div class="event-info-list">
                    
					<h4>Name:</h4>
                    <input id="name" placeholder="Enter name" name="name" value="<?php echo $name;?>">
                    <span class="error"> <?php echo $nameErr;?></span>
					<h4>Email:</h4>
                    <input id="name" placeholder="Enter email" name="name" value="<?php echo $name;?>">
                    <span class="error"> <?php echo $nameErr;?></span>
					<h4>Password:</h4>
                    <input id="name" placeholder="Enter password" name="name" value="<?php echo $name;?>">
                    <span class="error"> <?php echo $nameErr;?></span>
					<h4>NID:</h4>
                    <input id="name" placeholder="Enter NID" name="name" value="<?php echo $name;?>">
                    <span class="error"> <?php echo $nameErr;?></span>
					
					<div class="col-xs-0">
                        <h4>RSOs:</h4>
                    </div>

                    <select id="soflow" name="category" value="<?php echo $category;?>">
                            <option value="Academic">4EVERKNIGHTS</option>
                            <option value="Entertainment">African Students Organization</option>
                            <option value="Social Events">Active Minds</option>
                    </select>
					
                    <h4>University ID:</h4>
                    <input id="name" placeholder="Enter university id" name="name" value="<?php echo $name;?>">
                    <span class="error"> <?php echo $nameErr;?></span>
                    <br>
                    <br>
                   
                    <button type="submit" name="submit" class="btn btn-default">Submit</button> 
            
                </div> 
            </div>
        </form>
    </div>
</body>
</html>

<div id="page">

<?php

/** Gets the category. This type of form was finicky so I added 
    this line just in case. */
/**$category = $_POST['category']; **/

/** Prints out all the data to the screen. */
echo "<h2>Your Input:</h2>"; 

echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $password;
echo "<br>";
echo $nid;
echo "<br>";
echo $rsos;
echo "<br>";
echo $university_id;
?>