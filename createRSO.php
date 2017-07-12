<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create RSO</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <title>Create RSO</title>
  
  <style>
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
  <h2>Create RSO</h2>
  <div class = "space"> </div>
  
 <div class="row">
		<div class = "col-md-6">
			<form action="rsoCreated.php" method="post">
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" id="email" placeholder="Enter the contact email for the RSO" name="email" align="center">
			</div>
		</div>
</div>
		
<div class = "space"> </div>
<div class="row">
<div class= "col-md-6">
    <div class="form-group">
      <label for="rsos">RSO Name</label>
      <input type="rsos" class="form-control" id="rsos" placeholder="Enter RSO name" name="rsos" align="center">
    </div>
</div>
</div>

	
	<div class = "space"> </div>
	
	
    <button type="submit" class="btn btn-default">Create</button>
	
	<div class = "space"> </div>
	
  </form>
</div>

</body>
</html>
   

