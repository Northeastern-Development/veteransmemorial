<?php /* Template Name: Events Page Template */ get_header(); ?>

<main>
	<!-- section -->


	<section class="head-block-wrapper">
	  <div class="head-block">
			<h1><?php the_title(); ?></h1>
			<p>Each year, Northeastern hosts a Veterans Day ceremony at the memorial to honor students, alumni, and staff who served their country. </p>
			<p>The event features speakers, representatives from Northeastern, veterans, Northeastern students and alumni, and organizations such as the Northeastern Student Veterans Organization. </p>
    </div>
	</section>



		<section class="events">
			<div class="ci__wrapper">

				<?php get_template_part('/loops/loop-events'); ?>
		</div>
	</section>















</main>

<?php get_footer(); ?>
