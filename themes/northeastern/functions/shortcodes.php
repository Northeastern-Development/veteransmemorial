<?php

  // Shortcode Demo with Nested Capability
  // function northeastern_shortcode_demo($atts, $content = null)
  // {
  //     return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
  // }
  //
  // // Shortcode Demo with simple <h2> tag
  // function northeastern_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
  // {
  //     return '<h2>' . $content . '</h2>';
  // }

  // Shortcodes
  // add_shortcode('northeastern_shortcode_demo', 'northeastern_shortcode_demo'); // You can place [northeastern_shortcode_demo] in Pages, Posts now.
  // add_shortcode('northeastern_shortcode_demo_2', 'northeastern_shortcode_demo_2'); // Place [northeastern_shortcode_demo_2] in Pages, Posts now.

  // Shortcodes above would be nested like this -
  // [northeastern_shortcode_demo] [northeastern_shortcode_demo_2] Here's the page title! [/northeastern_shortcode_demo_2] [/northeastern_shortcode_demo]

  add_filter( 'wpforms_fields_show_options_setting', '__return_true' );


  function ea_contact_form_two_column_open( $field, $form_data ) {
  	if( 8 != $form_data[ 'id' ] )
  		return;
  	if( 19 == $field[ 'id' ] )
  		echo '<div class="branches">';
  }
  add_action( 'wpforms_display_field_before', 'ea_contact_form_two_column_open', 1, 2 );


  function ea_contact_form_two_column_open2( $field, $form_data ) {
    if( 8 != $form_data[ 'id' ] )
      return;
    if( 43 == $field[ 'id' ] )
      echo '</div>';
  }
  add_action( 'wpforms_display_field_after', 'ea_contact_form_two_column_open2', 1, 2 );




  function wpf_dev_checkbox_choices_process_smarttags( $field, $deprecated, $form_data ) {
  	foreach ( $field['choices'] as $key => $choice ) {
  		if ( ! empty( $choice['label'] ) ) {
  			$field['choices'][ $key ]['label'] = apply_filters( 'wpforms_process_smart_tags', $choice['label'], $form_data );
  		}
  	}
  	return $field;
  }
  add_filter( 'wpforms_checkbox_field_display', 'wpf_dev_checkbox_choices_process_smarttags', 10, 3 );


// function ea_contact_form_two_column_open( $field, $form_data ) {
//     if( 8 != $form_data[ 'id' ] )
//       return;
//     if( 19 == $field[ 'id' ] )
//       echo '<div class="seantest">';
// }
// add_action( 'wpforms_display_field_before', 'ea_contact_form_two_column_open', 1, 2 );
//
//
//
//
//
// function ea_contact_form_two_column_open2( $field, $form_data ) {
//     if( 8 != $form_data[ 'id' ] )
//         return;
//     if( 43 == $field[ 'id' ] )
//         echo '</div>';
// }
// add_action( 'wpforms_display_field_after', 'ea_contact_form_two_column_open2', 1, 2 );

?>
