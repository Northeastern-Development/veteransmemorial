<?php

  // Remove Admin bar
  function remove_admin_bar(){
    return false;
  }


  // this will disable the ability to preview items from the admin side
  function posts_review_hidden(){
  ?>
  <style>
  #post-preview,
  #view-post-btn,
  span.view,
  a.editor-post-preview{
  	display: none !important;
  }
  </style>
  <?php
  }


  // set the colors of posts based on published status
  function posts_status_color(){
  ?>
  <style>
  .status-draft .check-column {box-shadow: -12px 0 0 -3px rgba(237, 86, 68, 1.0) !important;}
  .status-pending .check-column {box-shadow: -12px 0 0 -3px rgba(235, 138, 35, 1.0) !important;}
  .status-publish .check-column {box-shadow: -12px 0 0 -3px rgba(81, 248, 0, 1.0) !important;}
  .status-future .check-column {box-shadow: -12px 0 0 -3px #ffffff !important;}
  .status-private .check-column {box-shadow: -12px 0 0 -3px #000000 !important;}
  .active .check-column {border-left:4px solid rgba(81, 248, 0, 1.0) !important;}
  .inactive .check-column {border-left:4px solid rgba(100, 100, 100, .3) !important;}
  </style>
  <?php
  }


  // tweaks to the styling for the login page
  function my_custom_login(){ ?>
    <style type="text/css">

      body.login{
        background: rgba(0, 0, 0, 1.0) !important;
      }

      body.login div#login h1 a{
        background-image: url('https://brand.northeastern.edu/global/assets/logos/northeastern/svg/northeastern-logo.svg');
        width:315px;
        background-size: 315px 85px;
      	height: 85px;
      }
      body.login #login_error, .login .message{
        border-left: 4px solid rgba(224, 39, 47, 1.0) !important;
      }
      body.login #backtoblog a, .login #nav a{
        color:rgba(255,255,255,1.0) !important;
      }
      body.login #backtoblog a:hover, .login #nav a:hover{
        color: rgba(224, 39, 47, 1.0) !important;
        text-decoration: underline;
      }
      .wp-core-ui .button-primary{
        background:rgba(224, 39, 47, 1.0) !important;
        border-color: none !important;
        border-radius: 0 !important;
        text-shadow: none !important;
        box-shadow: none !important;
        border: none;
        min-width: 100px;
      }
      body.login label{
        color:rgba(51, 62, 71, 1.0) !important;
      }

      p#backtoblog{
        display: none;
      }
    </style>
  <?php }


  // set the remember option to be automatically checked for easier use
  function login_checked_remember_me(){
    add_filter('login_footer','rememberme_checked');
  }

  function rememberme_checked(){
    echo "<script>document.getElementById('rememberme').checked = true;</script>";
  }


  // change the url that the logo on the login page links to
  function my_login_logo_url(){
    return get_bloginfo('url');
  }


  // change the tooltip value of the logo on the login page
  function my_login_logo_url_title(){
    return get_bloginfo('name');
  }


  // override the default error message
  function login_error_override(){
    return 'Invalid login.';
  }


  // remove the shake on error for the login panel
  function my_login_head(){
    remove_action('login_head', 'wp_shake_js', 12);
  }


  // this will disable all blocks from Gutenberg and only allow those listed
  add_filter('allowed_block_types','limitGutenberg');

  function limitGutenberg( $allowed_block_types ){
    return array(
      'core/paragraph'
      ,'core/heading'
      ,'core/image'
      ,'core/list'
      ,'core/quote'
      ,'core/columns'
      // ,'core/button'
      ,'core/media-text'
    );
  }

  // this will change some styles of the admin interface to remove the WP logo in the upper-left, and the thank you footer
  function htx_custom_logo(){ ?>
    <style type="text/css">
      #wp-admin-bar-wp-logo,#wp-admin-bar-comments,#wp-admin-bar-wpseo-menu,#wp-admin-bar-easy-updates-manager-admin-bar,#wp-admin-bar-new-content,#wpfooter{
        display: none;
      }
    </style>

  <?php }

?>
