<?php
 session_start();
 require_once('class.php');
 require_once('config.php');
 $obj3= new DB();
 $obj4=new user();

 if (isset($_POST['submit'])) {
    $username=isset($_POST['username'])?$_POST['username']:'';
    $userpassword=isset($_POST['password'])?$_POST['password']:'';
    $obj4->admit($username,$userpassword,$obj3->conn);
 }

?>

<html>
<head>
    <title>
        Login
    </title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <center>
    <div id="wrapper">
        <div id="login-form">
            <h2>Login</h2>
            <form action="" method="POST">
                <p>
                    <label for="username">Username: <input type="text"
                     name="username" required></label>
                </p>
                <p>
                    <label for="password">Password: <input type="password"
                     name="password" required></label>
                </p>
                <p>
                    <input id="login" type="submit" name="submit" value="Login">
                </p>
            </form>
            <h3>OR</h3>
            <p><a href="signup.php" id="sign">Register a new user</a></p>
            <h3>OR</h3>
            <p><a href="index.php" id="sign">Book a ride</a></p>
        </div>
    </div>
    </center>
    <style>
    body{
	background-image:url("login.png");
	/* background-repeat:no-repeat; */
	background-size: 100% 100% ;
}
#login-form{
	margin-top: 100px;
	font-size: 1.5em;
	background-color: white;
	width: 400px;
	border-radius: 30px;
   padding: 10px;
  
}
label{
	color:crimson;
}
input{
	border-radius: 10px;
   height: 40px;
   width:60%;
}
#sign{
	
	font-weight: bold;
   width: 200px;
   text-decoration:none;
}
#log{
	text-decoration: none;
}
    </style>
</body>

</html>
