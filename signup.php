<?php 
require_once('class.php');
require_once('config.php');
$obj= new DB();
$obj2=new User();
if (isset($_POST['submit'])) {
    $username=isset($_POST['username'])?$_POST['username']:'';
    $phone=isset($_POST['phone'])?$_POST['phone']:'';
    $name=isset($_POST['name'])?$_POST['name']:'';
    $userpassword=isset($_POST['password'])?$_POST['password']:'';
    $userpassword2=isset($_POST['password2'])?$_POST['password2']:'';
    $email=isset($_POST['email'])?$_POST['email']:'';
    $obj2->entry($username,$phone,$name,$userpassword,$email, $userpassword2,$obj->conn);

}
?>
<!DOCTYPE html>
<html>
<head>
<title>
Register
</title>
<link rel="stylesheet" href="cab.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>
<body>
<div id="wrapper">
<div id="login">
    <p style='text-align:right;'><a id="login1" href="login.php">Login</a></p>
</div>
<center>
<div id="signup-form" >
<center><h2 class="head">Sign Up</h2>
<form action="signup.php" method="POST">
<p>
<label for="name">Name: <input type="text" name="name" class="name"   onkeydown="return alphaonly(event);" required></label>
</p>    
<p>
<label for="username">Username: <input type="text" name="username"  class= "user" required></label>
</p>
<p>
<label for="password">Password: <input type="password" name="password" class="pass1" required></label>
</p>
<p>
<label for="password2">Re-Password: <input type="password" class="pass" name="password2" required></label>
</p>
<p>
<label for="email">Email: <input type="email" name="email" class="email" required></label>
</p>
<p>
<label for="phone">Mobile No.-: <input type="number" name="phone" class="phone" required></label>
</p>
<p>
<input type="submit" id="sub" name="submit" class="btn" value="Submit">
</p>
</form>
</center>
</div>

</div>
</center>
<script>
function alphaonly(button) { 
	console.log(button.which);
        var code = button.which;
        if ((code > 64 && code < 91) || (code < 123 && code > 96)|| (code==08)) 
            return true; 
        return false; 
    } 
</script>
</body>
<style>
body{
    background-color:pink;
    background-image:url("sign.jpeg");
    
}
.head{
    font-size:2em;
    margin:0px;
}
#login1{
text-decoration:none;
font-size:2em;
margin-right:20px;
color:rgba(228, 1, 202, 1);
font-weight:bold;

}
label,input,.head{
    color: rgba(228, 1, 202, 1);
}
#signup-form{
	margin-top: 100px;
	font-size: 1.5em;
    background-color: white;
    opacity:.6;
	width: 700px;
	border-radius: 30px;
    padding: 10px;
    font-weight:bold;
}
input{
    font-weight:bold; 
    border:1px solid black;
}

</style>
</html>