<?php
/**
 * Template Name: Legal Page
 *
 * @package cb-pbh2025
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<style>
:root {
	--bs-border-color: #000;
}
</style>
<main id="main" class="blog blog-single">
	<section class="blog-single__hero">
		<div class="container">
			<h1 class="blog-single__title"><?= esc_html( get_the_title() ); ?></h1>
		</div>
	</section>
	<section class="blog__content">
		<div class="container pb-5">
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<?= wp_kses_post( get_the_content() ); ?>
				</div>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();
