<?php
$postid =  woocommerce_get_page_id('shop');
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

get_header('shop');

?>
<div class="site_content">
<!-- check if page title is enabled in options panel -->
<?php if ((asalah_post_option("asalah_title_holder", $postid) == "show") || ( asalah_option("asalah_enable_pagetitle") && asalah_post_option("asalah_title_holder", $postid) != 'hide')): ?>

	<?php if (asalah_post_option("asalah_custom_title_bg", $postid)): ?>
	<style>
	.page_title_holder {
	    background-image: url('<?php echo asalah_post_option("asalah_custom_title_bg", $postid);  ?>');
	    background-repeat: no-repeat;
	    background-size: cover;
	}    
	</style>
	<?php endif; ?>
	
	<?php 
	if (asalah_post_option("asalah_banner_padding", $postid)) {
	?>
	<style>
	.page_title_holder {
		padding: <?php echo asalah_post_option("asalah_banner_padding", $postid); ?>px 0;
	}    
	</style>
	<?php
	}
	?>
	
    <div class="page_title_holder clearfix">
    <?php if (asalah_post_option('asalah_banner_video_mp4') 
    			&& asalah_post_option('asalah_banner_video_m4v')
    			&& asalah_post_option('asalah_banner_video_webm')
    			&& asalah_post_option('asalah_banner_video_ogv')
    			 ) : ?>
    			
    			<style>
    			.page_title_holder {
    				overflow: hidden;
    				position: relative;
    			}    
    			</style>
    			 
    	<video class="video_overlay" preload="auto"  autoplay="autoplay" loop muted="muted">
    	<source src="<?php echo asalah_post_option('asalah_banner_video_m4v'); ?>" type="video/mp4" />
    	<source src="<?php echo asalah_post_option('asalah_banner_video_webm'); ?>" type="video/webm" />
    	<source src="<?php echo asalah_post_option('asalah_banner_video_ogv'); ?>" type="video/ogg" />
    	<source src="<?php echo asalah_post_option('asalah_banner_video_mp4'); ?>" />
    	</object>
    	</video>
    
    <?php endif; ?>
        <div class="container">
            <div class="page_info">
                <h1 class="title"><?php woocommerce_page_title(); ?></h1>

            </div>
            <!-- check if bread crumb is enabled in option panel -->
    <?php if ((asalah_post_option("asalah_breadcrumb") == "show") || (asalah_option("asalah_enable_breadcrumb") && asalah_post_option("asalah_breadcrumb") != "hide")): ?>
                <div class="page_nav">
                    <nav class="breadcrumb"><?php woocommerce_breadcrumb(); ?></nav>		
                </div>
    <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<!-- endif for checking page title in option panel -->

<div class="container single_blog">
    <div class="row">
        <?php
        /**
         * woocommerce_before_main_content hook
         *
         * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
         * @hooked woocommerce_breadcrumb - 20
         */
        do_action('woocommerce_before_main_content');
        ?>

<?php if (apply_filters('woocommerce_show_page_title', true)) : ?>


        <?php endif; ?>

        <?php do_action('woocommerce_archive_description'); ?>

        <?php if (have_posts()) : ?>

            <?php
            /**
             * woocommerce_before_shop_loop hook
             *
             * @hooked woocommerce_result_count - 20
             * @hooked woocommerce_catalog_ordering - 30
             */
            do_action('woocommerce_before_shop_loop');
            ?>

            <?php woocommerce_product_loop_start(); ?>

            <?php woocommerce_product_subcategories(); ?>

            <?php while (have_posts()) : the_post(); ?>

                <?php woocommerce_get_template_part('content', 'product'); ?>

            <?php endwhile; // end of the loop.  ?>

            <?php woocommerce_product_loop_end(); ?>

            <?php
            /**
             * woocommerce_after_shop_loop hook
             *
             * @hooked woocommerce_pagination - 10
             */
            do_action('woocommerce_after_shop_loop');
            ?>

        <?php elseif (!woocommerce_product_subcategories(array('before' => woocommerce_product_loop_start(false), 'after' => woocommerce_product_loop_end(false)))) : ?>

            <?php woocommerce_get_template('loop/no-products-found.php'); ?>

        <?php endif; ?>

        <?php
        /**
         * woocommerce_after_main_content hook
         *
         * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
         */
        do_action('woocommerce_after_main_content');
        ?>

        <?php
        /**
         * woocommerce_sidebar hook
         *
         * @hooked woocommerce_get_sidebar - 10
         */
        do_action('woocommerce_sidebar');
        ?>
    </div></div>
</div>
<?php get_footer('shop'); ?>