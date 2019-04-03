<?php /* Template Name: Wall Position Page Template */ get_header();



 ?>


<main>
	<section>
		<div class="ci__wrapper" style="width:90vw; ">
			<h1><?php the_title(); ?></h1>
      <div style="margin-top:120px;position:relative;">
			  <?php get_template_part('/loops/loop-veteran-position'); ?>
      </div>
		</div>
	</section>
</main>




<?php get_footer(); ?>
