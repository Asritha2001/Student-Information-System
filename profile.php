<?php
session_start();
$session=$_SESSION["session"];
if(!$session) {
	header("Location:index.php");
	die();
}
require_once ('dhb.php');
$myusername=$_SESSION["username"];
$sql = "SELECT * FROM profilepage where username = '$myusername' ";
$result = mysqli_query($con,$sql);
$fetchRow= mysqli_fetch_assoc($result);

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$myfullname = mysqli_real_escape_string($con,$_POST['fullname']);
	$myrname = mysqli_real_escape_string($con,$_POST['rname']);
	$myrolnumber = mysqli_real_escape_string($con,$_POST['rolnumber']);
	$mydob = mysqli_real_escape_string($con,$_POST['dob']);
	$mygender = mysqli_real_escape_string($con,$_POST['gender']);
	$mypassport = mysqli_real_escape_string($con,$_POST['passport']);
	$mynationality = mysqli_real_escape_string($con,$_POST['nationality']);
	$myjoinyear = mysqli_real_escape_string($con,$_POST['joinyear']);
	$mycourse = mysqli_real_escape_string($con,$_POST['course']);
	$mybranch = mysqli_real_escape_string($con,$_POST['branch']);
	$mysection = mysqli_real_escape_string($con,$_POST['section']);
	$myemail = mysqli_real_escape_string($con,$_POST['email']);
	$mymobnumber = mysqli_real_escape_string($con,$_POST['mobnumber']);
	$myecontact = mysqli_real_escape_string($con,$_POST['econtact']);
	$myaddress = mysqli_real_escape_string($con,$_POST['address']);
	
	$sql = "UPDATE profilepage SET fullname='$myfullname',rname='$myrname',rolnumber='$myrolnumber',dob='$mydob',gender='$mygender',passport='$mypassport',nationality='$mynationality',joinyear='$myjoinyear',course='$mycourse',branch='$mybranch',section='$mysection',email='$myemail',email='$myemail',mobnumber='$mymobnumber',econtact='$myecontact',address='$myaddress' WHERE username = '$myusername'";
    $result = mysqli_query($con,$sql);
	header("Location:profile.php"); 

}   

?>


<!DOCTYPE html>
<html>
<head>
<title> Profile Page </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

h2{
   text-align: center;
   font-size: 40px;
   color: chocolate;
}

h3{
text-align: center;
font-size: 25px;
}
.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 2%;
}
.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}
.col-75 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}
.col-50,
.col-75 {
  padding: 0 16px;
}
.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}
input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
label {
  margin-bottom: 10px;
  display: block;
}
.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}
.btn:hover {
  background-color: #45a049;
}

.button {
text-align: center;
}

@media (max-width: 800px) {
  .row {
    flex-direction: column;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>

<form action="" method="POST">
<div class="header">
  <h1>Student Portal</h1>
</div>
<div class="navbar"> 
  <a href="home.php">Home</a>
  <a href="#" class="active">My Profile</a>
  <a href="regslip.php">Registration Slip</a>
  <a href="results.php">Results</a>
  <a href="change.php">Change Password</a>
  <a href="logout.php">Logout</a>
</div>

<h2>Your Profile</h2>

<div class="row">
  <div class="col-75">
    <div class="container">
        <div class="row">
          <div class="col-50">
            <h3>Personal Information</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="fullname" placeholder="Enter your legal name" value="<?php echo $fetchRow['fullname']; ?> " >
          </div>
         </div>
            <div class="row">
              <div class="col-50">
                  <label for="Rname">**Registration Number</label>
                   <input type="text" id="Rname" name="rname" value="<?php echo $fetchRow['rname']; ?> " required >
              </div>
               <div class="col-50">
                      <label for="ronum">**Roll Number</label>
                       <input type="text" id="ronum" name="rolnumber" value="<?php echo $fetchRow['rolnumber']; ?> " required>
               </div>
              <div class="col-50">
                <label for="expyear">Date of Birth</label>
                <input type="text" id="expyear" name="dob" placeholder="13/08/2018" value="<?php echo $fetchRow['dob']; ?> " >
              </div>
              <div class="col-50">
                <label for="expmonth">Gender</label>
                   <input type="text" id="expmonth" name="gender" value="<?php echo $fetchRow['gender']; ?> " >
              </div>
              <div class="col-50">
                <label for="cvv">Passport</label>
                <input type="text" id="cvv" name="passport" value="<?php echo $fetchRow['passport']; ?> " >
              </div>
              
              <div class="col-50">
                <label for="nation">Nationality</label>
                   <input type="text" id="nation" name="nationality" value="<?php echo $fetchRow['nationality']; ?> "  >
              </div>
            </div> 
    </div>
  </div>
</div>

<div class="row">
  <div class="col-75">
    <div class="container">
        <div class="row">
          <div class="col-50">
            <h3>Course Information</h3>
          </div>
         </div>
            <div class="row">
              <div class="col-50">
                  <label>**Year of Joining</label>
                   <input type="text" name="joinyear" value="<?php echo $fetchRow['joinyear']; ?> "  required >
              </div>
               <div class="col-50">
                      <label>**Course</label>
                       <input type="text" name="course" value="<?php echo $fetchRow['course']; ?> " required>
               </div>
              <div class="col-50">
                <label>Branch</label>
                   <input type="text" name="branch" value="<?php echo $fetchRow['branch']; ?> " >
              </div>
              <div class="col-50">
                <label>Section</label>
                   <input type="text" name="section" value="<?php echo $fetchRow['section']; ?> " >
              </div>
            </div> 
    </div>
  </div>
</div>

<div class="row">
  <div class="col-75">
    <div class="container">
        <div class="row">
          <div class="col-50">
            <h3>Contact Details</h3>
          </div>
         </div>
            <div class="row">
              <div class="col-50">
                  <label>**Email Id</label>
                   <input type="text" name="email" placeholder="example@email.com" value="<?php echo $fetchRow['email']; ?> " required >
              </div>
               <div class="col-50">
                      <label>**Mobile Number</label>
                       <input type="text" name="mobnumber" value="<?php echo $fetchRow['mobnumber']; ?> " required>
               </div>
              <div class="col-50">
                <label>**Emergency Contact</label>
                   <input type="text" name="econtact" value="<?php echo $fetchRow['econtact']; ?> " required >
              </div>
              <div class="col-50">
                <label>Permanant Address</label>
                   <input type="text" name="address" value="<?php echo $fetchRow['address']; ?> " >
              </div>
            </div> 
    </div>
  </div>
</div>

<div class="button" >
     <input type="submit" value="Modify changes and submit" class="btn">
</div>
<br>
<br>
<br>
<div class="footer">
  Designed by - Asritha, Sarvani,Sahiti
</div>
</form>
</body>
</html>
