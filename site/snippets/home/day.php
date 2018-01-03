<?php if($postsByDay->count()) : ?>

<div class="page-title">
  <h4>Date: <?= $month . ' ' . $day . ', ' . $year ?>
    <?php e($paginationByDay->countPages() > 1,
      '<span>(page ' . $paginationByDay->page() . ' of ' . $paginationByDay->countPages() . ')</span>'
    ) ?>
  </h4>
</div><!-- page-title -->
<div class="clear"></div>

<?php foreach($postsByDay as $post): ?>
<?php snippet('loop', $post) ?>
<?php endforeach ?>

<?php snippet('home/partials/pagination', $paginationByDay) ?>

<?php else : ?>
<?php go('error') ?>
<?php endif ?>
