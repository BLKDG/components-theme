
  $(document).on('ready',function(){

      $('#mobile-menu').on('click',function(){
          $(this).toggleClass('open');

          $('.mobile-menu').fadeToggle();
          $('.utility-menu').fadeToggle();
      });

  });


  $(window).load(function(){


  });


  $(window).resize(function(){


  });

  /**
   * Optional Pinned Header
   */
  $(window).on('scroll',function (event) {
      var scroll = $(window).scrollTop();

      if(scroll > 84){
          $('header').addClass('scroll');
      } else {
          $('header').removeClass('scroll');
      }
  });