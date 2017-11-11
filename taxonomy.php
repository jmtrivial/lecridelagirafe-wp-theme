<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Suits
 * @since Suits 1.0
 */


 
get_header();
$taxonomy = get_query_var( 'taxonomy' );
$term = get_query_var( 'term' );
$term_name = get_term_by( 'slug', $term, $taxonomy ); 
?>
<?php get_sidebar(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content lcdlg-archive" role="main">
		<?php custom_breadcrumbs(); ?>

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
					<a href="<?php echo get_term_link($term_name);?>/feed/podcasts" class="lcdlg-podcasts">podcasts <span class="logo" /></a>
					<a href="<?php echo get_term_link($term_name);?>/feed" class="lcdlg-rss">rss <span class="logo" /></a>

				<h1 class="archive-title" style="clear: none">Archives 
					<?php 
						if ($taxonomy == "duree")
							echo "des sons d'une durée de ";
						else if ($taxonomy == "type_de_contenu")
							echo "des sons de type";
						else if ($taxonomy == "theme")
							echo "du thème";
						else if ($taxonomy == "recurrence")
							echo "des sons d'une récurrence";
					?> 
					<span class="lcdlg-tag lcdlg-tag-<?php
						if ($taxonomy == "type_de_contenu")
							echo "contenu";
						else
							echo $taxonomy;
					
					?>"><?php echo $term_name->name; ?></span></h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="archive-meta">%s</div>', $term_description );
					endif;

					// If a user has filled out their description, show a bio on their entries.
					if ( is_author() && get_the_author_meta( 'description' ) ) : ?>
						<div class="archive-meta">
							<p><?php the_author_meta( 'description' ); ?></p>
						</div><!-- .archive-meta -->
					<?php endif; ?>
			</header><!-- .archive-header -->

			<?php /* The loop */ ?>
			<div class="lcdlg-portfolio">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
			</div>
			<?php suits_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
