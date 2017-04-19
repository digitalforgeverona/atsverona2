<?php

function magic_substr($haystack, $start, $end) {
    $index_start = strpos($haystack, $start);
    $index_start = ($index_start === false) ? 0 : $index_start + strlen($start);
    if (strpos($haystack, $end) == TRUE) {
        $index_end = strpos($haystack, $end, $index_start);
        $length = ($index_end === false) ? strlen($end) : $index_end - $index_start;
        return substr($haystack, $index_start, $length);
    } else {
        return substr($haystack, $index_start);
    }
}

function asalah_default_image() {
    global $asalah_data;
    if ($asalah_data['asalah_default_image']) {
        return $asalah_data['asalah_default_image'];
    } else {
        return get_template_directory_uri() . '/img/default.jpg';
    }
}

function asalah_video_prov($vurl) {
    if (strpos($vurl, 'youtube') !== false) {
        $prov = "youtube";
    } elseif (strpos($vurl, 'youtu') !== false) {
        $prov = "youtu";
    } elseif (strpos($vurl, 'vimeo') !== false) {
        $prov = "vimeo";
    } else {
        $prov = "none";
    }
    return $prov;
}

function asalah_video_id($prov, $vurl) {
    if ($prov == 'youtube') {
        $id = magic_substr($vurl, "http://www.youtube.com/watch?v=", "&");
    } elseif ($prov == 'youtu') {
        $id = magic_substr($vurl, "http://www.youtu.be/watch?v=", "&");
    } elseif ($prov == 'vimeo') {
        $id = magic_substr($vurl, "http://vimeo.com/", "?");
    }
    return $id;
}

function asalah_video_iframe($prov, $vid) {
    echo '<div class="video_fit_container">';
    if ($prov == 'youtube') {
        ?>
        <iframe class="video_iframe" src="http://www.youtube.com/embed/<?php echo $vid; ?>?wmode=transparent&wmode=opaque" frameborder="0" allowfullscreen></iframe>
        <?php
    } elseif ($prov == 'youtu') {
        ?>
        <iframe  class="video_iframe" src="http://www.youtube.com/embed/<?php echo $vid; ?>?wmode=transparent&wmode=opaque" frameborder="0" allowfullscreen></iframe>
        <?php
    } elseif ($prov == 'vimeo') {
        ?>
        <iframe class="video_iframe" src="http://player.vimeo.com/video/<?php echo $vid; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
        <?php
    } else {
        
    }
    echo '</div>';
}

function asalah_blog_post_banner() {
    global $post;

    if (get_post_format() == "image") {
        $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
        ?>
        <a href="<?php echo $url; ?>"  class="prettyPhoto" rel="prettyPhoto"><?php the_post_thumbnail(); ?></a>
        <?php
    } elseif (get_post_format() == "video") {

        $video_url = get_post_meta($post->ID, '_format_video_embed', true);

        if (strpos($video_url, "iframe") != false) {
            echo $video_url;
        } elseif (strpos($video_url, "webm") || strpos($video_url, ".ogv") || strpos($video_url, ".mp4") || strpos($video_url, ".m4v") || strpos($video_url, ".wmv") || strpos($video_url, ".mov") || strpos($video_url, ".qt") || strpos($video_url, ".flv") || strpos($video_url, ".mp3") || strpos($video_url, ".m4a") || strpos($video_url, ".m4b") || strpos($video_url, ".ogg") || strpos($video_url, ".oga") || strpos($video_url, ".wma") || strpos($video_url, ".wav")) {
            echo '<div class="video_fit_container">';
            echo do_shortcode('[video url="' . $video_url . '"]');
            echo '</div>';
        } else {
            $prov = asalah_video_prov($video_url);
            $vid = asalah_video_id($prov, $video_url);
            asalah_video_iframe($prov, $vid);
        }
    } elseif (get_post_format() == "gallery") {
        $attachments = get_posts(array(
            'post_type' => 'attachment',
            'numberposts' => -1,
            'post_status' => null,
            'post_parent' => $post->ID,
            'order' => 'ASC',
            'orderby' => 'menu_order ID',
        ));
        if ($attachments) {
            echo '<div class="flexslider"><ul class="slides">';
            foreach ($attachments as $attachment) {
                echo '<li>' . wp_get_attachment_image($attachment->ID, 'full') . '</li>';
            }
            echo '</ul></div>';
        }
    } elseif (get_post_format() == "audio") {
        $sound_url = get_post_meta($post->ID, '_format_audio_embed', true);
        if (strpos($sound_url, "iframe") != false) {
            echo '<div class="video_fit_container">';
            echo $sound_url;
            echo '</div>';
        } elseif (strpos($sound_url, "webm") || strpos($sound_url, ".ogv") || strpos($sound_url, ".mp4") || strpos($sound_url, ".m4v") || strpos($sound_url, ".wmv") || strpos($sound_url, ".mov") || strpos($sound_url, ".qt") || strpos($sound_url, ".flv") || strpos($sound_url, ".mp3") || strpos($sound_url, ".m4a") || strpos($sound_url, ".m4b") || strpos($sound_url, ".ogg") || strpos($sound_url, ".oga") || strpos($sound_url, ".wma") || strpos($sound_url, ".wav")) {
            echo '<div class="video_fit_container">';
            echo do_shortcode('[audio src="' . $sound_url . '" width=100][/audio]');
            echo '</div>';
        } elseif (strpos($sound_url, "soundcloud.com")) {
            ?>
            <iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?php echo $sound_url; ?>"></iframe>
            <?php
        }
    }
}
?>
