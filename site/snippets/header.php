<!DOCTYPE html>
<html class="no-js" lang="<?= site()->language() ? site()->language()->code() : 'en' ?>">

  <?php snippet('head') ?>

  <?php
    $query = get('s');
    $intended = $page->intendedTemplate();
    // Body class for page type
    if($page->isHomePage()) { $type = 'home'; }
    elseif($page->isChildOf('home')) { $type = 'single'; }
    elseif($intended == 'contact') { $type = 'page contact'; }
    elseif($intended == 'archive') { $type = 'page archive'; }
    elseif($page->isErrorPage()) { $type = 'error404'; }
    else { $type = 'page'; }

    // Body class for search results page
    if($query && $site->search($query, 'title|intro|text')->count() == 0) { $search = ' search-no-results'; }
    elseif($query) { $search = ' search-results'; }
    else { $search = ''; }
  ?>

  <body class="<?= $type ?><?= $search ?><?php e($page->coverimage()->isNotEmpty(), ' has-featured-image') ?>">

    <?php snippet('navigation') ?>

    <div class="header section">
      <div class="header-inner section-inner">
        <!-- LOGO -->
        <?php if($image = $site->logo()->toFile()) : ?>
        <a href="<?= $site->url() ?>" title="<?= $site->title()->html() ?> | <?= $site->tagline()->html() ?>" rel="home" class="logo">
          <img src="<?= $image->url() ?>" alt="<?= $site->title()->html() ?>">
        </a>
        <?php else : ?>
        <a href="<?= $site->url() ?>" title="<?= $site->title()->html() ?> &mdash; <?= $site->tagline()->html() ?>" rel="home" class="logo noimg"></a>
        <?php endif ?>
        <!-- BLOG TITLE -->
        <h1 class="blog-title">
          <a href="<?= $site->url() ?>" title="<?= $site->title()->html() ?> &mdash; <?= $site->tagline()->html() ?>" rel="home">
          <?= $site->title()->html() ?>
          </a>
        </h1>
        <!-- NAV TOGGLE -->
        <div class="nav-toggle">
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
        </div>
        <div class="clear"></div>
      </div><!-- .header section -->
    </div><!-- .header-inner section-inner -->

    <div class="content section-inner">
      <div class="posts">
