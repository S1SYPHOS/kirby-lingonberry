<?php
  $user = $site->user($item->author());
?>

<div class="post-meta">
  <span class="post-date">
    <a href="<?= $item->url() ?>" title="<?= $item->date('g:i a') ?>">
      <?= $item->date('F j, Y') ?>
    </a>
  </span>

  <span class="date-sep"> / </span>
  <span class="post-author">
    <?php if($user) : ?>
    <?php $authorURL = url('home') . '/author:' . urlencode($user); ?>
    <a href="<?= $authorURL ?>" title="Posts by <?= $user->firstName() . ' ' . $user->lastName() ?>">
    <?= $user->firstName() . ' ' . $user->lastName() ?>
    </a>
    <?php else : ?>
    Anonymous
    <?php endif ?>
  </span>

  <!-- Planned: Comments -->
  <!-- <span class="date-sep"> / </span> -->
  <!-- <span class="comment">0 Comments</span> -->

  <?php if($item->sticky()->int() == 1 && $item->coverimage()->isEmpty()) : ?>
  <span class="date-sep"> / </span>
  Sticky
  <?php endif ?>
</div><!-- .post-meta -->
