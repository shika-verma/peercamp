<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 8.1.0
 */
// phpcs:ignoreFile

defined('ABSPATH') || exit;

if (function_exists('stm_lms_register_script')) {
    stm_lms_register_script('app/thank_you');
}

?>

<div class="woocommerce-order">

    <?php if ($order) :

        do_action('woocommerce_before_thankyou', $order->get_id()); ?>

        <?php if ($order->has_status('failed')) : ?>

        <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'masterstudy'); ?></p>

        <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
            <a href="<?php echo esc_url($order->get_checkout_payment_url()); ?>"
               class="button pay"><?php esc_html_e('Pay', 'masterstudy') ?></a>
            <?php if (is_user_logged_in()) : ?>
                <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>"
                   class="button pay"><?php esc_html_e('My account', 'masterstudy'); ?></a>
            <?php endif; ?>
        </p>

    <?php else : ?>

        <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received mg-bt-10"><?php echo apply_filters('woocommerce_thankyou_order_received_text', __('Thank you. Your order has been received.', 'masterstudy'), $order); ?></p>

        <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

            <li class="woocommerce-order-overview__order order">
                <?php esc_html_e('Order number:', 'masterstudy'); ?>
                <strong><?php echo sanitize_text_field($order->get_order_number()); ?></strong>
            </li>

            <li class="woocommerce-order-overview__date date">
                <?php esc_html_e('Date:', 'masterstudy'); ?>
                <strong><?php echo wc_format_datetime($order->get_date_created()); ?></strong>
            </li>

            <?php if (is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email()) : ?>
                <li class="woocommerce-order-overview__email email">
                    <?php esc_html_e('Email:', 'masterstudy'); ?>
                    <strong><?php echo sanitize_text_field($order->get_billing_email()); ?></strong>
                </li>
            <?php endif; ?>

            <li class="woocommerce-order-overview__total total">
                <?php wp_kses_post(__('Total:', 'masterstudy')); ?>
                <strong><?php echo wp_kses_post($order->get_formatted_order_total()); ?></strong>
            </li>

            <?php if ($order->get_payment_method_title()) : ?>
                <li class="woocommerce-order-overview__payment-method method">
                    <?php esc_html_e('Payment method:', 'masterstudy'); ?>
                    <strong><?php echo wp_kses_post($order->get_payment_method_title()); ?></strong>
                </li>
            <?php endif; ?>

        </ul>
        <div class="clear"></div>

    <?php endif; ?>

        <?php do_action('woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id()); ?>
        <?php do_action('woocommerce_thankyou', $order->get_id()); ?>

    <?php else : ?>

        <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters('woocommerce_thankyou_order_received_text', __('Thank you. Your order has been received.', 'masterstudy'), null); ?></p>

    <?php endif; ?>

</div>
