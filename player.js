

class LCDLGPlayer {
		constructor() {
			if(! LCDLGPlayer.instance){
				this._data = [];
				LCDLGPlayer.instance = this;
			}
			LCDLGPlayer.instance.tracks = {};
			
			this.active = "";
			this.firstLoad = true;
			return LCDLGPlayer.instance;
		}
		
		initPlayerEmbed(idPlayer, idContainer) {
			this.player = jQuery("#" + idPlayer);
      // create jplayer
      this.idContainer = "lecteur-" + idContainer;
			this.player.jPlayer({
				volume: 1.0,
				cssSelectorAncestor: "#lecteur-" + idContainer,
				cssSelector: {
          currentTime: '.lcdlg-t-currenttime',
				},
        supplied: "mp3",
				autoBlur: false,
				keyEnabled: true,
				play: function() {
					window.player.firstLoad = false;
					window.player.setAllTelecommandesPause();
					setTelecommandePlay(window.player.active);
				},
				pause: function() {
					setTelecommandePause(window.player.active);
				},
        
      });
    }
		
		initPlayer(idPlayer, idContainer, idPlayPause, idText) {
			this.player = jQuery("#" + idPlayer);
			this.idPlayPause = idPlayPause;
			this.idContainer = idContainer;
			// add supplementary elements in idPlayPause and idText
			
			jQuery("#" + idPlayPause).empty().append("<button id=\"jp-play\" class=\"lcdlg-hidden\" href=\"#\" title=\"lecture\"><span>lecture></span></button><button class=\"lcdlg-hidden\" id=\"jp-pause\" href=\"#\" title=\"pause\"><span>pause></span></button>");
			jQuery("#" + idText).empty().append("<div id=\"jp-title\" class=\"lcdlg-hidden\" title=\"écoute en cours\"></div><div class=\"lcdlg-hidden\" id=\"jp-time\"><div class=\"jp-progress\"><div class=\"jp-seek-bar\"><div class=\"jp-play-bar\"></div></div></div><div class=\"jp-current-time\" role=\"timer\" aria-label=\"time\">&nbsp;</div><div class=\"jp-duration\" role=\"timer\" aria-label=\"duration\">&nbsp;</div></div>");
			
			// create jplayer
			this.player.jPlayer({
				volume: 1.0,
				cssSelectorAncestor: "#" + idContainer,
				supplied: "mp3",
				cssSelector: {
					play: "#jp-play",
					pause: "#jp-pause",
					
				},
				play: function() {
					window.player.firstLoad = false;
					window.player.setAllTelecommandesPause();
					setTelecommandePlay(window.player.active);
				},
				pause: function() {
					setTelecommandePause(window.player.active);
				},
				autoBlur: false,
				keyEnabled: true
			});
		}
		
		setAllTelecommandesPause() {
				for (var key in this.tracks) {
					setTelecommandePause(this.tracks[key].id);
				}
		}


		registerTrack(info_track) {
				this.tracks[info_track.id] = info_track;
		}
		
		setDuration(id, duration) {
				this.tracks[id].duration = duration;
		}
		
		isPlaying() {
			if (this.player.data().jPlayer.status.paused) {
				return false;
			}
			else {
				return true;
			}
		}
		isPlayingTrack(id) {
			if (this.active != id) {
				return false;
			}
			else
				return this.isPlaying();
		}
		
		setTrackIfEmpty(id) {
				if (this.firstLoad) {
					this.setTrack(id);
        }
		}
		
		setTrack(id) {
			// Set the track but not play it
			if (this.active != id && this.player) {
				this.player.jPlayer('setMedia', { mp3: this.tracks[id].file });
				this.active = id;
				jQuery("#jp-title").empty().append("<a href=\"" + this.tracks[id].url + "\">" + this.tracks[id].title + "</a>");
				jQuery("#" + this.idContainer + " .lcdlg-hidden").removeClass("lcdlg-hidden");
				jQuery("#" + this.idPlayPause).css("background", "url(\"" + this.tracks[id].image + "\") no-repeat center center");
			}
		}
		play(id) {
			this.setTrack(id);
			this.player.jPlayer("play");
		}
		pause(id) {
				this.player.jPlayer("pause");
		}
		download(id) {
			var url = this.tracks[id].file.split('/').slice(3).join('/');
			window.location = "/wp-content/themes/le-cri-de-la-girafe/dl.php?file=../../../" + url;
		}
		addToPlaylist(id) {
				// TODO
		}

}


function getTrackInfos(selector) {
	var result = [];
	jQuery("." + selector).each(function() {
						var id = selector;
						var file = jQuery(jQuery(this).children("source")[0]).attr("src");
						var title = jQuery(this).attr("title");
						var url = jQuery(jQuery(this).children("a.son-url")[0]).attr("href");
						var image = jQuery(jQuery(this).children("a.image-url")[0]).attr("href");
						result.push({ "id": id, "file": file, "title": title, "url": url, "image": image});
	});
	return result;
}

function dureeHumaine(duration) {
	var sec_num = parseInt(duration, 10); // don't forget the second param
    var hours   = Math.floor(sec_num / 3600);
    var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
    var seconds = sec_num - (hours * 3600) - (minutes * 60);

	var result = "";
	if (hours != 0) {
		if (hours   < 10) {hours   = "0"+hours;}
		result = result + hours + "h ";
	}
	if (minutes != 0 || hours != 0) {
		if (minutes < 10) {minutes = "0"+minutes;}
		result = result + minutes + "mn ";
	}
    if (seconds != 0 || hours != 0 || minutes != 0) {
		if (seconds < 10) {seconds = "0"+seconds;}
		result = result + seconds + "s";
	}
    return result;
}

function setDuration(id, duration) {
	window.player.setDuration(id, duration);
	jQuery("#lecteur-" + id + " .lcdlg-t-duration").replaceWith("<div title=\"durée du cri\" class=\"lcdlg-t-duration\">" + dureeHumaine(duration) + "</div>");
}

function setTelecommandePause(id) {
		jQuery("#lecteur-" + id).addClass("lcdlg-paused");
		jQuery("#lecteur-" + id).removeClass("lcdlg-playing");
}

function setTelecommandePlay(id) {
		jQuery("#lecteur-" + id).removeClass("lcdlg-paused");
		jQuery("#lecteur-" + id).addClass("lcdlg-playing");

}

function remplacerLecteur(info_track, writeTitle, embed = false) {
	var basicLecteur = jQuery("." + info_track.id);
	
	if (basicLecteur.hasClass("pour-player")) {
		basicLecteur.removeClass("pour-player");
		// création du nouveau lecteur
		
		var status = "lcdlg-paused";
		if (window.player && window.player.isPlayingTrack(info_track.id))
			status = "lcdlg-playing";
		
		var dllink = "";
		var dlclass = "";
		if (basicLecteur.find(".lcdlg-dl").length != 0) {
			dllink = "<button class=\"lcdlg-t-telecharger\" title=\"télécharger\"><span>télécharger</span></button>";
			dlclass = "lcdlg-withdl";
		}
		
		var title = "écouter";
    if (writeTitle)
      title = info_track.title;
		
    if (embed) {
      var lecteur = "<div class=\"lcdlg-telecommande " + status + " " + dlclass + "\" id=\"lecteur-" + info_track.id + "\"><button class=\"lcdlg-t-play\" title=\"écouter maintenant\"><span>écouter maintenant</span></button><button class=\"lcdlg-t-pause\" title=\"pause\"><span>pause</span></button><div class=\"lcdlg-t-texte\"><div class=\"lcdlg-t-nom\" title=\"titre du cri\"><span>"+ title + "</span></div><div class=\"lcdlg-t-currenttime\"></div><div class=\"lcdlg-t-duration\"></div></div><div id=\"jp-time\"><div class=\"jp-progress\"><div class=\"jp-seek-bar\"><div class=\"jp-play-bar\"></div></div></div></div></div>" + dllink + "</div>";
    }
    else {
      var lecteur = "<div class=\"lcdlg-telecommande " + status + " " + dlclass + "\" id=\"lecteur-" + info_track.id + "\"><button class=\"lcdlg-t-play\" title=\"écouter maintenant\"><span>écouter maintenant</span></button><button class=\"lcdlg-t-pause\" title=\"pause\"><span>pause</span></button><div class=\"lcdlg-t-texte\"><div class=\"lcdlg-t-nom\" title=\"titre du cri\"><span>"+ title + "</span></div><div class=\"lcdlg-t-duration\"></div></div><!-- button class=\"lcdlg-t-playlist\"  title=\"écouter plus tard\"><span>écouter plus tard</span></button-->" + dllink + "</div>";
    }
    
		// ajout du nouveau lecteur à la page
		basicLecteur.before(lecteur);

     if (!embed) {
        // configuration des boutons
        jQuery("#lecteur-" + info_track.id + ">.lcdlg-t-play").click(function() {
          window.player.play(info_track.id);
          setTelecommandePlay(info_track.id);
        });
        jQuery("#lecteur-" + info_track.id + ">.lcdlg-t-pause").click(function() {
          window.player.pause(info_track.id);
          setTelecommandePause(info_track.id);
        });
        jQuery("#lecteur-" + info_track.id + ">.lcdlg-t-playlist").click(function() {
          window.player.addToPlaylist(info_track.id);
        });
        jQuery("#lecteur-" + info_track.id + ">.lcdlg-t-telecharger").click(function(e) {
          e.preventDefault();
          window.player.download(info_track.id);
        });
      }
    
		
		// la durée sera affichée une fois connue
		if (isNaN(basicLecteur[0].duration)) {
			basicLecteur[0].addEventListener("loadedmetadata", function(_event) {
				var duration = basicLecteur[0].duration;
				setDuration(info_track.id, duration);
				// suppression de l'ancien lecteur
				basicLecteur.css("display", "none");
			});
		}
		else {
			var duration = basicLecteur[0].duration;
			setDuration(info_track.id, duration);
			// suppression de l'ancien lecteur
			basicLecteur.css("display", "none");
		}
		basicLecteur.css("width", "0");
	}
}

function ajouterLecteurByClass(classSelector, setPlayerIfEmpty = false, setInterface = true, writeTitle = true, embed = false) {
	jQuery(document).ready(function(){
		var infos = getTrackInfos(classSelector);
		for (info of infos) {
			// enregistrement de la track dans le lecteur
      if (typeof window.player !== 'undefined') {
        window.player.registerTrack(info);
        if (setPlayerIfEmpty)
          window.player.setTrackIfEmpty(info.id);
      }
      // créer l'interface de la track
      if (setInterface)
        remplacerLecteur(info, writeTitle, embed);
      
		}
	});
}


jQuery(document).ready(function(){
	
  if (jQuery("#lcdlg-bandeaubas").length) {
    console.log("test");
    jQuery("#lcdlg-bandeaubas").removeClass("lcdlg-hidden");
    jQuery(".zaback").addClass("with-bb");
    jQuery(".site-info-container").addClass("with-bb");
    
    window.player = new LCDLGPlayer();
    
    window.player.initPlayer("jquery_jplayer", "lcdlg-bb-container", "lcdlg-bb-c-player", "lcdlg-bb-c-texte");
  }
});
