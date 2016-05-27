<?php 
	include("config.php");

	function proveriDaLiKorisnikVecPostoji($username) {
		global $conn;
		$sql = "SELECT * FROM korisnik WHERE username=?";
		$query = $conn->prepare($sql);
		$query->bind_param('s', $username);
		$query->execute();
		$query->store_result();
		if($query->num_rows > 0) {
			return true;
		} else {
			return false;
		}
		$query->close();
	}

	function getImePrezime($username) {
		global $conn;
		$sql = "SELECT ime, prezime FROM korisnik WHERE username=?";
		$query = $conn->prepare($sql);
		$query->bind_param('s', $username);
		$query->execute();
		$query->store_result();
		$query->bind_result($ime, $prezime);
		$returnvalue = "";
		while($query->fetch()) {
			$returnvalue = $ime." ".$prezime;
		}
		$query->free_result();
		$query->close();
		return $returnvalue;
	}

	function dodajKorisnika($ime, $prezime, $username, $password) {
		global $conn;
		$pass = md5($password);

		if(!proveriDaLiKorisnikVecPostoji($username)) {
			$insert = "INSERT INTO korisnik (ime, prezime, username, password) VALUES (?, ?, ?, ?)";
			$query = $conn->prepare($insert);
			$query->bind_param('ssss', $ime, $prezime, $username, $pass);
			$query->execute();
			$query->close();
			echo "Korisnik ".$ime." ".$prezime." je uspesno registrovan.";
		} else {
			echo "Korisnik ".$username." vec postoji!";
		}
		return true;
	}

	function proveriKorisnika($username, $password) {
		global $conn;
		$pass = md5($password);
		
		$sql = "SELECT * FROM korisnik WHERE username=? AND password=?";
		$query = $conn->prepare($sql);
		$query->bind_param('ss', $username, $pass);
		$query->execute();
		$query->store_result();
		
		if($query->num_rows > 0) {
			return 1;
		} else {
			return 0;
		}

		$query->close();
	}	
?>