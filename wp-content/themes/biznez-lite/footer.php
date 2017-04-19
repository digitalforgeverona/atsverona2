<?php
    global $themename;
	global $shortname;
?> 
<!-- #Footer Area -->
<div id="footer-area">
	<div class="container_24 clearfix">
		<div class="grid_24">
			<div id="footer" class="page">
				<div id="foot-sidebar">
					<?php get_sidebar('footer'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="bottom_wrapper container_24 clearfix">
		<div id="site-info" class="grid_10"><?php  if(sketch_get_option($shortname."_copyright")){ echo sketch_get_option($shortname."_copyright");} ?></div>
		<div class="owner grid_12 alpha omega"><?php _e('Biznez Theme by ','biznez-lite'); ?><a class="biznez-link" href="http://www.sketchthemes.com/" target="_blank" title="Sketch Themes"><?php _e('SketchThemes','biznez-lite'); ?></a></div>
	 </div><!-- #bottom_wrapper -->
</div>
<a href="JavaScript:void(0);" title="Back To Top" id="backtop"></a>
<!-- #Footer Area --><?php wp_footer(); ?>
</body>
</html>