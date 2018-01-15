<?php

/*
 * This is the example comments form snippet. Feel free to use this code as a
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

<div id="respond" class="comment-respond">

	<?php

		// This recursive function is used to render nested comments
		function renderComment($comment, $nesting_level) {
			echo '<div class="nested-comment level-'.$nesting_level.'" id="comment-'.$comment->id().'">';
			echo '<h3 class="name">'.$comment->name().'</h3>';
			echo '<div class="text">'.$comment->message().'</div>';

			if (!$comment->isPreview()) {
				// Radio-button for setting the reply-to field
				$radio_id = 'reply-to-'.$comment->id();
				$is_checked = $comment->id() == page()->comments()->customFieldValue('reply-to');
				echo '<input type="radio" name="reply-to" value="'.$comment->id().'"'.r($is_checked, ' checked').' id="'.$radio_id.'">';
				echo '<label for="'.$radio_id.'">Reply to this comment</label>';
			} else {
				// This comment is still in preview, inform the comment author about the
				// submit button.
				echo '<p class="comments-info-block">This is a preview of your comment. If you’re happy with it, <a href="#comments-submit" title="Jump to the submit button">submit</a> it to the public.</p>';
			}

			// Render all nested child comments
			if ($comment->hasChildren()) {
				foreach ($comment->children() as $child) {
					// Recursive call to `renderComment`; increment the nesting level
					renderComment($child, $nesting_level + 1);
				}
			}

			echo '</div>';
		}

		// Call `renderComment` for all comments on the top level
		foreach ($page->comments()->nestByField('reply-to') as $comment) {
			renderComment($comment, 1);
		}
	?>

	<?php if ($comments->isSuccessfulSubmission()) : ?>
		<p class="thank-you">Thank you for your comment!</p>
	<?php else : ?>
		<h3 id="reply-title" class="comment-reply-title">Leave a Reply</h3>

		<?php if ($status->isUserError()) : ?>
			<p id="comment-<?= $comments->nextCommentId() ?>" class="error">
				<?= $status->getMessage() ?>
			</p>
		<?php endif ?>

		<form id="commentform" class="comment-form" action="#comment-<?= $comments->nextCommentId() ?>" method="post" accept-charset="utf-8" role="form" aria-labelledby="comments-form-headline">
			<p class="comment-notes">Your email address will not be published.</p>

			<p class="comment-form-comment"><textarea id="comment" name="<?= $comments->messageName() ?>" maxlength="<?= $comments->messageMaxLength() ?>" cols="45" rows="6" required><?= $comments->messageValue() ?></textarea></p>

			<p class="comment-form-author">
				<input id="author" name="<?= $comments->nameName() ?>" maxlength="<?= $comments->nameMaxLength() ?>" placeholder="Name" value="<?= $comments->nameValue() ?>" size="30" type="text"<?php e($comments->requiresName(), ' required') ?>>
				<label for="author">Author</label><?php if ($comments->requiresName()) : ?><span class="required">*</span><?php endif ?>
			</p>

			<p class="comment-form-email">
				<input id="email" name="<?= $comments->emailName() ?>" placeholder="Email" value="<?= $comments->emailValue() ?>" maxlength="<?= $comments->emailMaxLength() ?>" size="30" type="text"<?php e($comments->requiresEmailAddress(), ' required') ?>>
				<label for="email">Email</label><?php if ($comments->requiresEmailAddress()) : ?><span class="required">*</span><?php endif ?>
			</p>

			<p class="comment-form-url">
				<input id="url" name="<?= $comments->websiteName() ?>" placeholder="Website" value="<?= $comments->websiteValue() ?>" maxlength="<?= $comments->websiteMaxLength() ?>" size="30" type="text">
				<label for="url">Website</label>
			</p>

			<?php if ($comments->isUsingHoneypot()) : ?>
			<div style="display: none" hidden>
				<input type="text" name="<?= $comments->honeypotName() ?>" value="<?= $comments->honeypotValue() ?>">
			</div>
			<?php endif ?>

			<input type="hidden" name="<?= $comments->sessionIdName() ?>" value="<?= $comments->sessionId() ?>">

			<?php if (c::get('lingonberry.comments.preview')) : ?>
			<input type="submit" name="<?= $comments->previewName() ?>" value="Preview Comment">
			<?php if ($comments->isValidPreview()) : ?>
			<input id="comments-submit" type="submit" name="<?= $comments->submitName() ?>" value="Post Comment">
			<?php endif ?>
			<?php else : ?>
			<input id="comments-submit" type="submit" name="<?= $comments->submitName() ?>" value="Post Comment">
			<?php endif ?>

		</form>
	<?php endif ?>
</div>
