<?php session_start();
$userArr= $_REQUEST['Users'];
$userDetailArr= $_REQUEST['UserDetail'];
$errmsg='';
$check=1;
if(isset($_POST['Users']['name']))
 //if($_SERVER["REQUEST_METHOD"] == "POST")
{  
   if(empty($userArr['name'])){ 
        $errmsg .="Please Fill Your Name <br>";
        $check=0;
    }
     else if(!preg_match("/^[a-zA-Z ]*$/",$userArr['name'])) {
        $errmsg .=" Use only Alphabets for Name <br>";
        $check=0;
    }
    else if(strlen($userArr['name']) <= 2){
        $errmsg .="Enter valid Name <br>";
        $check=0;
    }
   if(empty($userArr['lastname'])){
        $errmsg .="Please Fill Your Last Name <br>";
        $check=0;
    }
    else if(!preg_match("/^[a-zA-Z ]*$/",$userArr['lastname'])) {
        $errmsg .= "Use Only Alphabets for Name <br>";
        $check=0;
    }
    else if(strlen($userArr['lastname'])<=2){
        $errmsg .="Enter Valid LastName <br>";
        $check=0;
    } 
    
    if(empty($userArr['email'])){
        $errmsg .="Please Fill your Email Address<br>";
        $check=0;
    }
    else if(!filter_var($userArr['email'], FILTER_VALIDATE_EMAIL)){
        $errmsg .=" Enter Valid Email Address <br>";
        $check=0;
    }
    /* if(empty($userDetailArr['address'])) {
        $errmsg .="Please Fill Your Address <br>";
        $check=0;
    }  */
    
   /*  if(empty($userDetailArr['contact'])){
        $errmsg .="Please Fill the Your Contact <br>";
        $check=0;
    }
    
    else if(strlen($userDetailArr['contact']) < 10){
        $errmsg .= "Enter 10 Digits Number <br>";
        $check=0;
    } */
    
   /*  if(empty($userDetailArr['password'])){
        $errmsg .="Please Fill Your Password <br>";
        $check=0;
    }
    else if(strlen($userDetailArr['password']) <=5){
        $errmsg .="Enter Mininmum 5-8 Characters For Password <br>";
        $check=0;
    }    */     
    
   /*  if(empty($userDetailArr['confirmpass'])){
        $errmsg .=" Please Confirm Your password <br>";
        $check=0;
    }
    
    else if(strlen($cpass)<=5){
        $errmsg .= "Enter Minimum 5-8 Characters For Confirm Password<br>";
        $check=0;
	} */ 
    
    if($check == 0)
    { 
        $url=base64_encode($errmsg);
        $url1=base64_encode($userArr);
        $url2=base64_encode($userDetail);
        header("Location:signup.php?error=$url&user=$url1&userD=$url2");
        exit;
    }
	/* if($pass !== $cpass){
		$errmsg .="And So Your Passwords Don't Match !!";
        $check=0;
    } 
    if($check == 0){ 
        $url=base64_encode($errmsg);
        $url1=base64_encode($userArr);
        $url2=base64_encode($userDetail);
        header("Location:signup.php?error=$url&user=$url1&userD=$url2");
        exit;
    }  */
//}
        /* $url7=base64_encode($cpass);
        header("location:signup.php?error=$url&na=$url1&ln=$url2&em=$url3&ad=$url4&cn=$url5&ps=$url6&"); */
}
require_once("./connection/connection.php");
$date = date('Y-m-d');
$email=$_POST['Users']['email'];
$duplicate=mysqli_query($con,"select email from User where email='$email'");
if (mysqli_num_rows($duplicate)>0)
{
   $errmsg .= "Email You Entered Exists already..";
   $url=base64_encode($errmsg);
   header("Location:signup.php?error=$url"); 
}
else{
    require_once("function.php");
}
//header("Location:login.php?status=success");
/* --------------------------------------------------------------------------------------- */
        /* $query ="INSERT INTO User(name,lastname,email,password,createdDate,createdTime) VALUES ('".$_POST['Users']['name']."','".$_POST['Users']['lastname']."','".$_POST['Users']['email']."','".md5($_POST['Users']['password'])."','".$date."','".time('H:M:S')."');";
        $query .="INSERT INTO userDetail(address,contact,createdDate,createdTime) VALUES('".$_POST['UserDetail']['address']."','".$_POST['UserDetail']['contact']."','".$date."','".time('H:M:S')."');";
        if (!mysqli_multi_query($con,$query)){
            die("<br> Error: Record not inserted ".mysqli_error()); }
        else {  header("Location:login.php?status=success"); }
    }          */
?> 