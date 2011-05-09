<?php get_header(); ?>
<!-- Container -->

<div class="CON">



</div>
<div class="clr"></div>
  <!-- Start SC -->
  <div class="SC">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="Post" id="post-<?php the_ID(); ?>">
      <h2 class="pagetitle">
        <?php the_title(); ?>
      </h2>
      <div class="clr"></div>
      <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
      <?php wp_link_pages(array('before' => '<p><strong>Strony:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
    </div>
    <div class="clr"></div>
    
    <?php if ( comments_open() ) comments_template(); ?>
    <?php endwhile; endif; ?>
    <?php edit_post_link('Edit this entry.', '<p class="edit_this">', '</p>'); ?>
  </div>
  <!-- End SC -->
  <?php get_sidebar(); ?>
  <div class="clr"></div>
</div>
<!-- End CON -->
<?php get_footer(); ?>
