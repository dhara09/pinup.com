<?php
session_start(); 
require_once("function.php");
callSession();	

$rand=substr(rand(),0,4);
if(isset($_GET['error']))
$errArr = (array)json_decode(base64_decode($_GET['error']));

if(isset($_GET['userDataArr'])) 
$userDataArr = (array)json_decode(base64_decode($_GET['userDataArr']));  

if(isset($_GET['userDetailArr'])) 
$userDetailArr= (array)json_decode(base64_decode($_GET['userDetailArr']));
?>
<script src="../Lib files/ajax libs jquery 3.3.1 jquery.min.js"></script>
<script src="../Lib files/jquery-2.1.1.min.js"></script>
<script src="../Lib files/ajax libs jquery-validate 1.17.0 jquery.validate.js"></script>
<script src="../Lib files/ui 1.11.4 jquery-ui.js"></script>
<script>
	function checkAvailability() 
	{
		$("#loaderIcon").show();
		jQuery.ajax({
		url: "ajax.php",
		data:'email='+$("#email1").val(),
		type: "POST",
		success:function(data){
			$("#user-availability-status").html(data);
			$("#loaderIcon").hide();
		},
		error:function (){}
		});
	}
</script>
 <!-- <script>
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
		var pass=$("#password1").val();
		if(pass == "")
		{
			$("#passspan").text("Please Enter Your Password").show();
			check=1;
		}
		else if(pass.length < 4){
			$("#passspan").text("Enter Minimum 5-8 Characters").show();
			check=1;
		}
		var cpass=$("#confrmpass1").val();
		if(cpass== "")
		{
			$("#cpaspan").text("Please Enter Your ConfirmPassword").show();
			check=1;
		}
		else if(cpass.length < 4){
			$("#cpaspan").text("Enter Minimum 5-8 Characters").show();
			check=1;
		}
		if(pass!=cpass)
		{
			$("#cpaspan").text("Combination Of Password Don't Match !").show();
			check=1;
		}
		var cap=$("#chk").val();
		if(cap == ""){
			$("#capspan").text("Enter captcha").show();
			check=1;
		}
		if(check==0)
		{ 
			return true;
        }
      return false;
	});
});   
</script>  -->
<script>
function captch() {
    var x = document.getElementById("ran")
    x.value = Math.floor((Math.random() * 10000) + 1);
}
// function emailVerification(){
// 	alert("test");
// 	var email=document.getElementById("email1")
// 	alert(email);
// 	exit;
// 	var duplicate=mysqli_query($con,"Select email from user");
// 	if(mysqli_num_rows(duplicate)>0){
// 	alert("Email Already Exists");
// 	}
// }
</script>
<style>
.captcha{
width:60px; 
background-image:url(../media/cat.png); 
font-size:20px; 
border: 1px solid;}
.color{color:#FF0000;}
.status-available{color:#2FC332;}
.status-not-available{color:#D60202;}
.error{color:red;}
 #user-availability-status{ display:Inline!important;} 
</style>   
	<form name="button" id="input" action="signupSave.php" method="POST" name="form1">
	<center> <h2><b>Signup Form</b></h2></center>
		<span>
			<label for="name"><b>Name : </b></label>
			<br><input id="name1" type="text" placeholder="Enter Name" name="Users[name]"
			value="<?php echo $userDataArr['name'];?>">
			<span id="namespan" class="error"><?php echo $errArr['name'] ?></span></br>
		</span>

		<span>
			<label for="lastname"><b>Last Name : </b></label>
			<br> <input id="lname1" type="text" placeholder="Enter LastName" name="Users[lastname]"
			value="<?php echo $userDataArr['lastname'];?>">
			<span id= "lnamespan" class="error"><?php echo $errArr['lastname'] ?></span></br>
		</span>

		<span>
			<label for="email"><b>Email</b></label>
			<br><input id="email1" class="email" type="text" onBlur="checkAvailability()" name="Users[email]" placeholder="Enter email"
			value="<?php echo $userDataArr['email'];?>">
			<span id="user-availability-status"></span><span id="emailspan" class="error">
			<?php echo $errArr['email'] ?></span></br>
		</span>

		<span>
			<label for="address"><b>Address</b></label>
			<br><input id="address1" type="text" placeholder="Enter Address" name="UserDetail[address]"
			value="<?php echo $userDetailArr['address'];?>">
			<span id="addr1span" class="error"><?php echo $errArr['address'] ?></span></br>
		</span>

		<span>
			<label for="contact"><b>Contact No</b></label>
			<br><input id="contact1" type="text" placeholder="Enter Phone Number" name="UserDetail[contact]" 
			value="<?php echo $userDetailArr['contact'];?>">
			<span id="contact1span" class="error"><?php echo $errArr['contact'] ?></span></br>
		</span>

		<span>
			<label for="psw"><b>Password</b></label>
			<br><input id="password1" type="password" placeholder="Enter Password" name="Users[password]" 
			value="<?php echo $userDataArr['password'];?>">
			<span id="passspan" class="error"><?php echo $errArr['password'] ?></span></br>
		</span>

		<span>
			<label for="pswd"><b>Confirm password</b></label>
			<br><input id="confrmpass1" type="password" placeholder="Confirm Password" name="confirmpass"
			value="<?php echo $_GET['$confirmpass'];?>">
			<span id="cpaspan" class="error"><?php echo $errArr['confirmpass'] ?></span></br>
		</span>

		<span>
			<label for="cap"><b>Enter Captcha</b></label>
			<br><input id="chk" type="text" name="code" name="chk" placeholder="Enter the Text you see" name="Users[captcha]"><span id="capspan" class="error"></span>
			<span id="error" class="color"></span></br>
		</span>
		
		<span>
		  <input type="text" value="<?=$rand?>" id="ran" readonly="readonly" class="captcha">
		  <input type="button" value="Refresh" onclick="captch()" />
		</span>
		
		 <!--  <input type="hidden" name="chk" value="<?=$rand?>"> -->

          <br><button onsubmit="emailverification();" type="submit" value="submit"  id="submit" name="submit" name="check" class="signupbtn" style="align:justify">Register</button>
		  <p><img src="../media/LoaderIcon.gif" id="loaderIcon" style="display:none"/></p>
	
	</form> 