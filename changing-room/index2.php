<?php get_header();?>
<div class="span-18 prepend-1">
<h1>Strona w aktualizacji</h1>
</div>
<div class="admin span-4 last">
<p><a href="<?php bloginfo('wpurl'); ?>/wp-admin/" rel="nofollow">admin</a></p>
</div>
<div class="sign span-11 prepend-1">
<?php if (get_option('cr_style')){?>
   	<img src="<?php bloginfo('template_url');?>/colours/<?php echo(get_option('cr_style'));?>/2.jpg" alt="Changing Room Sign"  border="1px"/>
<?php }else{ ?>
   	<img src="<?php bloginfo('template_url'); ?>/colours/red/cr.png" alt="Changing Room Sign" width="311" height="284" />
<?php } ?>
</div>
<div class="changing span-11 last">
<?php if (get_option('cr_tagline')){?>
   	<h2><?php echo(stripslashes(get_option('cr_tagline')));?></h2>
<?php }else{ ?>
	<h2>Strona w aktualizacji</h2>   	
<?php } ?>

<?php if (get_option('cr_fb')){?>
   	<a href="<?php echo(get_option('cr_fb'));?>" class="rsslight">&nbsp;</a>
<?php }else{ ?>
	<a href="<?php bloginfo('rss2_url');?>" class="rsslight">&nbsp;</a>
<?php } ?>
<?php if (get_option('cr_fbemail')){?>
   	<a href="<?php echo(get_option('cr_fbemail'));?>" class="emaillight">&nbsp;</a>
<?php } ?>

</div>
</div><!-- </container> -->
<?php wp_footer(); ?>
</body>
</html>
