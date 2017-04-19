<?php
get_header();
?>
<!-- start site content -->
<div class="site_content">

    <?php if (asalah_option("asalah_enable_pagetitle")): ?>
        <div class="page_title_holder clearfix">
            <div class="container">
                <div class="page_info">
                    <h1 class="title"><?php
                        if (is_day()) :
                            printf(__('Daily Archives: %s', 'asalah'), get_the_date());
                        elseif (is_month()) :
                            printf(__('Monthly Archives: %s', 'asalah'), get_the_date(_x('F Y', 'monthly archives date format', 'asalah')));
                        elseif (is_year()) :
                            printf(__('Yearly Archives: %s', 'asalah'), get_the_date(_x('Y', 'yearly archives date format', 'asalah')));
                        else :
                            _e('Archives', 'asalah');
                        endif;
                        ?></h1>

                </div>
                    <?php if (asalah_option("asalah_enable_breadcrumb")): ?>
                        <div class="page_nav">
                            <nav class="breadcrumb"><?php asalah_breadcrumbs(); ?></nav>		
                        </div>
                    <?php endif; ?>	
            </div>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-9 main_content">
                <?php if (have_posts()) : ?>
                    <!-- if page title is not enabled add secondary page title here -->
                    <?php if (!asalah_option("asalah_enable_pagetitle")): ?>
                        <h1 class="title secondary_page_title"><?php
                            if (is_day()) :
                                printf(__('Daily Archives: %s', 'asalah'), get_the_date());
                            elseif (is_month()) :
                                printf(__('Monthly Archives: %s', 'asalah'), get_the_date(_x('F Y', 'monthly archives date format', 'asalah')));
                            elseif (is_year()) :
                                printf(__('Yearly Archives: %s', 'asalah'), get_the_date(_x('Y', 'yearly archives date format', 'asalah')));
                            else :
                                _e('Archives', 'asalah');
                            endif;
                            ?></h1>
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