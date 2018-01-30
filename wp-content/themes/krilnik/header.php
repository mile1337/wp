<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package krilnik
 */

?>

<!doctype html>
<html lang="hr">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="offcanvas">
			<ul class="main-nav">

					<?php 
						$navigation = array (
							'theme-location' => 'primary'
						);
					?>
					<?php wp_nav_menu( $navigation ); ?>
					<li><a href="index.html"><img src="<?php echo esc_url(get_template_directory_uri() );?>/img/layout/logo.png" alt="Krilnik"></a></li>

			</ul><!-- End main nav -->
		</div><!-- End Offcanvas -->

		<div class="main-hero">
			<img class="banner1" src="<?php echo esc_url( get_template_directory_uri() );?>/img/layout/header-banner.png" alt="banner"/><img class="banner2" style="background-image: url('<?php echo esc_url( get_template_directory_uri() );?>/img/layout/header-back.png');" src="<?php echo esc_url( get_template_directory_uri() );?>/img/layout/header-banner2.png" alt="banner"/>
			<header class="header header--fixed">
				
				<nav>
					<ul class="main-nav" id="main-nav">

							<?php 
								$navigation = array (
									'theme-location' => 'primary'
								);
							?>
							<?php wp_nav_menu( $navigation ); ?>

					</ul><!-- End main nav -->
					<h1 class="logo">
						<a href="index.html">
							<img src="img/layout/logo.png" alt="Krilnik">
						</a>
					</h1><!-- End Logo -->
					<ul class="ico-nav">
					<li><a href="404.html"><img src="<?php echo esc_url(get_template_directory_uri() );?>/img/icons/message.png" alt="message"></a></li>
						<li><a href="404.html"><img src="<?php echo esc_url(get_template_directory_uri() );?>/img/icons/call.png" alt="call"></a></li>
						<li><a href="404.html"><img src="<?php echo esc_url(get_template_directory_uri() );?>/img/icons/shop.png" alt="shop"></a></li>
						<li><a href="404.html"><img src="<?php echo esc_url(get_template_directory_uri() );?>/img/icons/login.png" alt="login"></a></li>
						<li><a href="404.html"><img src="<?php echo esc_url(get_template_directory_uri() );?>/img/icons/language.png" alt="language"></a></li>
					</ul><!-- End ico nav -->
				</nav>
				

				<button class="offcanvas-toggle">
					<span></span>
					<span></span>
					<span></span>
				</button><!-- End icon -->
			</header><!-- End header fixed -->			
		</div><!-- End main hero -->	
