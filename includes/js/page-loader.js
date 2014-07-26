/* Page Loader
 * Dynamically loads pages using the history API
 *
 * Brian Yang
 * http://brianyang.me/
 */

jQuery(document).ready(function( $ ) {

    if(Modernizr.history){

    var $mainContent = $("#content"),
        $pageWrap    = $("#main"),
        baseHeight   = 0;
        
    $pageWrap.height($pageWrap.height());
    baseHeight = $pageWrap.height() - $mainContent.height();
    
    $("#primary-nav").on("click", "a", function() {
        var _link = $(this).attr("href");
        history.pushState(null, null, _link);
        loadContent(_link);
        return false;
    });

    function loadContent(href){
        $mainContent
                .find(".entry-content")
                .fadeOut(200, function() {
                    $mainContent.hide().load(href + " .entry-content", function() {
                        $mainContent.fadeIn(200, function() {
                            $pageWrap.animate({
                                height: baseHeight + $mainContent.height() + "px"
                            });
                        });
                        //$("#primary-nav a").removeClass("current");
                        //$("#primary-nav a[href$="+href+"]").addClass("current");
                    });
                });
    }
    
    $(window).bind('popstate', function(){
       _link = location.pathname.replace(/^.*[\\\/]/, ''); //get filename only
       loadContent(_link);
    });

} // otherwise, history is not supported, so nothing fancy here.

    
});
