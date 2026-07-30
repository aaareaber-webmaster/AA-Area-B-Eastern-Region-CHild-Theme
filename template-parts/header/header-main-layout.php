<?php
/**
 * Custom Primary Header
 *
 * Overrides Astra primary header layout.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$site_name      = get_bloginfo( 'name' );
$custom_logo_id = get_theme_mod( 'custom_logo' );
?>

<header class="area-site-header" role="banner">
	<div class="area-header-inner">

		<a
			class="area-header-logo"
			href="<?php echo esc_url( home_url( '/' ) ); ?>"
			rel="home"
		>
			<?php
			if ( $custom_logo_id ) {
				echo wp_get_attachment_image(
					$custom_logo_id,
					'full',
					false,
					array(
						'alt' => $site_name,
					)
				);
			} else {
				?>
				<img
					src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/aa-logo.svg' ); ?>"
					alt="<?php echo esc_attr( $site_name ); ?>"
				>
				<?php
			}
			?>
		</a>

		<button
			class="area-menu-toggle"
			type="button"
			aria-controls="area-primary-menu"
			aria-expanded="false"
		>
			<span class="screen-reader-text">
				<?php esc_html_e( 'Open menu', 'aaareaber-child-theme' ); ?>
			</span>

			<span aria-hidden="true"></span>
			<span aria-hidden="true"></span>
			<span aria-hidden="true"></span>
		</button>

		<nav class="area-primary-nav" aria-label="Primary navigation">
			<div class="area-mobile-menu-shell">
				<div class="area-mobile-menu-track">

					<div class="area-menu-panel area-menu-panel-root">
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
					</div>

				</div>
			</div>
		</nav>

	</div>
</header>
