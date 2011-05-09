<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<h2>Search</h2>
<input type="text" class="key"  value="Search..." name="s" id="s" onfocus="if(this.value=='Search...')this.value=''" onblur="if(this.value=='')this.value='Search...'" />
<div class="bt">
<input name="submit" type="image" class="search" title="Search" src="<?php bloginfo('template_url'); ?>/images/GO.gif" alt="Search" />
</div>
</form>