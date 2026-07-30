<?php
/**
 * Custom site footer.
 *
 * @package Area_B
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$site_name      = get_bloginfo( 'name' );
$current_year   = wp_date( 'Y' );
$sitemap_url    = home_url( '/sitemap_index.xml' );
$custom_logo_id = get_theme_mod( 'custom_logo' );
?>

<footer
	id="colophon"
	class="site-footer area-b-footer"
	itemscope
	itemtype="https://schema.org/WPFooter"
>
	<div class="area-b-footer__main">
		<div class="ast-container">
			<div class="area-b-footer__grid">

				<div class="area-b-footer__brand">
					<a
						class="area-b-footer__logo-link"
						href="<?php echo esc_url( home_url( '/' ) ); ?>"
						rel="home"
						aria-label="<?php echo esc_attr( $site_name ); ?>"
					>
						<?php
						if ( $custom_logo_id ) {
							echo wp_get_attachment_image(
								$custom_logo_id,
								'full',
								false,
								array(
									'class'   => 'area-b-footer__logo',
									'loading' => 'lazy',
									'alt'     => $site_name,
								)
							);
						} else {
							echo esc_html( $site_name );
						}
						?>
					</a>
				</div>

				<div class="area-b-footer__menu-column">
					<h2 class="area-b-footer__heading">
						<?php esc_html_e( 'Area B', 'aaareaber-child-theme' ); ?>
					</h2>

					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer_primary',
							'container'      => 'nav',
							'container_class'=> 'area-b-footer__navigation',
							'container_aria_label' => __( 'Area B footer links', 'aaareaber-child-theme' ),
							'menu_class'     => 'area-b-footer__menu',
							'fallback_cb'    => false,
							'depth'          => 1,
						)
					);
					?>
				</div>

				<div class="area-b-footer__menu-column">
					<h2 class="area-b-footer__heading">
						<?php esc_html_e( 'Service', 'aaareaber-child-theme' ); ?>
					</h2>

					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer_secondary',
							'container'      => 'nav',
							'container_class'=> 'area-b-footer__navigation',
							'container_aria_label' => __( 'Service footer links', 'aaareaber-child-theme' ),
							'menu_class'     => 'area-b-footer__menu',
							'fallback_cb'    => false,
							'depth'          => 1,
						)
					);
					?>
				</div>

				<div class="area-b-footer__menu-column">
					<h2 class="area-b-footer__heading">
						<?php esc_html_e( 'Information', 'aaareaber-child-theme' ); ?>
					</h2>

					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer_tertiary',
							'container'      => 'nav',
							'container_class'=> 'area-b-footer__navigation',
							'container_aria_label' => __( 'Information footer links', 'aaareaber-child-theme' ),
							'menu_class'     => 'area-b-footer__menu',
							'fallback_cb'    => false,
							'depth'          => 1,
						)
					);
					?>
				</div>

			</div>
		</div>
	</div>

	<div class="area-b-footer__bottom">
		<div class="ast-container">
			<div class="area-b-footer__bottom-inner">

				<nav
					class="area-b-footer__legal-navigation"
					aria-label="<?php esc_attr_e( 'Footer legal links', 'aaareaber-child-theme' ); ?>"
				>
					<?php
					if ( has_nav_menu( 'footer_legal' ) ) {
						wp_nav_menu(
							array(
								'theme_location' => 'footer_legal',
								'container'      => false,
								'menu_class'     => 'area-b-footer__legal-menu',
								'fallback_cb'    => false,
								'depth'          => 1,
							)
						);
					} else {
						?>
						<ul class="area-b-footer__legal-menu">
							<li>
								<a href="<?php echo esc_url( $sitemap_url ); ?>">
									<?php esc_html_e( 'Sitemap', 'aaareaber-child-theme' ); ?>
								</a>
							</li>
						</ul>
						<?php
					}
					?>
				</nav>

				<p class="area-b-footer__copyright">
					&copy;
					<?php echo esc_html( $current_year ); ?>
					<?php
					printf(
						/* translators: %s: Website name. */
						esc_html__( '%s', 'aaareaber-child-theme' ),
						esc_html( $site_name )
					);
					?>
				</p>

			</div>

			<?php do_action( 'area_b_footer_after_legal' ); ?>
		</div>
	</div>
</footer>
