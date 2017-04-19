<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template for displaying widgets in this sidebar
 *
 * @file           sidebar.php
 * @package        Celestial Lite 
 * @version          Celestial Lite 1.0.1
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
  
?>

	<?php if ( is_active_sidebar( 'sidebar-7' ) ) : ?>
		<div id="secondary" class="widget-area span4" role="complementary">
			<div id="st-right" class="st-sidebar-list">
			<?php dynamic_sidebar( 'sidebar-7' ); ?>
			</div>
		</div><!-- #secondary -->
	<?php endif; ?>