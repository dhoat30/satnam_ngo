<?php
/**
 * Frontend order  html .
 *
 * @package  donation
 */

// echo '<pre>$campaigncampaign ';
// 	print_r ($object);
// echo '</pre>';

if ( get_woocommerce_currency_symbol() ) {
	$currency_symbol =  get_woocommerce_currency_symbol();
}
$donation_product = !empty( $object->product['product_id'] ) ? $object->product['product_id'] : '';
$donation_values = !empty( $object->campaign['predAmount'] ) ? $object->campaign['predAmount'] : array();
$donation_value_labels = !empty( $object->campaign['predLabel'] ) ? $object->campaign['predLabel'] : array();
$donation_min_value = !empty( $object->campaign['freeMinAmount'] ) ? $object->campaign['freeMinAmount'] : 0;
$donation_max_value = !empty( $object->campaign['freeMaxAmount'] ) ? $object->campaign['freeMaxAmount'] : 1000;
$display_donation = !empty($object->campaign['amount_display']) ? $object->campaign['amount_display'] : 'both';
$where_currency_symbole = !empty($object->campaign['currencyPos']) ? $object->campaign['currencyPos'] : 'before';
$donation_label  = !empty( $object->campaign['donationTitle'] ) ? $object->campaign['donationTitle'] : esc_attr__('Donation', 'wc-donation');
$donation_button_text  = !empty( $object->campaign['donationBtnTxt'] ) ? $object->campaign['donationBtnTxt'] : esc_attr__('Donate', 'wc-donation');
$donation_button_color  = !empty( $object->campaign['donationBtnBgColor'] ) ? $object->campaign['donationBtnBgColor'] : '333333';
$donation_button_text_color  = !empty( $object->campaign['donationBtnTxtColor'] ) ? $object->campaign['donationBtnTxtColor'] : 'FFFFFF';
$display_donation_type = !empty( $object->campaign['DonationDispType'] ) ? $object->campaign['DonationDispType'] : 'select';

$RecurringDisp = !empty( $object->campaign['RecurringDisp'] ) ? $object->campaign['RecurringDisp'] : 'disabled';

/**
 * Donation product.
 *
 * @var type
 */

$post_exist = !empty( $object->campaign['campaign_id'] ) ? get_post( $object->campaign['campaign_id'] ) : '';
// echo '<pre>';
// print_r($post_exist);
// echo '</pre>';
if ( empty( $donation_product ) || empty($post_exist) || ( isset($post_exist->post_status) && 'trash' == $post_exist->post_status ) ) { 
	$message = __('You have enabled donation on this page but didn\'t select campaign for it.', 'wc-donation');
	$notice_type = 'error';
	wc_clear_notices(); //<--- check this line.
	$result = wc_add_notice($message, $notice_type); 
	return $result;
}

?>
<style>
	:root {
		--wc-bg-color: #<?php esc_html_e( $donation_button_color ); ?>;
		--wc-txt-color: #<?php esc_html_e( $donation_button_text_color ); ?>;
	}

	<?php
	if ( 'before' === $where_currency_symbole ) {
		if ( 'checkout' == $type ) {
			?>
			#wc_donation_on_checkout .price-wrapper::before {
				background: #<?php esc_html_e( $donation_button_color ); ?>;
				color: #<?php esc_html_e( $donation_button_text_color ); ?>;
			}
			<?php
		}

		if ( 'cart' == $type ) {
			?>
			#wc_donation_on_cart .price-wrapper::before {
				background: #<?php esc_html_e( $donation_button_color ); ?>;
				color: #<?php esc_html_e( $donation_button_text_color ); ?>;
			}
			<?php
		}

		if ( 'widget' == $type ) {
			?>
			#wc_donation_on_widget_<?php echo esc_attr($campaign_id); ?> .price-wrapper::before {
				background: #<?php esc_html_e( $donation_button_color ); ?>;
				color: #<?php esc_html_e( $donation_button_text_color ); ?>;
			}
			
			<?php
		}

		if ( 'shortcode' == $type ) {
			?>
			#wc_donation_on_shortcode_<?php echo esc_attr($campaign_id); ?> .price-wrapper::before {
				background: #<?php esc_html_e( $donation_button_color ); ?>;
				color: #<?php esc_html_e( $donation_button_text_color ); ?>;
			}

			<?php
		}

		if ( 'single' == $type ) {
			?>
			#wc_donation_on_single_<?php echo esc_attr($campaign_id); ?> .price-wrapper::before {
				background: #<?php esc_html_e( $donation_button_color ); ?>;
				color: #<?php esc_html_e( $donation_button_text_color ); ?>;
			}

			<?php
		}
	} else {
		if ( 'checkout' == $type ) {
			?>
			#wc_donation_on_checkout .price-wrapper::after {
				background: #<?php esc_html_e( $donation_button_color ); ?>;
				color: #<?php esc_html_e( $donation_button_text_color ); ?>;
			}
			<?php
		}

		if ( 'cart' == $type ) {
			?>
			#wc_donation_on_cart .price-wrapper::after {
				background: #<?php esc_html_e( $donation_button_color ); ?>;
				color: #<?php esc_html_e( $donation_button_text_color ); ?>;
			}
			<?php
		}

		if ( 'widget' == $type ) {
			?>
			#wc_donation_on_widget_<?php echo esc_attr($campaign_id); ?> .price-wrapper::after {
				background: #<?php esc_html_e( $donation_button_color ); ?>;
				color: #<?php esc_html_e( $donation_button_text_color ); ?>;
			}
			
			<?php
		}

		if ( 'shortcode' == $type ) {
			?>
			#wc_donation_on_shortcode_<?php echo esc_attr($campaign_id); ?> .price-wrapper::after {
				background: #<?php esc_html_e( $donation_button_color ); ?>;
				color: #<?php esc_html_e( $donation_button_text_color ); ?>;
			}
			<?php
		}
		
		if ( 'single' == $type ) {
			?>
			#wc_donation_on_single_<?php echo esc_attr($campaign_id); ?> .price-wrapper::after {
				background: #<?php esc_html_e( $donation_button_color ); ?>;
				color: #<?php esc_html_e( $donation_button_text_color ); ?>;
			}
			<?php
		}
	} 

	if ( 'checkout' == $type ) {
		?>
		#wc_donation_on_checkout .wc-input-text {
			border-color: #<?php esc_html_e( $donation_button_color ); ?>!important;
		}

		#wc_donation_on_checkout .checkmark {
			border-color: #<?php esc_html_e( $donation_button_color ); ?>!important;
		}
		#wc_donation_on_checkout .wc-label-radio input:checked ~ .checkmark {
			background-color: #<?php esc_html_e( $donation_button_color); ?>;
		}
		#wc_donation_on_checkout .wc-label-radio .checkmark:after {
			border-color: #<?php esc_html_e( $donation_button_text_color); ?>!important;
		}
		#wc_donation_on_checkout .wc-label-button {
			border-color: #<?php esc_html_e( $donation_button_color ); ?>!important;
			color: #<?php esc_html_e( $donation_button_color ); ?>!important;
		}
		#wc_donation_on_checkout label.wc-label-button.wc-active {
			background-color: #<?php esc_html_e( $donation_button_color ); ?>!important;
			color: #<?php esc_html_e( $donation_button_text_color); ?>!important;
		}
		<?php
	}

	if ( 'cart' == $type ) {
		?>
		#wc_donation_on_cart .wc-input-text {
			border-color: #<?php esc_html_e( $donation_button_color ); ?>!important;
		}

		#wc_donation_on_cart .checkmark {
			border-color: #<?php esc_html_e( $donation_button_color ); ?>!important;
		}
		#wc_donation_on_cart .wc-label-radio input:checked ~ .checkmark {
			background-color: #<?php esc_html_e( $donation_button_color); ?>;
		}
		#wc_donation_on_cart .wc-label-radio .checkmark:after {
			border-color: #<?php esc_html_e( $donation_button_text_color); ?>!important;
		}
		#wc_donation_on_cart .wc-label-button {
			border-color: #<?php esc_html_e( $donation_button_color ); ?>!important;
			color: #<?php esc_html_e( $donation_button_color ); ?>!important;
		}
		#wc_donation_on_cart label.wc-label-button.wc-active {
			background-color: #<?php esc_html_e( $donation_button_color ); ?>!important;
			color: #<?php esc_html_e( $donation_button_text_color); ?>!important;
		}
		<?php
	}

	if ( 'widget' == $type ) {
		?>
		#wc_donation_on_widget_<?php echo esc_attr($campaign_id); ?> .wc-input-text {
			border-color: #<?php esc_html_e( $donation_button_color ); ?>!important;
		}

		#wc_donation_on_widget_<?php echo esc_attr($campaign_id); ?> .checkmark {
			border-color: #<?php esc_html_e( $donation_button_color ); ?>!important;
		}
		#wc_donation_on_widget_<?php echo esc_attr($campaign_id); ?> .wc-label-radio input:checked ~ .checkmark {
			background-color: #<?php esc_html_e( $donation_button_color); ?>;
		}
		#wc_donation_on_widget_<?php echo esc_attr($campaign_id); ?> .wc-label-radio .checkmark:after {
			border-color: #<?php esc_html_e( $donation_button_text_color); ?>!important;
		}
		#wc_donation_on_widget_<?php echo esc_attr($campaign_id); ?> .wc-label-button {
			border-color: #<?php esc_html_e( $donation_button_color ); ?>!important;
			color: #<?php esc_html_e( $donation_button_color ); ?>!important;
		}
		#wc_donation_on_widget_<?php echo esc_attr($campaign_id); ?> label.wc-label-button.wc-active {
			background-color: #<?php esc_html_e( $donation_button_color ); ?>!important;
			color: #<?php esc_html_e( $donation_button_text_color); ?>!important;
		}
		<?php
	}

	if ( 'shortcode' == $type ) {
		?>
		#wc_donation_on_shortcode_<?php echo esc_attr($campaign_id); ?> .wc-input-text {
			border-color: #<?php esc_html_e( $donation_button_color ); ?>!important;
		}

		#wc_donation_on_shortcode_<?php echo esc_attr($campaign_id); ?> .checkmark {
			border-color: #<?php esc_html_e( $donation_button_color ); ?>!important;
		}
		#wc_donation_on_shortcode_<?php echo esc_attr($campaign_id); ?> .wc-label-radio input:checked ~ .checkmark {
			background-color: #<?php esc_html_e( $donation_button_color); ?>;
		}
		#wc_donation_on_shortcode_<?php echo esc_attr($campaign_id); ?> .wc-label-radio .checkmark:after {
			border-color: #<?php esc_html_e( $donation_button_text_color); ?>!important;
		}
		#wc_donation_on_shortcode_<?php echo esc_attr($campaign_id); ?> .wc-label-button {
			border-color: #<?php esc_html_e( $donation_button_color ); ?>!important;
			color: #<?php esc_html_e( $donation_button_color ); ?>!important;
		}
		#wc_donation_on_shortcode_<?php echo esc_attr($campaign_id); ?> label.wc-label-button.wc-active {
			background-color: #<?php esc_html_e( $donation_button_color ); ?>!important;
			color: #<?php esc_html_e( $donation_button_text_color); ?>!important;
		}
		<?php
	}
	
	if ( 'single' == $type ) {
		?>
		#wc_donation_on_single_<?php echo esc_attr($campaign_id); ?> .wc-input-text {
			border-color: #<?php esc_html_e( $donation_button_color ); ?>!important;
		}

		#wc_donation_on_single_<?php echo esc_attr($campaign_id); ?> .checkmark {
			border-color: #<?php esc_html_e( $donation_button_color ); ?>!important;
		}
		#wc_donation_on_single_<?php echo esc_attr($campaign_id); ?> .wc-label-radio input:checked ~ .checkmark {
			background-color: #<?php esc_html_e( $donation_button_color); ?>;
		}
		#wc_donation_on_single_<?php echo esc_attr($campaign_id); ?> .wc-label-radio .checkmark:after {
			border-color: #<?php esc_html_e( $donation_button_text_color); ?>!important;
		}
		#wc_donation_on_single_<?php echo esc_attr($campaign_id); ?> .wc-label-button {
			border-color: #<?php esc_html_e( $donation_button_color ); ?>!important;
			color: #<?php esc_html_e( $donation_button_color ); ?>!important;
		}
		#wc_donation_on_single_<?php echo esc_attr($campaign_id); ?> label.wc-label-button.wc-active {
			background-color: #<?php esc_html_e( $donation_button_color ); ?>!important;
			color: #<?php esc_html_e( $donation_button_text_color); ?>!important;
		}
		<?php
	}
	
	?>
</style>
<div class="wc-donation-in-action" data-donation-type="<?php echo esc_attr($display_donation); ?>">
	<label for="donation-price"><?php echo esc_html( __( $donation_label, 'wc-donation' ) ); ?></label>
	<div class="in-action-elements">
		<div class="row1">
			<?php 
			if ( ( 'predefined' === $display_donation || 'both' === $display_donation )  && ( count( $donation_values[0] ) > 0 ) ) { 
				if ( ! empty( $donation_values[0] ) ) {
					
					if ( 'select' ===$display_donation_type ) {
						?>
						<div class="price-wrapper <?php echo esc_attr($where_currency_symbole); ?>" currency="<?php echo esc_attr($currency_symbol); ?>">
							<select name="wc_select_price" data-id="<?php echo esc_attr($campaign_id); ?>" class='wc-label-select select wc-input-text <?php echo esc_attr($where_currency_symbole); ?>' id='wc-donation-f-donation-value'>
							<option value=""><?php echo esc_attr('--Please select--', 'wc-donation'); ?></option>
							<?php
							foreach ( $donation_values[0] as $key => $value ) {
								?>
								<option value='<?php echo esc_attr( $value ); ?>'><?php echo !empty( $donation_value_labels[0][$key] ) ? esc_attr( $donation_value_labels[0][$key] ) : esc_attr( $value ); ?></option>
								<?php
							}

							if ( 'both' === $display_donation ) {
								?>
								<option value="wc-donation-other-amount"><?php echo esc_html( __( 'Other', 'wc-donation' ) ); ?></option>
								<?php
							}
							?>
							</select>
						</div>
						<?php
					}

					if ( 'radio' ===$display_donation_type ) { 
						?>
						<div class="row1">
						<?php
						foreach ( $donation_values[0] as $key => $value ) {
							?>
							<label for="<?php echo esc_attr($campaign_id) . '_' . esc_attr($key); ?>" class="wc-label-radio">
								<?php /* echo esc_attr( $donation_value_labels[0][$key] ); */ ?>
								<?php echo !empty( $donation_value_labels[0][$key] ) ? esc_attr( $donation_value_labels[0][$key] ) : esc_attr( $value ); ?>
								<input type="radio" data-id="<?php echo esc_attr($campaign_id); ?>" name="wc_radio_price" id="<?php echo esc_attr($campaign_id) . '_' . esc_attr( $key ); ?>" value="<?php echo esc_attr( $value ); ?>">                                
								<div class="checkmark"></div>
							</label>
							<?php
						}

						if ( 'both' === $display_donation ) {
							?>
							<label for="wc-donation-other-amount-<?php echo esc_attr($campaign_id); ?>" class="wc-label-radio">
								<?php echo esc_html( __( 'Other', 'wc-donation' ) ); ?>
								<input type="radio" data-id="<?php echo esc_attr($campaign_id); ?>" name="wc_radio_price" id="wc-donation-other-amount-<?php echo esc_attr($campaign_id); ?>" value="wc-donation-other-amount">                                
								<div class="checkmark"></div>
							</label>
							<?php
						}
						?>
						</div>
						<?php
					}

					if ( 'label' ===$display_donation_type ) {
						?>
						<div class="row1">
						<?php
						foreach ( $donation_values[0] as $key => $value ) {
							?>
							<label class="wc-label-button" for="<?php echo esc_attr($campaign_id) . '_' . esc_attr( $key ); ?>">
								<input type="radio" data-id="<?php echo esc_attr($campaign_id); ?>" name="wc_label_price" id="<?php echo esc_attr($campaign_id) . '_' . esc_attr( $key ); ?>" value="<?php echo esc_attr( $value ); ?>">
								<?php /* echo esc_attr( $donation_value_labels[0][$key] ); */ ?>
								<?php echo !empty( $donation_value_labels[0][$key] ) ? esc_attr( $donation_value_labels[0][$key] ) : esc_attr( $value ); ?>
							</label>
							<?php
						}

						if ( 'both' === $display_donation ) { 
							?>
							<label class="wc-label-button" for="wc-donation-other-amount-<?php echo esc_attr($campaign_id); ?>">
								<input type="radio" data-id="<?php echo esc_attr($campaign_id); ?>" name="wc_label_price" id="wc-donation-other-amount-<?php echo esc_attr($campaign_id); ?>" value="wc-donation-other-amount">
								<?php echo esc_html( __( 'Other', 'wc-donation' ) ); ?>
							</label>
							<?php
						}
						?>
						</div>
						<?php
					}
				
				}

				if ( 'both' === $display_donation ) { 
					?>
					<input type="text" data-min="<?php echo esc_attr($donation_min_value); ?>" data-max="<?php echo esc_attr($donation_max_value); ?>" data-campaign_id="<?php echo esc_attr($campaign_id); ?>" style="display:none" Placeholder="<?php echo esc_html__('Enter amount between ', 'wc-donation') . esc_attr($donation_min_value) . ' - ' . esc_attr($donation_max_value); ?>" class="grab-donation wc-input-text wc-donation-f-donation-other-value" id="wc-donation-f-donation-other-value-<?php echo esc_attr($campaign_id); ?>">
					<?php
				}
				
				echo '<input type="hidden" id="wc-donation-price-' . esc_attr($campaign_id) . '" class="donate_' . esc_attr($campaign_id) . '" name="wc-donation-price" value="">';
 
			} else { 
				?>
				<div class="price-wrapper <?php echo esc_attr($where_currency_symbole); ?>" currency="<?php echo esc_attr($currency_symbol); ?>">
					<input type="text" data-min="<?php echo esc_attr($donation_min_value); ?>" data-max="<?php echo esc_attr($donation_max_value); ?>" data-campaign_id="<?php echo esc_attr($campaign_id); ?>" onKeyup="return NumbersOnly(this, event, true);" class="grab-donation wc-input-text donate_<?php echo esc_attr($campaign_id); ?> <?php echo esc_attr($where_currency_symbole); ?>" Placeholder="<?php echo esc_html__('Enter amount between ', 'wc-donation') . esc_attr($donation_min_value) . ' - ' . esc_attr($donation_max_value); ?>" name="wc-donation-price" >
				</div>				
				<?php 

				echo '<input type="hidden" id="wc-donation-price-' . esc_attr($campaign_id) . '" class="donate_' . esc_attr($campaign_id) . '" name="wc-donation-price" value="">';

			} 
			?>
		</div>
		<div class="row2">
			<input type="hidden" name="wc_donation_camp" id="wc_donation_camp_<?php echo esc_attr($campaign_id); ?>" class="wc_donation_camp" value="<?php echo esc_attr($campaign_id); ?>">
			<button class="button wc-donation-f-submit-donation" data-min-value="<?php echo esc_attr($donation_min_value); ?>" data-max-value="<?php echo esc_attr($donation_max_value); ?>" data-type="<?php esc_attr_e( $type ); ?>" style="background-color:#<?php esc_attr_e( $donation_button_color ); ?>;border-color:#<?php esc_attr_e( $donation_button_color ); ?>;color:#<?php esc_attr_e( $donation_button_text_color ); ?>;" id='wc-donation-f-submit-donation' value='Donate'><?php echo esc_attr( __( $donation_button_text, 'wc-donation' ) ); ?></button>
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
<div style="clear:both;height:1px;">&nbsp;</div>
