<?php
if (post_password_required()) {
  return;
}
?>

<div class="comments">
    <h5 class="mt-5 mb-3 text-danger text-capitalize">
        <?php comments_number()?>
    </h5>
    <hr />
    <?php
    wp_list_comments(array(
      'short_ping'  => true,
      'callback'    => 'better_comments'
    ));
  ?>
  <?php comment_form(array(
    'id_form' => 'comment-form',
    'title_reply' => '',
    'title_reply_to' => 'Leave a Reply to %s',
    'label_submit' => 'Add Comment',
    'cancel_reply_link' => '<span class="text-danger"> | Cancel Reply</span>',
    'class_submit' => 'btn btn-success',
    'comment_field' => ''
  )); ?>
</div>
  