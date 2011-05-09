<?php get_header();?>
<div id="headertop" class="span-18 prepend-1">
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
<div class="sign span-11 ">
<img id="down" src="<?php bloginfo('template_url');?>/arrd.png" width="20px"/>
</div>
<div class="changing span-11 prepend-1">
<h2>Zarząd Komitetu Prawo i Sprawiedliwość Powiatu Ciechanowskiego</h2>
<div class="arrowd span-11">
<img id="up" src="<?php bloginfo('template_url');?>/arru.png" width="20px"/>
</div>

</div>

<div id="zarzad" class="changing span-11 last">

<table>
<tr>
  <td><img src="<?php bloginfo('template_url');?>/1.jpg" /> </td>
  <td>Pełnomocnik Zarządu<br/>Robert Kołakowski</td>
</tr>
<tr>
  <td><img src="<?php bloginfo('template_url');?>/2.jpg" /> </td>
  <td>Skarbnik Zarządu<br/>Zofia Grażyna Balkowska</td>
</tr>
<tr>
  <td><img src="<?php bloginfo('template_url');?>/4.jpg" /> </td>
  <td>Członek Zarządu <br/>Jacek Kałwa</td>
</tr>
<tr>
  <td><img src="<?php bloginfo('template_url');?>/5.png" /> </td>
  <td>Członek Zarządu <br/>Wiesław Kownacki</td>
</tr>
<tr>
  <td><img src="<?php bloginfo('template_url');?>/3.jpg" /> </td>
  <td>Członek Zarządu <br/>Benedykt Pszczółkowski</td>
</tr>
</table>
</div>
</div><!-- </container> -->
<?php wp_footer(); ?>
</body>
</html>
