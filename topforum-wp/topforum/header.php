<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- Primary Meta Tags -->
		<title><?php bloginfo('name'); echo " | "; bloginfo('description'); ?></title>
		<meta
			name="title"
			content="TOP FORUM is an international business communication company. "
		/>
		<meta
			name="description"
			content="Our main idea is to take your business to the next level. To make this transformation happen you need to have a platform to meet hundreds of new clients and specialists, become aware of new trends and soak up fresh ideas from best experts."
		/>
		<!-- favicon -->
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo bloginfo('template_url'); ?>/assets/icons/favicon/apple-icon-57x57.png" />
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo bloginfo('template_url'); ?>/assets/icons/favicon/apple-icon-60x60.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo bloginfo('template_url'); ?>/assets/icons/favicon/apple-icon-72x72.png" />
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo bloginfo('template_url'); ?>/assets/icons/favicon/apple-icon-76x76.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo bloginfo('template_url'); ?>/assets/icons/favicon/apple-icon-114x114.png" />
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo bloginfo('template_url'); ?>/assets/icons/favicon/apple-icon-120x120.png" />
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo bloginfo('template_url'); ?>/assets/icons/favicon/apple-icon-144x144.png" />
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo bloginfo('template_url'); ?>/assets/icons/favicon/apple-icon-152x152.png" />
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo bloginfo('template_url'); ?>/assets/icons/favicon/apple-icon-180x180.png" />
		<link
			rel="icon"
			type="image/png"
			sizes="192x192"
			href="<?php echo bloginfo('template_url'); ?>/assets/icons/favicon/android-icon-192x192.png"
		/>
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo bloginfo('template_url'); ?>/assets/icons/favicon/favicon-32x32.png" />
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo bloginfo('template_url'); ?>/assets/icons/favicon/favicon-96x96.png" />
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo bloginfo('template_url'); ?>/assets/icons/favicon/favicon-16x16.png" />
		<link rel="manifest" href="<?php echo bloginfo('template_url'); ?>/assets/icons/favicon/manifest.json" />
		<meta name="msapplication-TileColor" content="#ffffff" />
		<meta name="msapplication-TileImage" content="<?php echo bloginfo('template_url'); ?>/assets/icons/favicon/ms-icon-144x144.png" />
		<meta name="theme-color" content="#ffffff" />
		<?php 
			wp_head(); 
		?>
	</head>
	<body>
		<!-- Header -->
		<header id="up">
			<nav class="topmenu">
				<div class="container">				
					<?php
						wp_nav_menu( [
							'theme_location'  => 'header_menu',
							'container'       => false,
							'menu_class'      => 'topmenu__list',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'items_wrap'      => '<ul class="topmenu__list">%3$s</ul>',
							'depth'           => 2,
						] ); 
					?>					
					<?php
						wp_nav_menu( [
							'theme_location'  => 'mobile_menu',
							'container'       => false,
							'menu_class'      => 'topmenu__mobile',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'items_wrap'      => '<ul class="topmenu__mobile"><li class="topmenu__close">&times;</li>%3$s<a href="http://topforum/registration/" class="btn btn_reg">Register now</a></ul>',
							'depth'           => 1,
						] ); 
					?>					
					<a href="#" class="btn btn_topmenu">Top forum club</a>
				</div>
				<div class="hamburger">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</nav>
			<div class="subheader">
				<div class="container">
					<div class="subheader__logo">
						<?php the_custom_logo(); ?>
					</div>
					<nav class="subheader__menu">
						<?php
							wp_nav_menu( [
								'theme_location'  => 'subheader_menu',
								'container'       => false,
								'menu_class'      => 'subheader__menu-list',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
								'items_wrap'      => '<ul class="subheader__menu-list">%3$s</ul>',
								'depth'           => 1,
							] ); 
						?>
						<a href="<?php echo home_url( '/registration' ); ?>" class="btn btn_reg">Register now</a>
					</nav>
				</div>
			</div>
		</header>
		<!-- / Header -->