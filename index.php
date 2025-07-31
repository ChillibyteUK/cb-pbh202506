<?php
/**
 * Template for displaying the blog index page.
 *
 * @package cb-pbh2025
 */

defined( 'ABSPATH' ) || exit;

$page_for_posts = get_option( 'page_for_posts' );

set_query_var( 'header_class', 'header-green' );


get_header();
?>
<main id="main" class="blog blog-index">
	<div class="container py-5">
		<h1 class="fs-xl">Insights</h1>
	</div>
    <div class="container py-5">
		<div class="row g-5">
		<?php
		$current_page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$args         = array(
			'post_type'      => 'post',
			'orderby'        => 'date',
			'order'          => 'DESC',
			'posts_per_page' => -1,
			'paged'          => $current_page,
		);

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				?>
			<div class="col-md-4">
				<a class="blog-card" href="<?php the_permalink(); ?>">
					<div class="my-auto"><img src="<?= esc_url( get_stylesheet_directory_uri() . '/img/lightning-icon.svg' ); ?>" alt="" width="50" height="50"></div>
					<div class="blog-card__inner">
						<div class="blog-card__date"><?= get_the_date( 'd.m.y' ); ?></div>
						<h2 class="blog-card__title"><?= esc_html( the_title() ); ?></h2>
					</div>
				</a>
			</div>
				<?php
			}
		} else {
			echo '<p>No posts found.</p>';
		}

		wp_reset_postdata();
		?>
        </div>
		<!-- Pagination -->
		<!-- 
		<div class="pagination mt-4 row">
			<div class="col text-start">
				<?php
				if ( get_previous_posts_link() ) {
					previous_posts_link( 'Prev' );
				}
				?>
			</div>
			<div class="col text-end">
				<?php
				if ( get_next_posts_link( '', $query->max_num_pages ) ) {
					next_posts_link( 'Next' );
				}
				?>
			</div>
		</div>
		-->
	</div>
</main>
<?php

get_footer();
?>