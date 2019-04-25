<?php

$fields = get_fields($post->ID);
//print_r($fields);
// die();
// phpinfo();
 ?>


<div class="white-popup-block">

  <!-- <div style="background-image: url('<?php bloginfo('template_url'); ?>/img/dogtag-large.png');"></div> -->
  <!-- <img src="<?php bloginfo('template_url'); ?>/img/dogtag-large.png" alt="<?=$fields['veteran_first_name']?> <?=$fields['veteran_last_name']?> Northeastern University dog tag"> -->

  <div>

      <p class="conflict"><?=$fields['name_of_conflict_in_which_veteran_lost_his_or_her_life']?></p>
      <p class="date"><?=$fields['years_of_attendance_at_northeastern_or_graduation_year']?></p>
      <div class="wrap_text"><p class="college"><?=$fields['northeastern_college']?></p></div>
      <p class="name"><?=$fields['veteran_first_name']?> <?=$fields['veteran_middle_initial']?> <?=$fields['veteran_last_name']?></p>
    </div>


</div>
