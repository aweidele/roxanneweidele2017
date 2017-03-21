<?php 
get_header();
if(have_posts()):while(have_posts()):the_post();
$additional_content_type = get_field('additional_content_type');
if($additional_content_type == 'shows') {
  $additional_content = get_field('shows_and_awards');
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
  </section>
  <pre><?php print_r($additional_content); ?></pre>
</article>
<?php
endwhile; endif;
get_footer();
?>