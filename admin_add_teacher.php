<?php


session_start();

if(!isset($_SESSION['username']))
{
	header("location:login.php");
}

elseif($_SESSION['usertype']=='student')
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
		$t_name=$_POST['name'];

		$t_description=$_POST['description'];

		$file=$_FILES['image']['name'];

		$dst="./image/".$file;

		$dst_db="image/".$file;

		move_uploaded_file($_FILES['image']['tmp_name'],$dst );
			
			$sql="INSERT INTO teacher (name,description,image) VALUES ('$t_name','$t_description','$dst_db')";

		$result=mysqli_query($data,$sql);
		

		if($result)
		{
			header('location:admin_add_teacher.php');
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
		
		.div_des
		{
			border-radius: 25px;
			background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
			width: 400px;
			padding-top: 50px;
			padding-bottom: 50px;
		}

		.decc
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

		<h1 class="decc">Add Teacher</h1> <br><br>

		<div class="div_des">
			<form action="#" method="POST" enctype="multipart/form-data">
				<div>
					<label style="font-family: cursive !important;">Teacher Name : </label>
					<input style="font-family: verdana; border-radius: 15px; padding-top: 10px;" type="text" name="name">
				</div>

				<br>

				<div>
					<label style="font-family: cursive !important;">Description : </label>
					<textarea style="font-family: verdana; border-radius: 15px; padding-top: 10px;" name="description"></textarea>
				</div>

				<br>

				<div>
					<label style="font-family: cursive !important;">Image : </label>
					<input style="border-radius: 15px; padding-top: 10px;" type="file" name="image">
				</div>

				<br>

				<div>
					
					<input type="submit" name="add_teacher" value="Add Teacher" class="btn btn-primary">
				</div>
			</form>
		</div>

		</center>

	</div>

</body>
</html>