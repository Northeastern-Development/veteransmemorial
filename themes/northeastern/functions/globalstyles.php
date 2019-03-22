<?php

  // Remove 'text/css' from our enqueued stylesheet
  function northeastern_style_remove($tag)
  {
      return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
  }

  // Load northeastern styles
  function northeastern_styles()
  {
      //wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
      //wp_enqueue_style('normalize'); // Enqueue it!

      wp_register_style('northeastern', get_template_directory_uri() . '/css/style.css', array(), '1.0', 'all');
      wp_enqueue_style('northeastern'); // Enqueue it!
  }

?>
