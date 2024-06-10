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
	$course="select * from courses where 1";
	$corseres=mysqli_query($data, $course);
	
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

</head>
<body>

	<?php

	include 'teacher_sidebar.php';


	?>

	<div class="content">

		<center>

		<h1 class="decc">Question Evaluation</h1>


		<div class="div_des">
			
			<form action="#" method="POST">

				<div>
					<label style="font-family: cursive !important;">Course Name</label>
					<select style="font-family: cursive !important;" name="name" onChange="get_subjectdata(this.value);">
						<option style="font-family: cursive !important;" value=""> Select Course </option>
						<?php
						while($courses=mysqli_fetch_array($corseres)){
							?>
							<option style="font-family: cursive !important;" value="<?php echo $courses['id'] ?>"><?php echo $courses['name'] ?></option>

						<?php } ?>

					</select>
				</div>


				<div>
					<label style="font-family: cursive !important;">Subject Code</label>
					<select style="font-family: cursive !important;" name="subject" id="subject_list">
						<option style="font-family: cursive !important;" value=""> Select Subject </option>

					</select>
				</div>

				<div> <br>
					<p><b>Click Here To Add Questions!<b/><p>
					
				</div>

				<div>
					
					<a href="add_question.php" class="btn btn-primary">Click Me</a>
				</div>


			</form>
		</div>

		</center>


	</div>


</body>
</html>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script> 
function get_subjectdata(val) { 
		$.ajax({
		type: "POST",
		url: "get_subjects.php",
		data:'selcted_course='+val,
		success: function(data){
			console.log(data);
		    $("#subject_list").html(data);
		}
	});
} 
</script>