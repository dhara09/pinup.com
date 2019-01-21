<?php
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
	//echo $errmsg;
    //header("Location:http://local.pinup.com/signup.php?error=$errmsg");
}
echo "Registration is done <br />";
include("connection.php");
header("Location:welcome.php");
exit;

function Insertdata($table,$field_values,$data_values)
    {
        $field_values= implode(',',$field);
        $data_values=implode(',',$data);

        $sql="INSERT into". " ".$table." ".$field_values. "VALUES(".$data_values.")";
        $result=$conn->query($sql);
    }
    $query = Insertdata('User',$_POST['Users']);

    //$query = sqlInsert('student',$_POST['student']);
    $query1=Insertdata('userDetail',$_POST['UserDetails']); 
    mysqli_close($conn);


 /* function Insertdata($table,$field_values,$data_values)
{

    $field_values= implode(',',$field);
    $data_values=implode(',',$data);

    $sql="INSERT into". " ".$table." ".$field_values. "VALUES(".$data_values.")";
    $result=$con->query($sql);
}
$query = Insertdata('User',$_POST['User']); 
mysqli_close($con);  */
 


/* include('connection.php');

$pass=$_POST['password'];
$cpass=$_POST['confirmpass'];
$encryptpass=md5($pass);
$encryptcpass=md5($cpass);

$sql = "INSERT INTO User (name,lastname,email,password,confirmpass)
VALUES (' ".$_POST['Users']['name']." ',' ".$_POST['Users']['lastname']." ',' ".$_POST['Users']['email']." ',' ".$encryptpass." ',' ".$encryptcpass."')";

if(!mysqli_query($con,$sql))
{
    die("<br> Error: Record not inserted ".mysqli_error());
}
else
{
    echo "<br> Record added successfully !!!!!</br>";
    //include("welcome.php");
}  */


// inserting data into db and include('welcome.php');
?>
