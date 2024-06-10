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
		body {
			background-image: url('adbackground.jpg');
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
			width: 100%;
			height: 641px;
			margin: 0;
		}
	</style>


	<div class="content">

		<h1 style="font-family: cursive !important; color: white;">Admin dashboard</h1>

	</div>

</body>
</html>