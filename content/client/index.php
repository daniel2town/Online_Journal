<?php 
session_start();

if(!isset($_SESSION['user_type'])){
	header("Location: ../../login.php");
}

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Online Journal</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/modal.css" type="text/css" />
<link rel="stylesheet" href="css/buttons-style.css" />
<style>
.dropbtn {
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    margin-top: 35px;
    margin-left: 45px;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}
.dropdown-content a:hover {
	background-color: #f1f1f1;
	color: #d01a20;
}
.show {display:block;}
</style>
<!--[if IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
</head>
<body>
<h2 id="tops"></h2>

<h3 style="z-index:300;position: fixed; top:90%; left: 90%; color: #FFF"><a class="page-scroll" href="#tops">Back to Top</a></h3>

<!-- START PAGE SOURCE -->
<div id="shell">
  <div id="header">
     <h1 id="useplogo"></h1>
     <h1 id="logo"><a href="index.php"></a></h1>
    <div id="navigation">
      <ul>
        <li><a class="active" href="#">HOME</a></li>
        <li><a href="#">ABOUT</a></li>
        <!-- <li><a href="#">JOURNALS</a></li> -->
        <li><a href="#">CONTACT</a></li>
        
        <div class="dropdown">
			<li><a href="#" onclick="myFunction()" class="dropbtn">Hi, <?php echo $_SESSION['login_admin']; ?></a></li>
				<div id="myDropdown" class="dropdown-content">
				    <a href="../../logout.php">Logout</a>
			  	</div>
		</div>
      </ul>
    </div>

    <script>
		/* When the user clicks on the button, 
		toggle between hiding and showing the dropdown content */
		function myFunction() {
		    document.getElementById("myDropdown").classList.toggle("show");
		}

		// Close the dropdown if the user clicks outside of it
		window.onclick = function(event) {
		  if (!event.target.matches('.dropbtn')) {

		    var dropdowns = document.getElementsByClassName("dropdown-content");
		    var i;
		    for (i = 0; i < dropdowns.length; i++) {
		      var openDropdown = dropdowns[i];
		      if (openDropdown.classList.contains('show')) {
		        openDropdown.classList.remove('show');
		      }
		    }
		  }
		}
	</script>

    <div id="sub-navigation" class="navbar-custom navbar-fixed-top">
      <ul>
        <li><a class="page-scroll" href="#ic-header">IC</a></li>
        <li><a class="page-scroll" href="#ce-header">CE</a></li>
        <li><a class="page-scroll" href="#ced-header">CED</a></li>
        <li><a class="page-scroll" href="#cgb-header">CGB</a></li>
        <li><a class="page-scroll" href="#ct-header">CT</a></li>
        <li><a class="page-scroll" href="#cas-header">CAS</a></li>
        <li><a class="page-scroll" href="#saec-header">SAEC</a></li>
      </ul>
      <div id="search">
        <form action="search.php" method="GET" accept-charset="utf-8">
          <label for="search-field">SEARCH</label>
          <input type="text" name="search_field" placeholder="Enter search here." value="" id="search-field" class="blink search-field"  />
          <input type="submit" name="searchsubmit" value="GO!" class="search-button" />
        </form>
      </div>
    </div>
  </div>
  <br><br>
  <div id="main">
    <div id="content">
<!-- =============================== IC ============================================================ -->
      <div class="box" style="overflow: hidden;">
        <div class="head">
          <h2 id="ic-header">INSTITUTE OF COMPUTING</h2>
          <!-- <p class="text-right"><a href="#">See All</a></p> --><br>
        </div>

		<?php 
			include 'queries/geticjournals.php'; 
			function request($user, $id, $status){
	          	$query = "SELECT req_status from requests WHERE req_user='$user', req_file_id='$id'";
	          	$run = mysqli_query($conn, $query);
	          	if(!$run){
	          		die('Error: '. mysqli_error($conn));
	          	}
	        }

			$counter = 0;
			$collegeID = 1;
			while($row = mysqli_fetch_array($result_ic)){ 
				$counter++;
			?>
			
			<?php if($counter == 6){ ?>
					<div class="movie last">
			<?php $counter = 0; }else{ ?>
					<div class="movie">
			<?php } ?>
	          <form method="POST" action="../download.php">
	          <div class="movie-image">
	          	<span class="play">
	          		<input name="college" type="hidden" class="collegeID" value="<?php echo $collegeID; ?>">
	          		<input name="id" type="hidden" class="journalID" value="<?php echo $row['id']; ?>">
	          		<input name="user" type="hidden" class="journalID" value="<?php echo $_SESSION['login_admin']; ?>">
	          		<input name="typ" type="hidden" class="journalID" value="request">
	          		<input type="hidden" class="jtitle" value="<?php echo $row['name']; ?>">
	          	  <span class="name">
	          	  	<?php echo $row['name'].
	          	  		   "<p class='smallfont'>Views: ".$row['views']."</p><br>"; ?>
	          	  </span>
	          	</span>
	          	<a><img src="../<?php echo $row['cover']; ?>" alt="IMAGES" /></a> 
	          </div>
	          <div class="rating">
	          	<?php 

	          		$userr = $_SESSION['login_admin'];
	          		$jidd = $row['id'];
	          
	          		$querry = mysqli_query($conn, "SELECT * FROM requests where req_user = '$userr' AND req_file_id = $jidd AND req_file_college = 'ic' AND req_status = 'accept'");
	          		$result = mysqli_fetch_array($querry);
	          		$rowCount = mysqli_num_rows($querry);
	          			if($rowCount == 1){
	          				echo '<center><button class="download-btn" type="submit" name="directdl">Download</button></center>';
	          			}else{
	          				echo '<center><button class="download-btn" type="submit" name="request">Request</button></center>';
	          			}
	          		
	          	 ?>
	          </div>
	        </div>
	        </form>
		<?php } ?>

        <div class="cl">&nbsp;</div>
      </div>

      	
<!-- ================================= CE ========================================================== -->
      <div class="box">
        <div class="head">
          <h2 id="ce-header">COLLEGE OF ENGINEERING</h2>
          <!-- <p class="text-right"><a href="#">See all</a></p> --><br>
        </div>
        
        <?php 
			include 'queries/geticjournals.php'; 

			$counter = 0;
			$collegeID = 2;
			while($row = mysqli_fetch_array($result_ce)){ 
				$counter++;
			?>
			
			<?php if($counter == 6){ ?>
					<div class="movie last">
			<?php $counter = 0; }else{ ?>
					<div class="movie">
			<?php } ?>
	         <form method="POST" action="../download.php">
	          <div class="movie-image">
	          	<span class="play">
	          		<input name="college" type="hidden" class="collegeID" value="<?php echo $collegeID; ?>">
	          		<input name="id" type="hidden" class="journalID" value="<?php echo $row['id']; ?>">
	          		<input name="user" type="hidden" class="journalID" value="<?php echo $_SESSION['login_admin']; ?>">
	          		<input name="typ" type="hidden" class="journalID" value="request">
	          		<input type="hidden" class="jtitle" value="<?php echo $row['name']; ?>">
	          	  <span class="name">
	          	  	<?php echo $row['name'].
	          	  		   "<p class='smallfont'>Views: ".$row['views']."</p><br>"; ?>
	          	  </span>
	          	</span>
	          	<a><img src="../<?php echo $row['cover']; ?>" alt="IMAGES" /></a> 
	          </div>
	          <div class="rating">
	          <?php 

	          		$userr = $_SESSION['login_admin'];
	          		$jidd = $row['id'];
	          
	          		$querry = mysqli_query($conn, "SELECT * FROM requests where req_user = '$userr' AND req_file_id = $jidd AND req_file_college = 'ce' AND req_status = 'accept'");
	          		$result = mysqli_fetch_array($querry);
	          		$rowCount = mysqli_num_rows($querry);
	          			if($rowCount == 1){
	          				echo '<center><button class="download-btn" type="submit" name="directdl">Download</button></center>';
	          			}else{
	          				echo '<center><button class="download-btn" type="submit" name="request">Request</button></center>';
	          			}
	          		
	          	 ?>
	          </div>
	        </div>
	        </form>
		<?php } ?>

        <div class="cl">&nbsp;</div>
      </div>
<!-- ================================== CED ========================================================= -->
      <div class="box">
        <div class="head">
          <h2 id="ced-header">COLLEGE OF EDUCATION</h2>
          <!-- <p class="text-right"><a href="#">See all</a></p> --><br>
        </div>
        
        <?php 
			include 'queries/geticjournals.php'; 
			$counter = 0;
			$collegeID = 3;
			while($row = mysqli_fetch_array($result_ced)){ 
				$counter++;
			?>
			
			<?php if($counter == 6){ ?>
					<div class="movie last">
			<?php $counter = 0; }else{ ?>
					<div class="movie">
			<?php } ?>
	          <form method="POST" action="../download.php">
	          <div class="movie-image">
	          	<span class="play">
	          		<input name="college" type="hidden" class="collegeID" value="<?php echo $collegeID; ?>">
	          		<input name="id" type="hidden" class="journalID" value="<?php echo $row['id']; ?>">
	          		<input name="user" type="hidden" class="journalID" value="<?php echo $_SESSION['login_admin']; ?>">
	          		<input name="typ" type="hidden" class="journalID" value="request">
	          		<input type="hidden" class="jtitle" value="<?php echo $row['name']; ?>">
	          	  <span class="name">
	          	  	<?php echo $row['name'].
	          	  		   "<p class='smallfont'>Views: ".$row['views']."</p><br>"; ?>
	          	  </span>
	          	</span>
	          	<a><img src="../<?php echo $row['cover']; ?>" alt="IMAGES" /></a> 
	          </div>
	          <div class="rating">
	          <?php 

	          		$userr = $_SESSION['login_admin'];
	          		$jidd = $row['id'];
	          
	          		$querry = mysqli_query($conn, "SELECT * FROM requests where req_user = '$userr' AND req_file_id = $jidd AND req_file_college = 'ced' AND req_status = 'accept'");
	          		$result = mysqli_fetch_array($querry);
	          		$rowCount = mysqli_num_rows($querry);
	          			if($rowCount == 1){
	          				echo '<center><button class="download-btn" type="submit" name="directdl">Download</button></center>';
	          			}else{
	          				echo '<center><button class="download-btn" type="submit" name="request">Request</button></center>';
	          			}
	          		
	          	 ?>
	          </div>
	        </div>
	        </form>
		<?php } ?>
        <div class="cl">&nbsp;</div>
      </div>
<!-- ================================ CGB =========================================================== -->
      <div class="box">
        <div class="head">
          <h2 id="cgb-header">COLLEGE OF GOVERNANCE, BUSINESS AND ECONOMICS</h2>
          <!-- <p class="text-right"><a href="#">See all</a></p> --><br>
        </div>

        <?php 
			include 'queries/geticjournals.php'; 
			$counter = 0;
			$collegeID = 4;
			while($row = mysqli_fetch_array($result_cgb)){ 
				$counter++;
			?>
			
			<?php if($counter == 6){ ?>
					<div class="movie last">
			<?php $counter = 0; }else{ ?>
					<div class="movie">
			<?php } ?>
	          <form method="POST" action="../download.php">
	          <div class="movie-image">
	          	<span class="play">
	          		<input name="college" type="hidden" class="collegeID" value="<?php echo $collegeID; ?>">
	          		<input name="id" type="hidden" class="journalID" value="<?php echo $row['id']; ?>">
	          		<input name="user" type="hidden" class="journalID" value="<?php echo $_SESSION['login_admin']; ?>">
	          		<input name="typ" type="hidden" class="journalID" value="request">
	          		<input type="hidden" class="jtitle" value="<?php echo $row['name']; ?>">
	          	  <span class="name">
	          	  	<?php echo $row['name'].
	          	  		   "<p class='smallfont'>Views: ".$row['views']."</p><br>"; ?>
	          	  </span>
	          	</span>
	          	<a><img src="../<?php echo $row['cover']; ?>" alt="IMAGES" /></a> 
	          </div>
	          <div class="rating">
	          <?php 

	          		$userr = $_SESSION['login_admin'];
	          		$jidd = $row['id'];
	          
	          		$querry = mysqli_query($conn, "SELECT * FROM requests where req_user = '$userr' AND req_file_id = $jidd AND req_file_college = 'cgb' AND req_status = 'accept'");
	          		$result = mysqli_fetch_array($querry);
	          		$rowCount = mysqli_num_rows($querry);
	          			if($rowCount == 1){
	          				echo '<center><button class="download-btn" type="submit" name="directdl">Download</button></center>';
	          			}else{
	          				echo '<center><button class="download-btn" type="submit" name="request">Request</button></center>';
	          			}
	          		
	          	 ?>
	          </div>
	        </div>
	        </form>
		<?php } ?>
        
        <div class="cl">&nbsp;</div>
      </div>
<!-- =============================== CT ============================================================ -->
      <div class="box">
        <div class="head">
          <h2 id="ct-header">COLLEGE OF TECHNOLOGY</h2>
          <!-- <p class="text-right"><a href="#">See all</a></p> --><br>
        </div>

        <?php 
			include 'queries/geticjournals.php'; 
			$counter = 0;
			$collegeID = 5;
			while($row = mysqli_fetch_array($result_ct)){ 
				$counter++;
			?>
			
			<?php if($counter == 6){ ?>
					<div class="movie last">
			<?php $counter = 0; }else{ ?>
					<div class="movie">
			<?php } ?>
	          <form method="POST" action="../download.php">
	          <div class="movie-image">
	          	<span class="play">
	          		<input name="college" type="hidden" class="collegeID" value="<?php echo $collegeID; ?>">
	          		<input name="id" type="hidden" class="journalID" value="<?php echo $row['id']; ?>">
	          		<input name="user" type="hidden" class="journalID" value="<?php echo $_SESSION['login_admin']; ?>">
	          		<input name="typ" type="hidden" class="journalID" value="request">
	          		<input type="hidden" class="jtitle" value="<?php echo $row['name']; ?>">
	          	  <span class="name">
	          	  	<?php echo $row['name'].
	          	  		   "<p class='smallfont'>Views: ".$row['views']."</p><br>"; ?>
	          	  </span>
	          	</span>
	          	<a><img src="../<?php echo $row['cover']; ?>" alt="IMAGES" /></a> 
	          </div>
	          <div class="rating">
	          <?php 

	          		$userr = $_SESSION['login_admin'];
	          		$jidd = $row['id'];
	          
	          		$querry = mysqli_query($conn, "SELECT * FROM requests where req_user = '$userr' AND req_file_id = $jidd AND req_file_college = 'ct' AND req_status = 'accept'");
	          		$result = mysqli_fetch_array($querry);
	          		$rowCount = mysqli_num_rows($querry);
	          			if($rowCount == 1){
	          				echo '<center><button class="download-btn" type="submit" name="directdl">Download</button></center>';
	          			}else{
	          				echo '<center><button class="download-btn" type="submit" name="request">Request</button></center>';
	          			}
	          		
	          	 ?>
	          </div>
	        </div>
	        </form>
		<?php } ?>
        
        <div class="cl">&nbsp;</div>
      </div>
<!-- ============================= CAS ============================================================== -->
      <div class="box">
        <div class="head">
          <h2 id="cas-header">COLLEGE OF ARTS AND SCIENCES</h2>
          <!-- <p class="text-right"><a href="#">See all</a></p> --><br>
        </div>

        <?php 
			include 'queries/geticjournals.php'; 
			$counter = 0;
			$collegeID = 6;
			while($row = mysqli_fetch_array($result_cas)){ 
				$counter++;
			?>
			
			<?php if($counter == 6){ ?>
					<div class="movie last">
			<?php $counter = 0; }else{ ?>
					<div class="movie">
			<?php } ?>
	          <form method="POST" action="../download.php">
	          <div class="movie-image">
	          	<span class="play">
	          		<input name="college" type="hidden" class="collegeID" value="<?php echo $collegeID; ?>">
	          		<input name="id" type="hidden" class="journalID" value="<?php echo $row['id']; ?>">
	          		<input name="user" type="hidden" class="journalID" value="<?php echo $_SESSION['login_admin']; ?>">
	          		<input name="typ" type="hidden" class="journalID" value="request">
	          		<input type="hidden" class="jtitle" value="<?php echo $row['name']; ?>">
	          	  <span class="name">
	          	  	<?php echo $row['name'].
	          	  		   "<p class='smallfont'>Views: ".$row['views']."</p><br>"; ?>
	          	  </span>
	          	</span>
	          	<a><img src="../<?php echo $row['cover']; ?>" alt="IMAGES" /></a> 
	          </div>
	          <div class="rating">
	          <?php 

	          		$userr = $_SESSION['login_admin'];
	          		$jidd = $row['id'];
	          
	          		$querry = mysqli_query($conn, "SELECT * FROM requests where req_user = '$userr' AND req_file_id = $jidd AND req_file_college = 'cas' AND req_status = 'accept'");
	          		$result = mysqli_fetch_array($querry);
	          		$rowCount = mysqli_num_rows($querry);
	          			if($rowCount == 1){
	          				echo '<center><button class="download-btn" type="submit" name="directdl">Download</button></center>';
	          			}else{
	          				echo '<center><button class="download-btn" type="submit" name="request">Request</button></center>';
	          			}
	          		
	          	 ?>
	          </div>
	        </div>
	        </form>
		<?php } ?>
        
        <div class="cl">&nbsp;</div>
      </div>
<!-- =============================== SAEc ============================================================ -->
      <div class="box">
        <div class="head">
          <h2 id="saec-header">SCHOOL OF APPLIED ECONOMICS</h2>
          <!-- <p class="text-right"><a href="#">See all</a></p> --><br>
        </div>

        <?php 
			include 'queries/geticjournals.php'; 
			$counter = 0;
			$collegeID = 7;
			while($row = mysqli_fetch_array($result_saec)){ 
				$counter++;
			?>
			
			<?php if($counter == 6){ ?>
					<div class="movie last">
			<?php $counter = 0; }else{ ?>
					<div class="movie">
			<?php } ?>
	          <form method="POST" action="../download.php">
	          <div class="movie-image">
	          	<span class="play">
	          		<input name="college" type="hidden" class="collegeID" value="<?php echo $collegeID; ?>">
	          		<input name="id" type="hidden" class="journalID" value="<?php echo $row['id']; ?>">
	          		<input name="user" type="hidden" class="journalID" value="<?php echo $_SESSION['login_admin']; ?>">
	          		<input name="typ" type="hidden" class="journalID" value="request">
	          		<input type="hidden" class="jtitle" value="<?php echo $row['name']; ?>">
	          	  <span class="name">
	          	  	<?php echo $row['name'].
	          	  		   "<p class='smallfont'>Views: ".$row['views']."</p><br>"; ?>
	          	  </span>
	          	</span>
	          	<a><img src="../<?php echo $row['cover']; ?>" alt="IMAGES" /></a> 
	          </div>
	          <div class="rating">
	          <?php 

	          		$userr = $_SESSION['login_admin'];
	          		$jidd = $row['id'];
	          
	          		$querry = mysqli_query($conn, "SELECT * FROM requests where req_user = '$userr' AND req_file_id = $jidd AND req_file_college = 'saec' AND req_status = 'accept'");
	          		$result = mysqli_fetch_array($querry);
	          		$rowCount = mysqli_num_rows($querry);
	          			if($rowCount == 1){
	          				echo '<center><button class="download-btn" type="submit" name="directdl">Download</button></center>';
	          			}else{
	          				echo '<center><button class="download-btn" type="submit" name="request">Request</button></center>';
	          			}
	          		
	          	 ?>
	          </div>
	        </div>
	        </form>
		<?php } ?>
        
        <div class="cl">&nbsp;</div>
      </div>
<!-- =========================================================================================== -->
     </div>
    </div>
  <div id="footer">
    <p class="lf">Copyright &copy; 2017 <a href="#">EyeSee</a> - All Rights Reserved</p>
    <!-- <p class="rf">Created by <a href="#">Tan & DD</a></p> -->
    <div style="clear:both;"></div>
  </div>
</div>

<!-- ============================== Modal (Preview) ============================================ -->
<div id="openModal" class="modalDialog">
	<div>
		<a title="Close" class="close">X</a>
		<h2 id="journalTitle">Journal Title</h2>
		<p id="text"></p>
		<div class="wm"></div>
		<iframe id="previewFrame" src="" frameborder="0" class="noprint" ></iframe>	
	</div>
</div>


<!-- END PAGE SOURCE -->
</body>
<!-- Scripts -->
<!-- JQuery Library -->
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<!--<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script> Jquery Easing Plugin -->
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<!-- General Page Animations -->
<script type="text/javascript" src="js/jquery-func.js"></script> 
<!-- Modal Trigger and Functions -->
<script type="text/javascript" src="js/modal.js"></script>
<script>

	$(document).ready(function(){
	// jQuery to collapse the navbar on scroll
	function collapseNavbar() {
	    if ($(".navbar").offset().top > 50) {
	        $(".navbar-fixed-top").addClass("top-nav-collapse");
	    } else {
	        $(".navbar-fixed-top").removeClass("top-nav-collapse");
	    }
	}

	// jQuery for page scrolling feature - requires jQuery Easing plugin
	$(function() {
	    $('a.page-scroll').bind('click', function(event) {
	        var $anchor = $(this);
	        $('html, body').stop().animate({
	            scrollTop: $($anchor.attr('href')).offset().top
	        }, 1500, 'easeInOutExpo');
	        event.preventDefault();
	    });
	});

	$(".movie").mouseenter(function(){
		$(this).find(".download-btn").show("fast", function(){

		});
		$(this).find(".download-btn").addClass("download-btn-after");

		$(this).mouseleave(function(){
			$(this).find(".download-btn-after").hide("fast", function(){
				$(this).removeClass("download-btn-after");
				$(this).css("display", "none");
			});
			
		});
		
	});

	})
</script>
</html>