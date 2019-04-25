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




$guide = '<div class="flex-table row" role="rowgroup">
            <a  class="js__vet" href="%s" title="View %s %s, %s, %s, %s, %s" aria-label="View %s %s, %s, %s, %s, %s" data-id="%s-%s">
              <div class="flex-row first" role="cell">%s, %s%s</div>
              <div class="flex-row" role="cell">%s%s</div>
              <div class="flex-row" role="cell">%s</div>
              <div class="flex-row" role="cell">%s</div>
              <div class="flex-row" role="cell">%s</div>
              <div class="flex-row" role="cell">%s</div>
            </a>
          </div>';

$content = '';

foreach($res as $rec){
  //$content = '';
  $fields = get_fields($rec->ID);
  //print_r($fields);
  $content .= sprintf(
    $guide
    ,esc_url(get_permalink($rec->ID))
    ,(!empty($fields['veteran_first_name'])? ucwords(trim($fields['veteran_first_name'])):'')
    ,(!empty($fields['veteran_last_name'])? ucwords(trim($fields['veteran_last_name'])):'')
    ,(!empty($fields['name_of_conflict_in_which_veteran_lost_his_or_her_life'])? ucwords(trim($fields['name_of_conflict_in_which_veteran_lost_his_or_her_life'])):'')
    ,(isset($fields['other_branch_of_service']) && $fields['other_branch_of_service'] != ''? trim($fields['other_branch_of_service']):trim($fields['branch_of_service']))
    ,(!empty($fields['northeastern_college'])? ucwords(trim($fields['northeastern_college'])):'')
    ,(!empty($fields['years_of_attendance_at_northeastern_or_graduation_year']) ? $fields['years_of_attendance_at_northeastern_or_graduation_year']:'')
    ,(!empty($fields['veteran_first_name'])? ucwords(trim($fields['veteran_first_name'])):'')
    ,(!empty($fields['veteran_last_name'])? ucwords(trim($fields['veteran_last_name'])):'')
    ,(!empty($fields['name_of_conflict_in_which_veteran_lost_his_or_her_life'])? ucwords(trim($fields['name_of_conflict_in_which_veteran_lost_his_or_her_life'])):'')
    ,(isset($fields['other_branch_of_service']) && $fields['other_branch_of_service'] != ''? trim($fields['other_branch_of_service']):trim($fields['branch_of_service']))
    ,(!empty($fields['northeastern_college'])? ucwords(trim($fields['northeastern_college'])):'')
    ,(!empty($fields['years_of_attendance_at_northeastern_or_graduation_year']) ? $fields['years_of_attendance_at_northeastern_or_graduation_year']:'')
    ,(!empty($fields['memorial_position_letter'])? strtolower($fields['memorial_position_letter']):'')
    ,(!empty($fields['memorial_position_number'])? $fields['memorial_position_number']:'')
    ,(!empty($fields['veteran_first_name'])? ucwords(trim($fields['veteran_last_name'])):'')
    ,(!empty($fields['veteran_last_name'])? ucwords(trim($fields['veteran_first_name'])):'')
    // ,( (!empty($fields['veteran_middle_initial'])) ? ' '.ucwords(trim($fields['veteran_middle_initial'])).'.' : '')
    ,( (!empty($fields['veteran_middle_initial'])) ? ' '.ucwords(trim($fields['veteran_middle_initial'])).'' : '')
    ,(!empty($fields['memorial_position_number'])? $fields['memorial_position_number']:'')
    ,(!empty($fields['memorial_position_letter'])? ucwords(trim($fields['memorial_position_letter'])):'')
    ,(!empty($fields['name_of_conflict_in_which_veteran_lost_his_or_her_life'])? ucwords(trim($fields['name_of_conflict_in_which_veteran_lost_his_or_her_life'])):'')
    ,(isset($fields['other_branch_of_service']) && $fields['other_branch_of_service'] != ''? trim($fields['other_branch_of_service']):trim($fields['branch_of_service']))
    ,(!empty($fields['northeastern_college'])? ucwords(trim($fields['northeastern_college'])):'')
    ,(!empty($fields['years_of_attendance_at_northeastern_or_graduation_year']) ? $fields['years_of_attendance_at_northeastern_or_graduation_year']:'')


  );
}

echo $content;

?>
