/* Page Loader
 * Dynamically loads pages using the history API
 *
 * Brian Yang
 * http://brianyang.me/
 */

$(function() {

	if (Modernizr.history) { // use the modernizer script to detect if HTML5 History is supported

$(document).on("click", "#loadunits a", function(){
var href = $(this).attr('href');

$('.row').html('<img src="img/loader.gif" alt="Loading Page...">').load(href + ' .row', function(){ 
$(this).find('.row').unwrap(); 
$('.row').hide().fadeIn(700);

var title = " Physics Review - Various Units - Brian Yang";

$('head').find('title').text(title);

history.pushState(null, title, href);

revealTog();

});
return false; 
});

}

});