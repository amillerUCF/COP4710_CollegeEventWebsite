<?php

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
            <h1 align="center">Create Event</h1>
        </div>
        
        <hr>
        
        <div class="row">
            <div class="event-info-list">
                <div class="col-xs-0">
                    <h4>Categories:</h4>
                </div>

                <select id="soflow">
                        <option value="1">Academic</option>
                        <option value="2">Entertainment</option>
                        <option value="3">Social events</option>
                    </select>
                
                <br>
                <br>
                
                <h4>Title:</h4>
                <input id="title" placeholder="Title" name="title">
                
                <br>
                <br>
                
                <h4>Description:</h4>
                <textarea></textarea>
                
                <br>
                <br>
                
                <h4>When ?</h4>
                <form action="/action_page.php">
                  <input type="date" name="bday">
                  at
                  <input type="time" name="usr_time">
                </form>
                
                <br>
                
                <h4>Contact Email:</h4>
                <input id="email" placeholder="Email" name="email">
            
                <br>
                <br>
                
                <h4>Contact Phone:</h4>
                <input id="phone" placeholder="Phone #" name="phone">
            
                <br>
                <br>
                
                <button type="submit" class="btn btn-default">Create Event!</button> 
            
            </div> 
        </div>
    </div>
</body>
</html>

<div id="page">