<?php
/**
 * Frontend order  html .
 *
 * @package  donation
 */

/**
 * Donation stored values .
 *
 * @var type
 */
$donation_values = get_option( 'wc-donation-widget-donation-values' );
/**
 * Donation dispalyed values .
 *
 * @var type
 */
$display_donation = get_option( 'wc-donation-widget-display-donation' );
/**
 * Display Donation values as selectbox, radio, label if it is predefined
 *
 * @var type
 */
$display_donation_type = get_option( 'wc-donation-widget-display-donation-type' );
//wp_die($display_donation_type);
/**
 * Compaign enable or not  .
 *
 * @var type
 */
$display_compaigns = get_option( 'wc-domain-compaign-enable' );
/**
 * Compaign stored values .
 *
 * @var type
 */
$compaign_values = get_option( 'wc-donation-compaign-values' );
/**
 * Place where display currency symbol.
 *
 * @var type
 */
$where_currency_symbole = get_option( 'wc-donation-widget-currency-symbol' );
/**
 * Currency symbol.
 *
 * @var type
 */
if (get_woocommerce_currency_symbol()) {
	$currency_symbole =  get_woocommerce_currency_symbol();
}
/**
 * Donation Label.
 *
 * @var type
 */
$donation_label  = !empty( esc_attr( get_option( 'wc-donation-widget-field-label' ))) ? esc_attr( get_option( 'wc-donation-widget-field-label' )) : 'Donation';
/**
 * Donation button text.
 *
 * @var type
 */
$donation_button_text  = !empty( esc_attr( get_option( 'wc-donation-widget-button-text' ))) ? esc_attr( get_option( 'wc-donation-widget-button-text' )) : 'Donate';
/**
 * Donation button bg color.
 *
 * @var type
 */
$donation_button_color  = !empty( esc_attr( get_option( 'wc-donation-widget-button-color' ))) ? esc_attr( get_option( 'wc-donation-widget-button-color' )) : 'd5d5d5';
/**
 * Donation button text color.
 *
 * @var type
 */
$donation_button_text_color  = !empty( esc_attr( get_option( 'wc-donation-widget-button-text-color' ))) ? esc_attr( get_option( 'wc-donation-widget-button-text-color' )) : '000000';
/**
 * Donation product.
 *
 * @var type
 */
$donation_product = get_option( 'wc-donation-widget-product' );

if ( 'before' === $where_currency_symbole ) {
	$currencyBefore = $currency_symbole . ' ';
} else {
	$currencyAfter = ' ' . $currency_symbole;
}

if ( ! empty( $donation_product ) ) {
	?>
	<style>
		:root {
			--wc-wdg-bg-color: #<?php esc_html_e( $donation_button_color ); ?>;
			--wc-wdg-txt-color: #<?php esc_html_e( $donation_button_text_color ); ?>;
		}
	</style>
	<div class="wc-donation-in-action">
		<label for="donation-price"><?php echo esc_html( __( $donation_label, 'wc-donation' ) ); ?></label>
		<div class="in-action-elements <?php echo esc_html_e( $display_donation_type ); ?>">
			<?php
			if ( 'before' === $where_currency_symbole ) {
				?>
				<style>
					.widget_wc-donation-widget .wc-donation-in-action .in-action-elements #wc-donation-f-donation-value {
						margin-left: 0;
					}
					.widget_wc-donation-widget .wc-donation-in-action .in-action-elements span {
						
						background: #<?php esc_html_e( $donation_button_color ); ?>;
						color: #<?php esc_html_e( $donation_button_text_color ); ?>;						
						border-radius: 4px 0 0 4px;
						margin-right: 0;
						height: 45px;
					}
				</style>
				<?php
				echo '<span class="display-' . esc_attr( $display_donation_type ) . '-' . esc_attr( $display_donation ) . '"> ' . esc_attr( $currency_symbole ) . '</span>';
			}
			?>
			<?php 
			if ( ( 'predefined' === $display_donation || 'both' === $display_donation ) && ( is_array($donation_values) && count( $donation_values ) > 0 ) ) { 
				
				if ( 'select' ===$display_donation_type ) {
					
					?>

					<?php
					if ( ! empty( $donation_values ) ) {

						?>
						<select class='select wc-donation-field' id='wc-donation-widget-f-donation-value'>
						<?php
						foreach ( $donation_values as $value ) {
							?>
							<option value='<?php echo esc_attr( $value ); ?>'><?php echo esc_attr( $value ); ?></option>
							<?php
						}

						if ( 'both' === $display_donation ) {
							?>
							<option value="wc-donation-other-amount"><?php echo esc_html( __( 'Other', 'wc-donation' ) ); ?></option>
							<?php
						}
						?>
						</select>
						<?php    
					}
					?>
					<?php
				}
				
				if ( 'radio' === $display_donation_type ) {
					?>
					<?php
					if ( ! empty( $donation_values ) ) {
						?>
						<div id="wc-donation-widget-f-donation-value">
						<?php
						foreach ( $donation_values as $key => $value ) {
							?>
							<label for="<?php echo esc_attr($key); ?>" class="wc-label-radio">
								<?php echo esc_attr( @$currencyBefore ) . esc_attr( $value ) . esc_attr( @$currencyAfter ); ?>
								<input type="radio" id="<?php echo esc_attr( $key ); ?>" name="wc-donation-widget-f-donation-value" value="<?php echo esc_attr( $value ); ?>">                                
								<div class="checkmark"></div>
							</label>
							<?php
						}

						if ( 'both' === $display_donation ) { 
							?>
							<label for="wc-donation-other-amount" class="wc-label-radio">
								<?php echo esc_html( __( 'Other', 'wc-donation' ) ); ?>
								<input type="radio" id="wc-donation-other-amount" name="wc-donation-widget-f-donation-value" value="wc-donation-other-amount">                                
								<div class="checkmark"></div>
							</label>
							<?php
						}
						?>
						</div>
						<?php
					}
					?>
					<?php
				} 
				
				if ( 'label' === $display_donation_type ) {
					?>
					<?php
					if ( ! empty( $donation_values ) ) {
						?>
						<div id="wc-donation-widget-f-donation-value" class="wc-label-button-wrapper">
						<?php
						foreach ( $donation_values as $key => $value ) {
							?>
							<label class="wc-label-button" for="<?php echo esc_attr( $key ); ?>">
								<input type="radio" id="<?php echo esc_attr( $key ); ?>" name="wc-donation-widget-f-donation-value" value="<?php echo esc_attr( $value ); ?>">
								<?php echo esc_attr( @$currencyBefore ) . esc_attr( $value ) . esc_attr( @$currencyAfter ); ?>
							</label>
							<?php
						}

						if ( 'both' === $display_donation ) { 
							?>
							<label class="wc-label-button" for="wc-donation-other-amount">
								<input type="radio" id="wc-donation-other-amount" name="wc-donation-widget-f-donation-value" value="wc-donation-other-amount">
								<?php echo esc_html( __( 'Other', 'wc-donation' ) ); ?>
							</label>
							<?php
						}
						
						?>
						</div>
						<?php
					}
					?>
					<?php
				}

			} else { 
				?>
				<input type="text" onKeyPress="return NumbersOnly(this, event, true);" class="input-text wc-donation-field" id='wc-donation-widget-f-donation-value' Placeholder="<?php esc_html_e('Enter donation amount', 'wc-donation' ); ?>">
			<?php } ?>
			<?php
			if ( 'after' === $where_currency_symbole ) {

				?>

				<style>
					.widget_wc-donation-widget .wc-donation-in-action .in-action-elements #wc-donation-f-donation-value {
						margin-right: 0;
					}
					.widget_wc-donation-widget .wc-donation-in-action .in-action-elements span {
						
						background: #<?php esc_attr_e( $donation_button_color ); ?>;
						color: #<?php esc_attr_e( $donation_button_text_color ); ?>;						
						border-radius: 0 4px 4px 0;
						margin-left: 0;
						height: 45px;
					}
				</style>
				<?php
				echo '<span class="display-' . esc_attr($display_donation_type) . '-' . esc_attr($display_donation) . '">' . esc_attr( $currency_symbole ) . '</span>';
			}

			?>

		</div>
		<?php  

		if ( 'both' === $display_donation ) { 
			echo '<input type="text" onKeyPress="return NumbersOnly(this, event, true);" Placeholder="' . esc_html__('Enter Amount', 'wc-donation') . '" style="display:none" class="input-text wc-donation-field" id="wc-donation-widget-f-donation-other-value">';
		}

		if ( 1 == $display_compaigns && ( count( $compaign_values ) > 0 ) ) {
			
			if ( 'user-defined'===get_option( 'wc-donation-widget-display-campaign' ) ) {

				echo "<select class='select wc-donation-field' id='wc-donation-widget-f-compaign-value'>";
				foreach ( $compaign_values as $value ) {
					echo "<option value='" . esc_attr( $value ) . "'>" . esc_attr( $value ) . '</option>';
				}
				echo '</select>';
				
			} else {

				$value = get_option( 'wc-donation-widget-display-campaign' );
				echo "<label style='margin-bottom:10px;'>Campaign</label>";
				echo "<input type='text' id='wc-donation-widget-f-compaign-value' value='" . esc_attr($value) . "' readonly='true' />";               

			}
		}
		?>

		<button class="button" style="background-color:#<?php echo esc_attr($donation_button_color); ?>;border-color:#<?php echo esc_attr($donation_button_color); ?>;color:#<?php echo esc_attr($donation_button_text_color); ?>;width:100%" id='wc-donation-widget-f-submit-donation' value='Donate'><?php echo esc_attr( __( $donation_button_text, 'wc-donation' ) ); ?></button>
	</div>
<?php } ?>
