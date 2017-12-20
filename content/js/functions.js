
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
      }, 2000);

    });


    // Show Requests Details
    function show_req(req_id){
      $('#noti'+req_id).children('.hidden_req').show("slow");
      $('#noti'+req_id).children('.reqclosebtn').show();
    }





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


    // View Modal
    function viewModal(jid, refCollege){
      // Get the id's
        var v_id = jid;
        var v_col = refCollege;

        $("#modal-prev").css("display", "block");
 
        document.getElementById("if_preview").src = "view.php?view=true&vid="+v_id+"&vcol="+v_col+"&#toolbar=0&navpanes=0";

    }


    // Get Data for Details/ Download Journal nga Modal
    function calldlmodal(jid, refCollege){ 

        // Get the id's
        var dl_id = jid;
        var dl_col = refCollege;

        // Get elements id's
        var proceedBtn = document.getElementById("proceedBtn");
        var termsChk = document.getElementById("agreeChk");
        var dlStatus = document.getElementById("dlstatus");
        var user = document.getElementById("req_user").value;
        

        // Re-initialize modal elements on modal load
        proceedBtn.innerHTML = "Download";
        termsChk.disabled = false;
        termsChk.checked = false;
        proceedBtn.disabled = true;

        // call modal
        $('#modal-dl').css('display', 'block');

        if( document.getElementById('user_type').value == 'Superadmin' ||
            document.getElementById('user_type').value == 'Admin'
          ){

          proceedBtn.disabled = false;
          termsChk.checked = true;
          termsChk.disabled = true;
          
            // var direct = new XMLHttpRequest();
            
            proceedBtn.addEventListener('click', function(){
            //   direct.open("POST", "./download.php", true);
            //   direct.setRequestHeader("Content-type","application/x-www-form-urlencoded");
              
              // direct.onreadystatechange=function() {
              //     if(direct.readyState==4 && direct.status==200){
                  // Clear download status text
                  // dlStatus.innerHTML = "";
                  // // disable terms checkbox
                  // termsChk.disabled = true;
                  // // Disable button
                  // proceedBtn.innerHTML = "Your file is downloading...";
                  // proceedBtn.disabled = true;
            //       }
              
            //     }
            //     direct.send("directdl=true&college="+refCollege+"&id="+jid);

              
            // });

            $.post("./download.php",
            {
              directdl: "true",
              id: jid,
              college: refCollege
              
            },
            function(data, status){
              if(status != "success"){
                alert("Failed to submit data!");
              }else{
                // alert(data);
                dlStatus.innerHTML = "";
                // disable terms checkbox
                termsChk.disabled = true;
                // Disable button
                proceedBtn.innerHTML = "Your file is downloading...";
                proceedBtn.disabled = true;
              }
             
            });
            });

            // if canceled
            $('.w3-closebtn2').click(function(){
              direct.abort();
              // direct.setRequestHeader("Connection", "close");
            });
          return;
        }

        // Check if terms and agreement is checked.
        // Toggle for proceed download button
        termsChk.onchange = function(){
          if(!termsChk.checked)
            proceedBtn.disabled = true;
          if(termsChk.checked)
            proceedBtn.disabled = false;
        }

        // create xmlhttprequest
        var xmlhttp= new XMLHttpRequest();
        // What to do when the xhr state changes
        xmlhttp.onreadystatechange=function() {
          if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("details").innerHTML=xmlhttp.responseText;

            var request = new XMLHttpRequest();
            request.open("POST", "./download.php", true);
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            proceedBtn.addEventListener('click', function(){
              // In a case where proceed button is enabled and terms is uncheck
              if(!termsChk.checked){
                dlStatus.innerHTML = "You have to agree to the terms and agreement to proceed!";
                proceedBtn.disabled = true;
              }else{
                
                request.onreadystatechange=function() {
                  if(request.readyState==4 && request.status==200){
                  // Clear download status text
                  dlStatus.innerHTML = "";
                  // disable terms checkbox
                  termsChk.disabled = true;
                  // Disable button
                  proceedBtn.disabled = true;
                  proceedBtn.innerHTML= "Your download request has been sent...";
                  }
                }
                
                request.send("college="+dl_col+"&id="+dl_id+"&user="+user+"&typ=request");
               
              }
            });
          }
        }

        // if canceled
        $('.w3-closebtn2').click(function(){
          xmlhttp.abort();
          // xmlhttp.setRequestHeader("Connection", "close");
          request.abort();
          // request.setRequestHeader("Connection", "close");
        });
        
        // Request for Journal Details and Download path
        xmlhttp.open("GET","./requests/requestdldata.php?college="+dl_col+"&id="+dl_id,true);
        xmlhttp.send();

      }

    // function callAlert(){
    //   alert("Hello World!");
    // }


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
