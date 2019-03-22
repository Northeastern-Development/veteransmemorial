<?php

function clean_header() {
    remove_action('wp_head', 'wp_print_scripts');
    remove_action('wp_head', 'wp_print_head_scripts', 9);
    remove_action('wp_head', 'wp_enqueue_scripts', 1);
}

add_action('wp_enqueue_scripts', 'clean_header');

  // load custom jquery
  function nudev_include_custom_jquery(){
  	wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', array(),'2.2.0');
  }

  // Removes scripts version number from script tags
  function _remove_script_version($src){
    return remove_query_arg( 'ver',  $src  );
  }

  // Load northeastern scripts (header.php)
  function northeastern_header_scripts(){
      if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

      	//wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
          //wp_enqueue_script('conditionizr'); // Enqueue it!

          //wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
          //wp_enqueue_script('modernizr'); // Enqueue it!

          wp_register_script('northeasternscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
          wp_enqueue_script('northeasternscripts'); // Enqueue it!
      }
  }
?>
