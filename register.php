<?php 

	include 'register_process.php';

 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>

	  <!-- Bootstrap Core CSS/ custom css -->
  <link href="content/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="content/css/style.css">
  <link rel="stylesheet" type="text/css" href="content/css/filestyle.css">

  <style type="text/css">
  body{
  	background-image: url("img/background.jpg");
  	background-position: center center;
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: cover;
  }
  	.center-page{
  		color: rgb(182, 182, 182);
  		display: block !important;
  		background-color: rgba(0, 0, 0, 0.60);
  		box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
  		padding: 10px;
  		width: 300px;
  		margin-top: 5%;
  		margin-left: 38%;
  	}

    @media screen and (max-width: 1920px) {
      .center-page {
        color: rgb(182, 182, 182);
        display: block !important;
        background-color: rgba(0, 0, 0, 0.60);
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        padding: 10px;
        width: 300px;
        margin-top: 5%;
        margin-left: 39%;
      }
}

  	.center-page input[type="text"], input[type="password"]{
  		margin-bottom: 5px;
  		width: 80%;
      color: #FFF;
  	}
  	h1{
  		color: #FFF;
  	}
  	select{
  		color: #000;
  	}
    .reg-group{
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
      background-color: rgba(255, 255, 255, 0.1);
      border-radius: 2px;
      border: none;
      font-size: 15px;
    }

  </style>
</head>
<body><br><br>
<br>
<div class="center-page">
          <form method="POST">
          <center><h1>Register</h1><br>
            <label for="newusername">Username</label>
            <br>
            <input class="reg-group" type="text" name="create_user" id="newusername" required>  
            <br>
            <label for="newpass">Password</label> 
            <br>
            <input class="reg-group" type="password" name="create_pass" id="newpass" required>  
      			<br>
            <label for="fname">First Name</label> 
            <br>
            <input class="reg-group" type="text" name="create_firstname" id="fname" required>
            <br>
            <label for="lname">Last Name</label> 
            <br>
            <input class="reg-group" type="text" name="create_lastname" id="lname" required>
            <br>
            <label for="mname">Middle Name</label> 
            <br>
            <input class="reg-group" type="text" name="create_middlename" id="mname" required>
            <br>
            <br>
            <select name="create_college" required>
              <option value="">Select College</option>
              <option value="ic">Institute of Computing (IC)</option>
              <option value="ce">College of Engineering (CE)</option>
              <option value="cgb">College of Governance and Business (CGB)</option>
              <option value="cas">College of Arts and Sciences (CAS)</option>
              <option value="ct">College of Technology (CT)</option>
              <option value="ced">College of Education (CED)</option>
              <option value="saec">School of Applied Economics (SAEC)</option>
            </select>
            <br>
            <br>
            <button type="submit" class="btn btn-default accsubmit"><a href="index.php" style="text-decoration: none; color: #000;">Back</a></button>
            <button type="submit" name="submit_newacc" class="btn btn-info accsubmit" style="display: inline-block;">Register</button> 
            <br><br>
            </center>        
          </form>
          </div>
 </center>


<!-- Modal Account End -->

</body>
</html>

             <!-- <select name="create_accType" required>
              <option value="">Account Type</option>
              <option value="Admin">Admin</option>
              <option value="User">User</option>
            </select> -->

