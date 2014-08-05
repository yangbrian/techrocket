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

    $('.share a').on('click', function(){
        console.log("Hey");
        newwindow=window.open($(this).attr('href'),'','height=400,width=650');
        if (window.focus) {newwindow.focus()}
        return false;
    });

});