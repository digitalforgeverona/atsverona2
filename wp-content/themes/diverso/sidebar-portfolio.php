            <?php wp_reset_query() ?>                  

            <?php if( yiw_layout_page() != 'sidebar-no' ) : ?>  
                <div id="sidebar" class="group">

                    <?php do_action( 'yiw_before_sidebar' ) ?> 
                    <?php do_action( 'yiw_before_sidebar_' . yiw_get_current_pagename() ) ?> 
                    <?php 
                    
                        $portfolio = yiw_portfolio();
                                                                                 
                        if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar( $portfolio['title'] . ' Sidebar' ) )

                            get_sidebar() 

                    ?>

            

                    <?php do_action( 'yiw_after_sidebar' ) ?>       

                    <?php do_action( 'yiw_after_sidebar_' . yiw_get_current_pagename() ) ?> 

                </div>

                

            <?php endif ?>