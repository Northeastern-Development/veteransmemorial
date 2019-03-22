<?php

  //Create 1 Custom Post type for a Demo, called northeastern-Blank
  function create_post_type_northeastern(){
      register_taxonomy_for_object_type('category', 'veteran'); // Register Taxonomies for Category
      register_taxonomy_for_object_type('post_tag', 'veteran');
      register_post_type('veteran', // Register Custom Post Type
          array(
          'labels' => array(
              'name' => __('Veterans', 'northeastern'), // Rename these to suit
              'singular_name' => __('Veteran', 'northeastern'),
              'add_new' => __('Add New Veteran', 'northeastern'),
              'add_new_item' => __('Add New Veteran', 'northeastern'),
              'edit' => __('Edit', 'northeastern'),
              'edit_item' => __('Edit Veteran', 'northeastern'),
              'new_item' => __('New Veteran', 'northeastern'),
              'view' => __('View Veteran', 'northeastern'),
              'view_item' => __('View Veteran', 'northeastern'),
              'search_items' => __('Search Veteran', 'northeastern'),
              'not_found' => __('No veteran found', 'northeastern'),
              'not_found_in_trash' => __('No veteran found in Trash', 'northeastern')
          ),
          'public' => true,
          'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
          'has_archive' => true,
          'supports' => array(
              'title',
              'editor',
              'excerpt',
              'thumbnail'
          ), // Go to Dashboard Custom northeastern Blank post for supports
          'can_export' => true, // Allows export in Tools > Export
          'taxonomies' => array(
              'post_tag',
              'category'
          ) // Add Category and Post Tags support
      ));
  }

  add_action('init', 'create_post_type_northeastern'); // Add our northeastern Blank Custom Post Type





  





?>
