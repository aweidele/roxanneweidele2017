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
  
   /*
  if($('form').length) {
    b = $('form button');
    h = '<li><span class="c"></span></li>';
    b.parents('li').before(h);
    $('.c').on('click',function() {
      c = $(this);
      if(!c.hasClass('h')) {
        $.ajax({
          url: "http://roxanneweidele.com/2017/wp-content/themes/roxanneweidele2017/inc/c.php"
        }).done(function(d) {
          c.addClass('h');
          c.parents('li').append('<input type="hidden" name="c" id="c" value="'+d.w+'">');
        });
      }
    });
  }
  */
});