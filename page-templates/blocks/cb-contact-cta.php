<?php
/**
 * Block template for CB Contact CTA.
 *
 * @package cb-pbh202506
 */

defined( 'ABSPATH' ) || exit;

$cta_link = get_field( 'link' );
?>
<section class="cb-contact-cta" style="background-image: url(<?= esc_url( wp_get_attachment_image_url( get_field( 'background' ), 'full' ) ); ?>);">
	<div class="container h-100">
		<div class="row h-100">
			<div class="col-md-6 d-flex flex-column justify-content-center">
				<h2><?= esc_html( get_field( 'title' ) ); ?></h2>
				<a href="<?= esc_url( $cta_link['url'] ); ?>" class="button button-green align-self-start"><?= esc_html( $cta_link['title'] ); ?></a>
			</div>
		</div>
	</div>
</section>