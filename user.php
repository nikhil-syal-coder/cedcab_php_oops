

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

<div class="select">
<form action="user.php" method="POST">
<center>Your Choice  Our Filter :-<select name="filter" id="filter">
   <option value="Select Value">Select Value</option>
   <option value="7">Rides in 7 days</option>
   <option value="30">Rides in 30 days</option>
   <option value="1">Sorting Fare</option>
 
</select>
<input type="submit" value="Submit" name="submit" class="submitt">
</center>
</form>
<?php
if (isset($_POST['submit'])) {
  require_once('class.php');
  require_once('config.php');
   $obj3= new DB();
   $ab=new user();
  $filter=isset($_POST['filter'])?$_POST['filter']:'';
  if($filter==1){
    $a= "<table><tr><th>Ride_id</th><th>Ride_date</th><th>Pickup</th><th>Drop</th><th>Distance</th><th>Fare</th><th>Laugage</th></tr><tr>";
    $ab->filterrr($a,$filter,$obj3->conn);
  }
  else{

  
  $a='<table><tr><th>User_id</th><th>Name</th><th>Contact</th><th>Date </th><th>username</th></tr><tr>';
  $ab->filterrr($a,$filter,$obj3->conn);
  }
}


?>


</div>
<?php
if(isset($_GET['id'])){
  $m=$_GET['id'];
  if($m==8){
    $a='<div class="form">
    <div class="form1">
    <h2>Total fare spend in cedcab</h2>';
  


echo $a;
$obj3= new DB();
$obj5=new user();
$obj5->fetch($obj3->conn);
  }
}

?>
</div>
<?php
if(isset($_GET['id'])){
  $m=$_GET['id'];
  if($m==8){
    $a='
    <div class="form1">
    <h2>Total Rides in cedcab</h2>';
  


echo $a;
$obj3= new DB();
$obj5=new user();
$obj5->fetch2($obj3->conn);
  }

}

?>
</div>
<?php
if(isset($_GET['id'])){
  $m=$_GET['id'];
  if($m==8){
    $a='
    <div class="form1">
    <h2>Last pending rides in cedcab</h2>';
  


echo $a;
$obj3= new DB();
$obj5=new user();
$obj5->fetch3($obj3->conn);
  }
}

?>
</div>

</div>

<div class="w3-container">
<?php 
require_once('class.php');
require_once('config.php');
$obj3= new DB();
$obj5=new user();

if(isset($_GET['id'])){
  $m=$_GET['id'];
  if($m==1||$m==2||$m==3){
    if($m==1){
      $a= "<table><tr><th>Ride_id</th><th>Ride_date</th><th>Pickup</th><th>Drop</th><th>Distance</th><th>Fare</th><th>Laugage</th><th>Status</th></tr><tr>";
      $obj5->userpanel($a,$m,$obj3->conn);
    }
    if($m==2){
      $a= "<table><tr><th>Ride_id</th><th>Ride_date</th><th>Pickup</th><th>Drop</th><th>Distance</th><th>Fare</th><th>Laugage</th><th>Status</th></tr><tr>";
      $obj5->userpanel($a,$m,$obj3->conn);
    }
   if($m==3){
    $a= "<table><tr><th>Ride_id</th><th>Ride_date</th><th>Pickup</th><th>Drop</th><th>Distance</th><th>Fare</th><th>Laugage</th><th>Status</th><th>Action-1</th><th>Action-2</th></tr><tr>";
    $obj5->userpanel($a,$m,$obj3->conn);
   }
  
  }
if($m==4 || $m==5 || $m==6){
  if($m==4){
    $a='<table><tr><th>User_id</th><th>Name</th><th>Contact</th><th>Date </th><th>username</th></tr><tr>';
    $obj5->form($a,$m,$obj3->conn);
  }
  if($m==5){
    $a='<form action="" method="POST" class="form11">';
    $a.='<center><h2>Update-Details</h2></center>';
    $a.='<div><label for ="user-name">User-Name-</label><input type ="text" id="user-name" class="user-name a" name="username" value="my"></div><br>';
    $a.='<div><label for ="name">Name-</label><input type ="text" id="name" class="namee b" name="name"></div><br>';
    $a.='<div></label> <label for ="Phone">Phone-</label><input type ="text" name="phone" id="phone" class="phone c"></div><br>';
    $a.='<div><input type="submit" class="buttnn" name="submit" value="Submit"></div></form>';   
    $obj5->form($a,$m,$obj3->conn);
  }
  if($m==6){
    $a='<form action="" method="POST"  class="form11">';
    $a.='<center><h2>Update-Password</center></h2>';
    $a.='<div><label for ="user-name"><h3>User-Name</h3></label><input type ="text" id="user-name" class="user-name" name="username" value="my">';
    $a.='<label for ="password"><h3>Updated-Password</h3><input type ="text" id="password" class="password" name="pass"><br><br></div>';
    $a.='<input type="submit" class="buttn" name="submit" value="Submit"></div></center></form>'; 
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
</style>
</body>
</html>