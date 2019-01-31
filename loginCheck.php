<?php
if(isset($_POST['Users']['email'])) 
{
    $errmsg='';
    $check=0;
    $query=array(
        $email=$_POST['Users']['email'],
        $password=$_POST['Users']['password'],
    ); 
    //$query= http_build_query($query);  
   // $arg = base64_encode( json_encode($query) );

    $email=$_POST['Users']['email'];
    $a=urlencode($email);
    $password=$_POST['Users']['password'];
    $b=urlencode($password);
    if(empty($email))
    {
       $errmsg .= "Fill email </br>";
       $check=1;
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $errmsg .=" Enter valid Email Address <br>";
        $check=1;
    }
    if(empty($password))
    {
        $errmsg .= "Fill password";
        $check=1;
    }
    if($check == 1)
    {
        $url="http://local.pinup.com/login.php?error=$errmsg";
        header("Location:$url");
    }
}
require_once("connection.php");
session_start();
echo " <br> Checking For existing users from db is in process....";
$query="SELECT * FROM User WHERE name='$name' and password='".md5($password)."'";
$result=mysqli_query($con,$query) or die(mysqli_error());
$rows=mysqli_num_rows($result);
if($rows == 1)
{
    //$_SESSION['name'] = $name;
    header("Location: welcome.php");
}
else
{
   echo "combination of name & pass dont match.<p>Click here to <a href='login.php'>Login</a></div></p>";
}  

/* $a=urlencode($email);
    $b=urlencode($password); */
