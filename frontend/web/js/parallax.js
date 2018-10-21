$(document).ready(function() {

   $(window).bind('scroll',function(e) {
    parallaxScroll();
   });
});


function parallaxScroll(){
    var scrolled = $(window).scrollTop();
    $('.parallax').css('top',(51-(scrolled*.50))+'px');
};
