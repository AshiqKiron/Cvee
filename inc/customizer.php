<?php
/**
 * cvee Theme Customizer
 *
 * @package cvee
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cvee_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	$wp_customize->get_section('header_image')->panel = 'header';
	$wp_customize->get_section('title_tagline')->panel = 'header';
	$wp_customize->get_section('static_front_page')->panel = 'frontpage';
	$wp_customize->get_section('colors')->panel = 'basic_settings';
	$wp_customize->get_section('background_image')->panel = 'basic_settings';
	$wp_customize->get_control('header_textcolor')->section = 'header_section';
	

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'cvee_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'cvee_customize_partial_blogdescription',
		) );
	}


	
    // Panel
	$wp_customize->add_panel( 'header', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Header', 'cvee' ),
		'description' => esc_html__( 'This panel allows you to customize Header', 'cvee' ),
		)
	);

	$wp_customize->add_panel( 'frontpage', array(
			'priority' => 11,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => esc_html__( 'Frontpage', 'cvee' ),
			'description' => esc_html__( 'This panel allows you to customize Frontpage', 'cvee' ),
		)
	);

	$wp_customize->add_panel( 'basic_settings', array(
			'priority' => 9,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => esc_html__( 'Basic Site Settings', 'cvee' ),
			'description' => esc_html__( 'This panel allows you to customize site settings', 'cvee' ),
		)
	);


	$wp_customize->add_panel( 'footer', array(
			'priority' => 123,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => esc_html__( 'Footer', 'cvee' ),
			'description' => esc_html__( 'This panel allows you to customize Footer', 'cvee' ),
		)
	);


	// custom content class
	if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'cvee_Custom_Content' ) ) :
			class cvee_Custom_Content extends WP_Customize_Control {
				// Whitelist content parameter
				public $content = '';
				/**
				 * Render the control's content.
				 *
				 * Allows the content to be overriden without having to rewrite the wrapper.
				 *
				 * @since   1.0.0
				 * @return  void
				 */
				public function render_content() {
				if ( isset( $this->label ) ) {
					echo '<span class="customize-control-title">' . $this->label . '</span>';
				}
				if ( isset( $this->content ) ) {
					echo $this->content;
				}
				if ( isset( $this->description ) ) {
					echo '<span class="description customize-control-description">' . $this->description . '</span>';
				}
			}
			}
		endif;



	// Header Section
	$wp_customize->add_section( 'header_section' , array(
			'title'      => esc_html__('Header Colors','cvee'), 
			'panel'      => 'header',
			'capability'     => 'edit_theme_options',
			'priority'   => 10   
		)
	);  



	// Nav icon Color
	$wp_customize->add_setting('cvee[nav_icon_color]',array(
				'default'         => '#111',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'       => 'postMessage',
				'type'            => 'option',
		)
	);
				// Control
				$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nav_icon_color', array(
							'label'      => esc_html__( 'Hamburger Icon Color', 'cvee' ),
							'section'    => 'header_section',
							'settings'   => 'cvee[nav_icon_color]' 
						)
					)
				);

	// Header background
	$wp_customize->add_setting('cvee[nav_background]',array(
				'default'         => '#f1f5f8',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'       => 'postMessage',
				'type'            => 'option',
		)
	);
				// Control
				$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'nav_background', array(
							'label'      => esc_html__( 'Header Background Color', 'cvee' ),
							'section'    => 'header_section',
							'settings'   => 'cvee[nav_background]' 
						)
					)
				);


	// site title color
	$wp_customize->add_setting('cvee[site_title_color]',array(
				'default'         => '#fff',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'       => 'postMessage',
				'type'            => 'option',
		)
	);
				// Control
				$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'site_title_color', array(
							'label'      => esc_html__( 'Site Title Color', 'cvee' ),
							'section'    => 'header_section',
							'settings'   => 'cvee[site_title_color]' 
						)
					)
				);


	// static frontpage info
	$wp_customize->add_setting( 'cvee[fp_instruction]', array(
				'default' => '',
				'sanitize_callback' => 'cvee_sanitize_text',
				'type'   => 'option'
			) );

			// Control
			$wp_customize->add_control( new cvee_Custom_Content( $wp_customize, 'fp_instruction', array(
			'section' => 'static_front_page',
			'content' => sprintf( __( '<h2>To Setup frontpage, Go to:</h2></br>
		<ul>
		<li>1. <b>Dashboard -> Pages -> Add New</b></li>
		<li>2. On the right, you will find a box titled <b>Page Attributes</b></li>
		<li>3. Select <b>Front Page Template</b> from the dropdown <b>Template</b> options</li>
		<li>4. Type Page title & click on <b>Publish</b></li>
		<li>5. Go to <b>Dashboard -> Settings -> Reading -> Front page displays </b></li>
		<li>6. Select <b>A static page(select below)</b> </li>
		<li>7. Then select the page with <b>"Front Page Template"</b> as <b>Front Page</b></li>
		<li>8. Click on <b>Save & Publish</b> and you are done.</li>
		<li>9. Still struggling? Follow the documentation <a cveeget="_blank" href="%s">Front Page Setup Documentation</a>
		</ul></br>', 'cvee' ), esc_url( 'https://asphaltthemes.com/docs/cvee/how-to-setup-frontpage/' )),
			'settings' =>  'cvee[fp_instruction]',
		) ) );


	// basic  Section
	$wp_customize->add_section( 'basic_site_section' , array(
			'title'      => esc_html__('Site Settings','cvee'), 
			'panel'      => 'misc',
			'capability'     => 'edit_theme_options',
			'priority'   => 10   
		)
	);  


	// Typography Section
	$wp_customize->add_section( 'typorgraphy_section' , array(
			'title'      => esc_html__('Typography Settings','cvee'), 
			'panel'      => 'basic_settings',
			'capability'     => 'edit_theme_options',
			'priority'   => 10   
		)
	); 

	//site font family 
	$wp_customize->add_setting('cvee[body_font_family]',array(
				'default'         => 'Open Sans',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'       => 'postMessage',
				'type'			=> 'option'
			)
		);

				// Control
				$wp_customize->add_control(new WP_Customize_Control($wp_customize,'body_font_family', array(
						'label'          => __( 'Font-Family', 'cvee' ),
						'section'        => 'typorgraphy_section',
						'settings'       => 'cvee[body_font_family]',
						'type'           => 'select',
						'choices'        => cvee_fonts()
					)
				)       
		);
	

	
	//site body_line_height
	$wp_customize->add_setting('cvee[body_line_height]',array(
		'default'         => '20',
		'sanitize_callback' => 'wp_kses_post',
		'transport'       => 'postMessage',
		'type'			=> 'option'
		)
	);

		
			// Control
			$wp_customize->add_control(new WP_Customize_Control($wp_customize,'body_line_height', array(
				'label'          => __( 'Line Height', 'cvee' ),
				'section'        => 'typorgraphy_section',
				'settings'       => 'cvee[body_line_height]',
				'type'           => 'range',
				'input_attrs' => array(
				'min' => '15',
				'max' => '25',
				'step' => '.5',
				)
			)
		)       
	);


	// Footer  Section
	$wp_customize->add_section( 'footer_section' , array(
			'title'      => esc_html__('Footer settings','cvee'), 
			'panel'      => 'footer',
			'capability'     => 'edit_theme_options',
			'priority'   => 10   
		)
	); 


	//footer text color
	$wp_customize->add_setting('cvee[colophon_txt_color]',array(
		'default'         => '#333',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'       => 'postMessage',
		'type'            => 'option',
		)
		);
			// Control
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'colophon_txt_color', array(
							'label'      => esc_html__( 'Footer Text Color', 'cvee' ),
							'section'    => 'footer_section',
							'settings'   => 'cvee[colophon_txt_color]' 
						)
					)
				);


	//footer bg color
	$wp_customize->add_setting('cvee[footer_bg_color]',array(
		'default'         => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'       => 'postMessage',
		'type'            => 'option',
		)
		);
			// Control
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_bg_color', array(
							'label'      => esc_html__( 'Footer Background Color', 'cvee' ),
							'section'    => 'footer_section',
							'settings'   => 'cvee[footer_bg_color]' 
						)
					)
				);





}
add_action( 'customize_register', 'cvee_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function cvee_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function cvee_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cvee_customize_preview_js() {
	wp_enqueue_script( 'cvee-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'cvee_customize_preview_js' );



function cvee_customizer_misc_js() {
	wp_enqueue_script( 'cvee-customizer-widget-js', get_template_directory_uri() .'/js/customizer-control.js', array( 'customize-controls' , 'jquery'), null, true );

}
add_action( 'customize_controls_enqueue_scripts', 'cvee_customizer_misc_js' );



// Sanitize text field
function cvee_sanitize_text( $text ) {

    return wp_kses_post( force_balance_tags( $text ) );
}

// Sanitize text
function cvee_sanitize_css( $input ) {
	return wp_filter_nohtml_kses( $input );
}


// checkbox sanitization
   function cvee_checkbox_sanitize($input) {
      if ( $input == 1 ) {
         return 1;
      } else {
         return '';
      }
   }

// icon sanitization
function cvee_icon_sanitize( $input ) {
    
    $valid_keys = athena_icons();
    
    if (array_key_exists($input, $valid_keys)) {
        return $input;
    } else {
        return '';
    }
    
}



function cvee_fonts(){
    
    $font_family_array = array(
        'Arial, Helvetica, sans-serif'          => 'Arial',
        'Arial Black, Gadget, sans-serif'       => 'Arial Black',
        'Courier New', 'monospace'              => 'Courier New',
        'Lobster Two, cursive'                  => 'Lobster - Cursive',
        'Georgia, serif'                        => 'Georgia',
        'Impact, Charcoal, sans-serif'          => 'Impact',
        'Lucida Console, Monaco, monospace'     => 'Lucida Console',
        'Lucida Sans Unicode sans-serif'	    => 'Lucida Sans Unicode',
        'MS Sans Serif, Geneva, sans-serif'     => 'MS Sans Serif',
        'MS Serif, New York, serif'             => 'MS Serif',
        'Open Sans, sans-serif'                 => 'Open Sans',
        'Source Sans Pro, sans-serif'           => 'Source Sans Pro',
        'Lato, sans-serif'                      => 'Lato',
        'Tahoma, Geneva, sans-serif'            => 'Tahoma',
        'Times New Roman, Times, serif'         => 'Times New Roman',
        'Trebuchet MS, sans-serif'              => 'Trebuchet MS',
        'Verdana, Geneva, sans-serif'           => 'Verdana',
        'Raleway, sans-serif'                   => 'Raleway',
        'Roboto Condensed, sans-serif'          => 'Robot Condensed',
        'PT Sans, sans-serif'                   => 'PT Sans',
        'Open Sans Condensed, sans-serif'       => 'Open Sans Condensed',
		'Roboto Slab, sans-serif'               => 'Roboto Slab',
		'Robot', 'sans-serif'					=> 'Roboto',
        'Droid Sans, sans-serif'                => 'Droid Sans',
        'Ubuntu, sans-serif'  					=> 'Ubuntu',
        'Tangerine, serif'						=> 'Tangerine serif',
        'Josefin Slab, sans-serif'				=> 'Josefin Slab',
        'Arvo, sans-serif'						=> 'Arvo',
        'Vollkorn, sans-serif'					=> 'Vollkorn',
        'Abril Fatface, cursive'				=> 'Abril Fatface',
        'Old Standard TT, serif'			    => 'Old Standard TT',
        'Anivers, sans-serif'					=> 'Anivers',
        'Junction, sans-serif'					=> 'Junction',
        'Fertigo, sans-serif'					=> 'Fertigo',
        'Aller, sans-serif'						=> 'Aller',
        'Audimat, sans-serif'					=> 'Audimat',
        'Delicious, sans-serif'					=> 'Delicious',
        'Prociono, sans-serif'					=> 'Prociono',
        'Fontin, sans-serif'					=> 'Fontin',
        'Fontin-Sans, sans-serif'				=> 'Fontin-Sans',
        'Playfair Display, sans-serif'			=> 'Playfair Display',
        'Work Sans, sans-serif'					=> 'Work Sans',
        'Alegreya, sans-serif'					=> 'Alegreya',
        'Alegreya Sans, sans-serif'				=> 'Alegreya Sans',
        'Fira Sans, sans-serif'					=> 'Fira Sans',
        'Inconsolata, sans-serif'				=> 'Inconsolata',
        'Lora, sans-serif'						=> 'Lora',
        'Karla, sans-serif'						=> 'Karla',
        'Cardo, sans-serif'						=> 'Cardo',
        'Bitter, sans-serif'					=> 'Bitter',
        'Domine, sans-serif'					=> 'Domine',
        'Varela Round, sans-serif'				=> 'Varela Round',
        'Chivo, sans-serif'						=> 'Chivo',
		'Montserrat, sans-serif'          => 'Montserrat',
		'Crimson Text, sans-serif'        => 'Crimson Text',
		'Libre Baskerville, sans-serif'   => 'Libre Baskerville',
		'Archivo Narrow, sans-serif'      => 'Archivo Narrow',
		'Anonymous Pro, sans-serif'       => 'Anonymous Pro',
		'Merriweather, sans-serif'        => 'Merriweather',
		'Neuton, sans-serif'              => 'Neuton',
		'Poppins, sans-serif'             => 'Poppins',
		'Noto Sans, sans-serif'           => 'Noto Sans',
		'Oswald, sans-serif'              => 'Oswald',
		'Slabo 27px, serif'               => 'Slabo 27px serif',
		'PT Sans, sans-serif'             => 'PT Sans',
		'Open Sans Condensed, sans-serif' => 'Open Sans Condensed ',
		'Poppings, sans-serif'            => 'Poppings',
		'Lora , sans-serif'               => ' Lora',
		'PT Serif , sans-serif'           => ' PT Serif',
		'Titillium Web , sans-serif'      => ' Titillium Web',
		'Muli , sans-serif'               => ' Muli',
		'Arimo , sans-serif'              => ' Arimo',
		'Dosis , sans-serif'              => ' Dosis',
		'Cabin , sans-serif'              => ' Cabin',
		'Quicksand , sans-serif'          => ' Quicksand',
		'Exo 2 , sans-serif'              => ' Exo 2',
	);
    
    return $font_family_array;
}

