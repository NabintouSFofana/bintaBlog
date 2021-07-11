<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js lt-ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<?php global $clymene_option; ?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
	<!-- Page Title 
	================================================== -->
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="shortcut icon" href="<?php echo esc_url($theme_option['favicon']['url']); ?>" type="image/png">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if($clymene_option['show_pre'] == 'yes') {?>
	<div <?php if($clymene_option['show_pre']=='yes') { ?> class="animsition"<?php } ?>>
<?php } ?>
	<div class="header-top">

		<header class="cd-main-header">
			<a class="cd-logo" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($clymene_option['logo']['url']); ?>" alt=""></a>

			<ul class="cd-header-buttons">
				<li><a class="cd-search-trigger" href="#cd-search"><span></span></a></li>
				<li><a class="cd-nav-trigger" href="#cd-primary-nav"><span></span></a></li>
			</ul> <!-- cd-header-buttons -->
		</header>
		
		<nav class="cd-nav">				
			<?php
			 $primarymenu = array(
					'theme_location'  => 'primary',
					'menu'            => '',
					'container'       => '',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => 'cd-primary-nav',
					'menu_id'         => 'cd-primary-nav',
					'echo'            => true,
					'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
					'walker'          => new wp_bootstrap_navwalker(),
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul data-breakpoint="800" id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 0,
				);
				if ( has_nav_menu( 'primary' ) ) {
					wp_nav_menu( $primarymenu );
				}
			?>
		</nav>
			
		<div id="cd-search" class="cd-search">
			<form action="<?php echo esc_url(home_url('/')); ?>">
				<input type="search" name="s" placeholder="<?php _e('Search...','clymene'); ?>">
			</form>
		</div>
	</div>	

	<main class="cd-main-content">