

function updateLiensSerie() {
    $('a.lcdlg-dernier').each(function() {
        if ($(this).attr("href") == "") {
            $(this).addClass("lcdlg-a-venir");
            $(this).text("épisode suivant bientôt disponible");
        };
    });
    $('a.lcdlg-premier').each(function() {
        if ($(this).attr("href") == "") {
            $(this).addClass("lcdlg-a-venir");
            $(this).text("épisode précédent bientôt disponible");
        };
    });
}

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


    updateLiensSerie();
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
    updateLiensSerie();

}


function updateMenuSticky() {
  if (jQuery("#lcdlg-bandeau").length) {
    var menu = document.querySelector('#navbar');

    var menuPosition = jQuery("#lcdlg-bandeau").height();
    if (jQuery('body').hasClass("home")) {
      menuPosition = 0;
      $("#navbar").addClass("lcdlg-menutop");
      $("#lcdlg-bandeau").addClass("lcdlg-zero");
    }
    

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
}

function updateFilters() {
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

jQuery(document).ready(function(){
	updateMenuSticky();
	jQuery("#site-navigation").removeClass("toggled-on");
    updateLiensSerie();
});
