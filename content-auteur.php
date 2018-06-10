<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package Suits
 * @since Suits 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
		<?php if ( is_single() ) : ?>
		<div class="entry-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
		<?php else : ?>
		<div class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a>
		</div>
		<?php endif; // is_single() ?>
		<?php endif; ?>

		<?php if ( is_single() ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2>
		<?php endif; // is_single() ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content( __( 'Lire la suite <span class="meta-nav">&rarr;</span>', 'suits' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'suits' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->
	<?php 
    function cmp($a, $b) {
      return strcmp($b["post_date"], $a["post_date"]);
    }
	
	if(is_single()) {
    			$pod = pods( 'auteur', get_the_ID() );
    			$contributions = $pod->field('contributions');
    			
    			if ($contributions and sizeof($contributions) > 0) {
            echo "<div class=\"auteur-contributions\">";
            echo "<h2>Les cris de ".$pod->field('post_title')."</h2>";
            echo "<ul>";
            usort($contributions, "cmp");
            foreach($contributions as $c) {
              $podc = pods( 'son', $c["ID"] );
              echo "<li>";
              echo "<a class=\"contribution lcdlg-line\" href=\"".$podc->field("permalink") . "\">";
              echo $podc->field("post_thumbnail");
              echo "<span class=\"lcdlg-tag lcdlg-tag-contenu\">";
              $first = true;
              if ($podc->field("type_de_contenu") and sizeof($podc->field("type_de_contenu")) > 0) {
                foreach($podc->field("type_de_contenu") as $typecontenu) {
                  if ($first) 
                    $first = false;
                  else
                    echo ", ";
                  echo $typecontenu["name"];
                }
              }
              echo "</span>";
              echo "<span>".$c["post_title"]."</span> ";
              echo "</a>";
              echo "</li>";
            }
            echo "</ul>";
            echo "</div>";
          }
          
          $contributionsactualite = $pod->field('contributions_actualites');
    			
    			if ($contributionsactualite and sizeof($contributionsactualite) > 0) {
            echo "<div class=\"auteur-contributions-actualites\">";
            echo "<h2>Les échos de ".$pod->field('post_title')."</h2>";
            echo "<ul>";
            usort($contributionsactualite, "cmp");
            foreach($contributionsactualite as $c) {
              $podc = pods( 'actualite', $c["ID"] );
              echo "<li>";
              echo "<a class=\"contribution-actualite lcdlg-line\" href=\"".$podc->field("permalink") . "\">";
              echo $podc->field("post_thumbnail");
              echo "<span>".$c["post_title"]."</span> ";
              echo "</a>";
              echo "</li>";
            }
            echo "</ul>";
            echo "</div>";
          }
	}
	?>

	<footer class="entry-meta">
		<!--?php suits_entry_meta(); ?-->
		<?php if ( comments_open() ) : ?>
			<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'suits' ) . '</span>', __( '1 Comment', 'suits' ), __( '% Comments', 'suits' ) ); ?>
		<?php endif; // comments_open() ?>
		<?php edit_post_link( __( 'Edit', 'suits' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->
