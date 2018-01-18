<?php

/*

---------------------------------------
Archive controller
---------------------------------------

This controller defines all variables used by the archive template:
Each sorting option ('latest', 'by contributor / category / tag') requires
the corresponding posts.

Instead of querying the pre-defined categories, the archive will only list
those really used by published blog posts.

*/

return function($site, $pages, $page) {

  $posts = page('home')->children()
                       ->visible()
                       ->flip();

  // Latest posts
  $archiveLatest = $posts->limit(30);

  // Contributors
  $contributors = $site->users();

  // Categories
  $categories = $posts->pluck('category', ',', true);

  // Tags
  $tags = $posts->pluck('tags', ',', true);
  sort($tags);

  return [
    'posts' => $posts,
    'archiveLatest' => $archiveLatest,
    'contributors' => $contributors,
    'categories' => $categories,
    'tags' => $tags,
  ];
};
