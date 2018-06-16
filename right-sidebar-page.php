<?php
/**
 * Template Name: Right Sidebar Page Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cvee
 */

get_header(); ?>

	<div id="primary" class="content-area right_sidebar_page">
		<main id="main" class="site-main right_sidebar_page" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' ); ?>

				<div class="sidebar_widget">
					<?php
			        if ( ! dynamic_sidebar( 'sidebar' ) ) {
				        the_widget( 'WP_Widget_Recent_Posts' );
				        the_widget( 'WP_Widget_Meta' );
				        the_widget( 'WP_Widget_Archives' );
				        the_widget( 'WP_Widget_Categories' );
			        } ?>
			</div> <?php

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			

		</main><!-- #main -->
	</div><!-- #primary -->
<section class="footer-widget">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1') ) :   endif; ?>
		<div class="clearfix"></div>
</section>
<?php
get_footer();
