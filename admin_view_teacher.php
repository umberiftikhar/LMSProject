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


	$data=mysqli_connect($host, $user, $password, $db);

	$sql="SELECT * FROM teacher";

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
		
		.decoo 
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

		<h1 class="decoo">All Teacher Data</h1>

		<table  style="background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */" border="1px">
			<tr>
				<th style="padding: 20px; font-size: 15px; font-family: verdana;">Teacher Name</th>
				<th style="padding: 20px; font-size: 15px; font-family: verdana;">About Teacher</th>
				<th style="padding: 20px; font-size: 15px; font-family: verdana;">Image</th>
			</tr>

			<?php

			while($info=$result->fetch_assoc())
			{

			 ?>

			<tr>
				<td style="padding: 30px; font-family: verdana;"><?php echo "{$info['name']}" ?></td>
				<td style="padding: 30px; font-family: verdana;"><?php echo "{$info['description']}" ?></td>
				<td style="padding: 30px; font-family: verdana;"> <img height="100px" width="100px" src="<?php echo "{$info['image']}" ?>"> </td>
			</tr>

			<?php 

			}

			?>
		</table>

		</center>
	</div>

</body>
</html>