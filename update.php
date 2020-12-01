<?php
session_start();
require_once('class.php');
require_once('config.php');
$obj3= new DB();
$obj4=new admin();
$m=$_GET['id'];
$obj4->update($m,$obj3->conn);

?>



