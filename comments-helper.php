<?php 
function better_comments($comment, $args, $depth) {?>
<div class="media mb-4">
    <?php echo get_avatar($comment, $size='54', $default='http://0.gravatar.com/avatar/36c2a25e62935705c5565ec465c59a70?s=32&d=mm&r=g', $alt, array('class' => array('rounded-circle', 'mt-2', 'd-flex')) ); ?>
    <div class="media-body">
        <?php if ($comment->comment_approved == '0') : ?>
        <em><?php esc_html_e('Your comment is awaiting moderation.','crystalblog') ?></em>
        <br />
        <?php endif; ?>
        <h6 class="mt-3 ml-2">
            <span class="text-info"><?php echo get_comment_author()?></span>
        </h6>
        <small class="ml-2 text-secondary"><?php echo get_comment_date()?></small>
        <p class="mt-1 ml-2 text-secondary">
            <?php echo get_comment_text(); ?>
        </p>
        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
</div>
<?php } ?>