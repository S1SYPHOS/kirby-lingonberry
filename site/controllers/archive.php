<?php

return function($site, $pages, $page) {

  // Max number of posts shown per page
  // $perpage  = $page->perpage()->int();

  $posts = page('home')->children()
                       ->visible()
                       ->flip();

  // Latest posts
  $archiveLatest = $posts->limit(30);
                         // ->paginate(($perpage >= 1)? $perpage : 5);

  // Contributors
  $contributors = $site->users();

  // Categories
  $categories = $site->index()->pluck('category', ',', true);

  // Tags
  $tags = $posts->pluck('tags', ',', true);
  sort($tags);

  return [
    'posts' => $posts,
    'archiveLatest' => $archiveLatest,
    'pagination' => $archiveLatest->pagination(),
    'contributors' => $contributors,
    'categories' => $categories,
    'tags' => $tags,
  ];
};
