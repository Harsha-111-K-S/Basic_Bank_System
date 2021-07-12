<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ViewSpecific and Transact</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<style type="text/css">
	   *{
	       margin:  0px;
	       padding:  0px;
        }
        body
        {
	       margin:  0px;
           padding:  0px;
           background-image: url("bac3.jpg");
           background-size: cover;
           background-position: center center;
           background-repeat: no-repeat;
           background-attachment: fixed;  
        }
       .logo
        {
           display: inline;
           margin-left: 60px;
           line-height: 80px;
        }
       .logo label
        {
           position: relative;
           font-size: 27px;
           font-family: arial;
           color: white;
        }
       .header
       {
           position: relative;
           background: rgba(0,0,0,.8);
           margin: 0px;
           padding: 0px;
           width: 100%;
           height:  100px;

        }
      ul
       {
           display: inline;
           position: relative;
           float: right;
           margin-top: 0px; 
        }
       ul li
       {
	       position: relative;
           list-style: none;
           display: inline-block;
           margin-right: 60px;
           margin-top: 40px;
        }
       li a
       {
           text-decoration: none;
           color: white;
           font-size: 20px;
           padding: 20px 22px;
           border-width: 3px;
           border-radius: 40px;
           font-family: sans-serif;
        }
       li a:hover
       {
          background-color: white;
          transition: .6s;
          color: black;
        }
       .tbSec
       {
	      margin-top: 40px;
	      padding-top: 10px;
        }
       .tbSec table
       {
	      width: 100%;
	      margin-top: 10px;
	      text-align: center;
        }
       .htableSection
       {
	      position: relative;
	      margin-top: 60px;
        }
       .namefield
        {
           position: absolute;
           top: 30%;
           margin-left: 60px;
           border-radius: 60px;
           text-align: center;
           width: 250px;
           font-family: sans-serif;
           background: red;
           color: white ;
        }
       .emailfield
       {
          position: absolute;
          top:  45%;
          margin-left: 60px;
          border-radius: 60px;
          text-align: center;
          width: 250px;
          font-family: sans-serif;
          color: white;
          background: red;
        }
       .idfield
       {
          position: absolute;
          margin-left: 60px;
          border-radius: 60px;
          text-align: center;
          width: 250px;
          top: 14%;
          color: white;
          background: red;
        }
       .balancefield
       {
          position: absolute;
          margin-left: 60px;
          top: 60%;
          text-align: center;
          width: 250px;
          border-radius: 60px;
          background: red;
          color: white;
        }
       .viewsec
       {
          position: absolute;
          background: rgba(0,0,0,.5);
          height: 450px;
          width: 800px ;
          margin-left: 300px;
          margin-top: 75px;
          border-radius: 50px;
        }
       .btn-dark
       {
          position: absolute;
          width: 250px;
          right: 85px;
          bottom: 17%;
          border-radius: 60px;
          border-color: red;
        }
       .btn-dark:hover
       {
          background-color: black;
          border-color: white; 
          transition: 1s;
        }
        .img{
         width: 400px;
         height: 450px;
         display: inline;
         border-radius: 0px 0px 0px 40px;
        }
</style>
</head>
<body>
	<div class="header">
        <div class="logo">
		    <label><span style="font-size: 50px;">S</span>PARKS BANK</label>
	    </div>
	    <ul>
	   	   <li><a href="homepage.html" class="text">Home</a></li>
	    </ul>
    </div>
   <?php  include 'configConn.php';
   $id = $_GET['id'];
   $sql = "SELECT * FROM customerdetails WHERE customer_id=$id";
   $res = $conn->query($sql);
   if(!$res){
     echo "Error : ".$sql."<br>".mysqli_error($conn);
   }?>
    <div  class="viewsec">
        <?php
            if($res-> num_rows > 0){
            while($row= $res->fetch_assoc()){
            echo "<img src='{$row['customer_image']}' class='img'  />";
            echo "<input type='text' name='id' value='{$row['customer_id']}' class='idfield'/>";
            echo "<input type='text' name='name' value='{$row['customer_name']}' class='namefield'/>" ;
            echo "<input type='text' name='email' value='{$row['email']}' class='emailfield'/>" ;
            echo "<input type='text' name='balance' value='{$row['balance']}' class='balancefield'/>";
            echo "<button class='btn btn-dark' style='margin-left: 20px;'><a href='transact.php? id=$id
                       ' style='text-decoration:none; color:white'>TRANSACT</a></button>";
            }
        }
        ?>
    </div>
</body>
</html>     