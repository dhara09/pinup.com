<?php session_start(); ?>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script> 
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript"></script> 
    <script>
       $(document).ready(function(){
            $(document).keypress(function(e) 
            {
                $('span').hide();
            }); 
            $("#button").click(function()
            {
                var emails=$("#email1").val();
                var check=0;
                if(emails=="")
                {
                    $("#emailspan").text("Please Fill Email Address").show();
                    check=1;
                }
                else if(!emails.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))
                {
                    $("#emailspan").text("Enter Valid Email Address").show();
                    check=1;
                }

                var pass=$("#pass1").val();
                if(pass == "")
                {
                    $("#passpan").text("Please Fill Your Password").show();
                    check=1;
                }
                if(check==0){ 
                return true;
                }
                else{
                    return false;}
	        });
        }); 
    </script> 
    <script>
    $(document).ready(function() {    
        $(".success").click(function (){
            $("#succ").stop().fadeOut("slow");
        });
        $("#succ").delay(2000).fadeOut("slow");
    });
    </script>
    <style>.error{color:red;} 
    .success{color:blue;} 
    div {margin-bottom:350%;}
    .center { text-align: center; border: 1px solid grey;}
    </style>
    <form id ="form" name="button" action="loginCheck.php" method="POST">
           <center> <h2><b>Login Form</b></h2></center>
            <label for="email"><b>Email :</b></label>
            <br><input id ="email1" type="text" placeholder="Enter email" name="Users[email]"
            value="<?php if(isset($_GET['email']))echo $_GET['email'];?>">
            <span class='error' span id="emailspan"></span>
            <span id="user-availability-status"></span></br>

            <label for="password"><b>Password :</b></label>
            <br><input id ="pass1" type="password" placeholder="Enter password" name="Users[password]" 
            value="<?php echo isset($_GET['pass'])? $_GET['pass'] : '';?>">
            <span class='error'></span><span id="passpan" class="error"></span></br>

            <button type="submit" value="submit" id="button" name="button">Login</button>
            <p>Not yet a member? <a href="signup.php">Sign up</a></p>  
            <p><a href="forgotpassw.php">Forgot Password?</a></p> 
    </form>
    <?php
        if(isset($_GET['error']))echo $_GET['error'];
        if( $_GET['status'] == 'success'):
            echo '<div id ="succ" class="center"><span class="success" span id="suc"><center>You Have Successfully Registered !! </center></span></div>';
        endif;  
        if($_GET['status'] == 'error'):
            echo '<div id ="succ" class="center"><span class="success" span id="suc"><center>Cannot Login!! Please Try Again </center></span></div>';
        endif;  
        //if($errmsg!= "")echo $errmsg;  ?> 