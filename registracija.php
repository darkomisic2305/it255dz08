<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
	
		<h1 class="jumbotron">Sign Up to Met Hotels</h1>
		
		<form class="form-horizontal" role="form" action="registracija.php" method="POST">
		    <div class="form-group">
		      <label class="control-label col-sm-2" for="ime">First name:</label>
		      <div class="col-sm-10">
		        <input type="text" class="form-control" id="ime" name="ime" placeholder="Enter first name">
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-sm-2" for="prezime">Last name:</label>
		      <div class="col-sm-10">          
		        <input type="text" class="form-control" id="prezime" name="prezime" placeholder="Enter last name">
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-sm-2" for="username">Username:</label>
		      <div class="col-sm-10">          
		        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-sm-2" for="password">Password:</label>
		      <div class="col-sm-10">          
		        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
		      </div>
		    </div>
		    <div class="form-group">    
		      <div class="col-sm-offset-2 col-sm-10">
		        <button type="submit" name="submit" class="btn btn-success" style="float: right;">SIGN UP</button>
		        <a href="index.php" type="text" name="cancel" class="btn btn-default" style="float: right; margin-right: 1%;">Cancel</a>
		      </div>
		      
		    </div>
	  	</form>

		<?php 
		include("functions.php");
		if(isset($_POST['submit'])) {
			$ime = isset($_POST['ime']) ? $_POST['ime'] : 0;
			$prezime = isset($_POST['prezime']) ? $_POST['prezime'] : 0;
			$username = isset($_POST['username']) ? $_POST['username'] : 0;
			$password = isset($_POST['password']) ? $_POST['password'] : 0;

			if(!empty($ime) && !empty($prezime) && !empty($username) && !empty($password)) {
				dodajKorisnika($ime, $prezime, $username, $password);
						
				header("Location: login.php");
			} else {
				echo "Niste popunili sva polja!";
			}
		}
		?>
	</div>
	



</body>
</html>


