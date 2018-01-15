<?php

// Fetch comments object for this page
$comments = $page->comments();
// Process new comments and store the completion status
$status = $comments->process();

?>
<form method="post" action="#comment-<?php echo $comments->nextCommentId() ?>" accept-charset="utf-8">
	<?php

	// This recursive function is used to render nested comments
	function renderComment($comment, $nesting_level)
	{
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

	<?php if ($comments->isSuccessfulSubmission()): ?>
		<br>
		<p class="thank-you">Thank you for your comment!</p>
	<?php else: ?>
		<?php if ($status->isUserError()): ?>
			<p id="comment-<?php echo $comments->nextCommentId() ?>" class="error">
				<?php echo $status->getMessage() ?>
			</p>
		<?php endif ?>

		<h2>Write a Comment</h2>

		<div>
			<input type="radio" name="reply-to" value="0"<?php e(0 == $comments->customFieldValue('reply-to'), ' checked') ?> id="reply-to-0">
			<label for="reply-to-0">Don’t reply to any comment</label>
		</div>

		<label for="name">Name</label>
		<input type="text" id="name" name="<?php echo $comments->nameName() ?>" value="<?php echo $comments->nameValue() ?>">

		<label for="message">Message</label>
		<textarea id="message" name="<?php echo $comments->messageName() ?>"><?php echo $comments->messageValue() ?></textarea>

		<input type="hidden" name="<?php echo $comments->sessionIdName() ?>" value="<?php echo $comments->sessionId() ?>">

		<div hidden style="display: none">
		  <input type="text" name="<?= $comments->honeypotName() ?>" value="<?= $comments->honeypotValue() ?>">
		</div>

		<input type="submit" name="<?php echo $comments->previewName() ?>" value="Preview">
		<?php if ($comments->isValidPreview()): ?>
			<input type="submit" name="<?php echo $comments->submitName() ?>" value="Submit" id="comments-submit">
		<?php endif ?>
	<?php endif ?>
</form>
