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
    <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script><!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script> -->
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"><link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="login.css">
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
             
            
            </ul>
          </div>     
        </nav>
      </header>
    <center>
    <div id="wrapper">
        <div id="login-form">
            <h2>Login</h2><br>
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
   margin-bottom:50px;
  
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
