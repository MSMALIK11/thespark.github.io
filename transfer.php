<?php
include("connection.php");

if(isset($_GET['submit']) && isset($_GET['to'])) {
     $from = $_GET['id'];
    $to = $_GET['to'];
    $amount = $_GET['amount'];


    
    $sql = "SELECT * from userdata where id=$from";
    $query = mysqli_query($con, $sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from userdata where id=$to";
    $query = mysqli_query($con, $sql);
    $sql2 = mysqli_fetch_array($query);
    
    
      

      // constraint to check input of negative value by user
      if (($amount) < 0) {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }  // constraint to check zero values
    else if ($amount == 0) {

        echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    } 
    else if ($amount > $sql1['balance']) {

        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    else if ($amount == 0) {

        echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    }
    else {

        // deducting amount from sender's account
        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE userdata set balance=$newbalance where id=$from";
        mysqli_query($con, $sql);

      //adding amount to receiver account 

      $newbalance = $sql2['balance']+$amount;
      $sql = "UPDATE userdata set balance=$newbalance where id =$to";
      mysqli_query($con,$sql);

      $sender= $sql1['name'];
      $receiver = $sql2['name'];
      $sql="INSERT INTO transaction(`sender`,`receiver`,`balance`)VALUES('$sender','$receiver','$amount')";
      $query=mysqli_query($con,$sql);


      if ($query) {
        echo "<script> alert('Transaction Successful');
        window.location='transactionhistory.php';
                                
                       </script>";
    }

      $newbalance = 0;
      $amount = 0;
  
    }

}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/userdata.css">

    <style>
         body{
            font-family: 'Jost', sans-serif;
            font-weight:400;
         }
        table{
            
            border-collapse: collapse;
            margin:10px auto;
            background:#fff;
            text-align:center;
            box-shadow:0px 0px 10px rgba(0,0,0,0.15);
        
          

          
        
            
        }
      
 
th {
  padding-top: 5px;
  padding-bottom: 12px;
  width:105px;
  background-color: #f6e700;
  color: #111;
  border: 1px solid #ddd;
  padding: 8px;
  text-align:center;
  padding:10px;
}

tr:nth-child(even){background-color: #f2f2f2;}

td{
    padding:20px;
    width:150px;

}
tr{
    width:150px;
}
.table .btn{
    padding:10px 15px;
    text-decoration:none;
    color:#111;
    background-color:#f6e700;
    border-radius:10px;
}
tr:hover {background-color: #f6e700;}

 form{
     display:block;
     width:65%;
     margin:0px auto;
     background-color:#fff;
     padding:40px;
     border-radius:10px;
     box-shadow:0px 0px 10px rgba(0,0,0,0.15);
        
          
     
 }


 section{

     min-height:400px;
     padding:60px 0px
     
     
 }
 label{
     font-size:25px;
     font-weight:400;
     margin-right:30px;
 }
input[type=text]{
    padding:10px 5px;
    background-color:#f6e700;
    text-align:center;
    border:none;
    width:150px;
    box-shadow:0px 0px 10px rgba(0,0,0,0.15);
    font-size:20px;
    border-radius:10px;
    cursor:pointer;
    outline:none;
    

}
input[type=submit]{
    padding:10px 5px;
    background-color:#f6e700;
    text-align:center;
    border:none;
    box-shadow:0px 0px 10px rgba(0,0,0,0.15);
    font-size:20px;
    padding:10px 12px;
    border-radius:10px;
    cursor:pointer;
    outline:none;
   margin-left:100px;
  
    
}
input[type=submit]:hover{
    background-color:#fff;
    box-shadow:0px 5px 10px rgba(0,0,0,0.15);
   
 
}

#dropdown{
    padding:10px 5px;
    background-color:#fff;
    text-align:center;
    border:none;
    box-shadow:0px 0px 10px rgba(0,0,0,0.20);
    font-size:15px;
    border-radius:10px;
    cursor:pointer;
    outline:none;
}

option{
    background:#f6e700;
    border-radius:10px;
    font-size:25px;
}

button{
    padding:15px 25px;
    text-align:center;
    background:#f6e700;
    font-size:20px;
    outline:none;
    border:none;
    border-radius:10px;
    box-shadow:0px 0px 10px rgba(0,0,0,0.20);
    margin-left:150px;

}
button:hover{
   box-shadow:0px 5px 10px rgba(0,0,0,0.30);

}
@media screen and (max-width: 720px) {
  
  
  label{
      text-align:center;
  display:flex;
  justify-content:center;
    
      font-size:20px;
      margin:5px;
  }
    
  input[type=text]{
    text-align:center;
    display:flex;
  justify-content:center;
    width:90%;
    margin:0px auto;

     
  }
  form{
      display:flex;
      flex-direction:column;

  }
  input[type=submit]{
    text-align:center;
    display:flex;
  justify-content:center;
    width:90%;
    margin:0px auto;

  }
 
}



    </style>

</head>
<body>

<?php include("nav_bar.php"); ?>


<div class="heading">
    <h1> USER <span>ACCOUNT</span></h1>
</div>

    
<?php
        include 'connection.php';

      

       $sid=$_GET['id'];
     
        $sql = "SELECT * FROM userdata WHERE id={$_GET['id']}";
        $result = mysqli_query($con, $sql);
       


        if (!$result) {
            echo "Error : " . $sql . "<br>" . mysqli_error($con);
        }
        
        $row = mysqli_fetch_assoc($result);
?>
  


<?php
 $sql = "SELECT * FROM userdata WHERE id=$sid";
 $result = mysqli_query($con, $sql);
 $row = mysqli_fetch_assoc($result); 


echo ' <table class="table">';
    echo " <thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>  NAME</th>";
    echo " <th>EMAIL</th> ";
    echo "  <th>BALANCE</th>";
 
    echo "  </tr>";
    echo " </thead> ";
    

    echo " <tbody> ";
  


        echo "<tr>";
        echo "<td>" .$row['id']. "</td>";
        echo "<td>" .$row['name']. "</td>";
        echo "<td>" .$row['email']. "</td>";
        echo "<td>" .$row['balance']. "</td>";
        
    
        echo "</tr>";
    
        
    
        echo "</tbody>";
    
       echo "</table>";
    
    


?>




<section>




<div class="heading">
    <h1> TRANSFER <span>MONEY</span></h1>
    <form class="transfer_form" action="" method="GET">


    <!-- <label>Sender</label> : <span class="sender"><input id="myinput" name="sender" disabled type="text" value='<?php echo $row['name'];?>'></input></span>
    <br><br> -->

    <input type="hidden"name="id" value='<?php echo $row['id'];?>'>
    <label>Sender</label><input type="text" class="btn" id="myinput" name="transfer" disabled value='<?php echo $row['name'];?>'>

<br><br>
    <label >Select Reciever</label>

    <select name="to" id="dropdown" required>
    <option >Select receiver</option>

    <?php 
    include 'connection.php';
    $user=$_POST['name'];

    

    $sql="SELECT * FROM  userdata WHERE name=name";

    $result = mysqli_query($con, $sql);

    if (!$result) {
        echo "Error : " . $sql . "<br>" . mysqli_error($con);
    }

   $row=mysqli_fetch_assoc($result); 


   while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){


    ?>
    <!-- echo("<option> "."  ".$row['name']."</option>"); -->
    <option class="table" value="<?php echo $row['id']; ?>">

    
<?php echo $row['name']; ?>


</option>

<?php
                }
                ?>
    
    
    </select>


    <br><br>

    <label>Enter Amount</label><span> <input type="text" name="amount" placeholder="Enter Amount....." style="background-color:#fff;">   </span>
<br><br><br>

     <!-- <button id="transfer"  name="submit" >Transfer</button> -->
     <input type="submit" name="submit"value="Transfer"> 

     

</form>



</section>

<script  src="javascript/user.js"></script>
    
</body>
</html>