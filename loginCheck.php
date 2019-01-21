<?php
//include('login.php');
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
        //echo "done";
        $errmsg .="logged in successfully";
        include("welcome.php");
        //echo "<script>alert('logged in'); window.location = 'welcome.php'</script>";
    }
    header("Location:http://local.pinup.com/login.php?error=$errmsg");
}


















/* ------------------------------------------- */
include('connection.php');

function Insertdata($table,$field_values,$data_values)
    {
        $field_values= implode(',',$field);
        $data_values=implode(',',$data);

        $sql="INSERT into". " ".$table." ".$field_values. "VALUES(".$data_values.")";
        $result=$conn->query($sql);
    }
    $query = Insertdata('User',$_POST['Users']);

    //$query = sqlInsert('student',$_POST['student']);
    $query1=Insertdata('userDetail',$_POST['UserDetails']); 
    mysqli_close($conn);
/* session_start();
require_once('connection.php');
//echo"logged in";
exit; */

/* ------------------------------------------- */
//header("location:welcome.php");
/* $name=$_POST['Users']['name'];
$pass=$_POST['Users']['password'];
$encrypt=md5($pass);

$query = mysqli_query("SELECT * FROM User WHERE name=$name AND password=$encrypt", $con);
$result=mysqli_query($query);
$count=mysqli_num_rows($result);

if($count==1){
    echo "welcome";
    session_start();
    $_SESSION['name'] =$name;
    $_SESSION['password'] =$pass;
    header("Locaton:welcome.php");
}
else{
    echo "try again";
    //header("Location:welcome.php");
} */
  /* if (!mysqli_num_rows($query) == 0)
  {
    echo "welcome ";
    session_start();
    $_SESSION['name'] =$name;
    $_SESSION['password'] =$encrypt;
    header("Location:welcome.php");
  } */
 
/* -------------------- */
 /*  $email = $_POST['Users']['email'];
  $password = $_POST['Users']['password'];

  $cekuser = mysqli_query("SELECT * FROM User WHERE email = '$email' AND password ='$password' ");
  $row = mysqli_num_rows($cekuser);
  $c= mysqli_fetch_array($cekuser); 
  if($row == 0) 
  {
      echo "<script>alert('enter email and pass!'); window.location = 'login.php'</script>";
  } 
  else 
  {
      if($pass > $c['Users']['password']) 
      {
        echo "<script>alert('Wrong password!'); window.location = 'login.php'</script>";
      } 
      else 
      {
        $_SESSION['email'] = $c['Users']['email'];
        header('location:login.php');
      }
  } */
/* -------------- */
/* $name=$_POST['Users']['name'];
$pass=$_POST['Users']['password'];
$encrypt=md5($pass);

$query = mysqli_query("SELECT name,password FROM User WHERE name=$name AND password=$encrypt", $con);
$result=mysqli_query($query);
$count=mysqli_num_rows($result);

if($count==1){
    session_start();
    $_SESSION['name'] =$name;
    $_SESSION['password'] =$encrypt;
    header("Locaton:welcome.php");
}
else{
    echo "try again";
    //header("Location:login.php");
}   */
?>

<!-- $name=$_POST['Users']['name'];
    $pass=$_POST['Users']['password'];
    $encrypt=md5($pass);
    $query = mysqli_query("SELECT name,password FROM User WHERE name=$name AND password=$encrypt", $con);
    $result=mysqli_query($query);

    $count=mysqli_num_rows($result);
    if($count==1)
    //if (mysqli_num_rows($query) == 1)
    {
        $_SESSION['name']=$_POST['Users']['name'];
        $_SESSION['password']=$_POST['Users']['password'];

header("location:welcome.php");
}
else {
    echo "try again";
//header("location:login.php");
 -->}