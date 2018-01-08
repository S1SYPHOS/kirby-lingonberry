<?php if(!$page->isHomePage()) : ?>
<div class="post-header">
  <?php snippet('post/coverimage', $item) ?>
  <h1 class="post-title"><?= $item->title() ?></h1>
  <?php snippet('post/meta', $item) ?>
</div><!-- .post-header -->
<?php endif ?>
<div class="post-content">
  <blockquote>
    <?= $item->text()->kt() ?>
    <p><cite>
      <?php e($item->link()->isNotEmpty(), '<a href="' . $item->link() . '">') ?>
      <?= $item->source()->html() ?>
      <?php e($item->link()->isNotEmpty(), '</a>') ?>
    </cite></p>
  </blockquote>
</div><!-- .post-content -->
<div class="clear"></div>
<?php snippet('post/tags', $item) ?>
