<?php /* Template Name: Home */ 
get_header();
if(have_posts()):while(have_posts()):the_post();
$gallery = get_field('gallery');
?>
<section class="homepage-gallery">
<?php foreach($gallery as $image) { ?>
  <article>
    <?php echo $image['title']; ?>
  </article>
<?php } ?>
</section>
<pre><?php print_r($gallery); ?></pre>
<?php
endwhile; endif;
get_footer();
?>