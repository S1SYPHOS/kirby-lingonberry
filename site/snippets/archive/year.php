<h3>Archives by Year</h3>
<ul>
  <?php foreach ($posts->group('postsByYear') as $year => $yearlist) : ?>
  <?php $yearURL = url('home') . '/year:' . $year; ?>
  <li><a href="<?= $yearURL ?>">
    <?= $year ?>
  </a></li>
  <?php endforeach; ?>
</ul>
