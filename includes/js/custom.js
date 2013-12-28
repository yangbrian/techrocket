jQuery(document).ready(function() {

    /*-----------------------------------------------------------------------------------*/
    /*	Responsive Menu
     /*-----------------------------------------------------------------------------------*/
    $(window).resize(function() {
        if ($("#primary-nav").width() > 700) {
            $("#responsive-menu").hide();
        }

    });

    $(".btn-nav-left").click(function() {
        $("#responsive-menu").slideToggle(300);
    });


    /*-----------------------------------------------------------------------------------*/
    /*	Nano Scroller
     /*-----------------------------------------------------------------------------------*/
    $('.nano').nanoScroller({
        preventPageScrolling: true
    });
    $(".nano").nanoScroller();

    /*-----------------------------------------------------------------------------------*/
    /*	Fixed Sidebar
     /*-----------------------------------------------------------------------------------*/
    $(window).scroll(function() {
        var scrollTop = 198;
        if ($(window).scrollTop() >= scrollTop) {
            $('#sidebar').css({
                position: 'fixed',
                top: '0'
            });
        }
        if ($(window).scrollTop() < scrollTop) {
            $('#sidebar').removeAttr('style');
        }
    })

    /*-----------------------------------------------------------------------------------*/
    /*	jQuery Superfish Menu
     /*-----------------------------------------------------------------------------------*/

    function init_nav() {
        jQuery('ul.nav').superfish({
            delay: 10, // one second delay on mouse out 
            animation: {opacity: 'show', height: 'show'}, // fade-in and slide-down animation 
            speed: 'fast'                           // faster animation speed 
        });
    }
    init_nav();
    
    /*-----------------------------------------------------------------------------------*/
    /*	Infinite Scroll
     /*-----------------------------------------------------------------------------------*/
    jQuery(document).ready(function() {

        $('.content-loop').infinitescroll({
            navSelector: "div.rocket-pagination",
            // selector for the paged navigation (it will be hidden)
            nextSelector: "div.rocket-pagination a.next",
            // selector for the NEXT link (to page 2)
            itemSelector: ".content-loop article",
            // selector for all items you'll retrieve
            loading: {
                finished: undefined,
                finishedMsg: "<em>Congratulations, you've reached the end of the internet.</em>",
                msg: null,
                msgText: "<em>Loading...</em>",
                selector: null,
                speed: 'fast',
                start: undefined
            },
            animate: true

        });

    })

})