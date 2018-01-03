<?php if($item->countPages() > 1) : ?>
<div class="post-nav archive-nav">
  <?php if($item->hasNextPage()) : ?>
    <a class="post-nav-older" href="<?= $item->nextPageURL() ?>">&laquo; Older<span> posts</span></a>
  <?php endif ?>
  <?php if($item->hasPrevPage()) : ?>
  <a class="post-nav-newer" href="<?= $item->prevPageURL() ?>">Newer<span> posts</span> &raquo;</a>
  <?php endif ?>
  <div class="clear"></div>
</div>
<div class="clear"></div>
<?php endif ?>
