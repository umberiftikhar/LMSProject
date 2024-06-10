<?php

error_reporting(0);
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


 if(isset($_POST['apply']))
 	{
 		$enroll_id=$_POST['course_id'];
 		$student_id=$_POST['std_id'];

		if(!empty($enroll_id))
 		{

 			$sql="SELECT * FROM studentcourses WHERE std_id=$student_id";
 			$result=mysqli_query($data,$sql);
 			$rec= mysqli_num_rows($result);
 			if($rec==0)
 			{
 				$sql="INSERT INTO studentcourses(enroll_id,std_id) 
	 			VALUES ('$enroll_id','$student_id')";
	 			$result=mysqli_query($data,$sql);
	 			if($result)
		 		{
		 			echo " <script type='text/javascript'>
				
		 			alert('Apply Successfully');

		 			</script>";
		 		}	
 			}
 			else
 			{
 				echo " <script type='text/javascript'>
				
		 			alert('User is already inrolled');

		 			</script>";
 			}
 			
 		}
 		else
 		{
 			echo " <script type='text/javascript'>
				
		 			alert('Please Select The Course!');

		 			</script>";
 		}
 	}

$sql="SELECT * FROM courses ";

$result=mysqli_query($data,$sql);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Dashboard</title>


	<?php

	include 'admin_css.php';

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


		
		.table_th
		{
			padding: 20px;
			font-size: 15px;
			font-family: verdana;
		}

		.table_td
		{

			font-family: cursive !important;
			padding: 20px;
			font-size: 15px;
			
		}

	</style>


</head>
<body>

	<?php

	include 'student_sidebar.php';

	?>


	<div class="content">


		<form action="" method="POST">

		<center>

		<h1 class="dec">Course Enrollment</h1>

		<?php

			if($_SESSION['message'])
			{
				echo $_SESSION['message'];
			}

			unset($_SESSION['message']);


		?>

		<br><br>

		<table style="background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */" border="1px">
			<tr>
				<th class="table_th">Enroll</th>
				<th class="table_th">Course Name</th>
				<th class="table_th">Description</th>
				<th class="table_th">Subjects</th>
				<th class="table_th">Duration</th>
				
				
			</tr>

			<?php

			while($info=$result->fetch_assoc())
			{


			?>

			<tr>

				<td>
					<input type="radio" id="enroll" name="course_id" value="<?php echo "{$info['id']}"; ?>">
				<label class="mid"></label>
			</td>
				
				<td class="table_td">
					<?php echo "{$info['name']}"; ?>
				</td>
				<td class="table_td">
					<?php echo "{$info['description']}"; ?>
				</td>
				<td class="table_td">
					<?php echo "{$info['subjects']}"; ?>
				</td>
				<td class="table_td">
					<?php echo "{$info['duration']}"; ?>
				</td>

			</tr>

			<?php 

			}

			?>
		</table> <br>
		<input type="hidden" name="std_id" value="<?php echo $_SESSION['id']; ?>">
		<input class="btn btn-primary" id="sumit" type="submit" value="Apply" name="apply">

		</center>


	</form>

	</div>

</body>
</html>