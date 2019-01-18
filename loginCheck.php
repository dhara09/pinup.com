<?php
//php validations and inserting data

if(isset($_POST['submit']))
{
    $name=$_POST['Users']['name'];
    $pass=$_POST['Users']['password'];
    
    if(empty($name)){
       $errmsg .= "Fill Name";
       $check=1;
    }
    if(empty($pass)){
        $errmsg .= "Fill password";
        $check=1;
    }
    if ($check==0){
       $errmsg .="logged in successfully";
    }
    //echo "$errmsg";
    //header("Location:http://local.pinup.com/login.php?error=$errmsg");
}
?>