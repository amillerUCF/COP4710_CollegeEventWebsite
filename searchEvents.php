<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search Events</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- Custom styles for this template -->
    <style>
        .navbar-inverse {
            border-radius: 0px;
        }
		
		.space{
			height: 30px;
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


<div class="container">
  <h2>Search Events</h2>
  <form action="searchQuery.php" method="post">
  <div class="form-group">
      <label for="Name">University:</label>
      <input type="text" class="form-control" id="university" placeholder="Enter University" name="university">
    </div>
    <div class="form-group">
	 <label for="rsos">RSOs:</label>
	<input type="text" class="form-control" id="rsos" placeholder="Enter RSOs" name="rsos">
	
	<div class="space"> </div>
	
	 <label for="category">Category:</label>
	<input type="text" class="form-control" id="category" placeholder="Enter Category" name="category">
	
  <!--<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" name="category">Category
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#">Academic</a></li>
	<li class="divider"></li>
    <li><a href="#">Entertainment</a></li>
	<li class="divider"></li>
    <li><a href="#">Social events</a></li>
  </ul>
</div>-->

<div class = "space"> </div>


	<div class="form-group">
	   <button type="submit" class="btn btn-default">Search</button> 
    </div>  
  </form>
</div>

</body>
</html>

	
	