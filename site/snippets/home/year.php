<?php if($postsByYear->count()) : ?>

<div class="page-title">
  <h4>Year: <?= $year ?>
    <?php e($paginationByYear->countPages() > 1,
      '<span>(page ' . $paginationByYear->page() . ' of ' . $paginationByYear->countPages() . ')</span>'
    ) ?>
  </h4>
</div><!-- page-title -->
<div class="clear"></div>

<?php foreach($postsByYear as $post): ?>
<?php snippet('loop', $post) ?>
<?php endforeach ?>

<?php snippet('home/partials/pagination', $paginationByYear) ?>

<?php else : ?>
<?php go('error') ?>
<?php endif ?>
