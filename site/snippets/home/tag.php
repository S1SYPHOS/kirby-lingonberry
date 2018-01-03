<?php
  $tags = page('home')->children()->visible()->pluck('tags', ',', true);
?>

<?php if(in_array($tag, $tags)) : ?>

<div class="page-title">
  <h4>Tag: <?= $tag ?>
    <?php e($paginationByTag->page() > 1,
      '<span>(page ' . $paginationByTag->page() . ' of ' . $paginationByTag->countPages() . ')</span>'
    ) ?>
  </h4>
</div><!-- page-title -->
<div class="clear"></div>

<?php foreach($postsByTag as $post): ?>
<?php snippet('loop', $post) ?>
<?php endforeach ?>

<?php snippet('home/partials/pagination', $paginationByTag) ?>

<?php else : ?>
<?php go('error') ?>
<?php endif ?>
