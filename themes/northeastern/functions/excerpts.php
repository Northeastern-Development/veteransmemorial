<?php

  // Custom Excerpts
  function northeasternwp_index($length) // Create 20 Word Callback for Index page Excerpts, call using northeasternwp_excerpt('northeasternwp_index');
  {
      return 20;
  }

  // Create the Custom Excerpts callback
  function northeasternwp_excerpt($length_callback = '', $more_callback = '')
  {
      global $post;
      if (function_exists($length_callback)) {
          add_filter('excerpt_length', $length_callback);
      }
      if (function_exists($more_callback)) {
          add_filter('excerpt_more', $more_callback);
      }
      $output = get_the_excerpt();
      $output = apply_filters('wptexturize', $output);
      $output = apply_filters('convert_chars', $output);
      $output = '<p>' . $output . '</p>';
      echo $output;
  }

  // Create 40 Word Callback for Custom Post Excerpts, call using northeasternwp_excerpt('northeasternwp_custom_post');
  function northeasternwp_custom_post($length)
  {
      return 40;
  }

?>
