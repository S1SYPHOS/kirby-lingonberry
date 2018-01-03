<div class="post">
  <?php snippet('post/bubble', $item) ?>
  <div class="content-inner">
    <div class="post-content">
      <?php e($site->error()->isNotEmpty(), $site->error()->kt()) ?>
      <?php snippet('search-form') ?>
    </div><!-- .post-content -->
    <div class="clear"></div>
  </div><!-- .post content-inner -->
  <div class="clear"></div>
</div><!-- .post -->
