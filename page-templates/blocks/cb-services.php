<?php
/**
 * Block template for CB Services.
 *
 * @package cb-pbh202506
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="service_intro_panel">
	<div class="container h-100">
		<div class="row h-100 gx-5">
			<div class="col-md-6 d-flex flex-column justify-content-center">
				<h1><?= esc_html( get_field( 'title' ) ); ?></h1>
				<div class="service_intro"><?= wp_kses_post( get_field( 'services_intro' ) ); ?></div>
			</div>
			<div class="col-md-6 d-flex flex-column justify-content-center gap-4">
				<?php
				while ( have_rows( 'services' ) ) {
					the_row();
					$slug = acf_slugify( get_sub_field( 'service_name' ) );
					?>
				<a href="#<?= esc_attr( $slug ); ?>" class="service_link">
					<div class="service_icon"></div>
					<div class="service_card">
						<div class="service_background"></div>
						<div class="h2"><?= esc_html( get_sub_field( 'service_name' ) ); ?></div>
						<div class="service_intro">
							<?= wp_kses_post( get_sub_field( 'short_service_intro' ) ); ?>
						</div>
					</div>
				</a>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</section>
<?php
while ( have_rows( 'services' ) ) {
	the_row();
	$slug = acf_slugify( get_sub_field( 'service_name' ) );
	$bg   = wp_get_attachment_image_url( get_sub_field( 'service_background' ), 'full' );
	?>
<section class="service_panel" id="<?= esc_attr( $slug ); ?>" style="background-image:url(<?= esc_url( $bg ); ?>)" >
	<div class="overlay"></div>
	<div class="container h-100">
		<div class="row h-100 gx-5">
			<div class="col-md-6 d-flex flex-column justify-content-center">
				<h2><?= esc_html( get_sub_field( 'service_name' ) ); ?></h2>
				<div class="service_intro">
					<?= wp_kses_post( get_sub_field( 'service_intro' ) ); ?>
				</div>
			</div>
			<div class="col-md-6 d-flex flex-column justify-content-center">
				<?php
				// iterate over nested ACF repeater
				while ( have_rows( 'features' ) ) {
					the_row();
					?>
				<div class="service_detail" data-aos="fade-left" data-aos-delay="<?= esc_attr( 500 + ( get_row_index() * 100 ) ); ?>">
					<div class="service_icon"></div>
					<div class="service_inner">
						<h3><?= esc_html( get_sub_field( 'title' ) ); ?></h3>
						<div class="service_detail_text">
							<?= wp_kses_post( get_sub_field( 'description' ) ); ?>
						</div>
					</div>
				</div>
					<?php
				}
				?>
			</div>
		</div>
</section>
	<?php
}