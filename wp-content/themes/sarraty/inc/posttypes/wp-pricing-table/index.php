<?php

/*
  Plugin Name: WP Pricing Tables
  Plugin URI: -
  Description: Create Dyamic Pricing Tables for WordPress.
  Author: Rakhitha Nimesh
  Version: 1.0
  Author URI: -
 */

/*
 * Registering and saving pricing tables 
 */

add_action('init', 'wppt_register_cpt_pricing_tables');

function wppt_register_cpt_pricing_tables() {

    $labels = array(
        'name' => _x('Pricing Tables', '', 'asalah'),
        'singular_name' => _x('Pricing Table', '', 'asalah'),
        'add_new' => _x('Add New', '', 'asalah'),
        'add_new_item' => _x('Add New Pricing Table', '', 'asalah'),
        'edit_item' => _x('Edit Pricing Table', '', 'asalah'),
        'new_item' => _x('New Pricing Table', '', 'asalah'),
        'view_item' => _x('View Pricing Table', '', 'asalah'),
        'search_items' => _x('Search Pricing Tables', '', 'asalah'),
        'not_found' => _x('No Pricing Tables found', '', 'asalah'),
        'not_found_in_trash' => _x('No Pricing Tables found in Trash', '', 'asalah'),
        'parent_item_colon' => _x('Parent Pricing Table:', '', 'asalah'),
        'menu_name' => _x('Pricing Tables', '', 'asalah'),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'Pricing Tables',
        'supports' => array('title'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type('pricing_tables', $args);
}

add_action('add_meta_boxes', 'wppt_pricing_tables_meta_boxes');

function wppt_pricing_tables_meta_boxes() {

    add_meta_box("pricing-table-info", "Pricing Table Info", 'wppt_generate_pricing_table_info', "pricing_tables", "normal", "high");
}

function wppt_generate_pricing_table_info() {
    global $post;

    $table_packages = get_post_meta($post->ID, "_table_packages", true);
    $table_packages = ($table_packages == '') ? array() : json_decode($table_packages);

    $query = new WP_Query(array('post_type' => 'pricing_packages',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'post_date',
        'order' => 'ASC'
            )
    );

    $html = '<input type="hidden" name="pricing_table_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';

    $html .= '<table class="form-table">';
    $html .= "<tr><th style=''>
                    Package Status
              </th>
              <td>
                    Package Name
              </td></tr>";

    while ($query->have_posts()) : $query->the_post();
        $checked_status = (in_array($query->post->ID, $table_packages)) ? "checked" : "";

        $html .= "<tr><th style=''>
                    <input type='checkbox' name='pricing_table_packages[]' $checked_status value='" . $query->post->ID . "' />
              </th><td>" . $query->post->post_title . "
              </td></tr>";

    endwhile;

    $html .= '</table>';

    echo $html;
}

add_action('save_post', 'wppt_save_pricing_tables');

function wppt_save_pricing_tables($post_id) {

    if (isset($_POST['pricing_table_box_nonce'])):
        if (!wp_verify_nonce($_POST['pricing_table_box_nonce'], basename(__FILE__))) {
            return $post_id;
        }
    endif;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if (isset($_POST['post_type']) && 'pricing_tables' == $_POST['post_type'] && current_user_can('edit_post', $post_id)) {

        $pricing_table_packages = (isset($_POST['pricing_table_packages']) ? $_POST['pricing_table_packages'] : array());
        $pricing_table_packages = json_encode($pricing_table_packages);

        update_post_meta($post_id, "_table_packages", $pricing_table_packages);
    } else {
        return $post_id;
    }
}

/*
 * Registering and saving pricing packages
 */

add_action('init', 'wppt_register_cpt_pricing_packages');

function wppt_register_cpt_pricing_packages() {

    $labels = array(
        'name' => _x('Pricing Packages', '', 'asalah'),
        'singular_name' => _x('Pricing Package', '', 'asalah'),
        'add_new' => _x('Add New', '', 'asalah'),
        'add_new_item' => _x('Add New Pricing Package', '', 'asalah'),
        'edit_item' => _x('Edit Pricing Package', '', 'asalah'),
        'new_item' => _x('New Pricing Package', '', 'asalah'),
        'view_item' => _x('View Pricing Package', '', 'asalah'),
        'search_items' => _x('Search Pricing Packages', '', 'asalah'),
        'not_found' => _x('No Pricing Packages found', '', 'asalah'),
        'not_found_in_trash' => _x('No Pricing Packages found in Trash', '', 'asalah'),
        'parent_item_colon' => _x('Parent Pricing Package:', '', 'asalah'),
        'menu_name' => _x('Pricing Packages', '', 'asalah'),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'Pricing Packages',
        'supports' => array('title'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type('pricing_packages', $args);
}

add_action('add_meta_boxes', 'wppt_pricing_packages_meta_boxes');

function wppt_pricing_packages_meta_boxes() {

    add_meta_box("pricing-package-info", "Pricing Package Info", 'wppt_generate_pricing_package_info', "pricing_packages", "normal", "high");
    add_meta_box("pricing-features-info", "Pricing Features", 'wppt_generate_pricing_features_info', "pricing_packages", "normal", "high");
}

function wppt_generate_pricing_package_info() {
    global $post;

    $package_price = get_post_meta($post->ID, "_package_price", true);
    $package_term = get_post_meta($post->ID, "_package_term", true);
    $package_buy_link = get_post_meta($post->ID, "_package_buy_link", true);
    $package_buy_text = get_post_meta($post->ID, "_package_buy_text", true);
    $package_recommended = get_post_meta($post->ID, "_asalah_package_recommend", true);
    $not_rec = '';
    $yes_rec = '';
    
    if ($package_recommended == 'no') {
        $not_rec = "selected='selected'";
    }elseif ($package_recommended == 'yes') {
        $yes_rec = "selected='selected'";
    }
    

    $html = '<input type="hidden" name="pricing_package_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';

    $html .= '<table class="form-table">';

    $html .= "<tr><th style=''>
                    <label for='Price'>Package Price *</label>
              </th>
              <td>
                    <input name='package_price' id='package_price' type='text' value='$package_price' />
              </td></tr>";
   

    $html .= "<tr><th style=''>
                    <label for='Price'>Package Term *</label>
              </th>
              <td>
                    <input name='package_term' id='package_term' type='text' value='$package_term' />
              </td></tr>";

    $html .= "<tr><th style=''>
                    <label for='Buy Now'>Buy Now Link *</label>
              </th>
              <td>
                    <input name='package_buy_link' id='package_buy_link' type='text' value='$package_buy_link' />
              </td></tr>";

    $html .= "<tr><th style=''>
                    <label for='Buy Now'>Buy Now Text *</label>
              </th>
              <td>
                    <input name='package_buy_text' id='package_buy_text' type='text' value='$package_buy_text' />
              </td></tr>";
    
    $html .= "<tr><th style=''>
                    <label for='Price'>Recommended Package</label>
              </th>
              <td>
                    <select name='asalah_package_recommend' id='asalah_package_recommend'>
                        <option value='no' $not_rec>No</option>
                        <option value='yes' $yes_rec>Yes</option>
                    </select>
              </td></tr>";




    $html .= "</tr>";
    $html .= '</table>';

    echo $html;
}

function wppt_generate_pricing_features_info() {

    global $post;

    $package_features = get_post_meta($post->ID, "_package_features", true);
    $package_features = ($package_features == '') ? array() : json_decode($package_features);

    $html = '';

    $html .= '<table class="form-table">';

    $html .= "<tr><th style=''>
                    <label for='Price'>Add Package Features</label>
              </th>
              <td>
                    <input name='package_feature' id='package_feature' type='text'  />
                    <input type='button' id='add_features' value='Add Features' />
              </td></tr>";

    $html .= "<tr><td>
                    <ul id='package_features_box' name='package_features_box' >";
    foreach ($package_features as $package_feature) {
        $html .= "<li><input type='hidden' name='package_features[]' value='$package_feature' />$package_feature
        <a href='javascript:void(0);'>Delete</a></li>";
    }
    $html .= "</ul>
              </td></tr>";

    $html .= '</table>';

    echo $html;
}

add_action('save_post', 'wppt_save_pricing_packages');

function wppt_save_pricing_packages($post_id) {

    if (isset($_POST['pricing_package_box_nonce'])):
        if (!wp_verify_nonce($_POST['pricing_package_box_nonce'], basename(__FILE__))) {
            return $post_id;
        }
    endif;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if (isset($_POST['post_type']) && 'pricing_packages' == $_POST['post_type'] && current_user_can('edit_post', $post_id)) {
        $package_price = (isset($_POST['package_price']) ? $_POST['package_price'] : '');
        $package_term = (isset($_POST['package_term']) ? $_POST['package_term'] : '');
        $package_buy_link = (isset($_POST['package_buy_link']) ? $_POST['package_buy_link'] : '');
        $package_buy_text = (isset($_POST['package_buy_text']) ? $_POST['package_buy_text'] : '');
        
        $package_recommended = (isset($_POST['asalah_package_recommend']) ? $_POST['asalah_package_recommend'] : '');
        $package_features = (isset($_POST['package_features']) ? $_POST['package_features'] : array());
        $package_features = json_encode($package_features);

        update_post_meta($post_id, "_package_price", $package_price);
        update_post_meta($post_id, "_package_term", $package_term);
        update_post_meta($post_id, "_package_buy_link", $package_buy_link);
        update_post_meta($post_id, "_package_buy_text", $package_buy_text);
        update_post_meta($post_id, "_asalah_package_recommend", $package_recommended);
        update_post_meta($post_id, "_package_features", $package_features);
    } else {
        return $post_id;
    }
}

/*
 * WordPress Admin Dashborad Scripts and Styles
 */

function wppt_pricing_admin_scripts() {

    wp_register_script('pricing-admin', get_template_directory_uri() . '/inc/posttypes/wp-pricing-table/js/pricing_admin.js', array('jquery'));
    wp_enqueue_script('pricing-admin');
}

add_action('admin_enqueue_scripts', 'wppt_pricing_admin_scripts');



/*
 * Pricing Table Frontend Scripts
 */

function wppt_pricing_front_scripts() {

    wp_register_style('pricing-base', get_template_directory_uri() . '/inc/posttypes/wp-pricing-table/css/base.css');
    //wp_enqueue_style('pricing-base');

    wp_register_style('pricing-layout', get_template_directory_uri() . '/inc/posttypes/wp-pricing-table/css/layout.css');
    //wp_enqueue_style('pricing-layout');

    wp_register_style('pricing-fluid-skeleton', get_template_directory_uri() . '/inc/posttypes/wp-pricing-table/css/fluid_skeleton.css');
    //wp_enqueue_style('pricing-fluid-skeleton');

    wp_register_style('pricing-table', get_template_directory_uri() . '/inc/posttypes/wp-pricing-table/css/pricing_table.css');
    // wp_enqueue_style('pricing-table');
}

add_action('wp_enqueue_scripts', 'wppt_pricing_front_scripts');


/*
 * Adding Custom Columns to Pricing Table List with Soratable Functionality
 */

add_filter('manage_edit-pricing_tables_columns', 'wppt_edit_pricing_tables_columns');

function wppt_edit_pricing_tables_columns($columns) {

    $columns = array(
        'cb' => '<input type="checkbox" />',
        'ID' => __('Pricing Table No', 'asalah'),
        'title' => __('Pricing Table Name', 'asalah'),
        'date' => __('Date', 'asalah')
    );

    return $columns;
}

add_action('manage_pricing_tables_posts_custom_column', 'wppt_manage_pricing_tables_columns', 10, 2);

function wppt_manage_pricing_tables_columns($column, $post_id) {
    global $post;

    switch ($column) {


        case 'ID' :


            $pricing_id = $post_id;


            if (empty($pricing_id))
                echo __('Unknown', 'asalah');
            else
                printf($pricing_id);

            break;


        default :
            break;
    }
}

add_filter('manage_edit-pricing_tables_sortable_columns', 'wppt_pricing_tables_sortable_columns');

function wppt_pricing_tables_sortable_columns($columns) {

    $columns['ID'] = 'ID';

    return $columns;
}

/*
 * Pricing table shortcode
 */
add_shortcode("pricing_table", "wppt_generate_pricing_table");

function wppt_generate_pricing_table($atts) {
    global $post;

    extract(shortcode_atts(array(
        'id' => '0',
        'column' => 'four',
        'style' => '1'
                    ), $atts));
    
    if ($style != 1 && $style != 2 && $style != 3) {
        $style = 1;
    }

    $pricing_id = $id;
    $table_packages = get_post_meta($pricing_id, "_table_packages", true);
    $table_packages = ($table_packages == '') ? array() : json_decode($table_packages);

    $html = '<div class="pricingcontainer style'.$style.'"><div class="row">';

    $pricing_index = 0;
    foreach ($table_packages as $table_package) {
        $pricing_index++;

        $plan_title = get_the_title($table_package);

        $package_price = get_post_meta($table_package, "_package_price", true);
        $package_term = get_post_meta($table_package, "_package_term", true);
        $package_buy_link = get_post_meta($table_package, "_package_buy_link", true);

        if (get_post_meta($table_package, "_package_buy_text", true) != '') {
            $package_buy_text = get_post_meta($table_package, "_package_buy_text", true);
        } else {
            $package_buy_text = __("Buy Now", 'asalah');
        }

        $package_features = get_post_meta($table_package, "_package_features", true);
        $package_features = ($package_features == '') ? array() : json_decode($package_features);
        $recommended_plans = "";
        if (get_post_meta($table_package, "_asalah_package_recommend", true) == "yes") {
            $recommended_plans = " recommended_package";
        }
        
        // start pricint package 
        $html .= '<div id="pricing_plan' . $pricing_index . '" class="' . $column . '  pricing_table_layout' . $recommended_plans . '">';
        
            // start column
            $html .= '<div class="columns">';
                
                // start package pricing info the class plan
                $html .= '<dl class="plans" >
                            <dd class="plan_title">
                            ' . $plan_title . '
                            </dd>
                            <dd class="plan_price">
                                <span class="the_price">' . $package_price . '</span> / ' . $package_term . '
                            </dd>
                          </dl>'; // close dl of package pricing info
                
                // start package features list with the class plan
                $html .= '<dl class="plan" id="pr' . $pricing_index . '">';
                
                // start listing features from the array $package_features
                foreach ($package_features as $package_feature) {

                    $html .= '<dd class="pricing_row plan_features">
                                <div class="feature_desc"><span class="pricinghighlight">' . $package_feature . '</span></div>
                              </dd>';
                }
                
                // start purchase now text link
                $html .= '<dd class="pricing_row plan_buy">
                            <a href="' . $package_buy_link . '" class="buy btn btn-default" >' . $package_buy_text . '</a>
                          </dd>
                          
                          </dl>'; // end package features list
                
            $html .= '</div>'; // end column
        $html .= '</div>'; // close div for pricing_table_layout
    }
    $html .= '</div></div>';

    return $html;
}
