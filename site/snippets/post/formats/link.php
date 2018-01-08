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
