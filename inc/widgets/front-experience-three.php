<?php


/*************************************************
 * Experience Three Widget
 **************************************************/

/**
 * Register the Widget
 */
function cvee_experience_three_widget()
{
    register_widget('cvee_experience_three_widget');
}
add_action('widgets_init', 'cvee_experience_three_widget');


class cvee_experience_three_widget extends WP_Widget
{
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname'                   => 'cvee_experience_three_widget',
            'description'                 => esc_html__('CVEE Experience Widget Three', 'cvee'),
            'customize_selective_refresh' => true
        );

        parent::__construct('cvee_experience_three_widget', 'Experience Widget Three', $widget_ops);

        add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_action('admin_enqueue_styles', array($this, 'upload_styles'));
        add_action('admin_footer-widgets.php', array($this, 'print_scripts'), 9999);
        add_action('wp_enqueue_scripts', array(&$this, 'cvee_intro1_css'));

    }


    /**
     * Upload the Javascripts for the media uploader
     */
    public function upload_scripts()
    {
        if (function_exists('wp_enqueue_media')) {

            wp_enqueue_media();
        }
        wp_enqueue_script('cvee_experience_three_widget', get_template_directory_uri() . '/js/media-upload.js');
    }


    /**
     * Enqueue scripts.
     *
     * @since 1.0
     *
     * @param string $hook_suffix
     */
    public function enqueue_scripts($hook_suffix)
    {
        if ('widgets.php' !== $hook_suffix) {
            return;
        }

        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
        wp_enqueue_script('underscore');
    }



    /**
     * Print scripts.
     *
     * @since 1.0
     */
    public function print_scripts()
    {
        ?>
    <script>
      ( function( $ ){
        function initColorPicker( widget ) {
          widget.find( '.color-picker' ).wpColorPicker( {
            change: _.throttle( function() { // For Customizer
              $(this).trigger( 'change' );
            }, 3000 )
          });
        }

        function onFormUpdate( event, widget ) {
          initColorPicker( widget );
        }

        $( document ).on( 'widget-added widget-updated', onFormUpdate );

        $( document ).ready( function() {
          $( '#widgets-right .widget:has(.color-picker)' ).each( function () {
            initColorPicker( $( this ) );
          } );
        } );
      }( jQuery ) );
    </script>
    <?php

}



/**
 * Front-end display of widget.
 *
 * @see WP_Widget::widget()
 *
 * @param array $args     Widget arguments.
 * @param array $instance Saved values from database.
 */
public function widget($args, $instance)
{

    $icon1       = isset($instance['icon1']) ? apply_filters('widget_title', $instance['icon1']) : 'fas fa-paperclip';
    $title       = isset($instance['title']) ? apply_filters('widget_title', $instance['title'], $instance, $this->id_base) : esc_attr__('Work Experience', 'cvee');


    $exp1time    = isset($instance['exp1time']) ? apply_filters('', $instance['exp1time']) : esc_attr__('September 2013 - February 2014', 'cvee');
    $exp1desig   = isset($instance['exp1desig']) ? apply_filters('', $instance['exp1desig']) : esc_attr__('UI Designer', 'cvee');
    $exp1com     = isset($instance['exp1com']) ? apply_filters('', $instance['exp1com']) : esc_attr__('Arthus University', 'cvee');
    $exp1comsite = isset($instance['exp1comsite']) ? apply_filters('', $instance['exp1comsite']) : esc_attr__('au.dk.com', 'cvee');
    $exp1detail  = isset($instance['exp1detail']) ? apply_filters('', $instance['exp1detail']) : esc_attr__('dolorLorem ipsum dolorLorem ipsum dolorLorem ipsum dolorLorem ipsum dolorLorem ips dolor Lorem ipsum dolor Lorem ipsum dolorLorem ipsum. um dolorLorem ipsum dolorLorem ipsum dolorLorem ipsum dolorLorem ipsum dolorLorem ips dolor Lorem ipsum dolor Lorem ipsum dolorLorem ipsum', 'cvee');

    $exp2time    = isset($instance['exp2time']) ? apply_filters('', $instance['exp2time']) : esc_attr__('September 2013 - February 2014', 'cvee');
    $exp2desig   = isset($instance['exp2desig']) ? apply_filters('', $instance['exp2desig']) : esc_attr__('UI Designer', 'cvee');
    $exp2com     = isset($instance['exp2com']) ? apply_filters('', $instance['exp2com']) : esc_attr__('Arthus University', 'cvee');
    $exp2comsite = isset($instance['exp2comsite']) ? apply_filters('', $instance['exp2comsite']) : esc_attr__('au.dk.com', 'cvee');
    $exp2detail  = isset($instance['exp2detail']) ? apply_filters('', $instance['exp2detail']) : esc_attr__('dolorLorem ipsum dolorLorem ipsum dolorLorem ipsum dolorLorem ipsum dolorLorem ips dolor Lorem ipsum dolor Lorem ipsum dolorLorem ipsum. um dolorLorem ipsum dolorLorem ipsum dolorLorem ipsum dolorLorem ipsum dolorLorem ips dolor Lorem ipsum dolor Lorem ipsum dolorLorem ipsum', 'cvee');



    $exp3time     = isset($instance['exp3time']) ? apply_filters('', $instance['exp3time']) : esc_attr__('September 2013 - February 2014', 'cvee');
    $exp3desig    = isset($instance['exp3desig']) ? apply_filters('', $instance['exp3desig']) : esc_attr__('UI Designer', 'cvee');
    $exp3com      = isset($instance['exp3com']) ? apply_filters('', $instance['exp3com']) : esc_attr__('Arthus University', 'cvee');
    $exp3comsite  = isset($instance['exp3comsite']) ? apply_filters('', $instance['exp3comsite']) : esc_attr__('au.dk.com', 'cvee');
    $exp3detail   = isset($instance['exp3detail']) ? apply_filters('', $instance['exp3detail']) : esc_attr__('dolorLorem ipsum dolorLorem ipsum dolorLorem ipsum dolorLorem ipsum dolorLorem ips dolor Lorem ipsum dolor Lorem ipsum dolorLorem ipsum. um dolorLorem ipsum dolorLorem ipsum dolorLorem ipsum dolorLorem ipsum dolorLorem ips dolor Lorem ipsum dolor Lorem ipsum dolorLorem ipsum', 'cvee');


    $exp4time     = isset($instance['exp4time']) ? apply_filters('', $instance['exp4time']) : esc_attr__('September 2013 - February 2014', 'cvee');
    $exp4desig    = isset($instance['exp4desig']) ? apply_filters('', $instance['exp4desig']) : esc_attr__('UI Designer', 'cvee');
    $exp4com      = isset($instance['exp4com']) ? apply_filters('', $instance['exp4com']) : esc_attr__('Arthus University', 'cvee');
    $exp4comsite  = isset($instance['exp4comsite']) ? apply_filters('', $instance['exp4comsite']) : esc_attr__('au.dk.com', 'cvee');
    $exp4detail   = isset($instance['exp4detail']) ? apply_filters('', $instance['exp4detail']) : esc_attr__('dolorLorem ipsum dolorLorem ipsum dolorLorem ipsum dolorLorem ipsum dolorLorem ips dolor Lorem ipsum dolor Lorem ipsum dolorLorem ipsum. um dolorLorem ipsum dolorLorem ipsum dolorLorem ipsum dolorLorem ipsum dolorLorem ips dolor Lorem ipsum dolor Lorem ipsum dolorLorem ipsum', 'cvee');


    $exp5time     = isset($instance['exp5time']) ? apply_filters('', $instance['exp5time']) : esc_attr__('September 2013 - February 2014', 'cvee');
    $exp5desig    = isset($instance['exp5desig']) ? apply_filters('', $instance['exp5desig']) : esc_attr__('UI Designer', 'cvee');
    $exp5com      = isset($instance['exp5com']) ? apply_filters('', $instance['exp5com']) : esc_attr__('Arthus University', 'cvee');
    $exp5comsite  = isset($instance['exp5comsite']) ? apply_filters('', $instance['exp5comsite']) : esc_attr__('au.dk.com', 'cvee');
    $exp5detail   = isset($instance['exp5detail']) ? apply_filters('', $instance['exp5detail']) : esc_attr__('dolorLorem ipsum dolorLorem ipsum dolorLorem ipsum dolorLorem ipsum dolorLorem ips dolor Lorem ipsum dolor Lorem ipsum dolorLorem ipsum. um dolorLorem ipsum dolorLorem ipsum dolorLorem ipsum dolorLorem ipsum dolorLorem ips dolor Lorem ipsum dolor Lorem ipsum dolorLorem ipsum', 'cvee');


    $exptimecolor   = isset($instance['exptimecolor']) ? $instance['exptimecolor'] : '';
    $expdesigcolor  = isset($instance['expdesigcolor']) ? $instance['expdesigcolor'] : '';
    $expcomcolor    = isset($instance['expcomcolor']) ? $instance['expcomcolor'] : '';
    $expdetailcolor = isset($instance['expdetailcolor']) ? $instance['expdetailcolor'] : '';

    $iconcolor      = isset($instance['iconcolor']) ? $instance['iconcolor'] : '';
    $titlecolor     = isset($instance['titlecolor']) ? $instance['titlecolor'] : '';
    $bgcolor        = isset($instance['bgcolor']) ? $instance['bgcolor'] : '';
            
          
 
    /* Before widget (defined by themes). */
    echo $args['before_widget'];

    echo '<section class="experience3">
                    <div class="wrap">
                    <div class="first">';

    echo '<i class="';
    if (isset($icon1) && !empty($icon1)) {
        echo '' . ($icon1) . '';
    }

    echo '"></i>';

    if (isset($title) && !empty($title)) {
        echo '<h3 itemprop="text">' . esc_html(do_shortcode($title)) . '</h3>';
    }

    echo '</div>
          <div class="second">';

    if (isset($exp1desig) && !empty($exp1desig)) {
        echo '<div class="company">
        <div class="one">
        <p class="designation" itemprop="text">' . esc_html(do_shortcode($exp1desig)) . '</p>';
    }

    if (isset($exp1com) && !empty($exp1com)) {
        echo '<p class="comname" itemprop="text">' . esc_html(do_shortcode($exp1com)) . '<br>';
    }

    if (isset($exp1comsite) && !empty($exp1comsite)) {
        echo '<a href="' . esc_url(do_shortcode($exp1comsite)) . '" itemprop="url">' . esc_html(do_shortcode($exp1comsite)) . '</a></p>';
    }

    if (isset($exp1time) && !empty($exp1time)) {
        echo '<p class="timeline" itemprop="text">' . esc_html(do_shortcode($exp1time)) . '</p>';
    }

    echo '</div>
          <div class="cominfo">';
    if (isset($exp1detail) && !empty($exp1detail)) {
        echo '<p class="detail" itemprop="text">' . esc_html(do_shortcode($exp1detail)) . '</p></div></div>';
    }



    if (isset($exp2desig) && !empty($exp2desig)) {
        echo '<div class="company">
        <div class="one">
        <p class="designation" itemprop="text">' . esc_html(do_shortcode($exp2desig)) . '</p>';
    }

    if (isset($exp2com) && !empty($exp2com)) {
        echo '<p class="comname" itemprop="text">' . esc_html(do_shortcode($exp2com)) . '<br>';
    }

    if (isset($exp2comsite) && !empty($exp2comsite)) {
        echo '<a href="' . esc_url(do_shortcode($exp2comsite)) . '" itemprop="url">' . esc_html(do_shortcode($exp2comsite)) . '</a></p>';
    }

    if (isset($exp2time) && !empty($exp2time)) {
        echo '<p class="timeline" itemprop="text">' . esc_html(do_shortcode($exp2time)) . '</p>';
    }

    echo '</div>
          <div class="cominfo">';
    if (isset($exp2detail) && !empty($exp2detail)) {
        echo '<p class="detail" itemprop="text">' . esc_html(do_shortcode($exp2detail)) . '</p></div></div>';
    }




    if (isset($exp3desig) && !empty($exp3desig)) {
        echo '<div class="company">
        <div class="one">
        <p class="designation" itemprop="text">' . esc_html(do_shortcode($exp3desig)) . '</p>';
    }

    if (isset($exp3com) && !empty($exp3com)) {
        echo '<p class="comname" itemprop="text">' . esc_html(do_shortcode($exp3com)) . '<br>';
    }

    if (isset($exp3comsite) && !empty($exp3comsite)) {
        echo '<a href="' . esc_url(do_shortcode($exp3comsite)) . '" itemprop="url">' . esc_html(do_shortcode($exp3comsite)) . '</a></p>';
    }

    if (isset($exp3time) && !empty($exp3time)) {
        echo '<p class="timeline" itemprop="text">' . esc_html(do_shortcode($exp3time)) . '</p>';
    }

    echo '</div>
          <div class="cominfo">';
    if (isset($exp3detail) && !empty($exp3detail)) {
        echo '<p class="detail" itemprop="text">' . esc_html(do_shortcode($exp3detail)) . '</p></div></div>';
    }



    if (isset($exp4desig) && !empty($exp4desig)) {
        echo '<div class="company">
        <div class="one">
        <p class="designation" itemprop="text">' . esc_html(do_shortcode($exp4desig)) . '</p>';
    }

    if (isset($exp4com) && !empty($exp4com)) {
        echo '<p class="comname" itemprop="text">' . esc_html(do_shortcode($exp4com)) . '<br>';
    }

    if (isset($exp4comsite) && !empty($exp4comsite)) {
        echo '<a href="' . esc_url(do_shortcode($exp4comsite)) . '" itemprop="url">' . esc_html(do_shortcode($exp4comsite)) . '</a></p>';
    }

    if (isset($exp4time) && !empty($exp4time)) {
        echo '<p class="timeline" itemprop="text">' . esc_html(do_shortcode($exp4time)) . '</p>';
    }

    echo '</div>
          <div class="cominfo">';
    if (isset($exp4detail) && !empty($exp4detail)) {
        echo '<p class="detail" itemprop="text">' . esc_html(do_shortcode($exp4detail)) . '</p></div></div>';
    }



    if (isset($exp5desig) && !empty($exp5desig)) {
        echo '<div class="company">
        <div class="one">
        <p class="designation" itemprop="text">' . esc_html(do_shortcode($exp5desig)) . '</p>';
    }

    if (isset($exp5com) && !empty($exp5com)) {
        echo '<p class="comname" itemprop="text">' . esc_html(do_shortcode($exp5com)) . '<br>';
    }

    if (isset($exp5comsite) && !empty($exp5comsite)) {
        echo '<a href="' . esc_url(do_shortcode($exp5comsite)) . '" itemprop="url">' . esc_html(do_shortcode($exp5comsite)) . '</a></p>';
    }

    if (isset($exp5time) && !empty($exp5time)) {
        echo '<p class="timeline" itemprop="text">' . esc_html(do_shortcode($exp5time)) . '</p>';
    }

    echo '</div>
          <div class="cominfo">';
    if (isset($exp5detail) && !empty($exp5detail)) {
        echo '<p class="detail" itemprop="text">' . esc_html(do_shortcode($exp5detail)) . '</p></div></div>';
    }



    echo '</div></div></section>';


    if (is_customize_preview()) {
        $id             = $this->id;

        $exptimecolor   = 'color:#999;';
        $expdesigcolor  = 'color:#000;';
        $expcomcolor    = 'color:#444;';
        $expdetailcolor = 'color:#777;';

        $titlecolor     = 'color:#333;';
        $bgcolor        = 'background-color:#f3f2ee;';
        $iconcolor      = 'color:rgba(38,37,37,.1)';



        if (!empty($instance['exptimecolor'])) {
            $exptimecolor   = 'color: ' . $instance['exptimecolor'] . '; ';
        }
        if (!empty($instance['expdesigcolor'])) {
            $expdesigcolor  = 'color: ' . $instance['expdesigcolor'] . '; ';
        }
        if (!empty($instance['expcomcolor'])) {
            $expcomcolor    = 'color: ' . $instance['expcomcolor'] . '; ';
        }
        if (!empty($instance['expdetailcolor'])) {
            $expdetailcolor = 'color: ' . $instance['expdetailcolor'] . '; ';
        }

        if (!empty($instance['titlecolor'])) {
            $titlecolor     = 'color: ' . $instance['titlecolor'] . '; ';
        }
        if (!empty($instance['iconcolor'])) {
            $iconcolor      = '' . $instance['iconcolor'] . '; ';
        }
        if (!empty($instance['bgcolor'])) {
            $bgcolor        = 'background-color:' . $instance['bgcolor'] . '; ';
        }


        echo '<style>' . '#' . $id . ' .experience3 .first h3 {' . $titlecolor . '}#' . $id . ' .experience3 .first .svg-inline--fa { ' . $iconcolor . '}#' . $id . ' .experience3 {' . $bgcolor . '}#' . $id . ' .experience3  {' . $bgcolor . '}#' . $id . ' .experience3 .company .timeline {' . $exptimecolor . '}#' . $id . ' .experience3 .company .designation {' . $expdesigcolor . '}#' . $id . ' .experience3 .company .comname {' . $expcomcolor . '}#' . $id . ' .experience3 .company comname a, .experience3 a {' . $expcomcolor . '}#' . $id . ' .experience3 .company .detail {' . $expdetailcolor . '}</style>';

    }
  
    /* After widget (defined by themes). */
    echo $args['after_widget'];
}
/**
 * Back-end widget form.
 *
 * @see WP_Widget::form()
 *
 * @param array $instance Previously saved values from database.
 */
public function form($instance)
{
        /* Set up some default widget settings. */
    $defaults = array(
        'title'        => esc_attr__('Work Experience', 'cvee'),
        'titlecolor'   => '#333',
        'icon1'        => __('fas fa-paperclip', 'cvee') ,
        'iconcolor'    => 'rgba(38,37,37,.1)',
        'bgcolor'      => '#f3f2ee',
        'exptimecolor'   => '#999',
        'expdesigcolor'  => '#000',
        'expcomcolor'    => '#444',
        'expdetailcolor' => '#777',
        'exp1time'     => esc_attr__('September 2013 - February 2014', 'cvee'),
        'exp1desig'    => esc_attr__('UI Designer', 'cvee'),
        'exp1com'      => esc_attr__('Asphalt Themes', 'cvee'),
        'exp1comsite'  => esc_attr__('https://asphaltthemes.com', 'cvee'),
        'exp1detail'   => esc_attr__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus iaculis metus et libero dictum, vitae suscipit orci ornare. Pellentesque bibendum quam at nunc porta congue. Nunc nulla erat, feugiat non purus a, efficitur accumsan lectus. Proin neque augue, cursus et feugiat et, faucibus sit amet lectus.', 'cvee'),
        'exp2time'     => esc_attr__('September 2013 - February 2014', 'cvee'),
        'exp2desig'    => esc_attr__('UI Designer', 'cvee'),
        'exp2com'      => esc_attr__('Asphalt Themes', 'cvee'),
        'exp2comsite'  => esc_attr__('https://asphaltthemes.com', 'cvee'),
        'exp2detail'   => esc_attr__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus iaculis metus et libero dictum, vitae suscipit orci ornare. Pellentesque bibendum quam at nunc porta congue. Nunc nulla erat, feugiat non purus a, efficitur accumsan lectus. Proin neque augue, cursus et feugiat et, faucibus sit amet lectus.', 'cvee'),
        'exp3time'     => esc_attr__('September 2013 - February 2014', 'cvee'),
        'exp3desig'    => esc_attr__('UI Designer', 'cvee'),
        'exp3com'      => esc_attr__('Asphalt Themes', 'cvee'),
        'exp3comsite'  => esc_attr__('https://asphaltthemes.com', 'cvee'),
        'exp3detail'   => esc_attr__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus iaculis metus et libero dictum, vitae suscipit orci ornare. Pellentesque bibendum quam at nunc porta congue. Nunc nulla erat, feugiat non purus a, efficitur accumsan lectus. Proin neque augue, cursus et feugiat et, faucibus sit amet lectus.', 'cvee'),
        'exp4time'     => esc_attr__('September 2013 - February 2014', 'cvee'),
        'exp4desig'    => esc_attr__('UI Designer', 'cvee'),
        'exp4com'      => esc_attr__('Asphalt Themes', 'cvee'),
        'exp4comsite'  => esc_attr__('https://asphaltthemes.com', 'cvee'),
        'exp4detail'   => esc_attr__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus iaculis metus et libero dictum, vitae suscipit orci ornare. Pellentesque bibendum quam at nunc porta congue. Nunc nulla erat, feugiat non purus a, efficitur accumsan lectus. Proin neque augue, cursus et feugiat et, faucibus sit amet lectus.', 'cvee'),
        'exp5time'     => esc_attr__('September 2013 - February 2014', 'cvee'),
        'exp5desig'    => esc_attr__('UI Designer', 'cvee'),
        'exp5com'      => esc_attr__('Asphalt Themes', 'cvee'),
        'exp5comsite'  => esc_attr__('https://asphaltthemes.com', 'cvee'),
        'exp5detail'   => esc_attr__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus iaculis metus et libero dictum, vitae suscipit orci ornare. Pellentesque bibendum quam at nunc porta congue. Nunc nulla erat, feugiat non purus a, efficitur accumsan lectus. Proin neque augue, cursus et feugiat et, faucibus sit amet lectus.', 'cvee'),

    );


    $instance = wp_parse_args((array)$instance, $defaults);


    ?>
        <!-- Icon One -->
       <p>
          <label for="<?php echo $this->get_field_id('icon1'); ?>"><?php _e('<b>Icon:</b>', 'cvee') ?></label>

          <select id="<?php echo $this->get_field_id('icon1'); ?>" name="<?php echo $this->get_field_name('icon1'); ?>" class="widefat">
            <option value="fas fa-paperclip" <?php if ('fas fa-paperclip' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Paper Clip', 'cvee') ?></option>  
            <option value="far fa-address-book" <?php if ('far fa-address-book' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Address Book', 'cvee') ?></option>
            <option value="far fa-address-card" <?php if ('far fa-address-card' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Address Card', 'cvee') ?></option>
            <option value="fas fa-align-justify" <?php if ('fas fa-align-justify' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Align Justify', 'cvee') ?></option>
            <option value="fas fa-angle-double-right" <?php if ('fas fa-angle-double-right' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Align Double Right', 'cvee') ?></option>
            <option value="fas fa-angle-double-left" <?php if ('fas fa-angle-double-left' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Double Left', 'cvee') ?></option>
            <option value="fas fa-angle-right" <?php if ('fas fa-angle-right' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Angle Right', 'cvee') ?></option>
            <option value="fas fa-angle-left" <?php if ('fas fa-angle-left' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Angle Left', 'cvee') ?></option>
            <option value="fas fa-angle-double-down" <?php if ('fas fa-angle-double-down' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Angle Double Down', 'cvee') ?></option>
            <option value="fas fa-angle-down" <?php if ('fas fa-angle-down' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Angle Down', 'cvee') ?></option>
            <option value="far fa-arrow-alt-circle-down" <?php if ('far fa-arrow-alt-circle-down' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Circle Arrow Down', 'cvee') ?></option>
            <option value="far fa-arrow-alt-circle-left" <?php if ('far fa-arrow-alt-circle-left' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Circle Arrow Left', 'cvee') ?></option>
            <option value="far fa-arrow-alt-circle-right" <?php if ('far fa-arrow-alt-circle-right' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Circle Arrow Right', 'cvee') ?></option>
            <option value="fas fa-arrow-down" <?php if ('fas fa-arrow-down' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Arrow Down', 'cvee') ?></option>
            <option value="fas fa-arrow-right" <?php if ('fas fa-arrow-right' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Arrow Right', 'cvee') ?></option>
            <option value="fas fa-arrow-left" <?php if ('dribbfas fa-arrow-leftble' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Arrow Left', 'cvee') ?></option>
            <option value="fas fa-asterisk" <?php if ('fas fa-asterisk' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Asterisk', 'cvee') ?></option>
            <option value="far fa-bell" <?php if ('far fa-bell' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Bell', 'cvee') ?></option>
            <option value="fas fa-bolt" <?php if ('fas fa-bolt' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Bolt', 'cvee') ?></option>
            <option value="far fa-bookmark" <?php if ('far fa-bookmark' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Bookmark', 'cvee') ?></option>
            <option value="fas fa-bullseye" <?php if ('fas fa-bullseye' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Bullseye', 'cvee') ?></option>
            <option value="fas fa-briefcase" <?php if ('fas fa-briefcase' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Briefcase', 'cvee') ?></option>
            <option value="far fa-calendar" <?php if ('far fa-calendar' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Calendar', 'cvee') ?></option>
            <option value="fas fa-calendar-plus" <?php if ('fas fa-calendar-plus' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Calendar Plus', 'cvee') ?></option>
            <option value="fas fa-caret-right" <?php if ('fas fa-caret-right' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Caret Right', 'cvee') ?></option>
            <option value="far fa-caret-square-right" <?php if ('far fa-caret-square-right' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Caret Square Right', 'cvee') ?></option>
            <option value="fas fa-certificate" <?php if ('fas fa-certificate' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Certificate', 'cvee') ?></option>
            <option value="fas fa-check" <?php if ('fas fa-check' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Check', 'cvee') ?></option>
            <option value="fas fa-check-circle" <?php if ('fas fa-check-circle' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Check Circle', 'cvee') ?></option>
            <option value="fas fa-check-square" <?php if ('fas fa-check-square' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Check Square', 'cvee') ?></option>
            <option value="fas fa-chevron-circle-right" <?php if ('fas fa-chevron-circle-right' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Circle Right', 'cvee') ?></option>
            <option value="far fa-circle" <?php if ('far fa-circle' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Circle', 'cvee') ?></option>
            <option value="fas fa-circle" <?php if ('fas fa-circle' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Circle Fill', 'cvee') ?></option>
            <option value="fas fa-cog" <?php if ('fas fa-cog' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Cog', 'cvee') ?></option>
            <option value="fas fa-compress" <?php if ('fas fa-compress' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Compress', 'cvee') ?></option>
            <option value="fas fa-dot-circle" <?php if ('fas fa-dot-circle' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Dot Circle', 'cvee') ?></option>
            <option value="far fa-dot-circle" <?php if ('far fa-dot-circle' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Dot Circle 2', 'cvee') ?></option>
            <option value="far fa-envelope" <?php if ('far fa-envelope' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Envelope', 'cvee') ?></option>
            <option value="fas fa-genderless" <?php if ('fas fa-genderless' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Genderless', 'cvee') ?></option>
            <option value="fas fa-hashtag" <?php if ('fas fa-hashtag' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Hashtag', 'cvee') ?></option>
            <option value="far fa-id-badge" <?php if ('far fa-id-badge' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('ID Badge', 'cvee') ?></option>
            <option value="far fa-id-card" <?php if ('far fa-id-card' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('ID Card', 'cvee') ?></option>
            <option value="fas fa-info" <?php if ('fas fa-info' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Info', 'cvee') ?></option>
            <option value="fas fa-info-circle" <?php if ('fas fa-info-circle' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Info Circle', 'cvee') ?></option>
            <option value="far fa-lightbulb" <?php if ('far fa-lightbulb' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Lightbulb', 'cvee') ?></option>
            <option value="fas fa-long-arrow-alt-right" <?php if ('fas fa-long-arrow-alt-right' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Arrow Right', 'cvee') ?></option>
            <option value="far fa-map" <?php if ('far fa-map' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Map', 'cvee') ?></option>
            <option value="fas fa-map-marker-alt" <?php if ('fas fa-map-marker-alt' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Map Marker', 'cvee') ?></option>
            <option value="fas fa-map-pin" <?php if ('fas fa-map-pin' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Map Pin', 'cvee') ?></option>
            <option value="fas fa-minus-circle" <?php if ('fas fa-minus-circle' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Minu Circle', 'cvee') ?></option>
            <option value="fas fa-minus" <?php if ('fas fa-minus' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Minus', 'cvee') ?></option>
            <option value="far fa-minus-square" <?php if ('far fa-minus-square' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Minus Square', 'cvee') ?></option>
            <option value="fas fa-play" <?php if ('fas fa-play' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Play', 'cvee') ?></option>
            <option value="fas fa-plus" <?php if ('fas fa-plus' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Plus', 'cvee') ?></option>
            <option value="fas fa-plus-square" <?php if ('fas fa-plus-square' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Plus Square', 'cvee') ?></option>
            <option value="far fa-plus-square" <?php if ('far fa-plus-square' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Plus Square 2', 'cvee') ?></option>
            <option value="fas fa-square" <?php if ('fas fa-square' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Square', 'cvee') ?></option>
            <option value="far fa-star" <?php if ('far fa-star' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Star', 'cvee') ?></option>
            <option value="fas fa-star" <?php if ('fas fa-star' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Star 2', 'cvee') ?></option>
            <option value="far fa-sun" <?php if ('far fa-sun' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Sun', 'cvee') ?></option>
            <option value="fas fa-th-large" <?php if ('fas fa-th-large' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Box Square', 'cvee') ?></option>
            <option value="fas fa-times" <?php if ('fas fa-times' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Times', 'cvee') ?></option>
            <option value="far fa-window-close" <?php if ('far fa-window-close"' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Window Close', 'cvee') ?></option>

            </select>
        </p>

        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id('iconcolor'); ?>"><?php _e('Icon Color', 'cvee') ?></label>
          <input class="widefat color-picker"  id="<?php echo $this->get_field_id('iconcolor'); ?>" name="<?php echo $this->get_field_name('iconcolor'); ?>" value="<?php echo $instance['iconcolor']; ?>" type="text" />
        </p>
        
        <br>
        <!-- Title -->
        <p>
            <label for="<?php echo $this->get_field_name('title'); ?>"><?php esc_html_e('Title', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
        </p>
        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id('titlecolor'); ?>"><?php _e('Color', 'cvee') ?></label>
          <input class="widefat color-picker"  id="<?php echo $this->get_field_id('titlecolor'); ?>" name="<?php echo $this->get_field_name('titlecolor'); ?>" value="<?php echo $instance['titlecolor']; ?>" type="text" />
        </p>


        <br>
            
        <!-- exp1 field -->
        <p>
            <label for="<?php echo $this->get_field_name('exp1time'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('exp1time'); ?>" name="<?php echo $this->get_field_name('exp1time'); ?>" type="text" value="<?php echo esc_attr($instance['exp1time']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('exp1desig'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('exp1desig'); ?>" name="<?php echo $this->get_field_name('exp1desig'); ?>" type="text" value="<?php echo esc_attr($instance['exp1desig']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('exp1com'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('exp1com'); ?>" name="<?php echo $this->get_field_name('exp1com'); ?>" type="text" value="<?php echo esc_attr($instance['exp1com']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('exp1comsite'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('exp15comsite'); ?>" name="<?php echo $this->get_field_name('exp1comsite'); ?>" type="text" value="<?php echo esc_attr($instance['exp1comsite']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('exp1detail'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <textarea class="widefat" rows="8" cols="10" id="<?php echo $this->get_field_id('exp1detail'); ?>" name="<?php echo $this->get_field_name('exp1detail'); ?>"><?php echo esc_attr($instance['exp1detail']); ?></textarea>
        </p>
        <br>
        <br>

        <!-- exp2 field -->
        <p>
            <label for="<?php echo $this->get_field_name('exp2time'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('exp2time'); ?>" name="<?php echo $this->get_field_name('exp2time'); ?>" type="text" value="<?php echo esc_attr($instance['exp2time']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('exp2desig'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('exp2desig'); ?>" name="<?php echo $this->get_field_name('exp2desig'); ?>" type="text" value="<?php echo esc_attr($instance['exp2desig']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('exp2com'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('exp2com'); ?>" name="<?php echo $this->get_field_name('exp2com'); ?>" type="text" value="<?php echo esc_attr($instance['exp2com']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('exp2comsite'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('exp2comsite'); ?>" name="<?php echo $this->get_field_name('exp2comsite'); ?>" type="text" value="<?php echo esc_attr($instance['exp2comsite']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('exp2detail'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <textarea class="widefat" rows="8" cols="10" id="<?php echo $this->get_field_id('exp2detail'); ?>" name="<?php echo $this->get_field_name('exp2detail'); ?>"><?php echo esc_attr($instance['exp2detail']); ?></textarea>
        </p>
        <br>
        <br>


        
        <!-- exp3 field -->
        <p>
            <label for="<?php echo $this->get_field_name('exp3time'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('exp3time'); ?>" name="<?php echo $this->get_field_name('exp3time'); ?>" type="text" value="<?php echo esc_attr($instance['exp3time']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('exp3desig'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('exp3desig'); ?>" name="<?php echo $this->get_field_name('exp3desig'); ?>" type="text" value="<?php echo esc_attr($instance['exp3desig']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('exp3com'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('exp3com'); ?>" name="<?php echo $this->get_field_name('exp3com'); ?>" type="text" value="<?php echo esc_attr($instance['exp3com']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('exp3comsite'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('exp3comsite'); ?>" name="<?php echo $this->get_field_name('exp3comsite'); ?>" type="text" value="<?php echo esc_attr($instance['exp3comsite']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('exp3detail'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <textarea class="widefat" rows="8" cols="10" id="<?php echo $this->get_field_id('exp3detail'); ?>" name="<?php echo $this->get_field_name('exp3detail'); ?>"><?php echo esc_attr($instance['exp3detail']); ?></textarea>
        </p>
        <br>
        <br>


        <!-- exp4 field -->
        <p>
            <label for="<?php echo $this->get_field_name('exp4time'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('exp4time'); ?>" name="<?php echo $this->get_field_name('exp4time'); ?>" type="text" value="<?php echo esc_attr($instance['exp4time']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('exp4desig'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('exp4desig'); ?>" name="<?php echo $this->get_field_name('exp4desig'); ?>" type="text" value="<?php echo esc_attr($instance['exp4desig']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('exp4com'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('exp4com'); ?>" name="<?php echo $this->get_field_name('exp4com'); ?>" type="text" value="<?php echo esc_attr($instance['exp4com']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('exp4comsite'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('exp4comsite'); ?>" name="<?php echo $this->get_field_name('exp4comsite'); ?>" type="text" value="<?php echo esc_attr($instance['exp4comsite']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('exp4detail'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <textarea class="widefat" rows="8" cols="10" id="<?php echo $this->get_field_id('exp4detail'); ?>" name="<?php echo $this->get_field_name('exp4detail'); ?>"><?php echo esc_attr($instance['exp4detail']); ?></textarea>
        </p>
        <br>
        <br>

        <!-- exp5 field -->
        <p>
            <label for="<?php echo $this->get_field_name('exp5time'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('exp5time'); ?>" name="<?php echo $this->get_field_name('exp5time'); ?>" type="text" value="<?php echo esc_attr($instance['exp5time']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('exp5desig'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('exp5desig'); ?>" name="<?php echo $this->get_field_name('exp5desig'); ?>" type="text" value="<?php echo esc_attr($instance['exp5desig']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('exp5com'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('exp5com'); ?>" name="<?php echo $this->get_field_name('exp5com'); ?>" type="text" value="<?php echo esc_attr($instance['exp5com']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('exp5comsite'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('exp5comsite'); ?>" name="<?php echo $this->get_field_name('exp5comsite'); ?>" type="text" value="<?php echo esc_attr($instance['exp5comsite']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('exp5detail'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <textarea class="widefat" rows="8" cols="10" id="<?php echo $this->get_field_id('exp5detail'); ?>" name="<?php echo $this->get_field_name('exp5detail'); ?>"><?php echo esc_attr($instance['exp5detail']); ?></textarea>
        </p>
        <br>
        <br>



        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id('exptimecolor'); ?>"><?php _e('Timeline Color', 'cvee') ?></label>
          <input class="widefat color-picker"  id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('exptimecolor'); ?>" value="<?php echo $instance['exptimecolor']; ?>" type="text" />
        </p>

        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id('expdesigcolor'); ?>"><?php _e('Designation Color', 'cvee') ?></label>
          <input class="widefat color-picker"  id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('expdesigcolor'); ?>" value="<?php echo $instance['expdesigcolor']; ?>" type="text" />
        </p>

        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id('expcomcolor'); ?>"><?php _e('Company Name Color', 'cvee') ?></label>
          <input class="widefat color-picker"  id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('expcomcolor'); ?>" value="<?php echo $instance['expcomcolor']; ?>" type="text" />
        </p>

        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id('expdetailcolor'); ?>"><?php _e('Job Description Color', 'cvee') ?></label>
          <input class="widefat color-picker"  id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('expdetailcolor'); ?>" value="<?php echo $instance['expdetailcolor']; ?>" type="text" />
        </p>

        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id('bgcolor'); ?>"><?php _e('Background Color', 'cvee') ?></label>
          <input class="widefat color-picker"  id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('bgcolor'); ?>" value="<?php echo $instance['bgcolor']; ?>" type="text" />
        </p>
        
    <?php

}

/**
 * Sanitize widget form values as they are saved.
 *
 * @see WP_Widget::update()
 *
 * @param array $new_instance Values just sent to be saved.
 * @param array $old_instance Previously saved values from database.
 *
 * @return array Updated safe values to be saved.
 */
public function update($new_instance, $old_instance)
{

    // update logic goes here
    $instance                   = $new_instance;
    $instance['title']          = wp_kses_post($new_instance['title']);
    $instance['icon1']          = wp_kses_post($new_instance['icon1']);

    $instance['exp1time']       = wp_kses_post($new_instance['exp1time']);
    $instance['exp1desig']      = wp_kses_post($new_instance['exp1desig']);
    $instance['exp1com']        = wp_kses_post($new_instance['exp1com']);
    $instance['exp1comsite']    = wp_kses_post($new_instance['exp1comsite']);
    $instance['exp1detail']     = wp_kses_post($new_instance['exp1detail']);

    $instance['exp2time']       = wp_kses_post($new_instance['exp2time']);
    $instance['exp2desig']      = wp_kses_post($new_instance['exp2desig']);
    $instance['exp2com']        = wp_kses_post($new_instance['exp2com']);
    $instance['exp2comsite']    = wp_kses_post($new_instance['exp2comsite']);
    $instance['exp2detail']     = wp_kses_post($new_instance['exp2detail']);

    $instance['exp3time']       = wp_kses_post($new_instance['exp3time']);
    $instance['exp3desig']      = wp_kses_post($new_instance['exp3desig']);
    $instance['exp3com']        = wp_kses_post($new_instance['exp3com']);
    $instance['exp3comsite']    = wp_kses_post($new_instance['exp3comsite']);
    $instance['exp3detail']     = wp_kses_post($new_instance['exp3detail']);
    $instance['exp4time']       = wp_kses_post($new_instance['exp4time']);
    $instance['exp4desig']      = wp_kses_post($new_instance['exp4desig']);
    $instance['exp4com']        = wp_kses_post($new_instance['exp4com']);
    $instance['exp4comsite']    = wp_kses_post($new_instance['exp4comsite']);
    $instance['exp4detail']     = wp_kses_post($new_instance['exp4detail']);

    $instance['exp5time']       = wp_kses_post($new_instance['exp5time']);
    $instance['exp5desig']      = wp_kses_post($new_instance['exp5desig']);
    $instance['exp5com']        = wp_kses_post($new_instance['exp5com']);
    $instance['exp5comsite']    = wp_kses_post($new_instance['exp5comsite']);
    $instance['exp5detail']     = wp_kses_post($new_instance['exp5detail']);

    $instance['bgcolor']        = sanitize_hex_color($new_instance['bgcolor']);
    $instance['titlecolor']     = sanitize_hex_color($new_instance['titlecolor']);
    $instance['iconcolor']      = sanitize_hex_color($new_instance['iconcolor']);
    $instance['exptimecolor']   = sanitize_hex_color($new_instance['exptimecolor']);
    $instance['expdesigcolor']  = sanitize_hex_color($new_instance['expdesigcolor']);
    $instance['expcomcolor']    = sanitize_hex_color($new_instance['expcomcolor']);
    $instance['expdetailcolor'] = sanitize_hex_color($new_instance['expdetailcolor']);

    return $instance;
}

    //ENQUEUE CSS
function cvee_intro1_css()
{

    $settings = $this->get_settings();
    if (!is_customize_preview()) {
        if (empty($settings)) {
            return;
        }

        foreach ($settings as $instance_id => $instance) {
            $id = $this->id_base . '-' . $instance_id;

            if (!is_active_widget(false, $id, $this->id_base)) {
                continue;
            }

            $exptimecolor   = 'color:#999;';
            $expdesigcolor  = 'color:#000;';
            $expcomcolor    = 'color:#444;';
            $expdetailcolor = 'color:#777;';
    
            $titlecolor     = 'color:#333;';
            $bgcolor        = 'background-color:#f3f2ee;';
            $iconcolor      = 'rgba(38,37,37,.1);';


            if (!empty($instance['exptimecolor'])) {
                $exptimecolor   = 'color: ' . $instance['exptimecolor'] . '; ';
            }
            if (!empty($instance['expdesigcolor'])) {
                $expdesigcolor  = 'color: ' . $instance['expdesigcolor'] . '; ';
            }
            if (!empty($instance['expcomcolor'])) {
                $expcomcolor    = 'color: ' . $instance['expcomcolor'] . '; ';
            }
            if (!empty($instance['expdetailcolor'])) {
                $expdetailcolor = 'color: ' . $instance['expdetailcolor'] . '; ';
            }
    
            if (!empty($instance['titlecolor'])) {
                $titlecolor     = 'color: ' . $instance['titlecolor'] . '; ';
            }
            if (!empty($instance['iconcolor'])) {
                $iconcolor      = 'color:' . $instance['iconcolor'] . '; ';
            }
            if (!empty($instance['bgcolor'])) {
                $bgcolor        = 'background-color:' . $instance['bgcolor'] . '; ';
            }



            $widget_style = '#' . $id . ' .experience3 .first h3 {' . $titlecolor . '}#' . $id . ' .experience3 .first .svg-inline--fa { ' . $iconcolor . '}#' . $id . ' .experience3 {' . $bgcolor . '}#' . $id . ' .experience3  {' . $bgcolor . '}#' . $id . ' .experience3 .company .timeline {' . $exptimecolor . '}#' . $id . ' .experience3 .company .designation {' . $expdesigcolor . '}#' . $id . ' .experience3 .company .comname {' . $expcomcolor . '}#' . $id . ' .experience3 .company comname a, .experience3 a {' . $expcomcolor . '}#' . $id . ' .experience3 .company .detail {' . $expdetailcolor . '}';
            wp_add_inline_style('cvee-style', $widget_style);
        }
    }

}

}