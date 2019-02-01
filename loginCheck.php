<?php
if(!isset($_SESSION)){ 
    session_start();}
if(isset($_POST['Users']['email'])) 
{ 
        $errmsg='';
        $check=0;
        $query=array(
            $email=$_POST['Users']['email'],
            $password=$_POST['Users']['password'],
        );  
        $_SESSION['query']=$query;
       /*  echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";
        exit;  */
        //$query=http_build_query($query);  
        //$_SESSION['query']=$query;

        //$email=$_POST['Users']['email'];
        //$password=$_POST['Users']['password'];
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
            //header("Location:http://local.pinup.com/login.php?error=".urlencode(serialize($query)));
            header("Location:http://local.pinup.com/login.php?error=$errmsg");
        }
        $_SESSION['email']=$_POST['Users']['email'];
}
require_once("connection.php");
echo " <br> Checking For existing users from db is in process....";
$query="SELECT * FROM User WHERE name='$name' and password='".SHA($password)."'";
$result=mysqli_query($con,$query) or die(mysqli_error());
$rows=mysqli_num_rows($result);
if($rows == 1){
    header("Location: welcome.php");
}
else{
   echo "combination of name & pass dont match.<p>Click here to <a href='login.php'>Login</a></div></p>";
}  