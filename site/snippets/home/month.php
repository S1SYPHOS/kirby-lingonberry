<?php if($postsByMonth->count()) : ?>

<div class="page-title">
  <h4>Month: <?= $month . ' ' . $year ?>
    <?php e($paginationByMonth->countPages() > 1,
      '<span>(page ' . $paginationByMonth->page() . ' of ' . $paginationByMonth->countPages() . ')</span>'
    ) ?>
  </h4>
</div><!-- page-title -->
<div class="clear"></div>

<?php foreach($postsByMonth as $post): ?>
<?php snippet('loop', $post) ?>
<?php endforeach ?>

<?php snippet('home/partials/pagination', $paginationByMonth) ?>

<?php else : ?>
<?php go('error') ?>
<?php endif ?>
