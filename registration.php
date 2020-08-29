<?php include("server.php") ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
</head>
<body>

	<div class="container">
		<div class="header">
			<h2>Register</h2>
			
		</div>
		<form action="registration.php" method="post">
			
			<?php include("error.php") ?>

			<div>
				<label for="Username">
				Username : </label>
				<input type="text" name="username" required>
			</div>
			<div>
				<label for="email">
				Email :</label>
				<input type="text" name="email" required>
			</div>
			
			<div>
				<label for="dob">
				Date Of Birth :</label>
				<input type="Date" name="dob" required>
			</div>
			<div>
				<label for="phoneNo">
				Phone Number :</label>
				<input type="text" name="phoneNo" required>
			</div>
			<div>
				<label for="place">
				Place :</label>
				<input type="text" name="place" required>
			</div>
			<div>
				<label for="gender">
				Place :</label>
<select name="formGender">
  <option value="">Select...</option>
  <option value="M">Male</option>
  <option value="F">Female</option>
</select>

			</div>
			<div>
				<label for="password">
				password : </label>
				<input type="password" name="password_1" required>
			</div>

			<div>
				<label for="password">
				Confirm password : </label>
				<input type="password" name="password_2" required>
			</div>

			<button type="submit" name="reg_user"> Sign Up </button>
            <p>Already a Login<a href="login.php">Log In</a></p>

		</form>
	</div>

</body>
</html>