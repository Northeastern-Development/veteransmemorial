<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?></title>
		<meta name="title" content="<?php wp_title(''); ?>" />
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="author" content="Northeastern University, https://www.northeastern.edu" />
		<meta name="copyright" content="<?=date("Y")?>" />
		<meta name="language" content="english" />
		<meta name="zipcode" content="<?=(null !== get_option('theme_settings_geotag_city') && get_option('theme_settings_geotag_city') != '' && null !== get_option('theme_settings_geotag_state') && get_option('theme_settings_geotag_state') != '' && null !== get_option('theme_settings_geotag_zip') && get_option('theme_settings_geotag_zip') != ''?get_option('theme_settings_geotag_zip'):'02115')?>" />
		<meta name="city" content="<?=(null !== get_option('theme_settings_geotag_state') && get_option('theme_settings_geotag_state') != '' && null !== get_option('theme_settings_geotag_zip') && get_option('theme_settings_geotag_zip') != '' && null !== get_option('theme_settings_geotag_city') && get_option('theme_settings_geotag_city') != ''?get_option('theme_settings_geotag_city'):'Boston')?>" />
		<meta name="state" content="<?=(null !== get_option('theme_settings_geotag_city') && get_option('theme_settings_geotag_city') != '' && null !== get_option('theme_settings_geotag_zip') && get_option('theme_settings_geotag_zip') != '' && null !== get_option('theme_settings_geotag_state') && get_option('theme_settings_geotag_state') != ''?strtoupper(get_option('theme_settings_geotag_state')):'MA')?>" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta http-equiv="revisit" content="15 days" />
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-touch-fullscreen" content="yes">
		<meta name="msapplication-tap-highlight" content="no" />
		<link rel="apple-touch-icon" sizes="57x57"  href="https://brand.northeastern.edu/global/assets/favicon/apple-touch-57x57.png?v=2" />
    <link rel="apple-touch-icon" sizes="60x60"  href="https://brand.northeastern.edu/global/assets/favicon/apple-touch-60x60.png?v=2" />
    <link rel="apple-touch-icon" sizes="72x72"  href="https://brand.northeastern.edu/global/assets/favicon/apple-touch-72x72.png?v=2" />
    <link rel="apple-touch-icon" sizes="76x76"  href="https://brand.northeastern.edu/global/assets/favicon/apple-touch-76x76.png?v=2" />
    <link rel="apple-touch-icon" sizes="114x114"  href="https://brand.northeastern.edu/global/assets/favicon/apple-touch-114x114.png?v=2" />
    <link rel="apple-touch-icon" sizes="120x120"  href="https://brand.northeastern.edu/global/assets/favicon/apple-touch-120x120.png?v=2" />
    <link rel="apple-touch-icon" sizes="144x144"  href="https://brand.northeastern.edu/global/assets/favicon/apple-touch-144x144.png?v=2" />
    <link rel="apple-touch-icon" sizes="152x152"  href="https://brand.northeastern.edu/global/assets/favicon/apple-touch-152x152.png?v=2" />
    <link rel="icon" sizes="144x144" type="image/png" href="https://brand.northeastern.edu/global/assets/favicon/android-chrome-144x144.png?v=2" />
    <link rel="icon" sizes="32x32" type="image/png" href="https://brand.northeastern.edu/global/assets/favicon/favicon-32x32.png?v=2" />
    <link rel="icon" sizes="16x16" type="image/png" href="https://brand.northeastern.edu/global/assets/favicon/favicon-16x16.png?v=2" />
    <link rel="manifest" href="https://brand.northeastern.edu/global/assets/favicon/manifest.json" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="https://brand.northeastern.edu/global/assets/favicon/mstile-144x144.png?v=2" />
    <meta name="theme-color" content="#ffffff" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<?php wp_head(); ?>



		<?php

			// if we want to use the university GATM
			if(null !== get_option('theme_settings_analytics_tagmanager') && get_option('theme_settings_analytics_tagmanager') == 'active' && get_option('theme_settings_status') == 'prod'){
				echo "<!-- Google Tag Manager --><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
				new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
				'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-WGQLLJ');</script><!-- End Google Tag Manager -->";
			}

			// if we want to use a custom GA snippet
			if(get_option('theme_settings_analytics_tagmanager') != 'active' && null !== get_option('theme_settings_analytics_snippet') && get_option('theme_settings_analytics_snippet') != '' && get_option('theme_settings_status') == 'prod'){
				echo trim(get_option('theme_settings_analytics_snippet'));
			}

			// if we have any additional analytics scripts to load
			if(null !== get_option('theme_settings_analytics_snippet_additional') && get_option('theme_settings_analytics_snippet_additional') != '' && get_option('theme_settings_status') == 'prod'){
				echo trim(get_option('theme_settings_analytics_snippet_additional'));
			}

		?>

	</head>
	<body <?php body_class(); ?>>

		<?php

			// if we want to use the university GATM
			if(null !== get_option('theme_settings_analytics_tagmanager') && get_option('theme_settings_analytics_tagmanager') == 'active' && get_option('theme_settings_status') == 'prod'){
				echo "<!-- Google Tag Manager (noscript) --><noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id=GTM-WGQLLJ\" height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript><!-- End Google Tag Manager (noscript) -->";
			}

			// if we are in dev/test mode
			if(null !== get_option('theme_settings_status') && get_option('theme_settings_status') == 'dev'){
				echo '<p class="testp" style="position:fixed;background:rgba(255,0,0,0.7);color:#fff;top:0px;left:0;font-weight:bold;font-size:20px;z-index:99999999;"></p>';
			}

		?>

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<?php if(function_exists("NUML_globalheader")){NUML_globalheader();} ?><header class="header clear" role="banner">

				<div>

					<!-- logo -->
					<div class="logo">
						<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>" aria-label="<?php bloginfo('name'); ?>"><?=get_settings('theme_settings_logosvg')?></a>
					</div>
					<!-- /logo -->

					<!-- data sheet button -->
					<!-- <div class="data-button">
						<a href="<?php echo home_url(); ?>/wp-content/uploads/data-sheet.pdf" target="_blank" title="click here to download the community imapact 2018 data sheet" aria-label="click here to download the community imapact 2018 data sheet">data sheet</a>
					</div> -->

					<?php include(locate_template('includes/navigation.php')); ?>

					<!-- mobile nav -->
					<div class="mobilenav js-hideshowmobilenav" title="Show/Hide Main Menu"></div>


				</div>

			</header>
			<!-- /header -->
