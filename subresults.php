<?php 
session_start();
$session=$_SESSION["sessiont"];
if(!$session) {
	header("Location:index.php");
	die();
}
$p = false;
require_once ('dhb.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $code=$_POST['subcode'];
	$year=$_POST['year'];
    $sel_query="Select * from course where subcode='$code'";
    $result = mysqli_query($con,$sel_query);
	$row= mysqli_fetch_assoc($result);
	$b=$row['branch'];
	$s=$row['sem'];
    $n=$row['no'];
	$v=$b.$s;
	$query="Select `$n` from $v where year='$year'";
    $res = mysqli_query($con,$query);
	$p=true;
}
?>
<head>
<style>
* {
  box-sizing: border-box;
}
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0px;
}
.navbar {
  overflow: hidden;
  background-color:slategrey;
  position: sticky;
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
input[type=text] {
  width: 20%;
  position:relative;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  border-radius: 5px;
  background: #f1f1f1;
}
input[type=text]:focus{
  background-color: #ddd;
  outline: none;
}
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
  width:70%;
}
.registerbtn {
border-style: solid;
  border-color: #4CAF50;
  border-radius: 5px;
  background-color: #4CAF50;
  color: white;
  padding: 13px 20px;
  margin: 8px 0;
  cursor: pointer;
  width: 10%;
  position:static;
}
.registerbtn:hover {
  background-color: white;
  border-style: solid;
  border-color: #4CAF50;
  color: #4CAF50;
  }
.cont {
	text-align: center;
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
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 30%;
  position:relative;
  left: 30%;
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
#customers td {
  padding-top: 12px;
  padding-bottom: 12px;
  padding-left: 20px;
  padding-right: 20px;
  text-align: center;
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

@media print {
  .header, .navbar , .footer{
    visibility: hidden;
  }
   .table{
    visibility: visible;
  }
  h2 {
    position: absolute;
	left: 30%;
    top: 0;
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
  <a href="homet.php">Home</a>
  <a href="sub.php">Subjects Teaching</a>
  <a href="sturesults.php">Student Wise Results</a>
  <a href="#" class="active">Subject Wise Results</a>
  <a href="changet.php">Change Password</a>
  <a href="logout.php">Logout</a>
</div>
<h2>Subject Results</h2>
<form method="post" action="">
<div class="cont">
    <hr>
    <input type="text" placeholder="Enter Sub-Code" name="subcode" id="subcode" required>
	<input type="text" placeholder="Enter Year" name="year" id="year" required>
    <button type="submit" class="registerbtn">Submit</button>
	<hr>
</div>
</form>
<table id="customers">
	<?php if($p){ ?>
<?php
      $i=0;
	  $f=0;
	  $t=0;
    while($Row= mysqli_fetch_assoc($res)) { $t ++;
	     if(strcasecmp($Row[$n],'F')) {  $i ++;}
          else if(strcasecmp($Row[$n],'F') == 0) {   $f ++;}		 ?>																
	<?php } ?>
    <tr>
    <th>Number of students passed:</th>
    <td><?php echo $i; ?></td>
  </tr>
  <tr>
    <th>Number of students failed:</th>
    <td><?php echo $f; ?></td>
  </tr>
  <tr>
    <th>Pass percentage:</th>
	
    <td><?php if($t !=0){$num=($i/$t)*100;
	echo number_format((float)$num, 2, '.', '') ;}
         else{echo "0";}	?></td>
  </tr>
</table><br>
<button class="btn" onclick="window.print()">Print</button>
<?php } ?>
<br>
<br>
<br>
<div class="footer">
  Designed by - Asritha, Sarvani,Sahiti
</div>
</body>