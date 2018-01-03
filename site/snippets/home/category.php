<?php
  $categories = page('home')->children()->visible()->pluck('category', ',', true);
?>

<?php if(in_array($category, $categories)) : ?>

<div class="page-title">
  <h4>Category: <?= $category ?>
    <?php e($paginationByCategory->page() > 1,
      '<span>(page ' . $paginationByCategory->page() . ' of ' . $paginationByCategory->countPages() . ')</span>'
    ) ?>
  </h4>
</div><!-- page-title -->
<div class="clear"></div>

<?php foreach($postsByCategory as $post): ?>
<?php snippet('loop', $post) ?>
<?php endforeach ?>

<?php snippet('home/partials/pagination', $paginationByCategory) ?>

<?php else : ?>
<?php go('error') ?>
<?php endif ?>
