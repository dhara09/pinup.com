<?php
if(isset($_POST['button'])) 
{
    $test="hello";
    $name=$_POST['Users']['name'];
    $password=$_POST['Users']['password'];
    $errmsg='';
    $check=0;

    if(empty($name))
    {
       $errmsg .= "Fill name </br>";
       $check=1;
    }
    if(empty($password))
    {
        $errmsg .= "Fill password";
        $check=1;
    }
    if($check!=0)
    {

        header("Location:http://local.pinup.com/login.php?error=$errmsg&user=$name");
    }
    else
    {
        header("location:loginCheck.php");
    }
}
require_once("connection.php");
echo " <br> Checking For existing users from db is in process....";





// if($_SERVER('REQUEST_METHOD')=='POST')
/* 
     session_start();
    require_once("connection.php");
    $name=$_POST['Users']['name'];
    $password=$_POST['Users']['password'];
    $query="SELECT * FROM User WHERE name='$name' and password='".md5($password)."'";
	$result=mysqli_query($con,$query) or die(mysqli_error());
    $rows=mysqli_num_rows($result);
    if($rows == 1)
    {
        $_SESSION['name'] = $name;
        header("Location: welcome.php");
    }
    //else if($rows!=1)
    else
    {
       echo "combination of name & pass dont match.<p>Click here to <a href='login.php'>Login</a></div></p>";
       $errmsg .="combination dnt match";
    }   */
