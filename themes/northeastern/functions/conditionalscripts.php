<?php

  // Load northeastern conditional scripts
  function northeastern_conditional_scripts(){
      //if(is_page_template('templates/template-home.php')){
        //  wp_register_script('slickjs', get_template_directory_uri() . '/js/lib/slick-min.js', array('jquery'), '1.8.0'); //
          //wp_enqueue_script('slickjs'); // Enqueue it!
    //  }

    if(is_page_template('templates/template-home.php')){
      wp_register_script('slick', get_template_directory_uri() . '/js/lib/slick-min.js', array('jquery'), '1.8.0', true); // Custom scripts
      wp_enqueue_script('slick'); // Enqueue it!

    }
    wp_register_script('magnific', get_template_directory_uri() . '/js/lib/jquery.magnific-popup-min.js', array('jquery'), '1.8.0', true); // Custom scripts
    wp_enqueue_script('magnific'); // Enqueue it!
  }




  //Removes the wp-embed.min.js file that WordPress injects
  function my_deregister_scripts(){
    wp_deregister_script( 'wp-embed' );
  }
  add_action( 'wp_footer', 'my_deregister_scripts' );

?>
