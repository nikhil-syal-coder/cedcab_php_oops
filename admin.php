
<?php

session_start();
if(!isset($_SESSION['userdata']['username'])){
  header("Location: login.php");
}
if($_SESSION['userdata']['username']!='admin'){
  header("Location: login.php");
}

require_once('class.php');
require_once('config.php');


?>

<!DOCTYPE html>
<html>
<title>Admin-Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="cab/jquery.js"></script>
<link href="cab.css" rel="stylesheet">
<body>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Close &times;</button>
  <ul>
  <li><a href="admin.php?id=13" id="btn1" class="w3-bar-item w3-button">Home</a></ul>
  <ul>
  <li><a href="admin.php?id=4" id="btn1" class="w3-bar-item w3-button">Ride</a><ul>
  <li><a href="admin.php?id=5" id="btn1" class="w3-bar-item w3-button">Approve-Ride</a></li>
  <li><a href="admin.php?id=6" id="btn1" class="w3-bar-item w3-button">Pending-Ride</a></li>
  <li><a href="admin.php?id=7" id="btn1" class="w3-bar-item w3-button">Canceled-Ride</a></li>
  <li><a href="admin.php?id=4" id="btn1" class="w3-bar-item w3-button">All-Ride</a></li></ul>
  </li>
</ul>
<ul>
  <li><a href="admin.php?id=1" id="btn1" class="w3-bar-item w3-button">User</a><ul>
  <li><a href="admin.php?id=2" id="btn1" class="w3-bar-item w3-button">Approve-User</a></li>
  <li><a href="admin.php?id=3" id="btn1" class="w3-bar-item w3-button">Pending-User</a></li>
  <li><a href="admin.php?id=1" id="btn1" class="w3-bar-item w3-button">All-User</a></li></ul>
  </li>
</ul>
<ul>
  <li><a href="admin.php?id=8" id="btn1" class="w3-bar-item w3-button">Location</a><ul>
  <li><a href="admin.php?id=9" id="btn1" class="w3-bar-item w3-button">Approved-Location-List</a></li>
  <li><a href="admin.php?id=15" id="btn1" class="w3-bar-item w3-button">Disapproved-Location-List</a></li>
  <li><a href="admin.php?id=10" id="btn1" class="w3-bar-item w3-button">Add Location</a></li></ul>
  </li>
  <li><a href="admin.php?id=111" id="btn1" class="w3-bar-item w3-button">Account</a><ul>
  <li><a href="padmin.php?id=11" id="btn1" class="w3-bar-item w3-button">Change-Password</a></li></ul>
  </li>
</ul>
<ul>
  <li><a href="admin.php?id=12" id="btn1" class="w3-bar-item w3-button">Logout</a></ul>
</div>

<div id="main">

<div class="w3-teal">
  <button id="openNav" class="w3-button w3-teal w3-xxlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
    <center><img src="admin.jpeg" alt="admin" class='img'  ></center>
    <?php 
echo "<center><h2>Welcome "
.$_SESSION['userdata']['username']."</h2></center>";

?>
  </div>
  
</div>

<?php 
if(isset($_GET['id'])){
  $m=$_GET['id'];
  if($m==1||$m==2||$m==3||$m==4||$m==5||$m==6||$m==7){
    if($m==1 || $m==2||$m==3){
      $abc='<div class="select">
      <form action="" method="POST">
      <center>Your Choice  Our Sorting :-<select name="filter" id="filter">
         <option value="Select Value">Select Value</option>
         <option value="name">Filter by Name</option>
       
      </select>
      <input type="submit" value="Filter" name="submit" class="submitt">
      </center>
     
      </form>';
    }
 
    else{
      $abc='<div class="select">
      <form action="" method="POST">
      <center>Your Choice  Our Sorting :-<select name="filter" id="filter">
         <option value="Select Value">Select Value</option>
         <option value="fare">Sort by Total-fare</option>
         <option value="date">Sort by Date</option>
         <option value="dist">Sort by Distance</option>
       
      </select>
      <input type="submit" value="submit" name="submit" class="submitt">
      </center>
      <center>Your Choice  Our Filter :-<select name="filter2" id="filter2">
      <option value="Select Value">Select Value</option>
      <option value="minii">Filter By Cedmini</option>
      <option value="microo">Filter By Cedmicro</option>
      <option value="royall">Filter By Cedroyal</option>
      <option value="suvv">Filter By Cedsuv</option>
    
   </select>
   <input type="submit" value="Sorting" name="submitt" class="submitt">
   </center>
      </form>';
    }
  
      echo $abc;
 
   
  }
}
if(isset($_GET['id'])){
  $m=$_GET['id'];
  if($m==4 || $m==5||$m==6||$m==7){
$abc='<div class="select"><center>
<form action="" method="POST">
<label for="start">Start date:</label>

 <input type="date" id="start" name="trip-start1"
     name="date1"
     min="2018-01-01" max="2022-12-31">
     <span>To<span>
<input type="date" id="start2" name="trip-start"
name="date2"
       min="2018-01-01" max="2022-12-31">
       <input type="submit" value="Date" name="submittt" class="submitt">
</form></center>';
  
  echo $abc;
 

  }
}
if (isset($_POST['submit']) || isset($_POST['submitt']) || isset($_POST['submittt']) ) {
  require_once('class.php');
  require_once('config.php');
   $obj3= new DB();
   $ab=new user();
  $filter=isset($_POST['trip-start1'])?$_POST['trip-start1']:'';
  $filter2=isset($_POST['trip-start'])?$_POST['trip-start']:'';
 

    $a= "<table><tr><th>Ride_id</th><th>Ride_date</th><th>Pickup</th><th>Drop</th><th>Distance</th><th>Fare</th><th>Cab-Name</th><th>Laugage</th></tr><tr>";
     $ab->filterrr3($a,$m,$filter,$filter2,$obj3->conn);


}

if (isset($_POST['submit']) ) {
  require_once('class.php');
  require_once('config.php');
   $obj3= new DB();
   $ab=new user();
   $filter=isset($_POST['filter'])?$_POST['filter']:'';
  if($filter==1 || $filter=='fare'|| $filter=='date'|| $filter=='dist'||$filter=='microo'|| $filter=='minii'|| $filter=='suvv'|| $filter=='royall'){
    $a= "<table><tr><th>Ride_id</th><th>Ride_date</th><th>Pickup</th><th>Drop</th><th>Distance</th><th>Fare</th><th>Laugage</th><th>Cab-type</th></tr><tr>";
    $ab->filterrr($a,$m,$filter,$obj3->conn);
  
  }
  else{

  
  $a='<table><tr><th>User_id</th><th>Name</th><th>Contact</th><th>Date </th><th>username</th></tr><tr>';
  $ab->filterrr($a,$m,$filter,$obj3->conn);
  }
}
if (isset($_POST['submitt'])) {
  require_once('class.php');
  require_once('config.php');
   $obj3= new DB();
   $ab=new user();
   $filter=isset($_POST['filter2'])?$_POST['filter2']:'';
  if($filter==1 || $filter=='fare'|| $filter=='date'|| $filter=='dist'||$filter=='microo'|| $filter=='minii'|| $filter=='suvv'|| $filter=='royall'){
    $a= "<table><tr><th>Ride_id</th><th>Ride_date</th><th>Pickup</th><th>Drop</th><th>Distance</th><th>Fare</th><th>Laugage</th><th>Cab-type</th></tr><tr>";
    $ab->filterrr($a,$m,$filter,$obj3->conn);
    echo $filter;
  }
  else{
echo $filter;
  
  $a='<table><tr><th>User_id</th><th>Name</th><th>Contact</th><th>Date </th><th>username</th></tr><tr>';
  $ab->filterrr($a,$m,$filter,$obj3->conn);
  }
}

?>



  <?php
if(isset($_GET['id'])){
  $m=$_GET['id'];
  if($m==13){
    $b='<div class="form"><div class="form1">
    <h2><a href="admin.php?id=1">Total User</h2>';
    echo $b;
$obj3= new DB();
$obj55=new admin();
$a='a';
$obj55->adm($a,$obj3->conn);
  }
  }
echo '</div>';
?>



<?php
if(isset($_GET['id'])){
  $m=$_GET['id'];
  if($m==13){
    $b='
    <div class="form1">
    <h2><a href="admin.php?id=4">Total Fare collection in Cedcab</a></h2>';
    echo $b;
$obj3= new DB();
$obj55=new admin();
$a='b';
$obj55->adm($a,$obj3->conn);
echo '</div>';
  }
}
?>


<?php
if(isset($_GET['id'])){
  $m=$_GET['id'];
  if($m==13){
    $b='<div class="form1">
    <h2><a href="admin.php?id=2">No. of approved user in cedcab</a></h2>';
    echo $b;
$obj3= new DB();
$obj55=new admin();
$a='c';
$obj55->adm($a,$obj3->conn);
echo '</div>';
  }
}

?>


<?php
if(isset($_GET['id'])){
  $m=$_GET['id'];
  if($m==13){
    $b='<div class="form1">
    <h2><a href="admin.php?id=1">Total Blocked User</a></h2>';
    echo $b;
$obj3= new DB();
$obj55=new admin();
$a='d';
$obj55->adm($a,$obj3->conn);
echo '</div>';

  }
  }

?>



<?php
if(isset($_GET['id'])){
  $m=$_GET['id'];
  if($m==13){
    $b='<div class="form1">
    <h2><a href="admin.php?id=6">Total pending request  in cedcab</a></h2>';
    echo $b;
$obj3= new DB();
$obj55=new admin();
$a='e';
$obj55->adm($a,$obj3->conn);
echo '</div>';
  }
  }

?>



<?php
if(isset($_GET['id'])){
  $m=$_GET['id'];
  if($m==13){
    $b='<div class="form1">
    <h2><a href="admin.php?id=7">Total block request  in cedcab</a></h2>';
    echo $b;
$obj3= new DB();
$obj55=new admin();
$a='f';
$obj55->adm($a,$obj3->conn);
echo '</div></div>';
  }
  }

?>


<div class="w3-container" style="margin-bottom:30px;">
<?php 
require_once('class.php');
require_once('config.php');
$obj3= new DB();
$obj4=new admin();

if(isset($_GET['id'])){
$m=$_GET['id'];
if($m==1||$m==2||$m==3){
  if($m==1){
    $a= "<table><tr><th>Name</th><th>User-Name</th><th>User-id</th><th>Contact</th><th>Bolean-status</th><th>Action</th></tr><tr>";
    $obj4->ride($a,$m,$obj3->conn);
  }
  if($m==2){
    $a= "<table><tr><th>Name</th><th>User-Name</th><th>User-id</th><th>Contact</th><th>Bolean-status</th></tr><tr>";
    $obj4->ride($a,$m,$obj3->conn);
  }
  if($m==3){
    $a= "<table><tr><th>Name</th><th>User-Name</th><th>User-id</th><th>Contact</th><th>Bolean-status</th></tr><tr>";
    $obj4->ride($a,$m,$obj3->conn);
  }

}
if($m==4||$m==5||$m==6||$m==7){
  if($m==4){
    $a= "<table><tr><th>Ride_id</th><th>Ride_date</th><th>Pickup</th><th>Drop</th><th>Distance</th><th>Fare</th><th>Laugage</th><th>Status</th><th>Cab-type</th><th>Action-1</th><th>Action-2</th></tr><tr>";   
    $obj4->ride2($a,$m,$obj3->conn);
  }
  if($m==5){
    $a= "<table><tr><th>Ride_id</th><th>Ride_date</th><th>Pickup</th><th>Drop</th><th>Distance</th><th>Fare</th><th>Laugage</th><th>Status</th><th>Cab-type</th></tr><tr>";   
    $obj4->ride2($a,$m,$obj3->conn);
  }
  if($m==6){
    $a= "<table><tr><th>Ride_id</th><th>Ride_date</th><th>Pickup</th><th>Drop</th><th>Distance</th><th>Fare</th><th>Laugage</th><th>Status</th><th>Cab-type</th><th>Action-1</th><th>Action-2</th></tr><tr>";   
    $obj4->ride2($a,$m,$obj3->conn);
  }
  if($m==7){
    $a= "<table><tr><th>Ride_id</th><th>Ride_date</th><th>Pickup</th><th>Drop</th><th>Distance</th><th>Fare</th><th>Laugage</th><th>Status</th><th>Cab-type</th></tr><tr>";   
    $obj4->ride2($a,$m,$obj3->conn);
  }
}
if($m==8||$m==9||$m==10||$m==15){
  if($m==8 || $m==9){
    $a='<table><tr><th>Location-Name</th><th>Location-Distance from Charbagh</th><th>Route-Avaible</th><th>Action</th></tr><tr>';
    $obj4->ride3($a,$m,$obj3->conn);
  }
  if($m==15){
    $a='<table><tr><th>Location-Name</th><th>Location-Distance from Charbagh</th><th>Route-Avaible</th><th>Action</th></tr><tr>';
    $obj4->ride3($a,$m,$obj3->conn);
  }

  if($m==10){
    $a='<form action="" method="POST" class="form11" ><div><p><label for ="Enter-Location"><h3>Enter-Location</h3></label><input type ="text" id="Enter-Location" class="Enter-Location" onkeypress="return alphaonly(event)" name="location"></p> <p> <label for ="Enter-distance"><h3>Enter-distance</h3></label><input type ="text" name="distance" id="Enter-distance" class="Enter-distance" onkeypress="return onlynumber(event)"></p><p><input type="submit" class="buttnn" name="submit" value="Submit"></p></div></form>';
    $obj4->ride3($a,$m,$obj3->conn);
  }

}


if($m==111)
{
  $obj3= new DB();
   $ab=new user();
  $a='<table><tr><th>User_id</th><th>Name</th><th>Contact</th><th>Date </th><th>username</th><th>E-mail</th><th>Action-1</th></tr><tr>';
  $ab->form($a,$m,$obj3->conn);
}
if($m==12){
  session_destroy();
  header("Location:login.php");
}
}

?>
</div>


<div class="container-fluid" style="background-color:	rgb(0,128,128,1);" >
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
				
                       <a href="#" class="ml-3 "  >FEATURES</a>
                        <a href="#" class="ml-3">REVIEW</a>
                        <a href="admin.php?id=12" class="ml-3" >LOG-OUT</a>
                 

			</nav>
		</div>
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
       else if ((code > 64 && code < 91) || (code < 123 && code > 96)|| (code==08)||(code < 58 && code > 47) && count>2)
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
 
</style>

</body>
</html>