<?php 
include("auth.php");
session_start();
if(!isset($_SESSION['email'])){
header("location: welcome.php");}
$email=$_SESSION['email'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <body>
    <h4> <center>Welcome <?php echo $email;?></center></h4>
    <a href="logout.php"> Logout</a>
    </body>
</head>
</html>
