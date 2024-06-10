<?php

session_start();

$host="localhost";

$user="root";

$password="";

$db="lms";

$data=mysqli_connect($host, $user, $password, $db);

if($data===false)
{
	die("connection error");
}


if(isset($_POST['apply']))
{

	$sqlcheck="SELECT name from registration WHERE 1";

	$checkrow=mysqli_query($data,$sqlcheck);

	$row=mysqli_fetch_array($checkrow);
	
	if($row['name'] == $_POST['name'])
	{
		
		$_SESSION['namecheckmsg'] = "This username is already exist";
		header("location:index.php");
		exit();


	}else{

	
	$data_name=$_POST['name'];
	$data_CNICNumber=$_POST['cnic'];
	$data_email=$_POST['email'];
	$data_phone=$_POST['phone'];
	$data_user_type=$_POST['user_type'];



$sql="INSERT INTO registration(name,email,cnic,phone, password, user_type)
VALUES ('$data_name', '$data_email', '$data_CNICNumber', '$data_phone', '', '$data_user_type')"; 



$result=mysqli_query($data,$sql);

if($result)
{
	$_SESSION['message']="Your Application Sent Successfully";

	header("location:index.php");
}
else
{
	echo "Apply Failed";
}

}
}

?>