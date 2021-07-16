<?php
  
require_once ('dhb.php');
$errors = array('username'=>'','password'=>'');
if(isset($_POST['user2'], $_POST['pass2'])){
	$username2 = $_POST['user2'];  
    $password2 = $_POST['pass2'];  
  	$username2 = stripcslashes($username2);  
    $password2 = stripcslashes($password2);  
    $username2 = mysqli_real_escape_string($con, $username2);  
    $password2 = mysqli_real_escape_string($con, $password2);  
    $sql = "select * from teacherinfo where username='$username2' and password='$password2'";  
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
    if($count == 1){  
        session_start();
		$_SESSION['sessiont']="true";
        $_SESSION['user']=$username2;
		if($username2 == 'admin'){
			header('Location:import.php');
		}
		else{
			header('Location:homet.php');
		}
    }  
    else{  
       $errors['username']='Login failed. Invalid username or password.';  
    }     
}


if(isset($_POST['user1'], $_POST['pass1'])){

  $username1 = $_POST['user1'];  
    $password1 = $_POST['pass1'];  
      
        //to prevent from mysqli injection  
        $username1 = stripcslashes($username1);  
        $password1 = stripcslashes($password1);  
        $username1 = mysqli_real_escape_string($con, $username1);  
        $password1 = mysqli_real_escape_string($con, $password1);  
      
        $sql = "select * from profilepage where username= '$username1' and password = '$password1'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
           session_start();
		   $_SESSION['session']="true";
           $_SESSION['username']=$username1;
           header('Location:home.php');
        }  
        else{  
            $errors['username']='Login failed. Invalid username or password.';  
        }     
}
 
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{
	margin:0;
	color:#fff;
    background: white;
	font:600 16px/18px 'Open Sans',sans-serif;
}
*,:after,:before{box-sizing:border-box}
.clearfix:after,.clearfix:before{content:'';display:table}
.clearfix:after{clear:both;display:block}
a{color:inherit;text-decoration:none}

.login-wrap{
	width:100%;
	margin:auto;
	max-width:525px;
	min-height:670px;
	position:relative;
	box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
}
.login-html{
	width:100%;
	height:100%;
	position:absolute;
	padding:10px 60px 50px 60px;
    background-image: linear-gradient(to bottom right, lightgreen, skyblue);
}
.login-html .sign-in-htm,
.login-html .sign-up-htm{
	top:0;
	left:0;
	right:0;
	bottom:0;
	position:absolute;
	transform:rotateY(180deg);
	backface-visibility:hidden;
	transition:all .5s linear;
}
.login-html .sign-in,
.login-html .sign-up,
.login-form .group .check{
	display:none;
}
.login-html .tab,
.login-form .group .label,
.login-form .group .button{
	text-transform:uppercase;
}
.login-html .tab{
	font-size:22px;
	margin-right:15px;
	padding-bottom:5px;
	margin:0 15px 10px 0;
	display:inline-block;
	border-bottom:2px solid transparent;
}
.login-html .sign-in:checked + .tab,
.login-html .sign-up:checked + .tab{
	color:#000;
	border-color:#fff;
}
.login-form{
	min-height:345px;
	position:relative;
	perspective:1000px;
	transform-style:preserve-3d;
}
.login-form .group{
	margin-bottom:15px;
}
.login-form .group .label,
.login-form .group .input{
	width:100%;
	color:#000;
	display:block;
}
.login-form .group .button{
	width:100%;
	color:#fff;
	display:block;
}
.login-form .group .input,
.login-form .group .button{
	font-size: 110%;
	padding:12px 16px;
	border-radius:5px;
	background:#fff;
}
.login-form .group input[data-type="password"]{
	text-security:circle;
	-webkit-text-security:circle;
}
.login-form .group .label{
	color:#000;
	font-size:15px;
}
.login-form .group .button{
	background:#000;
}
.login-form .group label .icon{
	width:15px;
	height:15px;
	border-radius:2px;
	position:relative;
	display:inline-block;
	background:rgba(255,255,255,.1);
}
.login-form .group label .icon:before,
.login-form .group label .icon:after{
	content:'';
	width:10px;
	height:2px;
	background:#fff;
	position:absolute;
	transition:all .2s ease-in-out 0s;
}
.login-form .group label .icon:before{
	left:3px;
	width:5px;
	bottom:6px;
	transform:scale(0) rotate(0);
}
.login-form .group label .icon:after{
	top:6px;
	right:0;
	transform:scale(0) rotate(0);
}
.login-form .group .check:checked + label{
	color:#fff;
}
.login-form .group .check:checked + label .icon{
	background:#1161ee;
}
.login-form .group .check:checked + label .icon:before{
	transform:scale(1) rotate(45deg);
}
.login-form .group .check:checked + label .icon:after{
	transform:scale(1) rotate(-45deg);
}
.login-html .sign-in:checked + .tab + .sign-up + .tab + .login-form .sign-in-htm{
	transform:rotate(0);
}
.login-html .sign-up:checked + .tab + .login-form .sign-up-htm{
	transform:rotate(0);
}
.group .button{
	cursor: pointer;
}
.group .button:hover{
	background-color: white;
  border-style: solid;
  border-color: black;
  color: black;
	cursor: pointer;
}
.hr{
	height:2px;
	margin:25px 0;
	background:slategray;
}
</style>
</head>
<body>
<div class="login-wrap">
  <div class="login-html">
	<div style="text-align:center">
        <img src="https://upload.wikimedia.org/wikipedia/en/3/36/NIT_Andhra_Pradesh.png" alt="NITAP Logo"/>
    </div>
	        <div class="hr"></div>
	<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Student Login</label>
    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Admin Login</label>
    <div class="login-form">
	   <form action="" method= "POST">
      <div class="sign-in-htm">
        <div class="group">
          <label for="user" class="label">Username</label>
          <input id="user" type="text" class="input" name="user1" required>
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input id="pass" type="password" class="input" data-type="password" name="pass1" required>
        </div>
        <div class="group">
          <input type="submit" class="button" value="Student Login">
        </div>
      </div>
	  </form>
	   <form action="" method= "POST">
      <div class="sign-up-htm">
        <div class="group">
          <label for="user" class="label">Username</label>
          <input id="user" type="text" class="input" name="user2" required>
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input id="pass" type="password" class="input" data-type="password" name="pass2" required>
        </div>
        <div class="group">
          <input type="submit" class="button" value="Admin Login">
        </div>
      </div>
	 </form> 
    </div>
  </div>
</div>
</body>
</html>
