<?php if($image = $item->coverimage()->toFile()) : ?>
<div class="featured-media">
  <a href="<?= $item->url() ?>">
    <img src="<?= $image->resize(766, null, 85)->url() ?>" rel="bookmark" title="<?= $item->title()->html() ?>"<?php e($image->alt()->isNotEmpty(), ' alt="' . $image->alt()->html() . '"') ?>>
    <?php if($image->caption()->isNotEmpty()) : ?>
    <div class="media-caption-container">
      <p class="media-caption">
        <?= $image->caption()->html() ?>
      </p>
    </div>
    <?php endif ?>
  </a>
</div>
<?php endif ?>