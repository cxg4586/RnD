<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: "Times New Roman", Times, serif;
    background-color: green;
}

* {
    box-sizing: border-box;
}

/* Add padding to containers */
.container {
    padding: 15px;
    background-color: beige;
}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

/* Overwrite default styles of hr */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 20px;
}

/* Set a style for the submit button */
.registerbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.8;
}

.registerbtn:hover {
    opacity: 1;
}

/* Add a blue text color to links */
a {
    color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
    background-color: #f1f1f1;
    text-align: center;
}
</style>

<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('settings.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username); 
	$fname = stripslashes($_REQUEST['fname']);
	$fname = mysqli_real_escape_string($con,$fname);
	$lname = stripslashes($_REQUEST['lname']);
	$lname = mysqli_real_escape_string($con,$lname);
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$trn_date = date("Y-m-d H:i:s");
		$querycreatetable = "CREATE TABLE IF NOT EXISTS userlist( id int(11) NOT NULL AUTO_INCREMENT, username varchar(50) NOT NULL, fname varchar(50) NOT NULL, lname varchar(50) NOT NULL, email varchar(50) NOT NULL,
		password varchar(50) NOT NULL, trn_date datetime NOT NULL, PRIMARY KEY (id) )";
		mysqli_query($con, $querycreatetable);
        $query = "INSERT into `userlist` (username, password, fname, lname, email, trn_date)
		VALUES ('$username', '".md5($password)."', '$fname', '$lname', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
			<h3>You are registered successfully.</h3>
			<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="form">
<div class="container">
<h1>Registration</h1>
<form name="registration" action="" method="post">
First Name: <input type="text" name="fname" placeholder="First Name" required /><br/>
Last Name: <input type="text" name="lname" placeholder="Last Name" required /><br/>
Username: <input type="text" name="username" placeholder="Username" required /><br/>
Email: <input type="text" name="email" placeholder="Email" required /><br/>
Password: <input type="password" name="password" placeholder="Password" required /><br/>
<input type="submit" name="submit" value="Register" /><br/>
</div>

<div class="container signin">
    <p>Already have an account? <a href="login.php">Go To Login Page</a>.</p>
	<b><a href = "Home.php"><button>Go Back to the Home Page</button></a></b>
</div>
</form>
</div>
<?php } ?>
</body>
</html>