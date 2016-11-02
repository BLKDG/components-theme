jQuery(document).ready(function($){

	$('#mobile-menu').click(function(){
		$(this).toggleClass('open');

		$('.mobile-menu').fadeToggle();
		$('.utility').fadeToggle();
	});

});

/**
 * Optional Pinned Header
 */

// jQuery(window).scroll(function (event) {
//     var scroll = jQuery(window).scrollTop();

//     if(scroll > 84){
//     	jQuery('header').addClass('scroll');
//     } else {
//     	jQuery('header').removeClass('scroll');
//     }

// });