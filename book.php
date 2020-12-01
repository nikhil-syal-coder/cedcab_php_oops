<?php 
session_start();
require_once('class.php');
require_once('config.php');
if(isset($_SESSION['userdata']['username'])){
    $obj= new DB();
    $obj2=new User();
    $obj2->ride($obj->conn);
    header("Location:user.php?id=3");
    
}
else{
    header("Location:login.php");
}
?>