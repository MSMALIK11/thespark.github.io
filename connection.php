<?php
$server="localhost";
$user="root";
$password="";
$db="tsf_bank";
$con=mysqli_connect($server,$user,$password,$db);

if(!$con){
    echo "connection failed";  
}




?>
