<?php
  $author = $site->user($item->author());
?>

<div class="post-meta">
  <span class="post-date">
    <a href="<?= $item->url() ?>" title="<?= $item->date('g:i a') ?>">
      <?= $item->date('F j, Y') ?>
    </a>
  </span>

  <span class="date-sep"> / </span>
  <span class="post-author">
    <?php if($item->author()->isNotEmpty()) : ?>
    <?php $authorURL = url('home') . '/author:' . urlencode($author); ?>
    <a href="<?= $authorURL ?>" title="Posts by <?= $author->firstName() . ' ' . $author->lastName() ?>">
    <?= $author->firstName() . ' ' . $author->lastName() ?>
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
