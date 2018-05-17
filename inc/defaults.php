<?php 
function cvee_option_defaults() {
	$defaults                  = array(
		'nav_icon_color'        => '#111',
		'nav_background'        => '#f3f2ee',
		'site_title_color'      => '#fff',
		'sidr_close_color'      => '#2196F3',
		'site_main_color'       => '#f3f2ee',
		'colophon_txt_color'    => '#444',
		'footer_bg_color'       => '#fff',
		'hide_credit'           => 'true',
		'body_line_height'      => '20',
		'body_font_family'      => '"Source Sans Pro", sans-serif',
		'colophon_txt_color'    => '#333',
	);
	
	
      $options                 = get_option('cvee',$defaults);

      //Parse defaults again - see comments
      $options                 = wp_parse_args( $options, $defaults );

		return $options;
}