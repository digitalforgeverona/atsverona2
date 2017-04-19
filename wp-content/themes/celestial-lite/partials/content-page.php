<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template for displaying content in our page.php template
 *
 * @file           content-page.php
 * @package        Celestial Lite
 * @version          Celestial Lite 1.0 
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
  
?>
	
	
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) : // check to see if our post has a thumbnail	?>
	
		<div class="post-thumbnail" style="margin-bottom:40px;"><?php the_post_thumbnail( ); ?></div>
	
	<?php endif; ?>
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>

		<div class="entry-content">
			<?php the_content(); ?>
			
		</div><!-- .entry-content -->
		<footer class="entry-meta">
			<?php wp_link_pages( array( 'before' => '<span><span class="page-links">' . __( 'Pages: </span>', 'celestial-lite' ), 'after' => '</span><br />' ) ); ?>
			<?php edit_post_link( __( 'Edit', 'celestial-lite' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
