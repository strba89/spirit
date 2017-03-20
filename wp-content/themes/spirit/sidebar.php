<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Spirit
 * @since Spirit 1.0
 */
?>
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
			<?php endif; // end sidebar widget area ?>
		</div><!-- #secondary .widget-area -->
	<?php endif; //if is_active_sidebar( 'sidebar-1' ) ?>
