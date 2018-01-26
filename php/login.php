<?php 
//session_start(); 
?>

<?php
	//Hide errors
	//error_reporting(0);
	
	//Database variabelen
	$servername = "localhost";
	$serverusername =  "root";
	$serverpassword = "";
	$dbName = "puzlo";
	
	//0 = can not connect to database
	//1 = username is banned 
	//2 = email is banned 
	//3 = username is not in database
	//4 = email is not in database
	//5 = failed login attempt - Wrong password
	//6 = success
	
	//Make Connection with database
	$conn = new mysqli($servername, $serverusername, $serverpassword, $dbName);
	
	//Check connection
	if(!$conn){
		die("Connection Failed. ". mysqli_connect_error());
		echo "0/can not connect to database/";
	}
	
	//Connection working
	else {
		
		//Get username from Post
		if (isset($_POST['accountidname']) && isset($_POST['pwd'])) {
			$username = $_POST["accountidname"];
			
			//Check if email or not
			$at = "@";
			
			$checkmail = strpos($username,$at);
			
			//Username
			if($checkmail === false) {
				
				//Banned username array
				$Banned = array("hoi", "hoi", "hoi", "hoi");
				 
				//Check for username banned
				if (in_array($username, $Banned)) {
						echo "1/username is banned/" .$username;
				}
				
				//Not banned
				else {
					
					//Check username
					$sql = "SELECT username FROM users WHERE username = '$username'";
					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_row($result);

					//username found
					if ($username == $row[0]) {
						
						//Get password from Post
						$password = $_POST["pwd"];
						
						//Select with sql
						$sql2 = "SELECT password FROM users WHERE username = '$username'";
						$result2 = mysqli_query($conn, $sql2);
						$row2 = mysqli_fetch_row($result2);
						
						//wrong password
						if($password != $row2[0]) {
							echo "5/Username password combination not found in database/" . $username;
						}
						
						//right password
						else {
							//echo "6/success/" .$username;
							
							?>
							<script>
								window.location.href = "/bedrijfaccounthomepage.php";
							</script>
							<?php
						}
					}
					
					//no username found
					else {
						echo "3/Username password combination not found in database/" .$username;
						die();
					}
				}
			}
			
			//Email
			else {
				//Banned email array
				$Banned2 = array("hoi", "hoi", "hoi", "hoi");
				 
				//Check for email banned
				if (in_array($username, $Banned2)) {
						echo "2/email is banned/" .$username;
				}
				
				//Not banned
				else {
					
					//Check email
					$sql3 = "SELECT email FROM users WHERE email = '$username'";
					$result3 = mysqli_query($conn, $sql3);
					$row3 = mysqli_fetch_row($result3);

					//email found
					if ($username == $row3[0]) {
						
						//Get password from Post
						$password = $_POST["pwd"];
						
						//Select with sql
						$sql4 = "SELECT password FROM users WHERE email = '$username'";
						$result4 = mysqli_query($conn, $sql4);
						$row4 = mysqli_fetch_row($result4);
						
						//wrong password
						if($password != $row4[0]) {
							echo "5/Username password combination not found in database/" . $username;
						}
						
						//right password
						else {
							//echo "6/success/" .$username;
							
							?>
							<script>
								window.location.href = "/bedrijfaccounthomepage.php";
							</script>
							<?php
						}
					}
					
					//no email found
					else {
						echo "4/Email password combination not found in database/" .$username;
						die();
					}
				}
			}
			
		} else {
			echo "Username or password not set";
		}
		
	}
?>