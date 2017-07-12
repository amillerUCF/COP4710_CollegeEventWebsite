<!DOCTYPE html>
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

<body>
    <!-- Header Navbar -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="menuPage.php">&larr;</a>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <div class="col-xs-0">
        <!--<button type="button" class="btn btn-default btn-sm">
                <span class="glyphicon-plus"></span>
        </button>-->
        <h1 align="center">Your Events</h1>
    </div>
    
    <?php

    /* begin session */
    session_start();
    
    // Local variables
    $user_id = $_SESSION['user_id'];
    $event_id = '';
    $description = '';

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
    

    // Query 'follow' table results for current logged in user.
    $result = $conn->query("SELECT user_id, event_id FROM follows WHERE user_id = '$user_id'");
    
    while($row = mysqli_fetch_array($result))
    {
        $user_id = $row['user_id'];
        $event_id = $row['event_id'];
        
        $result2 = $conn->query("SELECT description FROM events WHERE event_id = '$event_id'");
        
        // Print out the event and it's description if it has one.
        if($row2 = mysqli_fetch_array($result2))
        {            
            $description = $row2['description'];
            if ($description != "")
            echo "<a href='eventInfo.php' class='list-group-item'>
                <h4 class='list-group-item-heading'>" . "Event " . $event_id . "</h4>
                <h4 class='list-group-item-text'>" . $description . "</h4></a>";
            else
                echo "<a href='eventInfo.php' class='list-group-item'>
                <h4 class='list-group-item-heading'>" . "Event " . $event_id . "</h4>
                <h4 class='list-group-item-text'>No description found.</h4></a>";
        }

        
        // Set back to null for next event's description.
        $description = '';
    }
     
    ?>

    

</body>
</html>