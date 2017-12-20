<?php 
	
	include 'include/db.php';
	session_start();

	$error = "";
	if (isset($_POST['submit']))
	{
		// Define $username
		$user= mysqli_escape_string($conn, $_POST['username']);
		// Define $password
		$pass= mysqli_escape_string($conn, $_POST['password']);
		// SQL query to fetch information of username and password
		$query = mysqli_query($conn, "SELECT * from admin where username='$user' AND password='$pass'");
		$result = mysqli_fetch_array($query);
		$rows = mysqli_num_rows($query);
		if ($rows == 1) {
			$_SESSION['login_admin']= $result['username']; // Initializing Session
			$_SESSION['user_type']= $result['account_type'];
			$_SESSION['college']= $result['college'];
			if($_SESSION['user_type'] == 'User'){
				// echo "<script> alert('".$_SESSION['user_type']."'); </script>";
				echo '<META http-equiv="refresh" content="0;URL=content/client/index.php">'; // Redirect to User page
				// header("Location: content/client/index.php");
				
			}else{
				// echo "<script> alert('".$_SESSION['user_type']."'); </script>";
				echo '<META http-equiv="refresh" content="0;URL=content/index.php">'; // Redirecting To index Page	
			}
			
		} 
		else 
		{
			 echo "<script> alert('404 account not found.'); </script>";
			 echo '<META http-equiv="refresh" content="0;URL=login.php">';
		}
		// mysqli_close($conn); // Closing Connection
	}

?>