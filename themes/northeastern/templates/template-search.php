<?php /* Template Name: Search Template */

	if(!isset($_GET['query'])){
		// add a default query to their search
		header('location:/search/?query=northeastern university');
	}


	get_header();

?>

	<main role="main">
		<!-- section -->
		<section>

			<script>
        // if you wish to search a specific site, please edit the following variables
        // to perform a search of all Northeastern, please delete the following variables
        // var NUGS_specificsite = 'alumni.northeastern.edu';  // specifc site to search
        // var NUGS_title ='Northeastern University Alumni'; // title override to be used in the saerch field label
      </script>
      <script src="https://search.northeastern.edu/nuglobalutils/requests/js/globalsearch.js"></script>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
