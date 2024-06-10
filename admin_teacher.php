<?php

session_start();

if(!isset($_SESSION['username']))
{
	header("location:login.php");
}

elseif($_SESSION['usertype']=='teacher')
{
	header("location:login.php");
}

	$host="localhost";
	$user="root";
	$password="";
	$db="lms";

	$data=mysqli_connect($host,$user,$password,$db);

	if(isset($_POST['add_teacher']))
	{
		$username=$_POST['name'];
		$user_email=$_POST['email'];
		$user_phone=$_POST['phone'];
		$user_password=$_POST['password'];
		$usertype="teacher";


		$sql="INSERT INTO user(username,email,phone,usertype,password) 
		VALUES ('$username', '$user_email', '$user_phone','$usertype','$user_password')";

		$result=mysqli_query($data,$sql);

		if($result)
		{
			echo " <script type='text/javascript'>
		
			alert('Data Upload Successfully');

			</script>";
		}
		else
		{
			"Upload Failed";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>

	<style type="text/css">

		body
		{
			background-image: url('adbackground.jpg');
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

		.div_des
		{
			border-radius: 25px;
			background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
			width: 400px;
			padding-top: 70px;
			padding-bottom: 70px;
		}

		.dec
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


	</style>


	<?php

	include 'admin_css.php';

	?>


</head>
<body>

	<?php

	include 'admin_sidebar.php';

	?>


	<div class="content">

		<center>

		<h1 class="dec">Add Teacher</h1>


		<div class="div_des">
			
			<form action="#" method="POST">

				<div>
					<label style="font-family: cursive !important;">User Name</label>
					<input style="font-family: verdana; border-radius: 15px; padding-top: 10px;" type="text" name="name">
				</div>

				<div>
					<label style="font-family: cursive !important;">Email</label>
					<input style="font-family: verdana; border-radius: 15px; padding-top: 10px;" type="text" name="email">
				</div>

				<div>
					<label style="font-family: cursive !important;">Phone</label>
					<input style="font-family: verdana; border-radius: 15px; padding-top: 10px;" type="number" name="phone">
				</div>

				<div>
					<label style="font-family: cursive !important;">Password</label>
					<input style="font-family: verdana; border-radius: 15px; padding-top: 10px;" type="text" name="password">
				</div>

				<div>
					
					<input type="submit" class="btn btn-primary" name="add_teacher" value="Add Teacher">
				</div>


			</form>
		</div>

		</center>

	</div>

</body>
</html>