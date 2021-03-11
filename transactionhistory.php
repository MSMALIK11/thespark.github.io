<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction history</title>
    <link rel="stylesheet" href="css/history.css">
</head>
<body>
<?php include("nav_bar.php"); ?>
<div class="container">
<h1>TRANSACTION<span>HISTORY</span></h1>


<?php 
$server="localhost";
$user="root";
$password="";
$db="tsf_bank";
$con=mysqli_connect($server,$user,$password,$db);

if(!$con)
{
    echo " connection error"; 

}

$sql= "SELECT * FROM transaction ";


$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);







if(mysqli_fetch_array($result)){

    echo ' <table class="table">';
    echo " <thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>  SENDER</th>";
    echo " <th>RECEIVER</th> ";
    echo "  <th>BALANCE</th>";
  
    echo "  </tr>";
    echo " </thead> ";
    

    echo " <tbody> ";
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){


    echo "<tr>";
    echo "<td>" .$row['t_id']. "</td>";
    echo "<td>" .$row['sender']. "</td>";
    echo "<td>" .$row['receiver']. "</td>";
    echo "<td>" .$row['balance']. "</td>";
   

    echo "</tr>";

    }

    echo "</tbody>";

   echo "</table>";

}


?>




</div>



    
</body>
</html>