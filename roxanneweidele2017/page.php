<?php 
get_header();
if(have_posts()):while(have_posts()):the_post();
$additional_content_type = get_field('additional_content_type');
if($additional_content_type == 'shows') {
  $additional_content = get_field('shows_and_awards');
} else if($additional_content_type == 'see') {
  $additional_content = get_field('where_to_see');
}
?>
<article class="page">
  <header><h1><?php the_title(); ?></h1></header>
  <section>
  <?php the_content(); ?>
<?php if($additional_content_type == 'shows') { ?>
    <dl>
<?php foreach($additional_content as $content) { ?>
      <dt><?php echo $content['show_name']; ?></dt>
      <dd><?php 
          echo $content['location'];
          if($content['location'] != '' && $content['date'] != '') { 
            echo ', '; 
          }
          if($content['date'] != '') {
            echo $content['date'];
          }
          if($content['award'] != '') {
            echo ' <span>('.$content['award'].')</span>';
          }
?></dd>
<?php } ?>
    </dl>
<?php } ?>
<?php 
    if($additional_content_type == 'see') { 
      foreach($additional_content as $content) { ?>

    <aside>
      <h2><?php echo $content['location_name']; ?></h2>
      <p><a href="<?php echo $content['web_address']; ?>" target="_blank"><?php echo $content['web_address']; ?></a></p>
      <?php echo $content['address']; ?>
      <p><a href="https://www.google.com/maps/place/<?php echo preg_replace('/(<p>|<br \/>|<br\/>|<br>| )/','+',$content['address']); ?>" class="map-link" target="_blank"><i class="icon-location"></i> Map</a></p>
      <p><a href="tel:<?php echo preg_replace('/[\(\) .-]/','',$content['phone_number']); ?>"><?php echo $content['phone_number']; ?></a></p>
    </aside>

<?php 
  }
} ?>
  </section>
</article>
<?php
endwhile; endif;
get_footer();
?>