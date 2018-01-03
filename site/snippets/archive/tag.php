<h3>Archives by Tags</h3>
<ul>
  <?php foreach($tags as $tag) : ?>
  <?php $tagURL = url('home') . '/tag:' . urlencode($tag); ?>
  <li><a href="<?= $tagURL ?>">
    <?= $tag ?>
  </a></li>
  <?php endforeach?>
</ul>
