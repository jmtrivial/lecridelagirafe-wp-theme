<?php get_header(); ?>
<?php get_sidebar(); ?>

	<div id="front-page-one" class="front-page-panel">
		<?php if ( is_active_sidebar( 'widgets-front-page-one' ) ) : ?>
                <div class="widget-area">
                        <?php dynamic_sidebar( 'widgets-front-page-one' ); ?>
                </div><!-- .widget-area -->
			<?php endif; ?>
		</div>

			<div id="front-page-two" class="front-page-panel">
		<?php if ( is_active_sidebar( 'widgets-front-page-two' ) ) : ?>
                <div class="widget-area">
                        <?php dynamic_sidebar( 'widgets-front-page-two' ); ?>
                </div><!-- .widget-area -->
			<?php endif; ?>
		</div>

<?php get_footer(); ?>
