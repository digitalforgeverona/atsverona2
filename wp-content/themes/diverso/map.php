		<?php 
		    $src = get_post_meta( get_the_ID(), '_map_url', true );
            if ( get_post_meta( get_the_ID(), '_show_map', true ) != 'yes' || empty( $src ) ) 
                return;
            
            $opened = get_post_meta( get_the_ID(), '_map_opened', true );
            
            //http://maps.google.it/?ll=37.496652,14.205322&spn=2.40995,5.410767&t=h&z=8&vpsrc=6
//             preg_match( '/ll=([-0-9.]+),([-0-9.]+)/', $src, $match );
//             $lat = $match[1];
//             $lng = $match[2];                 
//             preg_match( '/z=([0-9]+)/', $src, $match );
//             $zoom = $match[1];                               
//             preg_match( '/t=([a-z]+)/', $src, $match );
//             
//             switch( $match[1] ) {
//                 case 'h' :
//                     $type = 'HYBRID';
//                     break;
//                 case 'm' :
//                     $type = 'ROADMAP';
//                     break;
//                 default :
//                     $type = 'ROADMAP';
//                     break;
//             }                  
        ?>
        
        <div class="header-map hide-if-no-js">
        
            <div id="map-wrap"<?php if ( $opened == 'yes' ) : ?> class="opened"<?php endif ?>><div id="map"><iframe 
                width="100%" 
                height="400" 
                frameborder="0" 
                scrolling="no" 
                marginheight="0" 
                marginwidth="0" 
                src="<?php echo $src; ?>&amp;output=embed">
            </iframe></div></div>
            
            <div id="ds-h" class="shadow"> 
                <div class="ds h1 o1"></div> 
                <div class="ds h2 o2"></div> 
                <div class="ds h3 o3"></div> 
                <div class="ds h4 o4"></div> 
                <div class="ds h5 o5"></div> 
            </div>
        
            <a href="#" class="tab-label<?php if ( $opened == 'yes' ) : ?> opened<?php else : ?> closed<?php endif; ?>"><?php if ( $opened == 'yes' ) _e( 'Close Map', 'yiw' ); else _e( 'View Map', 'yiw' ); ?></a>
        
        </div>   