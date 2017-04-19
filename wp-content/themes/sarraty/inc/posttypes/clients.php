<?php
add_action('init', 'client_init');

function client_init() {
    $labels = array(
        'name' => _x('Clients', 'post type general name', 'asalah'),
        'singular_name' => _x('Client', 'post type singular name', 'asalah'),
        'add_new' => _x('Add New', 'Client', 'asalah'),
        'add_new_item' => __('Add New Client', 'asalah'),
        'edit_item' => __('Edit Client', 'asalah'),
        'new_item' => __('New Client', 'asalah'),
        'view_item' => __('View Client', 'asalah'),
        'search_items' => __('Search Client', 'asalah'),
        'not_found' => __('No Client found', 'asalah'),
        'not_found_in_trash' => __('No clients found in Trash', 'asalah'),
        'parent_item_colon' => '',
        'menu_name' => 'Client'
    );
    // Some arguments and in the last line 'supports', we say to WordPress what features are supported on the Project post type  
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'thumbnail')
    );
    // We call this function to register the custom post type  
    register_post_type('client', $args);
    
    $labels = array(
        'name' => _x('Tags', 'taxonomy general name', 'asalah'),
        'singular_name' => _x('Tag', 'taxonomy singular name', 'asalah'),
        'search_items' => __('Search Types', 'asalah'),
        'all_items' => __('All Tags', 'asalah'),
        'parent_item' => __('Parent Tag', 'asalah'),
        'parent_item_colon' => __('Parent Tag:', 'asalah'),
        'edit_item' => __('Edit Tags', 'asalah'),
        'update_item' => __('Update Tag', 'asalah'),
        'add_new_item' => __('Add New Tag', 'asalah'),
        'new_item_name' => __('New Tag Name', 'asalah'),
    );
    // Register Custom Taxonomy  
    register_taxonomy('tagclients', array('client'), array(
        'hierarchical' => true, // define whether to use a system like tags or categories  
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'tag-clients'),
    ));
}

/* --- Custom Messages - project_updated_messages --- */
add_filter('post_updated_messages', 'client_updated_messages');

function client_updated_messages($messages) {
    global $post, $post_ID;
    $messages['client'] = array(
        0 => '', // Unused. Messages start at index 1.  
        1 => sprintf(__('client updated. <a href="%s">View client</a>'), esc_url(get_permalink($post_ID))),
        2 => __('Custom field updated.', 'asalah'),
        3 => __('Custom field deleted.', 'asalah'),
        4 => __('client updated.', 'asalah'),
        /* translators: %s: date and time of the revision */
        5 => isset($_GET['revision']) ? sprintf(__('client restored to revision from %s', 'asalah'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
        6 => sprintf(__('client published. <a href="%s">View Client</a>', 'asalah'), esc_url(get_permalink($post_ID))),
        7 => __('client saved.', 'asalah'),
        8 => sprintf(__('client submitted. <a target="_blank" href="%s">Preview Client</a>', 'asalah'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
        9 => sprintf(__('client scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Client</a>', 'asalah'),
                // translators: Publish box date format, see http://php.net/date  
                date_i18n(__('M j, Y @ G:i', 'asalah'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
        10 => sprintf(__('client draft updated. <a target="_blank" href="%s">Preview client</a>'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
    );
    return $messages;
}

/* --- #end  Demo URL meta box --- */

function get_client_url() {
    global $post;
    $url = get_post_meta($post->ID, 'asalah_client_url', true);
    if ($url) {
        return $url;
    }
}

function get_client_logo() {
    global $asalah_data;
    global $post;
    if (has_post_thumbnail($post->ID)) {
        $image_id = get_post_thumbnail_id($post->ID);
        $image_url = wp_get_attachment_image_src($image_id, 'large');
        $image_url = $image_url[0];
        $theimage = $image_url;

        return get_the_post_thumbnail($post->ID, '');
    } else {
        $output = "<span class='client_logo_text'>";
        $output .= the_title();
        $output .= "</span>";
        return $output;
    }
}

function clients_items($num = '6', $appear = '6', $class = '', $tags = '', $style = 'carousel') {
    ?>
    <?php
    $args = array('post_type' => 'Client', 'posts_per_page' => $num);
    if ($tags != '') {
        $args['tagclients'] = $tags;
    }
    $wp_query = new WP_Query($args);
    
    $count = 0;
    
    $style_class = 'clients_carousel owl-carousel owl-theme';
    if ($style == 'carousel') {
    	$style_class = 'clients_carousel owl-carousel owl-theme';
    }elseif($style == 'grid') {
    	$style_class = 'client_items clients_grid';
    }
    ?>  
    <?php if ($wp_query) : ?>

        <?php /* Start the Loop */ ?>
        <div class="<?php echo $style_class . ' ' . $class; ?>" data-appeared-items="<?php echo $appear; ?>">
            <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                <div class="client_item <?php echo $class; ?>">
                    <a target="_blank" title="<?php echo get_the_title(); ?>" href="<?php echo get_client_url(); ?>"><?php echo get_client_logo(); ?></a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>

    <?php
}
?>