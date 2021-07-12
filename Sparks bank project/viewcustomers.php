<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ViewCustomers</title>
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
           background-image: url("cusbac.jpg")  ;
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
    <div class="htableSection">
       <h1 style="font-family: arial; color:white;font-weight: bold; text-align: center">CUSTOMERS</h1>
	    <div class="tbSec">
	   	    <table class="table table-dark table-striped">
		        <thead>
			      <th>Customer id</th>
			      <th>Customer name</th>
			      <th>Email-id</th>
			      <th>Balance</th>
			      <th>View customer</th>
		        </thead>
		        <tbody>
				   <?php include("configConn.php");
				   $sql= "SELECT * FROM customerdetails";
				   $res= $conn->query($sql);
				   if(!$res){
					  die("error in retrieval");
				    }
				    if($res-> num_rows >0)
				    while($row= $res->fetch_assoc()){
					   $id=$row['customer_id'];
				       echo "
				       <tr>
				       <td>".$row['customer_id']."</td>
				       <td>".$row['customer_name']."</td>
				       <td>".$row['email']."</td>
				       <td>".$row['balance']."</td>
				       <td>
				       <button class='btn btn-primary' style='margin-left: 20px;'><a href='viewspecandtransact.php?id=$id
				       ' style='text-decoration:none; color:white;'>VIEW</a></button>
				       </td>
				       </tr>";
                    }
			        ?>
		        </tbody>
            </table>
        </div>
    </div>
</body>
</html>