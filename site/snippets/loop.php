<?php
  $formats = c::get('lingonberry.post-formats');
  $template = $item->template();
  $intended = $item->intendedTemplate();
?>

<?php if($item->isChildOf('home')) : ?>

  <?php foreach($formats as $format) : ?>
    <?php if($intended == 'post.' . $format) { snippet('post/formats/' .  $format, $item); } ?>
  <?php endforeach ?>

<?php else : ?>

  <?php
    if($template !== 'default') { snippet('page/' . $template, $item); }
    else { snippet('page/default', $item); }
  ?>

<?php endif ?>
