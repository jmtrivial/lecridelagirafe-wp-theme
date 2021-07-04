<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package Suits
 * @since Suits 1.0
 */
?>

		</div><!-- #main -->
		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php get_sidebar( 'footer' ); ?>

			<div class="site-info-container">
				<div class="site-info">
					<?php do_action( 'suits_credits' ); ?>
					<?php printf( __( 'Proudly powered by %s', 'suits' ), '<a href="https://wordpress.org/" title="Semantic Personal Publishing Platform">WordPress</a>' ); ?>
					<span class="sep"> &middot; </span>
					Thème adapté de <a href="https://www.themeweaver.net/" title="Theme Developer" rel="designer">Suits</a>
					<span class="sep"> &middot; </span>
					<a href="https://lecridelagirafe.org">Le cri de la girafe</a>
					<span class="sep"> &middot; </span>
					<a href="/wp-admin">admin</a>
				</div><!-- .site-info -->
			</div><!-- .site-info-container -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>
