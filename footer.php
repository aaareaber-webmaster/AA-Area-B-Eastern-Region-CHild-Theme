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
jQuery('<header class="entry-header ast-no-thumbnail ast-no-meta" style="margin-bottom: 20px;"><h1 class="entry-title" itemprop="headline">Events</h1></header>').insertBefore('.tribe-events-page-template  header.tribe-events-header.tribe-events-header--has-event-search');

</script>
	</body>

</html>
