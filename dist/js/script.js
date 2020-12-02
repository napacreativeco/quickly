(function($) {

    /* =============
      Burger Menus
      ============= */
    $('.hamburger').on('click', function() {
      $('.navigation__flyout').css("display", "flex").hide().fadeIn();
    });
    $('.french-fries').on('mouseenter', function() {
      $('.fry').delay(200).addClass('french-fries-hover');
    });
    $('.french-fries').on('mouseleave', function() {
      $('.fry').delay(200).removeClass('french-fries-hover');
    });
    $('.french-fries').on('click', function() {
      $('.navigation__flyout').fadeOut();
    });
    
    
    
    /* =============
         Sub-Menu
      ============= */
    /* Add 'dropdown' class to all sub-menu items */
    function addDropdown() {
      $('.menu-item-has-children').addClass('dropdown');
      $('.menu-item-has-children').children('a').addClass('dropdown');
      $('.sub-menu').children('li').addClass('dropdown');
    }
    addDropdown();

    /* Mouse Enter */
    $( "li.menu-item" ).mouseenter(function() {
      // Show this submenu
      if ( $( this ).hasClass( "dropdown" ) ) {
        $( this ).find( " > .sub-menu" ).slideDown();
      } else {
         $('.sub-menu').slideUp();
      }
    });
    
    // Close General
    $('.sub-menu').mouseleave(function() {
        $('.sub-menu').slideUp();
    });
    
    
    /* =============
      Store notice
      ============= */
    function storeMessage() {
      $('.store-message').delay(4000).css('display', 'flex').hide().slideDown();
      $('.store-message i').click(function() {
        $('.store-message').slideUp();
      });
    }
    storeMessage();

        
    /* =============
        Preloaders
      ============= */
    $(document).ready(function($) {
        var Body = $('body');
        Body.addClass('preloader-site');
    });
    $(window).load(function() {
        $('.preloader-wrapper').fadeOut();
        $('body').removeClass('preloader-site');
    });




/* ====================================
    Remove Shadow for Widget Dividers
   ==================================== */

    $(".widget-class__blog").each(function() {
      if ($(this).children().hasClass('widget__divider')) {
        // find the parent and add class ONLY if the "IF" is true
        $(this)
          .closest(".widget-class__blog")
          .addClass("no-shadow");
      }
    }); 



    $(".widget-class__blog li").each(function() {
      if ($(this).children().hasClass('post-date')) {
        // find the parent and add class ONLY if the "IF" is true
        $(this).find('a').addClass('recent-posts-link');
      }
    }); 

    
    })( jQuery );