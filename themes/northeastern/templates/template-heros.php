<?php

$searchVal = '';
if(isset($_POST['search']) && $_POST['search'] != ''){
	$searchVal = $_POST['search'];
}


/* Template Name: Heros Page Template */

get_header();


?>


<main>
	<section>
		<div class="ci__wrapper">
			<h1><?php the_title(); ?></h1>



			<form role="search" method="POST" id="searchform" action="<?php echo get_permalink(); ?>">
    		<input class="search-input" type="search" name="search" placeholder="<?php _e( 'To search, type and hit enter.', 'northeastern' ); ?>">
    		<button class="search-submit" type="submit" role="button"><?php _e( 'Search', 'northeastern' ); ?></button>
				<button><?php _e( 'Clear', 'northeastern' ); ?></button>
			</form>

			<?php
					if( $searchVal != '' ){
				    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				    $search_args = array(
				        // 'paged'           => $paged,
				        'posts_per_page'  => -1, //or any number
				        'post_type'       => 'veteran',
				        // 's'               => $_REQUEST['search'],
								'meta_query' => array(
									'relation' => 'OR',
							    'firstname' => array(
										'key' => 'veteran_first_name',
										'value' => $searchVal,
										'compare' => 'LIKE'
									),
									'lastname_clause' => array(
										'key' => 'veteran_last_name',
										'value' => $searchVal,
										'compare' => 'LIKE'
									),
							  ),
								'orderby' => array(
						        'lastname_clause' => 'ASC',
						    ),
				    );

						$search_res = get_posts($search_args);
						//print_r($res);
						$guide = '<div class="flex-table row" role="rowgroup">
						            <div class="flex-row first" role="cell"><a href="%s">%s, %s%s</a></div>
						            <div class="flex-row" role="cell">%s</div>
						            <div class="flex-row" role="cell">%s</div>
						            <div class="flex-row" role="cell">%s</div>
						            <div class="flex-row" role="cell">%s</div>
						            <div class="flex-row" role="cell">%s%s</div>
						          </div>';


						foreach($search_res as $search_rec){
						  $fields = get_fields($search_rec->ID);

						  $content .= sprintf(
						    $guide
						    ,esc_url(get_permalink($search_rec->ID))
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

						//die();
					}


					//echo $content;

			 ?>
			<!-- <table>
				<thead>
					<tr style="text-align:left;">
						<th width="300">Name</th>
						<th width="300">Conflict</th>
						<th width="300">Branch</th>
						<th width="300">College</th>
						<th width="200">Year</th>
					</tr>
				</thead>
				<tbody>
					<?php get_template_part('/includes/hero-list'); ?>
				</tbody>
			</table> -->


			<div class="table-container" role="table" aria-label="Fallen Heros">
			  <div class="flex-table header" role="rowgroup">
				  <div class="flex-row first" role="columnheader">Name</div>
				  <div class="flex-row" role="columnheader">Conflict</div>
				  <div class="flex-row" role="columnheader">Branch</div>
				  <div class="flex-row" role="columnheader">College</div>
					<div class="flex-row" role="columnheader">Year</div>
					<div class="flex-row" role="columnheader">Memorial Position</div>
				</div>

				<?php
					if( empty($search_res) ){
				 		get_template_part('/loops/loop-hero-list');
			 		}else {
						echo $content;
					}
				 ?>
			</div>

		</div>
	</section>
</main>




<?php get_footer(); ?>
