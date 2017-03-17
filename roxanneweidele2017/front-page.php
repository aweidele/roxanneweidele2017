<?php 
get_header();
if(have_posts()):while(have_posts()):the_post();
$gallery = get_field('gallery');
?>
<section class="homepage-gallery">
<?php foreach($gallery as $image) { 
  $info = array(
    'title' => $image['title'],
    'mobileThumb' => $image['sizes']['Homepage Mobile Thumbnail'],
    'thumbnail' => $image['sizes']['Homepage Thumbnail'],
    'mobile' => $image['sizes']['Mobile Max'],
    'xlarge' => $image['sizes']['XLarge'],
    'large' => $image['sizes']['Large'],
    'medium' => $image['sizes']['Med'],
    'small' => $image['sizes']['Small'],
  );
?>
  <figure>
    <a href="<?php echo get_permalink($image["ID"]); ?>" data-slide='<?php echo json_encode($info, JSON_HEX_APOS); ?>'>
      <picture>
        <source srcset="<?php echo $info['mobileThumb']; ?>" media="(max-width: 667px)">
        <source srcset="<?php echo $info['thumbnail']; ?>">
        <img src="<?php echo $info['thumbnail']; ?>">
      </picture>
      <!-- img src="<?php echo $info['thumbnail']; ?>" -->
      <figcaption>
        <h2><?php echo $info['title']; ?></h2>
      </figcaption>
    </a>
  </figure>
<?php } ?>
</section>
<?php
endwhile; endif;
get_footer();
?>