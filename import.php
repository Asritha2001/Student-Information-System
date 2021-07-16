<?php
require_once ('dhb.php');
session_start();
$session=$_SESSION["sessiont"];
if(!$session) {
	header("Location:index.php");
	die();
}
$output = '';
$v='1';
if(isset($_POST["import"])){
	$val1 = $_POST["branch"];
    $val2 = $_POST["sem"];
	$val3 = $_POST["year"];
    $v = $val1.$val2;
	$_extension = explode(".", $_FILES["excel"]["name"]);
$extension = end($_extension);
  // For getting Extension of selected file
 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
  include("PHPExcel-1.8\Classes\PHPExcel\IOFactory.php"); // Add PHPExcel Library in this code 
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file
  $output .= "<label class='text-success'>Data Inserted</label><br /><table class='table table-bordered'>";
  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
   $highestRow = $worksheet->getHighestRow();
   $highestColumm = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
   $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumm);
   for($row=2; $row<=$highestRow; $row++)
   {
    $output .= "<tr>";
	$rollnum = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow( 0 ,$row)->getValue());
	$output .= '<td>'.$rollnum.'</td>';
	for($col=1; $col<$highestColumnIndex; $col++)
   {
    $num = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow( $col ,$row)->getValue());
	if($col ==1 ){
		$query = "INSERT INTO `$v` (rolnumber) VALUES ($rollnum)";
		$q=mysqli_query($con, $query);
	}
		$query = "UPDATE `$v` SET `$col`= '$num',`year`='$val3' WHERE rolnumber=$rollnum";
		$q=mysqli_query($con, $query);
    $output .= '<td>'.$num.'</td>';
   }
   
   $output .= '</tr>';
   }
  $output .= '</table>';
}
 }
 else
 {
  $output = '<label class="text-danger">Invalid File</label>'; //if non excel file then
 }
}
?>

<html>
 <head>
  <title>Excel</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <style>
  body
  {
   margin:0;
   padding:0;
   background-color:#f3f3f3;
   color: #313030;
    background-image: url('https://images.all-free-download.com/images/graphicthumb/blue_abstract_background_310971.jpg');
    background-repeat: no repeat;
	background-attachment: fixed;
  background-size: cover;
  }
  .box
  {
   width:90%;
   border:1px solid #000;
   background-color:#fff;
   border-radius:10px;
   margin-top:40px;
   padding-top: 20px;
  }
  .header {
  padding: 10px;
  text-align: center;
  background: #2eafaf;
  color: white;
  margin: 0px;
}
  h1{
	color:#fff;
	font-size:35px;
  }
  .navbar {
  overflow: hidden;
  background-color: #063a63;
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
  background-color:#55a930;
  color: white;
}
  label{
	font-size: 20px;
	margin-bottom:20px;
  }
  .sl{
	position:relative;
	left:33%;
	color: chocolate;
  }
  input[type=file] {
    display: initial;
	position:relative;
	left:13%;
	font-size:medium;
  }
  .l{
	position:relative;
	left:9%;
	font-size: 23px;
  }
  .bl{
	position:relative;
	left:2%;
	color: chocolate;
  }
  .b{
	position: relative;
	left:5%;
	width: 13%;
	height: 4%;
	font-size: 15px;
  }
  .s{
	position:relative;
	left:35%;
	width: 9%;
	height: 4%;
	font-size: 15px;
  }
  .year{
	  position:relative;
	  left:17%;
	  width:15%;
  }
  .btn{
	padding: 2px 25px;
	margin-left:15%;
	font-size:20px;
    background-color: #4bf5c2;
  }
  @media (max-width: 400px) { 
      .s , .b {
		  height:2%;
	  }
  }
  </style>
 </head>
 <body>
 <div class="header">
  <h1>Insert Results</h1>
</div>
<div class="navbar">
  <a href="#" class="active">2nd,3rd,4th year Results</a>
  <a href="import1.php">1st year Results</a>
  <a href="logout.php">Logout</a>
</div>

  <div class="container box">
   <form method="post" enctype="multipart/form-data">
   <label class="bl" for="dep">Branch:</label>
<select class="b" id="branch" name="branch">
  <option value="cse">CSE</option>
  <option value="ece">ECE</option>
  <option value="eee">EEE</option>
  <option value="civil">Civil</option>
  <option value="ME">ME</option>
  <option value="ece">MME</option>
  <option value="chemical">Chemical</option>
  <option value="bio">Biotech</option>
</select>
<input class="year" type="text" placeholder="Enter year" name="year" required>
<label class="sl" for="seme">Semester:</label>
<select  class="s" id="sem" name="sem">
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
</select>

<br/>
    <label class="l">Select Excel File</label>
    <input type="file" name="excel" />
    <input type="submit" name="import" class="btn" value="Import" />
   </form>
   <?php
   echo $output;
   ?>
  </div>
 </body>
</html>