<?php /* Template Name: Home Page Template */ get_header(); ?>

<main>
	<!-- section -->
	<section>
		<!-- <div class="ci__wrapper"> -->
			<h1><?php the_title(); ?></h1>

			<?php
			/**
			 * Template Partial: Carousel (slider)
			 */

			    // get fields
			    $fields = get_fields($post->ID);


			    // get the carousel
			    $res = $fields['carousel'];
					//print_r($res);
			    // count the carousel slides (for aria)
			    $num_slides = count($res);

			    // if we have any slides
			    if( $num_slides > 0 ){

			        // set the formatting string
			        $format_slide = '
			            %s
			                <div class="neu__slick_item_image" style="background-image: url(%s)" aria-label="the background image">
			                    %s
			                </div>
			                <div class="neu__slick_item_copy">
			                    %s
			                    %s
			                    %s
			                </div>
			            %s
			        ';

			        // open the return string
			        $return_slider = '
			            <section class="neu__slider">
			                <h2 tabindex="0"></h2>
			                <div class="neu__slick" tabindex="0" aria-label="Carousel with '.$num_slides.' items.">
			        ';

			        // loop thru carousel rows
			        foreach($res as $i => $rec){

			            // if external_url set, get link attributes
			            if( !empty($rec['external_url']['url']) ){
			                $link_url = ( !empty($rec['external_url']['url']) ) ? $rec['external_url']['url'] : '';
			                $link_target = ( !empty($rec['external_url']['target']) ) ? $rec['external_url']['target'] : '';
			                $link_text = ( !empty($rec['external_url']['title']) ) ? $rec['external_url']['title'] : '';
			            }

			            // write the return string
			            $return_slider .= sprintf(
			                $format_slide

			                ,( !empty($link_url) )
			                    ? '<a class="neu__slick_item" href="javascript:;" data-src="'.$link_url.'" title="View '.$link_text.' [in new tab/window]" aria-label="'.$link_text.'. Click to view in new tab/window" target="'.$link_target.'">'
			                    : '<div class="neu__slick_item" >'

			                ,( !empty($rec['image']['sizes']['home-slider']) ) ? $rec['image']['sizes']['home-slider'] : ''

			                ,( !empty($rec['title']) ) ? '<h4>'.$rec['title'].'</h4>' : ''

			                ,( !empty($rec['author']) ) ? '<h4>'.$rec['author'].'</h4>' : ''

			                ,( !empty($rec['position']) ) ? '<h6>'.$rec['position'].'</h6>' : ''

			                ,( !empty($rec['details']) ) ? wpautop($rec['details']) : ''

			                ,( !empty($link_url) ) ? '</a>' : '</div>'
			            );
			        }

			        // close the return string
			        $return_slider .= '
			                </div>
			            </section>
			        ';

			        // echo the return string to the template
			        echo $return_slider;

			    }
			    else {
			        // there are no slides!
			    }

			 ?>









		<!-- </div> -->
	</section>

</main>

<?php get_footer(); ?>
