<?php
/**
 * Block template for CB Contact.
 *
 * @package cb-pbh202506
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="cb-contact">
	<div class="container">
		<div class="row g-5">
			<div class="col-md-5 my-auto" data-aos="fade-right">
				<?php
				$block_title = get_field( 'title' );
				if ( $block_title ) {
					echo '<h2 class="cb-contact__title">' . esc_html( $block_title ) . '</h2>';
				}
				?>
				<?php
				$block_content = get_field( 'content' );
				if ( $block_content ) {
					echo '<div class="cb-contact__content">' . wp_kses_post( $block_content ) . '</div>';
				}
				?>
			</div>
			<div class="col-md-7">
				<?php
				$d = 0;
				if ( get_field( 'contact_phone', 'option' ) ) {
					echo '<p class="cb-contact__item" data-aos="fade-left" data-aos-delay="' .
						esc_attr( $d ) .
						'"><span class="icon"><i class="fa-solid fa-phone"></i></span> <a href="tel:' . esc_html( parse_phone( get_field( 'contact_phone', 'option' ) ) ) . '">' . esc_html( get_field( 'contact_phone', 'option' ) ) . '</a></p>';
					$d += 100;
				}
				if ( get_field( 'contact_email', 'option' ) ) {
					echo '<p class="cb-contact__item" data-aos="fade-left" data-aos-delay="' .
						esc_attr( $d ) .
					 	'"><span class="icon"><i class="fa-solid fa-envelope"></i></span> <a href="mailto:' .
						esc_attr( antispambot( get_field( 'contact_email', 'option' ) ) ) .
						'">' .
						esc_html( antispambot( get_field( 'contact_email', 'option' ) ) ) .
						'</a></p>';
					$d += 100;
				}
				if ( get_field( 'instagram', 'option' ) ) {
					$instagram_url     = get_field( 'instagram', 'option' );
					$instagram_display = preg_replace( '/^https?:\/\/(www\.)?/', '', $instagram_url );
					echo '<p class="cb-contact__item" data-aos="fade-left" data-aos-delay="' .
						esc_attr( $d ) .
						'"><span class="icon"><i class="fa-brands fa-instagram"></i></span> <a href="' .
						esc_url( $instagram_url ) .
						'" target="_blank">' .
						esc_html( $instagram_display ) .
						'</a></p>';
						$d += 100;
				}
				if ( get_field( 'linkedin', 'option' ) ) {
					$linkedin_url     = get_field( 'linkedin', 'option' );
					$linkedin_display = preg_replace( '/^https?:\/\/(www\.)?/', '', $linkedin_url );
					echo '<p class="cb-contact__item" data-aos="fade-left" data-aos-delay="' .
						esc_attr( $d ) .
						'"><span class="icon"><i class="fa-brands fa-linkedin-in"></i></span> <a href="' .
						esc_url( $linkedin_url ) .
						'" target="_blank">' .
						esc_html( $linkedin_display ) .
						'</a></p>';
				}
				?>
			</div>
		</div>
	</div>
</div>