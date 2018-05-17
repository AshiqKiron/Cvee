<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cvee
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<!-- post top start -->
    <div class="post_top">
        <header class="entry-header">
            <?php
            
            /* translators: used between list items, there is a space after the comma */
                $categories_list = get_the_category_list( esc_html__( ' ', 'cvee' ) );
                if ( $categories_list ) {
                    /* translators: 1: list of categories. */
                    printf( '<span class="cat-links">' . esc_html__( ' %1$s', 'cvee' ) . '</span>', $categories_list ); // WPCS: XSS OK.
                }
                
            if ( is_singular() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif; ?>

            
        </header><!-- .entry-header -->

        <div class="post-image">
            <?php cvee_post_thumbnail(); ?>
        </div>
	</div>
	<!-- post top end -->

	<!-- post mid start -->
	<div class="post_mid">
		<div class="one">
			<div class="post-content">
			<?php if ( 'post' === get_post_type() ) :
					?>
					<div class="entry-meta">
						<?php
						cvee_posted_on();
						cvee_posted_by();
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</div>

			<footer class="entry-footer">
				<?php cvee_entry_footer(); ?>
			</footer>
		</div>
		
		<div class="two">
			<div class="entry-content">
				<?php
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cvee' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cvee' ),
					'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->
		</div>
		
	</article><!-- #post-<?php the_ID(); ?> -->
</div>
<!-- post mid end -->