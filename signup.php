<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script> 
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript"></script> 
<script>
$(document).ready(function()
{	
	$("input").focus(function()
	{
    	$(this).next("span").empty();
	});
	$("#submit").click(function()
    {
		var check=1;
		var names=$("#name1").val();
        if(names =="")
        {
			$("#namespan").text("Please fill this field").show();
			check=0;
		}
		
		else if(!names.match('\^[a-zA-Z]*$'))
		{
			$("#namespan").text("Use only alphabets").show();
			check=0;
		}

		var lnames=$("#lname1").val();
		if(lnames == "")
		{
			$("#lnamespan").text("please fill this field").show();
			check=0;
		}

		else if(!lnames.match('\^[a-zA-Z]*$'))
		{
			$("#lnamespan").text("Use only alphabets").show();
			check=0;
		}

		var email=$("#email1").val();
		if(email == "")
		{
			$("#emailspan").text("please fill this field").show();
			check=0;
		}
		var address=$("#address1").val();
		if(address == "")
		{
			$("#addr1span").text("please fill this field").show();
			check=0;
		}
		
		var contact=$("#contact1").val();
		if(contact == "")
		{
			$("#contact1span").text("please fill this field").show();
			check=0;
		}
		else if(!contact.match('^[0-9]*$'))
		{
			$("#contact1span").text("Use only numbers").show();
			check=0;	
		}
		var pass=$("#password1").val();
		if(pass == "")
		{
			$("#passspan").text("please fill this field").show();
			check=0;
		}
		var cpass=$("#confrmpass1").val();
		if(cpass== "")
		{
			$("#cpaspan").text("please fill this field").show();
			check=0;
		}
		if(pass!=cpass)
		{
			$("#cpaspan").text("pass dnt match").show();
			check=0;
		}
		if(check==1)
		{ 
			alert("Successfully register..!!");
			//header("Location: welcome.php");
            window.location.href='signupSave.php';
        }
        return false;
	});
});
</script>
<style>
.error
{
  color:red;
}
</style> 
		<form name="button" action="signupSave.php" method="POST">
          <label for="name"><b>Name</b></label>
          <br><input id="name1" type="text" placeholder="Enter Name" name="Users[name]"  ></br>
          <span class='error'></span>
	      	<span id="namespan" class="error"></span>

          <label for="lastname"><b>Last Name</b></label>
          <br> <input id="lname1" type="text" placeholder="Enter LastName" name="Users[lastname]" value="salot" ></br>
          <span class='error'></span>
		      <span id="lnamespan" class="error"></span>

          <label for="email"><b>Email</b></label>
          <br> <input id="email1" type="text" placeholder="Enter Email" name="Users[email]" value="abc@gmail.com"></br>
          <span class='error'></span>
	      	<span id="emailspan" class="error"></span>

          <label for="address"><b>Address</b></label>
          <br><input id="address1" type="text" placeholder="Enter Address" name="UserDetail[address]" value="ijmima"></br>
          <span class='error'></span>
	      	<span id="addr1span" class="error"></span>

          <label for="contact"><b>Contact No</b></label>
          <br><input id="contact1" type="text" placeholder="Enter Phone Number" name="UserDetail[contact]" value="1234567890"></br>
          <span class='error'></span>
		      <span id="contact1span" class="error"></span>

          <label for="psw"><b>Password</b></label>
          <br><input id="password1" type="password" placeholder="Enter Password" name="Users[password]"></br>
           <span class='error'></span>
		        <span id="passspan" class="error"></span>

          <label for="pswd"><b>Confirm password</b></label>
          <br><input id="confrmpass1" type="password" placeholder="confirm password" name="Users[confirmpass]"></br>
          <span class='error'></span>
		  <span id="cpaspan" class="error"></span>

          <button type="submit" value="submit" id="submit" name="submit" class="signupbtn" style="align:justify">Register</button>
        </form> 
		  <?php  if($errmsg!= "")echo $errmsg;  ?> 
         