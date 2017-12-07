<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Suits
 * @since Suits 1.0
 */

get_header(); ?>
<?php get_sidebar(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content lcdlg-archive" role="main">

		
		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<a href="/sons/feed/podcasts" class="lcdlg-podcasts">podcasts <span class="logo" /></a>
				<a href="/sons/feed" class="lcdlg-rss">rss  <span class="logo" /></a>
				<h1 class="archive-title" style="clear: none">Nos cris <small>Productions sonores et radiophoniques</small></h1>
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
			<div>
			<?php
				if (have_posts()) { 
					the_post();
					$first = true;
					echo "<button id=\"lcdlg-toggle-filter\" title=\"Afficher les filtres\">Filtrer...</button>";
					echo "<div class=\"lcdlg-portfolio\">";
					$nb = 0;
					do {
						if ($nb % 4 == 0)
							echo "<div class=\"div-4\"> </div>";
						else if ($nb % 2 == 0)
							echo "<div class=\"div-2\"> </div>";
						$nb = $nb + 1;
						if ($first)
							$first = false;
						else
							the_post(); 
						get_template_part( 'content-son', get_post_format() ); 
					}
					while ( have_posts() );
					echo "</div>";
				}
			?>
			</div>
			<script>
        updateFilters();
			</script>

			<?php suits_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
