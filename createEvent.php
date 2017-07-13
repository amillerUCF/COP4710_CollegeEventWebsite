<?php
    
    $noErrors = TRUE;

    // Form variables set to empty values.
    $category = $title = $description = $date = $time = $email = $phone = "";
    
    // Error variables set to empty values.
    $titleErr = $descriptionErr = $dateErr = $timeErr = $emailErr = $phoneErr = "";

    verifyData();
    
    function verifyData()
    {
        global $noErrors;
        
        /*** Verification ***/
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            /** Verify input of "name" in form. */
            if (empty($_POST["title"])) // Line is executed when "name" form is empty.
            {
                echo "title ";
                $titleErr = "Name is required";
                $noErrors = FALSE;
            }

            /** Verify "description". */
            if (empty($_POST["description"]))
            {
                echo "description ";
                $descriptionErr = "Description is required";
                $noErrors = FALSE;
            }
            
            /** Verify "date". */
            if (empty($_POST["date"]))
            {
                echo "date ";
                $dateErr = "Date is required";
                $noErrors = FALSE;
            }
            
            
            /** Verify "email". */
            if (empty($_POST["email"]))
            {
                echo "email ";
                $emailErr = "Email is required";
                $noErrors = FALSE;
            }
            else
            {
                if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
                {
                    echo "email ";
                    $emailErr = "Invalid email format";
                    $email = "";
                    $noErrors = FALSE;
                }
            }
            
            /** Verify "phone". */
            if (empty($_POST["phone"]))
            {
                echo "phone ";
                $phoneErr = "Phone is required";
                $noErrors = FALSE;
            } 
            else
            {
                // check if phone # is only digits.
                if (!preg_match("/^[0-9 ]*$/", $_POST["phone"]))
                {
                    echo "phone ";
                    $phoneErr = "Only digits allowed";
                    $phone = "";
                    $noErrors = FALSE;
                }
            }
            
            if($noErrors == TRUE)
                header("Location: eventCreated.php");
        }
    }
?>

<html lang="en">
<head>
  <title>Create Event</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <title>Create Event</title>
  
  <style>
    html, body {
        max-width: 100%;
        overflow-x: hidden;
    }
    .navbar-inverse {
        border-radius: 0px;
    }
.space {
  height: 40px;
    }
body {
 padding-top: 0px;
 padding-bottom: 40px;
 background-color: #ffc904;
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

<div class="container">
  <h2>Create Event</h2>
  <div class = "space"> </div>
  
  <div class = "row">
		<div class = "col-md-6">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
			<div class="form-group">
      <label for="category">Category</label>
      <input type="category" class="form-control" id="category" placeholder="Enter category" name="category">
    </div>
		</div>
</div>

<div class = "space"> </div>

    <div class="form-group">
      <label for="title">Title</label>
      <input type="title" class="form-control" id="email" placeholder="Enter title" name="title" value="<?php echo $title;?>">
      <span class="error"> <?php echo $titleErr;?></span>
    </div>
	
	<div class = "space"> </div>
	
    <div class="form-group">
      <label for="pwd">Description</label>
	  <textarea class="form-control" rows="5" id="comment" name="description" value="<?php echo $description;?>"></textarea>
      <span class="error"> <?php echo $descriptionErr;?></span>
    </div>
	
	<div class = "space"> </div>
	
	 <div class="form-group">
      <label for="date">When</label>
      <input type="date" class="form-control" id="date" placeholder="Month/Day/Year" name="date" value="<?php echo $date;?>">
      <span class="error"> <?php echo $dateErr;?></span>
    </div>
	
	<div class = "space"> </div>
	<!-- Needs constraint checking -->
	<div class="form-group">
      <label for="rsos">RSO Hosting</label>
      <input type="text" class="form-control" id="rsos" placeholder="What RSO is hosting" name="rsos">
    </div>
	
	<div class = "space"> </div>
	
	<div class="form-group">
      <label for="email">Contact Email</label>
      <input type="text" class="form-control" id="email" placeholder="" name="email" value="<?php echo $email;?>">
      <span class="error"> <?php echo $emailErr;?></span>
    </div>
	
	<div class = "space"> </div>
	
	<div class="form-group">
      <label for="phone">Contact Phone Number</label>
      <input type="text" class="form-control" id="phone" placeholder="(407) XXX-XXXX" name="phone" value="<?php echo $phone;?>">
      <span class="error"> <?php echo $phoneErr;?></span>
    </div>
	
	<div class = "space"> </div>
	
    <button name="submit" id="submit" type="submit" class="btn btn-default" value="RUN">Create Event</button>
	
    <?php
    
    if (array_key_exists('submit', $_POST)) {
        echo "Run";
        verifyData();
        echo "Done";
    }
    
    ?>
    
	<div class = "space"> </div>
	
  </form>
</div>

</body>
</html>
   

