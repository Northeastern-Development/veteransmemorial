<?php

  // Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
  function remove_thumbnail_dimensions( $html )
  {
      $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
      return $html;
  }

  // set image sizes that we should create when uploaded
  if (function_exists('add_theme_support')){
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
  }

?>
