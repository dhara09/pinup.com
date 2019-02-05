<?php
$data=array(
    $name =  $_POST['Users']['name'],
    $lname =$_POST['Users']['lastname'],
    $email = $_POST['Users']['email'],
    $address = $_POST['UserDetail']['address'],
    $contact = $_POST['UserDetail']['contact'],
    $pass =$_POST['Users']['password'],
    $cpass = $_POST['Users']['confirmpass'],
);
$query=http_build_query($data);
$errmsg='';
$check=1;
if(isset($_POST['Users']['name']) )
{
  
    if(empty($name))
    {   
		$errmsg .="Please fill the Name <br>";
        $check=0;
    } 

    else if(!preg_match("/^[a-zA-Z ]*$/",$name)) 
    {
        $errmsg .=" Use only Alphabets for name <br>";
        $check=0;
    }
    else if(strlen($name)<= 2)
    {
       $errmsg .="Enter valid Name <br>";
       $check=0;
    }

    if(empty($lname))
    {
        $errmsg .="Please fill Your Last Name <br>";
        $check=0;
    }
    else if(!preg_match("/^[a-zA-Z ]*$/",$lname)) 
    {
        $errmsg .= "Use only Alphabets for name <br>";
        $check=0;
    }
    else if(strlen($lname)<=2)
    {
        $errmsg .="Enter valid LastName <br>";
        $check=0;
    }

    if(empty($email))   
    {
        $errmsg .="Please fill your Email Address<br>";
        $check=0;
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $errmsg .=" Enter valid Email Address <br>";
        $check=0;
    }

    if(empty($address))
    {
        $errmsg .="Please fill Your Address <br>";
        $check=0;
    }

    if(empty($contact))
    {
        $errmsg .="Please fill the Your Contact <br>";
        $check=0;
    }

    else if(strlen($contact)>10)
    {
        $errmsg .= "Enter only 10 digits number <br>";
        $check=0;
    }

    if(empty($pass))
    {
        $errmsg .="Please fill your Password <br>";
        $check=0;
    }
    else if(strlen($pass)<=5)
    {
        $errmsg .="Enter mininmum 5-8 Characters <br>";
        $check=0;
    }        
    
    if(empty($cpass))
    {
        $errmsg .=" Please confirm your password <br>";
        $check=0;
    }

    else if(strlen($cpass)<=5)
    {
        $errmsg .= "Enter minimum 5-8 characters <br>";
        $check=0;
	}
	
	if($pass !== $cpass){
		$errmsg .="passwords dnt match";
        $check=0;
    }
    if($check == 0)
    {   
       // $url="http://local.pinup.com/signup.php?error=$errmsg";
        //$encode=rawurlencode($url);
        header("Location:http://local.pinup.com/signup.php?error=$errmsg");
       // $url="http://local.pinup.com/signup.php?encode=$encode";
        //$encode=rawurlencode($url);
       // header("Location:http://local.pinup.com/signup.php?.$encode");
    }
}
require_once("connection.php");
$sql = "INSERT INTO User (name,lastname,email,password,confirmpass)
VALUES (' ".$_POST['Users']['name']." ',' ".$_POST['Users']['lastname']." ',' ".$_POST['Users']['email']." ',' ".md5($_POST['Users']['password'])." ',' ".md5($_POST['Users']['confirmpass'])."')";
if(!mysqli_query($con,$sql))
{
    die("<br> Error: Record not inserted ".mysqli_error());
}
else
{
    //echo("<br> Record added successfully !!!!!</br>");
    echo "<center></h3>To continue<br>Get urself logged</br></h3><h2><a href='login.php'>Login</a></h2></center>";
}   
?> 