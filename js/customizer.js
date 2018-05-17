/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );


		//Nav Hamburger bg color
		wp.customize( 'cv[nav_color]', function( value ) {
			value.bind( function( to ) {
				$( '.menu-toggle' ).css( 'background', to );
			} );
		});
	
		// site title color
		wp.customize( 'cv[site_title_color]', function( value ) {
			value.bind( function( to ) {
				$( '.site-title a' ).css( 'color', to );
			} );
		});
	
	
		//Nav Hamburger icon color
		wp.customize( 'cv[nav_icon_color]', function( value ) {
			value.bind( function( to ) {
				$( '.menu-toggle' ).css( 'color', to );
			} );
		});
	
		//header bg color
		wp.customize( 'cv[nav_background]', function( value ) {
			value.bind( function( to ) {
				$( '#masthead' ).css( 'background-color', to );
			} );
		});
	
		//site title  color
		wp.customize( 'cv[site_title_color]', function( value ) {
			value.bind( function( to ) {
				$( '.site-title a' ).css( 'color', to );
			} );
		});
	
	
	

		//site font family
		 wp.customize( 'cv[body_font_family]', function( value ) {
			value.bind( function( to ) {            
				$( 'body' ).css('font-family', to );            
			} );
		});  
	
		//Site Font Size
		 wp.customize( 'cv[body_font_size]', function( value ) {
			value.bind( function( to ) {             
				$( 'body' ).css( 'font-size', to + 'px' );            
			} );
		});  
	
		/*posts page*/
		wp.customize( 'cv[post_site_titlecol]', function( value ) {
			value.bind( function( to ) {
				$( '.single-post .site-title a' ).css( 'color', to );
			} );
		});
	
	

		//Site Line height
		wp.customize( 'cv[body_line_height]', function( value ) {
			value.bind( function( to ) {             
				$( 'body' ).css( 'line-height', to + 'px' );            
			} );
		});
	
		 
	
	
		//colophon text color
		wp.customize( 'cv[colophon_txt_color]', function( value ) {
			value.bind( function( to ) {
				$( '.footer-widget h2',  '.footer-widget h3', '.footer-widget ul'  ,  '.footer-widget .wp-calendar' ,'.rssSummary', '.footer-widget p', '.footer-widget a' ).css( 'color', to );
			} );
		});
	
	
		//colophon bg color
		wp.customize( 'cv[footer_bg_color]', function( value ) {
			value.bind( function( to ) {
				$( '.footer-widget' ).css( 'background-color', to );
			} );
		});


	
	
	



} )( jQuery );
