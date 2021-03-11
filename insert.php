
<?php
$server="localhost";
$user="root";
$password="";
$db="tsf_bank";
$con=new mysqli($server,$user,$password,$db);

if($con){
    echo "connection successfull";  
}
else{
    echo " connection error"; 

}
$sql = "INSERT INTO userdata (name, email,balance)VALUES ('John','john@example.com','40000'),
('nitin','nitin@example.com','50000'),
('vishu','vishu@example.com','50000'),
('nadeem','nadeem@example.com','50000'),
('salman','salman@example.com','50000'),
('sharukh','sharukh@example.com','50000'),
('tiger','tiger@example.com','50000'),
('atif','atif@example.com','50000'),
('arijit','arijit@example.com','40000')";

if ($con->query($sql) === TRUE) {
  echo "New record created successfully";
} 
else {
    echo "Error: " . $sql . "<br>" . $con->error;
  }

