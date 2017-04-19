<?php       
/**
 * @package WordPress
 * @since 1.0
 */

if ( yiw_is_portfolio_post_type() ) {
    get_template_part( 'single', 'portfolio' );     
    die;
}

wp_enqueue_style( 'Oswald', 'http://fonts.googleapis.com/css?family=Oswald&v2' ); 

get_header() ?>           
        
        <div id="content" class="layout-<?php echo yiw_layout_page() ?> group">
        
            <!-- START CONTENT -->
            <div id="primary" class="group">
                <?php get_template_part( 'loop', 'index' ) ?>
            </div>                       
            <!-- END CONTENT -->
            
            <!-- START SIDEBAR -->
            <?php get_sidebar( 'blog' ) ?>  
            <!-- END SIDEBAR -->  
        
        </div>   
                              
        <!-- START EXTRA CONTENT -->
		<?php get_template_part( 'extra-content' ) ?>      
        <!-- END EXTRA CONTENT -->      
        
<?php get_footer() ?>
