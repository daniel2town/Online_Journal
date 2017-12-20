<?php 
	include 'process.php';

	if(isset($_SESSION['login_admin']))
	{
		header("Location: content/index.php");
	}

 ?>

<!DOCTYPE html>
<html>
<title>Online IC Journal</title>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">



</head>
<body>

<div class="box">
	<h1>EyeSee™</h1>
	<form action="process.php" method="POST">
		<div class="input-group">
			<input type="text" name="username" onblur="checkInput(this)" />
			<label>Username</label>
		</div>
		<div class="input-group">
			<input type="password" name="password" onblur="checkInput(this)" />
			<label>Password</label>
		</div>
		<input name="submit" type="submit" value="Login" />
		<span><?php echo $error; ?></span>
	</form>
	<small><a href="register.php" style="color: #FFF; text-decoration: none; margin-left: 10px;">Register</a>
</div>

<script src="js/auth.js"></script>
</body>


</html>