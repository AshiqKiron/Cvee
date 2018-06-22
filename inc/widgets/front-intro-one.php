<?php


/*************************************************
 * Intro One Widget
 **************************************************/

/**
 * Register the Widget
 */
function Cvee_Intro_One_Widget()
{
  register_widget('Cvee_Intro_One_Widget');
}
add_action('widgets_init', 'Cvee_Intro_One_Widget');


class Cvee_Intro_One_Widget extends WP_Widget
{
  /**
   * Constructor
   **/
  public function __construct()
  {
    $widget_ops                     = array(
      'classname'                   => 'Cvee_Intro_One_Widget',
      'description'                 => esc_html__('CVEE Intro Widget One', 'cvee'),
      'customize_selective_refresh' => true
    );

    parent::__construct('Cvee_Intro_One_Widget', 'Intro Widget One', $widget_ops);

    add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
    add_action('admin_enqueue_styles', array($this, 'upload_styles'));

  }


  /**
   * Upload the Javascripts for the media uploader
   */
  public function upload_scripts()
  {
  if( function_exists( 'wp_enqueue_media' ) ) {
      
      wp_enqueue_media();
  }
      wp_enqueue_script('cvee-media-upload', get_template_directory_uri() . '/js/media-upload.js');
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


    $heroimage   = isset($instance['heroimage']) ? apply_filters('', $instance['heroimage']) : esc_url(get_template_directory_uri() . '/assets/images/short.jpg');
    $title       = isset($instance['title']) ? apply_filters('widget_title', $instance['title'], $instance, $this->id_base) : esc_attr__('John Doe', 'cvee');
    $text1       = isset($instance['text1']) ? apply_filters('', $instance['text1']) : esc_attr__('Art Director', 'cvee');


          
 
          /* Before widget (defined by themes). */
    echo $args['before_widget'];

    echo '<section class="intro">
                    <div class="wrap">';

    if (isset($heroimage) && !empty($heroimage)) {
      echo '<img class="portrait" itemprop="image" src="' . esc_url($heroimage) . '">';

    }

    if (isset($title)  && !empty($title)){

      echo '<h2 itemprop="text">' . wp_kses_post(do_shortcode($title)) . '</h2>';
    }


    if (isset($text1)  && !empty($text1)) {

      echo '<p itemprop="text">' . wp_kses_post(do_shortcode($text1)) . '</p>';
    }


    echo '</div></section>';


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
      'heroimage'   => get_template_directory_uri() . '/assets/images/short.jpg',
      'title'       => esc_attr__('John Doe', 'cvee'),
      'text1'       => esc_attr__('Art Director', 'cvee')
    );


    $instance = wp_parse_args((array)$instance, $defaults);


    ?>


        <p>
            <label style="max-width: 100%;overflow: hidden;" for="<?php echo $this->get_field_name('heroimage'); ?>"><?php esc_html_e('Hero Image:', 'cvee'); ?></label> <span><?php esc_attr_e(' (Suggested Size : 250 * 250 )', 'cvee'); ?></span>
 
            <?php if (!empty($instance['heroimage'])) {
              ?> <img style="max-width: 100%;width:100%;overflow: hidden;" src="<?php echo esc_url($instance['heroimage']); ?>" class="widgtimgprv" /> <span style="float:right;cursor: pointer;" class="mediaremvbtn">X</span><?php 
                                                                                                                                                                                                                            } ?>
            
            <input style="display:none;" name="<?php echo $this->get_field_name('heroimage'); ?>" id="<?php echo $this->get_field_id('heroimage'); ?>" class="widefat" type="text" size="36" value="<?php echo esc_url($instance['heroimage']); ?>" />
            <input style="background-color: #0085ba;color: #fff;border: none;cursor: pointer;padding: 6px 5px;" class="upload_image_button" id="<?php echo $this->get_field_id('heroimage') . '-picker'; ?>" type="button" onClick="mediaPicker(this.id)" value="<?php esc_attr_e('Upload Image', 'cvee'); ?>" />
        </p>


        
        <br>
        <!-- Title -->
        <p>
            <label for="<?php echo $this->get_field_name('title'); ?>"><?php esc_html_e('Title', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
        </p>
  


        <br>
            
        <!-- text1 field -->
        <p>
            <label for="<?php echo $this->get_field_name('text1'); ?>"><?php esc_html_e('Sub Title', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('text1'); ?>" name="<?php echo $this->get_field_name('text1'); ?>" type="text" value="<?php echo esc_attr($instance['text1']); ?>" />
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
    $instance                = $new_instance;
    $instance['heroimage']   = esc_url_raw($new_instance['heroimage']);
    $instance['text1']       = wp_kses_post($new_instance['text1']);
    $instance['title']       = wp_kses_post($new_instance['title']);
   

    return $instance;
  }


}