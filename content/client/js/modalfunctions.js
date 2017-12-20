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
          
            var direct = new XMLHttpRequest();
            direct.onreadystatechange=function(){
              // $('#modal-alert').css('display', 'block');
              if(direct.readyState==4 && direct.status==200){
                
              }  
            }
            direct.open("POST", "./download.php", true);
            direct.setRequestHeader("Content-type","application/x-www-form-urlencoded");

            // if canceled
            $('.w3-closebtn2').click(function(){
              direct.abort();
              // direct.setRequestHeader("Connection", "close");
            });
            
            proceedBtn.addEventListener('click', function(){
              direct.send("directdl=true&college="+refCollege+"&id="+jid);
              proceedBtn.innerHTML = "Your file is downloading...";
              proceedBtn.disabled = true;
              
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
