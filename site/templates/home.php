<?php snippet('header') ?>

<?php

/*

---------------------------------------
Home template
---------------------------------------

This template controls the view depending on user
input: It differentiates between 'search', 'query
variables' (or 'parameters', such as tags, author,
category etc) and the normal 'posts' (blog) view.

The $types array consists of all files inside the
directory 'site/snippets/home', which makes it quite
easy to customise available query variables.

*/

?>

<?php
  if($query) { /* search results */
    snippet('home/search');
  } elseif (count($params) == 1 && !param('page') || count($params) > 1) {
    if($year && $month && $day) {
      snippet('home/day'); /* day */
    } elseif ($year && $month) {
      snippet('home/month'); /* month */
    } else {
      foreach($types as $type) { /* author, category, tag, year */
        $type = substr($type, 0, -4);
        if (param($type)) { snippet('home/' . $type); }
      }
    }
  } else { snippet('home/posts'); }
?>

<?php snippet('footer') ?>
