<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
			<?php astra_content_bottom(); ?>

			</div> <!-- ast-container -->

		</div><!-- #content -->

		<?php astra_content_after(); ?>

		<?php astra_footer_before(); ?>

		<?php astra_footer(); ?>

		<?php astra_footer_after(); ?>

	</div><!-- #page -->

	<?php astra_body_bottom(); ?>

	<?php wp_footer(); ?>
<script>
jQuery('<form role="search" method="get" class="search-form" id="header-form" action="/" target="_self" ><input type="hidden" name="customize_messenger_channel" value="preview-1"><input type="hidden" name="customize_autosaved" value="on"><input type="hidden" name="customize_changeset_uuid" value="b6267886-8333-4cc4-b4d0-2d3dc7f3f15a"><label><span class="screen-reader-text">Search for:</span><input type="search" class="search-field" placeholder="Search …" value="" name="s" role="search" tabindex="-1"></label><button type="submit" class="search-submit" value="Search" aria-label="search submit"><i class="astra-search-icon"></i></button></form>').insertAfter(".site-logo-img");
jQuery('<header class="entry-header ast-no-thumbnail ast-no-meta" style="margin-bottom: 20px;"><h1 class="entry-title" itemprop="headline">Events</h1></header>').insertBefore('.tribe-events-page-template  header.tribe-events-header.tribe-events-header--has-event-search');

</script>
	</body>
	
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</html>
