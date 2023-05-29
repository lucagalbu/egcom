<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package egcom
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<!-- Google fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:bold,regular">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<header id="masthead" class="d-flex justify-content-between align-items-center">
		<?php the_custom_logo(); ?>
		<nav id="site-navigation" class=" main-navigation">
			<!-- burger menu visible only on small screens (see style.css) -->
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<div class="burger-bar"></div>
				<div class="burger-bar"></div>
				<div class="burger-bar"></div>
			</button>

			<?php
			wp_nav_menu(array('theme_location' => 'header-menu', 'fallback_cb' => false, 'container' => ''));
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->