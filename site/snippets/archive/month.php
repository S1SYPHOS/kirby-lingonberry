<h3>Archives by Month</h3>
<ul>
  <?php foreach ($posts->group('postsByYear') as $year => $yearList) : ?>
  <?php foreach ($yearList->group('postsByMonth') as $month => $monthList) : ?>
  <?php $monthURL = url('home') . '/year:' . $year . '/month:' . $month; ?>
  <li><a href="<?= $monthURL ?>">
    <?= $month . ' ' . $year ?>
  </a></li>
  <?php endforeach ?>
  <?php endforeach; ?>
</ul>
