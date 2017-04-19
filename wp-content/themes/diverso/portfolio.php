<?php
/**
 * @package WordPress
 * @subpackage Impero
 * @since Impero 1.0
 */

/*
Template Name: Portfolio
*/                   

global $yiw_portfolio;
$yiw_portfolio = yiw_portfolios();
$post_type = yiw_get_portfolio_post_type();
                                                    
$portfolio_type = $yiw_portfolio[$post_type]['layout'];
$meta_type = get_post_meta( get_the_ID(), 'portfolio_type', true );
if ( ! empty( $meta_type ) )
    $portfolio_type = $meta_type;

// enqueue necessary scripts
if ( $portfolio_type == 'filterable' && ! is_tax() )
    wp_enqueue_script( 'jquery-quicksand',  get_template_directory_uri()."/js/jquery.quicksand.js", array('jquery'));

if ( $portfolio_type == 'slider' )
    wp_enqueue_script( 'jquery-carousel',    get_template_directory_uri()."/js/jquery.jcarousel.min.js", array('jquery') );
   
// add body class
add_filter( 'body_class', create_function( '$classes', '$classes[] = "portfolio-' . $portfolio_type . '"; return $classes;' ) ); 


get_header();


$portfolio_types = array( 
                       'no_sidebar' => array('3cols', 'slider', 'big_image'),
                       'sidebar'    => array('full_desc', 'filterable')
                   );

if( $portfolio_type == 'full_desc' ) {
    get_template_part( 'single', 'portfolio' );
    die;
}

$layout_type = ( in_array($portfolio_type, $portfolio_types['no_sidebar']) ) ? 'sidebar-no' : yiw_layout_page();

?>  

        <div id="content" class="layout-<?php echo $layout_type ?> group">

            <?php get_template_part( 'slogan' ) ?>

            <!-- START CONTENT -->
            <div id="primary" class="group">
                <?php if ( ! is_tax() ) get_template_part( 'loop', 'page' ); ?>
                <?php get_template_part( 'portfolio', $portfolio_type ); ?>
            </div>
            <!-- END CONTENT -->

            <?php if($layout_type != 'sidebar-no') get_sidebar( ( is_single() || is_tax() ) ? 'portfolio' : '' ) ?>
        </div>

        <!-- START EXTRA CONTENT -->
        <?php get_template_part( 'extra-content' ) ?>      
        <!-- END EXTRA CONTENT -->    

<?php get_footer() ?>