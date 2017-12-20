<?php 
	include '../include/db.php';


	if(isset($_POST['submit'])) 
  	{
  		$collegeName = $_POST['collegeName'];
	    $doc_name  = $_POST['doc_name'];

	    $file = $_FILES['file']['name'];
	    $tmp_name = $_FILES['file']['tmp_name'];
	    $cover = $_FILES['file2']['name'];
	    $tmp_name2 = $_FILES['file2']['tmp_name'];

	    if ($file && $doc_name) {
	      $location = "journals/$collegeName/".mt_rand()."_$file";
	      $location2 = "journalcovers/$collegeName/".mt_rand()."_$cover";
	      move_uploaded_file($tmp_name, $location);
	      move_uploaded_file($tmp_name2, $location2);
	      $query = mysqli_query($conn, "insert into $collegeName (name, path, cover, date_upload) values ('$doc_name', '$location', '$location2', CURDATE())");
	      if(!$query){
			echo"<script>alert('Upload Failed!');</script>";
			echo '<META http-equiv="refresh" content="0;URL=index.php">';
			}
		  else{
		  	echo"<script>alert('Upload Complete!');</script>";
			echo '<META http-equiv="refresh" content="0;URL=index.php">';
		  }
	      
	    }
	    else
	    {
	      echo"<script>alert('Please Select a File!');</script>";
	    }
  	}

?>