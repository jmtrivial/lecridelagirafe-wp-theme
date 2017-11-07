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
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org+/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="alternate" type="application/rss+xml" title="Le podcast du cri de la girafe" href="http://dev.lecridelagirafe.org/sons/feed/" />
	<link rel="alternate" type="application/rss+xml" title="Les actualités du cri de la girafe" href="http://dev.lecridelagirafe.org/actualites/feed/" />
	<?php wp_head(); ?>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/common.js"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/player.js"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/jquery.jplayer.js"></script>
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
		
