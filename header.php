<!doctype html>
<!--[if IEMobile 7]><html class="no-js iem7 oldie" itemscope itemtype="http://schema.org/Organization"><![endif]-->
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang="en" itemscope itemtype="http://schema.org/Organization"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js ie7 oldie" lang="en" itemscope itemtype="http://schema.org/Organization"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js ie8 oldie" lang="en" itemscope itemtype="http://schema.org/Organization"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="en" itemscope itemtype="http://schema.org/Organization"><!--<![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!--><html class="no-js" lang="en" itemscope itemtype="http://schema.org/Organization"><!--<![endif]-->

<head>
    <meta charset="utf-8">
    <?php get_template_part('inc/models/seo-titles'); ?>
    
	<?php wp_head(); ?>

<?php
// This is technically bad practice, but it's annoying whenever plugins don't 
// enqueue their scripts and styles correctly. This ensures 98% of the time 
// that my styles will override the others.
?>
	<link href="<?php echo get_stylesheet_uri() ?>" media="screen, projection" rel="stylesheet" type="text/css" />

    <!--[if lte IE 8]>
        <link href="<?php echo CUR_ASSETS; ?>css/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
        <![endif]-->

	<meta http-equiv="cleartype" content="on">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!--[if lt IE 7 ]><script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script><script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script><![endif]-->

</head>
<body <?php body_class(); ?>>

<section id="wrapper">
<header>
	<div class="container">
		<h1 id="logo">
			<a href="<?php echo home_url(); ?>">
				 <img src="<?php echo CUR_ASSETS;  ?>/img/logo.jpg" alt="<?php echo bloginfo('title');?>" />
			</a>
		</h1>
	</div>

	<?php get_template_part('inc/models/page-header'); ?>

</header>
<section id="main-content" class="container">
