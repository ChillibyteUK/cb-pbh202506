<?php
/**
 * Block template for CB Service Panel.
 *
 * @package cb-pbh202506
 */

defined( 'ABSPATH' ) || exit;
$bg = get_the_post_thumbnail_url( get_the_ID(), 'full' );
?>
<section class="service_panel" style="background-image:url(<?= esc_url( $bg ); ?>)" >
	<div class="overlay"></div>
	<div class="container h-100">
		<div class="row h-100 gx-5">
			<div class="col-md-6 d-flex flex-column justify-content-center">
				<h2 data-aos="fade-right"><?= esc_html( get_the_title() ); ?></h2>
				<div class="service_intro" data-aos="fade-right" data-aos-delay="200">
					<?= wp_kses_post( get_field( 'service_intro' ) ); ?>
				</div>
			</div>
			<div class="col-md-6 d-flex flex-column justify-content-center">
				<?php
				// iterate over nested ACF repeater.
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