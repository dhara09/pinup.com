<?php
session_start(); 
$rand=substr(rand(),0,4);
//print_r($userArr);
//echo base64_decode(json_decode($errmsg));
//$array=$_REQUEST['userArr'];
//echo $_REQUEST['userArr'];
//echo $_REQUEST['userArr'];
/* if($_SERVER["REQUEST_METHOD"] == "POST") {
	if(count($_POST)>0) {
	print "<PRE>";
	print_r($_POST);
	print "</PRE>";
	}
} */
//cho $_REQUEST['query'];
//echo "base64_decode(json_encode('data')";
//$arr=base64_decode(json_decode($query1));
//print_r($_REQUEST);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script> 
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript"></script> 
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
    $(document).keypress(function(e) {
        $('span').hide();
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
		var emails=$("#email1").val();
		if(emails == "")
		{
			$("#emailspan").text("Please Enter Your Email Address").show();
			check=1;
		}
		else if(!emails.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))
        {
            $("#emailspan").text("Enter Valid Email Address ").show();
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
</script>   -->
<script type="text/javascript">
function captch() {
    var x = document.getElementById("ran")
    x.value = Math.floor((Math.random() * 10000) + 1);
}
</script>
<style type="text/css">
.captcha{
width:60px; 
background-image:url(../media/cat.png); 
font-size:20px; 
border: 1px solid;}
.color{color:#FF0000;}
.status-available{color:#2FC332;}
.status-not-available{color:#D60202;}
.error{color:red;}

</style>   
		<form name="button" action="signupSave.php" method="POST" name="form1">
          <label for="name"><b>Name</b></label>
          <br><input id="name1" type="text" placeholder="Enter Name" name="Users[name]"
		  value="<?php if(isset($_GET['query1']))echo $_GET['query1'];?>">
          <span id="namespan" class="error"></span></br>

          <label for="lastname"><b>Last Name</b></label>
          <br> <input id="lname1" type="text" placeholder="Enter LastName" name="Users[lastname]" 
		  value="<?php if(isset($_GET['ln']))echo $_GET['ln'];?>">
          <span id="lnamespan" class="error"></span></br>

          <label for="email"><b>Email</b></label>
          <br> <input id="email1" type="text" onBlur="checkAvailability()" name="Users[email]" placeholder="Enter email"
		  value="<?php if(isset($_GET['em']))echo $_GET['em'];?>">
          <span id="user-availability-status"></span><span id="emailspan" class="error"></span></br>

          <label for="address"><b>Address</b></label>
          <br><input id="address1" type="text" placeholder="Enter Address" name="UserDetail[address]"
		   value="Ijmima,Malad">
	      <span id="addr1span" class="error"></span></br>

          <label for="contact"><b>Contact No</b></label>
          <br><input id="contact1" type="text" placeholder="Enter Phone Number" name="UserDetail[contact]"
		  value="1234567890">
		  <span id="contact1span" class="error"></span></br>

          <label for="psw"><b>Password</b></label>
          <br><input id="password1" type="password" placeholder="Enter Password" name="Users[password]">
          <span id="passspan" class="error"></span></br>

          <label for="pswd"><b>Confirm password</b></label>
          <br><input id="confrmpass1" type="password" placeholder="Confirm Password" name="Users[confirmpass]">
		  <span id="cpaspan" class="error"></span></br>

		  <label for="cap"><b>Enter Captcha</b></label>
		  <br><input id="chk" type="text" name="code" name="chk" placeholder="Enter the Text you see" name="Users[captcha]"><span id="capspan" class="error"></span>
		  <span id="error" class="color"></span></br>

		  <input type="text" value="<?=$rand?>" id="ran" readonly="readonly" class="captcha">
		  <input type="button" value="Refresh" onclick="captch()" />
		
		  <input type="hidden" name="chk" value="<?=$rand?>">

          <br><button type="submit" value="submit" id="submit" name="submit" name="check" class="signupbtn" style="align:justify">Register</button>
		  <p><span id='display'></span></p>
		  <p><img src="../media/LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>
		</form> 
		<?php 
		if(isset($_GET['error']))echo $_GET['error'];
		  //if($errmsg!= "")echo $errmsg; ?>