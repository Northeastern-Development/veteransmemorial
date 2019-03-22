			<!-- footer -->
			<footer class="footer" role="contentinfo">

				<!-- small logo -->
				<div class="logo"><?=get_settings('theme_settings_logosvg')?></div>
				<!-- /small logo -->

				<div>

					<!-- copyright -->
					<p class="copyright">
						&copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>.
					</p>
					<!-- /copyright -->

				</div>

			</footer><?php if(function_exists("NUML_globalfooter")){NUML_globalfooter();} ?>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

	</body>
</html>
