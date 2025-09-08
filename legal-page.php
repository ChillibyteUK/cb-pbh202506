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
<main id="main" class="<?= esc_attr( $classes ); ?>">
	<div class="container pt-5">
		<h1><?= esc_html( get_the_title() ); ?></h1>
	</div>
	<div class="container pt-5">
	<?php
    the_post();
    the_content();
	?>
	</div>
</main>
<?php
get_footer();
