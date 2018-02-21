<?php 
	
// This is the download process
function downloadJournal($dl_col, $dl_id){
	require_once '../include/db.php';

	// $query = mysqli_query("select * from $dl_col");

	$res = mysqli_query($conn, "SELECT path from $dl_col where id='$dl_id'");
	if(!$res){
		echo "error: ". mysqli_error($conn); }
	$rows = mysqli_fetch_array($res);
	$path = $rows['path'];
	

	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="'.basename($path).'"');
	header('Content-Length: ' .filesize($path));
	ob_clean();
	flush();
	readfile($path);
	
}

// This is the request process 
function requestJournal ($reqType, $reqUser, $reqFid, $reqCol){
	require_once '../include/db.php';

	$bool_req = mysqli_query($conn, "SELECT * from requests where req_type='$reqType' AND req_user='$reqUser' AND req_file_id='$reqFid' AND req_file_college='$reqCol'");
	$run = mysqli_fetch_array($bool_req);
	$bool_req_count = mysqli_num_rows($bool_req);
	if($bool_req_count == 1){ // If there is already a request for the same file for download
		// echo '<script>alert("There is already a request");</script>';
		$req_query = mysqli_query($conn, "UPDATE requests SET req_type='$reqType', req_user='$reqUser', req_file_id='$reqFid', req_file_college='$reqCol', req_status='pending' ");
	}
	else{ // If there is no current request, create new request
		// echo '<script>alert("There is no current request for this file. ");</script>';
		$req_query = mysqli_query($conn, "INSERT into requests (req_type, req_user, req_file_id, req_file_college, req_status) 
			VALUES ('$reqType', '$reqUser', '$reqFid', '$reqCol', 'pending')");
		if(!$req_query)
			echo '<script>alert("Request Failed");</script>';
	}
		
	echo '<META http-equiv="refresh" content="0;URL=index.php">';
}

// +++++++++++++++++++++++++ QUERY REQUESTS +++++++++++++++++++++++++++++++++++++++++++
// REQUEST : ADMIN
// Get the college index and file id
if(isset($_POST['request']) && isset($_POST['college']) && isset($_POST['id'])){
	$tmpcollege = $_POST['college'];
	$dl_id = $_POST['id'];
	$user = $_POST['user'];
	$reqtype = $_POST['typ'] ;

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

	if(isset($_POST['typ']))
		$type = $_POST['typ'];

	if($type=='request'){
		requestJournal('download', $user, $dl_id, $college);
	}

	if($reqtype=='direct')
		downloadJournal($college, $dl_id);
}

// REQUEST : User/Client
// Get the college index and file id
if(isset($_GET['request']) && isset($_GET['college']) && isset($_GET['id'])){
	$tmpcollege = $_GET['college'];
	$dl_id = $_GET['id'];
	$user = $_GET['user'];
	$reqtype = $_GET['typ'] ;

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

	// if(isset($_GET['typ']))
	// 	$type = $_GET['typ'];

	if($reqtype=='request'){
		requestJournal('download', $user, $dl_id, $college);
	}

	if($reqtype=='direct')
		downloadJournal($college, $dl_id);
}


// +++++++++++++++++++++++++ DOWNLOAD +++++++++++++++++++++++++++++++++++++++++++_GET
// DOWNLOAD : Admin
if(isset($_GET['directdl']) && isset($_GET['college']) && isset($_GET['id'])){
	$tmpcollege = $_GET['college'];
	$id = $_GET['id'];
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

	downloadJournal($college, $id);
	// echo '<META http-equiv="refresh" content="0;URL=content/index.php">'; // Redirect to User page
}


// DOWNLOAD : User/Client
if(isset($_POST['directdl']) && isset($_POST['college']) && isset($_POST['id'])){
	$tmpcollege = $_POST['college'];
	$id = $_POST['id'];
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

	downloadJournal($college, $id);
}

// else{
// 	echo "Download error: ";
// 	echo $_POST['college'].' '.$_POST['id'];

// }

?>