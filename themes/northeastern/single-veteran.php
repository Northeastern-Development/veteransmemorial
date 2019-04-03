<?php

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
						<img src="<?php echo home_url(); ?>/wp-content/themes/northeastern/includes/image.php?firstname=<?=$fields['veteran_first_name']?>&lastname=<?=$fields['veteran_last_name']?>&middlename=<?=$fields['veteran_middle_initial']?>&branch=<?=$fields['branch_of_service']?>&conflict=<?=$fields['name_of_conflict_in_which_veteran_lost_his_or_her_life']?>" alt="<?=$fields['veteran_first_name']?> <?=$fields['veteran_last_name']?> Northeastern University dog tag">
					</div>
					
				</div><!--end ideaoverview-->

			</article>
			<!-- /article -->
			<?php endwhile; ?>
			<?php else: ?>

		<?php endif; ?>

		</section>
	<!-- /section -->
	</main>

</div><!--end wrapper-->
