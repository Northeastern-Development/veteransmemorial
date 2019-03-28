<?php

// get all of the staff
$args = array(
  'post_type'       => 'veteran',
  'posts_per_page'  => -1,
  'meta_query' => array(
    'relation' => 'OR',
    'lastname_clause' => array('key' => 'veteran_last_name','compare' => 'EXISTS')
  ),
  'orderby' => array(
    'lastname_clause' => 'ASC'
  )
);

$res = get_posts($args);
//print_r($res);
$guide = '<div class="flex-table row" role="rowgroup">
            <div class="flex-row first" role="cell"><a href="%s">%s, %s%s</a></div>
            <div class="flex-row" role="cell">%s</div>
            <div class="flex-row" role="cell">%s</div>
            <div class="flex-row" role="cell">%s</div>
            <div class="flex-row" role="cell">%s</div>
            <div class="flex-row" role="cell">%s%s</div>
          </div>';


foreach($res as $rec){
  $fields = get_fields($rec->ID);

  $content .= sprintf(
    $guide
    ,esc_url(get_permalink($rec->ID))
    ,ucwords(trim($fields['veteran_last_name']))
    ,ucwords(trim($fields['veteran_first_name']))
    ,(isset($fields['veteran_middle_initial']) && $fields['veteran_middle_initial'] != ''?' '.ucwords(trim($fields['veteran_middle_initial'])).'.':'')
    ,ucwords(trim($fields['name_of_conflict_in_which_veteran_lost_his_or_her_life']))
    ,ucwords(trim($fields['branch_of_service']))
    ,ucwords(trim($fields['northeastern_college']))
    ,ucwords(trim($fields['years_of_attendance_at_northeastern_or_graduation_year']))
    ,ucwords(trim($fields['memorial_position_letter']))
    ,(trim($fields['memorial_position_number']))
  );
}

echo $content;

?>
