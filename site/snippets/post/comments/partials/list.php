<?php

function renderComment($comment, $nesting_level) {

  $aristotle = new Asset(c::get('lingonberry.comments.fallback-avatar', 'assets/images/aristotle.jpg'));
  $fallback = $aristotle->crop(120)->url();
  $picture = c::get('lingonberry.comments.enable-gravatar') ? gravatar($comment->email(), 120) : $fallback;

  echo '<li id="comment-' . $comment->id() . '" class="comment' . e($comment->isPreview() && !c::get('lingonberry.comments.nested'), ' preview') . '">';
    echo '<div id="comment-' . $comment->id() . '" class="comment">';
      echo '<div class="comment-meta comment-author vcard">';
        echo '<img class="avatar avatar-120 photo" src="' . $picture . '" width="120" height="120">';
        echo '<div class="comment-meta-content">';
          echo '<cite class="fn">';
          e($comment->isLinkable(), '<a class="url" href="' . $comment->website() . '" rel="external nofollow">');
          echo $comment->name();
          e($comment->isLinkable(), '</a>');
        echo '</cite>';
        echo '<p><a href="#comment-' . $comment->id() . '">' . $comment->date('F d, Y') . ' &mdash; ' . $comment->date('g:i a') . '</a></p>';
      echo '</div><!-- .comment-meta-content -->';
      echo '<!-- Planned: Nested comments -->';
      echo '<div class="comment-actions">';
        echo '<!-- <a rel="nofollow" class="comment-reply-link" href="" onclick="" aria-label="Reply to NAME">Reply</a> -->';
      echo '</div><!-- .comment-actions -->';
      echo '<div class="clear"></div>';
    echo '</div><!-- .comment-meta -->';
    echo '<div class="comment-content post-content">';
      echo $comment->message();
      if (c::get('lingonberry.comments.nested')) {
        if (!$comment->isPreview()) {
          // Radio-button for setting the reply-to field
          $radio_id = 'reply-to-' . $comment->id();
          $is_checked = $comment->id() == page()->comments()->customFieldValue('reply-to');

          echo '<p>Reply to this comment: <input type="radio" name="reply-to" value="' . $comment->id() . '"'. r($is_checked, ' checked').' id="' . $radio_id . '"></p>';
        } else {
          // This comment is still in preview, inform the comment author about the
          // submit button.
          echo '<p class="comments-info-block">This is a preview of your comment. If you’re happy with it, <a href="#comments-submit" title="Jump to the submit button">submit</a> it to the public.</p>';
        }
      }
      echo '<div class="clear"></div>';
    echo '</div><!-- .comment-## -->';

    // Rendering all child comments in nested view
    if (c::get('lingonberry.comments.nested') && $comment->hasChildren()) {
    echo '<ul class="children">';
    foreach ($comment->children() as $child) {
      renderComment($child, $nesting_level + 1);
    }
    echo '</ul>';
    }
  echo '</li>';
}

?>

<?php
  $comments = $page->comments();
  if (!$comments->isEmpty()) :
?>
<a name="comments"></a>
<div class="comments">
  <h2 class="comments-title"><?= $comments->count() ?><?php e($comments->count() > 1, ' Comments', ' Comment') ?></h2>
    <ol class="commentlist">
      <?php
        if (c::get('lingonberry.comments.nested')) { $comments = $comments->nestByField('reply-to'); }
        foreach ($comments as $comment) { renderComment($comment, 1); }
      ?>
  </ol>
</div>
<?php endif ?>
