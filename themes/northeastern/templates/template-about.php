<?php /* Template Name: About Page Template */ get_header();

$vision_img = 'vision';//title/aria label
$visiting_img = 'visiting';
$thanks_img = 'thanks';



?>

<main>
	<!-- section -->


  <section>
	  <div class="head-block">
      <h1><?php the_title(); ?></h1>
      <div>
         <p>Dedicated on Veterans Day 2006, the memorial commemorates more than 400 Northeastern students and alumni who have given their lives in service of our country. </h2>
         <p>In addition to honoring the lives of these fallen Service members, the memorial serves to educate future generations about the impact of war on society. </h2>
      </div>
    </div>
	</section>

  <section class="two_col-large">
    <div class="ci__wrapper">
      <div class="col">
        <h2>Visting the Memorial</h2>
        <p>The memorial is located on Neal F. Finnegan Plaza, across from Northeastern’s Centennial Common on Forsyth Street, and features a sweeping black wall, seating, and a small park. </p>
        <p>The front of the wall runs along a popular pathway and is the setting for our Veterans Day event each year. The opposite side of the wall faces a garden and features more than 400 stainless steel plates representing the dog tags worn by Service members during war. Each includes the fallen hero’s name, rank, hometown, birth date, college affiliation, graduation year, and date of death.  </p>
        <p>The plates are organized by year of death, beginning with the opening of Northeastern in 1898 and continuing to the present. </p>

      </div>
      <div class="col">
        <img src="<?php bloginfo('template_url'); ?>/img/<?=$vision_img;?>.png" alt="Northeastern university veterans wall" aria-label="northeastern university veterans wall">
        <img src="<?php bloginfo('template_url'); ?>/img/<?=$visiting_img;?>.png" alt="Visting the northeastern university veterans wall" aria-label="Visting the northeastern university veterans wall">
      </div>
    </div>
  </section>

  <section class="two_col-small">
    <div class="ci__wrapper">
      <div class="col">
        <img src="<?php bloginfo('template_url'); ?>/img/<?=$thanks_img;?>.png" alt="Northeastern university veterans wall from the side" aria-label="Northeastern university veterans wall from the side">
      </div>
      <div class="col">
        <img src="<?php bloginfo('template_url'); ?>/img/<?=$visiting_img;?>.png" alt="Visting the northeastern university veterans wall" aria-label="Visting the northeastern university veterans wall">
        <h2>Special Thanks</h2>
        <p>The Northeastern Veterans Memorial was built thanks to the generosity and dedication of alumnus Neal Finnegan, DMSB’61, H’98, Chair Emeritus of the Northeastern Board of Trustees. </p>
        <p>The memorial was designed by husband and wife team Mark Roehrle and Mo Zell, former architecture professors at Northeastern, and architecture professor Steve Fellmeth, a former student of Zell’s. </p>
      </div>
    </div>
  </section>



</main>

<?php get_footer(); ?>
