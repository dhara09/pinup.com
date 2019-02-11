<?php session_start();
echo "<pre>"; print_r($_REQUEST); echo "</pre>";
$data=array(
    $name =  $_POST['Users']['name'],
    $lname = $_POST['Users']['lastname'],
    $email = $_POST['Users']['email'],
    $address = $_POST['UserDetail']['address'],
    $contact = $_POST['UserDetail']['contact'],
    $pass = $_POST['Users']['password'],
    $cpass = $_POST['Users']['confirmpass'],
    $cap=$_POST['Users']['cap']
);
//echo $query = http_build_query(array('url' => $data));
//echo $query1=base64_encode(json_encode(http_build_query(array('login' => $data))));
echo $query1=base64_encode(json_encode(http_build_query($data)));
exit;
//header("location:signup.php?data=".base64_encode(json_encode('$_REQUEST')));
$errmsg='';
$check=1;
if(isset($_POST['Users']['name']) )
{ 
  
    if(empty($name)){   
		$errmsg .="Please Fill Your Name <br>";
        $check=0;
    } 

    else if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $errmsg .=" Use only Alphabets for Name <br>";
        $check=0;
    }
    else if(strlen($name)<= 2){
       $errmsg .="Enter valid Name <br>";
       $check=0;
    }

    if(empty($lname)){
        $errmsg .="Please Fill Your Last Name <br>";
        $check=0;
    }
    else if(!preg_match("/^[a-zA-Z ]*$/",$lname)) {
        $errmsg .= "Use Only Alphabets for Name <br>";
        $check=0;
    }
    else if(strlen($lname)<=2){
        $errmsg .="Enter Valid LastName <br>";
        $check=0;
    }

    if(empty($email)){
        $errmsg .="Please Fill your Email Address<br>";
        $check=0;
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errmsg .=" Enter Valid Email Address <br>";
        $check=0;
    }

    if(empty($address)){
        $errmsg .="Please Fill Your Address <br>";
        $check=0;
    }

    if(empty($contact)){
        $errmsg .="Please Fill the Your Contact <br>";
        $check=0;
    }

    else if(strlen($contact)>10){
        $errmsg .= "Enter 10 Digits Number <br>";
        $check=0;
    }

    if(empty($pass)){
        $errmsg .="Please Fill Your Password <br>";
        $check=0;
    }
    else if(strlen($pass)<=5){
        $errmsg .="Enter Mininmum 5-8 Characters <br>";
        $check=0;
    }        
    
    if(empty($cpass)){
        $errmsg .=" Please Confirm Your password <br>";
        $check=0;
    }

    else if(strlen($cpass)<=5){
        $errmsg .= "Enter Minimum 5-8 Characters <br>";
        $check=0;
	}
	
	if($pass !== $cpass){
		$errmsg .="Your Passwords Don't Match !!";
        $check=0;
    }
    if(empty($cap)){
        $errmsg .= "Enter the text you see!!";
        $check=0;
    }
    if($check == 0){  
        header("Location:signup.php?error=$errmsg");
        exit;
    }
}
require_once("./connection/connection.php");
$date = date('Y-m-d');
$email=$_POST['Users']['email'];
$duplicate=mysqli_query($con,"select email from User where email='$email'");
if (mysqli_num_rows($duplicate)>0){
    $errmsg .= "Email You Entered Exists already..";
    header("Location:signup.php?error=$errmsg"); }
else{
        $query ="INSERT INTO User(name,lastname,email,password,createdDate,createdTime) VALUES ('".$_POST['Users']['name']."','".$_POST['Users']['lastname']."','".$_POST['Users']['email']."','".md5($_POST['Users']['password'])."','".$date."','".time('H:M:S')."');";
        $query .="INSERT INTO userDetail(address,contact,createdDate,createdTime) VALUES('".$_POST['UserDetail']['address']."','".$_POST['UserDetail']['contact']."','".$date."','".time('h:m:s')."');";
        if (!mysqli_multi_query($con,$query)){
            die("<br> Error: Record not inserted ".mysqli_error()); }
        else {  header("Location:login.php?status=success"); }
    }      
?> 