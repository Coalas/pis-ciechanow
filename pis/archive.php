<?php get_header(); ?>
<!-- Container -->

<div class="CON">



</div>
 <div class="clr"></div>
  <!-- Start SC -->
  <div class="SC">
    <?php if (have_posts()) : ?>
    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
    <?php /* If this is a category archive */ if (is_category()) { ?>
    <h2 class="pagetitle">Archiwum : &#8216;<strong>
      <?php single_cat_title(); ?>
      </strong>&#8217; Category</h2>
    <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
    <h2 class="pagetitle">Archiwum dla
      <?php the_time('F jS, Y'); ?>
    </h2>
    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
    <h2 class="pagetitle">Archiwum dla
      <?php the_time('F, Y'); ?>
    </h2>
    <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
    <h2 class="pagetitle">Archiwum dla
      <?php the_time('Y'); ?>
    </h2>
    <?php /* If this is an author archive */ } elseif (is_author()) { ?>
    <h2 class="pagetitle">Autore</h2>
    <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
      <h2 class="pagetitle">Blog archiwum</h2>
      <?php } ?>
    <!-- Start Nav -->
    <?php if (function_exists('wp_pagenavi')) { ?>
    <?php wp_pagenavi(); ?>
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
        <div class="PostDate">Wpisano w  <small class="PostCat">
          <?php the_category(', ') ?>
          </small> <small class="PostAuthor"> by
          <?php the_author() ?>
          </small></div>
        <div class="clr"></div>
      </div>
    </div>
    <div class="clr"></div>
    <?php endwhile; ?>
    <!-- Start Nav -->
    <?php if (function_exists('wp_pagenavi')) { ?>
    <?php wp_pagenavi(); ?>
    <?php } ?>
    <!-- End Nav -->
    <?php else : ?>
    <h2 class="pagetitle">nie znaleziono</h2>
    <?php endif; ?>
  </div>
  <!-- End SC -->
  <?php get_sidebar(); ?>
  <div class="clr"></div>
</div>
<!-- End CON -->
<?php get_footer(); ?>
