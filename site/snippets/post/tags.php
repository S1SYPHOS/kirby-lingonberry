<?php
  $categories = $item->category()->split();
  $lastCategory = a::last($categories);

  $tags = $item->tags()->split();
  $lastTag = a::last($tags);
?>

<?php if(!$page->isHomePage()) : ?>
  <div class="post-cat-tags">
    <?php if($item->category()->isNotEmpty()) : ?>
      <p class="post-categories">
        Categories: <?php foreach($categories as $category) : ?><?php $categoryURL = url('home') . '/category:' . urlencode($category); ?><?php e($category == $lastCategory, '<a href="' . $categoryURL . '">' . $category . '</a>', '<a href="' . $categoryURL . '">' . $category . '</a>, ') ?><?php endforeach ?>
      </p>
    <?php endif ?>
    <?php if($item->tags()->isNotEmpty()) : ?>
      <p class="post-tags">
        Tags: <?php foreach($tags as $tag) : ?><?php $tagURL = url('home') . '/tag:' . urlencode($tag); ?><?php e($tag == $lastTag, '<a href="' . $tagURL . '">' . $tag . '</a>', '<a href="' . $tagURL . '">' . $tag . '</a>, ') ?><?php endforeach ?>
      </p>
    <?php endif ?>
  </div>
<?php endif ?>
