<?php 
session_start();
$session=$_SESSION["session"];
if(!$session) {
	header("Location:index.php");
	die();
}
    require_once ('dhb.php');
    $username=$_SESSION["username"];
	$sql = "SELECT * FROM profilepage where username = '$username';";
    $resultp = mysqli_query($con,$sql);
    $fetchRow= mysqli_fetch_assoc($resultp);
	$b=$fetchRow['branch'];
	$s=$fetchRow['sem'];
	$sel_query="Select * from course where branch = '$b' and sem='$s'";
    $result = mysqli_query($con,$sel_query);
?>
<!DOCTYPE html>
<html>
<head>
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
font-size : 40px;
color: chocolate;
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
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  left: 10%;
  width: 80%;
  background-color: #f2f2f2;
  padding: 0px;
  border: 0.5px solid lightgrey;
  border-radius: 5px;
  position:relative;
}

input[type=text] {
  width: 100%;
  margin-bottom: 10px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

label {
  margin: 5px;
  display: block;
}
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 70%;
  position:relative;
  left: 15%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #4CAF50;
  color: white;
}
.btn {
  background-color: #000022;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 10%;
  position:relative;
  left:45%;
  opacity: 0.9;
}
.btn:hover {
  opacity: 1;
}

p{
	font-size: 20px;
	font-family:Gill Sans;
}

@media (max-width: 800px) {
  .row {
  flex-direction: column;}
}
@media print {
  .header, .navbar , .footer{
    visibility: hidden;
  }
  .row , .table{
    visibility: visible;
  }
  h2 {
    position: absolute;
	left: 30%;
    top: 0;
  }
  .row {
	  position: absolute;
	  top: 10%;
	  width: 100%;
  }
  .table{
	  position: absolute;
	  top: 40%;
	  width: 100%;
  }
}
</style>
</head>
<body>
<div class="header">
  <h1>Student Portal</h1>
</div>

<div class="navbar">
  <a href="home.php">Home</a>
  <a href="profile.php">My Profile</a>
  <a href="#" class="active">Registration Slip</a>
  <a href="results.php" >Results</a>
  <a href="change.php">Change Password</a>
  <a href="logout.php">Logout</a>
</div>

<h2>Registration Slip</h2>
<div class="row">
    <div class="container">
        <div class="row">
              <div class="col-50">
                <label for="expyear">Name </label>
                <input type="text" id="expyear" name="name" value="<?php echo $fetchRow['fullname']; ?> " readonly>
              </div>
              <div class="col-50">
                <label for="cvv">Branch </label>
                <input type="text" id="cvv" name="branch" value="<?php echo $fetchRow['branch']; ?> " readonly>
              </div>
              <div class="col-50">
                <label for="expyear">Roll Number </label>
                <input type="text" id="expyear" name="rolname" value="<?php echo $fetchRow['rolnumber']; ?> " readonly>
              </div>
              <div class="col-50">
                <label for="expyear">Reg Number </label>
                <input type="text" id="expyear" name="rname" value="<?php echo $fetchRow['rname']; ?> " readonly>
              </div>
        </div>
    </div>
</div>

<table id="customers">
  <tr class="col">
    <th>Sl.no</th>
    <th>Sub.code</th>
    <th>Subject Name</th>
    <th>Credit(s)</th>
  </tr>
 <tbody>
<?php
	$count=1;
    while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
		<td align="center"><?php echo $count; ?></td>
        <td align="center"><?php echo $row["subcode"]; ?></td>
        <td align="center"><?php echo $row["subname"]; ?></td>
        <td align="center"><?php echo $row["credit"]; ?></td>
        </tr>
<?php $count++ ;} ?>
  </tbody>
</table>
<br>

<button class="btn" onclick="window.print()">Print</button>
<br>
<br>
<br>
<div class="footer">
  Designed by - Asritha, Sarvani,Sahiti
</div>

</body>
</html>
