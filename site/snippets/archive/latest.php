<h3>Last 30 Posts</h3>
<ul>
  <?php foreach ($archiveLatest as $post) : ?>
  <li><a href="<?= $post->url() ?>">
    <?= $post->title()->html() ?> <span>(<?= $post->date('F j, Y') ?>)</span>
  </a></li>
  <?php endforeach; ?>
</ul>
