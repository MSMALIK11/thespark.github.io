<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar</title>
    <link rel="stylesheet" href="css/navbar.css">
    <style>
    
        .brand_logo{
            position:relative;
            margin-right:100px;
        }

    .brand_logo a{
      
        margin-left:100px;
        color:indigo;
        letter-spacing:3px;
        font-size:30px;
      padding:7px;
        position:relative;
       
       line-height:60px;
        text-decoration: none;
      
      
       
    }
 .brand_logo a::before {
        content: "";
        height: 20px;
        width: 20px;
        position: absolute;
        top: 0;
        left: 0;
    }
 .brand_logo a::after {
    content: "";
    height: 20px;
    width: 20px;
    position: absolute;
    right: 0;
    bottom: 0;
}
  .brand_logo a::after {
    border-right: 4px solid #ec1839;
    border-bottom: 4px solid #ec1839;
}
    .brand_logo a::before {
    border-top: 4px solid #ec1839;
    border-left: 4px solid #ec1839;
}
    </style>
</head>
<body>


<div class="navbar">
   
<div class="brand_logo">
<a href="index.php">TSF BANK</a>

</div>

<nav>
<ul>
<li><a href="index.php" class="active">Home</a></li>
<li><a href="selectusers.php">transfer money</a></li>
<li><a href="transactionhistory.php">Transaction</a></li>

</ul></nav>

</div>
    
</body>
</html>