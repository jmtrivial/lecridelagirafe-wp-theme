<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Suits
 * @since Suits 1.0
 */

$posts = query_posts( $query_string . '&orderby=title&order=asc' );

get_header();
?>
<?php get_sidebar(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content lcdlg-archive-auteur" role="main">


		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title">Nous, giraphones <small>Qui sommes-nous&nbsp;?</small></h1>
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

			<div id="lcdlg-entete-ng">
				<?php show_post('nous-giraphones'); ?>
			</div>
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php 
					$pod = pods( 'auteur', $post->ID );
					$related = $pod->field( 'visible' );
					if ( ! empty( $related ) && $related) {
						get_template_part( 'content-auteur', get_post_format() ); 
						}
					
				?>
			<?php endwhile; ?>

			<?php suits_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
