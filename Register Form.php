<?php

if (isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["gender"]) && isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["pswd"]) 
&& isset($_POST["repeatpswd"])) {
	
	date_default_timezone_set("Pacific/Auckland");
	$registerdate = date("Y-m-d");
	$registertime = date("h:i:sa");
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$gender = $_POST["gender"];
	$email = $_POST["email"];
	$username = $_POST["username"];
	$pswd = $_POST["pswd"];
	$repeatpswd = $_POST["repeatpswd"];
	
	$fnamepattern = "/[A-Za-z-]/";
	$lnamepattern = "/[A-Za-z-]/";
	$emailpattern = "/[A-Za-z0-9]/";
	$usernamepattern = "/[A-Za-z0-9]/";
	$pswdpattern = "/[A-Za-z0-9]/";
	$repeatpswdpattern = "/[A-Za-z0-9]/";
	
	$fnameerror = $lnameerror = $emailerror = $usernameerror  = $pswderror = $repeatpswderror  = "";
	
	if (!preg_match($fnamepattern, $fname)) {
		$fnameerror = "<p>First Name input is invalid. Text input required!</p>";
	}
	if (!preg_match($lnamepattern, $lname)) {
		$lnameerror = "<p>Last Name input is invalid. Text input required!</p>";
	}
	if (!preg_match($emailpattern, $email)) {
		$emailerror = "<p>Email input is invalid. Please try again!</p>";
	}
	if (!preg_match($usernamepattern, $username)) {
		$usernameerror = "<p>Username input is invalid. Please try again!</p>";
	}
	if (!preg_match($pswdpattern, $pswd)) {
		$pswderror = "<p>Password input is invalid. Please try again!</p>";
	}
	if (!preg_match($repeatpswdpattern, $repeatpswd)) {
		$repeatpswderror = "<p>Repeated Password input is invalid. Please try again!</p>";
	}
	
	if (!empty($fnameerror) || !empty($lnameerror) || !empty($emailerror) || !empty($usernameerror) || !empty($pswderror) || !empty($repeatpswderror)) {
		echo $fnameerror . $lnameerror . $emailerror . $usernameerror . $pswderror . $repeatpswderror;
	} else {
		require_once("settings.php");
		
		$conn = @mysqli_connect($host,
				$user,
				$pswd,
				$dbnm);
			
			// To Check if connection is successful				
			if (!$conn) {
				// Displays an error message
				echo "<p>Database connection failure</p>";
			} else {
				// After connection is successful
				$queryCreateTable = "CREATE TABLE `register` (`username` INT(11) NOT NULL AUTO_INCREMENT,`registerdate` DATE NOT NULL,`registertime` TIME NOT NULL,`fname` VARCHAR(255) NOT NULL,`lname` VARCHAR(255) NOT NULL,`email` VARCHAR(255) NOT NULL,`username` VARCHAR(255) NOT NULL,`pswd` VARCHAR(255) NOT NULL,`repeatpswd` VARCHAR(255) NOT NULL,`genStatus` VARCHAR(255) NOT NULL,PRIMARY KEY (`username`))COLLATE='utf8_general_ci' ENGINE=InnoDB";
				mysqli_query($conn, $queryCreateTable);
				// insert everything into the table
				$query = "INSERT INTO register(registerdate, registertime, fname, lname, email, username, pswd, repeatpswd, genStatus) VALUES ('$registerdate', '$registertime', '$fname', '$lname', '$email', '$username', '$pswd', '$repeatpswd', 'registered')";
				// Executes the query and store result into the result pointer
				$result = mysqli_query($conn, $query);
				// Checks if the execuion was successful
				if(!$result) {
					// An error message appears
					echo "<p>Registration was Unsuccessful, Please try again!</p>";
				} else {
					// Execution was successful so success message displays
					echo "<p>Registration is Successful! Your Username is ". mysqli_insert_id($conn) ." <br> Hello $fname Thank You for Registering!</p>";
				}
				// Close the database connection
				mysqli_close($conn);
			}
	} else {
		// Error message appears if any error occurs
		echo "An Error occurred, Please try again!" ;
	}
}

?>