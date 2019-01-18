<?php
//echo "test";
//include('welcome.php'); 
if(isset($_POST['button']))
{
    $name=$_POST['Users']['name'];
    $pass=$_POST['Users']['password'];
    $errmsg='';
    $check=0;

    if(empty($name))
    {
       $errmsg .= "Fill Name";
       $check=1;
    }
    if(empty($pass))
    {
        $errmsg .= "Fill password";
        $check=1;
    }
    if ($check==0)
    {
        $errmsg .="logged in successfully";
    }
}
include('connection.php');
$email=$_POST['Users']['email'];
$pass=$_POST['Users']['password'];
 $query = mysqli_query("SELECT email ,password FROM User WHERE email=$email AND password=$pass", $con);

  if (mysqli_num_rows($query) == 0)
  {
      //echo "welcome ";
      header("Location:welcome.php");
    
  }
 else
  {
    echo "Try again";
    header("Location:login.php");
  }  

?>