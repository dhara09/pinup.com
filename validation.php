<?php
if(isset($_POST['submit']) )
{
$name=$_POST['Users']['name'];
$lname=$_POST['Users']['lastname'];
$email=$_POST['Users']['email'];
$address=$_POST['UserDetail']['address'];
$contact=$_POST['UserDetail']['contact'];
$pass=$_POST['Users']['password'];
$cpass=$_POST['Users']['confirmpass']; 
 
    if(empty($name))
    {   
		$errmsg .="Please fill the Name <br>";
        $check=1;
    }  
     if(!preg_match("/^[a-zA-Z ]*$/",$name)) 
    {
		//echo "number error";
        $errmsg .=" Use only Alphabets for name <br>";
        $check=1;
    }
    else if(strlen($name)<= 2)
    {
       $errmsg .="Enter valid Name <br>";
       $check=1;
    }
    if(empty($lname))
    {
        $errmsg .="Please fill Your Last Name <br>";
        $check=1;
    }
    else if(!preg_match("/^[a-zA-Z ]*$/",$lname)) 
    {
        $errmsg .= "Use only Alphabets for name <br>";
        $check=1;
    }
    else if(strlen($lname)<=2)
    {
        $errmsg .="Enter valid LastName <br>";
        $check=1;
    }
    if(empty($email))   
    {
        $errmsg .="Please fill your Email Address<br>";
        $check=1;
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $errmsg .=" Enter valid Email Address <br>";
        $check=1;
    }

    if(empty($address))
    {
        $errmsg .="Please fill Your Address <br>";
        $check=1;
    }

    if(empty($contact))
    {
        $errmsg .="Please fill the Your Contact <br>";
        $check=1;
    }

    else if(strlen($contact)>10)
    {
        $errmsg .= "Enter only 10 digits number <br>";
        $check=1;
    }

    if(empty($pass))
    {
        $errmsg .="Please fill your Password <br>";
        $check=1;
    }
    else if(strlen($pass)<=5)
    {
        $errmsg .="Enter mininmum 5-8 Characters <br>";
        $check=1;
    }        
    
    if(empty($cpass))
    {
        $errmsg .=" Please confirm your password <br>";
        $check=1;

    }

    else if(strlen($cpass)<=5)
    {
        $errmsg .= "Enter minimum 5-8 characters <br>";
        $check=1;
    }
    if($check==0)
    {
        $errmsg .= "Form Successfully Logged In";
        include('save.php');
	}
	//echo $errmsg;
	//header("Location:http://local.pinup.com/signup.php?error=$errmsg");
}
?>
