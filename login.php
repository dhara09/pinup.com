<head>
<?php session_start(); ?>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script> 
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script type="text/javascript"></script> 
 <!--  <script>
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
                    $("#emailspan").text("Please fill this field").show();
                    check=1;
                }
                else if(!emails.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))
                {
                    $("#emailspan").text("Enter valid email address ").show();
                    check=1;
                }

                var pass=$("#pass1").val();
                if(pass == "")
                {
                    $("#passpan").text("Please fill this field").show();
                    check=1;
                }
                if(check==0){ 
                return true;
                }
                else{
                    return false;}
	    });
       }); 
        </script>  -->
    <style> 
        .error{
        color:red;}  
    </style>
    <form id ="form" name="button" action="loginCheck.php" method="POST">
            <label for="email"><b>Email</b></label>
            <br><input id ="email1" type="text" placeholder="Enter email" name="Users[email]" 
            value="<?php echo isset($_SESSION['query']) ? $_SESSION['query'] : ''; ?>"></br>
            <span class='error'></span>
            <span id="emailspan" class="error"></span>

            <label for="password"><b>Password</b></label>
            <br><input id ="pass1" type="password" placeholder="Enter password" name="Users[password]"
            value="<?php echo isset($_GET['query']) ? $_GET['query'] : ''; ?>"></br>
            <span class='error'></span>
            <span id="passpan" class="error"></span>

            <button type="submit" value="submit" id="button" name="button">Login</button>
            <p>Not yet a member? <a href="signup.php">Sign up</a></p>
    </form>
    <?php
        if(isset($_GET['error']))echo $_GET['error'];
        //var_dump($_SESSION['query']);
        //if($errmsg!= "")echo $errmsg;  
     ?> 