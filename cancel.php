
<?php 
session_start();
require_once('class.php');
require_once('config.php');
$obj3= new DB();
$obj9=new user();
if(isset($_GET['id'])){
    $m=$_GET['id'];

    $obj9->ride_user_cancel($m,$obj3->conn);

}
?>