$(document).ready(function() {




	// Modal Functions
	$(".play").click(function(){
		var v_id = $(this).children("input.journalID").val();
		var v_col = $(this).children("input.collegeID").val();
		var j_title = $(this).children("input.jtitle").val();

		// Open Modal
		$("#openModal").css({"opacity":"1","pointer-events":"auto"});

		// Change Title
		$("#journalTitle").text(j_title);

		// Get Journal
		$("#previewFrame").attr("src", "../view.php?view=true&vid="+v_id+"&vcol="+v_col+"&#toolbar=0&navpanes=0");
	});

		// Journal Onload
		$("#previewFrame").load(function(){
			// $(this).css("pointer-events", "none");
		});



		// Close Modal
	$(".close").click(function(){
		$("#openModal").css({"opacity":"0","pointer-events":"none"});
	});


	// Menu Dropdown
	$(".dropbtn").click(function(){
		$(".menu").toggle();
	});



});






