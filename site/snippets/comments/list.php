<?php

/*
 * This is the example comments list snippet. Feel free to use this code as a
 * reference for creating your own, custom comments snippet.
 *
 * Custom snippet markup guide:
 * <https://github.com/Addpixel/KirbyComments#custom-markup>
 *
 * API documentation:
 * <https://github.com/Addpixel/KirbyComments#api-documentation>
 */

$comments = $page->comments();
$status = $comments->process();

?>
<?php if (!$comments->isEmpty()) : ?>
<a name="comments"></a>
<div class="comments">
	<h2 class="comments-title"><?= $comments->count() ?><?php e($comments->count() > 1, ' Comments', ' Comment') ?></h2>
	<ol class="commentlist">
		<?php foreach ($comments as $comment) : ?>
		<li id="comment-<?= $comment->id() ?>" class="comment<?php e($comment->isPreview(), ' preview"') ?>">
			<div id="comment-<?= $comment->id() ?>" class="comment">
				<div class="comment-meta comment-author vcard">
					<img class="avatar avatar-120 photo" src="<?= gravatar($comment->email(), 120) ?>" width="120" height="120">
					<div class="comment-meta-content">
						<cite class="fn">
							<?php e($comment->isLinkable(), '<a class="url" href="' . $comment->website() . '" rel="external nofollow">') ?>
								<?= $comment->name() ?>
							<?php e($comment->isLinkable(), '</a>') ?>
						</cite>
						<p><a href="#comment-<?= $comment->id() ?>"><?= $comment->date('F d, Y') . ' &mdash; ' . $comment->date('g:i a') ?></a></p>
					</div><!-- .comment-meta-content -->
					<!-- Planned: Nested comments -->
					<div class="comment-actions">
						<!-- <a rel="nofollow" class="comment-reply-link" href="" onclick="" aria-label="Reply to NAME">Reply</a> -->
					</div><!-- .comment-actions -->
					<div class="clear"></div>
				</div><!-- .comment-meta -->
				<div class="comment-content post-content">
					<?= $comment->message() ?>
					<div class="clear"></div>
				</div><!-- .comment-content -->
			</div><!-- .comment-## -->
		</li>
		<?php endforeach ?>
	</ol>
</div>
<?php endif ?>
