<!DOCTYPE html>
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
.space {
  height: 40px;
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
                <li class="active"><a href="#">Home</a></li>
            </ul>
        </div>
    </nav>

<div class="container">
  <h2>Create Event</h2>
  <div class = "space"> </div>
  
  <div class = "row">
		<div class = "col-md-6">
			<form action="eventCreated.php" method="post">
			<div class="form-group">
      <label for="category">Catgegory</label>
      <input type="category" class="form-control" id="category" placeholder="Enter category" name="category">
    </div>
		</div>
</div>

<div class = "space"> </div>

    <div class="form-group">
      <label for="title">Title</label>
      <input type="title" class="form-control" id="email" placeholder="Enter title" name="title">
    </div>
	
	<div class = "space"> </div>
	
    <div class="form-group">
      <label for="pwd">Description</label>
	  <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
    </div>
	
	<div class = "space"> </div>
	
	 <div class="form-group">
      <label for="date">When</label>
      <input type="date" class="form-control" id="date" placeholder="Month/Day/Year" name="date">
    </div>
	
	<div class = "space"> </div>
	
	<div class="form-group">
      <label for="contact_email">Contact Email</label>
      <input type="text" class="form-control" id="contact_email" placeholder="" name="contact_email">
    </div>
	
	<div class = "space"> </div>
	
	<div class="form-group">
      <label for="contact_phone">Contact Phone Number</label>
      <input type="text" class="form-control" id="contact_phone" placeholder="(407) XXX-XXXX" name="contact_phone">
    </div>
	
	<div class = "space"> </div>
	
    <button type="submit" class="btn btn-default">Create Event</button>
	
	<div class = "space"> </div>
	
  </form>
</div>

</body>
</html>
   

