// I'm kinda tempted to turn this into a jquery/css plugin
$(document).ready(function() {
	Math.seedrandom('pr'); // Make Math.random seed based
	
	// Set timers and intervals
	var slideInterval = 5000,
		transTimer = 2500;
	
	// Init vars
	var compact = $("#containerr").hasClass("compact");
	var contentAmt = $("#containerr .content").length;  // Number of slides
	var loop = true;
	
	// HEX TO RGB FUNCTION
	function hexToRgb(hex) {
		var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
		return result ? {
			r: parseInt(result[1], 16),
			g: parseInt(result[2], 16),
			b: parseInt(result[3], 16)
		} : null;
	}
	
	// Styling
	var dullcolors = ["#f44336", "#ec407a", "#ab47bc", "#7e57c2",
					  "#3f51b5", "#2196f3", "#4fc3f7", "#00bcd4",
					  "#66bb6a", "#aed581", "#e6ee9c", "#fff176",
					  "#ffca28", "#ffa726", "#ff5722"],
		fullcolors = ["#8d6e63", "#f50057", "#d500f9", "#651fff",
					  "#3d5afe", "#2979ff", "#00b0ff", "#00e5ff",
					  "#1de9b6", "#00e676", "#76ff03", "#c6ff00",
					  "#ffea00", "#ffc400", "#ff9100", "#ff3d00"];
	
	// Color each slide
	$(".content").each(function() {
		var bg_img = $(this).attr("data-bg"),
			color1 = hexToRgb(dullcolors[Math.floor(Math.random()*dullcolors.length)]),
			color2 = hexToRgb(fullcolors[Math.floor(Math.random()*fullcolors.length)]),
			darken = 150;


		$(this).css({
			"background" : "linear-gradient(135deg, rgba("+parseInt(color1.r - darken)+","+parseInt(color1.g - darken)+","+parseInt(color1.b - darken)+",0.7), rgba("+color2.r+","+color2.g+","+color2.b+",0.5)), url("+bg_img+")"
		})
	});
	
	// Functionality
	if (loop) { var repeat = setInterval(changeSlide, slideInterval); }
	
	// Hide or show left right controls | only compact supports those
	if (compact == true) {
		$(".slide-left, .slide-right").show();
	} else {
		$(".slide-left, .slide-right").hide();
	}
	
	// Play/pause button click
	$(".playbutton").on("click", function() {
		if ($(this).hasClass("paused")) {
			$(this).removeClass("paused");
			repeat = setInterval(changeSlide, slideInterval);
		} else {
			$(this).addClass("paused");
			clearInterval(repeat);
		} // END if/else
	}); // END onClick
	
	// Physical clicking | Content panels
	$(".content").on("click", function() {
		clearInterval(repeat); // Clear the interval | pause, basically
		$(".playbutton").addClass("paused"); // add the paused class | visual shit
		changeSlide($(this).attr("data-slide"), "clicked"); // changeSlide
	}); // END onClick
	
	$(".slide-left, .slide-right").on("click", function() {
		var slide = parseInt($("#containerr .content.active").attr("data-slide"));
		if ($(this).hasClass("slide-left")) {
			slide--
			console.log(slide);
			if (slide == 0) {
				slide = contentAmt;
			}
		} else {
			slide++
			if (slide > contentAmt) {
				slide = 1;
			}
		}
		$(".playbutton").addClass("paused");
		clearInterval(repeat);
		changeSlide(slide, "clicked");
	});
	
	
	// FUNCTIONS -------
	
	// changeSlide() function
	function changeSlide(clicked, method) {
		var compact = $("#containerr").hasClass("compact"); // If compact is added
		// If natural, and not clicked called
		if (method != "clicked") {
			// Figure slides
			var currentSlide = $("#containerr .content.active").attr("data-slide");
			var nextSlide = parseInt(currentSlide) + 1;

			// Check if last slide
			if (nextSlide > contentAmt) {
				nextSlide = 1; // Set next slide to be the first slide
				
				// Mobile/Fullscreen end slide transition | show all for a time
				if (compact == true) {
					// Transitioney stuff
					$("#containerr .content:not(.active)").addClass("transition");
					setTimeout(function() {
						$("#containerr .content").removeClass("transition");
					}, transTimer);
				}
			}
		} else { // If clicked, not natural
			nextSlide = clicked;
		} // END if/else
		
		//Remove and add the active class | Make the slides slide
		$("#containerr .content").removeClass("active");
		$("#containerr .content[data-slide='"+nextSlide+"']").addClass("active");
	} // END function
}); // END .ready