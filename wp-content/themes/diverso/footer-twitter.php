<?php
    $show = get_post_meta( get_the_ID(), '_show_footer_twitter', true );  
    if ( ( ! empty( $show ) && $show == 'no' ) || ( empty( $show ) && ! yiw_get_option( 'show_footer_twitter' ) ) )
        return;
?>                    
                    
                    <!-- START TWITTER -->
			        <div id="twitter-slider" class="group">
				    	
				        <div class="tweets-list">
                            <?php
                            $access_token = ( yiw_get_option( 'topbar_access_token' ) != '' ) ? yiw_get_option( 'topbar_access_token' ) : yiw_get_option( 'twitter_access_token' ) ;
                            $access_token_secret = ( yiw_get_option( 'topbar_access_token_secret' ) != '' ) ? yiw_get_option( 'topbar_access_token_secret' ) : yiw_get_option( 'twitter_access_token_secret' ) ;
                            $consumer_key = ( yiw_get_option( 'topbar_consumer_key' ) != '' ) ? yiw_get_option( 'topbar_consumer_key' ) : yiw_get_option( 'twitter_consumer_key' ) ;
                            $consumer_secret = ( yiw_get_option( 'topbar_consumer_secret' ) != '' ) ? yiw_get_option( 'topbar_consumer_secret' ) : yiw_get_option( 'twitter_consumer_secret' ) ;
                            $twitter_data = yit_get_tweets( $access_token, $access_token_secret, $consumer_key, $consumer_secret, yiw_get_option( 'topbar_twitter_items' ));

                            if ( !isset($twitter_data->errors) ) :
                                echo '<ul class="last-tweets slides">';
                                $i = 1;
                                foreach ($twitter_data as $tweet){
                                    if (!empty($tweet)) {
                                        $text = $tweet->text;
                                        $text_in_tooltip = str_replace('"', '', $text); // replace " to avoid conflicts with title="" opening tags
                                        $id = $tweet->id;
                                        $time = strftime('%d/%m/%Y %H:%M:%S', strtotime($tweet->created_at));
                                        $username = $tweet->user->name;
                                    }
                                    echo '<li class="tweet_' . $i . '"><p><span class="text">' . $text . '</span></p>';


                                    ?>
                                    <script type="text/javascript">
                                        jQuery(function($){
                                            var test = twttr.txt.autoLink("<?php echo addslashes( str_replace( "\n", " ", $text ) ) ?>");
                                            $('ul.last-tweets li.tweet_<?php echo $i ?> span.text').replaceWith(test);
                                        });
                                    </script>
                                    <?php $i++; echo '</li>';
                                }
                                echo '</ul>';
                            endif ?>
                        </div>

                        
                        <div class="bird"></div>
                        
                        <script type="text/javascript">
                            jQuery(function($){         
                                
                                var twitterSlider = function(){      
//                                     $('#twitter-slider .tweets-list ul').cycle({
//                                         fx : 'scrollVert',
//                                         speed: <?php echo yiw_get_option( 'twitter_speed' ) * 1000 ?>,
//                                         timeout: <?php echo yiw_get_option( 'twitter_timeout' ) * 1000 ?>
//                                     });
                                    $('.tweets-list ul').addClass('slides');
                                    $('.tweets-list').flexslider({
                                        animation: "slide",
                                        slideDirection: "vertical",
                                        slideshowSpeed: <?php echo yiw_get_option( 'twitter_timeout' ) * 1000 ?>,
                                        animationDuration: <?php echo yiw_get_option( 'twitter_speed' ) * 1000 ?>,
                                        directionNav: false,             
                                        controlNav: false,             
                                        keyboardNav: false
                                    });
                                };
                                twitterSlider();

                            });
                        </script>	
								    
					</div>       
			        <!-- END FOOTER -->