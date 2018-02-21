
    $(document).ready(function(){
      $("#logout-trigger").click(function(){
        $(".w3-modal").fadeOut(500);
        $("#logout").css("display", "block");

      });

      // Call Account Modal
      $("#account-trigger").click(function(){
        $(".w3-modal").fadeOut(500);
        $("#manageaccount").css("display", "block");
      });

      // User Profile Menu
      $("#logged-userBtn").click(function(){
        $(".drop").toggleClass("toggle-drop");
      });

      

      // Get Requests
      // RealTime Checker
      setInterval(function(){
        var xhrReq = new XMLHttpRequest();
        xhrReq.onreadystatechange=function(){
          if(xhrReq.readyState==4 && xhrReq.status==200){
            $("#reqcontainer").append(xhrReq.responseText);
            
          }
        }

        xhrReq.open("GET", "requests/getrequests.php", true);
        xhrReq.send();
      }, 1500);

    });

    // ++++++++++++++++++++++++++++++++++++++++++++++


    // Show Requests Details
    function show_req(req_id){
      $('#noti'+req_id).children('.hidden_req').show("slow");
      $('#noti'+req_id).children('.reqclosebtn').show();
    }


    // +++++++++++++++++++++++++++++++++++++++++++++++


    // Response to Requests
    function respondReq(val, val2){
      var response = val;
      var requestID = val2;

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
          $('#noti'+requestID).children('button').remove();
          $('#noti'+requestID).children('.notistat').text(xmlhttp.responseText);
          $('#noti'+requestID).fadeOut(2000);
        }
      }
      xmlhttp.open('GET', 'requests/processrequests.php?resp='+response+'&rid='+requestID, true);
      xmlhttp.send();
      // xmlhttp.setRequestHeader('Connection', 'close');
    }

    // ++++++++++++++++++++++++++++++++++++++++++++++++


    // View Modal
    function viewModal(jid, refCollege){
      // Get the id's
        var v_id = jid;
        var v_col = refCollege;

        $("#modal-prev").css("display", "block");
 
        document.getElementById("if_preview").src = "view.php?view=true&vid="+v_id+"&vcol="+v_col+"&#toolbar=0&navpanes=0";

    }


    // +++++++++++++++++++++++++++++++++++++++++++++++
    // This function checks if there is a request made from a file 
    // Then checks if it the request is granted
    function checkReqStatus(userName, fileID, collegeID,){
        var tmp = null;
        $.ajax({
            'async': false,
            'type': "POST",
            'global': false,
            'dataType': 'html',
            'url': "./requests/checkRequestStatus.php",
            'data': 
            { 
              'user': userName, 
              'f_id': fileID, 
              'col_id': collegeID 
            },
            'success': function (data) {
                tmp = data;
                // alert(tmp);
            }
        });
        return tmp;
    } // End of Function

    // +++++++++++++++++++++++++++++++++++++++++++++++

    function calldlmodalAdmin(jid, refCollege){

      //Get the id's
      var downloadID = jid; //value for the file id to download
      var downloadCollege = refCollege; //value for the id of the college where the file from

      // Get elements id's
      var proceedBtn = document.getElementById("proceedBtn");
      var termsChk = document.getElementById("agreeChk");
      var dlStatus = document.getElementById("dlstatus");
      var user = document.getElementById("req_user").value;

      // Initialize Get admin type and college
      var userType = document.getElementById('user_type');
      var userCollege = document.getElementById('user_college_index');

      // Re-initialize modal elements on download modal onload()
      termsChk.disabled = false;
      termsChk.checked = false;
      proceedBtn.disabled = true;

      // Check the request status
      var boolReq = checkReqStatus(user, downloadID, downloadCollege);

      // IF the requestor is from diff College and req is accepted
      if(userType.value == 'Superadmin' || userType.value == 'Admin' && user_college_index.value != downloadCollege && boolReq == "false"){ 
        
        proceedBtn.innerHTML = "Request Download";

      }else{

        proceedBtn.innerHTML = "Download";
      
      }

      // Display Modal
      $('#modal-dl').css('display', 'block');


      termsChk.addEventListener('change', function(){
        if(termsChk.checked == 1){ proceedBtn.disabled = false; }
        else{ proceedBtn.disabled = true; }
      });

      
      // When the download/request button is clicked
      proceedBtn.addEventListener('click', function(){

        // disable terms checkbox
        termsChk.disabled = true;

        // This condition is to determine if the admin is not from the same college --> REQUEST File
        // else --> DOWNLOAD File
        if(userType.value == 'Superadmin' || userType.value == 'Admin' && user_college_index.value != downloadCollege  && boolReq == 'false'){
          // Disable button
          proceedBtn.innerHTML = "Your download has been requested.";
          proceedBtn.disabled = true;
          window.location.replace("./download.php?request=true&college="+downloadCollege+"&id="+downloadID+"&user="+user+"&typ=request");
          return;
        }else{
          // Disable button
          proceedBtn.innerHTML = "Your file is downloading...";
          proceedBtn.disabled = true;
          window.location.replace("./download.php?directdl=true&college="+downloadCollege+"&id="+downloadID);
          return;
        }
        
        
        }); // End button click
        
    }

    // ++++++++++++++++++++++++++++++++++++++++++++++++++++

    // Call Delete Modal
    function calldelmodal(delid, refCollege){
      // declare id's
      var del_id = delid;
      var ref_college = refCollege;
      var boxid = refCollege.toString() + delid.toString();
      // decleration of variables
      var proceedDel = document.getElementById('proceedDel');
      var delStatus = document.getElementById('del_status');
      var xmlhttp = new XMLHttpRequest();

      // call modal first/redeclare
      delStatus.innerHTML = "Warning: You are going to delete this file!"
      $('#proceedDel').show();
      $('#modal-del').css('display', 'block');

      xmlhttp.onreadystatechange=function() {
        while(xmlhttp.readyState != 4){
          $delStatus.innerHTML= "Deleting File. Please Wait.";
        }

        if(xmlhttp.readyState==4 && xmlhttp.status==200){
          delStatus.innerHTML=xmlhttp.responseText;
          $('#proceedDel').hide();
          $('#modal-del').css('display', 'block');
          $('#'+boxid).remove();
          $('#modal-del').fadeOut(3000);
        }
      }
      xmlhttp.open("POST","./delete.php",true);
      xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
      xmlhttp.setRequestHeader("Connection", "close");
      
      // if canceled
      $('.w3-closebtn2').click(function(){
        xmlhttp.abort();
        xmlhttp.setRequestHeader("Connection", "close");
      });

      // if proceed is clicked, delete
      proceedDel.addEventListener('click', function(){
        xmlhttp.send("college="+ref_college+"&id="+del_id);
      });

    }



    // Logout function
    var logout = document.getElementById("logoutBtn");
    logout.addEventListener("click", function(){
      window.location = "../logout.php";

    });
