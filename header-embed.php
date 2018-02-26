<?php
/**
 * Contains the post embed header template
 *
 * When a post is embedded in an iframe, this file is used to create the header output
 * if the active theme does not include a header-embed.php template.
 *
 * @package WordPress
 * @subpackage Theme_Compat
 * @since 4.5.0
 */

if ( ! headers_sent() ) {
	header( 'X-WP-embed: true' );
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<title><?php echo wp_get_document_title(); ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php
	/**
	 * Prints scripts or data in the embed template <head> tag.
	 *
	 * @since 4.4.0
	 */
	do_action( 'embed_head' );
	?>
	<style type="text/css">
			@media screen and (min-width : 768px) {
			#main {
				background-color: <?php echo get_theme_mod('main_bg_color'); ?>;
			}
		}
		.site-header {
			background-color: <?php echo get_theme_mod('masthead_color'); ?>;
		}
		#navbar {
			background-color: <?php echo get_theme_mod('menu_bg_color'); ?>;
		}
		.nav-menu .current_page_item > a, .nav-menu .current_page_ancestor > a, .nav-menu .current-menu-item > a, .nav-menu .current-menu-ancestor > a {
			background-color: <?php echo get_theme_mod('menu_bg_color_active'); ?>;
		}
		.nav-menu li:hover > a, .nav-menu li a:hover { 
			background-color: <?php echo get_theme_mod('menu_bg_survol_color'); ?>;
		}
		
		.menu-toggle {
			background-color: <?php echo get_theme_mod('menu_bg_survol_color'); ?> !important;
			color: #fff;
		}
		
    #lcdlg-bb-container {
      background-color: <?php echo get_theme_mod('main_bg_color'); ?>
    }

		.lcdlg-telecommande .lcdlg-t-nom,
		.lcdlg-telecommande .lcdlg-t-duration {
			background-color: <?php echo get_theme_mod('telecommande-main-bg-color'); ?>;
			color: <?php echo get_theme_mod('telecommande-main-txt-color'); ?>;
		}
		
		.lcdlg-telecommande .lcdlg-t-playlist,
		.lcdlg-telecommande .lcdlg-t-play,
		.lcdlg-telecommande .lcdlg-t-pause,
		.lcdlg-telecommande .lcdlg-t-telecharger {
			background-color: <?php echo get_theme_mod('telecommande-button-bg-color'); ?>;
		}
		.lcdlg-telecommande .lcdlg-t-play:hover,
		.lcdlg-telecommande .lcdlg-t-pause:hover,
		.lcdlg-telecommande .lcdlg-t-playlist:hover,
		.lcdlg-telecommande .lcdlg-t-telecharger:hover {
			background-color: <?php echo get_theme_mod('telecommande-button-bg-active-color'); ?>;
		}
		
		body.home #lcdlg-mainmenu {
			/*background: url('<?php echo esc_url( get_option('lcdlg-image-premiere-page') ); ?>') no-repeat center center;*/
		}
		
		#lcdlg-bandeaubas {
			background: <?php echo get_theme_mod('bandeaubas-bg-color-sides'); ?>/*#676b08*/;
		}
		#lcdlg-bb-c-texte {
			background: <?php echo get_theme_mod('bandeaubas-bg-color'); ?>/*#2b2d00*/;
		}
		#jp-title, #jp-title a {
			color:  <?php echo get_theme_mod('bandeaubas-title-color'); ?>/*#fff*/;
		}
		#jp-time .jp-seek-bar {
			background: <?php echo get_theme_mod('bandeaubas-bar-color-fond'); ?>/*#505306*/;
		}
		#jp-time .jp-play-bar {
			background: <?php echo get_theme_mod('bandeaubas-bar-color-progress'); ?>/*#fff*/;
		}
		#jp-time .jp-current-time,
		#jp-time .jp-duration {
			color: <?php echo get_theme_mod('bandeaubas-time-color'); ?>/*#fff*/;
		}
    .son .entry-thumbnail img {
      width: auto;
      height: auto;
    }
    
    .son .lcdlg-telecommande {
      width: calc(100% - 170px);
    }
    @media screen and (max-width : 500px) {
        .son .entry-thumbnail img {
          width: 75px;
          height: 75px;
        }
        .son .lcdlg-telecommande {
          width: 100%;
          clear: both;
      }
    }
     .son .lcdlg-telecommande .lcdlg-t-currenttime {
        background: #efe9e3;
        color: #a7a393;
        float: left;
        width: 50%;
        padding-left: 0.5em;
        height: 1.5em;
     }
     .son .lcdlg-telecommande .lcdlg-t-duration {
        float: left;
        width: 50%;
     }
     .son .lcdlg-telecommande #jp-time {
      background: #efe9e3;
      padding: 0.5em 0;
     }
     .hentry {
        margin-bottom: 0;
        padding-bottom: 2em;
     }
     body, html {
      background: none;
     }
	</style>
</head>
<body <?php body_class(); ?>>
