<?php
/**
 * Template Name: Blog Template
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cvee
 */
get_header(); ?>
<section class="blog_page">
    <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' , 'cvee'); ?>
            <footer class="entry-footer">
                <?php edit_post_link( esc_html__( 'Edit', 'cvee' ), '<span class="edit-link">', '</span>' ); ?>
            </footer><!-- .entry-footer -->
    </header><!-- .entry-header -->


    <div class="blog_wrap"> <?php
            
    // the query
    $args = array(
      'orderby' => 'ASC',
      'posts_per_page' => '10',
      'post__in' => '',
      'ignore_sticky_posts' => 'false',

    );

    $the_query = new WP_Query($args); ?>

    <?php if ($the_query->have_posts()) : ?>
      <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
      <section class="bloglist">
      <div class="second">
        <div class="one">
            <div><a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail(); ?></a></div>
        </div>
        <div class="two">
        <?php $post_tags = get_the_tags();
        if ($post_tags) {
          echo "<p>" . $post_tags[0]->name . "</p>";
        } ?>
          <a class="link" href="<?php the_permalink(); ?>"><h3><?php echo substr(the_title('', '', false), 0, 150); ?></h3></a>
          
          </div>
      </div>
      </section>
      
      <?php endwhile; ?>
      <!-- end of the loop -->

      <?php wp_reset_postdata(); ?>

    <?php else : ?>
      <p><?php esc_html_e('Sorry, no posts matched your criteria.', 'cvee'); ?></p>
    <?php endif; ?> 

                <div class="blog_pagination">
             <?php next_posts_link(__('Older Entries <i class="fas fa-angle-double-right" aria-hidden="true"></i> ', 'cvee'), $the_query->max_num_pages) ?>
             <?php previous_posts_link(__('<i class="fas fa-angle-double-left" aria-hidden="true"></i> Newer Entries ', 'cvee')) ?>
            </div> <div class="clearfix"></div>
        </div>

   

     </div>

</section>


<div class="clearfix"></div>
    <section class="footer-widget">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1') ) :   endif; ?>
        <div class="clearfix"></div>
  	</section>
<?php
get_footer();