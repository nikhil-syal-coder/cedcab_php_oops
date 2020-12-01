<?php

  class DB{
  public $dbhost="localhost";
  public $dbuser="root";
  public $dbpass="";
  public $dbname="cab";
  public $conn;

   function __construct(){
    $this->conn=new mysqli("localhost","root", "", "cab");
    

   }
   
  }



?>