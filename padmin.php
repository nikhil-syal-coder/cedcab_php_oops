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
Password-Update-page
</title>
<!-- <link rel="stylesheet" href="cab.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-3 ">
         <a class="navbar-brand ml-5" href="admin.php?id=13" style="font-size: 35px;color:rgba(218, 22, 74, 1); font-weight:40;">ce<span>dca</span>b</a>
          <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar_menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbar_menu">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="admin.php?id=13" class="nav-link ml-5 h5 mt-2" style="color:red; font-size:1.5em;">Welcome-admin</a>
              </li>
              <li class="nav-item">
                <a href="admin.php?id=13" class="nav-link ml-5 h5 mt-2" style="color:red; font-size:1.5em;">Dashboard</a>
              </li>
              <li class="nav-item">
                <a href="admin.php?id=111" class="nav-link ml-5 h5 mt-2" style="color:red; font-size:1.5em;">Accounts-Details</a>
              </li>
            </ul>
          </div>     
        </nav>
      </header>

  



<?php 
session_start();
require_once('class.php');
require_once('config.php');
$obj3= new DB();
$obj9=new admin();
if(isset($_GET['id'])){
    $m=$_GET['id'];

    if($m==11){

        $a='<form action="" method="POST"  class="form11">';
        $a.='<center><h2>Update-Password</center></h2>';
        $a.='<div><p><label for ="user-name"><h3>User-Name</h3></label><input type ="text" id="user-name" class="user-name" name="username" value="'.$_SESSION['userdata']['username'].'" readonly></p>';
        $a.='<p><label for ="password"><h3>Old-Password</h3></label><input type ="password" id="password" class="password" name="opass"></p>';
        $a.='<p><label for ="password"><h3>New-Password</h3></label><input type ="password" id="password" class="password" name="pass"></p>';
        $a.='<br><br><p><input type="submit" class="buttn" name="submit" value="Submit"></p></div></center></form>'; 
        echo $a;
        $varr= $obj9->adm_Pass($obj3->conn);
       
        if($varr == 1)
        {
          header("location:login.php");
        }
      
      }


}

?>

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
                        <a href="admin.php?id=12" class="ml-3" >LOG-OUT</a>
                 

			</nav>
		</div>
	</div>
</div>
      <script>
 var count=0;
function w3_open() {
  document.getElementById("main").style.marginLeft = "25%";
  document.getElementById("mySidebar").style.width = "25%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
function onlynumber(button) { 
	console.log(button.which);
        var code = button.which;
        if (code > 31 && (code < 48 || code > 57)) 
            return false; 
        return true; 
    } 
   
    function alphaonly(button) { 
     
      console.log(count)
	console.log(button.which);
        var code = button.which;
        if(count==0 && (code > 64 && code < 91) || (code < 123 && code > 96)|| (code==08)){
          count++; 
          return true;
         
         
        }
       else if ((code > 64 && code < 91) || (code < 123 && code > 96)|| (code==08)||(code < 58 && code > 47) && count>4)
            return true; 
        return false; 
    } 

</script>
<style>
.form{
  width:100%;
  height:100px;
}
.form1,.form2,.form3{
  width:30%;
  height:200px;
  float:left;
  background: rgb(9,121,120);
	background: linear-gradient(90deg, rgba(9,121,120,1) 35%, rgba(0,211,255,0.8407738095238095) 100%);
  margin-left:30px;
  margin-top:20px;
  font-weight:bold;
  font-size:2em;
  padding:15px;
}
.img{
  border-radius:50%;
  height:100px;
}
.form11{
    
    background-color: coral;
}
span{
	border: 1px solid rgba(201, 219, 0, 1);
	border-radius: 20px;
	background-color: rgba(201, 219, 0, 1);
	color: black;

}
.buttnn{
    background-color: cornflowerblue;
    color: black;
    margin-left:10px;
    margin-bottom:30px;
}
input{
  margin-left:10px;
}

body{
  font-family: Arial, Helvetica, sans-serif;
 }
 
 .select{
   margin-top:20px;
   font-size: 1em;

 }
 li,ul{
   font-weight:bold;
 }
 .submitt{
   height:30px;
   width:200px;
   background-color:rgb(9,121,120);
   color:white;
 }
 .bb{
    font-size: large;
    font-weight: bold;
    color: darkblue;
    
    
}
.bbb{
    color: darkgreen;
}
.pass2{
  width:400px;
}
.b1{
  color:red;
}
.a11{
   color:red;
 }
 .form11{
   padding-bottom:30px;
   font-weight:bold;
   padding-left:10px;
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
 
</style>
      </body>
      </html>