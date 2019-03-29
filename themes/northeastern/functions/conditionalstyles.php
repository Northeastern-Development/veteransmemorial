<?php

  // Load conditional northeastern styles
  function northeastern_conditional_styles(){

    if(is_page_template('templates/template-home.php')){
      wp_register_style('slickcss', get_template_directory_uri() . '/css/slick.css', array(), '1.8');
      wp_enqueue_style('slickcss');
    }

    wp_register_style('magnific-css', get_template_directory_uri() . '/css/magnific.css', array(), '1.8');
    wp_enqueue_style('magnific-css');

  }

?>
