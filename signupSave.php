<?php
require_once("connection.php");
if(isset($_POST['submit']) )
{
    $name=$_POST['Users']['name'];
    $lname=$_POST['Users']['lastname'];
    $email=$_POST['Users']['email'];
    $address=$_POST['UserDetail']['address'];
    $contact=$_POST['UserDetail']['contact'];
    $pass=$_POST['Users']['password'];
    $cpass=$_POST['Users']['confirmpass']; 
 
    if(empty($name))
    {   
		$errmsg .="Please fill the Name <br>";
        $check=1;
    }  
     if(!preg_match("/^[a-zA-Z ]*$/",$name)) 
    {
        $errmsg .=" Use only Alphabets for name <br>";
        $check=1;
    }
    else if(strlen($name)<= 2)
    {
       $errmsg .="Enter valid Name <br>";
       $check=1;
    }
    if(empty($lname))
    {
        $errmsg .="Please fill Your Last Name <br>";
        $check=1;
    }
    else if(!preg_match("/^[a-zA-Z ]*$/",$lname)) 
    {
        $errmsg .= "Use only Alphabets for name <br>";
        $check=1;
    }
    else if(strlen($lname)<=2)
    {
        $errmsg .="Enter valid LastName <br>";
        $check=1;
    }
    if(empty($email))   
    {
        $errmsg .="Please fill your Email Address<br>";
        $check=1;
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $errmsg .=" Enter valid Email Address <br>";
        $check=1;
    }

    if(empty($address))
    {
        $errmsg .="Please fill Your Address <br>";
        $check=1;
    }

    if(empty($contact))
    {
        $errmsg .="Please fill the Your Contact <br>";
        $check=1;
    }

    else if(strlen($contact)>10)
    {
        $errmsg .= "Enter only 10 digits number <br>";
        $check=1;
    }

    if(empty($pass))
    {
        $errmsg .="Please fill your Password <br>";
        $check=1;
    }
    else if(strlen($pass)<=5)
    {
        $errmsg .="Enter mininmum 5-8 Characters <br>";
        $check=1;
    }        
    
    if(empty($cpass))
    {
        $errmsg .=" Please confirm your password <br>";
        $check=1;
    }

    else if(strlen($cpass)<=5)
    {
        $errmsg .= "Enter minimum 5-8 characters <br>";
        $check=1;
	}
	
	if($pass !== $cpass){
		$errmsg .="passwords dnt match";
		$check=1;
	}
    if($check==0)
    {
        $errmsg .= "Form Successfully Logged In";
        
	}
    header("Location:http://local.pinup.com/signup.php?error=$errmsg");
}
?>
<?php

/* $sql = "INSERT INTO User (name,lastname,email,password,confirmpass)
VALUES (' ".$_POST['Users']['name']." ',' ".$_POST['Users']['lastname']." ',' ".$_POST['Users']['email']." ',' ".$_POST['Users']['password']." ',' ".$_POST['Users']['confirmpass']."')";
if(!mysqli_query($con,$sql))
{
    die("<br> Error: Record not inserted ".mysqli_error());
}
else
{
    echo ("<br> Record added successfully !!!!!</br>");
    header("Location: welcome.php");
}  */
 /*------------------------------------------------------------------------------ */
  /*  function sqlInsert($table, $cols, $values)
    {
        echo $insertquery = "INSERT INTO " . $table . " (" . $cols . ") VALUES (" . $values . ")";
        $insertresult = mysqli_query($con, $insertquery) or die(mysqli_error($con));
        return $insertresult;
    }
    $values = array(
        '$name'=> $name,
        '$lastname'=> $lastname,
    );
    $query1=sqlInsert('Users',$_POST['Users']);  */

/* =--------------------------------------------------------------------------------- */
   $form_data=array(
        '$name' => $_POST['Users']['name'],
        '$lastname' => $_POST['Users']['lastname'],
        '$email' => $_POST['Users']['email'],
        '$password' => $_POST['Users']['password'],
        '$cpass' => $_POST['Users']['confirmpass'],
    );

    function dbRowInsert($table_name, $form_data)
    {
        $fields = array_keys($form_data);
        echo $sql = "INSERT INTO ".$table_name."(".implode('`,`', $fields).")
                VALUES('".implode("','", $form_data)."')";
        return mysqli_query($sql);
    }
        $query=dbRowInsert('Users',$_POST['Users']);

        if(!mysqli_query($con,$query))
        {    
            die("<br> Error: Record not inserted ".mysqli_error());
        }
        else
        {
            echo "<br> Record added successfully !!!!!</br>";
            //header("Location:welcome.php");
        }  
        mysqli_close($con);  
    /* --------------------------------------------------------------------------------------- */
      /* function Insertdata($table,$field_values,$data_values)
      {   
        $field_values= implode(',',$field);
        $data_values=implode(',',$data);

        $sql="INSERT into". " ".$table." ".$field_values. "VALUES(".$data_values.")";
        $result=$con->query($sql);
      }
        $query = Insertdata('User',$_POST['Users']); */
/* ---------------------------------------------------------------------------------------------------- */
          
         /* $name=$_POST['Users']['name'];
          $lname=$_POST['Users']['lastname'];
          $email=$_POST['Users']['email'];
          $pass=$_POST['Users']['password'];
          echo $query = "INSERT INTO User (name,lastname,email,password,) 
                    VALUES (' ".$name." ',' ".$lname." ',' ".$email." ',' ".$pass."')";
                    
           $results = mysqli_query($dbname, $query);
           if(!mysqli_query($con,$sql))
           {    
             die("<br> Error: Record not inserted ".mysqli_error());
            }
            else
            {
                echo "<br> Record added successfully !!!!!</br>";
                header("Location:welcome.php");
            }  
  	   */

?>
