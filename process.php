<?php 
	
	include 'include/db.php';
	session_start();

	function getCollegeIndex($colName){
		if($colName == 'IC' || $colName == 'ic')
			{ return 1; }
		if($colName == 'CE' || $colName == 'ce')
			{ return 2; }
		if($colName == 'CED' || $colName == 'ced')
			{ return 3; }
		if($colName == 'CGB' || $colName == 'cgb')
			{ return 4; }
		if($colName == 'CT' || $colName == 'ct')
			{ return 5; }
		if($colName == 'CAS' || $colName == 'cas')
			{ return 6; }
		if($colName == 'SAEC' || $colName == 'saec')
			{ return 7; }

	}

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
			$_SESSION['college_index'] = getCollegeIndex($result['college']);
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