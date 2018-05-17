<?php global $cvee;

function cvee_customizer_styles() {
  wp_enqueue_style(
    'custom-style',
    get_template_directory_uri() . '/style.css'
  );
        $color = get_header_image();  //E.g. #FF0000
        $custom_css = "
                #masthead{
                        background-image: url({$color});
                        background-size:cover;
                        background-repeat:no-repeat;
                }";
        
        wp_add_inline_style( 'custom-style', $custom_css );
       
}
add_action( 'wp_enqueue_scripts', 'cvee_customizer_styles' );


function cvee_customizer_css() {
	global $cvee;
    ?>
    <style type="text/css">

      #masthead {background-color: <?php echo esc_html($cvee['nav_background']); ?>;}
      .menu-toggle {color: <?php echo esc_html($cvee['nav_icon_color']); ?>;}
      .site-title a {color: <?php echo esc_html($cvee['site_title_color']); ?>;}
      body {font-family: <?php echo esc_html($cvee['body_font_family']); ?>;}

      .footer-widget h2, .rssSummary ,  .footer-widget h3, .footer-widget p, .footer-widget a, .footer-widget .wp-calendar, .footer-widget ul {color: <?php echo esc_html($cvee['colophon_txt_color']); ?>;}
      .footer-widget {background-color: <?php echo esc_html($cvee['footer_bg_color']); ?>;}
      body {line-height: <?php echo esc_html($cvee['body_line_height']); ?>px;}
     


      <?php if( false == $cvee['hide_credit'] ) { ?>
                .site-info { display: none; }
    <?php } // end if ?>

    </style>
    <?php
}
add_action( 'wp_head', 'cvee_customizer_css' );
