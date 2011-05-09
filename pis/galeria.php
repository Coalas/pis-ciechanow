<?php/*
Template Name: Galeria
*/
?>
<?php get_header(); ?>
<!-- Container -->

<div class="CON">
  <!-- Start SC -->
  <div class="SC">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="Post" id="post-<?php the_ID(); ?>">
      <h2 class="pagetitle">
        <?php the_title(); ?>
      </h2>
      <div class="clr"></div>
      <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
      <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
    </div>
    <div class="clr"></div>
    <div class="banner">
      <p><img src="<?php bloginfo('template_url'); ?>/images/banner.gif" width="468" height="60" alt="banners" /></p>
    </div>
    <?php if ( comments_open() ) comments_template(); ?>
    <?php endwhile; endif; ?>
    <?php edit_post_link('Edit this entry.', '<p class="edit_this">', '</p>'); ?>
  </div>
  <!-- End SC -->
  
  <div class="clr"></div>
</div>
<!-- End CON -->
<?php get_footer(); ?>


