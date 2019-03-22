<?php

  // Shortcode Demo with Nested Capability
  // function northeastern_shortcode_demo($atts, $content = null)
  // {
  //     return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
  // }
  //
  // // Shortcode Demo with simple <h2> tag
  // function northeastern_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
  // {
  //     return '<h2>' . $content . '</h2>';
  // }

  // Shortcodes
  // add_shortcode('northeastern_shortcode_demo', 'northeastern_shortcode_demo'); // You can place [northeastern_shortcode_demo] in Pages, Posts now.
  // add_shortcode('northeastern_shortcode_demo_2', 'northeastern_shortcode_demo_2'); // Place [northeastern_shortcode_demo_2] in Pages, Posts now.

  // Shortcodes above would be nested like this -
  // [northeastern_shortcode_demo] [northeastern_shortcode_demo_2] Here's the page title! [/northeastern_shortcode_demo_2] [/northeastern_shortcode_demo]

?>
