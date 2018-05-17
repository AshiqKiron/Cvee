<?php get_header();  
/**
 * Template Name: Frontpage Template
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
?>


<section class="frontpage-widget">
        <?php
            if ( ! dynamic_sidebar( 'frontpage-1' ) ) {
            the_widget( 'WP_Widget_Text' );
                       } ?>
        <div class="clearfix"></div>
</section>


<div class="clearfix"></div>
    <section class="footer-widget">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1') ) :   endif; ?>
        <div class="clearfix"></div>
  	</section>
<?php
get_footer();