<?php
session_start();
$session=$_SESSION["session"];
if(!$session) {
	header("Location:index.php");
	die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Home Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

/* Style the body */
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0px;
  background-image: url('https://upload.wikimedia.org/wikipedia/en/3/36/NIT_Andhra_Pradesh.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center;
}

/* Header/logo Title */
.header {
  padding: 10px;
  text-align: center;
  background: #1abc9c;
  color: white;
  margin: 0px;
}

/* Increase the font size of the heading */
.header h1 {
  font-size: 36px;
  margin: 7px;
}

.navbar {
  overflow: hidden;
  background-color: #333;
  position: sticky;
  position: -webkit-sticky;
  top: 0;
}

/* Style the navigation bar links */
.navbar a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
}

/* Change color on hover */
.navbar a:hover {
  background-color: #ddd;
  color: black;
}

/* Active/current link */
.navbar a.active {
  background-color: #666;
  color: white;
}

/* Footer */
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: black;
   color: white;
   text-align: center;
   padding: 5px;
}

</style>
</head>
<body>
<div class="header">
  <h1>Student Portal</h1>
</div>
<div class="navbar"> 
  <a href="#" class="active">Home</a>
  <a href="profile.php">My Profile</a>
  <a href="regslip.php">Registration Slip</a>
  <a href="results.php">Results</a>
  <a href="change.php">Change Password</a>
  <a href="logout.php">Logout</a>
</div>
<div class="footer">
  Designed by - Asritha, Sarvani,Sahiti
</div>
</body>
</html>
