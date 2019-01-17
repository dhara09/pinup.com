<?php
include('connection.php');
$sql = "INSERT INTO User (name,lastname,email,password,confirmpass)
VALUES (' ".$_POST['Users']['name']." ',' ".$_POST['Users']['lastname']." ',' ".$_POST['Users']['email']." ',' ".$_POST['Users']['password']." ',' ".$_POST['Users']['confirmpass']."')";

$sql1 = "INSERT INTO userDetail (address,contact)
VALUES (' ".$_POST['UserDetail']['address']." ','".$_POST['UserDetail']['contact']."')"; 

$sqlquery= "SELECT u.name,u.lastname,u.email,ud.address,ud.contact,u.password,u.confirmpass 
from User u left join userDetail ud on u.id=ud.id;";

if(!mysqli_query($con,$sql) && !mysqli_query($con,$sql1) )
{
    die("<br> Error: Record not inserted ".mysqli_error());
}
else
{
     echo "<br> Record added successfully !!!!!</br>";
    include("profile.php");
}
?>