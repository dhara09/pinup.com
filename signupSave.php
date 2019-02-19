<?php session_start();
$userArr= $_REQUEST['Users'];
$userDetailArr= $_REQUEST['UserDetail'];
/* $userArray=array(
    $userArr= $_REQUEST['Users'],
    $userDetailArr= $_REQUEST['UserDetail'],
); */
$errmsgArr=array();
$check=1;

if($_SERVER["REQUEST_METHOD"] == "POST")  
{  
    /* Name */
    if(empty($userArr['name'])){ 
        $errmsgArr['name'] = "Please Fill Your Name";
        $check=0;
    }
    else if(!preg_match("/^[a-zA-Z ]*$/",$userArr['name'])) {
        $errmsgArr['name'] = "Use only Alphabets for Name ";
        $check=0;
    }
    else if(strlen($userArr['name']) <= 2){
        $errmsgArr['name'] = "Enter valid Name ";
        $check=0;
    }
     
    /* Last Name */
    if(empty($userArr['lastname'])){
        $errmsgArr['lastname'] = "Please Fill Your Last Name ";
        $check=0;
    }
    else if(!preg_match("/^[a-zA-Z ]*$/",$userArr['lastname'])) {
        $errmsgArr['lastname'] = "Use Only Alphabets for Name ";
        $check=0;
    }
    else if(strlen($userArr['lastname'])<=2){
        $errmsgArr['lastname'] = "Enter Valid LastName ";
        $check=0;
    }  

    /* Email */
    if(empty($userArr['email'])) {
        $errmsgArr['email'] ="Please Fill your Email Address";
        $check=0;
    } 
        else if(!filter_var($userArr['email'], FILTER_VALIDATE_EMAIL)){
        $errmsgArr['email'] =" Enter Valid Email Address ";
        $check=0;
    }  
        
    /* Address */
    if(empty($userDetailArr['address'])) {
        $errmsgArr['address'] ="Please Fill Your Address ";
        $check=0;
    }  
    
    /* Contact */
    if(empty($userDetailArr['contact'])){
        $errmsgArr['contact'] ="Please Fill the Your Contact ";
        $check=0;
    }
    else if(strlen($userDetailArr['contact']) < 10){
        $errmsgArr['contact'] = "Enter 10 Digits Number ";
        $check=0;
    } 
        
    /* Password */
    if(empty($userArr['password'])){
        $errmsgArr['password'] ="Please Fill Your Password ";
        $check=0;
    }
    else if(strlen($userArr['password']) <=5){
        $errmsgArr['password'] ="Enter Mininmum 5-8 Characters For Password ";
        $check=0;
    }        
    
    /* Confirm Password */
    if(empty($_POST['confirmpass'])){
        $errmsgArr['confirmpass'] =" Please Confirm Your password ";
        $check=0;
    }

    else if(strlen($_POST['confirmpass'])<=5){
        $errmsgArr['confirmpass'] = "Enter Minimum 5-8 Characters For Confirm Password";
        $check=0;
    } 

    if($userArr['password'] !== $_POST['confirmpass']){
        $errmsgArr['confirmpass'] ="And So Your Passwords Don't Match !!";
        $check=0;
    } 
    /* Condition */
        if($check == 0){ 
            $userDataArr=base64_encode($userArr);
            $errArr = base64_encode(json_encode($errmsgArr));
            //$userDataArr = base64_encode($_REQUEST);
            //print_r($userDataArr);
            header("Location:signup.php?error=$errArr&userDataArr=$userDataArr"); 
            return true;
        }  
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
    /* $formData=array(
        $userArr=$_REQUEST['Users'],
        $userDetailArr=$_REQUEST['UserDetail'],
    ); */
    require_once("function.php");
    $query=InsertRow('User',$userArr);
    $query1=InsertRow('userDetail', $userDetailArr);
}
//header("Location:login.php?status=success");
/* --------------------------------------------------------------------------------------- */
        /* if (!mysqli_multi_query($con,$query)){
            die("<br> Error: Record not inserted ".mysqli_error()); }
         else {  header("Location:login.php?status=success"); }        */  
?> 