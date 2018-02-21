<?php 
session_start();
include 'sessionChecker/sessionChecker.php'; 
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

<!-- START PAGE SOURCE -->
<div id="shell">
  <div id="header">
     <h1 id="useplogo"></h1>
     <h1 id="logo"><a href="index.php"></a></h1>
    <div id="navigation">
      <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a class="active" href="about.php">ABOUT</a></li>
        <!-- <li><a href="#">JOURNALS</a></li> -->
        <li><a href="contact.php">CONTACT</a></li>
        
        <div class="dropdown">
			<li><a href="#" onclick="myFunction()" class="dropbtn">Hi, <?php echo $login_session; ?></a></li>
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
    <center>
    	 <h1>About Online Journal</h1>
    	 <br><br>
         <p>Online Journal is an online site for the (USeP) University of Southeastern Philippines' collection of journal entries.</p>
         <p>These are provided by each of the seven colleges of the university for students to view or download to help aid their academic endeavors.</p>
         <br><br>
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
</html>