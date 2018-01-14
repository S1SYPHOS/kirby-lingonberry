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

			<?php if ($comments->isUsingHoneypot()): ?>
			<div style="display: none" hidden>
				<input type="text" name="<?= $comments->honeypotName() ?>" value="<?= $comments->honeypotValue() ?>">
			</div>
			<?php endif ?>

			<input type="hidden" name="<?= $comments->sessionIdName() ?>" value="<?= $comments->sessionId() ?>">

			<!-- <input type="submit" name="<?= $comments->previewName() ?>" value="Preview"> -->
			<?php //if ($comments->isValidPreview()): ?>
			<input id="comments-submit" type="submit" name="<?= $comments->submitName() ?>" value="Submit">
			<?php //endif ?>
		</form>
	<?php endif ?>
</div>
