( function( $ ) {

	function parallaxScroll(){

		//As the user scrolls, the parallax effect occurs
		var scrolled = $( window ).scrollTop();

		$('#snowflakes-1').css('background-position','0px '+(0+(scrolled*.2))+'px');
		$('#snowflakes-2').css('background-position','80px '+(80+(scrolled*.7))+'px');

	}

	$( window ).bind( 'scroll', function() {
    	parallaxScroll();
    });
})(jQuery)