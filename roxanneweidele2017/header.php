<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php 
  if (is_front_page()) { 
    echo get_bloginfo('name');
    if (get_bloginfo('description')!="") { echo " | ".get_bloginfo('description'); }
  } else {
    wp_title ( ' | ', true,'right' );
    echo get_bloginfo('name');
  } ?></title>
<?php wp_head(); ?>
</head>

<body>
