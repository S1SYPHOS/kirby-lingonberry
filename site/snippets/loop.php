<?php
  $formats = c::get('lingonberry.post-formats');
  $template = $item->template();
  $intended = $item->intendedTemplate();
?>

<?php if($item->isChildOf('home')) : ?>

  <?php foreach($formats as $format) : ?>
  <?php if($intended == 'post.' . $format) : ?>
  <div class="post format-<?= $format ?>">
    <?php snippet('post/bubble', $item) ?>
    <div class="content-inner">
       <?php snippet('post/formats/' .  $format, $item) ?>
    </div><!-- .post content-inner -->
    <div class="clear"></div>
  </div><!-- .post -->
  <?php endif ?>
  <?php endforeach ?>

<?php else : ?>

  <div class="<?php e($page->isHomePage(), 'page', 'post')?>">
    <?php if($query = get('s')) { snippet('post/bubble', $item); } ?>
    <div class="content-inner">
      <div class="post-header">
        <h2 class="post-title">
          <?php if($page->isHomePage()) : ?><a href="<?= $item->url() ?>" rel="bookmark" title="<?= $item->title()->html() ?>"><?php endif ?>
            <?= $item->title()->html() ?>
          <?php if($page->isHomePage()) : ?></a><?php endif ?>
        </h2>
      </div><!-- .post-header -->
      <div class="post-content">
        <?php
          if($template !== 'default') { snippet('page/' . $template, $item); }
          else { snippet('page/default', $item); }
        ?>
      </div><!-- .post-content -->
      <div class="clear"></div>
    </div><!-- .post content-inner -->
    <div class="clear"></div>
  </div><!-- .post -->

<?php endif ?>
