$(document).ready(function(){

    
$("body").fadeIn(450);

// $("a").click(function(event){
//    event.preventDefault();
//    linkLocation = this.href;
//    $("body").fadeOut(450, redirectPage);
// });
 
function redirectPage() {
   window.location = linkLocation;
}   
    

$(window).scroll(function(){
if ($(this).scrollTop() > 200) {
   $('.scrollup').fadeIn();
   } else {
   $('.scrollup').fadeOut();
}
});
 
$('.scrollup').click(function(){
   $("html, body").animate({ scrollTop: 0 }, 600);
   return false;
});
 
});

