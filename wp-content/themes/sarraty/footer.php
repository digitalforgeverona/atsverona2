</div><!-- site content div close, open tag in the end of header.php file -->

<!-- start footer -->
<?php if (!asalah_option('asalah_hide_footer')): ?>
<footer class="site_footer <?php if (asalah_option("asalah_dark_footer")) {
    echo "dark_site_footer";
} ?>">
    <!-- start first footer widgets area -->
    <?php if (!asalah_option('asalah_hide_footer1')): ?>
    <div class="first_footer_wrapper">
    <div class="container">
        <div class="first_footer">
            <div class="row">
<?php get_sidebar('footer'); ?>
            </div>
        </div>

    </div>
    </div>
    <?php endif; ?>
    <!-- end first footer widget area -->


    <!-- start second footer -->
    <?php if (!asalah_option('asalah_hide_footer2')): ?>
    <div class="second_footer_wrapper">
    <div class="container">
        <div class="second_footer clearfix">
        	
        	<?php if (asalah_option("asalah_footer_language") == true): ?>
        	<?php do_action('icl_language_selector'); ?>
        	<?php endif; ?>
        	
            <div class="credits pull-left">
                <?php if (asalah_option("asalah_credits_image") == true): ?>
                    <span class="credits_logo"><img src="<?php echo asalah_option("asalah_credits_image"); ?>"  <?php if (asalah_option('asalah_credits_image_w') && asalah_option('asalah_credits_image_w') !== 0) { ?>width="<?php echo asalah_option("asalah_credits_image_w") ?>" <?php } if (asalah_option('asalah_credits_image_h') && asalah_option('asalah_credits_image_h') !== 0) { ?> height="<?php echo asalah_option("asalah_credits_image_h") ?>" <?php } ?> /></span> 
<?php endif ?>
            <?php echo asalah_option("asalah_credits_text"); ?>
            </div>

                <?php if (asalah_option("asalah_footer_social")): ?>

                <div class="footer_social pull-right">
                    <?php
                    $header_footer_skin = asalah_option("asalah_footer_social_skin");
                    ?>
                <?php echo asalah_social_icons_list($header_footer_skin); ?>
                </div>
                <?php else: ?>
                <!-- start main navbar -->
                <nav class="footer_navbar navbar pull-right navbar-default" role="navigation">
                    <?php
                    wp_nav_menu(array(
                        'container' => 'div',
                        'container_class' => '',
                        'theme_location' => 'footermenu',
                        'menu_class' => 'nav navbar-nav',
                        'fallback_cb' => '',
                        'walker' => new wp_bootstrap_navwalker(),
                    ));
                    ?>
                </nav>
                <!-- end main navbar -->
<?php endif; ?>
        </div>
    </div>
    </div>
    <?php endif; ?>
    <!-- end second footer -->

    <!-- scroll to top icon -->
<?php if (asalah_option('asalah_scroll_totop')): ?>
        <div id="gototop" title="<?php _e('Scroll To Top', 'asalah'); ?>" class="gototop  pull-right">
            <i class="fa fa-chevron-up"></i>
        </div>
<?php endif; ?>
    
    <?php if (asalah_option('asalah_color_switcher')): ?>
    <div class="style_switcher_control closed_switcher">
        <i class="fa fa-cogs"></i>
    </div>
    <div class="style_switcher closed_switcher" id="color-switcher" data-uri="<?php echo get_template_directory_uri(); ?>/switcher/actions/color.php">
        <h5>Color examples</h5>
        <div class="asalah_color_switcher_container clearfix switcher_section">
            

            <a class="asalah_color_switcher" name="a3c95c" style="width:28px;height: 30px;display: block;background-color:#a3c95c"></a>
            
            <a class="asalah_color_switcher" name="db325f" style="width:28px;height: 30px;display: block;background-color:#db325f"></a>

            <a class="asalah_color_switcher" name="c1951b" style="width:28px;height: 30px;display: block;background-color:#c1951b"></a>

            <a class="asalah_color_switcher" name="288be0" style="width:28px;height: 30px;display: block;background-color:#288be0"></a>

            <a class="asalah_color_switcher" name="EE552F" style="width:28px;height: 30px;display: block;background-color:#EE552F"></a>

            <a class="asalah_color_switcher" name="43D1D1" style="width:28px;height: 30px;display: block;background-color:#43D1D1"></a>

            <a class="asalah_color_switcher" name="0a9cc1" style="width:28px;height: 30px;display: block;background-color:#0a9cc1"></a>

            <a class="asalah_color_switcher" name="af1c4d" style="width:28px;height: 30px;display: block;background-color:#af1c4d"></a>

            <a class="asalah_color_switcher" name="20b4ea" style="width:28px;height: 30px;display: block;background-color:#20b4ea"></a>

            <a class="asalah_color_switcher" name="23dda5" style="width:28px;height: 30px;display: block;background-color:#23dda5"></a>

        </div>
        <div class="switched_style"></div>
        
        
        <h5>Layout</h5>
        <div class="asalah_layout_switcher clearfix switcher_section">
            <select class="asalah_body_layout_switcher" name="asalah_body_layout_switcher" id="asalah_body_layout_switcher">
                <option value="fluid_body">Fluid Body</option>
                <option value="boxed_body">Boxed Body</option>
                
                
                

            </select>
        </div>

        
        <h5>Choose background</h5> 
        <div class="asalah_bg_swithcer clearfix switcher_section">
        <?php
        //Background Images Reader
        $bg_images_path = get_stylesheet_directory() . '/images/bg/'; // change this to where you store your bg images
        $bg_images_url = get_template_directory_uri() . '/images/bg/'; // change this to where you store your bg images
        $bg_images = array();

        if (is_dir($bg_images_path)) {
            if ($bg_images_dir = opendir($bg_images_path)) {
                while (($bg_images_file = readdir($bg_images_dir)) !== false) {
                    if (stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
                        natsort($bg_images); //Sorts the array into a natural order
                        $bg_images[] = $bg_images_url . $bg_images_file;
                    }
                }
            }
        }
        
        foreach ($bg_images as $key => $option) {
            ?>
            <img class="asalah_html_bg_switcher" style="width:30px;height: 30px; margin-bottom: 2px;cursor: pointer;border: 1px solid #ccc;" src="<?php echo $option; ?>" />
            <?php
        }
        ?>
        </div>
    </div>
    <?php endif; ?>
</footer>
<?php endif; ?>
<!-- end footer -->

<?php if (asalah_option('asalah_footer_code')): ?>
    <?php echo asalah_option('asalah_footer_code'); ?>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>