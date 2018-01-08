<div class="post-header">
  <?php snippet('post/flexslider', $item) ?>
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
  <?= $item->intro()->kt() ?>
  <?php e(!$page->isHomePage(), $item->text()->kt()) ?>
  <?php if($page->isHomePage()) : ?>
  <p>
    <a href="<?= $item->url() ?>" class="more-link">Continue reading</a>
  </p>
  <?php endif ?>
</div><!-- .post-content -->
<div class="clear"></div>
<?php snippet('post/tags', $item) ?>
