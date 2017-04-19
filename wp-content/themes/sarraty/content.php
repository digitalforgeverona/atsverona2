<article class="clearfix blog_post">

    <!-- header appears only if post format not set to standard -->
    <?php if (get_post_format() != ""): ?>
        <header class="post_banner blog_post_banner blog_post_image_banner indicator_seperator">
            <?php asalah_blog_post_banner(); ?>
        </header>
    <?php endif; ?>

    <div class="blog_post_body clearfix">

        <div class="blog_post_labels">
            <?php
            /* get post icon */
            
            // if the current page is page don't show post type
            if (!is_page()) {
                asalah_post_icon_label();
            }

            /* get post date label */
            asalah_post_date_label();
            ?>


            <?php
            if (is_single() || is_page()) {
                asalah_post_share();
            }
            ?>
        </div>

        <div class="blog_post_info content_container">
            <?php if (is_single() || is_page()) : ?>
                <?php if (asalah_post_option("asalah_post_title") != 'hide'): ?>
                <h2 class="title blog_post_title"><?php the_title(); ?></h2>
                <?php endif; ?>
            <?php else : ?>
            	<?php if (get_the_title()): ?>
                <h2 class="title blog_post_title">
                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                </h2>
                <?php else: ?>
                <h2 class="title blog_post_title">
                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php _e("Go to post", "asalah"); ?></a>
                </h2>
                <?php endif; ?>
            <?php endif; // is_single() ?>
			
			
			<?php if ((asalah_post_option("asalah_meta_info") == "show") || (asalah_option("asalah_meta_info") && asalah_post_option("asalah_meta_info") != "hide")): ?>
            <div class="blog_post_meta_bar clearfix">
                <?php asalah_post_meta_info(); ?> 
            </div>
            <?php endif; ?>
            
            <!-- if current page is single or page show content, else show only excerpt. -->
            <?php if (is_single() || is_page()) : ?>
            	<div class="post_content">
                <?php the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'asalah')); ?>
                <?php wp_link_pages(array('before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'asalah') . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>')); ?>
                </div>
            <?php
            else:
                echo excerpt(100);
            endif;
            
            if (is_single() || is_page()) {
                wp_reset_query();
            }
            ?>

            <?php if ((asalah_post_option("asalah_post_tags") == "show") || (asalah_option("asalah_post_tags") && asalah_post_option("asalah_post_tags") != "hide")): ?>
                <div class="tagcloud clearfix"><?php the_tags("", "", ""); ?></div>
<?php endif; ?>
                
    <!-- reset query after showing content and content info in case of post or page -->
    <?php if (is_single() || is_page()) { wp_reset_query(); } ?>
        </div>
        
    </div>
    

    <?php
    if (is_single() || is_page()):
        asalah_author_box();
        if ((asalah_post_option("asalah_post_comments") == "show") || (asalah_option("asalah_enable_comments") && asalah_post_option("asalah_post_comments") != "hide")) {
            comments_template();
        }
    endif;
    ?>
</article>