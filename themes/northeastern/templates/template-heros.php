<?php




/* Template Name: Heros Page Template */

get_header();


?>


<main>
	<section>
		<div class="ci__wrapper">
			<h1><?php the_title(); ?></h1>

			<p>Each day, brave people from the Northeastern community make sacrifices that impact and disrupt their lives. We thank our fallen heroes for their service.</p>
			<p>This interactive gallery simulates the experience of being at the outdoor memorial on campus.</p>
			<p>To find a loved one, enter a name in the box below or tap a name from the Fallen Heroes list. Click the left/right arrows to browse or <a href="">view the entire wall as a map</a>.</p>

			<form class="search-container">
				<div role="search">
    			<input onkeyup="fetch()" type="text" id="search-bar" name="keyword" aria-label="Find a hero" placeholder="Find a hero">
    			<div class="search-icon"></div>
				</div>
  		</form>
			<div id="datafetch"></div>



	</section>

	<section>
	 <div class="ci__wrapper" style="width:90vw; ">

			<div style="margin-top:120px;position:relative;">
			 <?php get_template_part('/loops/loop-veteran-position'); ?>
			</div>
	 </div>
 </section>

	<section>
		<div class="ci__wrapper">
			<h2> Fallen Heroes List</h2>
			<div class="table-container" role="table" aria-label="Fallen Heros">
			  <div class="flex-table header" role="rowgroup">
				  <div class="flex-row first" role="columnheader">Name</div>
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
