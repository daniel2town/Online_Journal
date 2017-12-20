<?php 

	include 'db.php';

	if(isset($_GET["searchsubmit"])){

		$key = $_GET['search_field'];

		$colleges_array = array('cas', 'ce', 'ced', 'cgb', 'ct', 'ic', 'saec');

		$result_count = 0;

		echo '<span id="resCount">No. of Results: '.$result_count.'</span><br>';

			$query_search = "SELECT * from ic WHERE name LIKE '%$key%'";
			$query_search2 = "SELECT * from ce WHERE name LIKE '%$key%'";
			$query_search3 = "SELECT * from ced WHERE name LIKE '%$key%'";
			$query_search4 = "SELECT * from cgb WHERE name LIKE '%$key%'";
			$query_search5 = "SELECT * from ct WHERE name LIKE '%$key%'";
			$query_search6 = "SELECT * from cas WHERE name LIKE '%$key%'";
			$query_search7 = "SELECT * from saec WHERE name LIKE '%$key%'";


			$run_query = mysqli_query($conn, $query_search);

			while($row = mysqli_fetch_array($run_query)){

				$result_count += 1;

				$collegeID = 1;

				echo '<div class="movie">';
				echo '<div class="movie-image">
			              <span class="play">
			                <input type="hidden" class="collegeID" value="'.$collegeID.'">
			                <input type="hidden" class="journalID" value="'.$row["id"].'">
			                <input type="hidden" class="jtitle" value="'.$row["name"].'">
			                <span class="name">
			                  '.$row["name"].
			                       '<p class="smallfont">Views: '.$row["views"].'</p><br>
			                </span>
			              </span>
			              <a><img src="../'.$row["cover"].'" alt="IMAGE" /></a> 
			            </div>
			            <div class="rating">
			            </div>
			          </div>';
			}

			$run_query = mysqli_query($conn, $query_search2);

			while($row = mysqli_fetch_array($run_query)){

				$result_count += 1;

				$collegeID = 2;

				echo '<div class="movie">';
				echo '<div class="movie-image">
			              <span class="play">
			                <input type="hidden" class="collegeID" value="'.$collegeID.'">
			                <input type="hidden" class="journalID" value="'.$row["id"].'">
			                <input type="hidden" class="jtitle" value="'.$row["name"].'">
			                <span class="name">
			                  '.$row["name"].
			                       '<p class="smallfont">Views: '.$row["views"].'</p><br>
			                </span>
			              </span>
			              <a><img src="../'.$row["cover"].'" alt="IMAGE" /></a> 
			            </div>
			            <div class="rating">
			            </div>
			          </div>';
			}

			$run_query = mysqli_query($conn, $query_search3);

			while($row = mysqli_fetch_array($run_query)){

				$result_count += 1;

				$collegeID = 3;

				echo '<div class="movie">';
				echo '<div class="movie-image">
			              <span class="play">
			                <input type="hidden" class="collegeID" value="'.$collegeID.'">
			                <input type="hidden" class="journalID" value="'.$row["id"].'">
			                <input type="hidden" class="jtitle" value="'.$row["name"].'">
			                <span class="name">
			                  '.$row["name"].
			                       '<p class="smallfont">Views: '.$row["views"].'</p><br>
			                </span>
			              </span>
			              <a><img src="../'.$row["cover"].'" alt="IMAGE" /></a> 
			            </div>
			            <div class="rating">
			            </div>
			          </div>';
			}

			$run_query = mysqli_query($conn, $query_search4);

			while($row = mysqli_fetch_array($run_query)){

				$result_count += 1;

				$collegeID = 4;

				echo '<div class="movie">';
				echo '<div class="movie-image">
			              <span class="play">
			                <input type="hidden" class="collegeID" value="'.$collegeID.'">
			                <input type="hidden" class="journalID" value="'.$row["id"].'">
			                <input type="hidden" class="jtitle" value="'.$row["name"].'">
			                <span class="name">
			                  '.$row["name"].
			                       '<p class="smallfont">Views: '.$row["views"].'</p><br>
			                </span>
			              </span>
			              <a><img src="../'.$row["cover"].'" alt="IMAGE" /></a> 
			            </div>
			            <div class="rating">
			            </div>
			          </div>';
			}

			$run_query = mysqli_query($conn, $query_search5);

			while($row = mysqli_fetch_array($run_query)){

				$result_count += 1;

				$collegeID = 5;

				echo '<div class="movie">';
				echo '<div class="movie-image">
			              <span class="play">
			                <input type="hidden" class="collegeID" value="'.$collegeID.'">
			                <input type="hidden" class="journalID" value="'.$row["id"].'">
			                <input type="hidden" class="jtitle" value="'.$row["name"].'">
			                <span class="name">
			                  '.$row["name"].
			                       '<p class="smallfont">Views: '.$row["views"].'</p><br>
			                </span>
			              </span>
			              <a><img src="../'.$row["cover"].'" alt="IMAGE" /></a> 
			            </div>
			            <div class="rating">
			            </div>
			          </div>';
			}

			$run_query = mysqli_query($conn, $query_search6);

			while($row = mysqli_fetch_array($run_query)){

				$result_count += 1;

				$collegeID = 6;

				echo '<div class="movie">';
				echo '<div class="movie-image">
			              <span class="play">
			                <input type="hidden" class="collegeID" value="'.$collegeID.'">
			                <input type="hidden" class="journalID" value="'.$row["id"].'">
			                <input type="hidden" class="jtitle" value="'.$row["name"].'">
			                <span class="name">
			                  '.$row["name"].
			                       '<p class="smallfont">Views: '.$row["views"].'</p><br>
			                </span>
			              </span>
			              <a><img src="../'.$row["cover"].'" alt="IMAGE" /></a> 
			            </div>
			            <div class="rating">
			            </div>
			          </div>';
			}

			$run_query = mysqli_query($conn, $query_search7);

			while($row = mysqli_fetch_array($run_query)){

				$result_count += 1;

				$collegeID = 7;

				echo '<div class="movie">';
				echo '<div class="movie-image">
			              <span class="play">
			                <input type="hidden" class="collegeID" value="'.$collegeID.'">
			                <input type="hidden" class="journalID" value="'.$row["id"].'">
			                <input type="hidden" class="jtitle" value="'.$row["name"].'">
			                <span class="name">
			                  '.$row["name"].
			                       '<p class="smallfont">Views: '.$row["views"].'</p><br>
			                </span>
			              </span>
			              <a><img src="../'.$row["cover"].'" alt="IMAGE" /></a> 
			            </div>
			            <div class="rating">
			            </div>
			          </div>';
			}


			echo '<script>
					document.getElementById("resCount").innerHTML = "No. of Results: '.$result_count.'";
				</script>';

	}

 ?>