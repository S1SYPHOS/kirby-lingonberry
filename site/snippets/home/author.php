<?php if($user) : ?>

<div class="page-title">
  <h4>Author: <?= $user->firstName() . ' ' . $user->lastName() ?>
    <?php e($paginationByAuthor->countPages() > 1,
      '<span>(page ' . $paginationByAuthor->page() . ' of ' . $paginationByAuthor->countPages() . ')</span>'
    ) ?>
  </h4>
</div><!-- page-title -->
<div class="clear"></div>

<?php foreach($postsByAuthor as $post): ?>
<?php snippet('loop', $post) ?>
<?php endforeach ?>

<?php snippet('home/partials/pagination', $paginationByAuthor) ?>

<?php else : ?>
<?php go('error') ?>
<?php endif ?>