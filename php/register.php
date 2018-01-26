<?php 
//session_start(); 
?>

<?php
	//Hide errors
	error_reporting(0);

	//Database variabelen
	$servername = "localhost";
	$serverusername =  "root";
	$serverpassword = "";
	$dbName = "puzlo";
	
	//0 = can not connect to database
	//1 = password does not match
	//2 = username is banned 
	//3 = username in use
	//4 = email not valid
	//5 = email in use
	//6 = can not insert into databse
	//7 = success
	
	//Dutch:
	//Eerst checken of de databse connection kan maken, anders vult de gebruiker alle gegevens voor niks in.
	//Dan checken of de gebruiker wel 2 dezelfde passwords heeft ingevuld, dt kan gemakkelijk gecontroleerd worden.
	//Daarna wordt gekeken of de username acceptabel is, dit kan ook gemakkelijk zonder de databse door te spitten.
	//Vervolgens wordt gekeken of de username al ingebruik is, dit wordt in de database opgezocht.
	//Tot slot wordt ook in de databse gecheckt of het email address al in gebruik is.
		
	//Make Connection with database
	$conn = new mysqli($servername, $serverusername, $serverpassword, $dbName);
	
	//Check connection
	if(!$conn){
		die("Connection Failed. ". mysqli_connect_error());
		echo "0/can not connect to database/";
	}
	
	//Connection working
	else {
		
		if (isset($_POST['accountidname']) && isset($_POST['pwd'])) {
			
			
			//Get username from Post
			$username = $_POST["accountidname"];
			$screenname = $username;
			
			//Get password from Post
			$password = $_POST["pwd"];
			$password2 = $_POST["pwd2"];
			
			//Check for password
			if ($password != $password2){
				echo "1/password does not match/" .$username;
			}
			
			//Password is the same
			else {
				
				//Banned username array
				$Banned = array("hoi", "hoi", "hoi", "hoi");
				 
				//Check for username banned
				if (in_array($username, $Banned)) {
						echo "2/username is banned/" .$username;
				}
				
				//Username is approved
				else {
			
					//Check if username is taken
					$sql = "SELECT username FROM users WHERE username = '$username'";
					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_row($result);

					//username already taken
					if ($username == $row[0]) {
						echo "3/username in use/" .$username;
					}
					
					//username is not taken
					else {	
					
						//Get email from Post
						$email = $_POST["accountemail"];
						
						//Check if email is valid
						$at = "@";
						
						$checkmail = strpos($email,$at);
						
						//Does not contain @, so not valid
						if($checkmail === false) {
							echo "4/email not valid/" .$username;
						}
						
						//Email is approved
						else {
							
							//Check if email is in use
							$sql2 = "SELECT email FROM users WHERE email = '$email'";
							$result2 = mysqli_query($conn, $sql2);
							$row2 = mysqli_fetch_row($result2);

							//email already taken
							if ($email == $row2[0]) {
								echo "5/email in use/" .$username;
							}
							
							//email is not taken
							else {
								
								//Get ip
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

								//Ip
								$_SESSION['ip'] = $ipaddress;	
								
								//Get age from Post
								$age = $_POST["accountage"];
								
								//All values are here and have been checked
								
								//INSERT into database
								$sql3 = "INSERT INTO users (username, screenname, email, password, age, ip) 
								VALUES ('".$username."', '".$screenname."', '".$email."', '".$password."', '".$age."', '".$ipaddress."')";
								
								$result3 = mysqli_query($conn ,$sql3);
								$row3 = mysqli_fetch_row($result3);
				
								//Error creating user
								if(!$result3) {
									echo "6/can not insert into database/" .$username;
								}
			
								//Success
								else{
									//echo "7/success/" .$username;
									
									//JS redirect omdat PHP Header niet werkt
									?>
									<script>
										window.location.href = "/bedrijfaccounthomepage.php";
									</script>
									<?php
								}
							}
						}
					}
				}
			}
			
			} else {
			echo "Username or password not set";
		}
	}
?>