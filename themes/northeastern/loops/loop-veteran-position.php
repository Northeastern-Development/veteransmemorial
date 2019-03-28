<?php


  // adds in the numbers on top of the grid
  echo "<ul class='top-grid'>";
    $numbers = range(1, 57);
    foreach ($numbers as $number){
      echo '<li>'.$number.'</li>';
    }
  echo "</ul>";

  // adds in the letter on the left side of the grid
  echo "<ul class='side-grid'>";
    $letters= range('A', 'G');
    foreach ($letters as $letter){
      echo '<li>'.$letter.'</li>';
    }
  echo "</ul>";






  $return_grid = '<ul id="memorial">';

  // format string for memorial grid item
  $format_grid = '<li data-num="%s" data-let="%s">
  <a href="%s"></a>
  </li>';



  // 0-indexed array of all letters a-z
  $alphabet = range('a', 'g'); // 0 => a,
  $cols = 57;
  $rows = 7; // add rows as needed.  if you add a row change the alphabet range too.
  $total = count(range(1, ($cols*$rows))); // int. 399


  // loop thru every grid item
  foreach (range(1, $total) as $index => $item){

    // get the column number of this item
    $data_num = ( $index < $cols ) ? $index + 1 : ($index + 1) - ( $cols * floor($index / $cols) );

    // get the row letter of this item
    $data_let = $alphabet[floor( ($index) / $cols)];

    // get ONE post that matches the data_num and data_let
    $args = array(
      'post_type'       => 'veteran',
      'posts_per_page'  => 1,
      'meta_query' => array(
        'relation' => 'AND',
        'position_letter' => array(
          'key' => 'memorial_position_letter',
          'compare' => '=',
          'value' => $data_let
        ),
        'position_number' => array(
          'key' => 'memorial_position_number',
          'compare' => '=',
          'value' => $data_num
        )
      )
    );
    $permalink = '';
    $res = get_posts($args);
    if( !empty($res) ){
      $match = $res[0];
      $permalink = get_permalink($match->ID);

      //$ma = get_fields($match->ID);
      //print_r($ma);
    }else {

    }



    $return_grid .= sprintf(
      $format_grid
      ,$data_num
      ,$data_let
      ,$permalink
      //,trim($ma['veteran_first_name'])
      //,trim($ma['veteran_last_name'])
    );
  }



  // close memorial grid container
  $return_grid .= '</ul>';

  // echo memorial grid to template
  echo $return_grid;
  //echo $content;
?>
