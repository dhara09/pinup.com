<?php
$host="localhost";
$user="root";
$password="123456";
$dbname="userDatabase";
$con=mysqli_connect($host,$user,$password,$dbname);
if(mysqli_connect_errno()){
die("Failed to connect to MySQL: " . mysqli_connect_error());}
else{/*echo "Connected succcessfully !! ";*/}
?>