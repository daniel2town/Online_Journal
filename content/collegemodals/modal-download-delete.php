<!-- MODAL FOR DOWNLOAD AND DELETE -->
<div id="modal-dl" class="w3-modal">
	<div class="w3-modal-content w3-animate-zoom w3-card-8" style="width:500px;">
	  <header class="w3-container w3-grey">
		<span class="w3-closebtn2" id="closebtn" >&times;</span>
		<h4 class="modal-header-text"><div id="dlhead">Details</div></h4>
	  </header>
	  <div class="w3-container modal-body">
  		<div class="text-panel">
  		
  		<div id="details"></div>       
        
        <br><br>
      
        <b>Download Terms and Agreement:</b>
        <br><br>
        <div style="height:250px;overflow-y: auto;">
        Terms and Agreement
• The subscription includes one (1) User-ID and a password to allow online access from any site by the authorized user. 
• This subscription entitles an individual subscriber to access IC electronic journals to: 
a. make searches of the IC electronic journals to which they subscribe, 
b. make one or more copies in hard copy form of the output of any search; such copies may not be sold and may not be distributed to anyone who is not an authorized user; and 
c. download search results to hard disk or flash drives, provided that such data are not made available to anyone who is not an authorized user. 
d. Individual subscribers who do print articles must maintain all copyright and other notices on the printed articles. The downloading of an entire journal issue or complete journal volume in a systematic fashion is strictly prohibited. 
• An individual subscriber may not make IC electronic journals available to anyone whether by telephone link, internet connection, or by permitting access through his or her terminal or computer, or by other similar or dissimilar means or arrangements. 
• The subscriber is solely responsible for all security, and all use (including unauthorized use), of the subscriber’s User-ID and password.</div>
        <br><br>
     	<span id="dlstatus"></span>
     	<br>
        <input type="checkbox" id="agreeChk" class="agreeChk" name="agreeChk[]"> <label for="agreeChk">I agree to the terms and agreement</label>
        <center><button class="btn btn-success" id="proceedBtn" type="submit">Download</button></center>
 	 	</div>
      
	  </div>
	  <footer class="w3-container-footer w3-grey">
		<p class="college-footer"></p>
	  </footer>
	</div>	
</div>

<!-- MODAL FOR DELETE -->
<div id="modal-del" class="w3-modal">
	<div class="w3-modal-content w3-animate-zoom w3-card-8" style="width:500px;">
	  <header class="w3-container w3-grey">
		<span class="w3-closebtn2" id="closebtn">&times;</span>
		<h4 class="modal-header-text"><div id="dlhead">Delete</div></h4>
	  </header>
	  <div class="w3-container modal-body">
  		<div class="text-panel">
        <br>
        <span id="del_status">Warning: You are going to delete this file!</span>
        <br><br>
        <center><button class="btn btn-success" id="proceedDel">Delete</button></center>
 	 	</div>
	  </div>
	  <footer class="w3-container-footer w3-grey">
		<p class="college-footer"></p>
	  </footer>
	</div>	
</div>


<!-- MODAL ALERT -->
<div id="modal-alert" class="w3-modal">
	<div class="w3-modal-content w3-animate-zoom w3-card-8" style="width:500px;">
	  <header class="w3-container w3-grey">
		<h4 class="modal-header-text"><div id="alert_head"></div></h4>
	  </header>
	  <div class="w3-container modal-body">
  		<div class="text-panel">
        <br>
        <span id="alert_status"></span>
        <br><br>
 	 	</div>
	  </div>
	  <footer class="w3-container-footer w3-grey">
		<p class="college-footer"></p>
	  </footer>
	</div>	
</div>
