<?php
require_once("DBController.php");
$db_handle = new DBController();
if(!empty($_POST['email'])) 
{ 
  $query = "SELECT email FROM User WHERE email='" . $_POST['email'] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count > 0){
    echo "<span class='status-not-available'> Email Not Available.</span>";}
  else{
    echo "<span class='status-available'> Email Available.</span>";}
}
?>