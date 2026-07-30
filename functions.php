<?php
/**
 * alcoholicanonymous child theme Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package alcoholicanonymous child theme
 * @since 1.0.0
 */

function aaareaber_child_asset_version( string $relative_path ): string {
	$asset_path = get_stylesheet_directory() . $relative_path;

	return file_exists( $asset_path ) ? (string) filemtime( $asset_path ) : wp_get_theme()->get( 'Version' );
}

function child_enqueue_styles() {
	wp_enqueue_style(
		'local-fonts',
		get_stylesheet_directory_uri() . '/assets/css/fonts.css',
		array(),
		aaareaber_child_asset_version( '/assets/css/fonts.css' )
	);

	wp_enqueue_style(
		'alcoholicanonymous-child-theme-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'astra-theme-css', 'local-fonts' ),
		aaareaber_child_asset_version( '/style.css' ),
		'all'
	);
}
add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 20 );

function area_child_enqueue_header_script() {
	wp_enqueue_script(
		'area-header',
		get_stylesheet_directory_uri() . '/assets/js/header.js',
		array(),
		aaareaber_child_asset_version( '/assets/js/header.js' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'area_child_enqueue_header_script' );

/**
 * Register footer menus.
 */

function area_b_register_footer_menus(): void {
	register_nav_menus(
		array(
			'footer_primary'   => __( 'Footer Primary Links', 'aaareaber-child-theme' ),
			'footer_secondary' => __( 'Footer Secondary Links', 'aaareaber-child-theme' ),
			'footer_tertiary'  => __( 'Footer Tertiary Links', 'aaareaber-child-theme' ),
			'footer_legal'     => __( 'Footer Legal Links', 'aaareaber-child-theme' ),
		)
	);
}
add_action( 'after_setup_theme', 'area_b_register_footer_menus' );

/**
 * Render the custom site footer.
 *
 * Use this footer instead of Astra's classic footer markup.
 */

function area_b_render_custom_footer(): void {
	get_template_part( 'template-parts/footer/site-footer' );
}
remove_action( 'astra_footer', 'astra_footer_markup' );
remove_action( 'astra_footer_content', 'astra_footer_small_footer_template', 5 );
add_action( 'astra_footer', 'area_b_render_custom_footer', 20 );

/**
 * Load the custom footer stylesheet.
 */

function area_b_enqueue_footer_styles(): void {
	$stylesheet_path = get_stylesheet_directory() . '/assets/css/footer.css';

	wp_enqueue_style(
		'area-b-footer',
		get_stylesheet_directory_uri() . '/assets/css/footer.css',
		array(),
		file_exists( $stylesheet_path ) ? filemtime( $stylesheet_path ) : wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'area_b_enqueue_footer_styles' );

function my_login_logo_url() {
	return home_url( '/' );
}

add_filter( 'login_headerurl', 'my_login_logo_url' );

function aa_login_logo() {
	wp_enqueue_style(
		'aaareaber-login',
		get_stylesheet_directory_uri() . '/assets/css/login.css',
		array(),
		aaareaber_child_asset_version( '/assets/css/login.css' )
	);
}
add_action( 'login_enqueue_scripts', 'aa_login_logo' );


function my_login_logo_url_title() {
	return 'Alcoholics Anonymous Australia - AA Area B Eastern Region Australia';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


function replace_footer_notice() {
	return '<p id="footer-left" class="alignleft"><span id="footer-thankyou">Thank you for your service. :)</span></p>';
}
 
add_filter( 'admin_footer_text', 'replace_footer_notice' );


function show_post_excerpt( $excerpt ) {
	if ( post_password_required() ) {
		$excerpt = '';
	}

	return $excerpt;
}
add_filter( 'the_excerpt', 'show_post_excerpt' );

/**
 * Persistent object caching is intentionally not used on this site.
 */
add_filter( 'site_status_tests', function( $tests ) {
	unset( $tests['direct']['persistent_object_cache'] );

	return $tests;
} );
