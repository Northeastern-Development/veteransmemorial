<?php


// phpinfo();

/* Template Name: Heros Page Template */

// $alreadyHere = 'yes';

get_header();



// echo 'Already Here: '.$alreadyHere;



?>


<main>


	<section class="head-block-wrapper">
		<div class="head-block">
			<h1><?php the_title(); ?></h1>
			<p>Throughout the years, members of the Northeastern community have been called on for their service to our nation—and too often the ultimate sacrifice was made.  </p>
			<p>To find a fallen hero, simply enter a name in the box below. You can also use the left/right arrows to browse the wall yourself. Or <a href="<?php echo get_site_url(); ?>/wp-content/uploads/Northeastern-University_Veterans-Memorial-Map.pdf" target="_blank" title="Click here to view the entire veterans wall as a map" aria-label="Click here to view the entire veterans wall as a pdf that will open in a new tab">view the entire wall as a map</a>.</p>
			<?php get_template_part('/includes/searchform'); ?>
		</div>
	</section>

	<section class="wall">
		<div id="wallblock">
			<?php get_template_part('/loops/loop-veteran-position'); ?>
		</div>
 </section>

	<section id="hero-list">
		<div class="ci__wrapper">
			<h2> Fallen Heroes List</h2>
			<hr />
			<div class="table-container" role="table" aria-label="Fallen Heros">
			  <div class="flex-table header" role="rowgroup">
				  <div class="flex-row" role="columnheader">Name</div>
					<div class="flex-row" role="columnheader">Tag Location</div>
				  <div class="flex-row" role="columnheader">Conflict</div>
				  <div class="flex-row" role="columnheader">Branch</div>
				  <div class="flex-row" role="columnheader">College</div>
					<div class="flex-row" role="columnheader">Year</div>
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
