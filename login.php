<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Form</title>

	<link rel="stylesheet" type="text/css" href="style.css">

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>




</head>
<body background="lg.jpg" class="body_des">

	<center>
		
		<div class="form_des">

			<center class="title_des">
				Login Form

				<h4>
					
					<?php

						error_reporting(0);

						session_start();
						session_destroy();

						echo $_SESSION['loginMessage'];


					?>



				</h4>


			</center>
			
			<form action="login_check.php" method="POST" class="login_form">

				<div>
					<label class="label_des">User Name</label>
					<input class="tb_d" type="text" name="username">
				</div>

				<div>
					<label class="label_des">Email</label>
					<input class="tb_d" type="text" name="email">
				</div>

				<div>
					<label class="label_des">Password</label>
					<input class="tb_d" type="Password" name="password">
				</div>

				<div>
					<input class="btn" type="submit" name="submit" value="Login">
				</div>
				

			</form>


		</div>


	</center>

</body>
</html>