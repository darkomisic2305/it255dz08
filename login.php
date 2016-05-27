<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<h1 class="jumbotron">Login to Met Hotels</h1>
		
		<form class="form-horizontal" role="form" action="login.php" method="POST">
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
		        <button type="submit" name="submit" class="btn btn-success" style="float: right;">LOGIN</button>
		        <a href="index.php" type="text" name="cancel" class="btn btn-default" style="float: right; margin-right: 1%;">Cancel</a>
		      </div>
		    </div>
	  	</form>

	  	<?php 
			session_start();
			include("functions.php");
			if(isset($_POST['submit'])) {
				$username = $conn->real_escape_string($_POST['username']);
				$password = $_POST['password'];
				if(!empty($username) && !empty($password)) {
					if(proveriKorisnika($username, $password)) {
						$_SESSION['username'] = $username;
						echo "Uspesno logovanje.";
						header("Location: indexLoggedIn.php");
					} else {
						echo "Pogresan username ili password.";
					}
					//echo(proveriKorisnika($username, $password));
				} else {
					echo "Niste uneli sve podatke.";
				}
			}
			if(isset($_SESSION['username'])) {
				echo "Ulogovani ste kao ".$_SESSION['username'].".";
			} 
		?>
	</div>
</body>
</html>
