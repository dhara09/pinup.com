<?php
$name=$_POST['Users']['name'];
$lname=$_POST['Users']['lastname'];
$email=$_POST['Users']['email'];
$address=$_POST['UserDetail']['address'];
$contact=$_POST['UserDetail']['contact'];
$pass=$_POST['Users']['password'];
$cpass=$_POST['Users']['confirmpass']; 
$errmsg='';
$check=0;
if(isset($_POST['submit']) )
{
  
    if(empty($name))
    {   
		$errmsg .="Please fill the Name <br>";
        $check=1;
    } 

    else if(!preg_match("/^[a-zA-Z ]*$/",$name)) 
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
    return false;
}
header("Location:http://local.pinup.com/signup.php?error=$errmsg");

require_once("connection.php");
 $sql = "INSERT INTO User (name,lastname,email,password,confirmpass)
VALUES (' ".$_POST['Users']['name']." ',' ".$_POST['Users']['lastname']." ',' ".$_POST['Users']['email']." ',' ".$_POST['Users']['password']." ',' ".$_POST['Users']['confirmpass']."')";
if(!mysqli_query($con,$sql))
{
    die("<br> Error: Record not inserted ".mysqli_error());
}
else
{
    echo ("<br> Record added successfully !!!!!</br>");
    //header("Location: welcome.php");
}  



 /*------------------------------------------------------------------------------ */
  /* $name=$_POST['Users']['name'];
  echo $name;
  $lastname=$_POST['Users']['lastname'];
  $email=$_POST['Users']['email']; */

  /* $pass=$_POST['Users']['password'];
  $enpass=md5($pass);
  $cpass= $_POST['Users']['confirmpass'];
  $conpass=md5($cpass);
    
    $form_data=array(
        'name'=> $name,
        'lastname' => $lastname,
        'email' => $email,
        'password' => $enpass,
        'confirmpass' => $conpass
    );
    /* echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    exit; */
    /* function dbRowInsert($table_name, $form_data)
    {
        $fields = array_keys($form_data);

        //echo "<pre>";print_r($fields);echo "</pre>";

        echo  $sql = "INSERT INTO ".$table_name." (`".implode('`,`', $fields)."`)
        VALUES('".implode("','", $form_data)."')";

        echo "<pre>"; print_r($form_data);echo "</pre>";

        return mysqli_query($sql);
    }
    $query= dbRowInsert('User',$form_data);
    if(!mysqli_query($con,$query))
    {    
        die("<br> Error: Record not inserted ".mysqli_error());
    }
    else
    {
        echo "<br> Record added successfully !!!!!</br>";
        header("Location:welcome.php");
    }  
    mysqli_close($con);  
 */
 
/* ---------------------------------------------------------------------------------------------- */
/* Function insertRow($table,$data)
{   
    
    $fields = array_keys($data); 
    echo "<pre>"; print_r($_POST); echo "</pre>"; exit;

    $sql = "INSERT INTO ".$table." (`".implode('`,`', $fields)."`) VALUES ('".implode("','", $data)."')";
    return mysqli_query($sql);
} 
$res=$array_combine($fields,$data);
$data =array(
    'name' => $name,
    'lname' =>$lname,
);
$query = insertRow('student',$_POST['student']); 
mysqli_close($con);
 */
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
?>