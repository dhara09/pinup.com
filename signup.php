<!--  <script>
$(document).ready(function()
{ 
	$("input,textarea").focus(function()
	{
    	$(this).next("span").empty();
	});

		$("submit").submit(function()
    {
				var names=$("#name1").val();
				var check=1;
				if ($ ("#name1").val() === "")
				{
					$("#namespan").text("Please fill the field").show();
					check=0;
				}
				else if(!names.match('\^[a-zA-Z]*$'))
				{
					 $("#namespan").text("Enter only alphabets");
					 check=0;
				}

				var lnames=$("#lname1").val();
				if ($ ("#lname1").val() === "")
				{
					$("#lnamespan").text("Please fill this field").show();
					check=0;
				}
				else if(!lnames.match('\^[a-zA-Z]*$'))
				{
					$("#lnamespan").text("Enter only alphabets");
					check=0;
				}
				var emails=$("#email1").val();
				if ($ ("#email1").val() === "")
				{
					$("#emailspan").text("Please fill this field").show();
					check=0;
				} 
				else if (!emails.match('/^([w-.]+@([w-]+.)+[w-]{2,4})?$/'))
				{
					$("#emailspan").text("Enter valid email address");
					check=0;
				} 
				var contacts =$("#contact1").val();
				if ($ ("#contact1").val() === "")
				{
					$("#contactspan").text("Please fill this field").show();
					check=0;
				}
				else if(!contacts.match('^[0-9]*$') )
				{
					$("#contactspan").text("Enter only Numbers");
					check=0;
				}
				else if(contacts.length() > 10)
				{
					$("#contactspan").text("Enter only 10 digits Number");
					check=0;
				}
				var addr1=$("#address1").val();
				if ($ ("#address1").val() === "")
				{
					$("#addr1span").text("Please fill this field").show();
					check=0;
				}
        
        var pass=$("#password1").val();
				if ($ ("#password1").val() === "")
				{
					$("#passspan").text("Please fill this field").show();
					check=0;
				}
        
        var cpass=$("#confrmpass1").val();
				if ($ ("#confrmpass1").val() === "")
				{
					$("#cpaspan").text("Please fill this field").show();
					check=0;
				}
				return false;
				if(check==1)
				{ alert("form submitted"); }
		});
});
</script>

<style>
.error
{
  color:red;
}
</style> --> 
<?php
include('validation.php');
?>
        <form name="form"  action="" method="POST">
          <label for="name"><b>Name</b></label>
          <br><input id="name1" type="text" placeholder="Enter Name" name="Users[name]" ></br>
          <span class='error'></span>
	      	<span id="namespan" class="error"></span>

          <label for="lastname"><b>Last Name</b></label>
          <br> <input id="lname1" type="text" placeholder="Enter LastName" name="Users[lastname]" ></br>
          <span class='error'></span>
		      <span id="lnamespan" class="error"></span>

          <label for="email"><b>Email</b></label>
          <br> <input id="email1" type="text" placeholder="Enter Email" name="Users[email]" ></br>
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
          <br><input id="password1" type="text" placeholder="Enter Password" name="Users[password]"></br>
           <span class='error'></span>
		        <span id="passspan" class="error"></span>

          <label for="pswd"><b>Confirm password</b></label>
          <br><input id="confrmpass1" type="text" placeholder="confirm password" name="Users[confirmpass]"></br>
          <span class='error'></span>
		      <span id="cpaspan" class="error"></span>

          <button type="submit" value="submit" name="submit" class="signupbtn" style="align:justify">Register</button>
          <?php 
          // if(isset($_GET['errmsg']))echo $_GET['errmsg']; 
             if($errmsg!= "")echo $errmsg; 
            ?> 
          </form>