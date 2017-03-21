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
  
  sel = $('.homepage-gallery > header > nav input[name="filter"]:checked').val();
  if(sel != 'all') {
    $('.homepage-gallery > div > figure').hide();
    $('.homepage-gallery > div > figure[data-medium="'+sel+'"]').show();
  }
  
  $('.homepage-gallery > header > nav input[name="filter"]').on('change',function() {
    med = $(this).val();
    medName = $(this).data('title');
    $('.homepage-gallery > header > h2').text(medName);
    if(med == 'all') {
      $('.homepage-gallery > div > figure').fadeIn(250);
    } else {
      $('.homepage-gallery > div > figure').fadeOut(250);
      $('.homepage-gallery > div > figure[data-medium="'+med+'"]').fadeIn(250);
    }
  });
  
  //$(window).resize(function() {
    //$('header h1').html($(window).width());
  //});
});