;(function ($) {

    $(document).ready(function(){

        $('#mobile-menu').click(function(){
            $(this).toggleClass('open');

            $('.mobile-menu').fadeToggle();
            $('.utility').fadeToggle();
        });   

    });


    $(window).load(function(){

        
    });


    $(window).resize(function(){


    });

    /**
     * Optional Pinned Header
     */
    $(window).scroll(function (event) {
        var scroll = $(window).scrollTop();

        if(scroll > 84){
            $('header').addClass('scroll');
        } else {
            $('header').removeClass('scroll');
        }
    });

})(jQuery);