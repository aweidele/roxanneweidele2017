<?php 
get_header();
if(have_posts()):while(have_posts()):the_post();
$additional_content_type = get_field('additional_content_type');
if($additional_content_type == 'shows') {
  $additional_content = get_field('shows_and_awards');
}
?>
<section class="page">
  <pre><?php print_r($additional_content); ?></pre>
</section>
<?php
endwhile; endif;
get_footer();
?>