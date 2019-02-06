<?php
session_start(); 
/* $rand=substr(rand(),0,4); */
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script> 
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript"></script> 
<!--  <script>
    $(document).ready(function(){
    $(document).keypress(function(e) {
        $('span').hide();
    });
	$("#submit").click(function()
    {
		var check=0;
		var names=$("#name1").val();
        if(names =="")
        {
			$("#namespan").text("Please fill this field").show();
			check=1;
		}
		
		else if(!names.match('\^[a-zA-Z]*$'))
		{
			$("#namespan").text("Use only alphabets").show();
			check=1;
		}

		var lnames=$("#lname1").val();
		if(lnames == "")
		{
			$("#lnamespan").text("please fill this field").show();
			check=1;
		}

		else if(!lnames.match('\^[a-zA-Z]*$'))
		{
			$("#lnamespan").text("Use only alphabets").show();
			check=1;
		}

		var emails=$("#email1").val();
		if(emails == "")
		{
			$("#emailspan").text("please fill this field").show();
			check=1;
		}
		else if(!emails.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))
        {
            $("#emailspan").text("Enter valid email address ").show();
            check=1;
        }

		var address=$("#address1").val();
		if(address == "")
		{
			$("#addr1span").text("please fill this field").show();
			check=1;
		}
		
		var contact=$("#contact1").val();
		if(contact == "")
		{
			$("#contact1span").text("please fill this field").show();
			check=1;
		}
		else if(!contact.match('^[0-9]*$'))
		{
			$("#contact1span").text("Use only numbers").show();
			check=1;	
		}
		else if(contact.length !=10){
			$("#contact1span").text("only 10digits").show();
			check=1;	
		} 
		var pass=$("#password1").val();
		if(pass == "")
		{
			$("#passspan").text("please fill this field").show();
			check=1;
		}
		var cpass=$("#confrmpass1").val();
		if(cpass== "")
		{
			$("#cpaspan").text("please fill this field").show();
			check=1;
		}
		if(pass!=cpass)
		{
			$("#cpaspan").text("pass dnt match").show();
			check=1;
		}
		if(check==0)
		{ 
			return true;
        }
      return false;
	});
});   
</script>    -->
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
<script type="text/javascript">
function captch() {
    var x = document.getElementById("ran")
    x.value = Math.floor((Math.random() * 10000) + 1);
}
function validation()
{
	if(document.form1.chk.value=="")
	{
	document.getElementById("error").innerHTML="Enter Captcha!";
	document.form1.chk.focus();
	return false;
	}
	if(document.form1.ran.value!=document.form1.chk.value)
	{
	document.getElementById("error").innerHTML="Captcha Not Matched!";
	document.form1.chk.focus();
	return false;
	}
	return true;
}
</script>
<style type="text/css">
.captcha{
width:60px; 
background-image:url(cat.png); 
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
		  value="<?php if(isset($_GET['0']))echo $_GET['0'];?>"></br>
          <span id="namespan" class="error"></span>

          <label for="lastname"><b>Last Name</b></label>
          <br> <input id="lname1" type="text" placeholder="Enter LastName" name="Users[lastname]" 
		  value="<?php if(isset($_GET['1']))echo $_GET['1'];?>"></br>
          <span id="lnamespan" class="error"></span>

          <label for="email"><b>Email</b></label>
          <br> <input id="email1" type="text" onBlur="checkAvailability()" name="Users[email]" placeholder="enter email"
		  value="<?php echo isset($_GET['query']) ? $_GET['query'] : ''; ?> "></br>
          <span id="user-availability-status"></span><span id="emailspan" class="error"></span>

          <label for="address"><b>Address</b></label>
          <br><input id="address1" type="text" placeholder="Enter Address" name="UserDetail[address]" value="ijmima"></br>
	      <span id="addr1span" class="error"></span>

          <label for="contact"><b>Contact No</b></label>
          <br><input id="contact1" type="text" placeholder="Enter Phone Number" name="UserDetail[contact]" value="1234567890" ></br>
		  <span id="contact1span" class="error"></span>

          <label for="psw"><b>Password</b></label>
          <br><input id="password1" type="password" placeholder="Enter Password" name="Users[password]"></br>
          <span id="passspan" class="error"></span>

          <label for="pswd"><b>Confirm password</b></label>
          <br><input id="confrmpass1" type="password" placeholder="confirm password" name="Users[confirmpass]"></br>
		  <span id="cpaspan" class="error"></span>

		  <label for="cap"><b>Enter Captcha</b></label>
		  <br><input id="chk" type="text" name="chk"><span id="error" class="color"></span></br>

		  <input type="text" value="<?=$rand?>" id="ran" readonly="readonly" class="captcha">
		  <input type="button" value="Refresh" onclick="captch()" /></td>

          <br><button type="submit" value="submit" id="submit" name="submit" name="check" onclick="return validation();" class="signupbtn" style="align:justify">Register</button>
		  </bt><p><img src="LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>
		</form> 
		<?php 
		if(isset($_GET['error']))echo $_GET['error'];
		  //if($errmsg!= "")echo $errmsg; ?>
         