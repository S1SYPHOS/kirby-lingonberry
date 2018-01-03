<div class="post-bubbles">
  <a href="<?= $item->url() ?>" class="format-bubble" title="<?= $item->title()->html() ?>"></a>
  <?php if($item->sticky()->int() == 1) : ?>
    <a href="<?= $item->url() ?>" title="Sticky post: <?= $item->title()->html() ?>" class="sticky-bubble">Sticky post</a>
  <?php endif; ?>
</div>
