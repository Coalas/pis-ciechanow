<!-- Start Search
<div class="Search">
  <form action="/index.php" method="post">
    <input type="text" name="s" class="keyword" />
    <input name="submit" type="submit" class="search" title="Search" alt="Search" value="Search" />
  </form>
</div>
End Search -->
<div class="clr"></div>
<!-- Start Menu -->
<div class="Menu">
  <ul>
    <li><a href="<?php echo get_option('home'); ?>">
      <?php _e('Home'); ?>
      </a></li>
    <li><a href="<?php echo get_option('home'); ?>?page_id=2">
      <?php _e('About'); ?>
      </a></li>
  <li><a href="<?php echo get_option('home'); ?>?page_id=4">
      <?php _e('Galeria'); ?>
      </a></li>
    <li><a href="<?php echo get_option('home'); ?>?page_id=6">
      <?php _e('Do Pobrania'); ?>
      </a></li>
    <li><a href="<?php echo get_option('home'); ?>?page_id=8">
      <?php _e('Kontakt'); ?>
      </a></li>
  </ul>
</div>
<!-- End Menu -->
<div class="clr"></div>


