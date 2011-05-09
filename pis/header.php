<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<?php $theTitle=wp_title(" - ", false); if($theTitle != "") { ?>
<title><?php echo wp_title("",false); ?>-
<?php bloginfo('name'); ?>
</title>
<?php } else { ?>
<title>
<?php bloginfo('name'); ?>
</title>
<?php } ?>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascript/tabs.js"></script>
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
</head>
<body>
<div id="bgcontainer">
  <!-- START Header -->
  <div class="Header">
    <!-- Start Logo -->
      <div class="Logo">
        <div class="LogoText">
          <h1><a href="<?php echo get_option('home'); ?>">
            <?php bloginfo('name'); ?>
            </a></h1>
        </div>
        <p class="Desc">
          <?php bloginfo('description'); ?>
        </p>
      </div>
      <!-- End Logo -->
    <?php include (TEMPLATEPATH . "/header_block.php"); ?>
    <div class="clr"></div>
  </div>
  <!-- END Header -->
