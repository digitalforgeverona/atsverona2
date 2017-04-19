<?php

function asalah_social_icons_list($skin = "") {
    global $asalah_data;
    $networks = array("facebook" => "Facebook", "twitter" => "Twitter", "google-plus" =>  "Google Plus", "dribbble" => "Dribbble", "linkedin" => "Linked In", "youtube" => "Youtube", 'vimeo-square' => 'Vimeo', "vk" => "VK", "skype" => "Skype", "instagram" => "Instagram", "pinterest" => "Pinterest", "github" => "Github", "renren" => "Ren Ren", "flickr" => "Flickr", "rss" =>  "RSS");

    $activated = 0;
    $output = "";
    foreach ($networks as $network => $social ) {
        $id = "asalah_" . $network . "_url";
        if (asalah_option($id) != "") {
            $activated++;
            if ($activated == 1) {
                $output .= '<ul class="social_icons_list ' . $skin . '">';
            }
            $output .= '<li class="social_icon ' . $network . '_icon"><a target="_blank" title="'.$social.'" href="'.asalah_option($id).'"><i class="fa fa-' . $network . '"></i></a></li>';
        }
    }
    if ($activated != "0") {
        $output .= '</ul>';
    }

    if ($output != '') {
        return $output;
    }
}

function asalah_post_share() {

    // first check if social share is enabled in option panel
    if ((asalah_post_option("asalah_post_share") == "show") || (asalah_option("asalah_post_social_share") && asalah_post_option("asalah_post_share") != "hide")):

        // then check if sliding social share is enabled, if so add sliding_social_share class which should be deceted by jquery in /inc/single_scripts.js
        if (asalah_option("asalah_sliding_social_share")) {
            $class = "blog_social_share sliding_social_share";
        } else {
            $class = "blog_social_share";
        }
        ?>
        <div class="<?php echo $class; ?> clearfix">
            <span class="blog_share_sign"><i class="fa fa-share"></i></span>
            <ul class="social_icons_list blog_post_share_icons <?php echo asalah_option("asalah_post_social_share_skin") ?>">
                <li class="social_icon facebook_icon"><a href="<?php the_permalink(); ?>" onclick=" window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(location.href), 'facebook-share-dialog', 'width=626,height=436');
                                return false;"><i class="fa fa-facebook"></i></a></li>

                <li class="social_icon twitter_icon"><a href="https://twitter.com/share?url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li class="social_icon gplus_icon"><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,
                                        '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
                                return false;"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>
        <?php
    endif;
    // endif for checking if social share enabled in option panel
}

function asalah_post_like() {
    ?>
    <div class="social_share clearfix">
        <div class="fbshare socialbutton">
            <div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
        </div>

        <div class="twtweet socialbutton">
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-lang="en">Tweet</a>
            <script>!function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (!d.getElementById(id)) {
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "https://platform.twitter.com/widgets.js";
                    fjs.parentNode.insertBefore(js, fjs);
                }
            }(document, "script", "twitter-wjs");</script>
        </div>

        <div class="gpbutton socialbutton">
            <!-- Place this tag where you want the +1 button to render. -->
            <div class="g-plusone" data-size="medium" data-href="<?php the_permalink(); ?>"></div>

            <!-- Place this tag after the last +1 button tag. -->
            <script type="text/javascript">
                (function() {
                    var po = document.createElement('script');
                    po.type = 'text/javascript';
                    po.async = true;
                    po.src = 'https://apis.google.com/js/plusone.js';
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(po, s);
                })();
            </script>
        </div>

        <div class="pinit socialbutton">
            <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo asalah_default_image(); ?>" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
        </div>

    </div>	
    <?php
}

function asalah_twitter_tweets($consumerkey = '', $consumersecret = '', $accesstoken = '', $accesstokensecret = '', $screenname = '', $tweets_count = 2) {

            if (empty($consumerkey) || empty($consumersecret) || empty($accesstokensecret) || empty($accesstoken)) {
                return 'Your twitter application info is not set correctly in option panel, please create please login to twitter developers <a href="https://dev.twitter.com/apps" target="_blank">here</a>, create new application and new access tocken, then go to theme option panel social section and fill the data you got from application';
            } else {
                $twitter = new TwitterOAuth($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);

                $tweets = $twitter->get('statuses/user_timeline', array('screen_name' => $screenname, 'count' => $tweets_count));

                $output = '';

                if (is_array($tweets) && !isset($tweets->errors)) {
                    $i = 0;
                    $lnk_msg = NULL;

                    $output .= "<ul>";
                    foreach ($tweets as $tweet) {
                        $i++;

                        $lnk_page = 'http://twitter.com/#!/' . $screenname;
                        $page_name = $tweet->user->name;

                        $msg = $tweet->text;

                        if (is_array($tweet->entities->urls)) {
                            try {
                                if (array_key_exists('0', $tweet->entities->urls)) {
                                    $lnk_msg = $tweet->entities->urls[0]->url;
                                } else {
                                    $lnk_msg = NULL;
                                }
                            } catch (Exception $e) {
                                $lnk_msg = NULL;
                            }
                        }



                        $lnk_tweet = 'http://twitter.com/#!/' . $screenname . '/status/' . $tweet->id_str;


                        /* Tweet Time */
                        $time = strtotime($tweet->created_at);
                        $delta = abs(time() - $time); /* in seconds */
                        $result = '';
                        if ($delta < 1) {
                            $result = ' just now';
                        } elseif ($delta < 60) {
                            $result = $delta . ' seconds ago';
                        } elseif ($delta < 120) {
                            $result = ' about a minute ago';
                        } elseif ($delta < (45 * 60)) {
                            $result = ' about ' . round(($delta / 60), 0) . ' minutes ago';
                        } elseif ($delta < (2 * 60 * 60)) {
                            $result = ' about an hour ago';
                        } elseif ($delta < (24 * 60 * 60)) {
                            $result = ' about ' . round(($delta / 3600), 0) . ' hours ago';
                        } elseif ($delta < (48 * 60 * 60)) {
                            $result = ' about a day ago';
                        } else {
                            $result = ' about ' . round(($delta / 86400), 0) . ' days ago';
                        }


                        if ($i >= $tweets_count)
                            break;


                        $output .= '<li class="cat-item"><a target="_target" href="' . $lnk_tweet . '" class="tweet_icon"><i class="fa fa-twitter"></i></a> <a target="_blank" class="tweet_name" href="' . $lnk_tweet . '">' . $screenname . '</a> ';


                        $output .= $msg;

                        $output .= '<span class="tweet_time">' . $result . '</span></li>';
                    } /* foreach */

                    $output .= "</ul>";
                    return $output;
                    if (!empty($output)) {
                        //return; $output;
                    }
                } else {
                    if (isset($tweets->errors)):
                        $output .= '<span class="tweet_error">Message: ' . $tweets->errors[0]->message . ', Please check your Twitter Authentication Data or internet connection.</span>';
                    else:
                        $output .= '<span class="tweet_error">Please check your internet connection.</span>';
                    endif;

                    if (!empty($output)) {
                        return $output;
                    }
                }
            }
        }
?>
