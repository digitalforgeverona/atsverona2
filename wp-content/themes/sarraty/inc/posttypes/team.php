<?php
add_action('init', 'team_init');
/* SECTION - project_custom_init */

function team_init() {
    $labels = array(
        'name' => _x('Team Members', 'post type general name', 'asalah'),
        'singular_name' => _x('Team Members', 'post type singular name', 'asalah'),
        'add_new' => _x('Add New', 'Member', 'asalah'),
        'add_new_item' => __('Add New Member', 'asalah'),
        'edit_item' => __('Edit Member', 'asalah'),
        'new_item' => __('New Member', 'asalah'),
        'view_item' => __('View Member', 'asalah'),
        'search_items' => __('Search Member', 'asalah'),
        'not_found' => __('No Members found', 'asalah'),
        'not_found_in_trash' => __('No members found in Trash', 'asalah'),
        'parent_item_colon' => '',
        'menu_name' => 'Team Members'
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
        'exclude_from_search' => false,
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions')
    );
    // We call this function to register the custom post type  
    register_post_type('team', $args);

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
    register_taxonomy('branch', array('team'), array(
        'hierarchical' => true, // define whether to use a system like tags or categories  
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'tag-team'),
    ));
}

/* --- Custom Messages - project_updated_messages --- */
add_filter('post_updated_messages', 'team_updated_messages');

function team_updated_messages($messages) {
    global $post, $post_ID;
    $messages['team'] = array(
        0 => '', // Unused. Messages start at index 1.  
        1 => sprintf(__('Member updated. <a href="%s">View member</a>'), esc_url(get_permalink($post_ID))),
        2 => __('Custom field updated.', 'asalah'),
        3 => __('Custom field deleted.', 'asalah'),
        4 => __('Member updated.', 'asalah'),
        /* translators: %s: date and time of the revision */
        5 => isset($_GET['revision']) ? sprintf(__('Member restored to revision from %s', 'asalah'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
        6 => sprintf(__('Member published. <a href="%s">View member</a>'), esc_url(get_permalink($post_ID))),
        7 => __('Member saved.', 'asalah'),
        8 => sprintf(__('Member submitted. <a target="_blank" href="%s">Preview member</a>'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
        9 => sprintf(__('Member scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview member</a>'),
                // translators: Publish box date format, see http://php.net/date  
                date_i18n(__('M j, Y @ G:i', 'asalah'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
        10 => sprintf(__('Member draft updated. <a target="_blank" href="%s">Preview member</a>'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
    );
    return $messages;
}

/* --- #end SECTION - project_updated_messages --- */

function team_member_url() {
    global $post;
    $url = get_post_meta($post->ID, 'project_url', true);
    if ($url) {
        ?>
        <a href="<?php echo $url; ?>" target="_blank">Live Preview →</a>
        <?php
    }
}


function asalah_return_team_grid($num = "3", $grid = '2', $tags = '', $orderby = 'date', $exclude = '') {
    global $post;
    ?>
    <?php
    $args = array('post_type' => 'team', 'posts_per_page' => $num, 'orderby' => $orderby);

    if ($exclude == '') {
        $args = array('post_type' => 'team', 'posts_per_page' => $num, 'orderby' => $orderby);
    } else {
        $args = array('post_type' => 'team', 'posts_per_page' => $num, 'orderby' => $orderby, 'post__not_in' => array($exclude));
    }

    if ($tags != '') {
        $args['tag-team'] = $tags;
    }
    $wp_query = new WP_Query($args);
    ?>
    <?php
    // use $post num to count the current post in the row
    // and use $intros to posts details to array and use it to output intros
    // after 3 posts alrady returned
    $postnum = 0;
    $intros = array();
    $output = '';
    if ($wp_query->have_posts()) :
        ?>

        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <?php
            // when start loob count the current post by adding 1 top $postnum
            $postnum++;
            ?>

            <!-- then check if this is the first post in the row, if sow open the div tag for row -->
            <?php
            if ($postnum == 1) {
                $output .= '<div class="row team_grid_row"><div class="col-md-12 team_grid_column"><div class="team_grid_column_inner"><div class="row team_grid_row_inner">';
                
            }
            
            $grid_class = '6';
            if ($grid == '1') {
            $grid_class = '12';
            }
            ?>
	
            <!-- then add the current post thumbnail with proper rel to use in jquery intro sliding -->
            <?php
            // add view and view-tenth classes to project_thumbnail to activate hover effect, and uncomment mask below the end of </a>
            $output .= '<div class="col-md-'.$grid_class.' team_member_item ">';
	            $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
	            $output .= '<div class="team_thumbnail">';
	            	$output .= get_the_post_thumbnail($post->ID, "team");
	            $output .= '</div>';
	            
	            
	            $output .= '<div class="team_member_info">';
	                $output .= '<h2>'.get_the_title().'</h2>';
	                if (asalah_post_option("asalah_member_position")) {
	                	$output .= '<span class="team_member_position">- '.asalah_post_option("asalah_member_position").'</span>';
	                }
	                
	                $output .= '<div class="team_member_social">';
	                	if (asalah_post_option("asalah_member_fb")) {
	                		$output .= '<a href="'.asalah_post_option("asalah_member_fb").'"><i class="fa fa-facebook"></i></a>';
	                	}
	                	
	                	if (asalah_post_option("asalah_member_twitter")) {
	                		$output .= '<a href="'.asalah_post_option("asalah_member_twitter").'"><i class="fa fa-twitter"></i></a>';
	                	}
	                $output .= '</div>';
	                
	                $output .= '<div class="team_member_skills">';
	                
	                if (asalah_post_option("asalah_member_skill1") && asalah_post_option("asalah_member_skill1_percent")) {
	                
		                $output .= '<span class="skill_title meta_title">' . asalah_post_option("asalah_member_skill1") . ' - ' . asalah_post_option("asalah_member_skill1_percent") . '% </span>';
		                $output .= '<div class="progress">';
		                $output .= '<div class="progress-bar" role="progressbar" aria-valuenow="' . asalah_post_option("asalah_member_skill1_percent") . '" aria-valuemin="0" aria-valuemax="100" style="width: ' . asalah_post_option("asalah_member_skill1_percent") . '%;"></div>';
		                $output .= '</div>';
	                
	                }
	                
	                if (asalah_post_option("asalah_member_skill2") && asalah_post_option("asalah_member_skill2_percent")) {
	                
	                    $output .= '<span class="skill_title meta_title">' . asalah_post_option("asalah_member_skill2") . ' - ' . asalah_post_option("asalah_member_skill2_percent") . '% </span>';
	                    $output .= '<div class="progress">';
	                    $output .= '<div class="progress-bar" role="progressbar" aria-valuenow="' . asalah_post_option("asalah_member_skill2_percent") . '" aria-valuemin="0" aria-valuemax="100" style="width: ' . asalah_post_option("asalah_member_skill2_percent") . '%;"></div>';
	                    $output .= '</div>';
	                
	                }
	                
	                if (asalah_post_option("asalah_member_skill3") && asalah_post_option("asalah_member_skill3_percent")) {
	                
	                    $output .= '<span class="skill_title meta_title">' . asalah_post_option("asalah_member_skill3") . ' - ' . asalah_post_option("asalah_member_skill3_percent") . '% </span>';
	                    $output .= '<div class="progress">';
	                    $output .= '<div class="progress-bar" role="progressbar" aria-valuenow="' . asalah_post_option("asalah_member_skill3_percent") . '" aria-valuemin="0" aria-valuemax="100" style="width: ' . asalah_post_option("asalah_member_skill3_percent") . '%;"></div>';
	                    $output .= '</div>';
	                
	                }
	                
	                $output .= '</div>';
	                
	                
	            $output .= '</div>';
	            $output .= '</div>';
            ?>

            <!-- 
            check if 3 posts already returned in the current row
            or all posts in the currentd page has been returned.
            if no repeat the loob again till it
            return 3 posts, if yes use the $intros array to 
            output 3 intros of the the last 3 posts in the row 
            -->
            <?php if ($postnum == $grid || ($wp_query->post_count - $wp_query->current_post == 1)) { ?>
                <?php 

                $output .= '</div></div></div></div>'; // close the portfolio_grid_row if 3 posts already returned or all posts returned
                // and set post postnum to 0 and reset array so we can start another row in the next loob
                $postnum = 0;
                $intros = array();
                ?>
            <?php } ?>
        <?php endwhile; ?>


    <?php endif; ?>
    <?php
    return $output;
}
?>