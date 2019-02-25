<?php
require_once("./connection/connection.php");
function InsertRow($tableName,$user){
    global $con;
    $fields = array_keys($user);
    $sql="INSERT INTO ".$tableName."(`".implode('`,`', $fields)."`) VALUES('".implode("','", $user)."')";
    mysqli_query($con,$sql);
    $lastId = mysqli_insert_id($con);
    return $lastId;
}
function callSession()
{
    $email=$_POST['email'];
    if(isset($_SESSION['email'])){
    header("location: welcome.php");}
}
?>