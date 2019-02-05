<?php
if(!isset($_SESSION)){ 
    session_start();}
/* $data=array(
    $email=$_POST['Users']['email'],
    $password=$_POST['Users']['password'],
);   
$query=http_build_query($data); */
if(isset($_POST['Users']['email'])) 
{ 
    $email=$_POST['Users']['email'];
    $password=$_POST['Users']['password'];
    $errmsg='';
    $check=0;
        if(empty($email))
        {
            $errmsg .= "Fill email </br>" ;
            $check=1;
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $errmsg .= "Enter valid Email Address <br>" ;
            $check=1;
        }
        if(empty($password))
        {
            $errmsg .= "Fill password" ;
            $check=1;
        }
        if($check == 1)
        {   
            header("Location:http://local.pinup.com/login.php?error=$errmsg");
           // $url="http://local.pinup.com/login.php?que=$query";
            //$encode=rawurlencode($url);
            //header("Location:http://local.pinup.co/login.php?.$encode");
            //header("Location:http://local.pinup.com/login.php?error=".urlencode(serialize($query)));
            //header("Location:http://local.pinup.com/login.php?error=$errmsg&em=$email&pass=$password");
        }
}
require_once("connection.php");
$email=$_POST['Users']['email'];
$password=$_POST['Users']['password'];
$pass=MD5($password);
echo $query="SELECT * FROM User WHERE email='$email' and password='$pass'";
$result=mysqli_query($con,$query) or die(mysqli_error());
echo $rows=mysqli_num_rows($result);
if(!$rows = 1){
    echo "combination of name & pass dont match.<p>Click here to <a href='login.php'>Login</a></div></p>";
}
else{
    header("Location: welcome.php");
}  