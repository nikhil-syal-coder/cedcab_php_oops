<?php 
require_once('class.php');
require_once('config.php');
$obj= new DB();
$obj2=new User();
if (isset($_POST['submit'])) {
    $username=isset($_POST['username'])?$_POST['username']:'';
    $username=strtolower($username);
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script><!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script> -->
<script src="cab/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="cab/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"><link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
<title>
Register
</title>
<!-- <link rel="stylesheet" href="cab.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-3 ">
         <a class="navbar-brand ml-5" href="#" style="font-size: 35px;color:rgba(218, 22, 74, 1); font-weight:40;">ce<span>dca</span>b</a>
          <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar_menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbar_menu">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a href="login.php" class="nav-link ml-5 h5 mt-2" style="color:red; font-size:1.5em;">Log-in</a>
              </li>
              <li class="nav-item">
                <a href="index.php" class="nav-link ml-5 h5 mt-2" style="color:red; font-size:1.5em;">Book A Cab</a>
              </li>
            </ul>
          </div>     
        </nav>
      </header>
<div id="wrapper">

<center>
<div id="signup-form" >
<center><h2 class="head">Sign Up</h2><br>
<form action="signup.php" method="POST">
<p>
<label for="name">Name: <input type="text" name="name" class="name"   onkeydown="return alphaonly(event);" required></label>
</p>    
<p>
<label for="username">Username: <input type="text" name="username" onkeydown="return alphaonly2(event);" class= "user" required></label>
</p>
<p>
<label for="password">Password: <input type="password" name="password" class="pass1" onkeydown="return alphaonly2(event);" required></label>
</p>
<p>
<label for="password2">Re-Password: <input type="password" class="pass" name="password2" onkeydown="return alphaonly2(event);"  required></label>
</p>
<p>
<label for="email">Email: <input type="email" name="email" class="email" required></label>
</p>
<p>
<label for="phone">Mobile No.-: <input type="text" name="phone" class="phone" onkeypress="return onlynumber(event)" required></label>
</p>
<p>
<input type="submit" id="sub" name="submit" class="btn" value="Submit">
</p>
<p style="color:red;">Already a customer <i><a href="login.php"><u>Login</u></a></i></p>
</form>
</center>
</div>

</div>
</center>

<div class="container-fluid" style="background-color:grey;" >
	<div class="row">
		<div class=" col-md-4 col-lg-4  col-sm-12 col-xs-12 mt-3 text-center">
		
<a class="btn-floating btn-lg btn-fb" type="button" role="button"><i class="fab fa-facebook-f"></i></a>

<a class="btn-floating btn-lg btn-tw" type="button" role="button"><i class="fab fa-twitter"></i></a>

<a class="btn-floating btn-lg btn-ins" type="button" role="button"><i class="fab fa-instagram"></i></a>
		</div>
	    <div class=" col-md-4 col-lg-4 col-sm-12 col-xs-12 text-center">
	    	 <p class="mb-0 p">
                   <a class="navbar-brand" style="font-size: 35px;color:rgba(218, 22, 74, 1); font-weight:40;">ce<span>dca</span>b</a>
         </p>
                    
	    </div>
		<div class=" col-md-4 col-lg-4 col-sm-12 col-xs-12 mt-3 text-center">
			<nav class="">
				
                       <a href="#" class="ml-3 " >FEATURES</a>
                        <a href="#" class="ml-3">REVIEW</a>
                        <a href="#" class="ml-3" >SIGN UP</a>
                 

			</nav>
		</div>
	</div>
</div>
<script>
function alphaonly(button) { 
	console.log(button.which);
        var code = button.which;
        if ((code > 64 && code < 91) || (code < 123 && code > 96)|| (code==08)) 
            return true; 
        return false; 
    } 
    function onlynumber(button) { 

        var code = button.which;
        if (code > 31 && (code < 48 || code > 57)) 
            return false; 
        return true; 
    } 
    function alphaonly2(button) { 
	console.log(button.which);
        var code = button.which;
        if (code==32)
            return false; 
        return true; 
    } 
</script>
</body>
<style>
body{
    
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
label,.head{
    color: rgba(228, 1, 202, 1);
}
#signup-form{
	margin-top: 100px;
	font-size: 1.5em;
    background-color: white;
  
	width: 700px;
	border-radius: 30px;
    padding: 10px;
   
    margin-bottom:50px;
}
input{

    border:1px solid black;
}
.btn{
    background-color:rgba(228, 1, 202, 1);
    color:white;
    border:1px solid black;
    border-radius:20px;
    width:300px;
}
.name{
    margin-left:80px;
}
.user{
    margin-left:36px;  
}
.pass1{
    margin-left:36px;
}
.email{
    margin-left:80px;
}
.phone{
    margin-left:16px;  
}
span{
	border: 1px solid rgba(201, 219, 0, 1);
	border-radius: 20px;
	background-color: rgba(201, 219, 0, 1);
	color: black;

}

</style>
</html>