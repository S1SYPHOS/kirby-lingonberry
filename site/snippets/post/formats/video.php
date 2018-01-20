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
  <p><?= $item->covervideo() ?></p>
  <?= $item->text()->kt() ?>
</div><!-- .post-content -->
