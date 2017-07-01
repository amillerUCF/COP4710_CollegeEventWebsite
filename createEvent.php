<?php

    // Form variables set to empty values.
    $category = $name = $description = $date = $time = $email = $phone = "";
    
    // Error variables set to empty values.
    $nameErr = $descriptionErr = $dateErr = $timeErr = $emailErr = $phoneErr = "";
    
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

        /** Verify "description". */
        if (empty($_POST["description"]))
        {
            $descriptionErr = "Description is required";
        }
        else
        {
            $description = test_input($_POST["description"]);
        }
        
        /** Verify "date". */
        if (empty($_POST["date"]))
        {
            $dateErr = "Date is required";
        }
        else
        {
            $date = test_input($_POST["date"]);
        }
        
        /** Verify "time". */
        if (empty($_POST["time"]))
        {
            $timeErr = "Time is required";
        }
        else
        {
            $time = test_input($_POST["time"]);
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
        
        /** Verify "phone". */
        if (empty($_POST["phone"]))
        {
            $phoneErr = "Phone is required";
        } 
        else
        {
            $phone = test_input($_POST["phone"]);
            // check if phone # is only digits.
            if (!preg_match("/^[0-9 ]*$/",$phone))
            {
                $phoneErr = "Only digits allowed";
                $phone = "";
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
            <h1 align="center">Create Event</h1>
        </div>
        
        <hr>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        
            <div class="row">
                <div class="event-info-list">
                    <div class="col-xs-0">
                        <h4>Categories:</h4>
                    </div>

                    <select id="soflow" name="category" value="<?php echo $category;?>">
                            <option value="Academic">Academic</option>
                            <option value="Entertainment">Entertainment</option>
                            <option value="Social Events">Social Events</option>
                    </select>
                    
                    <br>
                    <br>
                    
                    <h4>Title:</h4>
                    <input id="name" placeholder="Title" name="name" value="<?php echo $name;?>">
                    <span class="error"> <?php echo $nameErr;?></span>
                    
                    <br>
                    <br>
                    
                    <h4>Description:</h4>
                    <textarea name="description" value="<?php echo $description;?>"></textarea>
                    <span class="error"> <?php echo $descriptionErr;?></span>
                    
                    <br>
                    <br>
                    
                    <h4>When ?</h4>
                    <form action="/action_page.php">
                      <input type="date" name="date" value="<?php echo $date;?>">
                      at
                      <input type="time" name="time" value="<?php echo $time;?>">
                      <span class="error"> <?php echo $dateErr;?></span>
                      <span class="error"> <?php echo $timeErr;?></span>
                    </form>
                    
                    <br>
                    
                    <h4>Contact Email:</h4>
                    <input id="email" placeholder="Email" name="email" value="<?php echo $email;?>">
                    <span class="error"> <?php echo $emailErr;?></span>
                
                    <br>
                    <br>
                    
                    <h4>Contact Phone:</h4>
                    <input id="phone" placeholder="Phone #" name="phone" value="<?php echo $phone;?>">
                    <span class="error"> <?php echo $phoneErr;?></span>
                
                    <br>
                    <br>
                    
                    <button type="submit" name="submit" class="btn btn-default">Create Event!</button> 
            
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
$category = $_POST['category'];

/** Prints out all the data to the screen. */
echo "<h2>Your Input:</h2>";
echo $category;
echo "<br>";
echo $name;
echo "<br>";
echo $description;
echo "<br>";
echo $date;
echo "<br>";
echo $time;
echo "<br>";
echo $email;
echo "<br>";
echo $phone;
?>