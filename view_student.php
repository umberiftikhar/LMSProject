<?php

error_reporting(0);
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

$sql="SELECT * FROM user WHERE usertype='student' ";

$result=mysqli_query($data,$sql);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>


	<?php

	include 'admin_css.php';

	?>

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

	</style>

</head>
<body>

	<?php

	include 'admin_sidebar.php';

	?>


	<div class="content">

		<center>

		<h1 class="deco">Student Data</h1>

		<?php

			if($_SESSION['message'])
			{
				echo $_SESSION['message'];
			}

			unset($_SESSION['message']);


		?>

		<br><br>

		<table  style="background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */" border="1px">
			<tr>
				<th style="padding: 20px; font-size: 15px; font-family: verdana;">Username</th>
				<th style="padding: 20px; font-size: 15px; font-family: verdana;">Email</th>
				<th style="padding: 20px; font-size: 15px; font-family: verdana;">Phone</th>
				<th style="padding: 20px; font-size: 15px; font-family: verdana;">Password</th>
				<th style="padding: 20px; font-size: 15px; font-family: verdana;">Delete</th>
				<th style="padding: 20px; font-size: 15px; font-family: verdana;">Update</th>
			</tr>

			<?php

			while($info=$result->fetch_assoc())
			{


			?>

			<tr>
				
				<td style="padding: 30px; font-family: verdana;">
					<?php echo "{$info['username']}"; ?>
				</td>
				<td style="padding: 30px; font-family: verdana;">
					<?php echo "{$info['email']}"; ?>
				</td>
				<td style="padding: 30px; font-family: verdana;">
					<?php echo "{$info['phone']}"; ?>
				</td>
				<td style="padding: 30px; font-family: verdana;">
					<?php echo "{$info['password']}"; ?>
				</td>

				<td class="table_td">
					<?php 
					echo "<a onClick=\"javascript:return confirm('Are You Sure Yoy Want To Delete This Data'); \" class='btn btn-danger' href='delete.php?student_id={$info['id']}'> Delete </a>";
					 ?>
				</td>

				<td class="table_td">
					<?php
					 echo "<a class='btn btn-primary' href='update_student.php?student_id={$info['id']}'> Update </a>"; ?>
				</td>

			</tr>

			<?php 

			}

			?>
		</table>

		</center>

	</div>

</body>
</html>