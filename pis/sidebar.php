<div class="SR">
  <!-- Start SideBar -->
  <!-- Start Recent Comments/Articles -->
  <div class="Recent">
    <h2 id="tab10" class="active" onclick="ShowTab(1,0)">
      <?php _e('Nowe Artykuły'); ?>
    </h2>
    <h2 id="tab11" onclick="ShowTab(1,1)">
      <?php _e('Comments'); ?>
    </h2>
    <h2 id="tab12" onclick="ShowTab(1,2)">
      <?php _e('Archiwa'); ?>
    </h2>
    <div class="clr"></div>
    <div class="TabContent" id="div10" style="display:block;">
      <ul>
        <?php mdv_recent_posts(); ?>
	
      </ul>
    </div>
    <div class="TabContent" id="div11" style="display:none;">
      <ul>
        <?php mdv_recent_comments(); ?>
      </ul>
    </div>
    <!-- Start Meta -->
    <div class="TabContent" id="div12" style="display:none;">
      <ul>
         <?php wp_get_archives('type=monthly'); ?>
      </ul>
    </div>
    <!-- End Meta -->
  </div>
  <!-- End Recent Comments/Articles -->
  <div class="SRL">
   
    
  
  <?php     /* Widgetized sidebar, if you have the plugin installed. */
    if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>   
  <!-- Start Flickr Photostream -->
  <div class="widget_flickrrss">
    <h2>
      <?php _e('Flickr Photo'); ?>
    </h2>
    <?php if (function_exists('get_flickrRSS')) { ?>
    <ul>
      <?php get_flickrRSS(5, "community", "london,people", "square", "<li>", "</li>", "34427469792@N01"); ?>
    </ul>
    <?php } ?>
    <div class="clr"></div>
  </div>
  <!-- End Flickr Photostream -->
  <?php endif; ?>
  </div>
  <!-- End SideBar -->
</div>
