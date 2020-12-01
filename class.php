<?php 
require_once('config.php');
 class User{
    public $username,$phone,$name,$userpassword,$email, $userpassword2,$origin,$drop,$laugage,$final,$fare;
    
    function entry($username,$phone,$name,$userpassword,$email, $userpassword2,$conn){

        $count=0;
        if ($userpassword != $userpassword2) {
        echo "<center><h3 style='color:white; font-size:1.2em;'>password mismatch</h3></center>";
        $count++;
               }


        if($username=='admin'){
            echo "<center><h3 style='color:white; font-size:1.2em;'>username invalid</h3></center>";
            $count++;
                 }
        if($username!='admin'){
            $sql="SELECT * FROM `users` WhERE `username`='".$username."'";
            $result=$conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<center><h3 style='color:white; font-size:1.2em;'>Username Already Exist</h3></center>"; 
            $count++;
            }
        }         
                 
                 
        if ($count==0) {

           $sql="INSERT INTO users (name, password, contact, date, username, boolean_admin, boolean_status) 
            VALUES ('".$name."', '".md5($userpassword)."','".$phone."', current_timestamp(),'".$username."', 1, 0)"; 
           
    
        if ($conn->query($sql)===true) {
          
                        echo "<center><h3 style='color:white; font-size:1.2em;'>New record created successfully</h3></center>";
                        header("Location: login.php");
                    } 
                    
                    else {
                        $conn->error;
                        $errors[]=array("input"=>"form","msg"=>"New record not created.");
                    }
            
                }
            }  
            function admit($username,$userpassword,$conn){
                $count=0;
                if ($count==0) {
        
                     $sql1="SELECT * from users WHERE username='".$username."'
                     AND password='".md5($userpassword)."'";
                     $result=$conn->query($sql1);
                    if ($result->num_rows > 0) {
                        while ($row= $result->fetch_assoc()) {
                            $_SESSION['userdata']=array("username"=>$row['username'],
                            "user_id"=>$row['user_id']);
                            if ($row['boolean_admin']==0 && $_SESSION['userdata']['username']=='admin') {
                                header("Location: admin.php");
                            }
                            else{
                                echo 'Invalid Details ';
                            }
                            if ($row['boolean_admin']==1) {
                                if($row['boolean_status']==0){
                                  echo "<center><h3 style='color:white; font-size:1.2em;'<b>plzz wait for admin approval your account is not verified yet</b></h3></center>";
                                }
                                else{
                                    // header("Location:cab\index2.php");
                                    header("Location:user.php");

                                }
                               
                            }     
                        }
            
                    }
                    else {
                      $count++;
                      echo "<center><h3 style='color:white; font-size:1.2em;'Invalid Login credentials</h3></center>";
                    }
                    
            }
            $conn->close();
        } 
       

        function ride($conn){
            $abc='';
            $name=$_SESSION['userdata']['username'];
            $sql1="SELECT * FROM users WHERE `username`='".$name."'";
            
            $result=$conn->query($sql1);
            
            if ($result->num_rows > 0) {
               
                while ($row= $result->fetch_assoc()) {

                  $abc=$row['user_id'];
                }
            }
          
         if($_SESSION['cabname']=='CedMicro'){

            $_SESSION['laugage']=0;
         }
              
              $sql="INSERT INTO `ride` ( `ride_date`, `pickup`, `drop`, `total_distance`, `laugage`, `total_fare`, `status`, `customer_id`,`cab_type`) 
              VALUES ( current_timestamp(),'".$_SESSION['origin']."', '".$_SESSION['drop']."', '".$_SESSION['final']."', '".$_SESSION['laugage']."','".$_SESSION['fare']."', 'pending', '".$abc."','".$_SESSION['cabname']."')";
              $result=$conn->query($sql);
               echo ($result);
              
              
             
           
            

        }
      function userpanel($a,$m,$conn){
           if($m==1){
            $abc='';
            $name=$_SESSION['userdata']['username'];
            $sql1="SELECT * FROM users WHERE `username`='".$name."'";
            
            $result=$conn->query($sql1);
            
            if ($result->num_rows > 0) {
               
                while ($row= $result->fetch_assoc()) {

                  $abc=$row['user_id'];
                }
            }
            $sql="SELECT * from ride WHERE customer_id='".$abc."'";
          
            $result=$conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<center><h2>Welcome-Admin-Ride-Approval Page</h2></center><center>";
              
                while ($row= $result->fetch_assoc()) {
                    $a.='<td>'.$row['ride_id'].'</td>';
                    $a.='<td>'.$row['ride_date'].'</td>';
                    $a.='<td>'.$row['pickup'].'</td>';
                    $a.='<td>'.$row['drop'].'</td>';
                    $a.='<td>'.$row['total_distance'].'</td>';
                    $a.='<td>'.$row['total_fare'].'</td>';
                    $a.='<td>'.$row['laugage'].'</td>';
                    $a.='<td>'.$row['status'].'</td></tr>';
                }
                $a.='</table>';
                echo $a;
            }

        }
        if($m==2){
            $abc='';
            $name=$_SESSION['userdata']['username'];
            $sql1="SELECT * FROM users WHERE `username`='".$name."'";
            
            $result=$conn->query($sql1);
            
            if ($result->num_rows > 0) {
               
                while ($row= $result->fetch_assoc()) {

                  $abc=$row['user_id'];
                }
            }
            $sql="SELECT * from ride WHERE customer_id='".$abc."' AND `status`='active'";
            $result=$conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<center><h2>Welcome-Admin-Ride-Approval Page  </h2></center><center>";
                while ($row= $result->fetch_assoc()) {
                    $a.='<td>'.$row['ride_id'].'</td>';
                    $a.='<td>'.$row['ride_date'].'</td>';
                    $a.='<td>'.$row['pickup'].'</td>';
                    $a.='<td>'.$row['drop'].'</td>';
                    $a.='<td>'.$row['total_distance'].'</td>';
                    $a.='<td>'.$row['total_fare'].'</td>';
                    $a.='<td>'.$row['laugage'].'</td>';
                    $a.='<td>'.$row['status'].'</td></tr>';
                 
                }
                $a.='</table>';
                echo $a;
            }

        }

if($m==3){
    $abc='';
    $name=$_SESSION['userdata']['username'];
    $sql1="SELECT * FROM users WHERE `username`='".$name."'";
    
    $result=$conn->query($sql1);
    
    if ($result->num_rows > 0) {
       
        while ($row= $result->fetch_assoc()) {

          $abc=$row['user_id'];
        }
    }
    $sql="SELECT * from ride WHERE customer_id='".$abc."' AND `status`='pending'";
    $result=$conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<center><h2>Welcome-Admin-Ride-Approval Page  </h2></center><center>";
     
        while ($row= $result->fetch_assoc()) {
            $a.='<td>'.$row['ride_id'].'</td>';
            $a.='<td>'.$row['ride_date'].'</td>';
            $a.='<td>'.$row['pickup'].'</td>';
            $a.='<td>'.$row['drop'].'</td>';
            $a.='<td>'.$row['total_distance'].'</td>';
            $a.='<td>'.$row['total_fare'].'</td>';
            $a.='<td>'.$row['laugage'].'</td>';
            $a.='<td>'.$row['status'].'</td>';
            $a.='<td><a href="update2.php?id='.$row['ride_id'].'">Update</a></td>';
            $a.='<td><a href="update3.php?id='.$row['ride_id'].'">Cancel</a></td></tr>';
        }
        $a.='</table>';
        echo $a;
    }
}

           }



   function form($a,$m,$conn){
       if($m==4){
    $abc='';
    $name=$_SESSION['userdata']['username'];
    $sql1="SELECT * FROM users WHERE `username`='".$name."'";
    
    $result=$conn->query($sql1);
    
    if ($result->num_rows > 0) {
       echo '<center><h2>Personal-Details</h2></center>';
      
        while ($row= $result->fetch_assoc()) {
            $a.='<td>'.$row['user_id'].'</td>';
            $a.='<td>'.$row['name'].'</td>';
            $a.='<td>'.$row['contact'].'</td>';
            $a.='<td>'.$row['date'].'</td>';
            $a.='<td>'.$row['username'].'</td></tr>';


        
        }
        $a.='</table>';
        echo $a;
    }
}
if($m==5){
    
    
    echo $a;
    if(isset($_POST['submit'])){
        $phone=isset($_POST['phone'])?$_POST['phone']:'';
        $name=isset($_POST['name'])?$_POST['name']:'';
        $username=isset($_POST['username'])?$_POST['username']:'';
    
        if($_SESSION['userdata']['username']==$username){
            
        $sql="UPDATE users
         SET  `contact`='".$phone."',`name`='".$name."' Where `username`='".$username."'";
         
         $result=$conn->query($sql);
         echo "details updated";
        }
        else{
            echo "<h2>details not updated</h2>";    
        }
}        
}  
if($m==6){
  

    
    echo $a;
    if(isset($_POST['submit'])){
       
        $name=isset($_POST['pass'])?$_POST['pass']:'';
        $username=isset($_POST['username'])?$_POST['username']:'';
        if($_SESSION['userdata']['username']==$username){
            
            $sql="UPDATE users
             SET  `password`='".md5($name)."' Where `username`='".$username."'";
             echo $sql;
             $result=$conn->query($sql);
            }
}
}



    }
    function fetch($conn){
    
        $name=$_SESSION['userdata']['username'];
        $sql1="SELECT * FROM users WHERE `username`='".$name."'";
        $result=$conn->query($sql1);
        if ($result->num_rows > 0) {
       
            while ($row= $result->fetch_assoc()) {
    
              $abc=$row['user_id'];
            }
        }
        $sql="SELECT SUM(total_fare) As Total from ride WHERE customer_id='".$abc."' AND `status`='active'"; 
        $result=$conn->query($sql);
        $row= $result->fetch_assoc();
         echo '₹='.$row['Total'];
    }
    function fetch2($conn){
        $name=$_SESSION['userdata']['username'];
        $sql1="SELECT * FROM users WHERE `username`='".$name."'";
        $result=$conn->query($sql1);
        if ($result->num_rows > 0) {
       
            while ($row= $result->fetch_assoc()) {
    
              $abc=$row['user_id'];
            }
        }
        $sql="SELECT COUNT(total_fare) As Total from ride WHERE customer_id='".$abc."' AND `status`='active'"; 
        $result=$conn->query($sql);
        $row= $result->fetch_assoc();
         echo'='. $row['Total'];
    }
    function fetch3($conn){
        $name=$_SESSION['userdata']['username'];
        $sql1="SELECT * FROM users WHERE `username`='".$name."'";
        $result=$conn->query($sql1);
        if ($result->num_rows > 0) {
       
            while ($row= $result->fetch_assoc()) {
    
              $abc=$row['user_id'];
            }
        }
        $sql="SELECT COUNT(total_fare) As Total from ride WHERE customer_id='".$abc."' AND `status`='pending'"; 
        $result=$conn->query($sql);
        $row= $result->fetch_assoc();
         echo '='. $row['Total'];
}

function filterrr($a,$filter,$conn){
   if($filter==7){
    $sql="SELECT * FROM users
    ORDER BY `date` DESC
    LIMIT 0, 7";
    $result=$conn->query($sql);
    if ($result->num_rows > 0) {
       
        while ($row= $result->fetch_assoc()) {
            $a.='<td>'.$row['user_id'].'</td>';
            $a.='<td>'.$row['name'].'</td>';
            $a.='<td>'.$row['contact'].'</td>';
            $a.='<td>'.$row['date'].'</td>';
            $a.='<td>'.$row['username'].'</td></tr>';
        }
        $a.='</table>';
        echo $a;
    }
   }
   if($filter==30){

    $sql="SELECT * FROM users
    ORDER BY `date` DESC
    LIMIT 0, 30";
    $result=$conn->query($sql);
    if ($result->num_rows > 0) {
       
        while ($row= $result->fetch_assoc()) {
            $a.='<td>'.$row['user_id'].'</td>';
            $a.='<td>'.$row['name'].'</td>';
            $a.='<td>'.$row['contact'].'</td>';
            $a.='<td>'.$row['date'].'</td>';
            $a.='<td>'.$row['username'].'</td></tr>';
        }
        $a.='</table>';
        echo $a;
    }

   }
   if($filter==1){

    $sql="SELECT * FROM ride WHERE `status`='active'
    ORDER BY total_fare DESC ";
    $result=$conn->query($sql);
    if ($result->num_rows > 0) {
       
        while ($row= $result->fetch_assoc()) {
            $a.='<td>'.$row['ride_id'].'</td>';
            $a.='<td>'.$row['ride_date'].'</td>';
            $a.='<td>'.$row['pickup'].'</td>';
            $a.='<td>'.$row['drop'].'</td>';
            $a.='<td>'.$row['total_distance'].'</td>';
            $a.='<td>'.$row['total_fare'].'</td>';
            $a.='<td>'.$row['laugage'].'</td></tr>';
        }
        $a.='</table>';
        echo $a;
    }

   }
   if($filter=='name'){
    $sql="SELECT * FROM users WHERE `boolean_admin`='1'
    ORDER BY `name` DESC 
    LIMIT 0, 7";
    $result=$conn->query($sql);
    if ($result->num_rows > 0) {
       
        while ($row= $result->fetch_assoc()) {
            $a.='<td>'.$row['user_id'].'</td>';
            $a.='<td>'.$row['name'].'</td>';
            $a.='<td>'.$row['contact'].'</td>';
            $a.='<td>'.$row['date'].'</td>';
            $a.='<td>'.$row['username'].'</td></tr>';
        }
        $a.='</table>';
        echo $a;
    }

   }

   if($filter=='fare'){
    $sql="SELECT * FROM ride
    ORDER BY total_fare DESC ";
    $result=$conn->query($sql);
    if ($result->num_rows > 0) {
       
        while ($row= $result->fetch_assoc()) {
            $a.='<td>'.$row['ride_id'].'</td>';
            $a.='<td>'.$row['ride_date'].'</td>';
            $a.='<td>'.$row['pickup'].'</td>';
            $a.='<td>'.$row['drop'].'</td>';
            $a.='<td>'.$row['total_distance'].'</td>';
            $a.='<td>'.$row['total_fare'].'</td>';
            $a.='<td>'.$row['laugage'].'</td></tr>';
        }
        $a.='</table>';
        echo $a;
    }

   }
   if($filter=='date'){
    $sql="SELECT * FROM ride
    ORDER BY ride_date DESC ";
    $result=$conn->query($sql);
    if ($result->num_rows > 0) {
       
        while ($row= $result->fetch_assoc()) {
            $a.='<td>'.$row['ride_id'].'</td>';
            $a.='<td>'.$row['ride_date'].'</td>';
            $a.='<td>'.$row['pickup'].'</td>';
            $a.='<td>'.$row['drop'].'</td>';
            $a.='<td>'.$row['total_distance'].'</td>';
            $a.='<td>'.$row['total_fare'].'</td>';
            $a.='<td>'.$row['laugage'].'</td></tr>';
        }
        $a.='</table>';
        echo $a;
    }

   }

}

   
 }


class admin{
    
    function ride_status2($myyy,$conn){
        $sql="SELECT * from ride WHERE ride_id='".$myyy."'";
        $result=$conn->query($sql);
        if ($result->num_rows > 0) {
          $row= $result->fetch_assoc();
          $sql1="UPDATE `ride` SET `status`= 'block'  WHERE `ride_id`='".$myyy."'";
          $result=$conn->query($sql1);
          header("Location:admin.php?id=4");
        }

    }
    function ride_status($myyy,$conn){
        $sql="SELECT * from ride WHERE ride_id='".$myyy."'";
        
    
        $result=$conn->query($sql);
      
    if ($result->num_rows > 0) {

        $row= $result->fetch_assoc();

        if($row['status']=='pending'){
          
        $sql1="UPDATE `ride` SET `status`= 'active'  WHERE `ride_id`='".$myyy."'";
    
        $result=$conn->query($sql1);
        header("Location:admin.php?id=5");
        
  }
    else{
        $sql1="UPDATE ride SET `status`= 'pending' WHERE `ride_id`='".$myyy."' ";
        $result=$conn->query($sql1);
        header("Location:admin.php?id=4");
}


}
   

}


function ride( $a,$m,$conn){
    if($m==1){
        echo "<center><h2>User </h2></center><center>";
        $sql1="SELECT * from users where `boolean_admin`='1'";
        $result=$conn->query($sql1);
        if ($result->num_rows > 0) {
        while ($row= $result->fetch_assoc()) {
        $a.='<td>'.$row['name'].'</td>';
        $a.='<td>'.$row['username'].'</td>';
        $a.='<td>'.$row['user_id'].'</td>';
        $a.='<td>'.$row['contact'].'</td>';
        $a.='<td>'.$row['boolean_status'].'</td>';
        $a.='<td><a href="update4.php?id='.$row['user_id'].'">toggle</a></td></tr>';
        
   
        

    }
    $a.='</table>';
    echo $a;
    }

    }
if($m==2){
    echo "<center><h2>User-approve </h2></center><center>";
    $sql1="SELECT * from users Where `boolean_status`='1' AND  `boolean_admin`='1'";
    $result=$conn->query($sql1);
    if ($result->num_rows > 0) {
    while ($row= $result->fetch_assoc()) {
    $a.='<td>'.$row['name'].'</td>';
    $a.='<td>'.$row['username'].'</td>';
    $a.='<td>'.$row['user_id'].'</td>';
    $a.='<td>'.$row['contact'].'</td>';
    $a.='<td>'.$row['boolean_status'].'</td></tr>';

    

}
$a.='</table>';
echo $a;
}
}
if($m==3){
    echo "<center><h2>User-pending </h2></center><center>";
    $sql1="SELECT * from users Where `boolean_status`='0' ";
    $result=$conn->query($sql1);
    if ($result->num_rows > 0) {
    while ($row= $result->fetch_assoc()) {
    $a.='<td>'.$row['name'].'</td>';
    $a.='<td>'.$row['username'].'</td>';
    $a.='<td>'.$row['user_id'].'</td>';
    $a.='<td>'.$row['contact'].'</td>';
    $a.='<td>'.$row['boolean_status'].'</td></tr>';
 
}
$a.='</table>';
echo $a;
}
}

}
function pending($m,$conn){
    $sql1="SELECT * from users Where `user_id`='".$m."' ";
    $result=$conn->query($sql1);
    if ($result->num_rows > 0) {
        while ($row= $result->fetch_assoc()) {
            if($row['boolean_status']==1){
                $sql2="UPDATE `users` SET `boolean_status`='0' WHERE  `user_id`='".$m."' ";
                $result=$conn->query($sql2);
                header("Location:admin.php?id=1");
            }
            else{
                $sql2="UPDATE `users` SET `boolean_status`='1' WHERE  `user_id`='".$m."' ";
                $result=$conn->query($sql2);
                header("Location:admin.php?id=1");
            }
      
        }
}
}
function ride2($a,$m,$conn){
    if($m==4){
        echo "<center><h2>User-ride </h2></center><center>";
        $sql1="SELECT * from ride";
        
        $result=$conn->query($sql1);
     
        if ($result->num_rows > 0) {
        while ($row= $result->fetch_assoc()) {
        $a.='<td>'.$row['ride_id'].'</td>';
        $a.='<td>'.$row['ride_date'].'</td>';
        $a.='<td>'.$row['pickup'].'</td>';
        $a.='<td>'.$row['drop'].'</td>';
        $a.='<td>'.$row['total_distance'].'</td>';
        $a.='<td>'.$row['total_fare'].'</td>';
        $a.='<td>'.$row['laugage'].'</td>';
        $a.='<td>'.$row['status'].'</td>';
        $a.='<td><a href="update2.php?id='.$row['ride_id'].'">Update</a></td>';
        $a.='<td><a href="update3.php?id='.$row['ride_id'].'">Cancel</a></td></tr>';
    }
    $a.='</table>';
    echo $a;
}
    }
if($m==5){
    echo "<center><h2>Approve-ride </h2></center><center>";
  
    $sql1="SELECT * from ride Where `status`='active'";
    
    $result=$conn->query($sql1);
 
    if ($result->num_rows > 0) {
    while ($row= $result->fetch_assoc()) {
    $a.='<td>'.$row['ride_id'].'</td>';
    $a.='<td>'.$row['ride_date'].'</td>';
    $a.='<td>'.$row['pickup'].'</td>';
    $a.='<td>'.$row['drop'].'</td>';
    $a.='<td>'.$row['total_distance'].'</td>';
    $a.='<td>'.$row['total_fare'].'</td>';
    $a.='<td>'.$row['laugage'].'</td>';
    $a.='<td>'.$row['status'].'</td></tr>';
    
}
$a.='</table>';
echo $a;
}
}
if($m==6){
    echo "<center><h2>Pending-ride </h2></center><center>";
  
    $sql1="SELECT * from ride Where `status`='pending'";
    
    $result=$conn->query($sql1);
 
    if ($result->num_rows > 0) {
    while ($row= $result->fetch_assoc()) {
    $a.='<td>'.$row['ride_id'].'</td>';
    $a.='<td>'.$row['ride_date'].'</td>';
    $a.='<td>'.$row['pickup'].'</td>';
    $a.='<td>'.$row['drop'].'</td>';
    $a.='<td>'.$row['total_distance'].'</td>';
    $a.='<td>'.$row['total_fare'].'</td>';
    $a.='<td>'.$row['laugage'].'</td>';
    $a.='<td>'.$row['status'].'</td>';
    $a.='<td><a href="update2.php?id='.$row['ride_id'].'">Update</a></td>';
    $a.='<td><a href="update3.php?id='.$row['ride_id'].'">Cancel</a></td></tr>';
}
$a.='</table>';
echo $a;
}
}

if($m==7){
    echo "<center><h2>Cancel-ride </h2></center><center>";
   $sql1="SELECT * from ride Where `status`='block'";
    $result=$conn->query($sql1);
   if ($result->num_rows > 0) {
    while ($row= $result->fetch_assoc()) {
    $a.='<td>'.$row['ride_id'].'</td>';
    $a.='<td>'.$row['ride_date'].'</td>';
    $a.='<td>'.$row['pickup'].'</td>';
    $a.='<td>'.$row['drop'].'</td>';
    $a.='<td>'.$row['total_distance'].'</td>';
    $a.='<td>'.$row['total_fare'].'</td>';
    $a.='<td>'.$row['laugage'].'</td>';
    $a.='<td>'.$row['status'].'</td>';
    $a.='<td><a href="update2.php?id='.$row['ride_id'].'">Update</a></td>';
    $a.='<td><a href="update3.php?id='.$row['ride_id'].'">Cancel</a></td></tr>';
}
$a.='</table>';
echo $a;
}
}

}
function ride3($a,$m,$conn){
    if($m==8 || $m==9){
        echo "<center><h2>Location</h2></center><center>";
      
        $sql1="SELECT * from `location` ";
        $result=$conn->query($sql1);
        if ($result->num_rows > 0) {
            while ($row= $result->fetch_assoc()) {
                $a.='<td>'.$row['location_name'].'</td>';
                $a.='<td>'.$row['distance'].'</td>';
                $a.='<td>'.$row['is_avb'].'</td></tr>';
        
        }
        $a.='</table>';
        echo $a;
        }

    }
    if($m==10){
     echo $a;
    if(isset($_POST['submit'])){

  
    $a= $_POST['distance'];
    $b=$_POST['location'];
 
    $sql="INSERT INTO `location` (`id`, `location_name`, `distance`, `is_avb`) VALUES (NULL, '".$b."', '".$a."', '0');";
    $result=$conn->query($sql);

    } 
}
}
function ride4($a,$conn){
   
    echo $a;
    if(isset($_POST['submit'])){

  
        $a= $_POST['username'];
        $b=$_POST['phone']; 
        $c=$_POST['pass'];
        $sql="UPDATE  `users`  SET  `password`= '".md5($c)."' WHERE  `username`='".$a."' AND   `contact` = '".$b."' "; 
        $result=$conn->query($sql);
       
 

}

}
function adm($a,$conn){
    if($a=='a'){
        $sql="SELECT COUNT(user_id) As Total from users";
        $result=$conn->query($sql);
        $row= $result->fetch_assoc();
         echo '='.$row['Total'];
    }
    if($a=='b'){
        $sql="SELECT SUM(total_fare) As Total from ride";
        $result=$conn->query($sql);
        $row= $result->fetch_assoc();
         echo '₹='.$row['Total'];
    }
    if($a=='c'){
        $sql="SELECT COUNT(user_id) As Total from users WHERE `boolean_status`='1' AND `boolean_admin`='1'";
        $result=$conn->query($sql);
        $row= $result->fetch_assoc();
         echo '='. $row['Total'];
    }
    if($a=='d'){
        $sql="SELECT COUNT(user_id) As Total from users WHERE `boolean_status`='0' AND `boolean_admin`='1'";
        $result=$conn->query($sql);
        $row= $result->fetch_assoc();
         echo '='.$row['Total'];
    }
    if($a=='e'){
        $sql="SELECT COUNT(total_fare) As Total from ride WHERE `status`='pending'";
        $result=$conn->query($sql);
        $row= $result->fetch_assoc();
         echo '='. $row['Total'];
    }
    if($a=='f'){
        $sql="SELECT COUNT(total_fare) As Total from ride WHERE `status`='block'";
        $result=$conn->query($sql);
        $row= $result->fetch_assoc();
         echo '='.$row['Total'];
    }
}

}


class location{
    function pickup($conn){
           $sql="SELECT * from `location` WHERE `is_avb`='1'";
              $result=$conn->query($sql);
              if ($result->num_rows > 0) {
              while ($row= $result->fetch_assoc()) {
              $a='<option value="'.$row['location_name'].'">'.$row['location_name'].'</option>';
              echo $a;
              }
             
            }

    }
    function array($conn){
       
        $cabby2=array();
        $sql="SELECT * FROM `location` WHERE `is_avb`='1'";
        $result=$conn->query($sql);
          if ($result->num_rows > 0) {
          while ($row= $result->fetch_assoc()) { 
              $cabby2[$row['location_name']]=$row['distance'];
              
            
          }
         
         return ( $cabby2);
        
          }
        }
    
}


?>