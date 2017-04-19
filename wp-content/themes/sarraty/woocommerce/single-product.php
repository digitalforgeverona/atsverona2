<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header('shop'); ?>
<div class="site_content">
<!-- check if page title is enabled in options panel -->
<?php if ((asalah_post_option("asalah_title_holder") == "show") || ( asalah_option("asalah_enable_pagetitle") && asalah_post_option("asalah_title_holder") != 'hide')): ?>
    <div class="page_title_holder clearfix">
        <div class="container">
            <div class="page_info">
                <h1 class="title"><?php the_title(); ?></h1>

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

		<?php while ( have_posts() ) : the_post(); ?>

			<?php woocommerce_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

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