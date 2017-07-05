<html lang="en">
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
        .navbar-inverse {
            border-radius: 0px;
        }
        
        .list-group {
            background-color: lavender;
        }
        
        .list-group-item-heading {
            background-color: lavender;
            text-align: center;
        }
        
        .list-group-item-text {
            background-color: lavenderblush;
            text-align: center;
        }
        
        button {
            margin-left: 20px;
            background: none repeat scroll 0 0 #f9fafc;
            border-radius: 10%;
            color: #4286f4;
            height: 30px;
            width: 30px;
            position: absolute;
        }
    </style>
</head>

<?php

session_start();

function getEventInfo()
{
    /** Connect to database. */
    $sql_hostname = 'localhost';
    $sql_username = 'root';
    $sql_password = 'root';
    $sql_dbname = '';
    
    try
    {
        $dbh = new PDO("mysql:host=$sql_hostname;dbname=$sql_dbname", $sql_username, $sql_password);

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the select statement ***/
        $stmt = $dbh->prepare("SELECT name, description");        

        $stmt->bindParam(':event_id', $_GET['event_id'], PDO::PARAM_INT);
		
		/*** execute the prepared statement ***/
        $stmt->execute();
		
		$result = $stmt->fetch(PDO::FETCH_ASSOC);		

		$GLOBALS['location'] = $result['location'];
		
		$stmt = null;
    }
    catch(Exception $e)
    {
        echo 'We are unable to process your request. Please try again later.';
    }	
}

function getComments() {
	
	/** Connect to database. */
    $sql_hostname = 'localhost';
    $sql_username = 'root';
    $sql_password = 'root';
    $sql_dbname = '';
	
	try
    {
        $dbh = new PDO("mysql:host=$sql_hostname;dbname=$sql_dbname", $sql_username, $sql_password);

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("SELECT c.text, r.rating FROM comments c, ratings r, events e WHERE e.event_id = c.event_id AND r.comment_id = c.comment_id AND e.event_id = :event_id");        

        $stmt->bindParam(':event_id', $_GET['event_id'], PDO::PARAM_INT);
		
		/** Execute. */
        $stmt->execute();
		
		echo "<h3>Comments: </h3>";
		
		while($result = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			echo "<h3>" . $result['text'] . "\t\t\t" . "Rating: " .$result['rating'] . "</h3>" . "<a href=/>Remove</a>";
		}
		
		$stmt = null;
    }
    catch(Exception $e)
    {
        echo 'We are unable to process your request. Please try again later';
    }	
	
}

?>

<body>
    <!-- Header Navbar -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">&#9776;</a>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <div class="col-xs-0">
        <button type="button" class="btn btn-default btn-sm">
                <span class="glyphicon-plus"></span>
        </button>
        <h1 align="center">Your Events</h1>
    </div>

    <!-- Events List -->
    <div class="list-group">
        <!--<a href="#" class="list-group-item active">-->
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">Event 1</h4>
            <p class="list-group-item-text">(Description here)<br></p>
        </a>
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">Event 2</h4>
            <p class="list-group-item-text">(Description here)</p>
        </a>
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">Event 3</h4>
            <p class="list-group-item-text">(Description here)</p>
        </a>
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">Event 4</h4>
            <p class="list-group-item-text">(Description here)</p>
        </a> 
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">Event 5</h4>
            <p class="list-group-item-text">(Description here)</p>
        </a> 
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">Event 6</h4>
            <p class="list-group-item-text">(Description here)</p>
        </a> 
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">Event 7</h4>
            <p class="list-group-item-text">(Description here)</p>
        </a> 
    </div>

</body>
</html>

<?php

/** Prints out all the data to the screen. */
echo "<h2>Your Input:</h2>";
echo "<h1>" . $result["name"] . "</h1>";
echo "<br>";
echo "<h5>Description: <p>" . $result["description"] . "</p></h5>";

?>