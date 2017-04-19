<?php
$sections = yiw_get_option( 'home_sections' ); 

if( $sections AND !is_array( $sections ) )
	$sections = yiw_subval_sort( unserialize( $sections ), 'order' );
if( !$sections )
	$sections = array();
?>     
    
    <?php if ( ! empty( $sections ) ) : ?>    
    <div class="home-sections">
        
        <?php foreach( $sections as $id => $section ) :  $section = stripslashes_deep( $section ); ?>
        <div class="section gradient s-<?php echo $id+1 ?> group">
            <div class="section-title for-not-mobile">
                <h2><?php echo $section['section_title'] ?></h2> 
                <?php echo wpautop( do_shortcode( $section['section_subtitle'] ) ) ?>       
            </div>
            
            <div class="section-content">
                <?php if ( ! preg_match( '/\[tab/', $section['tooltip_content'] ) ) : ?><h2 class="for-mobile"><?php echo $section['section_title'] ?></h2><?php endif ?> 
                <?php echo yiw_addp($section['tooltip_content']);// ? do_shortcode( wpautop( $section['tooltip_content'] ) ) : do_shortcode( $section['tooltip_content'] ) ?>    
            </div>
            
            <div class="shadow"></div>
        </div>
        <?php endforeach ?>
    
    </div>   
    <?php endif ?> 