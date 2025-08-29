<?php
/**
 * Block template for CB Services.
 *
 * @package cb-pbh202506
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="services">
	<div class="container">
		<div class="row g-5">
			<div class="col-lg-5 my-auto">
				<h1><?= esc_html( get_field( 'title' ) ); ?></h1>
				<div class="service_intro"><?= wp_kses_post( get_field( 'service_intro' ) ); ?></div>
			</div>
			<div class="col-lg-6 offset-lg-1">
				<div class="accordion" id="services-list">
					<?php
					// get pages with parent 'services'.
					$services = get_pages(
						array(
							'child_of'    => get_page_by_path( 'services' )->ID,
							'post_type'   => 'page',
							'post_status' => 'publish',
							'numberposts' => -1,
						)
					);
					// iterate through them and output the page_title and get_field('service_intro') content for each.
					foreach ( $services as $service ) {
						$service_title       = get_the_title( $service->ID );
						$service_description = get_sub_field( 'service_description' );
						$collapse_id         = 'service-' . esc_attr( sanitize_title( $service_title ) );
						?>
					<div class="accordion-item">
						<h2 class="accordion-header" id="heading-<?= esc_attr( $collapse_id ); ?>">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= esc_attr( $collapse_id ); ?>" aria-expanded="false" aria-controls="<?= esc_attr( $collapse_id ); ?>">
								<?= esc_html( $service_title ); ?>
							</button>
						</h2>
						<div id="<?= esc_attr( $collapse_id ); ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?= esc_attr( $collapse_id ); ?>" data-bs-parent="#services-list">
							<div class="accordion-body">
								<a href="<?= esc_url( get_permalink( $service->ID ) ); ?>" class="service_link">
									<?= wp_kses_post( get_field( 'service_intro', $service->ID ) ); ?>
									<div class="indicator"><span></span></div>
								</a>
							</div>
						</div>
					</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>