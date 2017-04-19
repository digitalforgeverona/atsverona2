<?php 
/**
 * @package WordPress
 * @subpackage Diverso
 * @since 1.0
 */    
 
if ( yiw_is_empty() )
    return;

$i = 0;
?>
 
 		<!-- BEGIN #slider -->
        <div id="slider" class="cycle group">
                                    
        	<div class="slides_container">    
        	
                    <?php while( yiw_have_slide() ) : ?>
                    <!-- START PANEL -->
                    <div<?php yiw_slide_class( 'slide align-' . yiw_slide_get( 'layout_slide' ) ) ?>>  
                    
                        <!-- HENTRY -->
                        <div class="hentry">
                            <?php yiw_string_( '<h2>', yiw_slide_get( 'title' ), '</h2>' ) ?>   
                            <?php yiw_string_( '<p>', yiw_slide_get( 'content' ), '</p>' ) ?>   
                        </div>            
                        <!-- END HENTRY -->
                        
                        <!-- IMAGE / VIDEO -->
                        <?php yiw_slide_the( 'featured-content', array(
                                 'container' => true,
                                 'video_width' => 447,
                                 'video_height' => 252
                              ) ) ?>   
                        <!-- END IMAGE / VIDEO -->
                        
                        <div class="clear"></div>      
                                     
                    </div>
                    <!-- END PANEL -->
                    <?php $i++; endwhile; ?>       
            
            </div>
            
            <div class="shadow"></div>
        
        </div>