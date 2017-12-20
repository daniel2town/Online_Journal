var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        this.nextElementSibling.classList.toggle("show");
  }
}


/* Set the width of the side navigation to 250px */
function openNav() {
	if(document.getElementById("mySidenav").style.width != "250px")
    	document.getElementById("mySidenav").style.width = "250px";
    else
    	closeNav();
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}



$(document).ready(function(){
	$(".menu-item1").click(function(){
	    $("#id01").css("display" , "block");

	});

	$(".menu-item2").click(function(){
		$("#id02").css("display" , "block");
	});

	$(".menu-item3").click(function(){
		$("#id03").css("display" , "block");
	});

	$(".menu-item4").click(function(){
		$("#id04").css("display" , "block");
	});

	$(".menu-item5").click(function(){
		$("#id05").css("display" , "block");
	});

	$(".menu-item6").click(function(){
		$("#id06").css("display" , "block");
	});

	$(".menu-item7").click(function(){	
		$("#id07").css("display" , "block");
	});

	//CLOSE BUTTON 
	$(".w3-closebtn").click(function(){
		$(".w3-modal").fadeOut(500);
	});

	//CLOSE BUTTON FOR DOWNLOAD AND DELETE
	$(".w3-closebtn2").click(function(){
		$("#modal-del").fadeOut(500);
		$("#modal-dl").fadeOut(500);
		$("#modal-prev").fadeOut(500);
	});



	$(".menu-item1").hover(function(){
		$(this).removeClass("college-glow-off");
		$(this).addClass("college-glow-on");
	},

	function(){
		$(this).addClass("college-glow-off");
		$(this).removeClass("college-glow-on");
	});


	$(".menu-item2").hover(function(){
		$(this).removeClass("college-glow-off");
		$(this).addClass("college-glow-on");
	},

	function(){
		$(this).addClass("college-glow-off");
		$(this).removeClass("college-glow-on");
	});

	$(".menu-item3").hover(function(){
		$(this).removeClass("college-glow-off");
		$(this).addClass("college-glow-on");
	},

	function(){
		$(this).addClass("college-glow-off");
		$(this).removeClass("college-glow-on");
	});

	$(".menu-item4").hover(function(){
		$(this).removeClass("college-glow-off");
		$(this).addClass("college-glow-on");
	},

	function(){
		$(this).addClass("college-glow-off");
		$(this).removeClass("college-glow-on");
	});

	$(".menu-item5").hover(function(){
		$(this).removeClass("college-glow-off");
		$(this).addClass("college-glow-on");
	},

	function(){
		$(this).addClass("college-glow-off");
		$(this).removeClass("college-glow-on");
	});

	$(".menu-item6").hover(function(){
		$(this).removeClass("college-glow-off");
		$(this).addClass("college-glow-on");
	},

	function(){
		$(this).addClass("college-glow-off");
		$(this).removeClass("college-glow-on");
	});

	$(".menu-item7").hover(function(){
		$(this).removeClass("college-glow-off");
		$(this).addClass("college-glow-on");
	},

	function(){
		$(this).addClass("college-glow-off");
		$(this).removeClass("college-glow-on");
	});


	

});

