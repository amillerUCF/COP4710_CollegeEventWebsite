<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add University</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <title>Add University</title>
  
  <style>
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
                <a class="navbar-brand" href="#">&#9776;</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="menuPage.php">Home</a></li>
            </ul>
        </div>
    </nav>

<div class="container">
  <h2>Add University</h2>
  <div class = "space"> </div>
  
  <div class = "row">
		<div class = "col-md-6">
			<form action="universityAdded.php" method="post">
			<div class="form-group">
      <label for="name">University</label>
      <input type="name" class="form-control" id="name" placeholder="Enter university name" name="name">
    </div>
		</div>
</div>

<div class = "space"> </div>

    <div class="form-group">
      <label for="location">Location</label>
      <input type="location" class="form-control" id="location" placeholder="Enter school location" name="location">
    </div>
	
	<div class = "space"> </div>
	
    <div class="form-group">
      <label for="description">Description</label>
	  <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
    </div>
	
	<div class = "space"> </div>
	
	 <div class="form-group">
      <label for="num_students">How many students?</label>
      <input type="num_students" class="form-control" id="num_students" placeholder="How many students? (numerical values only)" name="num_students">
    </div>
	
	<div class = "space"> </div>
	
    <button type="submit" class="btn btn-md btn-primary btn-block">Add University</button>
	
	<div class = "space"> </div>
	
  </form>
</div>

</body>
</html>
   

