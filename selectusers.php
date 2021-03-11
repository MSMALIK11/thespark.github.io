
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
            box-sizing:border-box;
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
    outline:none;
    border:none;
}

.btn:hover{
    border:2px solid #fff;
}
 tr:hover {background-color: #f6e700;}

 form{
     display:block;
 }

    </style>

</head>
<body>

<?php include("nav_bar.php"); ?>


<div class="heading">
    <h1> TRANSFER <span>MONEY</span></h1>
</div>


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

$sql= "SELECT * FROM userdata ";


$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);







if(mysqli_fetch_array($result)){

    echo ' <table class="table">';
    echo " <thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>  NAME</th>";
    echo " <th>EMAIL</th> ";
    echo "  <th>BALANCE</th>";
    echo " <th>Action</th> ";
    echo "  </tr>";
    echo " </thead> ";
    

    echo " <tbody> ";
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){


    echo "<tr>";
    echo "<td>" .$row['id']. "</td>";
    echo "<td>" .$row['name']. "</td>";
    echo "<td>" .$row['email']. "</td>";
    echo "<td>" .$row['balance']. "</td>";
    echo '<td> <form action="transfer.php" method="GET">
    <input type="hidden"name="id" value=' .$row["id"].'>
   <input type="submit" class="btn" name="transfer" value="Transfer"> 

    

    </form> 
    </td>';

    echo "</tr>";

    }

    echo "</tbody>";

   echo "</table>";

}


?>












<script  src="javascript/user.js"></script>
    
</body>
</html>