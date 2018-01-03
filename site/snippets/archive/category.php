<h3>Archives by Categories</h3>
<ul>
  <?php foreach($categories as $category) : ?>
  <?php $categoryURL = url('home') . '/category:' . urlencode($category); ?>
  <li><a href="<?= $categoryURL ?>">
    <?= $category ?>
  </a></li>
  <?php endforeach?>
</ul>
