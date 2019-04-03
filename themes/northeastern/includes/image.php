<?php
include_once 'imagettftextblur.php';

   $jpg_image = imagecreatefrompng('../img/dog-tag.png');

   $font_size = 30;
   $angle = 0;
   $x_y_gap = 50;// spacing between lines
   $x_shadow = 265;
   $x = 267;//this should be +2 from $x_shadow
   $y_start_position = 175;
   $y_start_word_position = 176;//this should be +1 from $y_start_position
   $y_name_shadow = $y_start_position;
   $y_name_word_shadow = $y_start_word_position;
   $y_branch_shadow = $y_name_shadow + $x_y_gap;
   $y_branch_word_shadow = $y_name_word_shadow + $x_y_gap;
   $y_conflict_shadow = $y_branch_shadow + $x_y_gap;
   $y_conflict_word_shadow = $y_branch_word_shadow + $x_y_gap;

   // COLORS https://www.colorhexa.com
   $text_white = imagecolorallocate($jpg_image, 0xff, 0xff, 0xff);//555555
   //$very_dark_gray = imagecolorallocate($jpg_image, 0x22, 0x22, 0x22);//222222
   $shadow = imagecolorallocatealpha($jpg_image, 34, 34, 34, 10);//222222

   // COURIER FONTS https://www.wfonts.com/search?kwd=Courier-Bold
   // Path to our ttf font file
   //$font_file = '../.fonts/courier.ttf'; //courier
   //$font_file = '../.fonts/Courier-BoldRegular.ttf'; //courier bold regular
   $font_file = '../.fonts/Courier-Normal-Regular.ttf'; //courier normal

   // Set Text to Be Printed On Image
   $name = ucwords(($_GET['lastname'])) .',  '. ucwords(trim($_GET['firstname'])) .' '. (isset($_GET['middlename']) && $_GET['middlename'] != ''?' '.ucwords(trim($_GET['middlename'])).'.':'');
   $branch = ucwords(trim($_GET['branch']));
   $conflict = ucwords(trim($_GET['conflict']));

   $blur = 1;


   // Print Text On Image
   imagettftext($jpg_image, $font_size, $angle, $x, $y_name_word_shadow, $text_white, $font_file, $name);
   imagettftext($jpg_image, $font_size, $angle, $x, $y_branch_word_shadow, $text_white, $font_file, $branch);
   imagettftext($jpg_image, $font_size, $angle, $x, $y_conflict_word_shadow, $text_white, $font_file, $conflict);

  //  // the shadow for "name"
  //  imagettftextblur($jpg_image, $font_size, $angle, $x_shadow, $y_name_shadow, $shadow, $font_file, $name, $blur);
  //  //imagefilter($jpg_image, IMG_FILTER_GAUSSIAN_BLUR);
  //  // and the word itself
  //  imagettftextblur($jpg_image, $font_size, $angle, $x, $y_name_word_shadow, $text_white, $font_file, $name);
   //
  //  // the shadow for "branch"
  //  imagettftextblur($jpg_image, $font_size, $angle, $x_shadow, $y_branch_shadow, $shadow, $font_file, $branch, $blur);
  //  // and the word itself
  //  imagettftextblur($jpg_image, $font_size, $angle, $x, $y_branch_word_shadow, $text_white, $font_file, $branch);
   //
  //  // the shadow for "conflict"
  //  imagettftextblur($jpg_image, $font_size, $angle, $x_shadow, $y_conflict_shadow, $shadow, $font_file, $conflict, $blur);
  //  // and the word itself
  //  imagettftextblur($jpg_image, $font_size, $angle, $x, $y_conflict_word_shadow, $text_white, $font_file, $conflict);

   // Output image to the browser
   header('Content-Type: image/png');

   imagepng($jpg_image);
   imagedestroy($jpg_image);
?>
