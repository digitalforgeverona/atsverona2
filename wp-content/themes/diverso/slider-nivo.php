<?php 
/**
 * @package WordPress
 * @subpackage Impero
 * @since 1.0
 */
?>  
 
    <!-- START SLIDER -->
    <div class="slider-wrapper theme-default">
        <div class="ribbon"></div>
        <div id="slider" class="nivo" style="height:<?php yiw_slide_the('height') ?>px">
            <?php while( yiw_have_slide() ) : ?>
                        <?php yiw_slide_the( 'featured-content', array(
                                 'container' => false,
                                 'video_width' => 439,
                                 'video_height' => 245
                              ) ) 
                        ?> 
            <?php endwhile; ?>
        </div>
    </div>