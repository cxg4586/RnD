<?php
session_start();
$username = $_SESSION['username'] ?? false;
$isadmin = $_SESSION['isadmin'] ?? false;
?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
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
        position: relative;
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

    * {
        box-sizing: border-box;
    }

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

    ---
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    * {
        box-sizing: border-box;
    }

    /* Create a column layout with Flexbox */
    .row {
        display: flex;
    }

    /* Right column (menu) */
    .right {
        flex: 35%;
        padding: 0px 0;
    }

    /* Style the search box */
    #mySearch {
        float: right;
        width: 25%;
        font-size: 18px;
        padding: 10px;
        border: 1px solid #ddd;
    }

    /* Style the navigation menu inside the left column */
    #myMenu {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    #myMenu li a {
        background-color: #f6f6f6;
        padding: 1px;
        text-decoration: none;
        font-size: 18px;
        color: black;
        display: block;
    }

    #myMenu li a:hover {
        background-color: #eee;
    }


    * {
        box-sizing: border-box;
    }

    body {
        font-family: Verdana, sans-serif;
    }

    .mySlides {
        display: none;
    }

    img {
        vertical-align: middle;
    }

    /* Slideshow container */
    .slideshow-container {
        max-width: 1050px;
        max-height: 550px;
        position: relative;
        margin: auto;
    }

    /* Caption text */
    .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 80%;
        text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active {
        background-color: #717171;
    }

    /* Fading animation */
    .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @-webkit-keyframes fade {
        from {
            opacity: .4
        }
        to {
            opacity: 1
        }
    }

    @keyframes fade {
        from {
            opacity: .4
        }
        to {
            opacity: 1
        }
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
        .text {
            font-size: 11px
        }
    }

    .map-container {
        text-align: center;
        padding: 10px;
    }
</style>


<html>
<head>
    <meta charset="utf-8">
    <title>New Zealand Tourism Research Institute</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css"/>

</head>
<body>

<h1><font color="white">
        <center>New Zealand Tourism Research Institute</center>
        <font></h1>

<div class="topnav">
    <b><a href="About Us.html">About Us</a></b></font>
    <b><a href="Holiday Destinations.html">Holiday Destinations</a></b>
    <b><a href="Tourist Attractions.html">Tourist Attractions</a></b>
    <b><a href="register.php">Registration</a></b>
    <b><a href="profile.php">Profile Page</a></b>

    <b><a href="Newsletter.html">Newsletter</a></b>
    <b><a href="topics.php">Discussion Forum</a></b>
    <?php
    if ($username) {
        echo '  <b><a href="#">Welcome ' . ($isadmin ? 'Admin: ' : 'User: ') . $username . '!</a></b>
                <b><a href="logout.php">Logout</a></b>';
    } else {
        echo '<b><a href="login.php">Login</a></b>';
    }
    ?>
    <div class="row">
    </div>
    <div class="row">
        <div class="right" style="background-color:#e9e9e9;">
            <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." title="Type in a category">
        </div>
    </div>
    <script>
        function myFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("mySearch");
            filter = input.value.toUpperCase();
            ul = document.getElementById("myMenu");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }
    </script>
</div>

</br>
<div class="slideshow-container">

    <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="img_lights_wide.jpg" style="width:100%">
        <div class="text">New Zealand</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="img_mountains_wide.jpg" style="width:100%">
        <div class="text">Tree</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="img_nature_wide.jpg" style="width:100%">
        <div class="text">South Pacific</div>
    </div>

</div>
<br>

<div style="text-align:center">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
</div>

<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
</script>

</br>
<div class="container">
    <font color="black">

        <div class="form">
            <p><b>Welcome to NZTRI!!!</b></p>
            <p>This is a secure website.</p>
        </div>
    </font>
</div>

<div class="map-container">
    <iframe class="map"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d100868.22638232367!2d176.23226345275316!3d-37.81037529156564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d6e792427a928bd%3A0x500ef6143a30c40!2sTe+Puke!5e0!3m2!1sen!2snz!4v1552210816103"
            width="600" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

</body>
</html>
