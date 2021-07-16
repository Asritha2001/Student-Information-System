<?php
session_start();
$session=$_SESSION["sessiont"];
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
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
  background-image: url('https://upload.wikimedia.org/wikipedia/en/3/36/NIT_Andhra_Pradesh.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center;
}
.navbar {
  overflow: hidden;
  background-color:slategrey;
  position: sticky;
  position: -webkit-sticky;
  top: 0;
}
.navbar a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 20px 30px;
  text-decoration: none;
}
.navbar a:hover {
  background-color: #ddd;
  color: black;
}
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
<div class="navbar">
  <a href="#" class="active">Home</a>
  <a href="sub.php">Subjects Teaching</a>
  <a href="sturesults.php">Student Wise Results</a>
  <a href="subresults.php">Subject Wise Results</a>
  <a href="changet.php">Change Password</a>
  <a href="logout.php">Logout</a>
</div>
<div class="footer">
  Designed by - Asritha, Sarvani,Sahiti
</div>
</body>
</html>
