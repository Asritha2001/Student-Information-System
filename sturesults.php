<?php 
session_start();
$session=$_SESSION["sessiont"];
if(!$session) {
	header("Location:index.php");
	die();
}
$s=9;
$p = false;
require_once ('dhb.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $rol=$_POST['rol'];
    $sel_query="Select * from profilepage where rolnumber='$rol'";
    $result = mysqli_query($con,$sel_query);
	$fetchRow= mysqli_fetch_assoc($result);
	$b=$fetchRow['branch'];
	$cc=$fetchRow['rname'];
	$ss=$fetchRow['section'];
	$s=$fetchRow['sem'];
	$z=$s-1;
	if($z<3){
		if(isset($_POST["btn"])){
			$z=$_POST["sem"];
		}
		$v=$ss.$z;
		$sel_q="Select * from course where sem='$z'";
        $res= mysqli_query($con,$sel_q);
	}
	else{
	   if(isset($_POST["btn"])){
			$z=$_POST["sem"];
		}
		if($z<3){
			$v=$ss.$z;
			$sel_q="Select * from course where sem='$z'";
			$res= mysqli_query($con,$sel_q);
		}
		else{
			$v=$b.$z;
			$sel_q="Select * from course where branch = '$b' and sem='$z'";
			$res= mysqli_query($con,$sel_q);
		}
	}
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
  width: 30%;
  position:static;
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
select {
  width: 10%;
  position:static;
  padding: 14px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  border-radius: 5px;
  background: #f1f1f1;
}
select:focus{
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

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 2%;
}

.row input{
  width: 100%;
    background-color: #ddd;
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
.btn1 {
  background-color: #000022;
  color: white;
  padding: 16px 20px;
  margin: 20px 0;
  border: none;
  cursor: pointer;
  width: 30%;
  position:relative;
  opacity: 0.9;
}
.btn1:hover {
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
  <a href="homet.php">Home</a>
  <a href="sub.php">Subjects Teaching</a>
  <a href="#" class="active">Student Wise Results</a>
  <a href="subresults.php">Subject Wise Results</a>
  <a href="changet.php">Change Password</a>
  <a href="logout.php">Logout</a>
</div>
<h2>Student Results</h2>
<form method="post" action="">
<div class="cont">
    <hr>
    <input type="text" placeholder="Enter Roll-Number" name="rol" id="rol" required>
	<select id="sem" name="sem">
  <option value="0" >Semester</option>
  <?php for($i=1;$i<$s ;$i++){  ?>
  <option value= "<?php echo $i ;?>"><?php echo $i ;?></option> <?php } ?>
</select>
    <button type="submit" class="registerbtn" name="btn">Submit</button>
	<hr>
</div>
</form>
<?php if($p) { ?>
<h2>Results</h2>
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

<div class="table">
<table id="customers">
  <tr class="col">
    <th>Sub.code</th>
    <th>Subject Name</th>
    <th>Credit(s)</th>
    <th>Grade</th>
  </tr>
 <tbody>
<?php
	$c=1;
    while($row = mysqli_fetch_assoc($res)) {
          $n=$row['no'];	?>
        <tr>
        <td align="center"><?php echo $row["subcode"]; ?></td>
        <td align="center"><?php echo $row["subname"]; ?></td>
        <td align="center"><?php echo $row["credit"]; ?></td>
		<?php 	if($z<3){
					$sel_query="Select * from $v where rname= '$cc'";
				}
				else{
					$sel_query="Select * from $v where rolnumber= '$rol'";
				}
              $result = mysqli_query($con,$sel_query);
		      $g=mysqli_fetch_assoc($result);   ?>
        <td align="center"><?php echo $g[$c]; ?></td>
		<?php $c++;?>
        </tr>
<?php } ?>
  </tbody>
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