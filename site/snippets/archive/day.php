<h3>Archives by Day</h3>
<ul>
  <?php foreach ($posts->group('postsByYear') as $year => $yearList) : ?>
  <?php foreach ($yearList->group('postsByMonth') as $month => $monthList) : ?>
  <?php foreach ($monthList->group('postsByDay') as $day => $dayList) : ?>
  <?php $dayURL = url('home') . '/year:' . $year . '/month:' . $month . '/day:' . $day; ?>
  <li><a href="<?= $dayURL ?>">
    <?= $month . ' ' . $day . ', ' .  $year ?>
  </a></li>
  <?php endforeach ?>
  <?php endforeach ?>
  <?php endforeach; ?>
</ul>
