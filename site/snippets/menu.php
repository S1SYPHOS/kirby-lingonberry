<?php
  $items = $pages->visible();
  if($items->count()) :
?>
<?php foreach($items as $item) : ?>
<li<?php e($item->hasVisibleChildren() and $item !== page('home'), ' class="has-children"') ?>>
  <a href="<?= $item->url() ?>">
  <?= $item->title()->html() ?>
  </a>
  <?php
    $children = $item->children()->visible();
    if($children->count() > 0 && $item !== page('home')) :
  ?>
  <ul>
    <?php foreach($children as $child) : ?>
    <li<?php e($child->hasVisibleChildren(), ' class="has-children"') ?>>
      <a href="<?= $child->url() ?>">
      <?= $child->title()->html() ?>
      </a>
      <?php
        $grandchildren = $child->children()->visible();
        if($grandchildren->count() > 0) :
      ?>
      <ul>
        <?php foreach($grandchildren as $grandchild) : ?>
        <li>
          <a href="<?= $grandchild->url() ?>">
          <?= $grandchild->title()->html() ?>
          </a>
        </li>
        <?php endforeach ?>
      </ul>
      <?php endif ?>
    </li>
    <?php endforeach ?>
  </ul>
  <?php endif ?>
</li>
<?php endforeach ?>
<?php endif ?>
