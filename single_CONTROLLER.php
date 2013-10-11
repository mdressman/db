<?php
  $post = $wp_query->post;

  if (in_category('9')) {
      include(TEMPLATEPATH.'/single-feature.php');
  } elseif (in_category('20')) {
      include(TEMPLATEPATH.'/single-news.php');
  } else {
      include(TEMPLATEPATH.'/single-news.php');
  }
?>