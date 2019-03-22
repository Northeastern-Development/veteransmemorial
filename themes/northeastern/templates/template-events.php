<?php /* Template Name: Events Page Template */ get_header(); ?>

<main>
	<!-- section -->


	<section>
		<div class="ci__wrapper">
			<h1><?php the_title(); ?></h1>

			<?php $catquery = new WP_Query( 'cat=4&posts_per_page=5' ); ?>
			<ul>
				<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
				<li>
					<h2><?php the_title(); ?></h2>
					<ul>
						<li><?php the_content(); ?></li>
					</ul>
				</li>
				<?php endwhile; ?>
			</ul>
			<?php wp_reset_postdata(); ?>
		</div>
	</section>





</main>

<?php get_footer(); ?>
