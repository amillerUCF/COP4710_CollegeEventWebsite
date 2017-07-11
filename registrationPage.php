<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
.space{
	height: 50px;
	}
body {
 padding-top: 0px;
 padding-bottom: 40px;
 background-color: #ffc904;
    }
</style>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">&#9776;</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
            </ul>
        </div>
    </nav>
	

<div class="container">
  <h2>Register</h2>
  <form action="registrationBackend.php" method="post">
  <div class="form-group">
      <label for="Name">Name:</label>
      <input type="name" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
     <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
	<div class="form-group">
      <label for="nid">NID:</label>
      <input type="nid" class="form-control" id="nid" placeholder="Enter your NID" name="nid">
    </div>
	<div class="form-group">
      <label for="nid">RSO</label>
      <input type="rsos" class="form-control" id="rsos" placeholder="Enter your student organization here" name="rsos">
    </div>
	<div class="form-group">
      <label for="university id">University:</label>
      <input type="university id" class="form-control" id="university" placeholder="university" name="university">
	  
	  <div class="space"> </div>
	  
	   <button type="submit" class="btn btn-default">Submit</button>
    </div> 
	
	
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
	
  </form>
</div>

</body>
</html>

     