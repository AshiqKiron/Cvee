
/* Other JS snippets used in this theme*/
(function( $ ) {
 
    "use strict";
     
    $(document).ready( function(){

        //Sidr Mobile Menu
        var padmenu = $(".menu-toggle").html();
        $('.menu-toggle').sidr({
         name: 'sidr-main',
         source: '#site-navigation',
         side: 'right'
        });
        $(".sidr").prepend("<div class='pad_menutitle'>"+padmenu+"<span class='menu_close'><i class='fas fa-times'></i></span></div>");
        
        $(".pad_menutitle span").click(function() {
            $.sidr('close', 'sidr-main')
            preventDefaultEvents: false;
        });
    } ); 
 
})(jQuery);




jQuery(document).ready(function(){

    //Check to see if the window is top if not then display button
    jQuery(window).scroll(function(){
        if (jQuery(this).scrollTop() > 800) {
            jQuery('.fa-chevron-up').fadeIn();
        } else {
            jQuery('.fa-chevron-up').fadeOut();
        }
    });
    
    //Click event to scroll to top
    jQuery('.scrolltotop').click(function(){
        jQuery('html,body').animate({scrollTop : 0}, 800);
        return false;
    });

    

      //Make sure the footer always stays to the bottom of the page when the page is short
      var docHeight = jQuery(window).height();
      var footerHeight = jQuery('#colophon').height();
      var footerTop = jQuery('#colophon').position().top + footerHeight;
       
      if (footerTop < docHeight) {  jQuery('#colophon').css('margin-top', 1 + (docHeight - footerTop) + 'px');  }

});