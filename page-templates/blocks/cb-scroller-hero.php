<?php
/**
 * Block template for CB Scroller Hero.
 *
 * @package cb-pbh202506
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="scroller-hero">
	<div class="container px-0">
		<?= wp_get_attachment_image( get_field( 'image' ), 'full', false, array( 'class' => 'scroller-hero__image' ) ); ?>
		<div class="overlay"></div>
	</div>
	<div class="scroller-hero__content">
		<div class="scroller-hero__content-wrapper">
			<div class="scroller-hero__scroll-container">
				<?php
				$title = get_field( 'title' );
				if ( $title ) {
					// Repeat the title multiple times for full width coverage
					for ( $i = 0; $i < 10; $i++ ) {
						echo '<h1 class="scroller-hero__title">' . esc_html( $title ) . '</h1>';
					}
				}
				?>
			</div>
		</div>
	</div>
</div>