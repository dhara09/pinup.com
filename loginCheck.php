<?php
if(!isset($_SESSION)){ 
    session_start();}
if(isset($_POST['Users']['email'])) 
{ 
    $email=$_POST['Users']['email'];
    $password=$_POST['Users']['password'];
    $errmsg='';
    $check=0;
        if(empty($email)){
            $errmsg .= "Please Fill Email Address </br>" ;
            $check=1;
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errmsg .= "Enter Valid Email Address <br>" ;
            $check=1;
        }
        if(empty($password)){
            $errmsg .= "Please Fill Your Password" ;
            $check=1;
        }
        if($check == 1){   
            header("Location:http://local.pinup.com/login.php?error=$errmsg&email=$email");
            exit;
        }   
    }
require_once("connection.php");
$email=$_POST['Users']['email'];
$password=$_POST['Users']['password'];
$userpass=md5($password);
$query="SELECT * FROM User WHERE email='$email' and password='$userpass'";
$result=mysqli_query($con,$query) or die(mysqli_error());
$rows=mysqli_num_rows($result);
if($rows == 1){
     session_start();
	$_SESSION['email']=$email;
	header("location: welcome.php");
}
else{  
    header("location:login.php");}