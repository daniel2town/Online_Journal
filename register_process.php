<?php 

	require 'include/db.php';

	if(!$conn){
		echo "failed to connect to database!";
	}

	if(isset($_POST['submit_newacc'])){

		$new_username = mysqli_escape_string($conn, $_POST['create_user']);
		$new_password = mysqli_escape_string($conn, $_POST['create_pass'] ); 
		$new_fname = mysqli_escape_string($conn, $_POST['create_firstname']); 
		$new_mname = mysqli_escape_string($conn, $_POST['create_middlename']); 
		$new_lname = mysqli_escape_string($conn, $_POST['create_lastname']);
		$new_college = strtolower(mysqli_escape_string($conn, $_POST['create_college']));


		$acc_query = "INSERT INTO pendingacct (firstname, lastname, middlename, username, password, college, acct_status) VALUES ('$new_fname', '$new_lname', '$new_mname', '$new_username', '$new_password', '$new_college', 'pending')";

		$exec_query = mysqli_query($conn, $acc_query);
		if(!$exec_query)
			mysqli_error($conn);
		else
			echo "<script>alert('Account created. Waiting for approval from the admin.');</script>";
			echo '<META http-equiv="refresh" content="0;URL=index.php">';
	

	}

 ?>