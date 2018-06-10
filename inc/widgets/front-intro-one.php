<?php


/*************************************************
 * Intro One Widget
 **************************************************/

/**
 * Register the Widget
 */
function cvee_intro_one_widget()
{
  register_widget('cvee_intro_one_widget');
}
add_action('widgets_init', 'cvee_intro_one_widget');


class cvee_intro_one_widget extends WP_Widget
{
  /**
   * Constructor
   **/
  public function __construct()
  {
    $widget_ops                     = array(
      'classname'                   => 'cvee_intro_one_widget',
      'description'                 => esc_html__('CVEE Intro Widget One', 'cvee'),
      'customize_selective_refresh' => true
    );

    parent::__construct('cvee_intro_one_widget', 'Intro Widget One', $widget_ops);

    add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
    add_action('admin_enqueue_styles', array($this, 'upload_styles'));
    add_action('wp_enqueue_scripts', array(&$this, 'cvee_intro1_css'));

  }


  /**
   * Upload the Javascripts for the media uploader
   */
  public function upload_scripts()
  {
  if( function_exists( 'wp_enqueue_media' ) ) {
      
      wp_enqueue_media();
  }
      wp_enqueue_script('cvee_intro_one_widget', get_template_directory_uri() . '/js/media-upload.js');
  }


  /**
   * Enqueue scripts.
   *
   * @since 1.0
   *
   * @param string $hook_suffix
   */
  public function enqueue_scripts( $hook_suffix ) {
    if ( 'widgets.php' !== $hook_suffix ) {
      return;
    }

    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_script( 'underscore' );
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


    $heroimage   = isset($instance['heroimage']) ? apply_filters('', $instance['heroimage']) : esc_url(get_template_directory_uri() . '/assets/images/short.jpg');
    $title       = isset($instance['title']) ? apply_filters('widget_title', $instance['title'], $instance, $this->id_base) : esc_attr__('John Doe', 'cvee');
    $text1       = isset($instance['text1']) ? apply_filters('', $instance['text1']) : esc_attr__('Art Director', 'cvee');

    $bordercolor = isset($instance['bordercolor']) ? $instance['bordercolor'] : '';
    $txtcolor    = isset($instance['txtcolor']) ? $instance['txtcolor'] : '';
    $titlecolor  = isset($instance['titlecolor']) ? $instance['titlecolor'] : '';
    $bgcolor     = isset($instance['bgcolor']) ? $instance['bgcolor'] : '';
            
          
 
          /* Before widget (defined by themes). */
    echo $args['before_widget'];

    echo '<section class="intro">
                    <div class="wrap">';

    if (isset($heroimage) && !empty($heroimage)) {
      echo '<img class="portrait" itemprop="image" src="' . esc_url($heroimage) . '">';

    }

    if (isset($title)  && !empty($title)){

      echo '<h2 itemprop="text">' . esc_html(do_shortcode($title)) . '</h2>';
    }


    if (isset($text1)  && !empty($text1)) {

      echo '<p itemprop="text">' . esc_html(do_shortcode($text1)) . '</p>';
    }


    echo '</div></section>';


    if (is_customize_preview()) {
      $id = $this->id;

      $titlecolor  = 'color:#000;';
      $txtcolor    = 'color:#9E9E9E;';
      $bgcolor     = 'background-color:#f3f2ee;';
      $bordercolor = '#fff;';


      if (!empty($instance['titlecolor'])) {
        $titlecolor  = 'color: ' . $instance['titlecolor'] . '; ';
      }
      if (!empty($instance['txtcolor'])) {
        $txtcolor    = 'color: ' . $instance['txtcolor'] . '; ';
      }
      if (!empty($instance['bordercolor'])) {
        $bordercolor = '' . $instance['bordercolor'] . '; ';
      }
      if (!empty($instance['bgcolor'])) {
        $bgcolor     = 'background-color:' . $instance['bgcolor'] . '; ';
      }


      echo '<style>' . '#' . $id . ' .intro h2 {' . $titlecolor . '}#' . $id . ' .intro img { border:4px solid ' . $bordercolor . '}#' . $id . ' .intro {' . $bgcolor . '}#' . $id . ' .intro p {' . $txtcolor . '}</style>';

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
      'heroimage'   => get_template_directory_uri() . '/assets/images/short.jpg',
      'title'       => esc_attr__('John Doe', 'cvee'),
      'titlecolor'  => '#000',
      'bordercolor' => '#fff',
      'bgcolor'     => '#f3f2ee',
      'txtcolor'    => '#9E9E9E',
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

        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id('bordercolor'); ?>"><?php _e('Border Color', 'cvee') ?></label>
          <input class="widefat color-picker"  id="<?php echo $this->get_field_id('bordercolor'); ?>" name="<?php echo $this->get_field_name('bordercolor'); ?>" value="<?php echo $instance['bordercolor']; ?>" type="text" />
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
            
        <!-- text1 field -->
        <p>
            <label for="<?php echo $this->get_field_name('text1'); ?>"><?php esc_html_e('Sub Title', 'cvee'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('text1'); ?>" name="<?php echo $this->get_field_name('text1'); ?>" type="text" value="<?php echo esc_attr($instance['text1']); ?>" />
        </p>

        <p>
          <label style="vertical-align: top;" for="<?php echo $this->get_field_id('txtcolor'); ?>"><?php _e('Color', 'cvee') ?></label>
          <input class="widefat color-picker"  id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('txtcolor'); ?>" value="<?php echo $instance['txtcolor']; ?>" type="text" />
        </p>

        <br>

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
    $instance                = $new_instance;
    $instance['heroimage']   = esc_url($new_instance['heroimage']);
    $instance['text1']       = wp_kses_post($new_instance['text1']);
    $instance['title']       = wp_kses_post($new_instance['title']);
    $instance['bgcolor']     = sanitize_hex_color($new_instance['bgcolor']);
    $instance['bordercolor'] = sanitize_hex_color($new_instance['bordercolor']);
    $instance['titlecolor']  = sanitize_hex_color($new_instance['titlecolor']);
    $instance['txtcolor']    = sanitize_hex_color($new_instance['txtcolor']);

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

        $titlecolor  = 'color:#000;';
        $txtcolor    = 'color:#9E9E9E';
        $bgcolor     = 'background-color:#f3f2ee;';
        $bordercolor = '#fff;';


        if (!empty($instance['titlecolor'])) {
          $titlecolor  = 'color: ' . $instance['titlecolor'] . '; ';
        }

        if (!empty($instance['txtcolor'])) {
          $txtcolor    = 'color: ' . $instance['txtcolor'] . '; ';
        }

        if (!empty($instance['bgcolor'])) {
          $bgcolor     = 'background-color:' . $instance['bgcolor'] . '; ';
        }

        if (!empty($instance['bordercolor'])) {
          $bordercolor = '' . $instance['bordercolor'] . '; ';
        }




        $widget_style = '#' . $id . ' .intro h2 {' . $titlecolor . '}#' . $id . ' .intro img { border:4px solid ' . $bordercolor . '}#' . $id . ' .intro {' . $bgcolor . '}#' . $id . ' .intro p {' . $txtcolor . '}';
        wp_add_inline_style('cvee-style', $widget_style);
      }
    }

  }


}