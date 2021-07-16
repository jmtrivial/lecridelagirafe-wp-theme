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
					<a href="<?php echo get_term_link($term_name);?>/feed/podcasts" class="lcdlg-podcasts">podcast rss <span class="logo" /></a>
					<?php
					$url_itunes = "https://itunes.apple.com/us/podcast/le-cri-de-la-girafe-nos-cris/id1342339823";
					if ($taxonomy == "serie") {
                        $pod = pods( 'serie', $term );
                        if ($pod->field('lien_itunes')) {
                            $url_itunes  = $pod->display('lien_itunes');
                        }
                        else
                            $url_itunes  = "";
					}
					
					if ($url_itunes != "") {
                    ?>
                    <a href="<?php echo $url_itunes; ?>" class="lcdlg-podcasts">podcast itunes <span class="logo" /></a>
                    <?php } ?>
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
						else if ($taxonomy == "serie")
							echo "de la série";
					?> 
					<span class="lcdlg-tag lcdlg-tag-<?php
						if ($taxonomy == "type_de_contenu")
							echo "contenu";
						else
							echo $taxonomy;
					
					?>"><?php echo $term_name->name; ?></span></h1>
				<?php
          if ($taxonomy == "serie") {
            $pod = pods( 'serie', $term );
            print '<div class="archive-meta">';
            if ($pod->field('illustration' )) {
              print "<div class=\"bandeau\"><img src=\"".$pod->display( 'illustration' )."\" /></div>";
            }
            $term_description = term_description();
            if ( ! empty( $term_description ) ) :
              printf('<div class="texte">%s</div>', $term_description );
            endif;
            print "</div>";
          }
          else {
				
            // Show an optional term description.
            $term_description = term_description();
            if ( ! empty( $term_description ) ) :
              printf( '<div class="archive-meta">%s</div>', $term_description );
            endif;
          }
          
					// If a user has filled out their description, show a bio on their entries.
					if ( is_author() && get_the_author_meta( 'description' ) ) : ?>
						<div class="archive-meta">
							<p><?php the_author_meta( 'description' ); ?></p>
						</div><!-- .archive-meta -->
					<?php endif; ?>
			</header><!-- .archive-header -->

			<?php /* The loop */ ?>
			<div class="lcdlg-portfolio">
			<?php 
                $nb = 0;
                while ( have_posts() ) : the_post(); 
						if ($nb % 4 == 0)
							echo "<div class=\"div-4\"> </div>";
						else if ($nb % 2 == 0)
							echo "<div class=\"div-2\"> </div>";
						$nb = $nb + 1;
                ?>
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
