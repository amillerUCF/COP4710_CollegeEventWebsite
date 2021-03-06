<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="http://getbootstrap.com/docs-assets/ico/favicon.png">

    <title>Search Results</title>

    <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
    body {
      padding-top: 0px;
      padding-bottom: 40px;
      background-color: #ffc904;
    }
    .form-signin {
      max-width: 330px;
      padding: 15px;
      margin: 0 auto;
    }
    .form-signin .form-signin-heading,
    .form-signin .checkbox {
      margin-bottom: 10px;
    }
    .form-signin .checkbox {
      font-weight: normal;
    }
    .form-signin .form-control {
      position: relative;
      font-size: 16px;
      height: auto;
      padding: 10px;
      -webkit-box-sizing: border-box;
         -moz-box-sizing: border-box;
              box-sizing: border-box;
    }
    .form-signin .form-control:focus {
      z-index: 2;
    }
    .form-signin input[type="text"] {
      margin-bottom: -1px;
      border-bottom-left-radius: 0;
      border-bottom-right-radius: 0;
    }
    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }
	.comments{
		padding: 0px 40px;
	}

    </style>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="http://getbootstrap.com/docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body>
   <!-- Header Navbar -->
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

//variables from the page being grabbed and various other variables that will be used to temporarily store data
$university = $_POST['university'];
$rsos = $_POST['rsos'];
$univ_id = 0;
$category = $_POST['category'];
$rso_id = 0;
$eid = 0;

//variable to determine what kind of search we are doing
$switchVar = 0;

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

        /*use sql to get the requested data from the database*/
		//case: only the university field is filled out
		if((strlen($university)>0)&&(strlen($rsos)==0)&&(strlen($category)==0))
		{
		//convert from the university name to an id number to use in the next query
		
		$result0 = $conn->query("SELECT name, univ_id FROM universities WHERE name = '$university'");
		while($row0 = mysqli_fetch_array($result0))
		{
				$univ_id = $row0['univ_id'];
		}
		
		$result = $conn->query("SELECT name, description, event_date, contact_phone, contact_email, event_id, location FROM events WHERE univ_id = '$univ_id'");
		
		while($row = mysqli_fetch_array($result))
		{
			$name = $row['name'];
			$description = $row['description'];
			$date = $row['event_date'];
			$contact_phone = $row['contact_phone'];
			$contact_email = $row['contact_email'];
			$event_id = $row['event_id'];
		echo "<p><strong>Name:</strong> " . $name . "</p>";
		echo "<p><strong>Description:</strong> " . $description . "</p>";
		echo "<p><strong>Date:</strong> " . $date . "</p>";
		echo "<p><strong>Contact Phone:</strong> " . $contact_phone . "</p>";
		echo "<p><strong>Contact Email:</strong> " . $contact_email . "</p>";
		$result2 = $conn->query("SELECT c.text, r.rating FROM comments c, ratings r, events e WHERE e.event_id = c.event_id AND r.comment_id = c.comment_id AND e.event_id = '$event_id'");
				while($row2 = mysqli_fetch_array($result2))
				{
					
					$text = $row2['text'];
					$rating = $row2['rating'];
					echo"<div class='comments'>";
					echo "<p><strong>Comment :</strong></p>";
					echo "<p>" . $text . "<br></p>"; 
					echo"<strong>Rating: </strong>" . $rating . "</p>";
					echo "<a href=/>Remove Comment</a>";	
					echo "<br></br>";
					echo"</div>";
				}
		echo "<br></br>";
		}
	}
	else if((strlen($rsos)>0)&&(strlen($university)==0)&&(strlen($category)==0))
	{
					//convert from the rso name to an id number to use in the next query
		
		$result0 = $conn->query("SELECT name, rso_id FROM rso WHERE name = '$rsos'");
		while($row0 = mysqli_fetch_array($result0))
		{
				$rso_id = $row0['rso_id'];
		}
		
		$result = $conn->query("SELECT name, description, event_date, contact_phone, contact_email, event_id, location FROM events WHERE rso = '$rso_id'");
		while($row = mysqli_fetch_array($result))
		{
			$name = $row['name'];
			$description = $row['description'];
			$date = $row['event_date'];
			$contact_phone = $row['contact_phone'];
			$contact_email = $row['contact_email'];
			$event_id = $row['event_id'];
		echo "<p><strong>Name:</strong> " . $name . "</p>";
		echo "<p><strong>Description:</strong> " . $description . "</p>";
		echo "<p><strong>Date:</strong> " . $date . "</p>";
		echo "<p><strong>Contact Phone:</strong> " . $contact_phone . "</p>";
		echo "<p><strong>Contact Email:</strong> " . $contact_email . "</p>";
		$result2 = $conn->query("SELECT c.text, r.rating FROM comments c, ratings r, events e WHERE e.event_id = c.event_id AND r.comment_id = c.comment_id AND e.event_id = '$event_id'");
				while($row2 = mysqli_fetch_array($result2))
				{
					$text = $row2['text'];
					$rating = $row2['rating'];
					echo "<p><strong>Comment :</strong></p>";
					echo "<p>" . $text . "<br></p>"; 
					echo"<strong>Rating: </strong>" . $rating . "</p>";
					echo "<a href=/>Remove Comment</a>";	
					echo "<br></br>";
				}
		echo "<br></br>";
		}
	}
	else if(strlen($category)>0&&(strlen($rsos)==0)&&strlen($university)==0)
	{
		$result = $conn->query("SELECT name, event_id FROM events WHERE category = '$category'");
		while($row= mysqli_fetch_array($result))
		{
				$eid = $row['event_id'];
		}
		
		$result = $conn->query("SELECT name, description, event_date, contact_phone, contact_email, event_id, location FROM events WHERE event_id = '$eid'");
		while($row = mysqli_fetch_array($result))
		{
			$name = $row['name'];
			$description = $row['description'];
			$date = $row['event_date'];
			$contact_phone = $row['contact_phone'];
			$contact_email = $row['contact_email'];
			$event_id = $row['event_id'];
		echo "<p><strong>Name:</strong> " . $name . "</p>";
		echo "<p><strong>Description:</strong> " . $description . "</p>";
		echo "<p><strong>Date:</strong> " . $date . "</p>";
		echo "<p><strong>Contact Phone:</strong> " . $contact_phone . "</p>";
		echo "<p><strong>Contact Email:</strong> " . $contact_email . "</p>";
		$result2 = $conn->query("SELECT c.text, r.rating FROM comments c, ratings r, events e WHERE e.event_id = c.event_id AND r.comment_id = c.comment_id AND e.event_id = '$event_id'");
				while($row2 = mysqli_fetch_array($result2))
				{
					$text = $row2['text'];
					$rating = $row2['rating'];
					echo "<p><strong>Comment :</strong></p>";
					echo "<p>" . $text . "<br></p>"; 
					echo"<strong>Rating: </strong>" . $rating . "</p>";
					echo "<a href=/>Remove Comment</a>";	
					echo "<br></br>";
				}
		echo "<br></br>";
		}
		
	}
	else if((strlen($university)>0)&&(strlen($rsos)>0)&&(strlen($category)==0))
	{
		echo "search by university and rso";
		$result0 = $conn->query("SELECT name, univ_id FROM universities WHERE name = '$university'");
		while($row0 = mysqli_fetch_array($result0))
		{
				$univ_id = $row0['univ_id'];
		}
		
		$result0 = $conn->query("SELECT name, rso_id FROM rso WHERE name = '$rsos'");
		while($row0 = mysqli_fetch_array($result0))
		{
				$rso_id = $row0['rso_id'];
		}
		
		$result = $conn->query("SELECT name, description, event_date, contact_phone, contact_email, event_id, location FROM events WHERE univ_id = '$univ_id' AND rso ='$rso_id'");
		while($row= mysqli_fetch_array($result))
		{
				$event_id = $row['event_id'];
		}
		
		$result = $conn->query("SELECT name, description, event_date, contact_phone, contact_email, event_id, location FROM events WHERE event_id = '$event_id'");
		while($row = mysqli_fetch_array($result))
		{
			$name = $row['name'];
			$description = $row['description'];
			$date = $row['event_date'];
			$contact_phone = $row['contact_phone'];
			$contact_email = $row['contact_email'];
			$event_id = $row['event_id'];
		echo "<p><strong>Name:</strong> " . $name . "</p>";
		echo "<p><strong>Description:</strong> " . $description . "</p>";
		echo "<p><strong>Date:</strong> " . $date . "</p>";
		echo "<p><strong>Contact Phone:</strong> " . $contact_phone . "</p>";
		echo "<p><strong>Contact Email:</strong> " . $contact_email . "</p>";
		$result2 = $conn->query("SELECT c.text, r.rating FROM comments c, ratings r, events e WHERE e.event_id = c.event_id AND r.comment_id = c.comment_id AND e.event_id = '$event_id'");
				while($row2 = mysqli_fetch_array($result2))
				{
					$text = $row2['text'];
					$rating = $row2['rating'];
					echo "<p><strong>Comment :</strong></p>";
					echo "<p>" . $text . "<br></p>"; 
					echo"<strong>Rating: </strong>" . $rating . "</p>";
					echo "<a href=/>Remove Comment</a>";	
					echo "<br></br>";
				}
		echo "<br></br>";
		}
	}
	else if((strlen($university)==0)&&(strlen($rsos)>0)&&(strlen($category)>0))
	{
		echo "search by rso and category";
		
		$result0 = $conn->query("SELECT name, rso_id FROM rso WHERE name = '$rsos'");
		while($row0 = mysqli_fetch_array($result0))
		{
				$rso_id = $row0['rso_id'];
		}
		
		$result = $conn->query("SELECT name, event_id, category FROM events WHERE category = '$category'");
		while($row= mysqli_fetch_array($result))
		{
				$category = $row['category'];
		}
		
		$result = $conn->query("SELECT name, description, event_date, contact_phone, contact_email, event_id, location FROM events WHERE rso ='$rso_id' AND category ='$category'");
		while($row= mysqli_fetch_array($result))
		{
				$event_id = $row['event_id'];
		}
		
		$result = $conn->query("SELECT name, description, event_date, contact_phone, contact_email, event_id, location FROM events WHERE event_id = '$event_id'");
		while($row = mysqli_fetch_array($result))
		{
			$name = $row['name'];
			$description = $row['description'];
			$date = $row['event_date'];
			$contact_phone = $row['contact_phone'];
			$contact_email = $row['contact_email'];
			$event_id = $row['event_id'];
		echo "<p><strong>Name:</strong> " . $name . "</p>";
		echo "<p><strong>Description:</strong> " . $description . "</p>";
		echo "<p><strong>Date:</strong> " . $date . "</p>";
		echo "<p><strong>Contact Phone:</strong> " . $contact_phone . "</p>";
		echo "<p><strong>Contact Email:</strong> " . $contact_email . "</p>";
		$result2 = $conn->query("SELECT c.text, r.rating FROM comments c, ratings r, events e WHERE e.event_id = c.event_id AND r.comment_id = c.comment_id AND e.event_id = '$event_id'");
				while($row2 = mysqli_fetch_array($result2))
				{
					$text = $row2['text'];
					$rating = $row2['rating'];
					echo "<p><strong>Comment :</strong></p>";
					echo "<p>" . $text . "<br></p>"; 
					echo"<strong>Rating: </strong>" . $rating . "</p>";
					echo "<a href=/>Remove Comment</a>";	
					echo "<br></br>";
				}
		echo "<br></br>";
		}
		
		
	}
	else if((strlen($university)>0)&&(strlen($rsos)>0)&&(strlen($category)>0))
	{
		echo "all three fields are full";
		$result0 = $conn->query("SELECT name, univ_id FROM universities WHERE name = '$university'");
		while($row0 = mysqli_fetch_array($result0))
		{
				$univ_id = $row0['univ_id'];
		}
		
		$result0 = $conn->query("SELECT name, rso_id FROM rso WHERE name = '$rsos'");
		while($row0 = mysqli_fetch_array($result0))
		{
				$rso_id = $row0['rso_id'];
		}
		
		$result = $conn->query("SELECT name, event_id, category FROM events WHERE category = '$category'");
		while($row= mysqli_fetch_array($result))
		{
				$category = $row['category'];
		}
		
		$result = $conn->query("SELECT name, description, event_date, contact_phone, contact_email, event_id, location FROM events WHERE univ_id = '$univ_id' AND rso ='$rso_id' AND category ='$category'");
		while($row= mysqli_fetch_array($result))
		{
				$event_id = $row['event_id'];
		}
		
		$result = $conn->query("SELECT name, description, event_date, contact_phone, contact_email, event_id, location FROM events WHERE event_id = '$event_id'");
		while($row = mysqli_fetch_array($result))
		{
			$name = $row['name'];
			$description = $row['description'];
			$date = $row['event_date'];
			$contact_phone = $row['contact_phone'];
			$contact_email = $row['contact_email'];
			$event_id = $row['event_id'];
		echo "<p><strong>Name:</strong> " . $name . "</p>";
		echo "<p><strong>Description:</strong> " . $description . "</p>";
		echo "<p><strong>Date:</strong> " . $date . "</p>";
		echo "<p><strong>Contact Phone:</strong> " . $contact_phone . "</p>";
		echo "<p><strong>Contact Email:</strong> " . $contact_email . "</p>";
		$result2 = $conn->query("SELECT c.text, r.rating FROM comments c, ratings r, events e WHERE e.event_id = c.event_id AND r.comment_id = c.comment_id AND e.event_id = '$event_id'");
				while($row2 = mysqli_fetch_array($result2))
				{
					$text = $row2['text'];
					$rating = $row2['rating'];
					echo "<p><strong>Comment :</strong></p>";
					echo "<p>" . $text . "<br></p>"; 
					echo"<strong>Rating: </strong>" . $rating . "</p>";
					echo "<a href=/>Remove Comment</a>";	
					echo "<br></br>";
				}
		echo "<br></br>";
		}
		
	}
	else if((strlen($university)>0)&&(strlen($rsos)==0)&&(strlen($category)>0))
	{
		echo "search by univresity and category";
		
		$result0 = $conn->query("SELECT name, univ_id FROM universities WHERE name = '$university'");
		while($row0 = mysqli_fetch_array($result0))
		{
				$univ_id = $row0['univ_id'];
		}
		
		$result = $conn->query("SELECT name, event_id, category FROM events WHERE category = '$category'");
		while($row= mysqli_fetch_array($result))
		{
				$category = $row['category'];
		}
		
		$result = $conn->query("SELECT name, description, event_date, contact_phone, contact_email, event_id, location FROM events WHERE univ_id = '$univ_id' AND category ='$category'");
		while($row= mysqli_fetch_array($result))
		{
				$event_id = $row['event_id'];
		}
		
		$result = $conn->query("SELECT name, description, event_date, contact_phone, contact_email, event_id, location FROM events WHERE event_id = '$event_id'");
		while($row = mysqli_fetch_array($result))
		{
			$name = $row['name'];
			$description = $row['description'];
			$date = $row['event_date'];
			$contact_phone = $row['contact_phone'];
			$contact_email = $row['contact_email'];
			$event_id = $row['event_id'];
		echo "<p><strong>Name:</strong> " . $name . "</p>";
		echo "<p><strong>Description:</strong> " . $description . "</p>";
		echo "<p><strong>Date:</strong> " . $date . "</p>";
		echo "<p><strong>Contact Phone:</strong> " . $contact_phone . "</p>";
		echo "<p><strong>Contact Email:</strong> " . $contact_email . "</p>";
		$result2 = $conn->query("SELECT c.text, r.rating FROM comments c, ratings r, events e WHERE e.event_id = c.event_id AND r.comment_id = c.comment_id AND e.event_id = '$event_id'");
				while($row2 = mysqli_fetch_array($result2))
				{
					$text = $row2['text'];
					$rating = $row2['rating'];
					echo "<p><strong>Comment :</strong></p>";
					echo "<p>" . $text . "<br></p>"; 
					echo"<strong>Rating: </strong>" . $rating . "</p>";
					echo "<a href=/>Remove Comment</a>";	
					echo "<br></br>";
				}
		echo "<br></br>";
		}
		
	}
	else
	{
		echo "No Results found from your query";
	}
		
		
        //$stmt = $dbh->prepare("SELECT name, description, event_date, contact_phone, contact_email, event_id, location FROM events WHERE event_id = :event_id");        
        //$stmt->bindParam(':event_id', $_GET['event_id'], PDO::PARAM_INT);
		
		/*** execute the prepared statement ***/
        //$stmt->execute();
		
		//$result = $stmt->fetch(PDO::FETCH_ASSOC);	
		
		//$GLOBALS['location'] = $result['location'];
		
		//echo $row['name'] . "\t" . $row['description'] . "\t" . $row['event_date'] . "\t" . $row['contact_phone'] . "\t" . $row['contact_email'] . "<br><br>";				
		

		?>
	</body>	
</html>