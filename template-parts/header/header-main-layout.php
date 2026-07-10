<?php
/**
 * Custom Primary Header
 *
 * Overrides Astra primary header layout.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<header class="area-site-header" role="banner">
	<div class="area-header-inner">

		<a class="area-header-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img
				src="/wp-content/uploads/2021/12/Alcoholics-Anonymous-logo.png"
				alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
			>
		</a>

		<button class="area-menu-toggle" type="button" aria-controls="area-primary-menu" aria-expanded="false">
			<span class="screen-reader-text">Menu</span>
			<span></span>
			<span></span>
			<span></span>
		</button>

		<nav class="area-primary-nav" aria-label="Primary navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'        => 'area-primary-menu',
					'menu_class'     => 'area-primary-menu',
					'container'      => false,
					'fallback_cb'    => false,
				)
			);
			?>
		</nav>

	</div>
</header>