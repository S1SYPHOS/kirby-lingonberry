<?php
  $string = $item->intendedTemplate();
  $format = substr($string, 5);
?>

<div class="post format-<?= $format ?>">
  <?php snippet('post/bubble', $item) ?>
  <div class="content-inner">
    <?php snippet('post/coverimage', $item) ?>
    <div class="post-header<?php e($page->isHomePage(), ' hidden')?>">
      <?php if($page->isHomePage()) : ?>
      <h2 class="post-title">
        <a href="<?= $item->url() ?>" rel="bookmark" title="<?= $item->title()->html() ?>"><?= $item->title()->html() ?></a>
      </h2>
      <?php else : ?>
      <h1 class="post-title"><?= $item->title() ?></h1>
      <?php endif ?>
      <?php snippet('post/meta', $item) ?>
    </div><!-- .post-header -->
    <div class="post-content">
      <?= $item->text()->kt() ?>
    </div><!-- .post-content -->
    <div class="clear"></div>
    <?php snippet('post/tags', $item) ?>
  </div><!-- .post content-inner -->
  <div class="clear"></div>
</div><!-- .post -->
