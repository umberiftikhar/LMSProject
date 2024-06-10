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

	$data=mysqli_connect($host,$user,$password,$db);

	if(isset($_POST['add_course']))
	{
		$coursename=$_POST['name'];
		$course_description=$_POST['description'];
		$course_subjects=$_POST['subjects'];
		$course_duration=$_POST['time'];
		

		$sql="INSERT INTO courses(name,description,subjects,duration) 
		VALUES ('$coursename', '$course_description', '$course_subjects','$course_duration')";

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
	<title>Teacher Dashboard</title>


	<?php

	include 'student_css.php';


	?>


	<style type="text/css">
	
		body
		{
			background-image: url('teacherbackground.jpg');
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

		.deccc
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

</head>
<body>

	<?php

	include 'teacher_sidebar.php';


	?>

	<div class="content">

		<center>

		<h1 class="deccc">Academic Courses</h1>


		<div class="div_des">
			
			<form action="#" method="POST">

				<div>
					<label style="font-family: cursive !important;">Course Name</label>
					<textarea style="font-family: verdana; border-radius: 15px; padding-top: 10px;" name="name"></textarea>
				</div>

				<div>
					<label style="font-family: cursive !important;">Course Description</label>
					<textarea style="font-family: verdana; border-radius: 15px; padding-top: 10px;" name="description"></textarea>
				</div>

				<div>
					<label style="font-family: cursive !important;">Course Subjects</label>
					<textarea style="font-family: verdana; border-radius: 15px; padding-top: 10px;" name="subjects"></textarea>
				</div>

				<div>
					<label style="font-family: cursive !important;">Course Duration</label>
					<input style="font-family: verdana; border-radius: 15px; padding-top: 10px;" type="text" name="time">
				</div>

				<div>
					
					<input type="submit" class="btn btn-primary" name="add_course" value="Add Course">
				</div>


			</form>
		</div>

		</center>


	</div>


</body>
</html>