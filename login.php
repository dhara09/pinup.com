<?php session_start();
//include_once("../css/stylesheet.css"); ?>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script> 
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<!-- <script>
       $(document).ready(function(){
            $('input').keyup(function(){
                $(this).siblings('span').hide();
            });
            $("#submit").click(function()
            {
                var check=0;
                
                var emails=$("#email1").val();
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
                if(check == 0){ 
                return true;
                }
                return false;
	        });
        }); 
    </script>  -->
    <script>
    $(document).ready(function() {    
        $(".success").click(function (){
            $("#succ").stop().fadeOut("slow");
        });
        $("#succ").delay(2000).fadeOut("slow");
    });
    </script>
    <style>
   .error{color:red;} 
    .success{color:blue;} 
     div{margin-bottom:350%;}
    .center { text-align: center; border: 1px solid grey;} 
    </style>
    <form name="button" id ="form" action="loginCheck.php" method="POST">
           <center> <h2><b>Login Form</b></h2></center>
           <span>
                <label for="email"><b>Email :</b></label>
                <br><input id ="email1" type="text" placeholder="Enter email" name="Users[email]"
                value="<?php if(isset($_GET['email1'])) echo base64_decode($_GET['email1']) ;?>">
                <span id="emailspan" class="error"></span></br>
            </span>
            
           <span>
                <label for="password"><b>Password :</b></label>
                <br><input id ="pass1" type="password" placeholder="Enter password" name="Users[password]"
                value="<?php if(isset($_GET['pass'])) echo base64_decode($_GET['pass']) ;?>">
                <span id="passpan" class="error"></span></br>
            </span>     
        
            <span>
                <br><button type="submit" value="submit" id="submit" name="submit">Login</button>
                <p>Not yet a member? <a href="signup.php">Sign up</a></p></br> 
            </span>
    </form>
    <?php
       if(isset($_GET['error']))echo base64_decode($_GET['error']);
         if( $_GET['status'] == 'success'):
            echo '<div id ="succ" class="center"><span class="success" span id="suc"><center>You Have Successfully Registered !! </center></span></div>';
        endif;  
        if($_GET['status'] == 'error'):
            echo '<div id ="succ" class="center"><span class="success" span id="suc"><center>Cannot Login!! Combination of Email & Password Dont Match...Please Try Again </center></span></div>';
        endif;   //if($errmsg!= "")echo $errmsg;   ?>  