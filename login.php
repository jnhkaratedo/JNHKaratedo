<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="css/maps/bootstrap.min.css">	
	<link rel="stylesheet" type="text/css" href="css/login/util.css">
	<link rel="stylesheet" type="text/css" href="css/login/main.css">
</head>
<body>
	
		<div class="container-login100">
			<div class="wrap-login100" >
			
				<form class="login100-form validate-form" method="POST" action="process.php" style="background-color: #8B0000;">
					<span class="login100-form-title p-b-43" style="color: white;">
						Login to continue
					</span>
						<?php 
		if(@$_GET['Empty']==true)
			{
			?>
			<div class="alert-light text-danger">
				<?php
				echo $_GET['Empty']
				?>
			</div>
			<?php
			}
	?>
	<?php 
		if(@$_GET['Invalid']==true)
			{
			?>
			<div class="alert-light text-danger">
				<?php
				echo $_GET['Invalid']
				?>
			</div>
			<?php
			}
	?>
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username">
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>


					<div class="container-login100-form-btn">
					<input type="submit" name="submit" value="Sign In">
					</div>
					
				</form>

				<div class="login100-more">
					<img src="images/jnh.png" style=" width: 90%; height: 95%;">
				</div>
			</div>
	</div>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>