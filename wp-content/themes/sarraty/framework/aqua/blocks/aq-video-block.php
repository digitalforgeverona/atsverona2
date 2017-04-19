<?php

/** A simple text block * */
class AQ_video_Block extends AQ_Block {

    //set and create block
    function __construct() {
        $block_options = array(
            'name' => 'Video',
            'size' => 'span6',
        );

        //create the block
        parent::__construct('AQ_video_Block', $block_options);
    }

    function form($instance) {

        $defaults = array(
            'title' => '',
            'video_url' => '',
            'effect' => 'no_show_effect',
        );
        $instance = wp_parse_args($instance, $defaults);
        extract($instance);
        $effects_types = array(
            'no_show_effect' => 'Disable',
            'show_fade' => 'Fade In',
            'show_fade_left' => 'Fade In From Left',
            'show_fade_right' => 'Fade In From Right',
            'show_fade_up' => 'Fade In From Up',
            'show_fade_down' => 'Fade In From Down',
            'show_bounce' => 'Bounce'
        );
        ?>
        <p class="description">
            <label for="<?php echo $this->get_field_id('title') ?>">
                Title (optional)
        <?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
            </label>
        </p>

        <p class="description">
            <label for="<?php echo $this->get_field_id('video_url') ?>">
                Embed Code or Video URL (Youtube, Vimeo, Local)
        <?php echo aq_field_input('video_url', $block_id, $video_url, $size = 'full') ?>
            </label>
        </p>
        
        <p class="description">
            <label for="<?php echo $this->get_field_id('effect') ?>">
                Effect<br/>
                <?php echo aq_field_select('effect', $block_id, $effects_types, $effect) ?>
            </label>
        </p>

        <?php
    }

    function block($instance) {
        extract($instance);

        if ($title) echo '<h3 class="title thin_title">' . do_shortcode(htmlspecialchars_decode($title)) . '</h3>';
        
        echo "<div class='".$effect."'>";
        if (strpos($video_url, "iframe") != false) {
            echo $video_url;
        } elseif (strpos($video_url, "webm") || strpos($video_url, ".ogv") || strpos($video_url, ".mp4") || strpos($video_url, ".m4v") || strpos($video_url, ".wmv") || strpos($video_url, ".mov") || strpos($video_url, ".qt") || strpos($video_url, ".flv") || strpos($video_url, ".mp3") || strpos($video_url, ".m4a") || strpos($video_url, ".m4b") || strpos($video_url, ".ogg") || strpos($video_url, ".oga") || strpos($video_url, ".wma") || strpos($video_url, ".wav")) {
            echo '<div class="video_fit_container">';
            echo do_shortcode('[video src="' . $video_url . '"][/video]');
            echo '</div>';
        } else {
            $prov = asalah_video_prov($video_url);
            $vid = asalah_video_id($prov, $video_url);
            asalah_video_iframe($prov, $vid);
        }
        echo "</div>";
    }

}