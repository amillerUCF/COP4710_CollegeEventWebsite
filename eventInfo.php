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
        html, body {

        }
    
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

    /* begin session */
    session_start();
    
    // Local variables
    //$event_id = $_SESSION['event_id'];
    $event_id = 1;
    $name;
    $category;
    $description;
    $event_time;
    $event_date;

    //variable to determine what kind of search we are doing
    $switchVar = 0;
        
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

    // Query 'event' table for details on a specific event.
    $result = $conn->query("SELECT name, category, event_time, event_date, location, description, contact_phone, contact_email FROM events WHERE event_id = '$event_id'");
    
    if($row = mysqli_fetch_array($result))
    {
        // Gets specific data from the 'event' query.
        $name = $row['name'];
        $category = $row['category'];
        $location = $row['location'];
        $event_time = $row['event_time'];
        $event_date = $row['event_date'];
        $description = $row['description'];
    }
    
    /** Gathers all data from forms. */
    function get_comments($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    ?>
    
    <!-- Page Header -->
    <div class="col-xs-0">
        <h1 align="center"><?php echo $name ?></h1>
    </div>
    <div class="row">
        <div class="event-info-list">
            <!--<p1 class="event-list-item">
                <h5>Hosted By: <p>(RSO's here)</p></h5>
            </p1>-->
            <p1 class="event-list-item">
                <h5>Categories: <p><?php echo $category ?></p></h5>
            </p1>
            <p1 class="event-list-item">
                <h5>Location: <p><?php echo $location ?></p></h5>
            </p1>
            <p1 class="event-list-item">
                <h5>Time/Date: <p><?php echo $event_time . " @ " . $event_date ?></p></h5>
            </p1>
            <p1 class="event-list-item">
                <h5>Description: <p><?php echo $description ?></p></h5>
            </p1>
            <br>
            <h4>Comments</h4>
            
            <hr>
            
            <form action="">
            
            <!-- Comments section -->
            <div class="row">
                <!-- Add comment -->
                <div class="col-xs-2"><button type="submit" name="submit" class="btn btn-default">Post</button></div>
                <div class="col-xs-2"><textarea rows="1" cols="35" type="text" name="comment"></textarea></div>
                
                <br><br>
                
                <!-- Comments -->
                <div class="list-group">
                    <?php
                
                    $commentCount = 1;
                
                    // Query 'comments' table for comments on event.
                    $result2 = $conn->query("SELECT text FROM comments WHERE event_id = '$event_id'");
                    
                    while($row2 = mysqli_fetch_array($result2))
                    {
                        echo '<p1 class="comment-list-item">
                                  <h5 class="list-group-item-heading">Comment ' . $commentCount . ': <br><p2>' . $row2['text'] . '</p2></h4></p1>';
                        $commentCount++;
                    }
                    
                    ?>
                </div>
            </div> 
            </form>
        </div> 
    </div>
   
</body>
</html>

<?php

$comment = $_GET['comment'];

if($comment == "")
    echo "No query";
else
    $result = $conn->query("INSERT INTO comments (comment_id, event_id, user_id, text) VALUES ($commentCount, 1, 3, 'asdfasdfasdfasdfasdf')");

?>
