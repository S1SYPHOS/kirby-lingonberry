<div class="page-title">
  <h4>
    Search results: "<?= $query ?>"
    <?php e($paginationByResults->countPages() > 1 && $results->count() !== 0,
      '<span>(page ' . $paginationByResults->page() . ' of ' . $paginationByResults->countPages() . ')</span>'
    ) ?>
  </h4>
</div><!-- page-title -->
<div class="clear"></div>

<?php if($results->count()) : ?>

<?php foreach($results as $result) : ?>
<?php snippet('loop', $result) ?>
<?php endforeach ?>

<?php snippet('home/partials/pagination', $paginationByResults) ?>

<?php else : ?>

<?php snippet('home/partials/search-error', $page) ?>

<?php endif ?>
