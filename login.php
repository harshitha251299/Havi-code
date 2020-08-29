<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>

	<div class="container">
		<div class="header">
			<h2>Login</h2>
			
		</div>
		<form action="login.php" method="post">
			<?php include("error.php") ?>
			
			<div>
				<label for="Username">
				Username : </label>
				<input type="text" name="username"  required>
			</div>
			
			<div>
				<label for="password">
				Password : </label>
				<input type="text" name="password_2"  required>
			</div>

			<button type="submit" name="log_in"> Log In </button>
            <p>Not a user<a href="registration.php">Sign Up</a></p>

		</form>
	</div>

</body>
</html>