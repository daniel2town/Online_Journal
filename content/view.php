<?php 

include '../include/db.php';


if(isset($_GET['view']) && isset($_GET['vid']) && isset($_GET['vcol'])){
	$tmpcollege = $_GET['vcol'];
	$vid = $_GET['vid'];

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

	$query = "UPDATE journal.$college SET views=views+1 WHERE id= '$vid'";
	$runupdate = mysqli_query($conn, $query);
	if(!$runupdate){ echo 'Error:'.mysqli_error($conn);}
	
	$res = mysqli_query($conn, "select path from $college where id='$vid'");
	if(!$res){
		echo "error: ". mysqli_error($conn); }
	$rows = mysqli_fetch_array($res);
	$path = $rows['path'];
	$new_path = 'journal-previews/'.$college.'/'.mt_rand().'.pdf';

	echo '<script>
    document.oncontextmenu = function() { 
        return false; 
    };
	</script>';

// new query to save preview path to db
// $new_query = mysqli_query($conn, "INSERT into $college (preview) VALUES ('$new_path') where id='$vid'");



header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="'.basename($path).'"');
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');
ob_clean();
flush();
readfile($path);

}

?>
