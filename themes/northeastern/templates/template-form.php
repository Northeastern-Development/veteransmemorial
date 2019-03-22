<?php /* Template Name: Form Template */ get_header(); ?>


<main>
	<section>
		<div class="ci__wrapper">
			<h1><?php the_title(); ?></h1>

			<p>Family and friends of service members who have given their lives in service of our country are welcome to add the names of these heroes to Northeastern’s Veterans Memorial. The rear of the memorial includes metal plates representing the dog tags worn by soldiers during war. The plates include the soldier’s name, rank, hometown, birth date, death date, department at Northeastern, and graduation year.</p>

			<p>To add a veteran’s name to the memorial, please submit the form below. If you do not know all the information requested, please enter “unknown.”</p>

			<p class="error">* Required</p>

			<?php echo do_shortcode( '[wpforms id="8" title="false" description="false"]' ); ?>
		</div>
	</section>
</main>






<?php get_footer(); ?>
