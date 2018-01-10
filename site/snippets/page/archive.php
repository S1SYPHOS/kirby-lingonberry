<?= $item->text()->kt() ?>
<?php if(!$page->isHomePage()) {
  echo '<hr>';
  snippet('page/partials/archive-box');
} ?>
