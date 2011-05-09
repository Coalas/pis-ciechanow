<?php get_header(); ?>
<!-- Container -->

<div class="CON">


</div>
<div class="clr"></div>
  <!-- Start SC -->
  <div class="SC">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="Post" id="post-<?php the_ID(); ?>">
      <div class="PostHead">
        <div class="PostTime"> <strong class="month">
          <?php the_time('M') ?>
          </strong><br />
          <strong class="day">
          <?php the_time('j') ?>
          </strong> </div>
        <h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark">
          <?php the_title(); ?>
          </a></h2>
          <div class="clr"></div>
        <div class="PostDate">Wpisano w <small class="PostCat">
          <?php the_category(', ') ?>
          </small> <small class="PostAuthor"> -
          <?php the_author() ?>
          </small></div>
        <div class="clr"></div>
      </div>
      <div class="PostContent">
        <?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
        <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
      </div>
      <?php if (function_exists('the_tags')) { ?>
      <?php the_tags('<div class="PostCom"><ul><li class="Tags">Tags: ', ', ', '</li> </ul></div>'); ?>
      <?php } ?>
    </div>
    <div class="clr"></div>
    
    <span class="Note"> 
    
    
    <?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
// Both Comments and Pings are open ?>
 
    <?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
// Only Pings are Open ?>
     
    <?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
// Comments are open, Pings are not ?>
   
    <?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
// Neither Comments, nor Pings are open ?>
  
    <?php } edit_post_link('Edit this entry.', '<p class="edit_this">', '</p>'); ?>
    </span>
    <?php if ( comments_open() ) comments_template(); ?>
    <?php endwhile; else: ?>
    <p>Brak wyników wyszukiwania.</p>
    <?php endif; ?>
  </div>
  <!-- End SC -->
  <?php get_sidebar(); ?>
  <div class="clr"></div>
</div>
<!-- End CON -->
<?php get_footer(); ?>
