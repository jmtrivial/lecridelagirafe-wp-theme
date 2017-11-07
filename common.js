

function updateMenu() {
	$("#menu-menu-superieur>li").removeClass("current-menu-item");
	$("#menu-menu-superieur>li").removeClass("current_page_item");
	$("#menu-menu-superieur").children().each(function() {
			var ch_uri = $(this).children("a:first").attr("href");
			if (document.URL == ch_uri || document.URL + "/" == ch_uri || document.URL ==  ch_uri + "/" ) {
				$(this).addClass("current-menu-item");
				$(this).addClass("current_page_item");
			}
	});
	$("#site-navigation").removeClass("toggled-on");
	$( '.menu-toggle' ).on( 'click.suits', function() { nav.toggleClass( 'toggled-on' );} );

}

function updateGeneralRendering() {
	var host = window.location.protocol + "//" + window.location.hostname;
	if (host == document.URL || host + "/" == document.URL) {
		$('body').addClass("home");
	}
	else {
		$('body').removeClass("home");
	}
	$("#navbar").removeClass("lcdlg-menutop");
	$("#lcdlg-bandeau").removeClass("lcdlg-zero");
	updateMenuSticky();
	
	setTimeout(function() {
		updateFilters();
	}, 1000);

}


function updateMenuSticky() {
	var menu = document.querySelector('#navbar');
	var menuPosition = $("#lcdlg-bandeau").height();
	if ($('body').hasClass("home"))
		menuPosition = 0;
	

	window.addEventListener('scroll', function() {
	    if (window.pageYOffset >= menuPosition) {
		$("#navbar").addClass("lcdlg-menutop");
		$("#lcdlg-bandeau").addClass("lcdlg-zero");
	} else {
		$("#navbar").removeClass("lcdlg-menutop");
		$("#lcdlg-bandeau").removeClass("lcdlg-zero");
	 }},
	 { passive: true }
	);
}

function updateFilters() {
	if ($("#lcdlg-toggle-filter").css("border-top-width") == "0px") {
			$("#lcdlg-toggle-filter").css("display", "block");
			$(".beautiful-taxonomy-filters").css("margin-bottom", "0");
			$("body").addClass("lcdlg-filter-off");
			
	
			$( '#lcdlg-toggle-filter' ).on( 'click.suits', function() { 
				if ($("body").hasClass('lcdlg-filter-off')) {
					$("body").removeClass('lcdlg-filter-off');
					$(".select2").css("width", "100%");
				} else
					$("body").addClass('lcdlg-filter-off');
			});
	}
	else {
			$("#lcdlg-toggle-filter").css("display", "none");
			$(".beautiful-taxonomy-filters").css("margin-bottom", "2em");
			$("body").removeClass("lcdlg-filter-off");
	}

}

$(document).ready(function(){
	updateMenuSticky();
	updateFilters();
	$("#site-navigation").removeClass("toggled-on");
	$(window).resize(function() {
		updateFilters();
	});
});
