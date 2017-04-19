            <ul id="portfolio">         
                <?php
                    global $paged, $yiw_portfolio;
                    
                    $post_type = yiw_get_portfolio_post_type();
                    
                    $args = array(
                        'post_type' => $post_type,
                        'posts_per_page' => empty( $yiw_portfolio[$post_type]['items'] ) ? -1 : $yiw_portfolio[$post_type]['items'],
                        'paged' => $paged
                    );
                    
                    if ( is_tax() )   
                       $args = wp_parse_args( $args, $wp_query->query );

                    $portfolio = new WP_Query( $args );
                    $i = 1;

                    while( $portfolio->have_posts() ) : $portfolio->the_post();  
                        global $more;
                        $more = 0;

                        if($i % 3 == 0) {
                            $classes = 'last group';
                        } elseif($i % 3 == 1) {
                            $classes = 'first';
                        } else {
                            $classes = '';
                        }
                ?>     

                <li <?php post_class( $classes ) ?>>
                    <?php   
                        if( $thumb = get_post_meta(get_the_ID(), '_portfolio_video', true) ) {
                            $class = 'video';
                            list( $type, $id ) = explode( ':', yiw_video_type_by_url( $thumb ) );
                            if ( $type == 'vimeo' )
                                $thumb .= '?width=500&height=284';
                            elseif ( $type == 'youtube' )        
                                $thumb .= '?width=500&height=314';
                        } else {
                            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                            $thumb = $thumb[0];
                            $class = 'img';
                        }
                    ?>

                    <?php if( has_post_thumbnail() ) : ?>
                        <a class="for-not-mobile thumb <?php echo $class ?>" href="<?php echo $thumb ?>" rel="prettyPhoto[movies]"><?php the_post_thumbnail('thumb_portfolio_3cols') ?></a>
                        <a class="for-mobile image-border" href="<?php the_permalink() ?>"><?php the_post_thumbnail('thumb_portfolio_3cols') ?></a>
                    <?php endif ?>  

                    <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                    <?php echo yiw_content(25, $yiw_portfolio[$post_type]['read_more']) ?>
                </li>       
                <?php $i++; endwhile ?>        
            </ul>                             

            <?php if(function_exists('yiw_pagination')) : yiw_pagination( $portfolio->max_num_pages ); else : ?> 
                <div class="navigation">
                    <div class="alignleft"><?php next_posts_link(__('Next &raquo;', 'yiw')) ?></div>
                    <div class="alignright"><?php previous_posts_link(__('&laquo; Back', 'yiw')) ?></div>
                </div>
            <?php endif; ?>
