<?php
session_start();
$session=$_SESSION["session"];
if(!$session) {
	header("Location:index.php");
	die();
}
require_once ('dhb.php');
$myusername=$_SESSION["username"];
if($_SERVER["REQUEST_METHOD"] == "POST"){
if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT *from profilepage WHERE username='$myusername'");
    $row = mysqli_fetch_array($result);
    if ($_POST["currentpassword"] == $row["password"]) {
        mysqli_query($conn, "UPDATE profilepage set password='" . $_POST["newpassword"] . "' WHERE username='$myusername'");
        $message = "Password Changed";
    } else
        $message = "Current Password is not correct";
}
}
?>

<html>
<head>
<title>Change Password</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
currentPassword.focus();
document.getElementById("currentPassword").innerHTML = "required";
output = false;
}
else if(!newPassword.value) {
newPassword.focus();
document.getElementById("newPassword").innerHTML = "required";
output = false;
}
else if(!confirmPassword.value) {
confirmPassword.focus();
document.getElementById("confirmPassword").innerHTML = "required";
output = false;
}
if(newPassword.value != confirmPassword.value) {
newPassword.value="";
confirmPassword.value="";
newPassword.focus();
document.getElementById("confirmPassword").innerHTML = "not same";
output = false;
} 
return output;
}
</script>

<style>
* {
  box-sizing: border-box;
}

/* Style the body */
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0px;
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

input[type=password] {
  width: 30%;
  position:relative;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  border-radius: 5px;
  background: #f1f1f1;
}
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
  width:70%;
}
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 30%;
  position:relative;
  opacity: 0.9;
}
.registerbtn:hover {
  opacity: 1;
}
.cont {
	text-align: center;
}
h2{
text-align: center;
font-size : 40px;
color: chocolate;
}
</style>

</head>

<body>
<div class="header">
  <h1>Student Portal</h1>
</div>
<div class="navbar">
  <a href="home.php" >Home</a>
  <a href="profile.php">My Profile</a>
  <a href="regslip.php">Registration Slip</a>
  <a href="results.php">Results</a>
  <a href="#" class="active">Change Password</a>
  <a href="logout.php">Logout</a>
</div>
<h2>Change Password</h2>
<form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
<div><?php if(isset($message)) { echo $message; } ?></div>
<div class="cont">
    <hr>
    <input type="password" placeholder="Enter old password" name="currentpassword" id="currentpassword" required>
    <br/>
    <input type="password" placeholder="Enter new password" name="newpassword"  id="newpassword" required>
    <br/>
    <input type="password" placeholder="Confirm Password" name="confirmpassword" id="confirmpassword" required>
	<br/>
    <button type="submit" class="registerbtn">Submit</button>
	<hr>
</div>
</form>
<br>
<br>
<div class="footer">
  Designed by - Asritha, Sarvani,Sahiti
</div>
</body></html>

