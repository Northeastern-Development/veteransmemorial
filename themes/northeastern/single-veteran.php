<?php get_header();

$fields = get_fields($post->ID);
//print_r($fields);
// phpinfo();
 ?>



<!-- wrapper -->
<div class="wrapper">

	<main id="single" role="main" aria-label="Content">
	<!-- section -->
		<section>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



				<div id="ideaoverview">
					<div>
						<!-- <h2><?php the_title(); ?></h2>
						<p><?php echo get_post_meta(get_the_ID(), 'name_of_conflict_in_which_veteran_lost_his_or_her_life', true); ?></p> -->


						<img src="<?php echo home_url(); ?>/wp-content/themes/northeastern/includes/image.php?firstname=<?=$fields['veteran_first_name']?>&lastname=<?=$fields['veteran_last_name']?>&middlename=<?=$fields['veteran_middle_initial']?>&branch=<?=$fields['branch_of_service']?>&conflict=<?=$fields['name_of_conflict_in_which_veteran_lost_his_or_her_life']?>" alt="<?php the_title(); ?> tags">

					</div>

					<?php the_content(); // Dynamic Content ?>
				</div><!--end ideaoverview-->





			</article>
			<!-- /article -->

			<?php endwhile; ?>

			<?php else: ?>

			<!-- article -->
			<article>

				<h1><?php _e( 'Sorry, nothing to display.', 'neudev' ); ?></h1>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
	<!-- /section -->
	</main>

</div><!--end wrapper-->



<?php get_footer(); ?>
