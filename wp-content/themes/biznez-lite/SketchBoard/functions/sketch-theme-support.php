<?php
global $themename;
global $shortname;
function biznez_nav() {
   				if(has_nav_menu( 'Header' ) ) {
					wp_nav_menu(array( 'container_class' => 'menu clearfix', 'container_id' => 'menu-container', 'menu_id' => 'menu-main','menu_class' => '','theme_location' => 'Header' )); 
				} else                 
        biznez_nav_fallback();
}
function biznez_nav_fallback() {
    ?>
    <div class="menu" id="menu-container">
                    <ul id="menu-main" class="">
                    <?php wp_list_pages('title_li=&depth=0'); ?>
                    </ul>
                </div>  
<?php
}
/**
 * Filter content with empty post title
 *
 * @since biznez
 */
add_filter('the_title', 'biznez_untitled');
function biznez_untitled($title) {
	if ($title == '') {
		return __('Untitled', 'biznez-lite');
	} else {
		return $title;
	}
}
/********************************************
 THUMBNAIL SUPPORT
*********************************************/
function biznez_theme_support(){
    add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
	add_theme_support( 'woocommerce' );
	set_post_thumbnail_size( 150, 150, true );
	add_editor_style();
}
add_action('after_setup_theme', 'biznez_theme_support');