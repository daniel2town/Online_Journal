<?php 
	
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

function requestJournal ($reqType, $reqUser, $reqFid, $reqCol){
	require_once '../include/db.php';

	$req_query = mysqli_query($conn, "INSERT into requests (req_type, req_user, req_file_id, req_file_college, req_status) 
		VALUES ('$reqType', '$reqUser', '$reqFid', '$reqCol', 'pending')");
	if(!$req_query)
		echo 'Request Failed';

	echo '<META http-equiv="refresh" content="0;URL=index.php">';
}

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
// DOWNLOAD
if(isset($_POST['submitdownload'])){
	// echo '<script>alert("'.$_POST["college"].$_POST["id"].'"");</script>';
	downloadJournal($_POST['college'], $_POST['id']);
}

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