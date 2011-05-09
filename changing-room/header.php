<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(' '); ?> <?php if(wp_title(' ', false)) { echo ' : '; } ?><?php bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/blueprint/screen.css" type="text/css" media=
"screen, projection" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/blueprint/print.css" type="text/css" media="print" />
<!--[if IE]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if (get_option('cr_style')){?>
   <link rel="stylesheet" href="<?php bloginfo('template_url');?>/colours/<?php echo(get_option('cr_style'));?>.css" type="text/css" media="screen" />
<?php }else{ ?>
   <link rel="stylesheet" href="<?php bloginfo('template_url');?>/colours/red.css" type="text/css" media="screen" />
<?php } ?>
<?php wp_enqueue_script("jquery"); ?>

<?php wp_head(); ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/snowfall.min.jquery.js"></script>
<script type="text/javascript">
 
jQuery(document).ready(function() {
jQuery("#down").click(function() {
jQuery('html').animate({
scrollTop: jQuery("#zarzad").offset().top
}, 2000);
});
jQuery("#up").click(function() {
jQuery('html').animate({
scrollTop: jQuery("#headertop").offset().top
}, 2000);
});
jQuery(document).snowfall({round : true, minSize: 5, maxSize:8}); // add rounded
});
</script>

</head>
<body>
<div class="container">
