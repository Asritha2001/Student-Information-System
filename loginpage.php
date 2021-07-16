<?php
	$pun = "Username";
	$ppwd = "Password";
// Create connection
   $db = new mysqli("localhost","id13507022_sarvani", "\!qJCC/s}1v{|WcJ",'id13507022_webpage');
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT password FROM profilepage WHERE username = '$myusername'";
      $result = mysqli_query($db,$sql);
      $count = mysqli_num_rows($result);
      if($count != 1) {
         $pun = "Invalid";
	  }else{
		  while($row = $result->fetch_assoc()){
			if($mypassword != $row["password"] ) {
				$ppwd = "Wrong";
			} else {
				session_start();
				$_SESSION["db"]=$db;
				$_SESSION["username"]=$myusername;
				header("Location:add.php"); 
			}
		  }
	  }
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: #f2f2f2;
}
* {
  box-sizing: border-box;
}
.container {
  position: relative;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px 0 30px 0;
} 
input,
.btn {
  width: 100%;
  padding: 12px;
  border: none;
  border-radius: 4px;
  margin: 5px 0;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 20px;
  width: 60%;
  margin-left: 20%;
  text-decoration: none;
}
input:hover,
.btn:hover {
  opacity: 1;
  width: 60%;
}
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  cursor: pointer;
  width: 60%;
}
input[type=submit]:hover {
  background-color: #45a049;
  width: 60%;
}
.col {
  float: left;
  width: 50%;
  margin: auto;
  padding: 0 50px;
  margin-top: 0%;
}
.vl {
  position: absolute;
  left: 50%;
  transform: translate(-50%);
  border: 2px solid #ddd;
  height: 285px;
  margin-top: 0%;
}
.row{
  font-size: 30px;
}
@media screen and (max-width: 650px) {
  .col {
    width: 100%;
    margin-top: 0;
  }
  .vl {
    display: none;
  }
  .hide-md-lg {
    display: block;
    text-align: center;
  }
}

</style>
</head>
<body>

<div class="container">
  <form action="" method="POST">
    <div class="row">
      <h2 style="text-align:center; margin-top:8%">Login </h2>
      <div class="vl">
      </div>

      <div class="col" style="text-align:center">
        <img src="https://upload.wikimedia.org/wikipedia/en/3/36/NIT_Andhra_Pradesh.png" alt="NITAP Logo"/>
      </div>

      <div class="col" style="margin-top:50px">
        <input type="text" name="username" placeholder=<?php echo $pun ?> required>
        <input type="password" name="password" placeholder=<?php echo $ppwd ?> required>
        <input type="submit" value="Login">
      </div>
      
    </div>
  </form>
</div>


</body>
</html>
