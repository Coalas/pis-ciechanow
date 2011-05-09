<?php
/*
Template Name: Archives
*/
?>
<?php get_header(); ?>
<!-- Container -->

<div class="CON">
  <!-- Start SC -->
  <div class="SC">
    <?php include (TEMPLATEPATH . '/searchform.php'); ?>
    <h2>Archiwa według miesiąca:</h2>
    <ul>
      <?php wp_get_archives('type=monthly'); ?>
    </ul>
    <h2>Archiwa według tematu:</h2>
    <ul>
      <?php wp_list_categories(); ?>
    </ul>
  </div>
  <!-- End SC -->
  <?php get_sidebar(); ?>
  <div class="clr"></div>
</div>
<!-- End CON -->
<?php get_footer(); ?>
