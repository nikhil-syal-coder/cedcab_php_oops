
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
  <li><a href="admin.php?id=9" id="btn1" class="w3-bar-item w3-button">Location-List</a></li>
  <li><a href="admin.php?id=15" id="btn1" class="w3-bar-item w3-button">Location-Approve</a></li>
  <li><a href="admin.php?id=10" id="btn1" class="w3-bar-item w3-button">Add Location</a></li></ul>
  </li>
  <li><a href="admin.php?id=11" id="btn1" class="w3-bar-item w3-button">Account</a><ul>
  <li><a href="admin.php?id=11" id="btn1" class="w3-bar-item w3-button">Change-Password</a></li></ul>
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
  if($m==13||$m==1||$m==2||$m==3||$m==4||$m==5||$m==6||$m==7){
    if($m==1 || $m==2||$m==3){
      $abc='<div class="select">
      <form action="" method="POST">
      <center>Your Choice  Our Filter :-<select name="filter" id="filter">
         <option value="Select Value">Select Value</option>
         <option value="name">Filter by Name</option>
       
      </select>
      <input type="submit" value="submit" name="submit" class="submitt">
      </center>
      </form>';
    }
    else{
      $abc='<div class="select">
      <form action="" method="POST">
      <center>Your Choice  Our Filter :-<select name="filter" id="filter">
         <option value="Select Value">Select Value</option>
         <option value="fare">Filter by Total-fare</option>
         <option value="date">Filter by Date</option>
       
      </select>
      <input type="submit" value="submit" name="submit" class="submitt">
      </center>
      </form>';
    }
    if($m==13){
      $abc='<div class="select">
      <form action="" method="POST">
      <center>Your Choice  Our Filter :-<select name="filter" id="filter">
      
         <option value="Select Value">Select Value</option>
         <option value="name">Filter by Name</option>
         <option value="fare">Filter by Total-fare</option>
         <option value="date">Filter by Date</option>
       
      </select>
      <input type="submit" value="submit" name="submit" class="submitt">
      </center>
      </form>';
    }
      echo $abc;
 
   
  }
}

if (isset($_POST['submit'])) {
  require_once('class.php');
  require_once('config.php');
   $obj3= new DB();
   $ab=new user();
   $filter=isset($_POST['filter'])?$_POST['filter']:'';
  if($filter==1 || $filter=='fare'|| $filter=='date'){
    $a= "<table><tr><th>Ride_id</th><th>Ride_date</th><th>Pickup</th><th>Drop</th><th>Distance</th><th>Fare</th><th>Laugage</th></tr><tr>";
    $ab->filterrr($a,$m,$filter,$obj3->conn);
  }
  else{

  
  $a='<table><tr><th>User_id</th><th>Name</th><th>Contact</th><th>Date </th><th>username</th></tr><tr>';
  $ab->filterrr($a,$m,$filter,$obj3->conn);
  }
}


?>

</div>

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

?>

</div>

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

  }
}
?>

</div>
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

  }
}

?>

</div>
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
  }
  }

?>


</div>
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
  }
  }

?>

</div>
</div>
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
    $a= "<table><tr><th>Ride_id</th><th>Ride_date</th><th>Pickup</th><th>Drop</th><th>Distance</th><th>Fare</th><th>Laugage</th><th>Status</th><th>Action-1</th><th>Action-2</th></tr><tr>";   
    $obj4->ride2($a,$m,$obj3->conn);
  }
  if($m==5){
    $a= "<table><tr><th>Ride_id</th><th>Ride_date</th><th>Pickup</th><th>Drop</th><th>Distance</th><th>Fare</th><th>Laugage</th><th>Status</th></tr><tr>";   
    $obj4->ride2($a,$m,$obj3->conn);
  }
  if($m==6){
    $a= "<table><tr><th>Ride_id</th><th>Ride_date</th><th>Pickup</th><th>Drop</th><th>Distance</th><th>Fare</th><th>Laugage</th><th>Status</th><th>Action-1</th><th>Action-2</th></tr><tr>";   
    $obj4->ride2($a,$m,$obj3->conn);
  }
  if($m==7){
    $a= "<table><tr><th>Ride_id</th><th>Ride_date</th><th>Pickup</th><th>Drop</th><th>Distance</th><th>Fare</th><th>Laugage</th><th>Status</th></tr><tr>";   
    $obj4->ride2($a,$m,$obj3->conn);
  }
}
if($m==8||$m==9||$m==10||$m==15){
  if($m==8 || $m==9){
    $a='<table><tr><th>Location-Name</th><th>Location-Distance from Charbagh</th><th>Route-Avaible</th><th>Approve</th></tr><tr>';
    $obj4->ride3($a,$m,$obj3->conn);
  }
  if($m==15){
    $a='<table><tr><th>Location-Name</th><th>Location-Distance from Charbagh</th><th>Route-Avaible</th><th>Approve</th></tr><tr>';
    $obj4->ride3($a,$m,$obj3->conn);
  }

  if($m==10){
    $a='<form action="" method="POST" class="form11" ><div><label for ="Enter-Location"><h3>Enter-Location</h3></label><input type ="text" id="Enter-Location" class="Enter-Location" name="location"> <label for ="Enter-distance"><h3>Enter-distance</h3></label><input type ="text" name="distance" id="Enter-distance" class="Enter-distance"><br><input type="submit" class="buttnn" name="submit" value="Submit"></div></form>';
    $obj4->ride3($a,$m,$obj3->conn);
  }

}
if($m==11){
  $a='<form action="" method="POST" class="form11"><center><h2>Change-Password</h2></center><div><label for ="user-name"><h3>User-Name</h3></label><input type ="text" id="user-name" class="user-name" name="username" value="admin"><label for ="pass"><h3>New-Password</h3><input type ="password" id="pass" class="pass" name="pass"></label> <label for ="pass"><h3>Old-Password</h3></label><input type ="password" name="opass" id="phone" class="opass"><br><br><input type="submit" class="buttnn" name="submit" value="Submit"></div></form>';   
  $obj4->ride4($a,$obj3->conn);
}
if($m==12){
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
</style>

</body>
</html>