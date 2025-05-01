<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'munbox' ); ?></a>

	<header class="site-header">
		<div class="site-header__logo">
			<?php
				if (function_exists('the_custom_logo')) {
					the_custom_logo();
				}
			?>
		</div>
		<nav class="site-header__nav">
			<?php wp_nav_menu( array(
				'theme_location' => 'main_menu',
				'container' => false,
				'menu_class' => 'nav__list',
				'menu_id' => '',
			)) ?>
		</nav>
		
		<div class="site-header__social">
			<ul class="site-header__social-list">
				<li class="site-header__social-item">
					<a href="#" class="site-header__social-link">
						<img src="<?php echo get_template_directory_uri(); ?>/src/img/SVG1.svg" alt="Facebook">
					</a>
				</li>
				<li class="site-header__social-item">
					<a href="#" class="site-header__social-link">
						<img src="<?php echo get_template_directory_uri(); ?>/src/img/SVG2.svg" alt="YouTube">
					</a>
				</li>
				<li class="site-header__social-item">
					<a href="#" class="site-header__social-link">
						<img src="<?php echo get_template_directory_uri(); ?>/src/img/SVG3.svg" alt="Instagram">
					</a>
				</li>
			</ul>
		</div>
	</header>