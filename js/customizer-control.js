(function( $ ) {
    wp.customize.bind( 'ready', function() {
        var customize = this;

        // Codes here
        var api = wp.customize;
	wp.customize.section( 'sidebar-widgets-frontpage-1' ).panel( 'frontpage');
	//wp.customize.section( 'sidebar-widgets-frontpage-1' ).priority( 11 );
	//id = wp.customize.section( 'sidebar-widgets-frontpage-1' ).panel('frontpage');

    } );
})( jQuery );