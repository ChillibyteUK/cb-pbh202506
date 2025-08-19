<?php
/**
 * Template Name: Service Page
 * Description: A custom template for displaying a service page.
 *
 * @package cb-pbh202506
 */

defined( 'ABSPATH' ) || exit;

get_header();

?>
<main class="service">
	<section class="service-panel">
		<div class="container">
			<a href="/services/" class="service-back">Our Skills</a>
			<div class="row g-5">
				<div class="col-lg-6 service-left" data-aos="fade-right">
					<h1><?= esc_html( get_the_title() ); ?></h1>
					<div class="service-intro"><?= wp_kses_post( get_field( 'service_intro' ) ); ?></div>
				</div>
				<div class="col-lg-6 service-right" data-aos="fade-left">
					<?= wp_kses_post( get_the_content() ); ?>
				</div>
			</div>
		</div>
	</section>
	<section class="service-extras has-violet-lightning-background">
		<div class="container py-5">
			<div class="row g-5">
				<div class="col-lg-6 service-extras-left">
					<h2 class="mb-5">Customer Challenges</h2>
					<?php
					$d = 0;
					while ( have_rows( 'challenges' ) ) {
						the_row();
						?>
					<div class="challenge" data-aos="fade-right" data-aos-delay="<?= esc_attr( $d ); ?>">
						<?= esc_html( get_sub_field( 'challenge' ) ); ?>
					</div>
						<?php
						$d += 100;
					}
					?>
				</div>
				<div class="col-lg-6 service-extras-right">
					<h2 class="mb-5">Related Case Studies</h2>
					<?php
					$case_studies = get_field( 'related_case_studies' );
					if ( $case_studies && is_array( $case_studies ) && count( $case_studies ) > 0 ) {
						// Output the first (big) case study.
						$first = array_shift( $case_studies );
						?>
						<a href="<?= esc_url( get_permalink( $first ) ); ?>" class="big-case-study" data-aos="fade">
							<div class="img-wrapper"><?= get_the_post_thumbnail( $first, 'full' ); ?></div>
							<div class="big-case-study__title">
								<?= esc_html( get_the_title( $first ) ); ?>
							</div>
						</a>
						<?php
						// Output the rest in a flex container.
						if ( count( $case_studies ) > 0 ) {
							echo '<div class="case-study-buttons d-flex flex-wrap gap-2 mt-2">';
							foreach ( $case_studies as $r ) {
								?>
								<a href="<?= esc_url( get_permalink( $r ) ); ?>" class="case-study-button" data-aos="fade">
									<?= esc_html( get_the_title( $r ) ); ?>
								</a>
								<?php
							}
							echo '</div>';
						}
					}
					?>
				</div>
			</div>
		</div>
	</section>
	<?php
	$cta_link = get_field( 'cta_link', 'option' );
	?>
	<section class="cb-contact-cta" style="background-image: url(<?= esc_url( wp_get_attachment_image_url( get_field( 'cta_background', 'option' ), 'full' ) ); ?>);">
		<div class="container h-100">
			<div class="row h-100">
				<div class="col-md-6 d-flex flex-column justify-content-center">
					<h2><?= esc_html( get_field( 'cta_title', 'option' ) ); ?></h2>
					<a href="<?= esc_url( $cta_link['url'] ); ?>" class="button button-green align-self-start"><?= esc_html( $cta_link['title'] ); ?></a>
				</div>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();