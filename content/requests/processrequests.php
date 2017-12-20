<?php 

require_once 'db.php';

$response = $_GET['resp'];
$req_id = $_GET['rid'];

$update_request = mysqli_query($conn, "UPDATE requests SET req_status='$response' WHERE id='$req_id'");
if(!$update_request)
	echo 'Failed';
else
	echo 'Done&#x2713';



 ?>