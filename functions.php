<?php
/**
 * alcoholicanonymous child theme Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package alcoholicanonymous child theme
 * @since 1.0.0
 */

function child_enqueue_styles() {
	$style_path = get_stylesheet_directory() . '/style.css';

	wp_enqueue_style(
		'alcoholicanonymous-child-theme-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'astra-theme-css' ),
		file_exists( $style_path ) ? filemtime( $style_path ) : CHILD_THEME_ALCOHOLICANONYMOUS_CHILD_THEME_VERSION,
		'all'
	);
}
add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 20 );

function area_child_enqueue_header_script() {
	wp_enqueue_script(
		'area-header',
		get_stylesheet_directory_uri() . '/assets/js/header.js',
		array(),
		filemtime( get_stylesheet_directory() . '/assets/js/header.js' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'area_child_enqueue_header_script' );

function my_login_logo_url() {
	$home_login_url="https://aaareaber.org.au/";
    return $home_login_url;

}

add_filter( 'login_headerurl', 'my_login_logo_url' );

function aa_login_logo() { ?>
    <style type="text/css">
        body.login {background: #5e8183;}
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/aa-logo.svg);
            width: 200px; 
            height: 200px;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center center;
            margin: 0 auto 20px auto;
            display: block;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'aa_login_logo' );


function my_login_logo_url_title() {
    return 'Alcoholics Anonymous Australia - AA Area B Eastern Region Australia';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


function replace_footer_notice () {
 
echo '<p id="footer-left" class="alignleft"><span id="footer-thankyou">Thank you for your service. :)';
 
}
 
add_filter('admin_footer_text', 'replace_footer_notice');


function show_post_excerpt( $excerpt ) {
    if ( post_password_required() )
        $excerpt = '';
    return $excerpt;
}
add_filter( 'the_excerpt', 'show_post_excerpt' );

add_action( 'wp_footer', function() {
    ?>
    <script type="text/javascript">
        const yearSpan = document.getElementById("year");
        if (yearSpan) {
            yearSpan.outerHTML = new Date().getFullYear();
        }
    </script>
    <?php
});

/**
 * Filters out auto-update disabled warnings for plugins and 
 * persistent object cache warnings from Site Health
 */

function filter_plugin_updates( $value ) {
    if ( isset( $value ) && is_object( $value ) ) {
        unset( $value->response['ultimate-elementor/ultimate-elementor.php'] );
    }
    return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );

add_filter( 'site_status_tests', function( $tests ) {
    unset( $tests['direct']['persistent_object_cache'] );
    return $tests;
} );
