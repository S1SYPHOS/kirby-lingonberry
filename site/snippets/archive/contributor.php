<h3>Contributors</h3>
<ul>
  <?php foreach ($contributors as $contributor) : ?>
  <?php $contributorURL = url('home') . '/author:' . urlencode($contributor); ?>
  <li><a href="<?= $contributorURL ?>" title="Posts by <?= $contributor->firstName() . ' ' . $contributor->lastName() ?>">
    <?= $contributor->firstName() . ' ' . $contributor->lastName() ?>
  </a></li>
  <?php endforeach; ?>
</ul>