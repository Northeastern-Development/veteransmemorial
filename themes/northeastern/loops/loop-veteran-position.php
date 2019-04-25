<?php
 // this will build the grid of dog tags that will slide left and right
 //$alphabet = range('a', 'g'); // 0 => a,
 $rowMax = 7;
 $colMax = 57;
 $alphas = array("A","B","C","D","E","F","G");


 // this array is only to TEST active vs. inactive items, remove once connected to WordPress
 //$activeArray = array(1,12,65,175,176,290,323);


 $wall = '<div id="thewall">%s<div><ul class="tags" role="list">%s</ul></div>%s</div>';
 $tagGuideData = '<li role="listitem" class="%s %s" id="%s-%s" data-let="%s" data-num="%s">%s<p class="conflict">%s</p><p class="date">%s</p><p class="college">%s</p><p class="name">%s%s%s</p></li>';
 $tagGuideEmpty = '<li tabindex="-1" role="listitem"></li>';
 $nPosGuide = '<li tabindex="-1" class="npos-%s"><div>%s</div></li>';
 $aPosGuide = '<li tabindex="-1"><div>%s</div></li>';
 $tags = $nPos = $aPos = '';
 $cRow = 0;
 $cPos = 1;


for($i=1; $i<=($rowMax * $colMax); $i++){
  unset($rec, $data);
  // look for a post that matches the let and num values
   $args = array(
     'post_type'       => 'veteran',
     'posts_per_page'  => 1,
     'meta_query' => array(
       'relation' => 'AND',
       'position_letter' => array(
         'key' => 'memorial_position_letter',
         'compare' => '=',
         'value' => $alphas[$cRow]
       ),
       'position_number' => array(
         'key' => 'memorial_position_number',
         'compare' => '=',
         'value' => $cPos
       )
     )
   );

   $data = '';

   // contains ONE post (per iteration) if we hit a match
   $rec = get_posts($args);
   if(!empty($rec)){
     $rec = $rec[0];
     $data = get_fields($rec->ID);
     //print_r($data);
   }
   //print_r($rec);
   // $data = get_fields($rec->ID);
   // print_r($data);

   //print_r($rec);
   unset($args);
   // print_r($res);
   // if(!empty($rec)){
   //   // $match = $rec;
   //   // $permalink = get_permalink($match->ID);
   //   // $ma = get_fields($match->ID);
   //   // print_r($ma);
   // }

   // build out the numeric positioning on the top and bottom
   if($i <= $colMax){
     $nPos .= sprintf(
       $nPosGuide
       ,$i
       ,$i
     );
   }


   // build out the tags themselves, the use of the in_array check will need to be replaced by a check for data in WordPress
   // we need a permalink in here too;
   if(!empty($data)){
   $tags .= sprintf(
     $tagGuideData
     ,(!empty($rec)?'active':'')
     ,($cRow == 6?'nobtmargin':'')
     ,strtolower($alphas[$cRow])// id letter
     ,$cPos // id number
     ,strtolower($alphas[$cRow])//data-let
     ,$cPos // data-num
     ,(!empty($rec)?'<a class="js__vet" href="'.get_permalink($rec->ID).'" title="View '.$data['veteran_first_name'].' '.$data['veteran_last_name'].', '.$data['name_of_conflict_in_which_veteran_lost_his_or_her_life'].', '.$data['years_of_attendance_at_northeastern_or_graduation_year'].', '.$data['northeastern_college'].'"   aria-label="View '.$data['veteran_first_name'].' '.$data['veteran_last_name'].', '.$data['name_of_conflict_in_which_veteran_lost_his_or_her_life'].', '.$data['years_of_attendance_at_northeastern_or_graduation_year'].', '.$data['northeastern_college'].'" data-fname="'.trim($data['veteran_first_name']).'" data-lname="'.trim($data['veteran_last_name']).'" data-mname="'.trim($data['veteran_middle_initial']).'"><div>':'')
     ,(!empty($data['name_of_conflict_in_which_veteran_lost_his_or_her_life'])? $data['name_of_conflict_in_which_veteran_lost_his_or_her_life'].'':'&nbsp;')
     ,(!empty($data['years_of_attendance_at_northeastern_or_graduation_year']) ? $data['years_of_attendance_at_northeastern_or_graduation_year'].'':'&nbsp;')
     ,(!empty($data['northeastern_college']) ? $data['northeastern_college'].'':'&nbsp;')
     ,(!empty($data['veteran_first_name'])? $data['veteran_first_name'].'':'&nbsp;')
     ,( (!empty($data['veteran_middle_initial'])) ? ' '.trim($data['veteran_middle_initial']).'' : '')
     ,(!empty($data['veteran_last_name'])? ' '.$data['veteran_last_name'].'':'&nbsp;')
     ,(!empty($rec)?'</div></a>':'')
   );
 }else{
   $tags .= sprintf(
    $tagGuideEmpty

  );
 }



   $cPos++;

   unset($rec);

   // if we are on a colmax item, we need to increment the alpha
   if($i % $colMax == 0){ // if mod == 0, we are at the end of a row and need to start the next
     $cRow++;
     $cPos = 1;
   }

 }

 unset($rowMax,$colMax,$cRow,$cPos,$i,$nPosGuide,$tagGuide); // clean up

 // build out the alpha positioning on the left and right
 foreach($alphas as $a){
   $aPos .= sprintf(
     $aPosGuide
     ,$a
   );
 }
 $aPosL = '<div class="apos left"><a class="js__wall-scroll left" href="javascript:void(0);" title="Move wall to the left" aria-label="Move wall to the left">&#xe314;</a><ul>'.$aPos.'</ul></div>';
 $aPosR = '<div class="apos right"><a class="js__wall-scroll right" href="javascript:void(1);" title="Move wall to the right" aria-label="Move wall to the right">&#xe315;</a><ul>'.$aPos.'</ul></div>';

 // set up the numeric positioning across the top and bottom of the wall grid
 //$nPos = '<ul class="npos">'.$nPos.'</ul>';


  // let's put it all together and build a wall!
  // $wall = $aPosL.'<div id="thewall"><div id="slider">'.$nPos.'<ul class="tags">'.$tags.'</ul>'.$nPos.'</div></div>'.$aPosR;
  $wall = $aPosL.'<div id="thewall"><div id="slider"><ul role="list" class="npos">'.$nPos.'</ul><ul role="list" class="tags">'.$tags.'</ul><ul role="list" class="npos bottom">'.$nPos.'</ul></div></div>'.$aPosR;

  echo $wall;

  unset($aPos,$nPos,$tags,$alphas,$a,$aPosGuide); // clean up

?>
