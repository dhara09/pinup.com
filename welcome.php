<?php 
include("auth.php");
session_start();
if(!isset($_SESSION['email'])){
header("location: welcome.php");}
$email=$_SESSION['email'];
?>
<!DOCTYPE html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="../Lib files/ajax libs jquery 3.3.1 jquery.min.js"></script>
<script src="../Lib files/jquery-2.1.1.min.js"></script>
<script src="../Lib files/ajax libs jquery-validate 1.17.0 jquery.validate.js"></script>
<script src="../Lib files/ui 1.11.4 jquery-ui.js"></script>
<script>
    $(document).ready(function(){
		$('input').keyup(function(){
			$(this).siblings('span').hide();
		});
		$("#submit").click(function()
		{
		var check=0;
		var names=$("#name1").val();
        if(names ==""){
			$("#namespan").text("Please Fill Your Name").show();
			check=1;
		}
		if(!names.match('\^[a-zA-Z]*$')){
			$("#namespan").text("Use Only Alphabets").show();
			check=1;
		}
		var lnames=$("#lname1").val();
		if(lnames == "")
		{
			$("#lnamespan").text("Please Fill Your LastName").show();
			check=1;
		}
		if(!lnames.match('\^[a-zA-Z]*$'))
		{
			$("#lnamespan").text("Use Only Alphabets").show();
			check=1;
		}
		var email=$("#email1").val();
		if(email == "")
		{
			$("#emailspan").text("Please Enter Your Email Address").show();
			check=1;
		}
		var address=$("#address1").val();
		if(address == "")
		{
			$("#addr1span").text("Please Fill Your Address").show();
			check=1;
		}
		
		var contact=$("#contact1").val();
		if(contact == "")
		{
			$("#contact1span").text("Please Enter Your Contact Detail").show();
			check=1;
		}
		else if(!contact.match('^[0-9]*$'))
		{
			$("#contact1span").text("Use Only Numbers").show();
			check=1;	
		}
		else if(contact.length !=10){
			$("#contact1span").text("Enter 10 Digits Number").show();
			check=1;	
		} 
		if(check==0)
		{ 
			return true;
        }
      return false;
	});
});   
</script>
<style>
.error{color:red;}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td { padding: 15px; }
.btn{ margin-bottom:44px; }
</style>
</head>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" />
    <body>
    <h4> <center>Welcome <?php echo $email;?></center></h4>
    <a href="logout.php"> Logout</a>
    <center>

    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add</button>
    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Your Data</h4>
      </div>
      <div class="modal-body">
    <tr>
        <td><label for="name"><b>Name : </b></label>
        <input id="name1" type="text" placeholder="Enter Name" name="Users[name]">
        <span id="namespan" class="error"><?php echo $errArr['name'] ?></span><br>
        <td>
    </tr>
    <tr>
        <td><label for="lastname"><b>Lastname : </b></label>
        <input id="lname1" type="text" placeholder="Enter Lastname" name="Users[Lastname]">
        <span id= "lnamespan" class="error"><?php echo $errArr['lastname'] ?></span><br>
        </td>
    </tr>  
    <tr>
        <td><label for="email"><b>Email : </b></label>
        <input id="email1" type="text" placeholder="Enter Email" name="Users[email]">
        <span id="user-availability-status"></span><span id="emailspan" class="error">
		<?php echo $errArr['email'] ?></span><br>
        </td>
    </tr>
    <tr>
        <td><label for="Address"><b>Address : </b></label>
        <input id="address1" type="text" placeholder="Enter Address" name="Users[Address]">
        <span id="addr1span" class="error"><?php echo $errArr['address'] ?></span><br>
        </td>
    </tr>
    <tr>
        <td><label for="Contact"><b>Contact : </b></label>
        <input id="Contact1" type="text" placeholder="Enter Contact" name="Users[Contact]">
        <span id="contact1span" class="error"><?php echo $errArr['contact'] ?></span><br>
        </td>
    </tr>
    <center><button type="submit">Submit</button></center>
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" class="btn" data-dismiss="modal">Close</button>
        </div>
    </div>

  </div>
</div>
<div>
<table style="width:30%">
<tr>
    <th>Id</th>
    <th>Name</th>
    <th>Email</th> 
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
</div>
</body>
</head>
</html>
