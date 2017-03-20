<?php 
get_header();
$terms = get_terms( array(
    'taxonomy' => 'medium',
    'hide_empty' => false,
) );

if(have_posts()):
?>

<?php while(have_posts()):the_post();
  $gallery = get_field('gallery');
?>
<section class="homepage-gallery">
   <header>
     <h2>All Works</h2>
     <nav>
      <ul>
        <li><input type="radio" name="filter" value="all" id="all" checked data-title="All Works"><label for="all">All Works</label></li>
 <?php foreach($terms as $m) { ?>
        <li><input type="radio" name="filter" value="<?php echo $m->slug; ?>" id="<?php echo $m->slug; ?>" data-title="<?php echo $m->name; ?>"><label for="<?php echo $m->slug; ?>"><?php echo $m->name; ?></label></li>
<?php } ?>
      </ul>
    </nav>
  </header>
  <div>
<?php foreach($gallery as $image) {
  $info = array(
    'title' => $image['title'],
    'images' => array(
      'mobileThumb' => $image['sizes']['Homepage Mobile Thumbnail'],
      'thumbnail' => $image['sizes']['Homepage Thumbnail'],
      'mobile' => $image['sizes']['Mobile Max'],
      'xlarge' => $image['sizes']['XLarge'],
      'large' => $image['sizes']['Large'],
      'medium' => $image['sizes']['Med'],
      'small' => $image['sizes']['Small'],
    ),
    'medium' => get_field('medium',$image["ID"])
  );
?>
  <figure data-medium='<?php echo $info['medium']->slug; ?>'>
    <a href="<?php echo get_permalink($image["ID"]); ?>" data-slide='<?php echo json_encode($info, JSON_HEX_APOS); ?>'>
      <picture>
        <source srcset="<?php echo $info['images']['mobileThumb']; ?>" media="(max-width: 667px)">
        <source srcset="<?php echo $info['images']['thumbnail']; ?>">
        <img src="<?php echo $info['images']['thumbnail']; ?>">
      </picture>
      <figcaption>
        <h2><?php echo $info['title']; ?></h2>
      </figcaption>
    </a>
  </figure>
<?php } ?>
  </div>
</section>
<?php
endwhile; endif;
get_footer();
?>