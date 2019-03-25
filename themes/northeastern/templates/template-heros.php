<?php /* Template Name: Heros Page Template */ get_header(); ?>


<main>
	<section>
		<div class="ci__wrapper">
			<h1><?php the_title(); ?></h1>
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
				<?php get_template_part('/loops/loop-hero-list'); ?>
			</div>

		</div>
	</section>
</main>




<?php get_footer(); ?>
