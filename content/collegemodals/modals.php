<!-- Modals College -->

<!-- IC -->
<div id="id01" class="w3-modal">
	<div class="w3-modal-content w3-animate-zoom w3-card-8">
	  <header class="w3-container w3-grey">
		<span class="w3-closebtn">&times;</span>
		<h4 class="modal-header-text"><div id="ht">IC Journals</div></h4>
	  </header>
	  <div class="w3-container modal-body">
    
    <?php 
        if($_SESSION['user_type'] == 'Superadmin' OR $_SESSION['user_type'] == 'Admin' AND $_SESSION['college'] == 'ic'){
     ?>
			<button class="accordion">Add new</button>
			<div class="panel">
			  <form enctype="multipart/form-data" action="upload_file.php" method="POST">
            Document name: <br>
            <input type="hidden" name="collegeName" value="ic">
            <input type="text" name="doc_name" required><br>
            Browse file to upload: <br>
            <input type="file" name="file" id="file" size="1000000" accept="application/pdf" required> <br>
      			Journal Cover:
      			<input type="file" name="file2" id="file2" size="1000000" accept="image/png, image/jpeg" required> <br>

            <input class="btn btn-info" type="submit" name="submit" value="Upload file">
        </form>
			</div>
      <?php } ?>
       		<button class="accordion">Journals</button>
    		<div class="panel">

          <span id='noJournal1'></span>

          <?php 
            $dlcollege = 1; // college name for dl reference
            $sql = "select * from ic";
            $res = mysqli_query($conn, $sql);
            $rowcount = mysqli_num_rows($res);
            if($rowcount == 0){
              echo "<script>document.getElementById('noJournal1').innerHTML = 'There are no journals available at the moment.'</script>";
            }
            // echo "Files: "."<br>";
            while($row = mysqli_fetch_array($res)) 
            {
              $id = $row['id'];
              $name = $row['name'];
              $path = $row['path'];
              $cover = $row['cover'];
              $views = $row['views'];
              if(strlen($name) > 18){
                $tmpname = substr($name, 0, 18).'...';
              }else{
                $tmpname = $name;
              }

              echo "<div class='filecontr' id='".$dlcollege.$id."'><div class='filestyle'><div class='filename'><a onclick='viewModal(".$id.", ".$dlcollege.")' ><img class='' width='150px' height='214px' src='".$cover."'><div id='jour_title'><br>" .$tmpname. "</div></a></div></div>"."<div class='fileopt'><button id='dlmodal' onclick='calldlmodal(".$id.", ".$dlcollege." )' class='btn btn-success' style='width:130px;'>Details</button>";

              if($_SESSION['user_type'] == 'Superadmin' OR $_SESSION['user_type'] == 'Admin' AND $_SESSION['college'] == 'ic'){
                echo "<button id='delbutton' onclick='calldelmodal(".$id.", ".$dlcollege.")' class='btn btn-danger' style='width:130px'>Delete</button>";
              }

              echo "</div></div>";
              
            }
        	?>
   	 		</div>
	  </div>
	  <footer class="w3-container-footer w3-grey">
		<p class="college-footer">Institute of Computing</p>
	  </footer>
	</div>	
</div>

<!-- CE -->
<div id="id02" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom w3-card-8">
    <header class="w3-container w3-grey">
    <span class="w3-closebtn">&times;</span>
    <h4 class="modal-header-text"><div id="ht">CE Journals</div></h4>
    </header>
    <div class="w3-container modal-body">

    <?php 
      // $isCEadmin;
      // if($_SESSION['user_type'] == '')
      if($_SESSION['user_type'] == 'Superadmin' OR $_SESSION['user_type'] == 'Admin' AND $_SESSION['college'] == 'ce' ){
     ?>
      <button class="accordion">Add new</button>
      <div class="panel">
        <form enctype="multipart/form-data" action="upload_file.php" method="POST">
          Document name: <br>
          <input type="hidden" name="collegeName" value="ce">
          <input type="text" name="doc_name" required><br>
          Browse file to upload:<br>
          <input type="file" name="file" id="file" size="1000000" accept="application/pdf" required> <br>
            Journal Cover:
            <input type="file" name="file2" id="file2" size="1000000" accept="image/png, image/jpeg" required> <br>
          <input class="btn btn-info" type="submit" name="submit" value="Upload file">
        </form>
      </div>
      <?php } ?>
          <button class="accordion">Journals</button>
        <div class="panel">
          <span id='noJournal2'></span>

          <?php 
            $dlcollege = 2; // college name for dl reference
            $sql = "select * from ce";
            $res = mysqli_query($conn, $sql);
            $rowcount = mysqli_num_rows($res);
            if($rowcount == 0){
              echo "<script>document.getElementById('noJournal2').innerHTML = 'There are no journals available at the moment.'</script>";
            }
            // echo "Files: "."<br>";
            while($row = mysqli_fetch_array($res)) 
            {
              $id = $row['id'];
              $name = $row['name'];
              $cover = $row['cover'];
              $cover = $row['cover'];
              $views = $row['views'];
              if(strlen($name) > 18){
                $tmpname = substr($name, 0, 18).'...';
              }else{
                $tmpname = $name;
              }

              echo "<div class='filecontr' id='".$dlcollege.$id."'><div class='filestyle'><div class='filename'><a onclick='viewModal(".$id.", ".$dlcollege.")' ><img class='' width='150px' height='214px' src='".$cover."'><div id='jour_title'><br>" .$tmpname. "</div></a></div></div>"."<div class='fileopt'><button id='dlmodal' onclick='calldlmodal(".$id.", ".$dlcollege." )' class='btn btn-success' style='width:130px;'>Details</button>";

              if($_SESSION['user_type'] == 'Superadmin' OR $_SESSION['user_type'] == 'Admin' AND $_SESSION['college'] == 'ce'){
                echo "<button id='delbutton' onclick='calldelmodal(".$id.", ".$dlcollege.")' class='btn btn-danger' style='width:130px'>Delete</button>";
              }

              echo "</div></div>";
            }
          ?>
        </div>
    </div>
    <footer class="w3-container-footer w3-grey">
    <p class="college-footer">College of Engineering</p>
    </footer>
  </div>  
</div>

<!-- CED -->
<div id="id03" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom w3-card-8">
    <header class="w3-container w3-grey">
    <span class="w3-closebtn">&times;</span>
    <h4 class="modal-header-text"><div id="ht">CED Journals</div></h4>
    </header>
    <div class="w3-container modal-body">

    <?php 
        if($_SESSION['user_type'] == 'Superadmin' OR $_SESSION['user_type'] == 'Admin' AND $_SESSION['college'] == 'ced'){
     ?>
      <button class="accordion">Add new</button>
      <div class="panel">
        <form enctype="multipart/form-data" action="upload_file.php" method="POST">
          Document name: <br>
          <input type="hidden" name="collegeName" value="ced">
          <input type="text" name="doc_name" required><br>
          Browse file to upload: <br>
          <input type="file" name="file" id="file" size="1000000" accept="application/pdf" required> <br>
            Journal Cover:
         <input type="file" name="file2" id="file2" size="1000000" accept="image/png, image/jpeg" required> <br>
          <input class="btn btn-info" type="submit" name="submit" value="Upload file">
        </form>
      </div>
      <?php } ?>
          <button class="accordion">Journals</button>
        <div class="panel">
          <span id='noJournal3'></span>

          <?php 
            $dlcollege = 3; // college name for dl reference
            $sql = "select * from ced";
            $res = mysqli_query($conn, $sql);
            $rowcount = mysqli_num_rows($res);
            if($rowcount == 0){
              echo "<script>document.getElementById('noJournal3').innerHTML = 'There are no journals available at the moment.'</script>";
            }
            // echo "Files: "."<br>";
            while($row = mysqli_fetch_array($res)) 
            {
              $id = $row['id'];
              $name = $row['name'];
              $path = $row['path'];
              $cover = $row['cover'];
              $views = $row['views'];
              if(strlen($name) > 18){
                $tmpname = substr($name, 0, 18).'...';
              }else{
                $tmpname = $name;
              }

              echo "<div class='filecontr' id='".$dlcollege.$id."'><div class='filestyle'><div class='filename'><a onclick='viewModal(".$id.", ".$dlcollege.")' ><img class='' width='150px' height='214px' src='".$cover."'><div id='jour_title'><br>" .$tmpname. "</div></a></div></div>"."<div class='fileopt'><button id='dlmodal' onclick='calldlmodal(".$id.", ".$dlcollege." )' class='btn btn-success' style='width:130px;'>Details</button>";

              if($_SESSION['user_type'] == 'Superadmin' OR $_SESSION['user_type'] == 'Admin' AND $_SESSION['college'] == 'ced'){
                echo "<button id='delbutton' onclick='calldelmodal(".$id.", ".$dlcollege.")' class='btn btn-danger' style='width:130px'>Delete</button>";
              }

              echo "</div></div>";
            }
          ?>
        </div>
    </div>
    <footer class="w3-container-footer w3-grey">
    <p class="college-footer">College of Education</p>
    </footer>
  </div>  
</div>

<!-- CGB -->
<div id="id04" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom w3-card-8">
    <header class="w3-container w3-grey">
    <span class="w3-closebtn">&times;</span>
    <h4 class="modal-header-text"><div id="ht">CGB Journals</div></h4>
    </header>
    <div class="w3-container modal-body">

    <?php 
        if($_SESSION['user_type'] == 'Superadmin' OR $_SESSION['user_type'] == 'Admin' AND $_SESSION['college'] == 'cgb'){
     ?>
      <button class="accordion">Add new</button>
      <div class="panel">
        <form enctype="multipart/form-data" action="upload_file.php" method="POST">
            Document name: <br>
            <input type="hidden" name="collegeName" value="cgb">
            <input type="text" name="doc_name" required><br>
            Browse file to upload:<br>
            <input type="file" name="file" id="file" size="1000000" accept="application/pdf" required> <br>
            Journal Cover:
            <input type="file" name="file2" id="file2" size="1000000" accept="image/png, image/jpeg" required> <br>
            <input class="btn btn-info" type="submit" name="submit" value="Upload file">
            </form>
      </div>
      <?php } ?>
          <button class="accordion">Journals</button>
        <div class="panel">

          <span id='noJournal4'></span>

          <?php 
            $dlcollege = 4; // college name for dl reference
            $sql = "select * from cgb";
            $res = mysqli_query($conn, $sql);
            $rowcount = mysqli_num_rows($res);
            if($rowcount == 0){
              echo "<script>document.getElementById('noJournal4').innerHTML = 'There are no journals available at the moment.'</script>";
            }
            // echo "Files: "."<br>";
            while($row = mysqli_fetch_array($res)) 
            {
              $id = $row['id'];
              $name = $row['name'];
              $path = $row['path'];
              $cover = $row['cover'];
              $views = $row['views'];
              if(strlen($name) > 18){
                $tmpname = substr($name, 0, 18).'...';
              }else{
                $tmpname = $name;
              }

              echo "<div class='filecontr' id='".$dlcollege.$id."'><div class='filestyle'><div class='filename'><a onclick='viewModal(".$id.", ".$dlcollege.")' ><img class='' width='150px' height='214px' src='".$cover."'><div id='jour_title'><br>" .$tmpname. "</div></a></div></div>"."<div class='fileopt'><button id='dlmodal' onclick='calldlmodal(".$id.", ".$dlcollege." )' class='btn btn-success' style='width:130px;'>Details</button>";

              if($_SESSION['user_type'] == 'Superadmin' OR $_SESSION['user_type'] == 'Admin' AND $_SESSION['college'] == 'cgb'){
                echo "<button id='delbutton' onclick='calldelmodal(".$id.", ".$dlcollege.")' class='btn btn-danger' style='width:130px'>Delete</button>";
              }

              echo "</div></div>";
            }
          ?>
        </div>
    </div>
    <footer class="w3-container-footer w3-grey">
    <p class="college-footer">College of Governance and Business</p>
    </footer>
  </div>  
</div>

<!-- CT -->
<div id="id05" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom w3-card-8">
    <header class="w3-container w3-grey">
    <span class="w3-closebtn">&times;</span>
    <h4 class="modal-header-text"><div id="ht">CT Journals</div></h4>
    </header>
    <div class="w3-container modal-body">

    <?php 
        if($_SESSION['user_type'] == 'Superadmin' OR $_SESSION['user_type'] == 'Admin' AND $_SESSION['college'] == 'ct'){
     ?>
      <button class="accordion">Add new</button>
      <div class="panel">
        <form enctype="multipart/form-data" action="upload_file.php" method="POST">
            Document name: <br>
            <input type="hidden" name="collegeName" value="ct">
            <input type="text" name="doc_name" required><br>
            Browse file to upload:<br>
            <input type="file" name="file" id="file" size="1000000" accept="application/pdf" required> <br>
            Journal Cover:
            <input type="file" name="file2" id="file2" size="1000000" accept="image/png, image/jpeg" required> <br>
            <input class="btn btn-info" type="submit" name="submit" value="Upload file">
            </form>
      </div>
      <?php } ?>
          <button class="accordion">Journals</button>
        <div class="panel">

          <span id='noJournal5'></span>

          <?php 
            $dlcollege = 5; // college name for dl reference
            $sql = "select * from ct";
            $res = mysqli_query($conn, $sql);
            $rowcount = mysqli_num_rows($res);
            if($rowcount == 0){
              echo "<script>document.getElementById('noJournal5').innerHTML = 'There are no journals available at the moment.'</script>";
            }
            // echo "Files: "."<br>";
            while($row = mysqli_fetch_array($res)) 
            {
              $id = $row['id'];
              $name = $row['name'];
              $path = $row['path'];
              $cover = $row['cover'];
              $views = $row['views'];
              if(strlen($name) > 18){
                $tmpname = substr($name, 0, 18).'...';
              }else{
                $tmpname = $name;
              }

              echo "<div class='filecontr' id='".$dlcollege.$id."'><div class='filestyle'><div class='filename'><a onclick='viewModal(".$id.", ".$dlcollege.")' ><img class='' width='150px' height='214px' src='".$cover."'><div id='jour_title'><br>" .$tmpname. "</div></a></div></div>"."<div class='fileopt'><button id='dlmodal' onclick='calldlmodal(".$id.", ".$dlcollege." )' class='btn btn-success' style='width:130px;'>Details</button>";

              if($_SESSION['user_type'] == 'Superadmin' OR $_SESSION['user_type'] == 'Admin' AND $_SESSION['college'] == 'ct'){
                echo "<button id='delbutton' onclick='calldelmodal(".$id.", ".$dlcollege.")' class='btn btn-danger' style='width:130px'>Delete</button>";
              }

              echo "</div></div>";
            }
          ?>
        </div>
    </div>
    <footer class="w3-container-footer w3-grey">
    <p class="college-footer">College of Technology</p>
    </footer>
  </div>  
</div>

<!-- CAS -->
<div id="id06" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom w3-card-8">
    <header class="w3-container w3-grey">
    <span class="w3-closebtn">&times;</span>
    <h4 class="modal-header-text"><div id="ht">CAS Journals</div></h4>
    </header>
    <div class="w3-container modal-body">

    <?php 
        if($_SESSION['user_type'] == 'Superadmin' OR $_SESSION['user_type'] == 'Admin' AND $_SESSION['college'] == 'cas'){
     ?>
      <button class="accordion">Add new</button>
      <div class="panel">
        <form enctype="multipart/form-data" action="upload_file.php" method="POST">
            Document name: <br>
            <input type="hidden" name="collegeName" value="cas">
            <input type="text" name="doc_name" required><br>
            Browse file to upload:<br>
            <input type="file" name="file" id="file" size="1000000" accept="application/pdf" required> <br>
            Journal Cover:
            <input type="file" name="file2" id="file2" size="1000000" accept="image/png, image/jpeg" required> <br>
            <input class="btn btn-info" type="submit" name="submit" value="Upload file">
            </form>
      </div>
      <?php } ?>
          <button class="accordion">Journals</button>
        <div class="panel">

          <span id='noJournal6'></span>

          <?php 
            $dlcollege = 6; // college name for dl reference
            $sql = "select * from cas";
            $res = mysqli_query($conn, $sql);
            $rowcount = mysqli_num_rows($res);
            if($rowcount == 0){
              echo "<script>document.getElementById('noJournal6').innerHTML = 'There are no journals available at the moment.'</script>";
            }
            // echo "Files: "."<br>";
            while($row = mysqli_fetch_array($res)) 
            {
              $id = $row['id'];
              $name = $row['name'];
              $path = $row['path'];
              $cover = $row['cover'];
              $views = $row['views'];
              if(strlen($name) > 18){
                $tmpname = substr($name, 0, 18).'...';
              }else{
                $tmpname = $name;
              }

              echo "<div class='filecontr' id='".$dlcollege.$id."'><div class='filestyle'><div class='filename'><a onclick='viewModal(".$id.", ".$dlcollege.")' ><img class='' width='150px' height='214px' src='".$cover."'><div id='jour_title'><br>" .$tmpname. "</div></a></div></div>"."<div class='fileopt'><button id='dlmodal' onclick='calldlmodal(".$id.", ".$dlcollege." )' class='btn btn-success' style='width:130px;'>Details</button>";

              if($_SESSION['user_type'] == 'Superadmin' OR $_SESSION['user_type'] == 'Admin' AND $_SESSION['college'] == 'cas'){
                echo "<button id='delbutton' onclick='calldelmodal(".$id.", ".$dlcollege.")' class='btn btn-danger' style='width:130px'>Delete</button>";
              }

              echo "</div></div>";
            }
          ?>
        </div>
    </div>
    <footer class="w3-container-footer w3-grey">
    <p class="college-footer">College of Arts and Sciences</p>
    </footer>
  </div>  
</div>

<!-- SAEC -->
<div id="id07" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom w3-card-8">
    <header class="w3-container w3-grey">
    <span class="w3-closebtn">&times;</span>
    <h4 class="modal-header-text"><div id="ht">SAEC Journals</div></h4>
    </header>
    <div class="w3-container modal-body">

    <?php 
        if($_SESSION['user_type'] == 'Superadmin' OR $_SESSION['user_type'] == 'Admin' AND $_SESSION['college'] == 'saec'){
     ?>
      <button class="accordion">Add new</button>
      <div class="panel">
        <form enctype="multipart/form-data" action="upload_file.php" method="POST">
            Document name: <br>
            <input type="hidden" name="collegeName" value="saec">
            <input type="text" name="doc_name" required><br>
            Browse file to upload:<br>
            <input type="file" name="file" id="file" size="1000000" accept="application/pdf" required> <br>
            Journal Cover:
            <input type="file" name="file2" id="file2" size="1000000" accept="image/png, image/jpeg" required> <br>
            <input class="btn btn-info" type="submit" name="submit" value="Upload file">
            </form>
      </div>
      <?php } ?>
          <button class="accordion">Journals</button>
        <div class="panel">

          <span id='noJournal7'></span>

          <?php 
            $dlcollege = 7; // college name for dl reference
            $sql = "select * from saec";
            $res = mysqli_query($conn, $sql);
            $rowcount = mysqli_num_rows($res);
            if($rowcount == 0){
              echo "<script>document.getElementById('noJournal7').innerHTML = 'There are no journals available at the moment.'</script>";
            }
            // echo "Files: "."<br>";
            while($row = mysqli_fetch_array($res)) 
            {
              $id = $row['id'];
              $name = $row['name'];
              $path = $row['path'];
              $cover = $row['cover'];
              $views = $row['views'];
              if(strlen($name) > 18){
                $tmpname = substr($name, 0, 18).'...';
              }else{
                $tmpname = $name;
              }

              echo "<div class='filecontr' id='".$dlcollege.$id."'><div class='filestyle'><div class='filename'><a onclick='viewModal(".$id.", ".$dlcollege.")' ><img class='' width='150px' height='214px' src='".$cover."'><div id='jour_title'><br>" .$tmpname. "</div></a></div></div>"."<div class='fileopt'><button id='dlmodal' onclick='calldlmodal(".$id.", ".$dlcollege." )' class='btn btn-success' style='width:130px;'>Details</button>";

              if($_SESSION['user_type'] == 'Superadmin' OR $_SESSION['user_type'] == 'Admin' AND $_SESSION['college'] == 'cas'){
                echo "<button id='delbutton' onclick='calldelmodal(".$id.", ".$dlcollege.")' class='btn btn-danger' style='width:130px'>Delete</button>";
              }

              echo "</div></div>";
            }
          ?>
        </div>
    </div>
    <footer class="w3-container-footer w3-grey">
    <p class="college-footer">School of Applied Economics</p>
    </footer>
  </div>  
</div>


<!-- MODAL FOR PREVIEW -->
<div id="modal-prev" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom w3-card-8" style="height:85%; width:80%;">
    <header class="w3-container w3-grey">
    <span class="w3-closebtn2" id="closebtn">&times;</span>
    <h4 class="modal-header-text"><div id="dlhead">Preview</div></h4>
    </header>
    <div class="frame"></div>
    <iframe id="if_preview" src="" frameborder="0" scrolling="0" width="100%" height="100%"></iframe>
  </div>  
</div>
<!-- Modals End -->
 

<?php include 'collegemodals/modal-download-delete.php'; ?>



