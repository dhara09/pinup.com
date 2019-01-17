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
        
        <label for="name"><b>Name</b></label>
        <br><input type="text" placeholder="Enter Name" name="Users[name]"></br>
       
        <label for="password"><b>Password</b></label>
        <br><input type="text" placeholder="Enter password" name="Users[password]"></br>

        <button onclick="window.location.href='check.php'" type="submit" class="loginbtn" value="submit" name="submit">Login</button>