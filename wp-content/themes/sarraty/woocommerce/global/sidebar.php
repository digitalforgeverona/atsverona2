<?php
/**
 * Sidebar
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php global $post; ?>

<?php
if(is_shop()) {
	$id = get_option('woocommerce_shop_page_id'); 
} else {
	$id = $post->ID;
}
?>


<?php wp_reset_query(); ?>
            
<?php if (asalah_option("asalah_sidebar_position") != "no-sidebar" ): ?>
<?php if (asalah_post_option("asalah_post_layout", $id) != "full" ): ?>

<div class="side_content <?php echo asalah_sidebar_class($id); ?>">
    <?php
    $asalah_have_custom_sidebar = get_post_meta($id, 'asalah_custom_sidebar', true);

    if (!isset($asalah_have_custom_sidebar) || $asalah_have_custom_sidebar == '' || $asalah_have_custom_sidebar == 'none') {
        
        get_sidebar();
    } else {

        $custom_sidebar_id = get_post_meta($id, 'asalah_custom_sidebar', true);
        if (is_active_sidebar($custom_sidebar_id)) :
            dynamic_sidebar($custom_sidebar_id);
        endif;
    }
    ?>
</div>
<?php endif; ?>
<?php endif;?>