<?php

session_start();

if(!isset($_SESSION['username']))
{
	header("location:login.php");
}

elseif($_SESSION['usertype']=='admin')
{
	header("location:login.php");
}


$host="localhost";

$user="root";

$password="";

$db="lms";


$data=mysqli_connect($host, $user, $password, $db);

$name=$_SESSION['username'];

$sql="SELECT * FROM user WHERE username='$name' ";

$result=mysqli_query($data,$sql);

$info=mysqli_fetch_assoc($result);


if(isset($_POST['update_profile']))
{
	$s_email=$_POST['email'];
	$s_phone=$_POST['phone'];
	$s_password=$_POST['password'];

	$sql2="UPDATE user SET email='$s_email',phone='$s_phone',password='$s_password' WHERE username='$name' ";

	$result2=mysqli_query($data,$sql2);

	if($result2)
	{
		header('location:student_profile.php');
	}

}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Dashboard</title>


	<?php

	include 'student_css.php';

	?>

<style type="text/css">

	body
	{
		background-image: url('studentbackground.jpg');
		background-repeat: no-repeat;
		background-position: center;
		background-size: cover;
		width: 100%;
		height: 641px;
		margin: 0;
	}

	label
	{
		display: inline-block;
		text-align: right;
		width: 100px;
		padding-top: 10px;
		padding-bottom: 10px;
	}

	.deco 
	{
		style="font-family: verdana;
		text-shadow: 5px 5px 10px #aaa;
		font-family: cursive !important;
	 	color: black;
	  	background-color: rgba(255, 255, 255, 0.8);
	   	width: 400px;
	    border-radius: 25px;
	    padding-bottom: 5px;"
	}


	.div_des
	{
		border-radius: 25px;
		background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
		width: 400px;
		padding-top: 70px;
		padding-bottom: 70px;
	}

</style>

</head>
<body>

	<?php

	include 'student_sidebar.php';


	?>

	<div class="content">

		<center>

			<h1 class="deco">Update Profile</h1>
			<br><br>

		<form action="#" method="POST">

			<div class="div_des">


			

			<div>
				<label style="font-family: cursive !important;">Email</label>
				<input style="font-family: verdana; border-radius: 15px; padding-top: 10px;" type="email" name="email" value="<?php echo "{$info['email']}" ?>">
			</div>

			<div>
				<label style="font-family: cursive !important;">Phone</label>
				<input style="font-family: verdana; border-radius: 15px; padding-top: 10px;" type="number" name="phone" value="<?php echo "{$info['phone']}" ?>">
			</div>

			<div>
				<label style="font-family: cursive !important;">Password</label>
				<input style="font-family: verdana; border-radius: 15px; padding-top: 10px;" type="text" name="password" value="<?php echo "{$info['password']}" ?>">
			</div>

			<br>

			<div>
				
				<input type="submit" class="btn btn-primary" name="update_profile" value="Update">
			</div>

			</div>


		</form>

		</center>

	</div>
	
</body>
</html>