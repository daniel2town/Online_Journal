<?php

	include_once 'db.php';
	session_start();// Starting Session

	// Storing Session
	$admin_check = $_SESSION['login_admin'];
	// SQL Query To Fetch auth
	$ses_sql= mysqli_query($conn, "select firstname from admin where username='$admin_check'");
	$row = mysqli_fetch_assoc($ses_sql);
	$login_session = $row['firstname'];
	if(!isset($login_session))
	{
		mysqli_close($conn); // Closing Connection
		header('Location: ../login.php'); // Redirecting To login page
	}

	if(isset($login_session) && $_SESSION['user_type'] == 'User' ){
		header('Location: ../content/client/index.php');
	}
?>