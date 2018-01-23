<?php
	error_reporting(0);
	
	$Status = $_POST["ServerPost"];
	
	$servername = "localhost";
	$serverusername =  "root";
	$serverpassword = "";
	$dbName = "puzlo";
		
		
	//Make Connection With Database
	$conn = new mysqli($servername, $serverusername, $serverpassword, $dbName);
	
	//Check Connection
	if(!$conn){
		die("Connection Failed. ". mysqli_connect_error());
	}
	
	//variables to get from the user via unity to login
	$username = $_POST["Username_Post"];
	$screenname = $username;
	$email = $_POST["Email_Post"]
	$password = $_POST["Password_Post"];
	$ip = $_POST["Ip_Post"];
	$date = $
	
	$Banned = array("Maandag", "Dinsdag", "Woensdag", "Donderdag");
	
		
	//ip
	if ($Status == 0) {
	
		//Get Ip
		$ipaddress = '';

		if (getenv('HTTP_CLIENT_IP')) {
			$ipaddress = getenv('HTTP_CLIENT_IP');
		}
		else if(getenv('HTTP_X_FORWARDED_FOR')) {
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		}
		else if(getenv('HTTP_X_FORWARDED')) {
			$ipaddress = getenv('HTTP_X_FORWARDED');
		}
		else if(getenv('HTTP_FORWARDED_FOR')) {
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		}
		else if(getenv('HTTP_FORWARDED')) {
		   $ipaddress = getenv('HTTP_FORWARDED');
		}
		else if(getenv('REMOTE_ADDR')) {
			$ipaddress = getenv('REMOTE_ADDR');
		}
		else {
			$ipaddress = 'UNKNOWN';
		}

		$_SESSION['ip'] = $ipaddress;
		
		//Check for Ip
		$sql = "SELECT Ip FROM users WHERE Ip = '$ipaddress'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_row($result);
		
			
		//Multiple
		if (count($row) >= 2) {
			echo "2/" .$ipaddress;

		}
		
		//One
		if (count($row) == 1) {
		
			$sql1 = "SELECT Username FROM users WHERE Ip = '$ipaddress'";
			$result1 = mysqli_query($conn, $sql1);
			$row1 = mysqli_fetch_row($result1);
			echo "1/" .$ipaddress ."/" .$row1[0];
		}
				
		//None
		if (count($row) <1) {
			echo "0/" .$ipaddress;

		}
	}
	
	//login
	if ($Status == 2) {
		
		//Check username
		$sql6 = "SELECT Username FROM users WHERE Username = '$username'";
		$result6 = mysqli_query($conn, $sql6);
		$row6 = mysqli_fetch_row($result6);

		//username
		if ($username == $row6[0]) {
			
		}
			
		else {
			//no username
		}
	}
	
	//register
	if ($Status == 1) {
		
		//Check if username is taken
		$sql2 = "SELECT Username FROM users WHERE Username = '$username'";
		$result2 = mysqli_query($conn, $sql2);
		$row2 = mysqli_fetch_row($result2);

		//username already taken
		if ($username == $row2[0]) {
			echo "0/" .$username;
		}
	
		
		
			else {
				$sql4 = "INSERT INTO users (username, email, password, ip)
				VALUES ('".$username."', '".$email."', '".$password."',  '".$clientip."')";
				$result4 = mysqli_query($conn ,$sql4);
		
				if(!$result4) {
					echo "there was an error";
				}
			
				else {
					echo "2/" .$username;
				}
			}
		}
	}

	
	}
?>