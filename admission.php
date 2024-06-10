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

	$sql="SELECT * from registration WHERE 1";

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

</head>
<body>


	<?php

	include 'admin_sidebar.php';

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

		.dec 
		{
			width: 600px;
			text-shadow: 5px 5px 10px #aaa;
			border-radius: 25px;
			background-color: rgba(255, 255, 255, 0.8);
			font-family: cursive !important;
			color: black;"
		}
	</style>

	<div class="content">

		<center>

		<h1 class="dec">Applied For Registration</h1>

		<br><br>

		<table style="background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */" border="1px">
			<tr>
				<th style="padding: 20px; font-size: 15px; font-family: verdana;">Name</th>
				<th style="padding: 20px; font-size: 15px; font-family: verdana;">Email</th>
				<th style="padding: 20px; font-size: 15px; font-family: verdana;">CNIC</th>
				<th style="padding: 20px; font-size: 15px; font-family: verdana;">Phone</th>
				<th style="padding: 20px; font-size: 15px; font-family: verdana;">User-Type</th>
			</tr>

			<?php

			while($info=$result->fetch_assoc())
			{

			
			?>

			<tr>
				<td style="padding: 20px; font-family: verdana;">
					<?php echo "{$info['name']}"; ?>
				</td>
				<td style="padding: 20px; font-family: verdana;">
					<?php echo "{$info['email']}"; ?>
				</td> 
				<td style="padding: 20px; font-family: verdana;">
					<?php echo "{$info['cnic']}"; ?>
				</td>
				<td style="padding: 20px; font-family: verdana;">
					<?php echo "{$info['phone']}"; ?>
				</td>
				<td style="padding: 20px; font-family: verdana;">
					<?php echo "{$info['user_type']}"; ?>
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