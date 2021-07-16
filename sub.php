<?php 
session_start();
$session=$_SESSION["sessiont"];
if(!$session) {
	header("Location:index.php");
	die();
}
    require_once ('dhb.php');
    $username=$_SESSION["user"];
	$sql = "SELECT * FROM subteach where username = '$username';";
    $resultp = mysqli_query($con,$sql);
    
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
<div class="navbar">
  <a href="homet.php" >Home</a>
  <a href="#" class="active">Subjects Teaching</a>
  <a href="sturesults.php">Student Wise Results</a>
  <a href="subresults.php">Subject Wise Results</a>
  <a href="changet.php">Change Password</a>
  <a href="logout.php">Logout</a>
</div>
<h2>Subjects Teaching	</h2>
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
    while($row = mysqli_fetch_assoc($resultp)) { ?>
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