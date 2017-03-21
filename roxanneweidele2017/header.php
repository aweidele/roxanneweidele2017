<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
<title><?php 
  if (is_front_page()) { 
    echo get_bloginfo('name');
    if (get_bloginfo('description')!="") { echo " | ".get_bloginfo('description'); }
  } else {
    wp_title ( ' | ', true,'right' );
    echo get_bloginfo('name');
  } ?></title>
<?php wp_head();
  $locations = get_nav_menu_locations();
  $primaryMenu = wp_get_nav_menu_items($locations['primary-menu']);
?>
</head>

<body>
<header>
 <?php if(is_front_page()) { ?>
  <h1><a href="<?php echo get_option('home'); ?>"><?php echo get_bloginfo('name'); ?></a></h1>
<?php } else { ?>
  <div class="title"><a href="<?php echo get_option('home'); ?>"><?php echo get_bloginfo('name'); ?></a></div>
<?php } ?>
  <nav>
    <button><i></i></button>
    <ul>
<?php foreach($primaryMenu as $item) { ?>
      <li><a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a></li>
<?php } ?>
    </ul>
  </nav>
</header>
<main>