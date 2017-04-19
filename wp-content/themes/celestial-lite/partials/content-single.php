<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template for displaying content in the single.php template
 *
 * @file           content-single.php
 * @package        Celestial Lite
 * @version        Celestial Lite 1.0.1
 * @author         Styled Themes 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
 

 ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	
	<header class="page-header">
		<h1 class="entry-title">
            <?php if(the_title( '', '', false ) !='') the_title(); else _e('Untitled', 'celestial-lite'); ?> </h1>
		<div class="entry-meta">
			<span class="entry-date"><?php the_date(__('F j, Y', 'celestial-lite'), __('Date: ', 'celestial-lite') ); ?></span>
			<span class="entry-author"><?php printf( __( 'Author: ', 'celestial-lite' ) );	the_author_link(); ?></span>					
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content clearfix">
    
  
		<?php if ( has_post_format( 'image' , '' )) : ?>
             <div class="post-thumbnail"><?php the_post_thumbnail( ); ?></div>
             <?php the_content(); ?>	
        <?php else : ?>		
               
              <?php if ( has_post_thumbnail() ) : // check to see if our post has a thumbnail	?>
              	                   
                    <?php if (get_theme_mod('blog_image') ) : // if the small thumbnail is used then use this layout ?>			                              
						<?php if( get_theme_mod( 'hide_intro_image' ) == '1') { ?>
                            <div class="post-thumbnail small-featured-image alignleft"><?php the_post_thumbnail( 'blog-small' ); ?></div>									      
                        <?php } ?>                                                            
                        <?php the_content( __( ' Continue reading...', 'celestial-lite' ) ); ?>
                        								                                
                     <?php else : // if the default large image is used then use this layout ?>
                            
						<?php if( get_theme_mod( 'hide_intro_image' ) == '1') { ?>				
                            <div class="post-thumbnail"><?php the_post_thumbnail( 'blog-large' ); ?></div>	
                        <?php } ?>				
                        <?php the_content( __( ' Continue reading...', 'celestial-lite' ) ); ?>		
                            
                     <?php endif; ?>
                            
                        
                     
              <?php else : // if our post has no thumbnail then use this layout ?>                                               
                    <?php the_content( __( ' Continue reading...', 'celestial-lite' ) ); ?>
              <?php endif; ?>	                    
                                                
         <?php endif; ?>	                                                                             							
						
                        
        
	</div><!-- .entry-content -->

	<footer class="entry-footer">
	
		<?php wp_link_pages( array( 'before' => '<span><span class="page-links">' . __( 'Pages: </span>', 'celestial-lite' ), 'after' => '</span><br />' ) ); ?>
		
		<?php
		$categories_list = get_the_category_list( _x( ', ', 'used between list items, there is a space after the comma', 'celestial-lite' ) );
		$tags_list = get_the_tag_list( '', _x( ', ', 'used between list items, there is a space after the comma', 'celestial-lite' ) );
		
		if ( $categories_list )
			printf( '<span>' . __( '<span class="cat-links">Posted in: </span> %1$s.', 'celestial-lite' ) . '</span><br />', $categories_list );
		if ( $tags_list )
			printf( '<span>' . __( '<span class="tag-links">Tagged: </span> %1$s.', 'celestial-lite' ) . '</span><br />', $tags_list );		 
		?>
		<?php  the_modified_date( __('F j, Y', 'celestial-lite'), __( '<span class="modified-date">Last Modified: </span> ', 'celestial-lite') ); ?>
	</footer><!-- .entry-footer -->
	
	
</article><!-- #post-<?php the_ID(); ?> -->
<?php 

if ( get_the_author_meta( 'description' ) AND is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries ?>




<aside id="author-info">
	<div class="row-fluid">
		<div id="author-avatar" class="span1">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'styledthemes_author_bio_avatar_size', 70 ) ); ?>
		</div>
		<div id="author-description" class="span11">
			<h4 id="author-title"><?php printf( __( 'About %s', 'celestial-lite' ), get_the_author() ); ?></h4>
			<?php the_author_meta( 'description' ); ?>
			<span id="author-link"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( __( 'View all posts by %s here...', 'celestial-lite' ), get_the_author() ); ?>
			</a></span>
		</div><!-- #author-description -->
		
	</div>
</aside><!-- #author-info -->

<?php endif; ?>