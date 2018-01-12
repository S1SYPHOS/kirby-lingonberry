<head profile="http://gmpg.org/xfn/11">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>
    <?php e($page->isHomePage(),
      $site->title() . ' &#8211; ' . $site->tagline(),
      $page->title() . ' &#8211; ' . $site->title()
    ) ?>
  </title>

  <script>document.documentElement.className = document.documentElement.className.replace("no-js","js");</script>

  <!-- CSS -->
  <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i|Raleway:400,500,600&amp;subset=latin-ext" rel="stylesheet">
  <?= css('assets/style.css') ?>

  <?php if($site->color() != '#ff706c') : ?>
  <!-- CUSTOM COLORS -->
  <style>
    body a,
    body a:hover,
    .format-quote .post-content blockquote cite a:hover,
    .single-format-quote .post-content blockquote cite a,
    #wp-calendar a { color: <?= $site->color() ?> }

    .header,
    .post-nav a:hover,
    .post-content fieldset legend,
    .post-content input[type="submit"]:hover,
    .post-content input[type="reset"]:hover,
    .post-content input[type="button"]:hover,
    .tagcloud a:hover { background: <?= $site->color() ?> }

    .post-bubbles a:hover,
    .comment-form input[type="submit"]:hover { background-color: <?= $site->color() ?> }
  </style>
  <?php endif?>

  <!-- RSS Feed -->
  <link rel="alternate" type="application/rss+xml" title="<?= $site->title()->html() . ' &raquo; ' . page('feed')->title()->html() ?>" href="<?= url('feed') ?>">
</head>