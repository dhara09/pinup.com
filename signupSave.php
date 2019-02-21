<?php session_start();
$userArr=$_REQUEST['Users'];
echo $userArr;
$userDetailArr= $_REQUEST['UserDetail'];
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
            $errArr = base64_encode(json_encode($errmsgArr));
            $user=base64_encode(json_encode($userArr['name']));
            // echo $user;
            // exit;
            $userDataArr= base64_encode(json_encode($userDetailArr));
            
            //echo $userDataArr;
            //exit;
            header("Location:signup.php?userArr=$user");
            //header("Location:signup.php?error=$errArr&userDataArr=$userDataArr&userDataArr=$user");
            //exit;
            //return true;
        }   
}   
require_once("function.php");

$userArr=$_REQUEST['Users'];
$userDetailArr=$_REQUEST['UserDetail'];
$userArr['password'] = md5($userArr['password']);
$uId=InsertRow('User',$userArr);
if($uId > 0)
{
    $userDetailArr['userId'] = $uId;
    $udId = InsertRow('userDetail',$userDetailArr);
}
//header("Location:login.php?status=success"); 
?> 