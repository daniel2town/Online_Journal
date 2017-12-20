<?php


// DELETE FROM IC
function deleteJournal( $del_col, $del_id){
	require '../include/db.php';

	$filequery = "SELECT * from $del_col WHERE id = '$del_id'";
	$run_query = mysqli_query($conn, $filequery);
	$result = mysqli_fetch_array($run_query);
	if(file_exists($result['path'])){
		unlink($result['path']);
	}else{
		echo 'File does not exist in Folder.';
	}
	
	$query = "DELETE FROM $del_col WHERE id = '$del_id'";
	$run_query = mysqli_query($conn, $query);
	if($query){
		echo"File successfully deleted!";
		// echo '<META http-equiv="refresh" content="0;URL=index.php">';
	}
}


	if(isset($_POST['college']) && isset($_POST['id'])){
		$tmpcollege = $_POST['college'];
		$del_id = $_POST['id'];

		// determin college by index
		if($tmpcollege == 1)
			$college = 'ic';
		if($tmpcollege == 2)
			$college = 'ce';
		if($tmpcollege == 3)
			$college = 'ced';
		if($tmpcollege == 4)
			$college = 'cgb';
		if($tmpcollege == 5)
			$college = 'ct';
		if($tmpcollege == 6)
			$college = 'cas';
		if($tmpcollege == 7)
			$college = 'saec';

		deleteJournal($college, $del_id);
		unset($_POST['college']);
		unset($_POST['id']);

	}else{
		echo "Delete error. File not found!";

	}

?>