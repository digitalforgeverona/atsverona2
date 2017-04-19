<?php
get_header();
?>
<!-- start site content -->
<div class="site_content">
    <div class="page_title_holder clearfix">
        <div class="container">
            <div class="page_info">
                <h1 class="title"><?php echo esc_attr(get_bloginfo('name', 'display')); ?></h1>

            </div>
            <div class="page_nav">
                <nav class="breadcrumb"><a href="#"><?php _e('Home', 'asalah') ?></a></nav>		
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9 main_content">
                <?php if (have_posts()) : ?>

                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('content', get_post_format()); ?>
                    <?php endwhile; ?>
                    <?php asalah_bootstrap_pagination(); ?>
                <?php else : ?>
                    <?php get_template_part('content', 'none'); ?>
                <?php endif; ?>
            </div>
            
            <div class="side_content col-md-3">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>