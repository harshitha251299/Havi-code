<?php

session_start();

$username="";
$email="";
$password_2="";
$password_1="";


$errors=array();
$users=array();
$dataList=array();
 $db=mysqli_connect('localhost','root','','havi') or die("could not connect");

 if(isset($_POST['reg_user'])) 
{
if(isset($_POST['username'])) 
{
$username=mysqli_real_escape_string($db,$_POST['username']);
};
if(isset($_POST['email'])) 
{
$email=mysqli_real_escape_string($db,$_POST['email']);
};

if(isset($_POST['dob'])) 
{
$dob=mysqli_real_escape_string($db,$_POST['dob']);
};
if(isset($_POST['phoneNo'])) 
{
$phoneNo=mysqli_real_escape_string($db,$_POST['phoneNo']);
};
if(isset($_POST['place'])) 
{
$place=mysqli_real_escape_string($db,$_POST['place']);
};
if(isset($_POST['formGender'])) 
{
$formGender=mysqli_real_escape_string($db,$_POST['formGender']);
};
if(isset($_POST['password_1'])) 
{
$password_1=mysqli_real_escape_string($db,$_POST['password_1']);
};
if(isset($_POST['password_2'])) 
{
$password_2=mysqli_real_escape_string($db,$_POST['password_2']);
};

if($password_1 != $password_2) {array_push($errors,"Password dont match");};

$user_check_query="SELECT * FROM users WHERE Username ='$username'  LIMIT 1";

$results=mysqli_query($db,$user_check_query);
$user=mysqli_fetch_assoc($results);

if($user)

{
	if($user['Username'] == $username){
		{array_push($errors,"Username Already exists");};
	}
}

if(count($errors) == 0)
{
	$password=md5($password_1);
	$id_query="SELECT MAX(Id) max_id FROM users";
    $results=mysqli_query($db,$user_check_query);
   $user=mysqli_fetch_assoc($results);
    $Id=$user['max_id']+1;
$results=mysqli_query($db,$user_check_query);
	$query ="INSERT INTO users (Id,Username,Password,Email,Dob ,ContactNo ,Place,Gender ) VALUES  ('$Id','$username','$password','$email','$dob','$phoneNo','$place','$formGender')";

	mysqli_query($db,$query);
	$_SESSION['username'] =$username;
	$_SESSION['success'] ="You are now logged in";

	header('location: index.php');

}

}

if(isset($_POST['log_in'])) 
{


$username=mysqli_real_escape_string($db,$_POST['username']);
$password=mysqli_real_escape_string($db,$_POST['password_2']);

if($username=='Admin' )
{
	if($password=='Admin' )
	{
		$query ="SELECT * FROM users";
        $results=mysqli_query($db,$query);
         if (mysqli_num_rows($results) > 0) { 
       
        while ($row = mysqli_fetch_array($results)) { 
           {array_push($users,$row['Username']);};
        } 
        
         $_SESSION['username'] =$username;
         $_SESSION['success'] ="Admin user";
	
        header('location: data.php') ;
    } 
	}
}


if(count($errors) == 0)
{
	$password=md5($password);
	$query ="SELECT * FROM users WHERE Username ='$username'  AND  Password='$password'";

	$results=mysqli_query($db,$query);


	if(mysqli_num_rows($results)){
     $_SESSION['username'] =$username;
     $_SESSION['success'] ="You are now logged in";
	 header('location: index.php') ;
	}
     
}
else
{
	array_push($errors,"Wrong Username/Password , Please try again.");
}
}

if(isset($_POST['update_data'])) 
{
$username=$_SESSION['username'];
$data=mysqli_real_escape_string($db,$_POST['data']);
$user_check_query="SELECT * FROM users WHERE Username ='$username'  LIMIT 1";

$results=mysqli_query($db,$user_check_query);
$user=mysqli_fetch_assoc($results);

if($user)
{
	$id=$user['Id'];
	$query ="INSERT INTO user_data (User_ID,data) VALUES  ('$id','$data')";

	mysqli_query($db,$query);
	
   $user_check_query="SELECT * FROM user_data WHERE User_ID ='$id' ";

$results=mysqli_query($db,$user_check_query);

while($row = mysqli_fetch_array($result)){

		array_push($dataList,$row['data']);
	

}
	$_SESSION['success'] ="Data updated";

	header('location: index.php');
}

	}

?>