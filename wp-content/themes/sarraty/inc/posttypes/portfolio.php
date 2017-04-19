<?php
add_action('init', 'portfolio_init');
/* SECTION - project_custom_init */

function portfolio_init() {
    $labels = array(
        'name' => _x('Projects', 'post type general name', 'asalah'),
        'singular_name' => _x('Project', 'post type singular name', 'asalah'),
        'add_new' => _x('Add New', 'project', 'asalah'),
        'add_new_item' => __('Add New Project', 'asalah'),
        'edit_item' => __('Edit Project', 'asalah'),
        'new_item' => __('New Project', 'asalah'),
        'view_item' => __('View Project', 'asalah'),
        'search_items' => __('Search Projects', 'asalah'),
        'not_found' => __('No projects found', 'asalah'),
        'not_found_in_trash' => __('No projects found in Trash', 'asalah'),
        'parent_item_colon' => '',
        'menu_name' => 'Portfolio'
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
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions', 'post-formats')
    );
    // We call this function to register the custom post type  
    register_post_type('project', $args);

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
    register_taxonomy('tagportfolio', array('project'), array(
        'hierarchical' => true, // define whether to use a system like tags or categories  
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'tag-portfolio'),
    ));
}

/* --- Custom Messages - project_updated_messages --- */
add_filter('post_updated_messages', 'project_updated_messages');

function project_updated_messages($messages) {
    global $post, $post_ID;
    $messages['project'] = array(
        0 => '', // Unused. Messages start at index 1.  
        1 => sprintf(__('Project updated. <a href="%s">View project</a>'), esc_url(get_permalink($post_ID))),
        2 => __('Custom field updated.', 'asalah'),
        3 => __('Custom field deleted.', 'asalah'),
        4 => __('Project updated.', 'asalah'),
        /* translators: %s: date and time of the revision */
        5 => isset($_GET['revision']) ? sprintf(__('Project restored to revision from %s', 'asalah'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
        6 => sprintf(__('Project published. <a href="%s">View project</a>'), esc_url(get_permalink($post_ID))),
        7 => __('Project saved.', 'asalah'),
        8 => sprintf(__('Project submitted. <a target="_blank" href="%s">Preview project</a>'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
        9 => sprintf(__('Project scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview project</a>'),
                // translators: Publish box date format, see http://php.net/date  
                date_i18n(__('M j, Y @ G:i', 'asalah'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
        10 => sprintf(__('Project draft updated. <a target="_blank" href="%s">Preview project</a>'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
    );
    return $messages;
}

/* --- #end SECTION - project_updated_messages --- */

function project_url() {
    global $post;
    $url = get_post_meta($post->ID, 'project_url', true);
    if ($url) {
        ?>
        <a href="<?php echo $url; ?>" target="_blank">Live Preview →</a>
        <?php
    }
}

function asalah_portfolio_tag() {
    global $post;
    $terms = get_the_terms($post->ID, 'tagportfolio');
    if ($terms && !is_wp_error($terms)) :
        $links = array();
        foreach ($terms as $term) {
            $links[] = "portfoliotagfilter-" . $term->name;
        }
        $links = str_replace(' ', '-', $links);
        $tax = join(" ", $links);
    else :
        $tax = '';
    endif;
    return strtolower($tax);
}

function asalah_portfolio_tag_list() {
    $terms = get_terms("tagportfolio");
    $count = count($terms);

    echo '<ul>';
    echo '<li><a class="filter_link" href="#filter" rel="portfoliotagfilterall">Show all</a></li>';
    if ($count > 0) {
        foreach ($terms as $term) {
            $termname = strtolower($term->name);
            $termname = str_replace(' ', '-', $termname);
            $termname = "portfoliotagfilter-" . $termname;
            echo '<li><a class="filter_link" href="#filter" rel="' . $termname . '">' . $term->name . '</a></li>';
        }
    }
    echo "</ul>";
}

function asalah_portfolio_tag_list_filter() {
    $terms = get_terms("tagportfolio");  
    $count = count($terms); 
    
    echo '<ul id="filters" class="option-set nav" data-option-key="filter">';  
    echo '<li class="active"><a href="#filter" data-option-value="*">';
    _e('Show All', 'asalah');
    echo '</a></li>';  
        if ( $count > 0 )  
        {  
            foreach ( $terms as $term ) {
                $termname = strtolower($term->name);  
                $termname = str_replace(' ', '-', $termname);
    			$termname =  "portfoliotagfilter-".$termname;   
    			echo '<li><a href="#filter" data-option-value=".'.$termname.'">'.$term->name.'</a></li>'; 
            }  
        }  
    echo "</ul>";
}

function asalah_portfolio_tag_list_url() {
    $terms = get_terms("tagportfolio");
    $count = count($terms);

    echo '<ul>';
    if (asalah_option('asalah_portfolio_url')) {
        echo '<li><a class="filter_link_visit" href="'.asalah_option('asalah_portfolio_url').'">Show all</a></li>';
    }
    if ($count > 0) {
        foreach ($terms as $term) {
            $term_link = get_term_link($term, 'species');
            $termname = strtolower($term->name);
            $termname = str_replace(' ', '-', $termname);
            $termname = "portfoliotagfilter-" . $termname;
            echo '<li><a class="filter_link_visit" href="' . $term_link . '" >' . $term->name . '</a></li>';
        }
    }
    echo "</ul>";
}

function asalah_return_portfolio_tag_list() {
    $terms = get_terms("tagportfolio");
    $count = count($terms);
    $output = '';

    $output .= '<ul>';
    $output .= '<li><a class="filter_link" href="#filter" rel="*">show all</a></li>';
    if ($count > 0) {
        foreach ($terms as $term) {
            $termname = strtolower($term->name);
            $termname = str_replace(' ', '-', $termname);
            $termname = "portfoliotagfilter-" . $termname;
            $output .= '<li><a class="filter_link" href="#filter" rel="' . $termname . '">' . $term->name . '</a></li>';
        }
    }
    $output .= "</ul>";

    return $output;
}

function asalah_portfolio_grid($num = "3", $orderby = 'date', $thumb_class = '', $tags) {
    global $post;
    ?>
    <?php
    $args = array('post_type' => 'project', 'posts_per_page' => $num, 'orderby' => $orderby);
    if ($tags != '') {
        $args['tagportfolio'] = $tags;
    }
    $wp_query = new WP_Query($args);
    ?>
    <?php
    // use $post num to count the current post in the row
    // and use $intros to posts details to array and use it to output intros
    // after 3 posts alrady returned
    $postnum = 0;
    $intros = array();

    if ($wp_query->have_posts()) :
        ?>

        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <?php
            // when start loob count the current post by adding 1 top $postnum
            $postnum++;
            ?>

            <!-- then check if this is the first post in the row, if sow open the div tag for row -->
            <?php if ($postnum == 1) { ?>    
                <div class="row portfolio_grid_row">
                <?php } ?>

                <!-- then add the current post thumbnail with proper rel to use in jquery intro sliding -->
                <div class="col-md-4 col-xs-4 project_thumbnail portfoliotagfilterall <?php echo $thumb_class; ?> <?php echo asalah_portfolio_tag(); ?>">
                    <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
                    <a rel="project_thumbnail_<?php echo $post->ID ?>" href="<?php echo get_permalink(); ?>"  class="thumbnail"><?php the_post_thumbnail('portfolio'); ?></a>
                </div>
                <?php
                // add post title, excerpt, permalink, postnum in current row, and post order in current display
                // to use it after showing 3 posts in the row
                // we use postnum and current_post to set the class of intro column
                $intros[] = array(
                    $post->ID,
                    get_the_title(),
                    excerpt(100),
                    get_permalink(),
                    $postnum,
                    $wp_query->current_post,
                    asalah_portfolio_tag()
                );
                ?>

                <!-- 
                check if 3 posts already returned in the current row
                or all posts in the currentd page has been returned.
                if no repeat the loob again till it
                return 3 posts, if yes use the $intros array to 
                output 3 intros of the the last 3 posts in the row 
                -->
                <?php if ($postnum == 3 || ($wp_query->post_count - $wp_query->current_post == 1)) { ?>
                    <?php foreach ($intros as $intro) { ?>
                        <?php
                        // set $intro_col_class variable to use at as the class for current intro
                        $intro_col_class = "";
                        if ($intro[4] == 1) {
                            $intro_col_class = "first_col";
                        } elseif ($intro[4] == 2) {
                            $intro_col_class = "second_col";
                        } elseif ($intro[4] == 3) {
                            $intro_col_class = "third_col";
                        }

                        // then check if the current post of display is not the first post 
                        // and add class hidden, only the intro of first post on page is
                        // is visible on page load
                        if ($intro[5] != 0) {
                            $intro_col_class .= " hidden";
                        }
                        ?>
                        <div id="project_thumbnail_<?php echo $intro[0]; ?>" class="col-md-12 project_intro_loader  <?php echo $intro[6]; ?> <?php echo $intro_col_class; ?> clearfix">
                            <div class="portfolio_intro_container">
                                <h4 class="title project_title"><?php echo $intro[1]; ?></h4>
                                <p><?php echo $intro[2] ?></p>
                                <a class="blog_post_readmore_link" href="<?php echo $intro[3]; ?>"><?php _e("View more ...", "asalah") ?></a>
                            </div>
                        </div>
                    <?php } ?>

                </div><!-- close the portfolio_grid_row if 3 posts already returned or all posts returned -->
                <?php
                // and set post postnum to 0 and reset array so we can start another row in the next loob
                $postnum = 0;
                $intros = array();
                ?>
            <?php } ?>
        <?php endwhile; ?>


    <?php endif; ?>
    <?php
}

function asalah_return_portfolio_grid($num = "3", $orderby = 'date', $thumb_class = '', $tags = '', $exclude = '') {
    global $post;
    ?>
    <?php
    $args = array('post_type' => 'project', 'posts_per_page' => $num, 'orderby' => $orderby);

    if ($exclude == '') {
        $args = array('post_type' => 'project', 'posts_per_page' => $num, 'orderby' => $orderby);
    } else {
        $args = array('post_type' => 'project', 'posts_per_page' => $num, 'orderby' => $orderby, 'post__not_in' => array($exclude));
    }

    if ($tags != '') {
        $args['tagportfolio'] = $tags;
    }
    $wp_query = new WP_Query($args);
	/*print_r($wp_query);*/
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
                $output .= '<div class="row portfolio_grid_row">';
            }
            ?>

            <!-- then add the current post thumbnail with proper rel to use in jquery intro sliding -->
            <?php
            // add view and view-tenth classes to project_thumbnail to activate hover effect, and uncomment mask below the end of </a>
            $output .= '<div class="col-md-4 col-xs-4 project_thumbnail portfoliotagfilterall ' . $thumb_class . ' ' . asalah_portfolio_tag() . '">';
            $output .= '<div class="shadow_mask">';
            
            $output .= '<a rel="project_thumbnail_' . $post->ID . '" href="' . get_permalink() . '"  class="thumbnail_mask">';
            $output .= '<div class="shadow_mask_inner"></div><i class="fa fa-search"></i>';
            $output .= '</a>';
            
            $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
            $output .= '<a rel="project_thumbnail_' . $post->ID . '" href="' . get_permalink() . '"  class="thumbnail">';
            $output .= get_the_post_thumbnail($post->ID, "portfolio");
            $output .= '</a>';
            $output .= '</div>';
            
            
//            $output .= '<div class="mask"><div class="mask_inside clearfix">
//                <h2>Hover Style #10</h2>
//                <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
//                <a href="#" class="info">Read More</a>
//            </div></div>';
            $output .= '</div>';
            // add post title, excerpt, permalink, postnum in current row, and post order in current display
            // to use it after showing 3 posts in the row
            // we use postnum and current_post to set the class of intro column
            $intros[] = array(
                $post->ID,
                get_the_title(),
                excerpt(100),
                get_permalink(),
                $postnum,
                $wp_query->current_post,
                asalah_portfolio_tag()
            );
            ?>

            <!-- 
            check if 3 posts already returned in the current row
            or all posts in the currentd page has been returned.
            if no repeat the loob again till it
            return 3 posts, if yes use the $intros array to 
            output 3 intros of the the last 3 posts in the row 
            -->
            <?php if ($postnum == 3 || ($wp_query->post_count - $wp_query->current_post == 1)) { ?>
                <?php foreach ($intros as $intro) { ?>
                    <?php
                    // set $intro_col_class variable to use at as the class for current intro
                    $intro_col_class = "";
                    if ($intro[4] == 1) {
                        $intro_col_class = "first_col";
                    } elseif ($intro[4] == 2) {
                        $intro_col_class = "second_col";
                    } elseif ($intro[4] == 3) {
                        $intro_col_class = "third_col";
                    }

                    // then check if the current post of display is not the first post 
                    // and add class hidden, only the intro of first post on page is
                    // is visible on page load
                    if ($intro[5] != 0) {
                        $intro_col_class .= " hidden";
                    }
                    $output .= '<div id="project_thumbnail_' . $intro[0] . '" class="col-md-12 project_intro_loader  ' . $intro[6] . ' ' . $intro_col_class . ' clearfix">';
                    $output .= '<div class="portfolio_intro_container">';
                    $output .= '<h4 class="title project_title">' . $intro[1] . '</h4>';
                    $output .= '<p>' . $intro[2] . '</p>';
                    $output .= '<a class="blog_post_readmore_link" href="' . $intro[3] . '">' . __("View more ...", "asalah") . '</a>';
                    $output .= '</div>';
                    $output .= '</div>';
                }

                $output .= '</div>'; // close the portfolio_grid_row if 3 posts already returned or all posts returned
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


function asalah_return_portfolio_grid_hovereffect($num = "3", $orderby = 'date', $thumb_class = '', $tags = '', $exclude = '') {
    
    
    	global $post;
    	    ?>
    	    <?php
    	    $args = array('post_type' => 'project', 'posts_per_page' => $num, 'orderby' => $orderby);
    	
    	    if ($exclude == '') {
    	        $args = array('post_type' => 'project', 'posts_per_page' => $num, 'orderby' => $orderby);
    	    } else {
    	        $args = array('post_type' => 'project', 'posts_per_page' => $num, 'orderby' => $orderby, 'post__not_in' => array($exclude));
    	    }
    	
    	    if ($tags != '') {
    	        $args['tagportfolio'] = $tags;
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
    			<?php $output .= '<div class="project_carousel project_carousel_boxed owl-carousel owl-theme">'; ?>
    	        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
    	            <?php
    	            $tags_list = get_the_term_list($post->ID, 'tagportfolio', '', ', ', '');
    	            $output .= '<div class="portfolio_element modern_project_thumbnail project_thumbnail ' . $thumb_class . ' ' . asalah_portfolio_tag() . '">';
    	            	$output .= '<a href="' . get_permalink() . '"><figure class="portfolio_figure">';
    	//            			$output .= "<a class='portfolio_figure_url' href='". get_permalink() ."'><i class='icon-link'></i></a>";
    			            $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
    			            $output .= get_the_post_thumbnail($post->ID, "portfolio", array('class' => 'portfolio_thumbnail'));
    		            
    		            
    		            $output .= '<figcaption class="portfolio_caption"><div class="caption_content clearfix">
    		                <h4><a href="' . get_permalink() . '">'.get_the_title().'</a></h4>';
    		                if ($tags_list != '') {
    		                $output .= '<div class="project_figure_tags">'.get_the_term_list($post->ID, 'tagportfolio', '', ', ', '').'</div>';
    		                }
    		            $output .= '</div></figcaption>';
    		            
    		            $output .= '</figure></a>';
    		            		
    	            $output .= '</div>';
    	            ?>
    	        <?php endwhile; ?>
    			<?php $output .= '</div>'; ?>
    			
    	
    	    <?php endif; ?>
    	    <?php
    	    return $output;
        
}

function asalah_return_portfolio_carousel($num = "3", $orderby = 'date', $thumb_class = '', $tags = '', $exclude = '', $car_id = '') {


	global $post;
    ?>
    <?php
    $args = array('post_type' => 'project', 'posts_per_page' => $num, 'orderby' => $orderby);

    if ($exclude == '') {
        $args = array('post_type' => 'project', 'posts_per_page' => $num, 'orderby' => $orderby);
    } else {
        $args = array('post_type' => 'project', 'posts_per_page' => $num, 'orderby' => $orderby, 'post__not_in' => array($exclude));
    }

    if ($tags != '') {
        $args['tagportfolio'] = $tags;
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
		<?php $output .= '<div class="project_carousel project_carousel_wide owl-carousel owl-theme">'; ?>
        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <?php
            $tags_list = get_the_term_list($post->ID, 'tagportfolio', '', ', ', '');
            
            $output .= '<div class="item project_thumbnail ' . $thumb_class . ' ' . asalah_portfolio_tag() . '">';
            	$output .= '<a href="' . get_permalink() . '"><figure class="portfolio_figure">';
//            		$output .= "<a class='portfolio_figure_url' href='". get_permalink() ."'><i class='icon-link'></i></a>";
		            $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
		            $output .= get_the_post_thumbnail($post->ID, "portfolio", array('class' => 'portfolio_thumbnail'));
	            
	            
	            $output .= '<figcaption class="portfolio_caption"><div class="caption_content clearfix">
	                <h4><a href="' . get_permalink() . '">'.get_the_title().'</a></h4>';
	                if ($tags_list != '') {
	                $output .= '<div class="project_figure_tags">'.get_the_term_list($post->ID, 'tagportfolio', '', ', ', '').'</div>';
	                }
	            $output .= '</div></figcaption>';
	            
	            $output .= '</figure></a>';
	            		
	                
            $output .= '</div>';
            ?>
        <?php endwhile; ?>
		<?php $output .= '</div>'; ?>
		

    <?php endif; ?>
    <?php
    return $output;
}
?>