<?php


/*************************************************
 * Education One Widget
 **************************************************/

/**
 * Register the Widget
 */
function cvee_education_one_widget()
{
    register_widget('cvee_education_one_widget');
}
add_action('widgets_init', 'cvee_education_one_widget');


class Cvee_Education_One_Widget extends WP_Widget
{
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname'                   => 'cvee_education_one_widget',
            'description'                 => esc_html__('CVEE Education Widget One', 'cvee'),
            'customize_selective_refresh' => true
        );

        parent::__construct('cvee_education_one_widget', 'Education Widget One', $widget_ops);

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

    $icon1       = isset($instance['icon1']) ? apply_filters('widget_title', $instance['icon1']) : __('fas fa-graduation-cap', 'cvee');
    $title       = isset($instance['title']) ? apply_filters('widget_title', $instance['title'], $instance, $this->id_base) : esc_attr__('Education', 'cvee');


    $edu1time    = isset($instance['edu1time']) ? apply_filters('', $instance['edu1time']) : esc_attr__('September 2013 - February 2014', 'cvee');
    $edu1desig   = isset($instance['edu1desig']) ? apply_filters('', $instance['edu1desig']) : esc_attr__('Bachelor of Engineering (B.Eng) Information and Communication Technology', 'cvee');
    $edu1com     = isset($instance['edu1com']) ? apply_filters('', $instance['edu1com']) : esc_attr__('Arthus University', 'cvee');
    $edu1comsite = isset($instance['edu1comsite']) ? apply_filters('', $instance['edu1comsite']) : esc_attr__('https://asphaltthemes.com', 'cvee');


    $edu2time    = isset($instance['edu2time']) ? apply_filters('', $instance['edu2time']) : esc_attr__('September 2013 - February 2014', 'cvee');
    $edu2desig   = isset($instance['edu2desig']) ? apply_filters('', $instance['edu2desig']) : esc_attr__('Bachelor of Engineering (B.Eng) Information and Communication Technology', 'cvee');
    $edu2com     = isset($instance['edu2com']) ? apply_filters('', $instance['edu2com']) : esc_attr__('Arthus University', 'cvee');
    $edu2comsite = isset($instance['edu2comsite']) ? apply_filters('', $instance['edu2comsite']) : esc_attr__('https://asphaltthemes.com', 'cvee');



    $edu3time     = isset($instance['edu3time']) ? apply_filters('', $instance['edu3time']) : esc_attr__('September 2013 - February 2014', 'cvee');
    $edu3desig    = isset($instance['edu3desig']) ? apply_filters('', $instance['edu3desig']) : esc_attr__('Bachelor of Engineering (B.Eng) Information and Communication Technology', 'cvee');
    $edu3com      = isset($instance['edu3com']) ? apply_filters('', $instance['edu3com']) : esc_attr__('Arthus University', 'cvee');
    $edu3comsite  = isset($instance['edu3comsite']) ? apply_filters('', $instance['edu3comsite']) : esc_attr__('https://asphaltthemes.com', 'cvee');



    $edu4time     = isset($instance['edu4time']) ? apply_filters('', $instance['edu4time']) : esc_attr__('September 2013 - February 2014', 'cvee');
    $edu4desig    = isset($instance['edu4desig']) ? apply_filters('', $instance['edu4desig']) : esc_attr__('Bachelor of Engineering (B.Eng) Information and Communication Technology', 'cvee');
    $edu4com      = isset($instance['edu4com']) ? apply_filters('', $instance['edu4com']) : esc_attr__('Arthus University', 'cvee');
    $edu4comsite  = isset($instance['edu4comsite']) ? apply_filters('', $instance['edu4comsite']) : esc_attr__('https://asphaltthemes.com', 'cvee');



    $edu5time     = isset($instance['edu5time']) ? apply_filters('', $instance['edu5time']) : esc_attr__('September 2013 - February 2014', 'cvee');
    $edu5desig    = isset($instance['edu5desig']) ? apply_filters('', $instance['edu5desig']) : esc_attr__('Bachelor of Engineering (B.Eng) Information and Communication Technology', 'cvee');
    $edu5com      = isset($instance['edu5com']) ? apply_filters('', $instance['edu5com']) : esc_attr__('Arthus University', 'cvee');
    $edu5comsite  = isset($instance['edu5comsite']) ? apply_filters('', $instance['edu5comsite']) : esc_attr__('https://asphaltthemes.com', 'cvee');
            
          
 
    /* Before widget (defined by themes). */
    echo $args['before_widget'];

    echo '<section class="education">
                    <div class="wrap">
                    <div class="first">';

    echo '<i class="';
    if (isset($icon1) && !empty($icon1)) {
        echo '' . ($icon1) . '';
    }

    echo '"></i>';

    if (isset($title) && !empty($title)) {
        echo '<h3 itemprop="text">' . wp_kses_post(do_shortcode($title)) . '</h3>';
    }

    echo '</div>
          <div class="second">';


    if (isset($edu1time) && !empty($edu1time)) {
        echo '<div class="institution">
        <p class="timeline" itemprop="text">' . wp_kses_post(do_shortcode($edu1time)) . '</p>';
    }

    if (isset($edu1desig) && !empty($edu1desig)) {
        echo '<div class="info">
              <p class="name" itemprop="text">' . wp_kses_post(do_shortcode($edu1desig)) . '</p>';
    }

    if (isset($edu5com) && !empty($edu5com)) {
        echo '<p class="address" itemprop="text">' . wp_kses_post(do_shortcode($edu5com)) . '<br>';
    }

    if (isset($edu1comsite) && !empty($edu1comsite)) {
        echo '<a href="'. esc_url(do_shortcode($edu1comsite)) .'">'. esc_url(do_shortcode($edu1comsite)) .'</a></p></div></div>';
    }



    if (isset($edu2time) && !empty($edu2time)) {
        echo '<div class="institution">
        <p class="timeline" itemprop="text">' . wp_kses_post(do_shortcode($edu2time)) . '</p>';
    }

    if (isset($edu2desig) && !empty($edu2desig)) {
        echo '<div class="info">
              <p class="name" itemprop="text">' . wp_kses_post(do_shortcode($edu2desig)) . '</p>';
    }

    if (isset($edu5com) && !empty($edu5com)) {
        echo '<p class="address" itemprop="text">' . wp_kses_post(do_shortcode($edu5com)) . '<br>';
    }

    if (isset($edu2comsite) && !empty($edu2comsite)) {
        echo '<a href="' . esc_url(do_shortcode($edu2comsite)) . '">' . esc_url(do_shortcode($edu2comsite)) . '</a></p></div></div>';
    }




    if (isset($edu3time) && !empty($edu3time)) {
        echo '<div class="institution">
        <p class="timeline" itemprop="text">' . wp_kses_post(do_shortcode($edu3time)) . '</p>';
    }

    if (isset($edu3desig) && !empty($edu3desig)) {
        echo '<div class="info">
              <p class="name" itemprop="text">' . wp_kses_post(do_shortcode($edu3desig)) . '</p>';
    }

    if (isset($edu5com) && !empty($edu5com)) {
        echo '<p class="address" itemprop="text">' . wp_kses_post(do_shortcode($edu5com)) . '<br>';
    }

    if (isset($edu3comsite) && !empty($edu3comsite)) {
        echo '<a href="' . esc_url(do_shortcode($edu3comsite)) . '">' . esc_url(do_shortcode($edu3comsite)) . '</a></p></div></div>';
    }


    if (isset($edu4time) && !empty($edu4time)) {
        echo '<div class="institution">
        <p class="timeline" itemprop="text">' . wp_kses_post(do_shortcode($edu4time)) . '</p>';
    }

    if (isset($edu4desig) && !empty($edu4desig)) {
        echo '<div class="info">
              <p class="name" itemprop="text">' . wp_kses_post(do_shortcode($edu4desig)) . '</p>';
    }

    if (isset($edu5com) && !empty($edu5com)) {
        echo '<p class="address" itemprop="text">' . wp_kses_post(do_shortcode($edu5com)) . '<br>';
    }

    if (isset($edu4comsite) && !empty($edu4comsite)) {
        echo '<a href="' . esc_url(do_shortcode($edu4comsite)) . '">' . esc_url(do_shortcode($edu4comsite)) . '</a></p></div></div>';
    }



    if (isset($edu5time) && !empty($edu5time)) {
        echo '<div class="institution">
        <p class="timeline" itemprop="text">' . wp_kses_post(do_shortcode($edu5time)) . '</p>';
    }

    if (isset($edu5desig) && !empty($edu5desig)) {
        echo '<div class="info">
              <p class="name" itemprop="text">' . wp_kses_post(do_shortcode($edu5desig)) . '</p>';
    }

    if (isset($edu5com) && !empty($edu5com)) {
        echo '<p class="address" itemprop="text">' . wp_kses_post(do_shortcode($edu5com)) . '<br>';
    }

    if (isset($edu5comsite) && !empty($edu5comsite)) {
        echo '<a href="' . esc_url(do_shortcode($edu5comsite)) . '">' . esc_url(do_shortcode($edu5comsite)) . '</a></p></div></div>';
    }


    echo '</div></div></section>';

  
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
        'title'         => esc_attr__('Education', 'cvee'),
        'icon1'         => __('fas fa-graduation-cap', 'cvee') ,
        'edu1time'      => esc_attr__('September 2013 - February 2014', 'cvee'),
        'edu1desig'     => esc_attr__('Bachelor of Engineering (B.Eng) Information and Communication Technology        ', 'cvee'),
        'edu1com'       => esc_attr__('Asphalt Themes', 'cvee'),
        'edu1comsite'   => esc_attr__('https://asphaltthemes.com', 'cvee'),
        'edu2time'      => esc_attr__('September 2013 - February 2014', 'cvee'),
        'edu2desig'     => esc_attr__('Bachelor of Engineering (B.Eng) Information and Communication Technology', 'cvee'),
        'edu2com'       => esc_attr__('Asphalt Themes', 'cvee'),
        'edu2comsite'   => esc_attr__('https://asphaltthemes.com', 'cvee'),
        'edu3time'      => esc_attr__('September 2013 - February 2014', 'cvee'),
        'edu3desig'     => esc_attr__('Bachelor of Engineering (B.Eng) Information and Communication Technology', 'cvee'),
        'edu3com'       => esc_attr__('Asphalt Themes', 'cvee'),
        'edu3comsite'   => esc_attr__('https://asphaltthemes.com', 'cvee'),
        'edu4time'      => esc_attr__('September 2013 - February 2014', 'cvee'),
        'edu4desig'     => esc_attr__('Bachelor of Engineering (B.Eng) Information and Communication Technology', 'cvee'),
        'edu4com'       => esc_attr__('Asphalt Themes', 'cvee'),
        'edu4comsite'   => esc_attr__('https://asphaltthemes.com', 'cvee'),
        'edu5time'      => esc_attr__('September 2013 - February 2014', 'cvee'),
        'edu5desig'     => esc_attr__('Bachelor of Engineering (B.Eng) Information and Communication Technology', 'cvee'),
        'edu5com'       => esc_attr__('Asphalt Themes', 'cvee'),
        'edu5comsite'   => esc_attr__('https://asphaltthemes.com', 'cvee')
    );


    $instance = wp_parse_args((array)$instance, $defaults);


    ?>
        <!-- Icon One -->
       <p>
          <label for="<?php echo $this->get_field_id('icon1'); ?>"><?php _e('<b>Icon:</b>', 'cvee') ?></label>

          <select id="<?php echo $this->get_field_id('icon1'); ?>" name="<?php echo $this->get_field_name('icon1'); ?>" class="widefat">
            <option value="fas fa-graduation-cap" <?php if ('fas fa-graduation-cap' == $instance['icon1']) echo 'selected="selected"'; ?>><?php _e('Graduation Cap', 'cvee') ?></option>  
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

      
        <br>
        <!-- Title -->
        <p>
            <label for="<?php echo $this->get_field_name('title'); ?>"><?php esc_html_e('Title', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
        </p>
      

        <br>
            
        <!-- edu1 field -->
        <p>
            <label for="<?php echo $this->get_field_name('edu1time'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu1time'); ?>" name="<?php echo $this->get_field_name('edu1time'); ?>" type="text" value="<?php echo esc_attr($instance['edu1time']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('edu1desig'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu1desig'); ?>" name="<?php echo $this->get_field_name('edu1desig'); ?>" type="text" value="<?php echo esc_attr($instance['edu1desig']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('edu1com'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu1com'); ?>" name="<?php echo $this->get_field_name('edu1com'); ?>" type="text" value="<?php echo esc_attr($instance['edu1com']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('edu1comsite'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu15comsite'); ?>" name="<?php echo $this->get_field_name('edu1comsite'); ?>" type="text" value="<?php echo esc_attr($instance['edu1comsite']); ?>" />
        </p>

        <br>
        <br>

        <!-- edu2 field -->
        <p>
            <label for="<?php echo $this->get_field_name('edu2time'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu2time'); ?>" name="<?php echo $this->get_field_name('edu2time'); ?>" type="text" value="<?php echo esc_attr($instance['edu2time']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('edu2desig'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu2desig'); ?>" name="<?php echo $this->get_field_name('edu2desig'); ?>" type="text" value="<?php echo esc_attr($instance['edu2desig']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('edu2com'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu2com'); ?>" name="<?php echo $this->get_field_name('edu2com'); ?>" type="text" value="<?php echo esc_attr($instance['edu2com']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('edu2comsite'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu2comsite'); ?>" name="<?php echo $this->get_field_name('edu2comsite'); ?>" type="text" value="<?php echo esc_attr($instance['edu2comsite']); ?>" />
        </p>

        <br>
        <br>


        
        <!-- edu3 field -->
        <p>
            <label for="<?php echo $this->get_field_name('edu3time'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu3time'); ?>" name="<?php echo $this->get_field_name('edu3time'); ?>" type="text" value="<?php echo esc_attr($instance['edu3time']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('edu3desig'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu3desig'); ?>" name="<?php echo $this->get_field_name('edu3desig'); ?>" type="text" value="<?php echo esc_attr($instance['edu3desig']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('edu3com'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu3com'); ?>" name="<?php echo $this->get_field_name('edu3com'); ?>" type="text" value="<?php echo esc_attr($instance['edu3com']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('edu3comsite'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu3comsite'); ?>" name="<?php echo $this->get_field_name('edu3comsite'); ?>" type="text" value="<?php echo esc_attr($instance['edu3comsite']); ?>" />
        </p>
        <br>
        <br>


        <!-- edu4 field -->
        <p>
            <label for="<?php echo $this->get_field_name('edu4time'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu4time'); ?>" name="<?php echo $this->get_field_name('edu4time'); ?>" type="text" value="<?php echo esc_attr($instance['edu4time']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('edu4desig'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu4desig'); ?>" name="<?php echo $this->get_field_name('edu4desig'); ?>" type="text" value="<?php echo esc_attr($instance['edu4desig']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('edu4com'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu4com'); ?>" name="<?php echo $this->get_field_name('edu4com'); ?>" type="text" value="<?php echo esc_attr($instance['edu4com']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('edu4comsite'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu4comsite'); ?>" name="<?php echo $this->get_field_name('edu4comsite'); ?>" type="text" value="<?php echo esc_attr($instance['edu4comsite']); ?>" />
        </p>
        <br>
        <br>

        <!-- edu5 field -->
        <p>
            <label for="<?php echo $this->get_field_name('edu5time'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu5time'); ?>" name="<?php echo $this->get_field_name('edu5time'); ?>" type="text" value="<?php echo esc_attr($instance['edu5time']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('edu5desig'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu5desig'); ?>" name="<?php echo $this->get_field_name('edu5desig'); ?>" type="text" value="<?php echo esc_attr($instance['edu5desig']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('edu5com'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu5com'); ?>" name="<?php echo $this->get_field_name('edu5com'); ?>" type="text" value="<?php echo esc_attr($instance['edu5com']); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name('edu5comsite'); ?>"><?php esc_html_e('Text', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('edu5comsite'); ?>" name="<?php echo $this->get_field_name('edu5comsite'); ?>" type="text" value="<?php echo esc_attr($instance['edu5comsite']); ?>" />
        </p>
        <br>
        <br>

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

    $instance['edu1time']       = wp_kses_post($new_instance['edu1time']);
    $instance['edu1desig']      = wp_kses_post($new_instance['edu1desig']);
    $instance['edu1com']        = wp_kses_post($new_instance['edu1com']);
    $instance['edu1comsite']    = wp_kses_post($new_instance['edu1comsite']);

    $instance['edu2time']       = wp_kses_post($new_instance['edu2time']);
    $instance['edu2desig']      = wp_kses_post($new_instance['edu2desig']);
    $instance['edu2com']        = wp_kses_post($new_instance['edu2com']);
    $instance['edu2comsite']    = wp_kses_post($new_instance['edu2comsite']);


    $instance['edu3time']       = wp_kses_post($new_instance['edu3time']);
    $instance['edu3desig']      = wp_kses_post($new_instance['edu3desig']);
    $instance['edu3com']        = wp_kses_post($new_instance['edu3com']);
    $instance['edu3comsite']    = wp_kses_post($new_instance['edu3comsite']);

    $instance['edu4time']       = wp_kses_post($new_instance['edu4time']);
    $instance['edu4desig']      = wp_kses_post($new_instance['edu4desig']);
    $instance['edu4com']        = wp_kses_post($new_instance['edu4com']);
    $instance['edu4comsite']    = wp_kses_post($new_instance['edu4comsite']);

    $instance['edu5time']       = wp_kses_post($new_instance['edu5time']);
    $instance['edu5desig']      = wp_kses_post($new_instance['edu5desig']);
    $instance['edu5com']        = wp_kses_post($new_instance['edu5com']);
    $instance['edu5comsite']    = wp_kses_post($new_instance['edu5comsite']);

    return $instance;
}


}


