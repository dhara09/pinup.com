<?php
session_start();
require('loginCheck.php');
//echo"welcome user";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h4> Welcome <?php echo $_SESSION['name'];?></h4>
    <a href="logout.php"> Logout</a>
</body>
</html>