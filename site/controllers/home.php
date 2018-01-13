<?php

/*

---------------------------------------
Home controller
---------------------------------------

This controller defines all variables used by
the home template: Each view ('search', 'query
variables' and 'posts') requires a given term,
the corresponding posts and their pagination.

The $perpage variable determines how many posts
should be shown per page.

The $types array consists of all files inside the
directory 'site/snippets/home', which makes it quite
easy to customise available query variables.

*/

return function($site, $pages, $page) {

  // Max number of posts shown per page
  $perpage  = $page->perpage()->int();

  // All query variables
  $types = dir::read(kirby()->roots()->snippets() . '/home');
  
  // Posts
  $posts = $page->children()
                ->visible()
                ->sortBy('sticky', 'desc', 'date', 'desc')
                ->paginate(($perpage >= 1)? $perpage : 5);

  // Posts by category
  $category = urldecode(param('category'));
  $postsByCategory = $page->children()
                          ->visible()
                          ->filterBy('category', $category, ',')
                          ->sortBy('sticky', 'desc', 'date', 'desc')
                          ->flip()
                          ->paginate(($perpage >= 1)? $perpage : 5);

  // Posts by tag
  $tag = urldecode(param('tag'));
  $postsByTag = $page->children()
                     ->visible()
                     ->filterBy('tags', $tag, ',')
                     ->sortBy('sticky', 'desc', 'date', 'desc')
                     ->paginate(($perpage >= 1)? $perpage : 5);

  // Posts by author
  $author = urldecode(param('author'));
  $user = $site->user($author);
  $postsByAuthor = $page->children()
                        ->visible()
                        ->filterBy('author', $author)
                        ->sortBy('sticky', 'desc', 'date', 'desc')
                        ->paginate(($perpage >= 1)? $perpage : 5);

  // Posts by year
  $year = param('year');
  $postsByYear = $page->children()
                      ->visible()
                      ->filter(function($child) use($year) { return $child->date('Y') === $year; })
                      ->sortBy('sticky', 'desc', 'date', 'desc')
                      ->paginate(($perpage >= 1)? $perpage : 5);

  // Posts by month
  $month = param('month');
  $postsByMonth = $page->children()
                       ->visible()
                       ->filter(function($child) use($year, $month) { return $child->date('Y') === $year && $child->date('F') === $month; })
                       ->sortBy('sticky', 'desc', 'date', 'desc')
                       ->paginate(($perpage >= 1)? $perpage : 5);

  // Posts by day
  $day = param('day');
  $postsByDay = $page->children()
                     ->visible()
                     ->filter(function($child) use($year, $month, $day) { return $child->date('Y') === $year && $child->date('F') === $month && $child->date('j') === $day; })
                     ->sortBy('sticky', 'desc', 'date', 'desc')
                     ->paginate(($perpage >= 1)? $perpage : 5);

  // Search results
  $query = get('s');
  $results = $site->search($query, 'title|intro|text')
                  ->sortBy('sticky', 'desc', 'date', 'desc')
                  ->paginate(($perpage >= 1)? $perpage : 5);

  return [
    'params'               => params(),
    'types'                => $types,

    'posts'                => $posts,
    'pagination'           => $posts->pagination(),

    'tag'                  => $tag,
    'postsByTag'           => $postsByTag,
    'paginationByTag'      => $postsByTag->pagination(),

    'category'             => $category,
    'postsByCategory'      => $postsByCategory,
    'paginationByCategory' => $postsByCategory->pagination(),

    'author'               => $author,
    'user'                 => $user,
    'postsByAuthor'        => $postsByAuthor,
    'paginationByAuthor'   => $postsByAuthor->pagination(),

    'year'                 => $year,
    'postsByYear'          => $postsByYear,
    'paginationByYear'     => $postsByYear->pagination(),

    'month'                => $month,
    'postsByMonth'         => $postsByMonth,
    'paginationByMonth'    => $postsByMonth->pagination(),

    'day'                  => $day,
    'postsByDay'           => $postsByDay,
    'paginationByDay'      => $postsByDay->pagination(),

    'query'                => $query,
    'results'              => $results,
    'paginationByResults'  => $results->pagination()
  ];
};
