<?php
/**
 * Block template for CB Homepage Hero.
 *
 * @package cb-pbh202506
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="cb-homepage-hero">
	<div class="cb-homepage-hero__image-wrapper">
		<?= wp_get_attachment_image( get_field( 'background' ), 'full', false, array( 'class' => 'cb-homepage-hero__image' ) ); ?>
		<div class="cb-homepage-hero__overlay">
			<div class="zigzag"></div>
		</div>
	</div>
	<div class="cb-homepage-hero__content" id="about">
		<div class="container">
			<img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/pbh-logo--wo.svg' ); ?>" class="cb-homepage-hero__logo">
			<?= wp_kses_post( get_field( 'content' ) ); ?>
		</div>
	</div>
</div>
<script>
document.addEventListener('scroll', function () {
	const hero = document.querySelector('.cb-homepage-hero');
	const content = document.querySelector('.cb-homepage-hero__content');
	if (!hero || !content) return;

	const scrollY = window.scrollY || window.pageYOffset;
	// Show overlay after 50px
	if (scrollY > 50) {
		hero.classList.add('scrolled');
	} else {
		hero.classList.remove('scrolled');
	}
	// Show content after 1/4 viewport past hero
	if (scrollY > window.innerHeight * 0.25) {
		hero.classList.add('show-content');
	} else {
		hero.classList.remove('show-content');
	}
});
</script>