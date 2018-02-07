        </div><!-- .posts -->
      </div><!-- .content section-inner -->
    </div><!-- /content -->

    <?php
      $categories = page('home')->children()->visible()->pluck('category', ',', true);
      $tags = page('home')->children()->visible()->pluck('tags', ',', true);
      sort($tags);
    ?>
    <div class="footer section">
      <div class="footer-inner section-inner">
        <div class="widgets">
          <div class="widget">
            <div class="widget-content">
              <h3 class="widget-title">Recent Posts</h3>
              <ul>
                <?php foreach(page('home')->children()->visible()->flip()->limit(5) as $recent) : ?>
                <li><a href="<?= $recent->url() ?>"><?= $recent->title()->html() ?></a></li>
                <?php endforeach?>
              </ul>
            </div><!-- .widget-content -->
            <div class="clear"></div>
          </div><!-- .widget -->
          <div class="clear"></div>
      <?php if(empty($categories) or empty($tags)): ?> <!-- if categories or tags are empty, move widget -->
       </div><!-- .widgets -->
       <div class="widgets">
      <?php endif ?>
          <div class="widget">
            <div class="widget-content">
              <h3 class="widget-title">About <?= $site->title()->html() ?></h3>
              <?= $site->description()->kt() ?>
            </div><!-- .widget-content -->
            <div class="clear"></div>
          </div><!-- .widget -->
          <div class="clear"></div>
        </div><!-- .widgets -->
       <?php if(!empty($categories)): ?> <!-- if categories are empty, don't display widget -->
        <div class="widgets">
          <div class="widget">
            <div class="widget-content">
              <h3 class="widget-title">Categories</h3>
              <ul>
                <?php foreach($categories as $category) : ?>
                <?php $categoryURL = url('home') . '/category:' . urlencode($category); ?>
                <li><a href="<?= $categoryURL ?>"><?= $category ?></a></li>
                <?php endforeach?>
              </ul>
            </div><!-- .widget-content -->
            <div class="clear"></div>
          </div><!-- .widget -->
          <div class="clear"></div>
        </div><!-- .widgets -->
       <?php endif ?> <!-- end of widget empty-check -->
       <?php if(!empty($tags)): ?>  <!-- if tags are empty, don't display widget -->
        <div class="widgets">
          <div class="widget widget_tag_cloud">
            <div class="widget-content">
              <h3 class="widget-title">Tagcloud</h3>
              <div class="tagcloud">
                <?php foreach($tags as $tag) : ?>
                <?php $tagURL = url('home') . '/tag:' . urlencode($tag); ?>
                <a href="<?= $tagURL ?>"><?= $tag ?></a>
                <?php endforeach?>
              </div>
            </div><!-- .widget-content -->
            <div class="clear"></div>
          </div><!-- .widget -->
          <div class="clear"></div>
        </div><!-- .widgets -->
        <?php endif ?> <!-- end of widget empty-check -->
        <div class="clear"></div>
      </div><!-- .footer-inner -->
    </div><!-- .footer -->

    <div class="credits section">
      <div class="credits-inner section-inner">
        <p class="credits-left">
          <span>Copyright</span> &copy; <?= date('Y') ?> <a href="<?= $site->url() ?>" title="<?= $site->title()->html() ?>"><?= $site->title()->html() ?></a>
        </p>
        <p class="credits-right">
          <?php e($site->footer()->isNotEmpty(), $site->footer()->ktRaw() . ' &mdash;') ?> <a title="To the Top" class="tothetop">Up &uarr;</a>
        </p>
        <div class="clear"></div>
      </div><!-- .credits-inner -->
    </div><!-- .credits -->

    <!-- JS -->
    <?= js(array(
      'assets/jquery.js',
      'assets/jquery-migrate.min.js',
      'assets/flexslider.min.js',
      'assets/global.js'
    )) ?>

  </body>
</html>
