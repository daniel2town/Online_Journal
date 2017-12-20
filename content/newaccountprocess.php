<?php 

	require '../include/db.php';

	if(!$conn){
		echo "failed to connect to database!";
	}

	if(isset($_POST['confirm_newacc'])){

		$new_username = mysqli_escape_string($conn, $_POST['create_user']);
		$new_password = mysqli_escape_string($conn, $_POST['create_pass'] ); 
		$new_fname = mysqli_escape_string($conn, $_POST['create_firstname']); 
		$new_mname = mysqli_escape_string($conn, $_POST['create_middlename']); 
		$new_lname = mysqli_escape_string($conn, $_POST['create_lastname']);
		$new_college = strtolower(mysqli_escape_string($conn, $_POST['create_college']));
		$new_acctype = mysqli_escape_string($conn, $_POST['create_accType']);


		$acc_query = "INSERT INTO admin (firstname, lastname, middlename, username, password, account_type, college) VALUES ('$new_fname', '$new_lname', '$new_mname', '$new_username', '$new_password', '$new_acctype', '$new_college')";


		$exec_query = mysqli_query($conn, $acc_query);
		if(!$exec_query)
			mysqli_error($conn);
		else
			$exec_query = mysqli_query($conn, "DELETE FROM pendingacct WHERE username='$new_username' AND password='$new_password' AND firstname='$new_fname' AND lastname='$new_lname'");
			echo "<script>alert('Account created!');</script>";
			// echo '<META http-equiv="refresh" content="0;URL=index.php">';
	

	}



	if(isset($_POST['decline_newacc'])){

		$new_username = mysqli_escape_string($conn, $_POST['create_user']);
		$new_password = mysqli_escape_string($conn, $_POST['create_pass'] ); 
		$new_fname = mysqli_escape_string($conn, $_POST['create_firstname']); 
		$new_mname = mysqli_escape_string($conn, $_POST['create_middlename']); 
		$new_lname = mysqli_escape_string($conn, $_POST['create_lastname']);
		$new_college = strtolower(mysqli_escape_string($conn, $_POST['create_college']));
		$new_acctype = mysqli_escape_string($conn, $_POST['create_accType']);


		
		

		$exec_query = mysqli_query($conn, "DELETE FROM pendingacct WHERE username='$new_username' AND password='$new_password' AND firstname='$new_fname' AND lastname='$new_lname'");
		if(!$exec_query)
			mysqli_error($conn);
		else
			echo "<script>alert('Account deleted!');</script>";
			echo '<META http-equiv="refresh" content="0;URL=index.php">';
	

	}

	if(isset($_POST['delete_acc'])){

		$new_username = mysqli_escape_string($conn, $_POST['create_user']);
		$new_password = mysqli_escape_string($conn, $_POST['create_pass'] ); 
		$new_fname = mysqli_escape_string($conn, $_POST['create_firstname']); 
		$new_mname = mysqli_escape_string($conn, $_POST['create_middlename']); 
		$new_lname = mysqli_escape_string($conn, $_POST['create_lastname']);
		$new_college = strtolower(mysqli_escape_string($conn, $_POST['create_college']));


		
		

		$exec_query = mysqli_query($conn, "DELETE FROM admin WHERE username='$new_username' AND password='$new_password' AND firstname='$new_fname' AND lastname='$new_lname'");
		if(!$exec_query)
			mysqli_error($conn);
		else
			echo "<script>alert('Account deleted!');</script>";
			echo '<META http-equiv="refresh" content="0;URL=index.php">';
	

	}

	if(isset($_POST['status_acc'])){

		$new_username = mysqli_escape_string($conn, $_POST['create_user']);
		$new_password = mysqli_escape_string($conn, $_POST['create_pass'] ); 
		$new_fname = mysqli_escape_string($conn, $_POST['create_firstname']); 
		$new_mname = mysqli_escape_string($conn, $_POST['create_middlename']); 
		$new_lname = mysqli_escape_string($conn, $_POST['create_lastname']);
		$new_college = strtolower(mysqli_escape_string($conn, $_POST['create_college']));


		$acc_query = "INSERT INTO pendingacct (firstname, lastname, middlename, username, password, college, acct_status) VALUES ('$new_fname', '$new_lname', '$new_mname', '$new_username', '$new_password', '$new_college', 'Deactivated/Pending')";


		$exec_query = mysqli_query($conn, $acc_query);
		if(!$exec_query)
			mysqli_error($conn);
		else
			$exec_query = mysqli_query($conn, "DELETE FROM admin WHERE username='$new_username' AND password='$new_password' AND firstname='$new_fname' AND lastname='$new_lname'");
			echo "<script>alert('Account Deactivated');</script>";
			echo '<META http-equiv="refresh" content="0;URL=index.php">';
	

	}

 ?>