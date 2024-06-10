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

		.decoration
		{
			style="font-family: verdana;
			text-shadow: 5px 5px 10px #aaa;
			font-family: cursive !important;
	 		color: black;
	  		background-color: rgba(255, 255, 255, 0.8);
	   		width: 800px;
	    	border-radius: 25px;
	    	padding-bottom: 5px;"
		}
		
	</style>

</head>
<body>


	<?php

	include 'student_sidebar.php';


	?>

	<div>

	<center>

	<h1 class="decoration">Welcome To Learning Management System</h1>

	<br><br>


	
	
	<br><br>

	<?php 

		if(isset($_SESSION['id'])){

	$std_id = $_SESSION['id'];

	$host="localhost";

	$user="root";

	$password="";

	$db="lms";


	$data=mysqli_connect($host, $user, $password, $db);

	$sql="SELECT * FROM studentcourses WHERE std_id='".$std_id."'";

		$result=mysqli_query($data, $sql);
		if($result->num_rows > 0){
		$row=mysqli_fetch_array($result);
		$enroll_id = $row["enroll_id"];
		$enroll_id;

		$sql2="SELECT * from courses WHERE id='".$enroll_id."'";

		$result2=mysqli_query($data, $sql2);
	

	?>

	<table style="background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */" border="1px">
		<tr>
			<th style="padding: 20px; font-size: 15px; font-family: verdana;">Course Name</th>
			<th style="padding: 20px; font-size: 15px; font-family: verdana;">Course Description</th>
			<th style="padding: 20px; font-size: 15px; font-family: verdana;">Course Subjects</th>
		</tr>



		<?php

		while($info=mysqli_fetch_array($result2)){
		
		

		?>


		<tr>
			<td style="font-family: cursive !important; padding: 20px; font-size: 15px;"><?php echo $info['name'] ?></td>
			<td style="font-family: cursive !important; padding: 20px; font-size: 15px;"><?php echo $info['description'] ?></td>
			<td style="font-family: cursive !important; padding: 20px; font-size: 15px;"><?php echo $info['subjects'] ?></td>
		</tr>

		<?php

		}

		?>
	</table>
		
	<?php 

		}
		else
		{
			echo "<b><h3>Courses not Found! Please Select The Course..</h3></b>";
		}
}

	?>
	
	</center>

	</div>
	
</body>
</html>