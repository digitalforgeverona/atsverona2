<?php
/**
 * @package WordPress
 * @subpackage Impero
 * @since Impero 1.0
 */

/*
Template Name: Gallery
*/                   

$post_type = 'bl_gallery';  
$portfolio_type = 'filterable';

// enqueue necessary scripts
wp_enqueue_script( 'jquery-quicksand',  get_template_directory_uri()."/js/jquery.quicksand.js", array('jquery'));
   
// add body class
add_filter( 'body_class', create_function( '$classes', '$classes[] = "portfolio-' . $portfolio_type . '"; return $classes;' ) ); 


get_header();

$layout_type = yiw_layout_page();

?>  

        <div id="content" class="layout-<?php echo $layout_type ?> group">

            <?php get_template_part( 'slogan' ) ?>

            <!-- START CONTENT -->
            <div id="primary" class="group">
                <?php if ( ! is_tax() ) get_template_part( 'loop', 'page' ); ?>

                <div id="portfolio-gallery" class="internal_page_items internal_page_gallery">
                    <ul class="gallery-wrap image-grid group">
                    <?php    
                    
                    $args = array(
                        'post_type'      => $post_type,
                        'posts_per_page' => -1
                    );                   
                    
                    if ( is_tax() )   
                       $args = wp_parse_args( $args, $wp_query->query ); 
                    
                    $gallery = new WP_Query( $args );   
                    
                    $postsPerRow = (yiw_layout_page() != 'sidebar-no') ? 3 : 4;
                    $i = 0;
                    
                    while( $gallery->have_posts() ) : $gallery->the_post(); ?>
                    
                        <?php 
                            $classes = "";
                            $terms = get_the_terms( get_the_ID(), sanitize_title( 'category-photo' ) );                         
                            
                            if(!empty($terms)) {
                                foreach( $terms as $index=>$term) {
                                    $classes .= " segment-".$index;
                                }
                            }
                
                        ?>
                    
                        <?php $isFirstInRow = ( ++$i==1 | ($i % $postsPerRow) == 1 ) ? 1 : 0; ?>
                        <?php $isLastInRow = ( ($i % $postsPerRow) == 0 ) ? 1 : 0; ?>
                
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>
                        <li data-id="id-<?php echo $i; ?>" class="<?php if(!empty($terms)) foreach ($terms as $term) { echo strtolower(preg_replace('/\s+/', '-', $term->slug)) . ' '; }  ?>">
                        
                            <div class="internal_page_item internal_page_item_gallery">
                                <a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'thumb_gallery', array( 'class' => 'picture' ) ) ?></a>
                                <div class="overlay">                            
                                    <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                                    <p><?php echo yiw_excerpt( 12, '', false ) ?></p>
                                    <a class="icon-zoom" href="<?php echo $image[0] ?>" rel="prettyPhoto[gallery]" title="<?php the_title() ?>">Zoom</a>
                					<a class="icon-more" href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php _e( 'View More', 'yiw' ) ?></a>
                                </div>
                            </div>
                            
                        </li>
                    <?php 
                        endwhile; 
                        wp_reset_query(); 
                    ?>
                    </ul>
                    <div class="clear"></div>
                </div>
                
            </div>
            <!-- END CONTENT -->

            <?php if($layout_type != 'sidebar-no') get_sidebar() ?>
        </div>

        <!-- START EXTRA CONTENT -->
        <?php get_template_part( 'extra-content' ) ?>      
        <!-- END EXTRA CONTENT -->    

<?php get_footer() ?>