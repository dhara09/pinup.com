<?php
require_once("./connection/DBController.php");
$db_handle = new DBController();
$email=$_POST['email'];
if(!empty($_POST['email'])) 
{ 
  $query = "SELECT * FROM User WHERE email='".$_POST['email']."'";
  $user_count = $db_handle->numRows($query);
  if($user_count > 0)
  {
    echo "<span class='status-not-available'>Email Not Available</span>";
    
    /* $duplicate=mysqli_query($con,"Select email from User where email='$email'");
    if (mysqli_num_rows($duplicate) >0){
       echo "<span class='status-not-available'> Email You Entered Exists already.'";
       return false;
    }  */
  }
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "<span class='status-not-available'>Enter Valid Email </span>";
  }
  else{
    echo "<span class='status-available'>Email Available </span>";
  }
}
?>