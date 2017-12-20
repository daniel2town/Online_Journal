<?php 

	require 'db.php';
	$tmpcollege = $_GET['college'];
	$dl_id = $_GET['id'];

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


	// select journal by id and college
	$query = "SELECT * from ".$college." WHERE id = '".$dl_id."'";
	$run_query = mysqli_query($conn, $query);
	if(!$run_query){
		echo "Failed to load Journal";
		echo mysqli_error($conn);
	}
	
	while($result = mysqli_fetch_array($run_query)){
		$count = mysqli_num_rows($run_query);

		echo "<span class='maroon'>Title:</span> <span id='dltitle'> ".$result['name']."</span><br>";
		echo "<span class='maroon'>Upload Date:</span> <span id='dltitle'> ".$result['date_upload']."</span><br>";
		echo "<span class='maroon'>Views:</span> <span id='dltitle'> ".$result['views']."</span><br>";
		
	}
	


 ?>