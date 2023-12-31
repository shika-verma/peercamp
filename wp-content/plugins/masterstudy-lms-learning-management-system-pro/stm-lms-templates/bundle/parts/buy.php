<?php
/**
 * @var $course_id
 */

stm_lms_register_script( 'buy-button' );
stm_lms_register_script( 'bundles/buy' );
stm_lms_register_style( 'buy-button-mixed' );

$bundle_price         = get_post_meta( $course_id, STM_LMS_My_Bundle::bundle_price_key(), true );
$bundle_courses_price = STM_LMS_Course_Bundle::get_bundle_courses_price( $course_id );
$button_attributes    = ! is_user_logged_in()
	?
	apply_filters(
		'stm_lms_buy_button_auth',
		array(
			'data-target=".stm-lms-modal-login"',
			'data-lms-modal="login"',
		),
		$course_id
	)
	: array();
?>
<div class="stm-lms-buy-buttons stm-lms-buy-buttons-mixed stm-lms-buy-buttons-mixed-pro">

	<div class="stm_lms_mixed_button subscription_disabled <?php echo is_user_logged_in() ? 'stm_lms_buy_bundle' : ''; ?>" data-bundle="<?php echo intval( $course_id ); ?>">

		<a href="#" class="btn btn-default btn_big heading_font" <?php echo wp_kses_post( implode( ' ', $button_attributes ) ); ?>>

			<span><?php esc_html_e( 'Get now', 'masterstudy-lms-learning-management-system-pro' ); ?></span>

			<div class="btn-prices">

				<?php if ( ! empty( $bundle_courses_price ) ) : ?>
					<label class="sale_price"><?php echo STM_LMS_Helpers::display_price( $bundle_courses_price ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></label>
				<?php endif; ?>

				<?php if ( ! empty( $bundle_price ) ) : ?>
					<label class="price"><?php echo STM_LMS_Helpers::display_price( $bundle_price ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></label>
				<?php endif; ?>

			</div>

		</a>

	</div>

</div>
