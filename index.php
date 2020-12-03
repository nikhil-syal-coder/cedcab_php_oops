<?php


require_once('class.php');
require_once('config.php');
$obj= new DB();
$obj5=new location();
?>


<!DOCTYPE html>
<html>
<head>
  <title>Cab Fare</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script><!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script> -->
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"><link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
<!-- this is my feilds -->
<link rel="stylesheet" type="text/css" href="cab/index.css">
<script type="text/javascript" src="cab/index.js"></script>
<script type="text/javascript" src="cab/jquery.js"></script>
</head>
<body>
	 <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-3 ">
         <a class="navbar-brand ml-5" href="#" style="font-size: 35px;color:rgba(218, 22, 74, 1); font-weight:40;">ce<span>dca</span>b</a>
          <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar_menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbar_menu">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="../user.php" class="nav-link ml-5 h5 mt-2"><?php
                if(isset($_SESSION['userdata']['username'])){
                    session_start();

                    echo "Welcome -"
                   .$_SESSION['userdata']['username']."";
                }
        



?></a>
              </li>
              <li class="nav-item">
                <a href="login.php" class="nav-link ml-5 h5 mt-2">Dashboard</a>
              </li>
              <li class="nav-item">
                <a href="login.php" class="nav-link ml-5 h5 mt-2">Previous-Ride</a>
              </li>
              <li class="nav-item">
                <a href="login.php" class="nav-link ml-5 h5 mt-2">Accounts</a>
              </li>
              <li class="nav-item">
                <a href="login.php" class="nav-link ml-5 h5 mt-2">Log-in</a>
              </li>
              <li class="nav-item">
               
              </li>
            </ul>
          </div>     
        </nav>
      </header>
	
    <div class="info row ml-0 mr-0 pb-5">
      <div class="container p-0">
        <h2 class="font-weight-bold pt-4 text-white text-center h2"> Book a taxi in your destination in your town</h2>
        <p class="text-white text-center  ">choose from a range of catagaries and prices</p>   
      </div>

      <div class=" col-xs-10 col-sm-10 col-md-4 col-lg-4 mb-5 ">
        <form class="bg-white p-3">
          <div class="content">
            <p class="text-center"><span class="p-1">CITY TAXI</span></p>
            <h5 class="pt-1 abc abc2 h5 text-center"><b>Your everyday travel partner</b></h5>
            <p class="text-center abc">AC cabs for point to point travel</p>
          </div>
              
          <div class="input-group mb-2 p-0">
            <div class="input-group-prepend">
              <label class="input-group-text text_size" for="inputGroupSelect01">PICKUP</label>
            </div>

            <select class="custom-select abc3 s1 pickup" id="inputGroupSelect01" onchange="loc()">
            <option selected>Current-location</option>
            <?php 
              $obj5->pickup($obj->conn);

           
            
            ?>
        
          </select>
          </div>
         <p class="error2" ></p>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <label class="input-group-text text_size" for="inputGroupSelect01">DROP</label>
            </div>
            <select class="custom-select abc3 s2 drop" id="inputGroupSelect01" onchange="droploc()">
              <option selected>Enter Drop for ride estimate</option>
              <?php 
              $obj5->pickup($obj->conn);
              ?>
          
            </select>
          </div>
          <p class="error3" ></p>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <label class="input-group-text text_size" for="inputGroupSelect01">CAB TYPE</label>
            </div>
            <select class="custom-select abc3 pass" id="inputGroupSelect01" onchange="saman()">
              <option selected value="1">Select-Cab-Type</option>
              <option value="CedMicro">CedMicro</option>
              <option value="CedMini">CedMini</option>
              <option value="Cedsuv">Cedsuv</option>
              <option value="Cedroyal">Cedroyal</option>
            </select>
          </div>
          <p class="error4" ></p>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text text_size" id="basic-addon1"  >Luggage</span>
            </div>
            <input type="text" class="form-control abc3 new" placeholder="Enter Weight In KG" aria-label="Username" onkeypress="return onlynumber(event)" aria-describedby="basic-addon1">

          </div>
         <p class="error" ></p>
          <div class="input-group mb-2">

            <div class="input-group-prepend"></div>
            <input type="button" class="form-control fare" id="btn1" onclick="final()" value="Calculate-Fare" aria-label="Username" aria-describedby="basic-addon1">
          </div>

          <div class="input-group mb-2">
          <div class="input-group-prepend"></div>
          <a class="form-control book" id="btn1" href="book2.php"  aria-label="Username" aria-describedby="basic-addon1">Book-Now</a>
          </div>
          

         <div class="input-group mb-2">
            
            <input type="text" class="form-control abc3 new2" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-2">
            
            <input type="text" class="form-control abc3 new3" aria-label="Username" aria-describedby="basic-addon1">
          </div>
         	
         </div>
        </form>  
      </div> 


    <div class="container" >
	<div class="row">
		<div class=" col-md-4 col-lg-4  col-sm-12 col-xs-12 mt-3 text-center">
		
<a class="btn-floating btn-lg btn-fb" type="button" role="button"><i class="fab fa-facebook-f"></i></a>

<a class="btn-floating btn-lg btn-tw" type="button" role="button"><i class="fab fa-twitter"></i></a>

<a class="btn-floating btn-lg btn-ins" type="button" role="button"><i class="fab fa-instagram"></i></a>
		</div>
	    <div class=" col-md-4 col-lg-4 col-sm-12 col-xs-12 text-center">
	    	 <p class="mb-0 p">
                   <a class="navbar-brand" style="font-size: 35px;color:rgba(218, 22, 74, 1); font-weight:40;">ce<span>dca</span>b</a>
         </p>
                    
	    </div>
		<div class=" col-md-4 col-lg-4 col-sm-12 col-xs-12 mt-3 text-center">
			<nav class="">
				
                       <a href="#" class="ml-3 " >FEATURES</a>
                        <a href="#" class="ml-3">REVIEW</a>
                        <a href="#" class="ml-3" >SIGN UP</a>
                 

			</nav>
		</div>
	</div>
</div>
  </body>

</html>