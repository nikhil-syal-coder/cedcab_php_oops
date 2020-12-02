<?php 
session_start();
require_once('class.php');
require_once('config.php');
$obj3= new DB();
$obj5=new user();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cab.css">
</head>
<body >
<a href="user.php?id=2" class="inv" >Back</a>
 
<div>
    <?php 
    if(isset($_GET['id'])){
        $m=$_GET['id'];
        if($m>99){
        
          $obj5->invoice($m,$obj3->conn);
        }
    }

    
    ?>
     </div>

</body>
</html>