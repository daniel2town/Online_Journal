<?php 
	
require_once 'db.php';


if(isset($_POST['user']) && isset($_POST['f_id']) && isset($_POST['col_id'])){
	$user = $_POST['user'];
	$fileID = $_POST['f_id'];
	$colID = $_POST['col_id'];

	// determin college by index
	if($colID == 1)
		$college = 'ic';
	if($colID == 2)
		$college = 'ce';
	if($colID == 3)
		$college = 'ced';
	if($colID == 4)
		$college = 'cgb';
	if($colID == 5)
		$college = 'ct';
	if($colID == 6)
		$college = 'cas';
	if($colID == 7)
		$college = 'saec';

	// Check if there is existing request for a certain file and if it is accepted
	$result = mysqli_query($conn, "SELECT * from requests where req_user='$user' AND req_file_id='$fileID' AND req_file_college='$college' AND req_status='accept'");

	if(mysqli_num_rows($result) != 0){
		// If there is result
		echo 'true';
		// return true;
	}else{ // If there is no resut
		echo 'false';
		// return false;
	}
}



 ?>