<?php
  $string = $item->intendedTemplate();
  $format = substr($string, 5);
?>

<div class="post format-<?= $format ?><?php e(!$page->isHomePage(), ' single-format-' . $format) ?>">
  <?php snippet('post/bubble', $item) ?>
  <div class="content-inner">
    <?php if(!$page->isHomePage()) : ?>
    <div class="post-header">
      <h1 class="post-title"><?= $item->title() ?></h1>
      <?php snippet('post/meta', $item) ?>
    </div><!-- .post-header -->
    <?php endif ?>
    <div class="post-content">
      <?= $item->text()->kt() ?>
    </div><!-- .post-content -->
    <div class="clear"></div>
  </div><!-- .post content-inner -->
  <div class="clear"></div>
</div><!-- .post -->
