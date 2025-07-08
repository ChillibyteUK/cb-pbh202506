<?php
/**
 * Block template for CB Work Detail.
 *
 * @package cb-pbh202506
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="container work-detail">
	<div class="row gx-5">
		<div class="col-md-6 my-auto">
			<?php
			if ( wp_get_attachment_image( get_field( 'logo', get_the_ID() ), 'full' ) ) {
				echo wp_get_attachment_image( get_field( 'logo', get_the_ID() ), 'full', false, array( 'class' => 'work-detail__logo' ) );
			}
			?>
			<div><?= wp_kses_post( get_field( 'left_content' ) ); ?></div>			
		</div>
		<div class="col-md-6">
			<div class="work-detail__right">
			 	<?= wp_kses_post( get_field( 'right_content' ) ); ?>
			</div>
		</div>
	</div>
</div>