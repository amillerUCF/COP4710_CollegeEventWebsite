<?php
session_start();
    
    $noErrors = TRUE;
    
    // Form variables set to empty values.
    $category = $title = $description = $date = $rsos = $email = $phone = "";
    
    // Error variables set to empty values.
    $categoryErr = $titleErr = $descriptionErr = $dateErr = $rsosErr = $emailErr = $phoneErr = "";

    
    /*** Verification ***/
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        /** Verify input of "name" in form. */
        if (empty($_POST["category"])) // Line is executed when "name" form is empty.
        {
            $categoryErr = "* Category is required";
            $noErrors = FALSE;
        }
        else
        {
            $category = $_POST["category"];
            $_SESSION["category"] = $category;
        }
        
        /** Verify input of "name" in form. */
        if (empty($_POST["title"])) // Line is executed when "name" form is empty.
        {
            $titleErr = "* Title is required";
            $noErrors = FALSE;
        }
        else
        {
            $title = $_POST["title"];
            $_SESSION["title"] = $title;
        }

        /** Verify "description". */
        if (empty($_POST["description"]))
        {
            $descriptionErr = "* Description is required";
            $noErrors = FALSE;
        }
        else
        {
            $description = $_POST["description"];
            $_SESSION["description"] = $description;
        }
        
        /** Verify "date". */
        if (empty($_POST["date"]))
        {
            $dateErr = "* Date is required";
            $noErrors = FALSE;
        }
        else
        {
            $date = $_POST["date"];
            $_SESSION["date"] = $date;
        }
        
        /** Verify "rsos". */
        if (empty($_POST["rsos"]))
        {
            $rsosErr = "* An RSO is required";
            $noErrors = FALSE;
        }
        else
        {
            $rsos = $_POST["rsos"];
            $_SESSION["rsos"] = $rsos;
        }
        
        /** Verify "email". */
        if (empty($_POST["email"]))
        {
            $emailErr = "* Email is required";
            $noErrors = FALSE;
        }
        else
        {
            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
            {
                $emailErr = "* Invalid email format";
                $noErrors = FALSE;
            }
            else
            {
                $email = $_POST["email"];
                $_SESSION["email"] = $email;
            }
        }
        
        /** Verify "phone". */
        if (empty($_POST["phone"]))
        {
            $phoneErr = "* Phone is required";
            $noErrors = FALSE;
        } 
        else
        {
            // check if phone # is only digits.
            if (!preg_match("/^[0-9 ]*$/", $_POST["phone"]))
            {
                $phoneErr = "* Only digits allowed";
                $noErrors = FALSE;
            }
            else
            {
                $phone = $_POST["phone"];
                $_SESSION["phone"] = $phone;
            }
        }
        
        if($noErrors == TRUE)
            header('Location: eventCreated.php');
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
      <input type="category" class="form-control" id="category" placeholder="Enter category" name="category" value="<?php echo $category;?>">
      <span class="error"> <?php echo $categoryErr;?></span>
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
      <label for="description">Description</label>
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
      <input type="text" class="form-control" id="rsos" placeholder="What RSO is hosting" name="rsos" value="<?php echo $rsos;?>">
      <span class="error"> <?php echo $rsosErr;?></span>
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
    
	<div class = "space"> </div>
	
  </form>
</div>

</body>
</html>
   

