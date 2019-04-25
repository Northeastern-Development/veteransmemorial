<?php /* Template Name: Home Page Template */

// $searchVal = '';
// if(isset($_POST['keyword']) && $_POST['keyword'] != ''){
// 	$searchVal = $_POST['keyword'];
// }
// print_r($_POST['keyword']);


 get_header();

 ?>

<main>
  <div class="image" style="background: url('<?php bloginfo('template_url'); ?>/img/home_bg.jpg');" aria-label="veterans memorial wall"></div>

  <section class="home">
    <div class="head-block">
      <small>with enduring gratitude to our fallen heroes</small>
      <h1>Veterans War Memorial</h1>
      <p>This memorial is dedicated to the people from our Northeastern community who lost their lives in service to our nation during a time of war.</p>
      <?php get_template_part('/includes/searchform'); ?>
    </div>
  </section>



  <!-- section -->

  <?php
  /**
   * Template Partial: Carousel (slider)
   */

      // get fields
      $fields = get_fields($post->ID);

      // get the carousel
      $res = $fields['carousel'];

      // count the carousel slides (for aria)
      $num_slides = count($res);

      // if we have any slides
      if( $num_slides > 0 ){

          // set the formatting string
          $format_slide = '
              %s
                  <div class="neu__slick_item_image neu__bgimg">
                      <div class="neu__bgimg-img-slider" style="background-image: url(%s)" aria-label="the background image"></div>
                      %s
                  </div>
                  <div class="neu__slick_item_copy">
                      <div>
                          %s
                          %s
                      </div>
                      <div>
                          %s
                      </div>
                  </div>
              %s
          ';

          // open the return string
          $return_slider = '
              <section class="neu__slider">

                  <div class="neu__slick" tabindex="0" aria-label="Carousel with '.$num_slides.' items.">
          ';

          // loop thru carousel rows
          foreach($res as $i => $rec){
              $label = '';

              $link_url = ( !empty($rec['external_url']['url']) ) ? $rec['external_url']['url'] : '';
              $link_target = ( !empty($rec['external_url']['target']) ) ? $rec['external_url']['target'] : '';
              $label = ( !empty($rec['external_url']['target']) ? 'Learn more about '.$rec['title'] . ' [will open in new tab/window]' : 'Learn more about '.$rec['title'] );

              // write the return string
              $return_slider .= sprintf(
                  $format_slide

                  ,( !empty($link_url) )
                      ? '<a class="neu__slick_item" href="javascript:void(0);" data-src="'.$link_url.'" title="'.$label.'" aria-label="'.$label.'" target="'.$link_target.'">'
                      : '<div class="neu__slick_item" aria-label="The '.$rec['title'].' slide">'

                  ,( !empty($rec['image']['url']) ) ? $rec['image']['url'] : ''

                  ,( !empty($rec['title']) ) ? '<h4><span>'.$rec['title'].'</span></h4>' : ''

                  ,( !empty($rec['author']) ) ? '<h4>'.$rec['author'].'</h4>' : ''

                  ,( !empty($rec['position']) ) ? '<p>'.$rec['position'].'</p>' : ''

                  ,( !empty($rec['details']) ) ? str_replace(array('<p>', '</p>'),array('<p><span>', '</span></p>'), $rec['details']) : ''

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


</main>

<?php get_footer(); ?>
