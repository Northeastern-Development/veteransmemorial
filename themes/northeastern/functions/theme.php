<?php

  if (!isset($content_width))
  {
      $content_width = 900;
  }

  if (function_exists('add_theme_support'))
  {
      // Add Menu Support
      add_theme_support('menus');

      // Enables post and comment RSS feed links to head
      // add_theme_support('automatic-feed-links');

      // Localisation Support
      // load_theme_textdomain('northeastern', get_template_directory() . '/languages');
  }

  // Remove invalid rel attribute values in the categorylist
  function remove_category_rel_from_category_list($thelist)
  {
      return str_replace('rel="category tag"', 'rel="tag"', $thelist);
  }

  // Add page slug to body class, love this - Credit: Starkers Wordpress Theme
  function add_slug_to_body_class($classes)
  {
      global $post;
      if (is_home()) {
          $key = array_search('blog', $classes);
          if ($key > -1) {
              unset($classes[$key]);
          }
      } elseif (is_page()) {
          $classes[] = sanitize_html_class($post->post_name);
      } elseif (is_singular()) {
          $classes[] = sanitize_html_class($post->post_name);
      }

      return $classes;
  }





  // we want to add a custom set of options and settings that users can tweak theme settings within
  if(is_admin()){

    add_action( 'admin_menu', 'nutheme_admin_menu' );
    add_action( 'admin_init','register_themesettings');

    function register_themesettings(){ // whitelist options
      register_setting( 'nutheme-settings', 'theme_settings_status' );
      register_setting( 'nutheme-settings', 'theme_settings_logosvg' );
      register_setting( 'nutheme-settings', 'theme_settings_coloroption' );
      register_setting( 'nutheme-settings', 'theme_settings_geotag_city' );
      register_setting( 'nutheme-settings', 'theme_settings_geotag_state' );
      register_setting( 'nutheme-settings', 'theme_settings_geotag_zip' );
      register_setting( 'nutheme-settings', 'theme_settings_analytics_tagmanager' );
      register_setting( 'nutheme-settings', 'theme_settings_analytics_snippet' );
      register_setting( 'nutheme-settings', 'theme_settings_analytics_snippet_additional' );
    }

    function nutheme_admin_menu() {
    	add_menu_page( 'Theme Settings', 'Theme Settings', 'manage_options','nutheme_settings.php', 'nutheme_admin_page', get_template_directory_uri().'/img/n.png', 100  );
    }

    function nutheme_admin_page(){
      include(get_template_directory().'/functions/interfaces/theme_settings_interface.php'); // call in the settings interface
    }

  }

?>
