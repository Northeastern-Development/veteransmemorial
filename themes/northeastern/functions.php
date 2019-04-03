<?php

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

require_once(get_template_directory()."/functions/admin.php");
require_once(get_template_directory()."/functions/customposts.php");
require_once(get_template_directory()."/functions/theme.php");
require_once(get_template_directory()."/functions/media.php");
require_once(get_template_directory()."/functions/globalscripts.php");
require_once(get_template_directory()."/functions/conditionalscripts.php");
require_once(get_template_directory()."/functions/globalstyles.php");
require_once(get_template_directory()."/functions/conditionalstyles.php");
require_once(get_template_directory()."/functions/menus.php");
require_once(get_template_directory()."/functions/sidebar.php");
require_once(get_template_directory()."/functions/excerpts.php");
require_once(get_template_directory()."/functions/comments.php");
require_once(get_template_directory()."/functions/shortcodes.php");
require_once(get_template_directory()."/functions/posts.php");


//HOME PAGE SEARCH
// we need to prevent access to an array of certain pages such as search from the admin side of things
// add the ajax fetch js
// shouldn't have to touch this stuff unless you change the id of the form
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
?>
<script type="text/javascript">
function fetch(){

    jQuery.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'post',
        data: {
          action: 'data_fetch',
          keyword: jQuery('#search-bar').val()
        },
        success: function(data) {
          jQuery('#datafetch').html( data );
        }
    });

}
</script>

<?php
}

// the ajax function
add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');
function data_fetch(){
if (  esc_attr( $_POST['keyword'] ) == null ) { die(); } // if no keyword then the following won't return results
    $the_query = new WP_Query( array(
      'posts_per_page'  => -1, //or any number
      'post_status'     => 'publish', // only published posts will return in results
      'post_type'       => 'veteran', // name of custom post type
      'meta_query' => array(
        'relation' => 'OR',
        'firstname' => array(
          'key' => 'veteran_first_name', // i'm only allowing first and last name to be searched.  Feel free to add more
          'value' => $_POST['keyword'] // grabbing the data from the form as the value here
        ),
        'lastname_clause' => array( // use _clause if you want to be able to order things asc or dsc
          'key' => 'veteran_last_name',
          'value' => $_POST['keyword']
        ),
      ),
      'orderby' => array(
          'lastname_clause' => 'ASC',
      ),
    ));



    $search_res = $the_query->posts;
    // format string for search result item

    $return_grid = '<ul>';

    $guide = '<li><a href="%s#%s-%s">%s, %s %s (%s%s)</a></li>';

    // loop thru search items
    foreach($search_res as $search_rec) {
      $fields = get_fields($search_rec->ID);
      $return_grid .= sprintf(
        $guide
        //,esc_url(get_permalink($search_rec->ID)) // You could use this line but i needed the link to go to a specific page
        ,'http://veteransmemorial.edu/fallen-heros' // commnent this out if you use the line above
        ,(trim($fields['memorial_position_letter'])) // custom fields
        ,(trim($fields['memorial_position_number']))
        ,ucwords(trim($fields['veteran_last_name']))
        ,ucwords(trim($fields['veteran_first_name']))
        ,(isset($fields['veteran_middle_initial']) && $fields['veteran_middle_initial'] != ''?' '.ucwords(trim($fields['veteran_middle_initial'])).'.':'')
        ,(trim($fields['memorial_position_number'])) // custom fields
        ,ucwords(trim($fields['memorial_position_letter']))

      );
    }

    // close memorial grid container
    $return_grid .= '</ul>';
    echo $return_grid;

    die();
}






/*------------------------------------*\
	Functions
\*------------------------------------*/


// Custom Gravatar in Settings > Discussion
function northeasterngravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}


// block WP enum scans
// http://m0n.co/enum
if (!is_admin()){
	// default URL format
	if (preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING'])) die();
	add_filter('redirect_canonical', 'shapeSpace_check_enum', 10, 2);
}
function shapeSpace_check_enum($redirect, $request){
	// permalink URL format
	if (preg_match('/\?author=([0-9]*)(\/*)/i', $request)) die();
	else return $redirect;
}





/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('wp_enqueue_scripts', 'nudev_include_custom_jquery');
add_action('init', 'northeastern_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_enqueue_scripts', 'northeastern_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'northeastern_styles'); // Add Theme Stylesheet
add_action('wp_enqueue_scripts', 'northeastern_conditional_styles'); // Add Conditional PAge Stylesheet(s)
add_action('init', 'register_northeastern_menu'); // Add northeastern Blank Menu
//add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'northeasternwp_pagination'); // Add our northeastern Pagination
add_action('admin_footer','posts_status_color');  // colorize post types
add_action('admin_footer','posts_review_hidden'); // remove the ability to preview from the admin side

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// Add Filters
add_filter('avatar_defaults', 'northeasterngravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
//add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'northeastern_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'northeastern_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 ); // Removes scripts version number from script tags
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 ); // Removes scripts version number from style tags
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images
add_filter( 'emoji_svg_url', '__return_false' );

// these are items for customizing the login page
add_action('login_head', 'my_custom_login');
add_filter( 'login_headerurl', 'my_login_logo_url' );
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
add_filter('login_errors', 'login_error_override');
add_action('login_head', 'my_login_head');
add_action( 'init', 'login_checked_remember_me' );
add_action('admin_head', 'htx_custom_logo');

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether



?>
