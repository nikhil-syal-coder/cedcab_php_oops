<?php 
session_start();
require_once('class.php');
require_once('config.php');
$_SESSION['userdata']['username']='my';
$obj= new DB();
$obj2=new User();
$obj2->ride($obj->conn);
    header("Location:login.php");

?>