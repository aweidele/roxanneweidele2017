var $ = jQuery;
$(document).ready(function() {
 $('body > header > nav > button').on('click',function() {
    var nav = $(this).parents('nav');
    if(nav.hasClass('open')) {
      nav.removeClass('open').addClass('closed');
    } else {
      nav.addClass('open').removeClass('closed');
    }
  });
  
  //$(window).resize(function() {
    //$('header h1').html($(window).width());
  //});
});