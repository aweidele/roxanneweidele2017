<?php /* Template Name: Home */ 
get_header();
if(have_posts()):while(have_posts()):the_post();
$gallery = get_field('gallery');
?>
<section class="homepage-gallery">
<?php foreach($gallery as $image) { ?>
  <figure>
    <a href="<?php echo get_permalink($image["ID"]); ?>">
      <picture>
        <source srcset="<?php echo $image['sizes']['Homepage Mobile Thumbnail']; ?>" media="(max-width: 667px)">
        <source srcset="<?php echo $image['sizes']['Homepage Thumbnail']; ?>">
        <img src="<?php echo $image['sizes']['Homepage Thumbnail']; ?>">
      </picture>
      <!-- img src="<?php echo $image['sizes']['Homepage Thumbnail']; ?>" -->
      <figcaption>
        <h2><?php echo $image['title']; ?></h2>
      </figcaption>
    </a>
  </figure>
<?php } ?>
</section>
<pre><?php print_r($gallery); ?></pre>
<?php
endwhile; endif;
get_footer();
?>