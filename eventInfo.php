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
        
        .event-info-list {
            padding-left: 30%;
            padding-right: 30%;
        }
        
        /* Style for description of description headers. */
        p {
            color: #42b3f4;
            word-break: break-all;
        }
        
        /* Style for description headers. */
        p1 {
            color: black;
        }
        
        /* Comments. */
        p2 {
            background-color: lavender;
        }
        
        textarea {
            resize: none;
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
        $stmt = $dbh->prepare("SELECT name, category, university, contact_phone, contact_email, event_id, location FROM events WHERE event_id = :event_id, description");        

        $stmt->bindParam(':event_id', $_GET['event_id'], PDO::PARAM_INT);
		
		/*** execute the prepared statement ***/
        $stmt->execute();
		
		$result = $stmt->fetch(PDO::FETCH_ASSOC);		

		$GLOBALS['location'] = $result['location'];
		
		echo "<h1>" . $result['name'] . "</h1>";
        echo "<h5>Categories: <p>" . $result['category'] . "</p></h5>";
		echo "<h5>University: <p>" . $result['university'] . "</p></h5>";
		echo "<h5>Date: <p>" . $result['event_date'] . "</p></h5>";
		echo "<h5>Contact Phone: <p>" . $result['contact_phone'] . "</p></h5>";
		echo "<h5>Contact Email: <p>" . $result['contact_email'] . "</p></h5>";
        echo "<h5>Description: <p>" . $result['description'] . "</p></h5>";
		
		//echo $row['name'] . "\t" . $row['description'] . "\t" . $row['event_date'] . "\t" . $row['contact_phone'] . "\t" . $row['contact_email'] . "<br><br>";				
		
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
                <a class="navbar-brand" href="#">&larr;</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
            </ul>
        </div>
    </nav>

    <?php 
		
        getEventInfo();
        echo "<br>";
        getComments();
    
    ?>
    
    <!-- Page Header -->
    <div class="col-xs-0">
        <h1 align="center">(Event Title Here)</h1>
    </div>
    <div class="row">
        <div class="event-info-list">
            <p1 class="event-list-item">
                <h5>Hosted By: <p>(RSO's here)</p></h5>
            </p1>
            <p1 class="event-list-item">
                <h5>Categories: <p>(Categories this event falls under)</p></h5>
            </p1>
            <p1 class="event-list-item">
                <h5>University: <p>(University here)</p></h5>
            </p1>
            <p1 class="event-list-item">
                <h5>Description: <p>101000100010111011011000110010001110110111000111011011111011000111010000110000010001</p></h5>
            </p1>
            <br>
            <h4>Comments</h4>
            
            <hr>
            
            <!-- Comments section -->
            <div class="row">
                <!-- Add comment -->
                <div class="col-xs-2"><button>Post</button></div>
                <div class="col-xs-2"><textarea rows="1" cols="35" type="text" name="comment"></textarea></div>
                
                <br><br>
                
                <!-- Comments -->
                <div class="list-group">
                    <p1 class="comment-list-item">
                        <h5 class="list-group-item-heading">Comment 1: <p2>asdfasdf</p2></h4>
                    </p1>
                    <p1 class="comment-list-item">
                        <h5 class="list-group-item-heading">Comment 2: <p2>asdfasdf</p2></h4>
                    </p1>
                </div>
            </div>  
        </div> 
    </div>
   
</body>
</html>
