
/**
 * author Remy Sharp
 * url http://remysharp.com/2009/01/26/element-in-view-event-plugin/
 * fork https://github.com/zuk/jquery.inview
 */
(function($) {
    'use strict';

    function getScrollTop() {
        return window.pageYOffset ||
            document.documentElement.scrollTop ||
            document.body.scrollTop;
    }

    function getViewportHeight() {
        var height = window.innerHeight; // Safari, Opera
        // if this is correct then return it. iPad has compat Mode, so will
        // go into check clientHeight (which has the wrong value).
        if (height) {
            return height;
        }
        var mode = document.compatMode;

        if ((mode || !$.support.boxModel)) { // IE, Gecko
            height = (mode === 'CSS1Compat') ?
                document.documentElement.clientHeight : // Standards
                document.body.clientHeight; // Quirks
        }

        return height;
    }

    function offsetTop(debug) {
        // Manually calculate offset rather than using jQuery's offset
        // This works-around iOS < 4 on iPad giving incorrect value
        // cf http://bugs.jquery.com/ticket/6446#comment:9
        var curtop = 0;
        for (var obj = debug; obj; obj = obj.offsetParent) {
            curtop += obj.offsetTop;
        }
        return curtop;
    }

    function checkInView() {
        var viewportTop = getScrollTop(),
            viewportBottom = viewportTop + getViewportHeight();




        $('.inview').each(function() {
            var $el = $(this),
                elTop = offsetTop(this),
                elHeight = $el.height(),
                elBottom = elTop + elHeight,
                wasInView = $el.data('inview') || false,
                offset = $el.data('offset') || 0,
                inView = elTop >= viewportTop && elBottom <= viewportBottom,
                isBottomVisible = elBottom + offset >= viewportTop && elTop <= viewportTop,
                isTopVisible = elTop - offset <= viewportBottom && elBottom >= viewportBottom,
                inViewWithOffset = inView || isBottomVisible || isTopVisible ||
                    (elTop <= viewportTop && elBottom >= viewportBottom);


            if (inViewWithOffset) {
                var visPart = (isTopVisible) ? 'top' : (isBottomVisible) ? 'bottom' : 'both';
                if (!wasInView || wasInView !== visPart) {
                    $el.data('inview', visPart);
                    $el.trigger('inview', [true, visPart]);

                }
            } else if (!inView && wasInView) {
                $el.data('inview', false);
                $el.trigger('inview', [false]);

            }
        });
    }

    function createFunctionLimitedToOneExecutionPerDelay(fn, delay) {
        var shouldRun = false;
        var timer = null;

        function runOncePerDelay() {
            if (timer !== null) {
                shouldRun = true;
                return;
            }
            shouldRun = false;
            fn();
            timer = setTimeout(function() {
                timer = null;
                if (shouldRun) {
                    runOncePerDelay();
                }
            }, delay);
        }

        return runOncePerDelay;
    }

    // ready.inview kicks the event to pick up any elements already in view.
    // note however, this only works if the plugin is included after the elements are bound to 'inview'
    var runner = createFunctionLimitedToOneExecutionPerDelay(checkInView, 100);
    $(window).on('checkInView.inview click.inview ready.inview scroll.inview resize.inview', runner);

})(jQuery);

// Remove Placeholder
$('input,textarea').focus(function(){
   $(this).data('placeholder',$(this).attr('placeholder'))
   $(this).attr('placeholder','');
});
$('input,textarea').blur(function(){
   $(this).attr('placeholder',$(this).data('placeholder'));
});


    //Tab to top
    $(window).scroll(function() {
    if ($(this).scrollTop() > 1){  
        $('.scroll-top-wrapper').addClass("show");
    }
    else{
        $('.scroll-top-wrapper').removeClass("show");
    }
});
    $(".scroll-top-wrapper").on("click", function() {
     $("html, body").animate({ scrollTop: 0 }, 600);
    return false;
});


 $('.navbar .dropdown').hover(function() {
      $(this).find('.dropdown-menu').first().stop(true, true).slideDown(150);
    }, function() {
      $(this).find('.dropdown-menu').first().stop(true, true).slideUp(105)
    });

if($('html').hasClass('header-on')){ 
    $('#topNav').removeClass('navbar-fixed-top');
    $(window).scroll(function() {    
    var scroll = $(window).scrollTop();
        var headHeight = $('#header-image').height();
     //>=, not <=
    if (scroll >= headHeight) {
        //clearHeader, not clearheader - caps H
        $('#topNav').addClass('navbar-fixed-top');
    } else {
        if( $('#topNav').hasClass('navbar-fixed-top')){
            $('#topNav').removeClass('navbar-fixed-top');
        }
    }
}); //missing );
    
} else {
    $('#topNav').addClass('navbar-fixed-top');
}



equalheight = function(container){

var currentTallest = 0,
     currentRowStart = 0,
     rowDivs = new Array(),
     $el,
     topPosition = 0;
 $(container).each(function() {

   $el = $(this);
   $($el).height('auto')
   topPostion = $el.position().top;

   if (currentRowStart != topPostion) {
     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
       rowDivs[currentDiv].height(currentTallest);
     }
     rowDivs.length = 0; // empty the array
     currentRowStart = topPostion;
     currentTallest = $el.height();
     rowDivs.push($el);
   } else {
     rowDivs.push($el);
     currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
  }
   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
     rowDivs[currentDiv].height(currentTallest);
   }
 });
}

$(window).load(function() {
  equalheight('.eq-blocks');
});


$(window).resize(function(){
  equalheight('.eq-blocks');
});
