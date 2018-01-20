<?php
  $formats = dir::read(kirby()->roots()->snippets() . '/post/formats');
  $template = $item->template();
  $intended = $item->intendedTemplate();
?>

<?php

/*

---------------------------------------
Loop snippet
---------------------------------------

This snippet controls the view depending on the
$item's (intended) template: It differentiates
between blog posts and pages, which are assigned
their specific content, embedded in code they share.

The $formats array consists of all files inside the
directory 'site/snippets/posts/formats', which makes
it quite easy to customise available post types.

*/

?>

<?php if($item->isChildOf('home')) : ?>

  <?php foreach($formats as $format) : ?>
  <?php
    $format = substr($format, 0, -4);
    if($intended == 'post.' . $format) :
  ?>
  <div class="post format-<?= $format ?><?php e(!$page->isHomePage(), ' single-format-' . $format) ?>">
    <?php snippet('post/bubble', $item) ?>
    <div class="content-inner">
       <?php snippet('post/formats/' .  $format, $item) ?>
    </div><!-- .post content-inner -->
    <div class="clear"></div>
    <?php if($format !== 'link') {
      snippet('post/tags', $item);
      echo '<div class="clear"></div>';
    } ?>
    <?php if($page->isChildOf('home')) {
      snippet('post/prevnext', $page);

      if(c::get('lingonberry.comments')) {
        if(c::get('lingonberry.comments.nested')) {
          snippet('post/comments/nested');
        } else {
          snippet('post/comments/normal');
        }
      }
    } ?>
  </div><!-- .post -->
  <?php endif ?>
  <?php endforeach ?>

<?php else : ?>

  <div class="<?php e($page->isHomePage(), 'page', 'post')?>">
    <?php if($query = get('s')) { snippet('post/bubble', $item); } ?>
    <div class="content-inner">
      <div class="post-header">
        <h2 class="post-title">
          <?php e($page->isHomePage(), '<a href="' . $item->url() . '" rel="bookmark" title="' . $item->title()->html() . '">') ?>
            <?= $item->title()->html() ?>
          <?php e($page->isHomePage(), '</a>') ?>
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
