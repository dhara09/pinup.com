<?php
if(!isset($_SESSION)){ 
    session_start();}
$errmsg='';
$check=0;
$email=$_POST['Users']['email'];
$password=$_POST['Users']['password'];
if(isset($_POST['Users']['email'])) 
{ 
        if(empty($email)){
            $errmsg .= "Fill email </br>" ;
            $check=1;
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errmsg .= "Enter valid Email Address <br>" ;
            $check=1;
        }
        if(empty($password)){
            $errmsg .= "Fill password" ;
            $check=1;
        }
        if($check == 0){   
            header("Location:http://local.pinup.com/login.php?error=$errmsg&em=$email&pass=$password");
        }   
    }
    //exit;
require_once("connection.php");
$email=$_POST['Users']['email'];
$password=$_POST['Users']['password'];
//$pass=MD5($password);
echo $query="SELECT * FROM User WHERE email='$email' and password='$password'";
$result=mysqli_query($con,$query) or die(mysqli_error());
echo $rows=mysqli_num_rows($result);
if(!$rows = 1){
    echo "combination of name & pass dont match.<p>Click here to <a href='login.php'>Login</a></div></p>";
}
else{
    session_start();
		$_SESSION['email']=$email;
		header("location: welcome.php");
}  