<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Suits
 * @since Suits 1.0
 */

get_header(); ?>
<?php get_sidebar(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content lcdlg-search" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'suits' ), get_search_query() ); ?></h1>
			</header>

			<?php 
                $nb = 0;
                /* The loop */ ?>
			<?php while ( have_posts() ) : 
                if ($nb % 4 == 0)
							echo "<div class=\"div-4\"> </div>";
						else if ($nb % 2 == 0)
							echo "<div class=\"div-2\"> </div>";
						$nb = $nb + 1;
						
                the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php suits_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
