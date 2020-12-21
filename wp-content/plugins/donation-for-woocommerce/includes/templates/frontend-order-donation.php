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
$donation_values = get_option( 'wc-donation-donation-values' );
/**
 * Donation dispalyed values .
 *
 * @var type
 */
$display_donation = get_option( 'wc-donation-display-donation' );
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
$where_currency_symbole = get_option( 'wc-donation-currency-symbol' );
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
$donation_label  = !empty( esc_attr( get_option( 'wc-donation-field-label' ))) ? esc_attr( get_option( 'wc-donation-field-label' )) : 'Donation';
/**
 * Donation button text.
 *
 * @var type
 */
$donation_button_text  = !empty( esc_attr( get_option( 'wc-donation-button-text' ))) ? esc_attr( get_option( 'wc-donation-button-text' )) : 'Donate';
/**
 * Donation button bg color.
 *
 * @var type
 */
$donation_button_color  = !empty( esc_attr( get_option( 'wc-donation-button-color' ))) ? esc_attr( get_option( 'wc-donation-button-color' )) : 'd5d5d5';
/**
 * Donation button text color.
 *
 * @var type
 */
$donation_button_text_color  = !empty( esc_attr( get_option( 'wc-donation-button-text-color' ))) ? esc_attr( get_option( 'wc-donation-button-text-color' )) : '000000';
/**
 * Donation product.
 *
 * @var type
 */
$donation_product = get_option( 'wc-donation-product' . WcDonation::get_wpml_lang_code() );
if ( ! empty( $donation_product ) ) {
	?>
	<style>
		:root {
			--wc-bg-color: #<?php esc_html_e( $donation_button_color ); ?>;
			--wc-txt-color: #<?php esc_html_e( $donation_button_text_color ); ?>;
		}
	</style>
	<div class="wc-donation-in-action">
		<label for="donation-price"><?php echo esc_html( __( $donation_label, 'wc-donation' ) ); ?></label>
		<div class="in-action-elements">
			<div class="price-wrapper">
				<?php
				if ( 'before' === $where_currency_symbole ) {
					?>
					<style>
						.wc-donation-in-action .in-action-elements #wc-donation-f-donation-value {
							margin-left: 0;
						}
						.wc-donation-in-action .in-action-elements span {
							
							background: #<?php esc_html_e( $donation_button_color ); ?>;
							color: #<?php esc_html_e( $donation_button_text_color ); ?>;						
							border-radius: 4px 0 0 4px;
							margin-right: 0;
						}
					</style>
					<?php
					echo '<span> ' . esc_attr( $currency_symbole ) . '</span>';
				}
				?>
				<?php if ( ( 'predefined' === $display_donation || 'both' === $display_donation )  && ( count( $donation_values ) > 0 ) ) { ?>

					<select class='select wc-input-text <?php echo esc_attr($where_currency_symbole); ?>' id='wc-donation-f-donation-value'>
						<?php
						if ( ! empty( $donation_values ) ) {

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
						}
						?>

					</select>
					<?php 
					if ( 'both' === $display_donation ) { 
						echo '<input type="text" onKeyPress="return NumbersOnly(this, event, true);" style="display:none" Placeholder="' . esc_html__('Enter Amount', 'wc-donation') . '" class="wc-input-text ' . esc_attr($where_currency_symbole) . '" id="wc-donation-f-donation-other-value">';
					}
					?>

				<?php } else { ?>
					<input type="text" onKeyPress="return NumbersOnly(this, event, true);" class="wc-input-text <?php echo esc_attr($where_currency_symbole); ?>" id='wc-donation-f-donation-value'>
				<?php } ?>
				<?php
				if ( 'after' === $where_currency_symbole ) {
					?>
					<style>
						.wc-donation-in-action .in-action-elements #wc-donation-f-donation-value {
							margin-right: 0;
						}
						.wc-donation-in-action .in-action-elements span {
							
							background: #<?php esc_html_e( $donation_button_color ); ?>;
							color: #<?php esc_html_e( $donation_button_text_color ); ?>;						
							border-radius: 0 4px 4px 0;
							margin-left: 0;
						}
					</style>
					<?php
					echo '<span>' . esc_attr( $currency_symbole ) . '</span>';
				}
				?>
			</div>
			<?php  
			if ( 1 == $display_compaigns && ( count( $compaign_values ) > 0 ) ) {

				echo "<select class='select wc-input-text' id='wc-donation-f-compaign-value'>";
				foreach ( $compaign_values as $value ) {
					echo "<option value='" . esc_attr( $value ) . "'>" . esc_attr( $value ) . '</option>';
				}
				echo '</select>';
			}
			?>

				<button class="button" data-type="simple" style="background-color:#<?php esc_attr_e( $donation_button_color ); ?>;border-color:#<?php esc_attr_e( $donation_button_color ); ?>;color:#<?php esc_attr_e( $donation_button_text_color ); ?>;" id='wc-donation-f-submit-donation' value='Donate'><?php echo esc_attr( __( $donation_button_text, 'wc-donation' ) ); ?></button>
		</div>
	</div>
<?php } ?>
