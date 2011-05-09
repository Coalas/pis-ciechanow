<?php get_header(); ?>
<!-- Container -->

<div class="CON">
  <!-- Start SC -->
  <div class="SC">
    <?php if (have_posts()) : ?>
    <h2 class="pagetitle">Search Results</h2>
    <!-- Start Nav -->
    <?php if (function_exists('wp_pagenavi')) { ?>
    <?php wp_pagenavi('','<br />'); ?>
    <?php } ?>
    <!-- End Nav -->
    <?php while (have_posts()) : the_post(); ?>
    <div class="Post" id="post-<?php the_ID(); ?>">
      <div class="PostHead">
        <div class="PostTime"> <strong class="month">
          <?php the_time('M') ?>
          </strong><br />
          <strong class="day">
          <?php the_time('jS') ?>
          </strong> </div>
        <h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark">
          <?php the_title(); ?>
          </a></h2>
          <div class="clr"></div>
        <div class="PostDate">Posted in <small class="PostCat">
          <?php the_category(', ') ?>
          </small> <small class="PostAuthor"> by
          <?php the_author() ?>
          </small></div>
        <div class="clr"></div>
      </div>
      <div class="PostContent" style="padding-top:0px;">
        <?php the_excerpt() ?>
      </div>
      <div class="clr"></div>
      <div class="PostCom">
        <ul>
          <li class="Com">
            <?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?>
          </li>
          <?php if (function_exists('the_tags')) { ?>
          <?php the_tags('<li class="Tags">Tags: ', ', ', '</li>'); ?>
          <?php } ?>
        </ul>
      </div>
      <div class="clr"></div>
    </div>
    <div class="clr"></div>
    <?php endwhile; ?>
    <!-- Start Nav -->
    <?php if (function_exists('wp_pagenavi')) { ?>
    <?php wp_pagenavi('','<br /><br />'); ?>
    <?php } ?>
    <!-- End Nav -->
    <?php else : ?>
    <h2 class="pagetitle">No posts found.</h2>
    <p>Try a different search?</p>
    <?php endif; ?>
  </div>
  <!-- End SC -->
  <?php get_sidebar(); ?>
  <div class="clr"></div>
</div>
<!-- End CON -->
<?php get_footer(); ?>
