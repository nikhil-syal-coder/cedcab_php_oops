<?php 
session_start();

require_once('class.php');
require_once('config.php');
$obj3= new DB();
$obj5=new admin();
if(isset($_GET['id'])){
    $uid=$_GET['id'];
}
$obj5->loct($uid,$obj3->conn);


?>