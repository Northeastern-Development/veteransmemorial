<?php /* Template Name: Form Template */ get_header(); ?>


<main>
	<section>
		<div class="ci__wrapper">
			<h1><?php the_title(); ?></h1>

			<p>If you've lost a loved one or friend in a conflict or war, you are welcome to add the name of your hero to our website. In doing so, you will honor and preserve their story, their life, and their legacy. </p>

			<p>Each name will appear on its own "metal plate" such as the ones found at the Veterans War Memorial on the Northeastern Campus in Boston, MA.</p>

			<p>To add a name, please fill out the form below.</p>

			<p class="error">* Required</p>

			<?php echo do_shortcode( '[wpforms id="8" title="false" description="false"]' ); ?>
		</div>
	</section>
</main>






<?php get_footer(); ?>
