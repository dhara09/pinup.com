<?php
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
            $url=base64_encode($errmsg); $url1=base64_encode($email); $url2=base64_encode($password);
            header("Location:http://local.pinup.com/login.php?error=$url&email1=$url1&pass=$url2");
            return true;
        }  
}
require_once("./connection/connection.php");
$email=$_POST['Users']['email'];
$password=$_POST['Users']['password'];
$url1=base64_encode($email);
$userpass=md5($password);
$query="SELECT * FROM User WHERE email='$email' and password='$userpass'";
$result=mysqli_query($con,$query) or die(mysqli_error());
$rows=mysqli_num_rows($result);
if($rows == 1){  
    session_start();
    $_SESSION['email']=$email;
    header("Location:welcome.php?status=success"); }
else{ 
    header("location:login.php?status=error&email1=$url1");  }