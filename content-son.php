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
		<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>

		<?php else : ?>
			<?php if ( has_post_thumbnail() && ! post_password_required() ) : 
			
			
			$pod = pods( 'son', get_the_ID() );
			$duree = $pod->field( 'duree' )[0]["name"];
			?>
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail($size = 'post-thumbnail'); ?></a>
				<div class="duree-popup"><?php echo $duree; ?></div>
			</div>
			<?php endif; ?>

			<h2 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>
			<div class="lcdlg-date"><?php the_time(get_option( 'date_format' ) ); ?></div>
		<?php endif; // is_single() ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() || !is_single()) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php echo excerpt(30); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Lire la suite <span class="meta-nav">&rarr;</span>', 'suits' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'suits' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		
		<?php 
		if (is_single()) 
			{ suits_entry_meta();
		   if ( comments_open() ) {
			 comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'suits' ) . '</span>', __( '1 Comment', 'suits' ), __( '% Comments', 'suits' ) ); 
		   }
		   edit_post_link( __( 'Edit', 'suits' ), '<span class="edit-link">', '</span>' ); 
		 } ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->
