<?php if($posts->count()) : ?>

<?php if($pagination->page() > 1) : ?>
  <div class="page-title">
    <h4>Page <?= $pagination->page() ?> of <?= $pagination->countPages() ?></h4>
  </div>
  <div class="clear"></div>
<?php endif ?>

<?php foreach ($posts as $post) : ?>
<?php snippet('loop', $post) ?>
<?php endforeach ?>

<?php snippet('home/partials/pagination', $pagination) ?>

<?php else : ?>
<?php snippet('home/partials/no-posts') ?>
<?php endif ?>
