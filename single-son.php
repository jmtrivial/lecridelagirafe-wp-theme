<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Suits
 * @since Suits 1.0
 */
$lcdlg_single = true;
get_header(); ?>
<?php get_sidebar(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		<?php custom_breadcrumbs(); ?>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content-son', get_post_format() ); ?>
				<?php suits_post_nav(); ?>
				<?php comments_template(); ?>

			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
