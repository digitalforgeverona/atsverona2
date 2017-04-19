<?php
add_action('widgets_init', 'project_widget_init');

function project_widget_init() {
    register_widget('project_widget');
}

class project_widget extends WP_Widget {

    function project_widget() {
        $widget_ops = array('classname' => 'project-widget', 'description' => '');
        $control_ops = array('width' => 250, 'height' => 350, 'id_base' => 'project-widget');
        $this->WP_Widget('project-widget', theme_name . ' - Project', $widget_ops, $control_ops);
    }

    function widget($args, $instance) {
        extract($args);
        global $post;
        $title = apply_filters('widget_title', $instance['title']);
        $order = $instance['order'];
        $tags = $instance['tags'];

        echo $before_widget;

        if ($title) :
            echo $before_title;
            echo $title;
            echo $after_title;
        endif;
        ?>
        <?php
        $args = array('post_type' => 'project', 'posts_per_page' => 1, 'orderby' => $order);
        if ($tags != '') {
            $args['tagportfolio'] = $tags;
        }
        $wp_query = new WP_Query($args);
        $output = '';
        if ($wp_query->have_posts()) :
            while ($wp_query->have_posts()) : $wp_query->the_post();
                
                $output .= '<div class="row">';
                    $output .= '<div class="col-md-12 project_thumbnail">';
                    $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                    $output .= '<a rel="project_thumbnail_' . $post->ID . '" href="' . get_permalink() . '"  class="thumbnail">';
                    $output .= get_the_post_thumbnail($post->ID, "portfolio");
                    $output .= '</a>';
                    $output .= '</div>';
                    
                    $output .= '<div class="col-md-12 project_intro_loader clearfix">';
                    $output .= '<div class="portfolio_intro_container">';
                    $output .= '<h4 class="title project_title">' . get_the_title() . '</h4>';
                    $output .= '<p>' . excerpt(12) . '</p>';
                    $output .= '<a class="blog_post_readmore_link" href="' . get_permalink() . '">' . __("View more ...", "asalah") . '</a>';
                    $output .= '</div>';
                    $output .= '</div>';
                
                $output .= '</div>';
                
                echo $output;
            endwhile;
        endif;
        ?>
        <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['thumbnail'] = $new_instance['thumbnail'];
        $instance['number'] = $new_instance['number'];
        $instance['order'] = $new_instance['order'];
        $instance['tags'] = $new_instance['tags'];
        return $instance;
    }

    function form($instance) {
        $defaults = array('title' => __('Project', 'asalah'));
        $instance = wp_parse_args((array) $instance, $defaults);
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'asalah'); ?>: </label>
            <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('order'); ?>"><?php _e('Post Order', 'asalah'); ?>: </label>
            <select id="<?php echo $this->get_field_id('order'); ?>" name="<?php echo $this->get_field_name('order'); ?>" >
                <option value="date" <?php
                if ($instance['order'] == 'date')
                    echo "selected=\"selected\"";
                else
                    echo "";
                ?>><?php _e('Date', 'asalah'); ?></option>
                <option value="rand" <?php
        if ($instance['order'] == 'rand')
            echo "selected=\"selected\"";
        else
            echo "";
        ?>><?php _e('Random', 'asalah'); ?></option>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('tags'); ?>"><?php _e('Tags', 'asalah'); ?>: </label>
            <input id="<?php echo $this->get_field_id('tags'); ?>" name="<?php echo $this->get_field_name('tags'); ?>" value="<?php echo $instance['tags']; ?>" class="widefat" type="text" />
        </p>
        <?php
    }

}
?>