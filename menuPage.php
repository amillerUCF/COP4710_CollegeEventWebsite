<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="http://getbootstrap.com/docs-assets/ico/favicon.png">

    <title>Menu Page</title>

    <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
    body {
      padding-top: 0px;
      padding-bottom: 40px;
      background-color: #ffc904;
    }
    .form-signin {
      max-width: 330px;
      padding: 15px;
      margin: 0 auto;
    }
    .form-signin .form-signin-heading,
    .form-signin .checkbox {
      margin-bottom: 10px;
    }
    .form-signin .checkbox {
      font-weight: normal;
    }
    .form-signin .form-control {
      position: relative;
      font-size: 16px;
      height: auto;
      padding: 10px;
      -webkit-box-sizing: border-box;
         -moz-box-sizing: border-box;
              box-sizing: border-box;
    }
    .form-signin .form-control:focus {
      z-index: 2;
    }
    .form-signin input[type="text"] {
      margin-bottom: -1px;
      border-bottom-left-radius: 0;
      border-bottom-right-radius: 0;
    }
    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }

    </style>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="http://getbootstrap.com/docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
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
	<div class = "row">
				<h2 align = "center">Menu</h2>
	</div>
  <form action="/action_page.php">
    <div class= "row">
			<div class = "col-md-3"> </div>
			<div class = "col-md-6">
			<a href="searchEvents.php"
			<button class="btn btn-md btn-primary btn-block" type="submit">Search Events</button>
			</a>
			</div>
			<div class = "col-md-3"> </div>
    </div>
			<p> </p>
    <div class="row">
	<div class = "col-md-3"> </div>
			<div class = "col-md-6">
			<a href="events.html"
				<button class="btn btn-md btn-primary btn-block" type="submit">My Events</button>
			</a>
			</div>
			<div class = "col-md-3"> </div>
    </div>
		<p> </p>
	<div class="row">
		<div class = "col-md-3"> </div>
			<div class = "col-md-6">
			<a href="joinRSO.php"
		<button class="btn btn-md btn-primary btn-block" type="submit">Join RSO</button>
			</a>
		</div>
			<div class = "col-md-3"> </div>
    </div>
	<p> </p>
		<div class="row">
		<div class = "col-md-3"> </div>
			<div class = "col-md-6">
			<a href="addUniversity.php"
		<button class="btn btn-md btn-primary btn-block" type="submit">Add University</button>
			</a>
		</div>
			<div class = "col-md-3"> </div>
    </div>
	<p> </p>
	<div class="row">
	<div class = "col-md-3"> </div>
			<div class = "col-md-6">
			<a href = "createRSO.php"
	<button class="btn btn-md btn-primary btn-block" type="submit">Create RSO</button>
			</a>
			</div>
			<div class = "col-md-3"> </div>
    </div> 
	<p> </p>
	
	<div class="row">
	<div class = "col-md-3"> </div>
			<div class = "col-md-6">
				<a href = "logOut.php"
				<button class="btn btn-md btn-primary btn-block" type="submit">Log Out</button>
				</a>
			</div>
		<div class = "col-md-3"> </div>
    </div>
	
  </form>
</div>

<p> </p>
<p> </p>
<p> </p>
<p> </p>


<div class="container">
  <div class="jumbotron">
  <img src="menuBackground.jpg" class="img-rounded" alt="CFE Arena">
  <img src="UCFLogo2.jpg" class="img-rounded" alt="UCF Athletics" width="304" height="236">
  <img src="UCFEvent.jpg" class="img-rounded" alt="UCF Events">
    <h1>Book Organization's Next Event With Us!</h1>      
    <p></p>
  </div>      
</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>