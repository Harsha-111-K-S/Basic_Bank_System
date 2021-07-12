<?php  include 'configConn.php';
if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customerdetails where customer_id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from customerdetails where customer_id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);

    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }
    else if($amount > $sql1['balance']) 
    {
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    else if($amount == 0)
    {
        echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
     }
    else 
    {
        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE customerdetails set balance=$newbalance where customer_id=$from";
        mysqli_query($conn,$sql);
             
        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE customerdetails set balance=$newbalance where customer_id=$to";
        mysqli_query($conn,$sql);
                
        $sender = $sql1['customer_name'];
        $receiver = $sql2['customer_name'];
        $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
        $query=mysqli_query($conn,$sql);

        if($query)
        {
            echo "<script> alert('Transaction Successful');
            window.location='transactiondetails.php';
            </script>";
                    
        }
        $newbalance= 0;
        $amount =0;
        }    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">

    <style type="text/css">
    	
		button{
		
			background: #760000;
            color:  white;
		}
	    button:hover{
			background-color:black;
			transform: 2s;
			color:white;
            border-color: white;
		}
        .btn{
            border-radius: 40px;
            position: absolute;
            left:  20px;           
            border-width: 3px;

        }
        .container{
            position: absolute;
            height: 400px;
            width: 450px;
            left: 40%;
            border-radius: 10px 50px 50px 50px;
        }
        .container : hover{
            border-color: white;
            transition:  .5s;
        }
      
        body
        {
           margin:  0px;
           padding:  0px;
           background:
           url("bac4.jpg");
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
       {  text-decoration: none;
          background-color: white;
          transition: .6s;
          color: black;
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
    <h2 class="text-center pt-4" style="color: white">TRANSFER MONEY</h2>
 	<div class="container">
       <fieldset style="border-color: white;">
        <form method="post" name="tcredit" class="tabletext" >
            <br><br><br>
            <label style="font-size: 20px; color: white; font-weight: 30px;">TRANSFER TO</label>
            <select name="to" class="form-control" required style="background: #19001D; color: white; width: 300px; border-radius: 40px;">
            <option value="" disabled selected >Choose</option>
            <?php
                include 'configConn.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM customerdetails where customer_id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['customer_id'];?>" >               
                    <?php echo $rows['customer_name'] ;?> (Balance: 
                    <?php echo $rows['balance'] ;?> )               
                </option>
            <?php 
                } 
            ?>
            </select>
            <br>
            <br>
            <label style="font-size: 20px; font-weight: 30px; color: white">AMOUNT</label>
            <input type="number" class="form-control" name="amount" required style="background:#19001D; color: white; width: 300px; border-radius: 40px;">   
            <br><br>
            <div class="text-center" >
                <button class="btn" name="submit" type="submit" id="myBtn">TRANSFER</button>
            </div>
        </form>
      </fieldset>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
