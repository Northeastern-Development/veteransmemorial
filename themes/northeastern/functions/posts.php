<?php

  // Custom View Article link to Post
  function northeastern_blank_view_article($more)
  {
      global $post;
      return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'northeastern') . '</a>';
  }

  // Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
  function northeasternwp_pagination()
  {
      global $wp_query;
      $big = 999999999;
      echo paginate_links(array(
          'base' => str_replace($big, '%#%', get_pagenum_link($big)),
          'format' => '?paged=%#%',
          'current' => max(1, get_query_var('paged')),
          'total' => $wp_query->max_num_pages
      ));
  }








?>
