<?php
get_header();
?>
<!-- start site content -->
<div class="site_content">
    <div class="page_title_holder clearfix">
        <div class="container">
            <div class="page_info">
                <?php $current_tag = single_tag_title("", false); ?>
                <h1 class="title"><?php single_tag_title(); ?></h1>
            </div>
            <div class="page_nav">
                <div class="page_nav">
                    <nav class="breadcrumb"><?php asalah_breadcrumbs($current_tag); ?></nav>
                </div>
            </div>		
        </div>
    </div>
</div>

<div class="container portfolio_page">
    <div class="row">

        <div class="col-md-3 pull-left side_content hidden-sm hidden-xs">
            <div class="widget_container widget_categories clearfix">
                <h4  class="title widget_title">Filter Projects</h4>
                <?php asalah_portfolio_tag_list_url(); ?>
            </div>
        </div>

        <!-- start main content div -->
        <div class="col-md-9 pull-right main_content">
            <?php
            // use $post num to count the current post in the row
            // and use $intros to posts details to array and use it to output intros
            // after 3 posts alrady returned
            $postnum = 0;
            $intros = array();

            if ($wp_query) :
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
                        <div class="col-md-4 col-xs-4 project_thumbnail portfoliotagfilterall <?php echo asalah_portfolio_tag(); ?>">
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

                <?php asalah_bootstrap_pagination(); ?>

            <?php endif; ?>
        </div>
        <!-- end main content div -->

    </div>
</div>
</div>

<?php get_footer(); ?>