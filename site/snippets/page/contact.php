<div class="<?php e($page->isHomePage(), 'page', 'post')?>">
  <?php if($query = get('s')) { snippet('post/bubble', $item); } ?>
  <div class="content-inner">
    <div class="post-header">
      <h2 class="post-title">
        <?php if($page->isHomePage()) : ?><a href="<?= $item->url() ?>" rel="bookmark" title="<?= $item->title()->html() ?>"><?php endif ?>
          <?= $item->title()->html() ?>
        <?php if($page->isHomePage()) : ?></a><?php endif ?>
      </h2>
    </div><!-- .post-header -->
    <div class="post-content">
      <?= $item->text()->kt() ?>
      <?php snippet('page/partials/contact-form') ?>
    </div><!-- .post-content -->
    <div class="clear"></div>
  </div><!-- .post content-inner -->
  <div class="clear"></div>
</div><!-- .post -->
