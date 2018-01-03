<?php snippet('header') ?>

<?php snippet('loop', $page) ?>

<?php if($page->isChildOf('home')) : ?>
<?php snippet('post/prevnext', $page) ?>
<?php endif ?>

<?php snippet('footer') ?>
