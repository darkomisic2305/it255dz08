<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "it255dz08";

	$conn = new mysqli($servername, $username, $password, $database);

	if($conn->connect_error) {
		die("Konekcija ima gresku: " . $conn->connect_error);
	}
?>