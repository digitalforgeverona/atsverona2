<?php

/**
 * Template for displaying the main content part
 *
 * @file           content.php
 * @package        Celestial Lite
 * @version        Celestial Lite 1.0.1 
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
 
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<header class="entry-header">
			
			<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php if(the_title( '', '', false ) !='') the_title(); else _e('Untitled', 'celestial-lite'); ?></h1>
			<?php else : ?>
			<h1 class="entry-title">
			<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
				<span class="featured-post"><?php _e( 'Featured', 'celestial-lite' ); ?></span>
			<?php endif; ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php if(the_title( '', '', false ) !='') the_title(); else _e('Untitled', 'luminescence'); ?> </a>
			</h1>
			<?php endif; // is_single() ?>
			<div class="entry-meta">
				<span class="entry-date"><?php the_date(__('F j, Y', 'celestial-lite'), __('Date: ', 'celestial-lite') ); ?></span>
				<span class="entry-author"><?php printf( __( 'Author: ', 'celestial-lite' ) );	the_author_link(); ?></span>
				<?php if ( comments_open() ) : ?>
					<span class="comments-link">
						<?php echo esc_attr( sprintf( __( 'Comments: ', 'celestial-lite' ) ) ); ?>
						<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'celestial-lite' ) . '</span>', __( '1 Reply', 'celestial-lite' ), __( '% Replies', 'celestial-lite' ) ); ?>
					</span><!-- .comments-link -->
			<?php endif; // comments_open() ?>
			<?php edit_post_link( __( 'Edit', 'celestial-lite' ), '<span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			
					<?php the_excerpt(); ?>
				
		<?php else : // for regular blog posts use this layout ?>	
				
			<?php if ( has_post_thumbnail() ) : // check to see if our post has a thumbnail	?>		
				<?php if (get_theme_mod('blog_image') ) : // if the small thumbnail is used then use this layout ?>			
					<div class="entry-content">
						<div class="row-fluid">
							<div class="post-thumbnail span4"><?php the_post_thumbnail( 'blog-small' ); ?></div>									
							<div class="span8">								
								<?php the_content( __( ' Continue reading...', 'celestial-lite' ) ); ?>								
							</div>
						</div>
					</div><!-- .entry-content -->
				<?php else : // if the default large image is used then use this layout ?>
					<div class="entry-content">				
						<div class="post-thumbnail"><?php the_post_thumbnail( 'blog-large' ); ?></div>					
							<?php the_content( __( ' Continue reading...', 'celestial-lite' ) ); ?>		
					</div><!-- .entry-content -->
				<?php endif; ?>
			<?php else : // if our post has no thumbnail then use this layout ?>
					<div class="entry-content">													
							<?php the_content( __( ' Continue reading...', 'celestial-lite' ) ); ?>
					</div><!-- .entry-content -->
			<?php endif; ?>
								
		<?php endif; ?>

		<footer></footer>
	</article><!-- #post -->



