<?php 
session_start();
require_once('class.php');
require_once('config.php');
if(isset($_SESSION['userdata']['username'])){
    $obj= new DB();
    $obj2=new User();
    $obj2->ride($obj->conn);
    
     
        echo "<script>alert('Your Ride has been booked');
        window.location.href='user.php?id=3';</script>";
    }
    // header("Location:user.php?id=3");
    

else{
    header("Location:login.php");
}
?>