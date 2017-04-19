<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template for displaying posts in the Aside post format
 *
 * @file           content-aside.php
 * @package        Celestial Lite 
 * @version          Celestial Lite 1.0.1
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary clearfix">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
		<div class="entry-content aside-post clearfix">
			<header class="page-header">
				<hgroup>
					<h2 class="aside-title"><?php printf( __( 'Aside', 'celestial-lite' ) ) ; ?></h2>
				</hgroup>
			</header><!-- .entry-header -->
		<?php the_content(); ?>		
			<footer class="entry-footer">
				<div class="aside-entry-meta">
					<span class="entry-date"><?php the_date(__('F j, Y', 'celestial-lite'), __('<strong>Published:</strong> ', 'celestial-lite') ); ?></span>	
					<span class="entry-permlink"><a href="<?php echo get_permalink(); ?>"><?php printf( __( 'Permalink ', 'celestial-lite' ) ) ; ?></a></span>			
				</div><!-- .entry-meta -->
			</footer><!-- .entry-footer -->
	</div><!-- .entry-content -->
	<?php endif; ?>
	
</article><!-- #post-<?php the_ID(); ?>-->