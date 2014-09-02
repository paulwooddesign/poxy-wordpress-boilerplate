<!DOCTYPE html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
		<meta http-equiv="cleartype" content="on">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
		<meta content="yes" name="apple-mobile-web-app-capable" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />

		<?php //* GOGGLE FONTS / ?>
		<?php $menu_font = of_get_option('poxy_menu_font'); ?>
		<?php $heading_font = of_get_option('poxy_heading_font'); ?>
		<?php $sub_heading_font = of_get_option('poxy_sub_heading_font'); ?>
		<?php $body_font = of_get_option('poxy_body_font'); ?>
		<?php $slideshow_heading_font = of_get_option('poxy_slideshow_heading_font'); ?>
		<?php $slideshow_description_font = of_get_option('poxy_slideshow_description_font'); ?>

		<?php if ($menu_font != "") : ?>
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo(urlencode($menu_font)); ?>:regular,italic,bold,bolditalic" />
		<?php endif; ?>
		<?php if ($heading_font != "") : ?>
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo(urlencode($heading_font)); ?>:regular,italic,bold,bolditalic" />
		<?php endif; ?>
		<?php if ($sub_heading_font != "") : ?>
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo(urlencode($sub_heading_font)); ?>:regular,italic,bold,bolditalic" />
		<?php endif; ?>
		<?php if ($body_font != "" && $body_font != $heading_font) : ?>
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo(urlencode($body_font)); ?>:regular,italic,bold,bolditalic" />
		<?php endif; ?>
		<?php if ($slideshow_heading_font != "") : ?>
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo(urlencode($slideshow_heading_font)); ?>:regular,italic,bold,bolditalic" />
		<?php endif; ?>
		<?php if ($slideshow_description_font != "") : ?>
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo(urlencode($slideshow_description_font)); ?>:regular,italic,bold,bolditalic" />
		<?php endif; ?>
		<?php // GOOGLE FONTS */ ?>

		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

		<?php //* FAVICON / ?>
		<?php if (of_get_option('poxy_favicon') ) : ?>
		<link rel="shortcut icon" href="<?php echo of_get_option('poxy_favicon'); ?>" />
		<?php else : ?>
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<?php endif; ?>
		<?php // FAVICON */ ?>

		<?php wp_head(); ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>
	</head>

	<body id="<?php echo poxy_slug(); ?>" <?php body_class(); ?>>
		<div id="wrapper">
			<div class="mp-pusher" id="mp-pusher">
				<?php get_template_part( 'inc/nav/mobile' ); ?>
				<div id="container">

				<header id="header" class="<?php if(of_get_option('poxy_dark_header')) { echo "dark";}; ?> <?php echo of_get_option('poxy_header_position'); ?>">

					<?php get_template_part( 'inc/nav/top_nav_bar' ); ?>
					<?php get_template_part( 'inc/nav/block_menu' ); ?>
					<?php get_template_part( 'inc/nav/block_menu_small' ); ?>


					<section></section>
					<div class="clearboth"></div>
				</header>


				<div id="meat" class="relative <?php if(of_get_option('poxy_dark_meat')) { echo "dark";}; ?>">
