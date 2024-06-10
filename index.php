<?php

	error_reporting(0);
	session_start();
	session_destroy();

if($_SESSION['message'])
{
	$message=$_SESSION['message'];

	echo "<script type='text/javascript'>

	alert('$message');

	</script>";
}

if($_SESSION['namecheckmsg'])
{
	$message_vald=$_SESSION['namecheckmsg'];

	echo "<script type='text/javascript'>

	alert('$message_vald');

	</script>";
}

	$host="localhost";
	$user="root";
	$password="";
	$db="lms";

	$data=mysqli_connect($host,$user,$password,$db);

	$sql="SELECT * FROM teacher";

	$result=mysqli_query($data,$sql);

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Learning Management System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">

	<!-- Load an icon library -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css">

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



</head>
<body>

	<nav>
		<section style="background: #34495e; color: rgba(255, 255, 255, 0.5);"></section>
		<label class="logo">Learning Management System</label>

		<ul>
			<li><a href="help_center.php">Help</a></li>
			<li><a href="index.php">Home</a></li>
			<li><a href="">Contact</a></li>
			<li><a href="login.php" class="btn">Login</a></li>
		</ul>
	</nav>

	

	<div class="section1">

		<label class="img_text">Online Learning is not the next big thing. It is the now big thing.</label>

			<img class="main_img" src="test.jpg">		
	</div>


	<div class="container">

		<div class="row">

			<div class="col-md-4">

				<br>
				<br>

				<img class="welcome_img" src="test2.jpg">
				
			</div>

			<div class="col-md-8">

				
				<h1 style="font-family: cursive !important; text-shadow:1px 1px 1px black;">Welcome To Learning Management System for Formative assessment of Academic Courses</h1>

				<p style="font-family: verdana;">A Learning Management System (LMS) is a pivotal tool in the realm of formative assessment for academic courses. This technology provides educators with a centralized platform to design, implement, and evaluate formative assessments that gauge students' understanding and progress throughout a course. The LMS allows instructors to create diverse assessment types, including quizzes, surveys, and discussions, tailored to the specific learning objectives of the academic program. Its intuitive interface facilitates the seamless administration of assessments, enabling educators to collect real-time data on student performance. Additionally, the LMS supports the timely delivery of constructive feedback, fostering a continuous feedback loop that enhances the learning process. By streamlining the formative assessment workflow, the LMS not only empowers educators to make data-driven instructional decisions but also cultivates an interactive and engaging academic environment conducive to student success.</p>
			
		</div>
		
	</div>

		<br>

	<center>
		<h1 style="font-family: cursive !important; text-shadow:1px 1px 1px black;">Our Instructors</h1>
	</center>



	<div class="container">

		<div class="row">

			<?php

			while($info=$result->fetch_assoc())
			{

			 ?>

			<div class="col-md-4">

				<img class="teacher" src="<?php echo "{$info['image']}" ?>">

				<h3 style="font-family: cursive !important;"> <?php echo "{$info['name']}" ?></h3>

				<h5 style="font-family: verdana;"> <?php echo "{$info['description']}" ?></h5>
				
			</div>

			<?php 

			}

			?>


		</div>

	</div>

			<br>


	<center>
		<h1 style="font-family: cursive !important; text-shadow:1px 1px 1px black;">Our Courses</h1>
	</center>



	<div class="container">

		<div class="row">

			<div class="col-md-4">

				<img class="teacher" src="BS-CS.jpg">

				<h3 style="font-family: cursive !important;">Bachelor Of Computer Science</h3>

				
				
			</div>

			<div class="col-md-4">

				<img class="teacher" src="BS-IT.jpg">

				<h3 style="font-family: cursive !important;">Bachelor Of Information Technology</h3>

				
			</div>

			<div class="col-md-4">

				<img class="teacher" src="BS-BA.jpg">

				<h3 style="font-family: cursive !important;">Bachelor Of Business Administration</h3>
				
			</div>


		</div>

	</div>


	<center>
		<h1 style="font-family: cursive !important; text-shadow:1px 1px 1px black;" class="adm">Registration</h1>
	</center>

	<div align="center" class="registration_form">

		<form class="bk" action="data_check.php" method="POST">

			<div class="adm_inp">

				<p >Please Select Your Registration Type.</p>
				
				<input type="radio" id="teacher" name="user_type" value="Teacher">
				<label class="label_text">Teacher</label>

				<input type="radio" id="teacher" name="user_type" value="Student">
				<label class="label_text">Student</label>
			</div>
			
			<div class="adm_inp">
				<label class="label_text">Enter Your Name</label>
				<input class="input_des" type="text" name="name">
			</div>


			<div class="adm_inp">
				<label class="label_text">Enter Your CNIC Number</label>
				<input class="input_des" type="number" name="cnic">
			</div>


			<div class="adm_inp">
				<label class="label_text">Enter Email Address</label>
				<input class="input_des" type="text" name="email">
			</div>

			<div class="adm_inp">
				<label class="label_text">Enter Phone Number</label>
				<input class="input_des" type="number" name="phone">
			</div>
			

			<div class="adm_inp">
				
				<input class="btn" id="sumit" type="submit" value="Apply" name="apply">
			</div>

			
		</form>

</div>
</div>
			<br>
			<br>


			<footer>
        <p style="font-family: verdana;">&copy; 2024 Learning Management System. All rights reserved.</p>
    </footer>
			
</body>
</html>