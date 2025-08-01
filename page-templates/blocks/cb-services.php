<?php
/**
 * Block template for CB Services.
 *
 * @package cb-pbh202506
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="service_intro_panel">
	<div class="container">
		<div class="row gx-5">
			<div class="col-lg-6 my-auto">
				<h1><?= esc_html( get_field( 'title' ) ); ?></h1>
				<div class="service_intro"><?= wp_kses_post( get_field( 'services_intro' ) ); ?></div>
			</div>
			<div class="col-lg-6">
				<div class="services-accordion">
					<?php
					while ( have_rows( 'services' ) ) {
						the_row();
						$page_link = get_sub_field( 'service_page' );
						?>
					<div class="service-item">
						<a href="<?= esc_url( $page_link ); ?>" class="service_link">
							<div class="service_background"></div>
							<div class="service_header">
								<div class="service_icon"></div>
								<div class="h2"><?= esc_html( get_sub_field( 'service_name' ) ); ?></div>
							</div>
							<div class="service_content">
								<div class="service_intro">
									<?= wp_kses_post( get_sub_field( 'short_service_intro' ) ); ?>
								</div>
							</div>
						</a>
					</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>