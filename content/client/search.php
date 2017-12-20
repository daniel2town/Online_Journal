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
<link rel="stylesheet" href="css/buttons-style.css" />
<!--[if IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
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

</head>
<body>
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
    <div id="sub-navigation">
      <ul>
        <li><a href="#ic-header">IC</a></li>
        <li><a href="#ce-header">CE</a></li>
        <li><a href="#ced-header">CED</a></li>
        <li><a href="#cgb-header">CGB</a></li>
        <li><a href="#ct-header">CT</a></li>
        <li><a href="#cas-header">CAS</a></li>
        <li><a href="#saec-header">SAEC</a></li>
      </ul>
      <div id="search">
        <form accept-charset="utf-8">
          <label for="search-field">SEARCH</label>
          <input type="text" name="search_field" placeholder="Enter search here." id="search-field" class="blink search-field"  />
          <input type="submit" name="searchsubmit" value="GO!" class="search-button" />
        </form>
      </div>
    </div>
  </div>
  <div id="main">
    <div id="content">

<!-- ==================================== Body ================================================= -->

<div class="box">
        <div class="head">
          <h2 id="ic-header">SEARCH RESULTS</h2>
          <!-- <p class="text-right"><a href="#">See all</a></p> -->
        </div>
<br>
    <?php include 'queries/searchprocess.php'; ?>

        <div class="cl">&nbsp;</div>
</div>

<div class="backToHome" style="text-align: center"><a href="index.php">Go Back to Home</a></div>


<!-- =========================================================================================== -->

     </div>
    </div>
  <div id="footer">
    <p class="lf">Copyright &copy; 2017 <a href="#">EyeSee</a> - All Rights Reserved</p>
    <p class="rf">Created by <a href="#">Tan & DD</a></p>
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
    <iframe id="previewFrame" src="" frameborder="0" class="noprint" >
      <!-- <img src="images/icwm.png" class="wm"> -->
    </iframe>
    
  </div>
</div>


<!-- END PAGE SOURCE -->
</body>
<!-- Scripts -->
<!-- JQuery Library -->
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<!-- General Page Animations -->
<script type="text/javascript" src="js/jquery-func.js"></script> 
<!-- Modal Trigger and Functions -->
<script type="text/javascript" src="js/modal.js"></script>
</html>