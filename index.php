<?php session_start (); 
require_once("function.php");
callSession();
?>
<html>
<center>
<button onclick="window.location.href='login.php'" type="submit" value="submit" name="submit">Login</button>
<button onclick="window.location.href='signup.php'" type="submit" value="submit" name="submit">Signup</button>
</center>
<?php require_once('footer.php'); ?>