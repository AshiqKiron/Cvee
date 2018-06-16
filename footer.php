<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cvee
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" style="clear:both">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'cvee' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'cvee' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				
				<a href="<?php echo esc_url( __( 'https://asphaltthemes.com/', 'cvee' ) ); ?>"><?php esc_attr_e('Asphalt Themes', 'cvee'); ?></a>
				
				
		</div><!-- .site-info -->
		<a href="#" class="scrolltotop"><i class="fas fa-chevron-up"></i></a>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
