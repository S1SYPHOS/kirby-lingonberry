<?php snippet('header') ?>

<?php if($category) : ?>

<?php snippet('home/category') ?>

<?php elseif($tag) : ?>

<?php snippet('home/tag') ?>

<?php elseif($author) : ?>

<?php snippet('home/author') ?>

<?php elseif($year && $month && $day) : ?>

<?php snippet('home/day') ?>

<?php elseif($year && $month) : ?>

<?php snippet('home/month') ?>

<?php elseif($year) : ?>

<?php snippet('home/year') ?>

<?php elseif($query) : ?>

<?php snippet('home/search') ?>

<?php else : ?>

<?php snippet('home/posts') ?>

<?php endif ?>

<?php snippet('footer') ?>
