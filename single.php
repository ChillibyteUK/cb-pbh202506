<?php
/**
 * Template for displaying single posts.
 *
 * @package cb-pbh2025
 */

defined( 'ABSPATH' ) || exit;
get_header();
set_query_var( 'contact_class', 'contact--alt' );
?>
<main id="main" class="blog blog-single">
	<section class="blog-single__hero">
		<div class="container">
			<h1 class="blog-single__title"><?= esc_html( get_the_title() ); ?></h1>
			<?php
			$blog_intro = get_field( 'intro_paragraph', get_the_ID() );
			if ( $blog_intro ) {
				echo '<div class="blog-single__intro mb-5">' . wp_kses_post( $blog_intro ) . '</div>';
			}
			?>
		</div>
	</section>
	<section class="blog__content">
		<div class="container pb-5">
			<?= wp_kses_post( get_the_content() ); ?>
		</div>
	</section>
			<?php

			if ( has_post_thumbnail() ) {
				echo wp_kses_post( get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'page__hero' ) ) );
			}

			?>
	<div class="text-center py-5 back">
		<a href="/insights/">Back</a>
	</div>
</main>
<?php
get_footer();
?>