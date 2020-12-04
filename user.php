

<?php

session_start();
if(!isset($_SESSION['userdata']['username'])){
  header("Location: login.php");
}
if($_SESSION['userdata']['username']=='admin'){
  header("Location: login.php");
}
require_once('class.php');
require_once('config.php');


?>

<!DOCTYPE html>
<html>
<title>User-Panel</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
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
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="cab/jquery.js"></script>
<link href="cab.css" rel="stylesheet">

<body>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Close &times;</button>
  <ul>
  <li><a href="user.php?id=8" id="btn1" class="w3-bar-item w3-button">Home</a></li>
  <li><a href="cab/index2.php" id="btn1" class="w3-bar-item w3-button">Book New Ride</a></li>
</ul>
<ul>
  <li><a href="user.php?id=1" id="btn1" class="w3-bar-item w3-button">Rides</a><ul>
  <li><a href="user.php?id=2" id="btn1" class="w3-bar-item w3-button">Completed-Rides</a></li>
  <li><a href="user.php?id=3" id="btn1" class="w3-bar-item w3-button">Pending-Rides</a></li>
  <li><a href="user.php?id=1" id="btn1" class="w3-bar-item w3-button">All-Rides</a></li></ul>
  </li>
</ul>
<ul>
 
  <li><a href="user.php?id=4" id="btn1" class="w3-bar-item w3-button">Account</a><ul>
  <li><a href="user.php?id=5" id="btn1" class="w3-bar-item w3-button">Update-Details</a></li>
  <li><a href="user.php?id=6" id="btn1" class="w3-bar-item w3-button">Change-Password</a></li>
</ul>
</li>
</ul>
<ul><li><a href="user.php?id=7" id="btn1" class="w3-bar-item w3-button">Logout</a></li></ul>

</div>

<div id="main">

<div class="w3-teal">
  <button id="openNav" class="w3-button w3-teal w3-xxlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
    <center><img src="user.png" alt="admin" class='img'  ></center>
    <?php 
echo "<center><h2>Welcome "
.$_SESSION['userdata']['username']."</h2></center>";

?>
  </div>
 
  </div>
<?php 
if(isset($_GET['id'])){
  $m=$_GET['id'];
  if($m==1 || $m==2||$m==3){
$abc='<div class="select">
<form action="" method="POST">
<center>Your Choice  Our Sorting :-<select name="filter" id="filter">
   <option value="Select Value">Select Value</option>
   <option value="7">Rides in 7 days</option>
   <option value="30">Rides in 30 days</option>
   
   <option value="distance">Sorting by Distance </option>
   <option value="1">Sorting by Fare</option></center>
 
</select>
<input type="submit" value="Sorting" name="submit" class="submitt">
<br>
<center>Filter by your choice : :-<select name="filter" id="filter">
   <option value="Select Value">Select Value</option>

   <option value="mini">Rides in Cedmini</option>
   <option value="micro">Rides in Cedmicro</option>
   <option value="royal">Rides in Cedroyal</option>
   <option value="suv">Rides in Cedsuv</option></center>
</select>
<input type="submit" value="Filter" name="submit" class="submitt">


</form>';
  
  echo $abc;
 

  }
}
if (isset($_POST['submit'])) {
  require_once('class.php');
  require_once('config.php');
   $obj3= new DB();
   $ab=new user();
  $filter=isset($_POST['filter'])?$_POST['filter']:'';

    $a= "<table><tr><th>Ride_id</th><th>Ride_date</th><th>Pickup</th><th>Drop</th><th>Distance</th><th>Fare</th><th>Cab-Name</th><th>Laugage</th></tr><tr>";
    $ab->filterrr($a,$m,$filter,$obj3->conn);


}
?>


</div>
<?php
if(isset($_GET['id'])){
  $m=$_GET['id'];
  if($m==8){
    $a='<div class="form">
    <div class="form1">
    <h2><a href="user.php?id=2">Total fare spend in cedcab</a></h2>';
  


echo $a;
$obj3= new DB();
$obj5=new user();
$obj5->fetch($obj3->conn);
echo '</div>';
  }
}

?>

<?php
if(isset($_GET['id'])){
  $m=$_GET['id'];
  if($m==8){
    $a='
    <div class="form1">
    <h2><a href="user.php?id=1">Total Rides in cedcab</a></h2>';
  


echo $a;
$obj3= new DB();
$obj5=new user();
$obj5->fetch2($obj3->conn);
echo '</div>';
  }

}

?>

<?php
if(isset($_GET['id'])){
  $m=$_GET['id'];
  if($m==8){
    $a='
    <div class="form1">
    <h2><a href="user.php?id=3">Last pending rides in cedcab</a></h2>';
  


echo $a;
$obj3= new DB();
$obj5=new user();
$obj5->fetch3($obj3->conn);
echo '</div>';
  }
}

?>


</div>

<div class="w3-container abc" style="
    margin-bottom: 130px;
">
<?php 
require_once('class.php');
require_once('config.php');
$obj3= new DB();
$obj5=new user();

if(isset($_GET['id'])){
  $m=$_GET['id'];
  if($m>99){
  
    $obj5->invoice($m,$obj3->conn);
  }
  if($m==1||$m==2||$m==3){
    if($m==1){
      $a= "<table><tr><th>Ride_id</th><th>Ride_date</th><th>Pickup</th><th>Drop</th><th>Distance</th><th>Fare</th><th>Laugage</th><th>Status</th><th>Cab-Type</th></tr><tr>";
      $obj5->userpanel($a,$m,$obj3->conn);
    }
    if($m==2){
      $a= "<table><tr><th>Ride_id</th><th>Ride_date</th><th>Pickup</th><th>Drop</th><th>Distance</th><th>Fare</th><th>Laugage</th><th>Status</th><th>Cab-Type</th><th>Action</th></tr><tr>";
      $obj5->userpanel($a,$m,$obj3->conn);
    }
   if($m==3){
    $a= "<table><tr><th>Ride_id</th><th>Ride_date</th><th>Pickup</th><th>Drop</th><th>Distance</th><th>Fare</th><th>Laugage</th><th>Status</th><th>Cab-Type</th><th>Action</th></tr><tr>";
    $obj5->userpanel($a,$m,$obj3->conn);
   }
  
  }
if($m==4 || $m==5 || $m==6){
  if($m==4){
    $a='<table><tr><th>User_id</th><th>Name</th><th>Contact</th><th>Date </th><th>username</th><th>E-mail</th><th>Action-1</th><th>Action-2</th></tr><tr>';
    $obj5->form($a,$m,$obj3->conn);
  }
  if($m==5){
    $a='<form action="" method="POST" class="form11">';
    $a.='<center><h2>Update-Details</h2></center>';
    $a.='<div><label for ="user-name">User-Name-</label><input type ="text" id="user-name" class="user-name a" name="username" value="'.$_SESSION['userdata']['username'].'" readonly ></div><br>';
    $a.='<div><label for ="name">Name-</label><input type ="text" id="name" class="namee b" name="name" value="'.$_SESSION['name'].'"  onkeydown="return alphaonly(event);"></div><br>';
    $a.='<div></label> <label for ="Phone">Phone-</label><input type ="text" onkeypress="return onlynumber(event)" value="'.$_SESSION['phone'].'" name="phone" id="phone"  class="phone c"></div><br>';
    $a.='<div><input type="submit" class="buttnn" name="submit" value="Submit"></div></form>';   
    $obj5->form($a,$m,$obj3->conn);
  }
  if($m==6){
    $a='<form action="" method="POST"  class="form11">';
    $a.='<center><h2>Update-Password</center></h2>';
    $a.='<div><p><label for ="user-name"><h3>User-Name</h3></label><input type ="text" id="user-name" class="user-name" name="username" value="'.$_SESSION['userdata']['username'].'" readonly></p>';
    $a.='<p><label for ="password"><h3>Old-Password</h3><input type ="password" id="password" class="password" name="opass"><br></p>';
    $a.='<p><label for ="password"><h3>New-Password</h3><input type ="password" id="password" class="password" name="pass"></p>';
    $a.='<p><input type="submit" class="buttn" name="submit" value="Submit"></p></div></center></form>'; 
    $obj5->form($a,$m,$obj3->conn);
  }


}
if($m==7){
  session_destroy();
  header("Location:login.php");
}
}
?>

</div>


<div class="container-fluid" style="background-color:rgb(0,128,128);" >
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
                        <a href="user.php?id=7" class="ml-3" >LOG-OUT</a>
                 

			</nav>
		</div>
	</div>
</div>
</div>
<script>
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


</script>
<style>
.form{
  width:100%;
  height:220px;
}
.form1,.form2,.form3{
  width:30%;
  height:220px;
  float:left;
  background: rgb(9,121,120);
	background: linear-gradient(90deg, rgba(9,121,120,1) 35%, rgba(0,211,255,0.8407738095238095) 100%);
 
  font-weight:bold;
  font-size:2em;
  padding:15px;
  margin-left:30px;
  margin-top:20px;
}
.img{
  border-radius:50%;
  height:100px;
}.form11{
    background-color: coral;
}
.buttnn{
    background-color: cornflowerblue;
    color: black;
    margin-left:90px;
}
label{
     color: crimson;

 }
 .buttn{
  background-color: cornflowerblue;
    color: black;
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
 .form11{
   padding-bottom:30px;
   font-weight:bold;
   padding-left:10px;
 }
 .a11{
   color:red;
   border: 1px solid grey;
   padding: 5px;
 }
 
</style>
</body>
</html>