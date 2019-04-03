<?php /* Template Name: Events Page Template */ get_header(); ?>

<main>
	<!-- section -->
	<section>
		<div class="ci__wrapper">
			<h1><?php the_title(); ?></h1>
			<p>Each year, we host a Veterans Day event at the memorial to honor students, alumni and staff who interrupted their lives to serve as soldiers while at Northeastern.</p>
			<p>We will never be able to serve the veterans as they have served us. But we can solute them, support them, and thank them.</p>
		</div>
	</section>
		<section class="events">
			<div class="ci__wrapper">
			<?php

			// get all of the staff
			$args = array(
				'post_type'       => 'post',
				'posts_per_page'  => -1,
				'meta_query' => array(
					'relation' => 'OR',
					'eventname' => array('key' => 'event_name','compare' => 'EXISTS')
				),

			);



			$res = get_posts($args);
			//print_r($res);

			$return_event = '<ul class="event-grid">';


			$format_event = '<li>
									<a href="%s" title="%s" aria-label="" target="%s">
										<div style="background-image: url(%s);"></div>
										<p>%s</p>
										<h2>%s</h2>
									</a>
								</li>';


			foreach($res as $rec){
				$fields = get_fields($rec->ID);
				//print_r($fields);
				//die();
				$return_event .= sprintf(
					$format_event
					,($fields['event_link']['url'])
					,($fields['event_link']['target'])
					,$fields['event_name']
					,($fields['event_image']['url'])
					,$fields['event_date']
					,$fields['event_name']
				);
			}

			// close memorial grid container
			$return_event .= '</ul>';

			// echo memorial grid to template
			echo $return_event;

			?>

		</div>
	</section>















</main>

<?php get_footer(); ?>
