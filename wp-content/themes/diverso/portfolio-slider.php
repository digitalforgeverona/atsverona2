<?php                                                 
    global $yiw_portfolio;
    
    $post_type = yiw_get_portfolio_post_type();
    $cat_ex = get_post_meta( get_the_ID(), 'category_exclude', true );
    if ( ! empty( $cat_ex ) )
        $cat_ex = array_map( 'trim', explode( ',', $cat_ex ) );
    else
        $cat_ex = array();
    
    $categories_portfolio = get_terms( sanitize_title( $yiw_portfolio[$post_type]['tax'] ), 'hide_empty=1&orderby=name' );
    foreach ($categories_portfolio as $category ) {
        if ( in_array( $category->slug, $cat_ex ) ) continue;
        $cat_slug = $category->slug;
        $cat_name = $category->name;
        $count_items = $category->count;      

        if( $count_items > 0 ) {
            global $paged;

            $args = array(
                        'post_type' => $post_type,
                        sanitize_title( $yiw_portfolio[$post_type]['tax'] ) => $cat_slug,
                        'paged' => $paged,
                        'posts_per_page' => -1
                    );      

            //wp_reset_query();
            $portfolio_items = new WP_Query( $args );   
    
            echo "<h3>$cat_name</h3>\n";        
            echo '<div class="portfolio-slider">';
            echo '<ul>'."\n";
    
            while( $portfolio_items->have_posts() ) : $portfolio_items->the_post();
    
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
        
                echo '    <li class="post-'.get_the_ID().'"><a class="thumb '.$class.'" href="'.$thumb.'" rel="prettyPhoto['.$cat_name.']" title="'.get_the_title().'">'.get_the_post_thumbnail( get_the_ID(), 'thumb_portfolio_slider' ).'</a></li>'."\n";
    
            endwhile;           
    
            echo '</ul>'."\n";
            echo '</div>';
            echo '<div class="clear"></div>'."\n";   
    
            unset( $portfolio_items );
        }
    }                   

    ?>

<script type="text/javascript">
                jQuery(document).ready(function() {
                    jQuery('#primary .portfolio-slider').jcarousel();
                });
</script>
