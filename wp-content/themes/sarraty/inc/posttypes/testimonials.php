<?php
add_action('init', 'testimonials_init');
/* SECTION - testimonials_custom_init */

function testimonials_init() {
    $labels = array(
        'name' => _x('Testimonial', 'post type general name', 'asalah'),
        'singular_name' => _x('Testimonial', 'post type singular name', 'asalah'),
        'add_new' => _x('Add New', 'Testimonial', 'asalah'),
        'add_new_item' => __('Add New Testimonial', 'asalah'),
        'edit_item' => __('Edit testimonial', 'asalah'),
        'new_item' => __('New testimonial', 'asalah'),
        'view_item' => __('View testimonial', 'asalah'),
        'search_items' => __('Search Testimonials', 'asalah'),
        'not_found' => __('No testimonials found', 'asalah'),
        'not_found_in_trash' => __('No testimonials found in Trash', 'asalah'),
        'parent_item_colon' => '',
        'menu_name' => __('Testimonial', 'asalah')
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
        'supports' => array('title', 'editor', 'thumbnail')
    );
    // We call this function to register the custom post type  
    register_post_type('testimonial', $args);
    
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
    register_taxonomy('tagtestimonials', array('testimonial'), array(
        'hierarchical' => true, // define whether to use a system like tags or categories  
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'tag-testimonials'),
    ));
}

/* --- Custom Messages - project_updated_messages --- */
add_filter('post_updated_messages', 'testimonial_updated_messages');

function testimonial_updated_messages($messages) {
    global $post, $post_ID;
    $messages['testimonial'] = array(
        0 => '', // Unused. Messages start at index 1.  
        1 => sprintf(__('Testimonial updated. <a href="%s">View Testimonial</a>', 'asalah'), esc_url(get_permalink($post_ID))),
        2 => __('Custom field updated.', 'asalah'),
        3 => __('Custom field deleted.', 'asalah'),
        4 => __('Testimonial updated.', 'asalah'),
        /* translators: %s: date and time of the revision */
        5 => isset($_GET['revision']) ? sprintf(__('Testimonial restored to revision from %s', 'asalah'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
        6 => sprintf(__('Testimonial published. <a href="%s">View Testimonial</a>', 'asalah'), esc_url(get_permalink($post_ID))),
        7 => __('Testimonial saved.', 'asalah'),
        8 => sprintf(__('Testimonial submitted. <a target="_blank" href="%s">Preview Testimonial</a>', 'asalah'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
        9 => sprintf(__('Testimonial scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Testimonial</a>', 'asalah'),
                // translators: Publish box date format, see http://php.net/date  
                date_i18n(__('M j, Y @ G:i', 'asalah'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
        10 => sprintf(__('Testimonial draft updated. <a target="_blank" href="%s">Preview Testimonial</a>', 'asalah'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
    );
    return $messages;
}

/* --- #end SECTION - project_updated_messages --- */

function testimonial_author() {
    global $post;
    $author = get_post_meta($post->ID, 'asalah_testimonial_author', true);
    if ($author) {
        ?>
        <?php echo $author; ?>
        <?php
    }
}

function testimonial_url() {
    global $post;
    $url = get_post_meta($post->ID, 'asalah_testimonial_url', true);
    if ($url) {
        ?>
        <?php echo $url; ?>
        <?php
    }
}

function testimonial_job() {
    global $post;
    $job = get_post_meta($post->ID, 'asalah_testimonial_job', true);
    if ($job) {
        ?>
        <?php echo $job; ?>
        <?php
    }
}

function get_testimonial_author() {
    global $post;
    $author = get_post_meta($post->ID, 'asalah_testimonial_author', true);
    if ($author) {
        ?>
        <?php return $author; ?>
        <?php
    }
}

function get_testimonial_url() {
    global $post;
    $url = get_post_meta($post->ID, 'asalah_testimonial_url', true);
    if ($url) {
        ?>
        <?php return $url; ?>
        <?php
    }
}

function get_testimonial_job() {
    global $post;
    $job = get_post_meta($post->ID, 'asalah_testimonial_job', true);
    if ($job) {
        ?>
        <?php return $job; ?>
        <?php
    }
}

function testimonial_items($num = '3', $tags = '', $auto = "10") {
    global $post;
    ?>
    <?php
    $args = array('post_type' => 'testimonial', 'posts_per_page' => $num);
    if ($tags != '') {
        $args['tagtestimonials'] = $tags;
    }
    $wp_query = new WP_Query($args);
    
    $count = 0;
    
    $auto_att = 'data-auto="'.$auto.'"';
    ?>  

    <?php if ($wp_query) : ?>
        <div class="testimonials_slider owl-carousel owl-theme" <?php echo $auto_att; ?>>
                <?php $i = 1; ?>
                <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

                    <div class="testimonial_info item <?php
                    if ($i == 1) {
                        echo "active";
                    }
                    ?>">
                        <div class="testimonial_text indicator_seperator">
                            <?php the_content(); ?>

                        </div>
                        <div class="testimonial_author">

                            <?php if (has_post_thumbnail()): ?>
                                <div class="testimonial_avatar">
                                    <?php the_post_thumbnail("smallbloglist"); ?>
                                </div>
                            <?php endif; ?>


                            <div class="testimonial_name">
                                <?php if (asalah_post_option("asalah_testimonial_author")): ?>
                                    <h5 class="title"><?php echo asalah_post_option("asalah_testimonial_author"); ?></h5>
                                <?php endif; ?>


                                <span><?php echo asalah_post_option("asalah_testimonial_job"); ?> - </span><a target="_blank" href="<?php echo asalah_post_option("asalah_testimonial_url"); ?>"><?php echo asalah_post_option("asalah_testimonial_company"); ?></a>
                            </div>
                        </div>

                    </div>
                    <?php $i++; ?>
                <?php endwhile; ?>
                
            </div>
    <?php endif; ?>

    <?php
}
?>