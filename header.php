<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Suits
 * @since Suits 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org+/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="alternate" type="application/rss+xml" title="Les podcasts du cri de la girafe" href="http://lecridelagirafe.org/sons/feed/podcasts" />
	<link rel="alternate" type="application/rss+xml" title="Les actualités du cri de la girafe" href="http://lecridelagirafe.org/actualites/feed/" />
	<link rel="image_src" type="image/jpeg" href="<?php echo get_stylesheet_directory_uri(); ?>/images/girafe-accueil.png" />
	<meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/images/girafe-accueil.png" />
	<?php wp_head(); ?>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/common.js"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/player.js"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/jquery.jplayer.js"></script>
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
		
		.site-header .search-field:hover {
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
	</style>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
			<div id="lcdlg-bandeau"><a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<?php $header_image = get_header_image();
				if ( ! empty( $header_image ) && ! display_header_text() ) : ?>
					<img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
				<?php endif; ?>
				<?php if ( is_front_page() ) : ?>
				<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
				<?php else : ?>
				<p class="site-title"><?php bloginfo( 'name' ); ?></p>
				<?php endif; ?>
				<p class="site-description"><?php bloginfo( 'description' ); ?></p>
			</a></div>

			<div id="navbar" class="navbar">
				<nav id="site-navigation" class="navigation main-navigation toggled-on" role="navigation">
					<h4 class="menu-toggle"><?php _e( 'Menu', 'suits' ); ?></h4>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
					<?php get_search_form(); ?>
				</nav><!-- #site-navigation -->
			</div><!-- #navbar -->
		</header><!-- #masthead -->
		
		<div id="lcdlg-bandeaubas" class="lcdlg-hidden">
			<div id="jquery_jplayer"></div>
			<div id="lcdlg-bb-container">
				<div id="lcdlg-bb-c-1"></div>
				<div id="lcdlg-bb-c-2"></div>
				<div id="lcdlg-bb-c-player" class="lcdlg-bb-bloc"></div>
				<div id="lcdlg-bb-c-texte" class="lcdlg-bb-bloc-11"></div>
				<div id="lcdlg-bb-c-9"></div>
				<div id="lcdlg-bb-c-10"></div>
				<div id="lcdlg-bb-c-11"></div>
				<div id="lcdlg-bb-c-12"></div>
				<div id="lcdlg-bb-open">▼</div>
			</div>
		</div>

		<div id="main" class="site-main">
		<div id="player-cache">
		<?php if ( is_active_sidebar( 'sidebar-hidden' ) ) : ?>
                <div class="widget-area">
                        <?php dynamic_sidebar( 'sidebar-hidden' ); ?>
                </div><!-- .widget-area -->
			<?php endif; ?>
		</div>
		
