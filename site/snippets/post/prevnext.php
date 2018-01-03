<div class="post-nav">
  <?php if($item->hasPrevVisible()): ?>
    <a class="post-nav-older" href="<?= $item->prevVisible()->url() ?>" rel="prev" title="Next post: <?= $item->prevVisible()->title()->html() ?>">
      &laquo; <?= $item->prevVisible()->title()->html() ?>
    </a>
  <?php endif ?>
  <?php if($item->hasNextVisible()): ?>
    <a class="post-nav-newer" href="<?= $item->nextVisible()->url() ?>" rel="next" title="Previous post: <?= $item->nextVisible()->title()->html() ?>">
      <?= $item->nextVisible()->title()->html() ?> &raquo;
    </a>
  <?php endif ?>
  <div class="clear"></div>
</div><!-- .post-nav -->
