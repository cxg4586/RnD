<?php
require('settings.php');
include("auth.php");
?>
<!DOCTYPE html>
<style>
#wrapper div {
	margin: 0 auto;
}
#wrapper {
	margin: 0 auto;
	width: 100%;
	text-align:center;
	position: absolute;
	top:160px;
}
img {
	border-radius: 50%;
	width: 150px;
}
#bottom {
	bottom: 20px;
}
</style>

<html>
<head>
<meta charset="utf-8">
<title>Welcome <?php echo $_SESSION['username']; ?></title>
<script src = "jquery-2.1.4.js"></script>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p>Welcome to your profile, <?php echo $_SESSION['username']; ?>!!!</p>
<p>Good.</p>

<p><a href="Home.html">Home</a></p>
<a href="logout.php">Logout</a>
</div>

<div id = "wrapper">
	<img src = "Unknown Person.png" />
	<div id = "bottom">
	<?php echo $_SESSION['username']; ?>
	</div>
</div>

</body>
</html>
