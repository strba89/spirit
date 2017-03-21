/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// home page and description.
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

	// home page text color.
	wp.customize( 'tcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '#tf-home h1,#tf-home p' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '#tf-home h1,#tf-home p ' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '#tf-home h1,#tf-home p ' ).css( {
					'color': to
				} );
			}
		} );
	} );
    wp.customize( 'tcx_background_image', function( value ) {
        value.bind( function( to ) {

            0 === $.trim( to ).length ?
                $( '#tf-home' ).css( 'background', '' ) :
                $( '#tf-home' ).css( 'background', 'url( ' + to + ')' );

        });
    });
} )( jQuery );
var image_field;
jQuery(function($){
    $(document).on('click', 'input.select-img', function(evt){
        image_field = $(this).siblings('.img');
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        return false;
    });
    window.send_to_editor = function(html) {
        imgurl = $('img', html).attr('src');
        image_field.val(imgurl);
        tb_remove();
    }
})( jQuery );
