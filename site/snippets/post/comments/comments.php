<?php
  $comments = $page->comments();

  e(c::get('lingonberry.comments.nested'), '<form id="commentform" class="comment-form" action="#comment-' . $comments->nextCommentId() . '" method="post" accept-charset="utf-8" role="form" aria-labelledby="comments-form-headline">');
  snippet('post/comments/partials/list');
  snippet('post/comments/partials/form');
  e(c::get('lingonberry.comments.nested'), '</form>');
?>
