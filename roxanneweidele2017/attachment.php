<?php 
get_header();
$frontpage_id = get_option( 'page_on_front' );
$gallery = get_field('gallery',$frontpage_id);

$terms = get_terms( array(
    'taxonomy' => 'medium',
    'hide_empty' => true,
) );

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

  $medium = get_field('medium');
  
?>
<section class="attachment-page" itemscope itemtype="http://schema.org/VisualArtwork">
  <span itemprop="creator" itemscope itemtype="http://schema.org/Person">
    <meta itemprop="name" content="<?php echo get_bloginfo('name'); ?>">
  </span>
  <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
    <meta itemprop="url" content="<?php echo $image['med'][0]; ?>">
    <meta itemprop="image" content="<?php echo $image['med'][0]; ?>">
    <meta itemprop="width" content="<?php echo $image['med'][1]; ?>">
    <meta itemprop="height" content="<?php echo $image['med'][2]; ?>">
    <link itemprop="image" href="<?php echo $image['med'][0]; ?>" />
  </div>
  <meta itemprop="artMedium" content="<?php echo ucwords($medium->name); ?>">
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
      <h1 itemprop="name"><?php the_title(); ?></h1>
     </figcaption>
  </figure>
  <h3>Share:</h3>
  <ul class="share">
    <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><span>Facebook</span><i class="icon-facebook"></i></a></li>
    <li><a href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>-<?php echo get_bloginfo('name'); ?>" target="_blank"><span>Tweet</span><i class="icon-twitter"></i></a></li>
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
<?php endwhile; endif; ?>
<section class="homepage-gallery">
   <header>
     <nav>
      <ul>
        <li><input type="radio" name="filter" value="all" id="all" data-title="All Works"><label for="all">All Works</label></li>
 <?php foreach($terms as $m) { ?>
        <li><input type="radio" name="filter" value="<?php echo $m->slug; ?>" id="<?php echo $m->slug; ?>" data-title="<?php echo $m->name; ?>"<?php if($m->slug == $medium->slug) { echo ' checked'; } ?>><label for="<?php echo $m->slug; ?>"><?php echo $m->name; ?></label></li>
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
<?php get_footer(); ?>