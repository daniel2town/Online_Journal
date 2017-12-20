<?php 

	//Connect to the server and select database
	$conn = mysqli_connect("localhost", "root", "");
	mysqli_select_db($conn, "journal");

	if(!$conn)
	{
		die("Connection failed: ".mysqli_connect_error());
	}

?>