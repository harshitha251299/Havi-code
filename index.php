<?php include("server.php") ?>
<?php 

if(isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['username']);
	header("location: login.php");

}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>
<body>
	<h1> WELCOME TO HOME PAGE</h1>
	<?php if(isset($_SESSION['success'])) : ?>
		<div>
			<h3>
              <?php   echo $_SESSION['success'];
              unset($_SESSION['success']); ?>
			</h3>
		</div>
<?php endif ?>


<?php if(isset($_SESSION['username'])) : ?>

	<h3>WelCome <strong><?php echo $_SESSION['username'] ?> </strong></h3>
     
     <form action="index.php" method="post">
			
			<div>
				<label for="data">
				Enter Data : </label>
				<input type="text" name="data"  required>
			</div>
			<button type="submit" name="update_data"> Update Data </button>
           

		</form>

	<button><a href="index.php?logout='1'"> Log Out</a></button>
<?php endif ?>
</body>
</html>