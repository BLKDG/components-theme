;(function ($) {

	$(document).ready(function(){
    

	});


	$(window).load(function(){

		// Only animate elems above the fold. Everything else animate on scroll
        $('.anim-up:not(.anim-no-load), .anim-left:not(.anim-no-load), .anim-right:not(.anim-no-load)').addClass('anim-complete');
        
	});

    $(window).scroll(function() {

        $('.anim-no-load').each(function(i, el) {
            var el = $(el);
            if (el.visible(true)) {
            el.addClass('anim-complete'); 
            }
        });

    });


	$(window).resize(function(){


	});

	$.fn.visible = function(partial) {


        var $t        = $(this),
        $w            = $(window),
        viewTop       = $w.scrollTop(),
        viewBottom    = viewTop + $w.height(),
        _top          = $t.offset().top,
        _bottom       = _top + $t.height(),
        compareTop    = partial === true ? _bottom : _top,
        compareBottom = partial === true ? _top : _bottom;

        return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

    };


})(jQuery);