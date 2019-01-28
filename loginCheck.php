<?php
if(isset($_POST['button'])) 
{    
    /* echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    exit; */
    $name=$_POST['Users']['name'];
    $password=$_POST['Users']['password'];
    $errmsg='';
    $check=0;

    if(empty($name))
    {
       $errmsg .= "Fill empty field";
       $check=1;
    }
    else if(empty($password))
    {
        $errmsg .= "Fill empty field";
        $check=1;
    }
   
 header("Location:http://local.pinup.com/login.php?error=$errmsg");
// }
}
session_start();
require_once("connection.php");
$name=$_POST['Users']['name'];
$password=$_POST['Users']['password'];
$query = "SELECT * FROM `User` WHERE name='$name' and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysqli_error());
    $rows = mysqli_num_rows($result);

    if($rows==1)
    {
       
        $_SESSION['name'] = $name;
	    header("Location: welcome.php");
    }
    else
    {
       echo "combination of name&pass dont match.<p>Click here to <a href='login.php'>Login</a></div></p>";
    //$errmsg .="name &pass dnt match";
    } 

?>
<?php
/* ----------------------------------------------------------------------------- */
/* session_start();
$con = mysqli_connect("localhost","root","123456","userDatabase");
$message="";
if(!empty($_POST["login"])) {
	$result = mysqli_query($con,"SELECT * FROM User WHERE name='" . $_POST['Users']['name'] . "' and password = '". $_POST['Users']['password']."'");
	$row  = mysqli_fetch_array($result);
	if(is_array($row)) {
	$_SESSION["user_id"] = $row['user_id'];
	} else {
	$message = "Invalid name or Password!";
	}
} */

/* ------------------------------------------------------------------------------------- */
/*  if(isset($_POST['button']))
{
    include_once("connection.php");
    echo "error";
    $name=$_POST['Users']['name'];
    $pass=$_POST['Users']['password'];
    $errmsg='';
    $check=0;

    if(empty($name))
    {
       $errmsg .= "Fill empty field";
       $check=1;
    }
    else if(empty($pass))
    {
        $errmsg .= "Fill empty field";
        $check=1;
    } 
    if($check==0){
    $sqlname = "SELECT * FROM User WHERE name='$name'";
    $sqlpass = "SELECT * FROM User WHERE password='$pass'";
    $res_n = mysqli_query($dbname, $sqlname);
    $res_p = mysqli_query($dbname, $sqlpass);
    if (mysqli_num_rows($res_n) > 0) 
    {
        echo "login";
        header("Location:welcome.php");	
    }
    else
    {
        echo "Wrong combination of name and password";
        //header("login.php");
    }
    }   
    header("Location:http://local.pinup.com/login.php?error=$errmsg");
}   */

/* ------------------------------------------------------------------------------------------ */
    /* $name=$_POST['Users']['name'];
    $pass=$_POST['Users']['password'];
   /*  $encrypt=md5($pass);
    $query = mysqli_query("SELECT name,password FROM User WHERE name=$name AND password=$encrypt", $con);
    $result=mysqli_query($query);

    $count=mysqli_num_rows($result);
    if($count==1)
    {
        $_SESSION['name']=$_POST['Users']['name'];
        $_SESSION['password']=$_POST['Users']['password'];
        header("location:welcome.php");
    }
    else 
    {
        echo "try again";
        //header("location:login.php");
    }   */
?>