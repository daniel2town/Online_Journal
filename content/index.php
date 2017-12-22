<?php 

  include '../include/sessionChecker.php'; 
  include 'newaccountprocess.php';

?>

<!DOCTYPE html>
<html lang="en">

<head> 

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Online IC Journal</title>

  <!-- Bootstrap Core CSS/ custom css -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/filestyle.css">

  <!-- Custom Fonts -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="css/grayscale.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th {
        padding: 18px;
        text-align: center;
        border-bottom: 1px solid #ddd;
        color: black;
    }
    td {
        padding: 6px;
        text-align: center;
        border-bottom: 1px solid #ddd;
        color: black;
    }

    tr:hover {background-color:#f5f5f5;}
</style>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" >

<!-- Side Nav Notifications -->
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="noti-item-head">REQUESTS<span class="closebtn" onclick="closeNav()">x</span></a>
  <div id="reqcontainer">
  </div>
  <?php include 'requests/postrequests.php'; ?>
</div>

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="glyphicon glyphicon-home"></i> <span class="light">Online Journal</span>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#download">Journals</a>
                    </li>
                    
                    <li>
                      <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                    
                    <li>
                      <a class="page-scroll" onclick="openNav()" >Requests</a>
                    </li>
                    
                    <?php if($_SESSION['user_type'] == 'Superadmin') {
                    echo '<li>
                            <a id="account-trigger">Accounts</a>
                          </li>';
                      } ?>
                    <li><a style="text-transform:none">Hi, <?php echo $login_session; ?></a></li>
                    <li><a id="logout-trigger">Logout</a></li>
                </ul>        
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
        
    </nav>





    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <!--<h1 class="brand-heading">Institute of Computing</h1>
                        <p class="intro-text">University of Southeastern Philippines
                            <br></p>-->
							<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>	
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>About Online Journal</h2>
                <p>Online Journal is an online site for the (USeP) University of Southeastern Philippines' collection of journal entries.</p>
                <p>These are provided by each of the seven colleges of the university for students to view or download to help aid their academic endeavors.</p>
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section id="download" class="content-section text-center">
		<nav class="menu">
		  <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open" >
		  <label class="menu-open-button" for="menu-open"></label>
		  
		  <a class="menu-item1"></a>
		  <a class="menu-item2"></a>
		  <a class="menu-item3"></a>
		  <a class="menu-item4"></a>
		  <a class="menu-item5"></a>
		  <a class="menu-item6"></a>
		  <a class="menu-item7"></a>
		</nav>
    </section>


<?php include 'collegemodals/modals.php'; ?>


<input type="hidden" id="req_user" name="req_user" value="<?php echo $login_session; ?>">
<input type="hidden" id="user_type" name="user_type" value="<?php echo $_SESSION['user_type']; ?>">

<!-- Modal Account -->
  <div id="manageaccount" class="w3-modal" >
    <div class="w3-modal-content w3-animate-zoom w3-card-4 wide-width">
      <header class="w3-container w3-grey">
      <span class="w3-closebtn">&times;</span>
        <h4 class="modal-header-text">Accounts</h4>
      </header>
        <div class="w3-container modal-body">
         <!-- <button class="accordion">Add Account</button> -->

        <div class="add_account_div"><br>
         <div class="container">
              <div class="form-group">
                <select name="state" id="maxRows" class="form-control" style="width: 150px;">
                  <option value="5000">Show All</option>
                  <option value="10">10</option>
                  <option value="5">5</option>
                </select>
              </div>
              <h4>Pending Accounts</h4>
              <!-- <div class="form-group">
                <select name="state" id="maxRows" class="form-control" style="width: 150px;">
                  <option value="5000">Show All</option>
                  <option value="10">10</option>
                  <option value="5">5</option>
                </select>
              </div> -->
              <table id="mytable2" class="table table-bordered table-striped">
                <thead>
                  <tr>
                      <th><small>Username</th>
                      <th><small>Password</th>
                      <th><small>First Name</th>
                      <th><small>Last Name</th>
                      <th><small>Middle Name</th>
                      <th><small>College</th>
                      <th><small>Account Type</th>
                      <th><small>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                  $acctQuery = mysqli_query($conn, "SELECT * FROM pendingacct");
                  
                  while ($rows= mysqli_fetch_array($acctQuery)) { ?>
                   <form method="POST">
                     <tr>
                       <td><small><input type="hidden" name="create_user" value="<?php echo $rows['username']; ?>"><?php echo $rows['username']; ?></td>
                       <td><small><input type="hidden" name="create_pass" value="<?php echo $rows['password'] ?>"><?php echo $rows['password'] ?></td>
                       <td><small><input type="hidden" name="create_firstname" value="<?php echo $rows['firstname'];?>" ><?php echo $rows['firstname']; ?></td>
                        <td><small><input type="hidden" name="create_lastname" value="<?php echo $rows['lastname']; ?>"><?php echo $rows['lastname']; ?></td>
                       <td><small><input type="hidden" name="create_middlename" value="<?php echo $rows['middlename'];?>"><?php echo $rows['middlename']; ?></td>
                       <td><small><input type="hidden" name="create_college" value="<?php echo $rows['college']; ?>" ><?php echo $rows['college']; ?></td>
                       <td>
                          <select name="create_accType" required style="min-width: 20px;">
                            <!-- <option value="">Account Type</option> -->
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
                          </select> 
                       </td>
                       <td>
                              <button type="submit" name="confirm_newacc" class="btn-xs btn-success accsubmit">Confirm</button>
                              <button type="submit" name="decline_newacc" class="btn-xs btn-danger accsubmit">Decline</button>    
                        </td>
                      </tr> 
                    </form>
                <?php
                  }
                ?>
                </tbody>
              </table>
              <!-- <div class="pagination-container">
                <nav>
                  <ul class="pagination"></ul>
                </nav>
              </div> -->
            </div>
            <!--ALL ACCOUNTS -->
            <div class="container">
              <h4>Accounts</h4>
              <table id="mytable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                      <th><small>Username</th>
                      <th><small>Password</th>
                      <th><small>First Name</th>
                      <th><small>Last Name</th>
                      <th><small>Middle Name</th>
                      <th><small>College</th>
                      <th><small>Account Type</th>
                      <th><small>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                  $acctQuery = mysqli_query($conn, "SELECT * FROM admin");
                  
                  while ($rows= mysqli_fetch_array($acctQuery)) { ?>
                   <form method="POST">
                     <tr>
                       <td><small><input type="hidden" name="create_user" value="<?php echo $rows['username']; ?>"><?php echo $rows['username']; ?></td>
                       <td><small><input type="hidden" name="create_pass" value="<?php echo $rows['password'] ?>"><?php echo $rows['password'] ?></td>
                       <td><small><input type="hidden" name="create_firstname" value="<?php echo $rows['firstname'];?>" ><?php echo $rows['firstname']; ?></td>
                        <td><small><input type="hidden" name="create_lastname" value="<?php echo $rows['lastname']; ?>"><?php echo $rows['lastname']; ?></td>
                       <td><small><input type="hidden" name="create_middlename" value="<?php echo $rows['middlename'];?>"><?php echo $rows['middlename']; ?></td>
                       <td><small><input type="hidden" name="create_college" value="<?php echo $rows['college']; ?>" ><?php echo $rows['college']; ?></td>
                       <td><small><input type="hidden" name="create_college" value="<?php echo $rows['account_type']; ?>" ><?php echo $rows['account_type']; ?></td>
                       <!-- <td>
                       <select name="create_accType" required style="min-width: 20px;">
                            <!-- <option value="">Account Type</option> -->
                            <!--<option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select> 
                        </td> -->
                       <td>
                              <!-- <button type="submit" name="confirm_newacc" class="btn-xs btn-success accsubmit">Confirm</button> -->
                              <button type="submit" name="status_acc" class="btn-xs btn-success accsubmit" style="display: inline-block;">Deactivate</button> 
                              <button type="submit" name="delete_acc" class="btn-xs btn-danger accsubmit" style="display: inline-block;">Delete</button>
                        </td>
                      </tr> 
                    </form>
                <?php
                  }
                ?>
                </tbody>
              </table>
              <div class="pagination-container">
                <nav>
                  <ul class="pagination"></ul>
                </nav>
              </div>
            </div>

          </div>
        </div>
      <footer class="w3-container-footer" style="background:#fff">
        
      </footer>
    </div>
  </div>
<!-- Modal Account End -->


<!-- Modal Logout -->
  <div id="logout" class="w3-modal" >
    <div class="w3-modal-content w3-animate-zoom w3-card-8 modal-logout">
      <header class="w3-container w3-grey">
      <span class="w3-closebtn">&times;</span>
      <h5 class="modal-header-text">Log-out</h5>
      </header>
        <div class="w3-container modal-body" style="min-height:100px;">
         Do you want to log out?
        </div>
      <footer class="w3-container-footer" style="background:#fff">
        <button class="btn btn-info" id="logoutBtn" style="margin-left:80%;">Log out</button>
      </footer>
    </div>
  </div>
<!-- Modal Logout End -->

    <!-- Contact Section -->
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Contact Us</h2>
                <p></p>
                
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                    <li>
                        <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                    </li>
                    <li>
                        <a href="https://plus.google.com/+Startbootstrap/posts" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google+</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>


   <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; USEP Online Journal 2017</p>
        </div>
    </footer>

   <!-- Footer End -->


    <!-- jQuery -->
    <script src="vendor/jquery/jquery.js"></script>
    <script src="jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script>
          var table = '#mytable'
          $('#maxRows').on('change', function(){
            $('.pagination').html('')
            var trnum = 0
            var maxRows = parseInt($(this).val())
            var totalRows = $(table+' tbody tr').length
            $(table+' tr:gt(0)').each(function(){
              trnum++
              if(trnum > maxRows){
                $(this).hide()
              }
              if(trnum <= maxRows){
                $(this).show()
              }
            })
            if(totalRows > maxRows){
              var pagenum = Math.ceil(totalRows/maxRows)
              for(var i=1;i<=pagenum;){
                $('.pagination').append('<li data-page="'+i+'">\<span>'+ i++ +'<span class="sr-only">(current)</span></span>\</li>').show()
              }
            }
            $('.pagination li:first-child').addClass('active')
                $('.pagination li').on('click',function(){
                var pagenum = $(this).attr('data-page')
                var trIndex = 0;
                  $('.pagination li').removeClass('active')
                  $(this).addClass('active')
                  $(table+' tr:gt(0)').each(function(){
                  trIndex++
                  if(trIndex > (maxRows*pagenum) || trIndex <= ((maxRows*pagenum)-maxRows)){
                    $(this).hide()
                  }else{
                    $(this).show()
                  }
                  })
                })                
          })
          
          $(function(){
          $('table tr:eq(0)').prepend('<th>ID</th>')
          var id = 0;
            $('table tr:gt(0)').each(function(){
            id++
            $(this).prepend('<td>'+id+'</td>')
            })
          })
  </script>

    <!-- Plugin JavaScript -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script> -->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/grayscale.min.js"></script>
	
	<!-- Accordion -->
  <script src="js/circularnav.js"></script>
  <script src="js/functions.js"></script>

  
</body>
</html>
