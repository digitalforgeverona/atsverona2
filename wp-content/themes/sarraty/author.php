<?php
get_header();

if (get_query_var('author_name')) :
    $curauth = get_user_by('slug', get_query_var('author_name'));
else :
    $curauth = get_userdata(get_query_var('author'));
endif;
?>
<!-- start site content -->
<div class="site_content">

    <?php if (asalah_option("asalah_enable_pagetitle")): ?>
        <div class="page_title_holder clearfix">
            <div class="container">
                <div class="page_info">

                    <h1 class="title"><?php echo __("All posts by: ", "asalah") . $curauth->display_name; ?></h1>

                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-9 main_content">
                <?php if (have_posts()) : ?>
                    <!-- if page title is not enabled add secondary page title here -->
                    <?php if (!asalah_option("asalah_enable_pagetitle")): ?>
                        <h1 class="title secondary_page_title"><?php echo __("All posts by: ", "asalah") . $curauth->display_name; ?></h1>
                    <?php endif; ?>
                    <!-- endif for checking if page title is not enabled -->

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