<?php
   $host= "localhost";
   $user= "root";
   $pass= "";
   $database= "customer";
   $conn= mysqli_connect($host,$user,$pass,$database);
   if(!$conn){
      die("error in connection to database");
   }


?>