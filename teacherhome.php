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
	</style>
	
</head>
<body>

	<?php

	include 'teacher_sidebar.php';


	?>

	<div class="content">

		<h1 style="font-family: cursive !important; color: white;">Teacher Dashboard</h1>

	</div>

</body>
</html>