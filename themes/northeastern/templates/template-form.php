<?php /* Template Name: Form Template */ get_header(); ?>


<main>

	<section class="head-block-wrapper" id="add-a-name">
		<div class="head-block">
			<h1><?php the_title(); ?></h1>
			<p>If you’ve lost someone during a war or direct conflict, we invite you to add the name of your hero to our memorial. In doing so, you’ll honor and preserve their legacy.  </p>
			<p>To add a name, please fill out the form below. We’ll contact you when we’ve completed the verification process before adding the name to the memorial. </p>

			<!-- <p class="error">* Required</p> -->
		</div>
	</section>

	<section id="add-a-name-form">
		<div class="ci__wrapper">
			<div>
				<?php echo do_shortcode( '[wpforms id="8" title="false" description="false"]' ); ?>
			</div>
		</div>
	</section>
</main>






<?php get_footer(); ?>
