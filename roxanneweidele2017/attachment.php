<?php 
get_header();
$frontpage_id = get_option( 'page_on_front' );
$gallery = get_field('gallery',$frontpage_id);
if(have_posts()):while(have_posts()):the_post();
  
  $image = array(
    'xlarge' => wp_get_attachment_image_src($post->ID,'XLarge'),
    'large' => wp_get_attachment_image_src($post->ID,'Large'),
    'med' => wp_get_attachment_image_src($post->ID,'Med'),
    'small' => wp_get_attachment_image_src($post->ID,'Small'),
    'mobile' => wp_get_attachment_image_src($post->ID,'Mobile Max')
  );

  foreach($gallery as $i => $g) {
    if($g['ID'] == $post->ID) {
      $current = $i;
      break;
    }
  }
  
  $previous = $current - 1 >= 0 ? $current - 1 : sizeof($gallery) - 1;
  $next = $current + 1 < sizeof($gallery) ? $current + 1 : 0;
  
?>
<section class="attachment-page">
   <figure>
     <picture>
      <source srcset="<?php echo $image['mobile'][0]; ?>" media="(max-width:668px)">
      <source srcset="<?php echo $image['small'][0]; ?>" media="(max-width:800px)">
      <source srcset="<?php echo $image['med'][0]; ?>" media="(max-width:1200px)">
      <source srcset="<?php echo $image['large'][0]; ?>" media="(max-width:1600px)">
      <source srcset="<?php echo $image['xlarge'][0]; ?>" media="(min-width:1900px)">
      <source srcset="<?php echo $image['large'][0]; ?>">
      <img src="<?php echo $image['large'][0]; ?>">
    </picture>
    <figcaption>
      <h2><?php the_title(); ?></h2>
     </figcaption>
  </figure>
  <h3>Share:</h3>
  <ul class="share">
    <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><span>Facebook</span><i class="icon-facebook"></i></a></li>
    <li><a href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank"><span>Tweet</span><i class="icon-twitter"></i></a></li>
    <li><a href="//pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $post->guid; ?>&description=<?php 
  echo get_bloginfo('name'); 
  if(get_bloginfo('description') != "") { echo "–".get_bloginfo('description'); }
          ?> | <?php the_title(); ?>. <?php echo get_option( 'meta_description', '' ); ?>" data-pin-do="buttonPin" data-pin-config="none" target="_blank"><span>Pin</span><i class="icon-pinterest"></i></a></li>
    <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><span>Google+</span><i class="icon-google-plus"></i></a></li>
  </ul>
  <nav>
    <ul>
      <li><a href="<?php echo get_permalink($gallery[$previous]['ID']); ?>"><i class="icon-angle-double-left"></i> Previous</a></li>
      <li><a href="<?php echo get_permalink($gallery[$next]['ID']); ?>">Next <i class="icon-angle-double-right"></i></a></li>
    </ul>
  </nav>
</section>
<pre>
<?php //print_r($gallery); ?>
</pre>
<?php
endwhile; endif;
get_footer();
?>