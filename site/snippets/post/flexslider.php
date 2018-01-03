<?php if($item->gallery()->isNotEmpty()) : ?>
<div class="featured-media">
  <div class="flexslider">
    <ul class="slides">
      <?php foreach($item->gallery()->yaml() as $image) : ?>
        <?php if($image = $item->image($image)) : ?>
          <li>
            <?= $image->resize(766, null, 85)->html(); ?>
            <?php if($image->caption()->isNotEmpty()) : ?>
              <div class="media-caption-container">
                <p class="media-caption">
                  <?= $image->caption()->html() ?>
                </p>
              </div>
            <?php endif ?>
          </li>
        <?php endif ?>
      <?php endforeach; ?>
    </ul>
  </div><!-- .flexslider -->
</div>
<?php endif ?>
