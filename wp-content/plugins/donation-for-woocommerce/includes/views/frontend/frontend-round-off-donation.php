<?php
/**
 * Frontend roundoff  html .
 *
 * @package  donation
 */

if ( get_woocommerce_currency_symbol() ) {
	$currency_symbol =  get_woocommerce_currency_symbol();
}
$donation_product = !empty( $object->product['product_id'] ) ? $object->product['product_id'] : '';
$donation_values = !empty( $object->campaign['predAmount'] ) ? $object->campaign['predAmount'] : array();
$donation_value_labels = !empty( $object->campaign['predLabel'] ) ? $object->campaign['predLabel'] : array();
$donation_min_value = !empty( $object->campaign['freeMinAmount'] ) ? $object->campaign['freeMinAmount'] : '';
$donation_max_value = !empty( $object->campaign['freeMaxAmount'] ) ? $object->campaign['freeMaxAmount'] : '';
$display_donation = !empty($object->campaign['amount_display']) ? $object->campaign['amount_display'] : 'both';
$where_currency_symbole = !empty($object->campaign['currencyPos']) ? $object->campaign['currencyPos'] : 'before';
$donation_label  = !empty( $object->campaign['donationTitle'] ) ? $object->campaign['donationTitle'] : esc_attr__('Donation', 'wc-donation');
$donation_button_text  = !empty( $object->campaign['donationBtnTxt'] ) ? $object->campaign['donationBtnTxt'] : esc_attr__('Donate', 'wc-donation');
$donation_button_color  = !empty( $object->campaign['donationBtnBgColor'] ) ? $object->campaign['donationBtnBgColor'] : '333333';
$donation_button_text_color  = !empty( $object->campaign['donationBtnTxtColor'] ) ? $object->campaign['donationBtnTxtColor'] : 'FFFFFF';
$display_donation_type = !empty( $object->campaign['DonationDispType'] ) ? $object->campaign['DonationDispType'] : 'select';
$donation_body_text = !empty( get_option('wc-donation-round-field-message') ) ? get_option('wc-donation-round-field-message') : '';
$donation_button_cancel_text = !empty( get_option('wc-donation-round-button-cancel-text') ) ? get_option('wc-donation-round-button-cancel-text') : esc_attr('Skip', 'wc-donation');

$RecurringDisp = !empty( $object->campaign['RecurringDisp'] ) ? $object->campaign['RecurringDisp'] : 'disabled';


if ( empty( $donation_product ) ) { 
	$message = __('You have enabled donation on this page but didn\'t select campaign for it.', 'wc-donation');
	$notice_type = 'error';
	$result = wc_add_notice($message, $notice_type); 
	return $result;
}
?>

<div class="wc-donation-popup" id="wc-donation-popup">
	<style>
		#wc-donation-popup {
			--wc-bg-color: #<?php esc_html_e( $donation_button_color ); ?>;
			--wc-txt-color: #<?php esc_html_e( $donation_button_text_color ); ?>;
		}

		<?php
		if ( 'before' === $where_currency_symbole ) {
			?>
			#wc-donation-popup .price-wrapper::before {
				background: #<?php esc_html_e( $donation_button_color ); ?>;
				color: #<?php esc_html_e( $donation_button_text_color ); ?>;
			}
			<?php
		} else {
			?>
			#wc-donation-popup .price-wrapper::after {
				background: #<?php esc_html_e( $donation_button_color ); ?>;
				color: #<?php esc_html_e( $donation_button_text_color ); ?>;
			}
			<?php
		}
		?>
	</style>
	<div class="wc-donation-popup-backdrop"></div>
	<div class="wc-donation-popup-content">
		<div class="wc-donation-popup-header">
			<span class="wc-close">x</span>
			<h1><?php echo esc_html( __( $donation_label, 'wc-donation' ) ); ?></h1>
		</div>
		<div class="wc-donation-popup-body">
			<div class="wc_donation_on_checkout">
				<div class="wc-donation-in-action">
					<p class="donation_text"><?php echo esc_html( __( $donation_body_text, 'wc-donation' ) ); ?></p>
					<div class="row1">
						<div class="price-wrapper <?php echo esc_attr($where_currency_symbole); ?>" currency="<?php echo esc_attr($currency_symbol); ?>">
							<input type="text" class="wc-input-text roundoff-donation-price donate_<?php echo esc_attr($campaign_id); ?> <?php echo esc_attr($where_currency_symbole); ?>" name="wc-donation-price" id="wc-donation-price-<?php echo esc_attr($campaign_id); ?>" value="" disabled="true">
						</div>
					</div>
					<div class="row2">
						<input type="hidden" name="wc_donation_camp" id="wc_donation_camp_<?php echo esc_attr($campaign_id); ?>" class="wc_donation_camp" value="<?php echo esc_attr($campaign_id); ?>">
						<button class="button " data-type="roundoff" style="background-color:#<?php esc_attr_e( $donation_button_color ); ?>;border-color:#<?php esc_attr_e( $donation_button_color ); ?>;color:#<?php esc_attr_e( $donation_button_text_color ); ?>;width:100%" id="wc-donation-round-f-submit-donation" value='Donate'><?php echo esc_attr( __( $donation_button_text, 'wc-donation' ) ); ?></button>
						<div style="height:15px; clear:both;">&nbsp;</div>
						<button class="button" data-type="roundoff-skip" style="background-color:#<?php esc_attr_e( $donation_button_color ); ?>;border-color:#<?php esc_attr_e( $donation_button_color ); ?>;color:#<?php esc_attr_e( $donation_button_text_color ); ?>;width:100%" id="wc-donation-round-f-submit-skip-donation" value='skip'><?php echo esc_attr( __( $donation_button_cancel_text, 'wc-donation' ) ); ?></button>
					</div>

					<?php if ( 'user' == $RecurringDisp && class_exists('WC_Subscriptions') ) : ?>

						<?php 
						$interval = !empty( $object->campaign['interval'] ) ? wcs_get_subscription_period_interval_strings()[$object->campaign['interval']] : wcs_get_subscription_period_interval_strings()[1];
						$period = !empty( $object->campaign['period'] ) ? wcs_get_available_time_periods()[$object->campaign['period']] : wcs_get_available_time_periods()['month'];
						$length = !empty( $object->campaign['length'] ) ? wcs_get_subscription_ranges($period)[$object->campaign['length']] : wcs_get_subscription_ranges($period)['1'];
						$period_arr = '<select name="_subscription_period" class="_subscription_period">'; 
						foreach ( wcs_get_available_time_periods() as $key => $value ) {
							if ( !empty(wcs_get_subscription_ranges($value)[$object->campaign['length']]) ) {
								$period_arr	.= '<option value="' . esc_attr( $key ) . '" ' . selected( $period, $key, false ) . ' >' . esc_attr( $value ) . '</option>';
							}
						}
						$period_arr	.= '</select>';
						$period_arr .= '<input type="hidden" class="_subscription_length" value="' . esc_attr($object->campaign['length']) . '" />';	
						?>
						<div class="row3">
							<label for="wc_is_recurring" class="is_recurring_label">
								<input type="checkbox" value="yes" class="wc_is_recurring" name="wc_is_recurring" /> 	
								<?php /* translators:  */ ?>				
								<p style="margin: 0 0 0 10px;"><?php printf(esc_attr__('Make it recurring for %1$s %2$s for %3$s %4$s %5$s', 'wc-donation'), esc_attr($interval), nl2br($period_arr), '<span class="range">', esc_attr($length), '</span>'); ?></p>
							</label>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
