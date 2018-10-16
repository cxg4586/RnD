<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>

<style>
html {
    background-image: url("New Zealand Travel.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center; 
    text-align: center;
}

body {
	background-image: url("New Zealand Travel.jpg");
	font-family: "Times New Roman", Times, serif;
}

table, th, td {
	border: 1px solid black;
}

div.container {
	margin: auto;
	width: 60%;
    border: 2px solid gray;
	padding: 1px;
	background-color: white;
	font-family: "Times New Roman", Times, serif;
}
div.container2 {
	width: 10%;
    border: 2px solid gray;
	padding: 1px;
	background-color: white;
	font-family: "Times New Roman", Times, serif;
	position:relative;
	top: -120px;
	left: 40px;
	text-align: center;
	
	display: grid;
	grid-template-columns: auto;
	background-color: gainsboro;
	padding: 3px;
}
div.items {
    background-color: white;
    border: 1px solid #000000;
    padding: 3px;
    font-size: 15px;
    text-align: center;
}

* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: "Arial", Helvetica, sans-serif;
}

div.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

div.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 16px;
}

div.topnav a:hover {
  background-color: #ddd;
  color: black;
}

div.topnav a.active {
  background-color: #2196F3;
  color: white;
}

div.topnav .search-container {
  float: right;
}

div.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

div.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

div.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  div.topnav .search-container {
    float: none;
  }
  div.topnav a, div.topnav input[type=text], div.topnav div.search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  div.topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
</style>


<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="css/style.css" />

</head>
<body>

<h1><font color = "white"><center>New Zealand Tourism Research Institute</center><font></h1>

<div class="topnav">
	<b><a href = "Register Form.html">Registration</b>
	<b><a href = "Login Form.html">Login</b>
	<b><a href = "About Us.html">About Us</a></b></font>
	<font size = "4" color = "black">
	<b><a href = "Holiday Destinations.html">Holiday Destinations</a></b>
	<b><a href = "Tourist Attractions.html">Tourist Attractions</a></b>
  <div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search..." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>

</br>
<div class = "container">
<p><font color = "black">New Zealand Tourism Research Institute (NZTRI) is a company which is all about travel and tourism.<br>
<table align = "center">
	<tr>
		<th><b>Contact Details</b></th>
	</tr>
	<tr>
		<td><b>Location:</b> Auckland University of Technology in WH105 &nbsp </td>
	</tr>
	<tr>
		<td><b>Email:</b> nztri@aut.ac.nz</td>
	</tr>
	<tr>
		<td><b>Phone:</b> 64 9 921 9999 Ext 8890</td>
	</tr>
</table>
</font></p>

<div class="form">
<p><b>Welcome <?php echo $_SESSION['username']; ?>!!!</b></p>
<p>This is secure area.</p>
<p><a href="dashboard.php">Dashboard</a></p>
<a href="logout.php">Logout</a>
</div>

</div>

<div class = "container2">
	<div class = "items"><p><b><font color = "black" size = "4">Catalogue</font></b></p></div>
	<div class = "items"><p><font color = "black"><a href = "Newsletter.html">Newsletter</a></font></p></div>
	<div class = "items"><p><font color = "black"><a href = "Feedback.html">Feedback</a></font></p></div>
</div>

</body>
</html>