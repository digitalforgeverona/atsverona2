<?php

function asalah_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    switch ($comment->comment_type) :
        case 'pingback' :
        case 'trackback' :
            ?>
            <li class="post pingback">
                <p><?php _e('Pingback: ', 'asalah'); ?> <?php comment_author_link(); ?> (<?php edit_comment_link(__('Edit', 'asalah'), '<span class="edit-link">', '</span>'); ?>)</p>
                <?php
                break;
            default :
                ?>
            <li <?php comment_class("media the_comment"); ?> id="li-comment-<?php comment_ID(); ?>">
                <a class="pull-left commenter" href="#">
                    <?php
                    $avatar_size = 40;
                    if ('0' != $comment->comment_parent)
                        $avatar_size = 40;

                    echo get_avatar($comment, $avatar_size);
                    ?>
                </a>
                <div class="media-body comment_body">
                    <div class="media-heading clearfix">
                        <h5 class="commenter_name title"><?php echo get_comment_author_link(); ?></h5>
                        <div class="comment_info"><a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>"><time pubdate datetime="<?php echo get_comment_time('c'); ?>"><?php echo get_comment_date() . ' at ' . get_comment_time(); ?></time></a> <?php comment_reply_link(array_merge($args, array('reply_text' => "- ".__('Reply', 'asalah'), 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?></div>
                    </div>
            <?php comment_text(); ?>


                    <?php
                    break;
            endswitch;
        }
        ?>
        
        
        <div class="post_comments_list clearfix">
            
            <div class="single_comments span12">
                <?php if (have_comments()) : ?><h4 class="title main_title comment_form_title"><?php _e('Comments', 'asalah'); ?></h4><?php endif;  ?>
                <div class="single_comments_box">
<?php if (post_password_required()) : ?>
                        <p class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', 'asalah'); ?></p>
                    </div>
                </div>
            </div><!-- #comments -->
            <?php
            /* Stop the rest of comments.php from being processed,
             * but don't kill the script entirely -- we still have
             * to fully load the template.
             */
            return;
        endif;
        
        ?>

        <?php // You can start editing here -- including this comment!  ?>

        <?php if (have_comments()) : ?>
    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through  ?>
                <nav id="comment-nav-above">
                    <h1 class="assistive-text"><?php _e('Comment navigation', 'asalah'); ?></h1>
                    <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'asalah')); ?></div>
                    <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'asalah')); ?></div>
                </nav>
    <?php endif; // check for comment navigation  ?>

            <ul class="media-list comments_list">
                <?php
                wp_list_comments(array('callback' => 'asalah_comment'));
                ?>
            </ul>

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through  ?>
                <nav id="comment-nav-below">
                    <h1 class="assistive-text"><?php _e('Comment navigation', 'asalah'); ?></h1>
                    <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'asalah')); ?></div>
                    <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'asalah')); ?></div>
                </nav>
            <?php endif; // check for comment navigation  ?>

            <?php
        /* If there are no comments and comments are closed, let's leave a little note, shall we?
         * But we don't want the note on pages or post types that do not support comments.
         */
        elseif (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) :
            ?>
            <p class="nocomments"><?php _e('Comments are closed.', 'asalah'); ?></p>
<?php endif; ?>

        <div class="post_comment_box">
            <h4 class="title main_title comment_form_title"><?php _e('Leave A Reply!', 'asalah'); ?></h4>
            <?php
            $args = array(
                'id_form' => 'commentform',
                'id_submit' => 'submit',
                'title_reply' => '',
                'title_reply_to' => __('Leave a Reply to %s', 'asalah'),
                'cancel_reply_link' => __('Cancel Reply', 'asalah'),
                'label_submit' => __('Post Comment', 'asalah'),
                'comment_field' => '</div><div class="row comment_textarea"><div class="col-md-12"><textarea id="comment" name="comment" aria-required="true" class="col-md-12" rows="6"></textarea></div></div>',
                'must_log_in' => '<p class="must-log-in">' . sprintf(__('You must be <a href="%s">logged in</a> to post a comment.'), wp_login_url(apply_filters('the_permalink', get_permalink()))) . '</p>',
                'logged_in_as' => '<p class="logged-in-as">' . sprintf(__('Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>'), admin_url('profile.php'), $user_identity, wp_logout_url(apply_filters('the_permalink', get_permalink()))) . '</p><div>',
                'comment_notes_before' => '<p class="comment-notes">' . __('Your email address will not be published.', 'asalah') . '</p><div class="row">',
                'comment_notes_after' => '',
                'fields' => apply_filters('comment_form_default_fields', array(
                    'author' => '<div class="col-md-4"><input id="author" name="author" class="form-control col-md-12" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" placeholder="Name" value="' . esc_attr($commenter['comment_author']) . '" ></div>',
                    'email' => '<div class="col-md-4"><input id="email" name="email" class="form-control col-md-12" type="text" placeholder="Email"></div>',
                    'url' => '<div class="col-md-4"><input id="url" name="url" class="form-control col-md-12" type="text" placeholder="Website" value="' . esc_attr($commenter['comment_author_url']) . '"></div>')));
            ?>
<?php comment_form($args); ?>
        </div>
    </div>
</div>
</div><!-- #comments -->
