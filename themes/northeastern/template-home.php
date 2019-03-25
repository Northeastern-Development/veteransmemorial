<?php /* Template Name: Home Page Template */ get_header(); ?>

	<main>
		<!-- section -->
		<section>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article>
				<div class="swd__header-wrapper swd__header-home">
					<?php require_once(dirname(__FILE__)."/_includes/navigation.php"); ?>
				</div><!--end swd__header-wrapper-->
				<div class="swd__hero" style="background-image: url('<?php the_field('home_hero_image'); ?>');">
					<div>
						<h1><?php the_field('hero_image_line_1_text'); ?></h1>
						<h2><?php the_field('hero_image_line_2_text'); ?></h2>
					</div>
					<h5 class="scroll-down"></h5>
				</div><!--end swd__hero-->
			</article>




			<article id="locations">
				<div class="swd__section-title">
					<h2>locations</h2>
				</div>
				<div class="swd__fullwidth-wrapper swd__locations" >
					<div class="swd__grid-locations">
						<div class="swd__grid-wrapper">
							<div id="swd__grid-manch">
								<img rel="preload" src="<?php bloginfo('template_url'); ?>/img/home/location_manchester.jpg" alt="Cape Ann Storage, Manchester, MA" as="image">
								<a href="<?php echo get_bloginfo('url') ?>/locations/cape-ann-storage/">
									<div id="left-details">
										<h2>manchester, ma</h2>
										<ul>
											<li>Cape Ann Storage</li>
											<li>1 Beaver Dam Road</li>
											<li>Manchester, MA 01944</li>
										</ul>
										<div class="swd__button swd__button-manchester">Visit Location</div>
									</div>
								</a>
							</div>

						 <div id="swd__grid-ipswich">
							 <img rel="preload" src="<?php bloginfo('template_url'); ?>/img/home/location_ipswich.jpg" alt="Ipswich Self-Storage, Ipswich, MA" as="image">
							 <a href="<?php echo get_bloginfo('url') ?>/locations/ipswich-self-storage/" >
								 <div id="right-details">
									 <h2>Ipswich, ma</h2>
									 <ul>
										 <li>Ipswich Self-Storage</li>
										 <li>19 Mitchell Road</li>
										 <li>Ipswich, MA 01938</li>
									 </ul>
									 <div class="swd__button swd__button-ipswich">Visit Location</div>
								 </div>
							 </a>
					 	</div>
					</div>
				</div>
			</div>
		</article>




			<article id="about">
				<div class="swd__section-title">
					<h2>about</h2>
				</div>
				<div class="swd__fullwidth-wrapper">
					<div class="swd__content">
						<?php the_field('about_copy'); ?>
					</div>
				</div>
			</article>




			<article><!--ABOUT-->
				<div class="swd__fullwidth-wrapper swd__about">
					<div class="swd__content">
						<?php if( have_rows('about_boxes') ): ?>
							<?php while( have_rows('about_boxes') ): the_row();
							// vars
								$swd_svg = get_sub_field('block_svg');
								$swd_title = get_sub_field('block_title');
								$swd_copy = get_sub_field('block_copy');
							?>
						<div class="swd__option">
							<div class="swd__option-svg">
								<?php echo $swd_svg; ?>
							</div>
							<h3><?php echo $swd_title; ?></h3>
							<p><?php echo $swd_copy; ?></p>
						</div>
						<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</article>




			<article id="unit_sizes"><!--PRICING-->
				<div class="swd__section-title">
					<h2>unit sizes</h2>
				</div>
				<div class="swd__fullwidth-wrapper swd__fullwidth-wrapper-unit">
					<div class="swd__content">
						<div class="swd__home-units">
							<div class="swd__tables">
								<?php
								// check for rows (parent repeater)
								if( have_rows('unit_tables') ): ?>
								<?php
								// loop through rows (parent repeater)
								while( have_rows('unit_tables') ): the_row(); ?>
									<table>
										<thead>
											<tr>
												<th colspan="2"><?php the_sub_field('title'); ?></th>
											</tr>
										</thead>
											<?php
											// check for rows (sub repeater)
											if( have_rows('units') ): ?>
												<tbody>
													<?php
													// loop through rows (sub repeater)
													while( have_rows('units') ): the_row();
														?>
														<tr>
															<td><?php the_sub_field('unit_size'); ?></td>
															<td><?php the_sub_field('unit_price'); ?></td>
														</tr>
													<?php endwhile; ?>
												</tbody>
											<?php endif; ?>
											</table>
										<?php endwhile;  ?>
								<?php endif;  ?>
							</div><!--end swd__tables-->



							<div class="swd__table-img" id="slideshow">
								<?php if( have_rows('unit_image_rotator') ): ?>
									<?php while( have_rows('unit_image_rotator') ): the_row();
										$image_name = get_sub_field('unit_image');
										?>
								<div>
						    	<img src="<?php echo $image_name['url']; ?>" alt="<?php echo $image_name['alt']; ?>" />
						    </div>
								<?php endwhile; ?>
								<?php endif; ?>
							</div><!--end swd__table-img-->
						</div>
					</div><!--end swd__content-->
				</div><!--end swd__fullwidth-wrapper-->
			</article>




			<article id="news">
				<div class="swd__section-title">
					<h2>news</h2>
				</div>
				<div class="swd__fullwidth-wrapper">
					<div class="swd__home-more">
						<div class="swd__more-item" >
							<?php query_posts('cat=3&order=ASC'); ?>
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<article>
								<?php if( get_field('news_title') ): ?>
									<h3><?php the_field('news_title'); ?></h3>
								<?php endif; ?>
							   <?php the_field('news_content'); ?>
							 </article>
							<?php endwhile; endif; ?>
							<?php wp_reset_query(); ?>
						</div>
					</div>
				</div>
			</article>




			<article id="contact">
				<div class="swd__section-title">
					<h2>contact</h2>
				</div>
				<div class="swd__fullwidth-wrapper">
					<div class="swd__column">
						<?php echo do_shortcode( '[wpgmza id="4"]' ); ?>
					</div>
					<div class="swd__content swd__content-contact-wrapper">
						<div class="swd__content-address swd__content-address-home">
							<h3>locations:</h3>
							<?php if( have_rows('contact_us_locations') ): ?>
								<?php while( have_rows('contact_us_locations') ): the_row();
									// vars
									$location_name = get_sub_field('location_name');
									$location_url = get_sub_field('location_url');
									$street_address = get_sub_field('street_address');
									$city_state = get_sub_field('city_state_zip');
									$telephone = get_sub_field('telephone_number');
									?>
							<ul>
								<li><a href="<?php echo $location_url; ?>"><?php echo $location_name; ?></a></li>
								<li><?php echo $street_address; ?></li>
								<li><?php echo $city_state; ?></li>
								<li><a href="tel:1-<?php echo $telephone; ?>" class="swd__color_manchester"><?php echo $telephone; ?></a></li>
							</ul>
							<?php endwhile; ?>
							<?php endif; ?>
						</div><!--end swd__content-address-->
						<div class="swd__content-contact">
							<h3>Contact Us:</h3>
							<?php echo do_shortcode( '[wpforms id="99"]' ); ?>
						</div>
					</div>
				</div>
			</article>

			<br class="clear">





		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'capeann' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>



<?php get_footer(); ?>
